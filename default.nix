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
    export APP_NAME="Merchan Track"
    export APP_ENV=local
    export APP_KEY=base64:tTE91/I68qBHyitSsssfPej2pONWGsCcAPsU3mGanII=
    export APP_DEBUG=true
    export APP_URL=http://localhost:8000
    export FRONTEND_URL=http://localhost:5173
    export LOG_CHANNEL=stack
    export LOG_DEPRECATIONS_CHANNEL=null
    export LOG_LEVEL=debug
    export DB_CONNECTION=mysql
    export DB_HOST=mariadb
    export DB_PORT=3306
    export DB_DATABASE=track
    export DB_USERNAME=root
    export DB_PASSWORD=pass@123
    export BROADCAST_DRIVER=log
    export CACHE_DRIVER=file
    export FILESYSTEM_DISK=local
    export QUEUE_CONNECTION=sync
    export SESSION_DRIVER=file
    export SESSION_LIFETIME=120

    MYSQL_BASEDIR=${pkgs.mariadb}
    MYSQL_HOME="$PWD/../mysql"
    MYSQL_DATADIR="$MYSQL_HOME/data"
    export MYSQL_UNIX_PORT="$MYSQL_HOME/mysql.sock"
    MYSQL_PID_FILE="$MYSQL_HOME/mysql.pid"
    alias mysql='mysql -u root'

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

    finish()
    {
      mysqladmin -u root --socket="$MYSQL_UNIX_PORT" shutdown
      kill $MYSQL_PID
      wait $MYSQL_PID
    }
    trap finish EXIT

    mysql -uroot -e "CREATE DATABASE IF NOT EXISTS track;"
  '';
}
