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

    
  '';
}
