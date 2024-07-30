#!/bin/bash

# Função para verificar e iniciar um contêiner se não estiver em execução
# Uso: check_and_start_container <nome_do_contêiner> <condição_grep>
check_and_start_container() {
  local container_name="$1"
  local grep_condition="$2"

  # Verifica se o contêiner está em execução
  if ! docker ps --format '{{.Names}}' | grep -E "$grep_condition" >/dev/null; then
    echo "$container_name container is not running. Starting $container_name..."
    docker compose up -d "$container_name"
  fi
}

# Verifica e inicia o contêiner MariaDB
check_and_start_container "mariadb" 'mariadb'

docker compose up -d --build spa

docker compose up -d --build mobi

# Inicia ou reconstrói o contêiner da API
docker compose up -d --build api


# Verifica e inicia o contêiner Caddy
check_and_start_container "caddy" 'caddy'
