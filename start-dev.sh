#!/bin/bash

# Definir nomes dos containers
API_CONTAINER="api"
DB_CONTAINER="mariadb"

# Função para aguardar até que um serviço esteja pronto
wait_for_service() {
    local container_name=$1
    local service_name=$2
    local command_to_check=$3
    local retries=30  # Número máximo de tentativas
    local wait_seconds=5  # Tempo entre as tentativas em segundos

    echo -n "Aguardando o serviço '$service_name' no container '$container_name' estar pronto..."
    
    # Loop para verificar se o serviço está pronto
    for (( i=1; i<=$retries; i++ )); do
        if docker exec "$container_name" sh -c "$command_to_check" >/dev/null 2>&1; then
            echo " [OK]"
            return 0
        fi
        echo -n "."
        sleep $wait_seconds
    done

    echo " [ERRO] Não foi possível conectar ao serviço '$service_name' no container '$container_name'."
    return 1
}

# Inicia os containers Docker em segundo plano
docker compose up -d

# Chama a função para esperar pelo serviço 'api'
wait_for_service "$API_CONTAINER" "API" "php -v"

# Chama a função para esperar pelo serviço 'db' (MariaDB)
wait_for_service "$DB_CONTAINER" "MariaDB" "mariadb-admin ping  -p$MYSQL_ROOT_PASSWORD"

# Executa os comandos dentro do container 'api'
docker exec "$API_CONTAINER" sh entrypoint.sh