{ pkgs ? import <nixpkgs> {} }:
pkgs.mkShell {
  name = "php-env";
  nativeBuildInputs = with pkgs.buildPackages; [
    php 
    php83Packages.composer
    mariadb
    nodejs_22
  ];

  shellHook = ''
    if [ -f API/.env.nix ]; then
      export $(grep -v '^#' API/.env.nix | xargs)
    fi

    MYSQL_BASEDIR=${pkgs.mariadb}
    MYSQL_HOME="$PWD/../mysql"
    MYSQL_DATADIR="$MYSQL_HOME/data"
    export MYSQL_UNIX_PORT="$MYSQL_HOME/mysql.sock"
    MYSQL_PID_FILE="$MYSQL_HOME/mysql.pid"
    alias mysql='mysql -u root --socket="$MYSQL_UNIX_PORT"'

    if [ ! -d "$MYSQL_HOME" ]; then
      # Make sure to use normal authentication method otherwise we can only
      # connect with unix account. But users do not actually exists in nix.
      mysql_install_db --no-defaults --auth-root-authentication-method=normal \
        --datadir="$MYSQL_DATADIR" --basedir="$MYSQL_BASEDIR" \
        --pid-file="$MYSQL_PID_FILE"
    fi

    # Starts the daemon
    # - Don't load mariadb global defaults in /etc with `--no-defaults`
    # - Disable networking with `--skip-networking` and only use the socket so 
    #   multiple instances can run at once
    mysqld --no-defaults --skip-networking --datadir="$MYSQL_DATADIR" --pid-file="$MYSQL_PID_FILE" \
      --socket="$MYSQL_UNIX_PORT" 2> "$MYSQL_HOME/mysql.log" &
    MYSQL_PID=$!

    sleep 5  # Wait a few seconds to ensure MySQL has time to start

    finish()
    {
      mysqladmin -u root --socket="$MYSQL_UNIX_PORT" shutdown
      kill $MYSQL_PID
      wait $MYSQL_PID
    }
    trap finish EXIT

    # Check if mysqld started successfully
    if ps -p $MYSQL_PID > /dev/null; then
      mysql -uroot -e "CREATE DATABASE IF NOT EXISTS $DB_DATABASE;"
    else
      echo "Failed to start mysqld. Check the log at $MYSQL_HOME/mysql.log"
    fi
  '';
}
