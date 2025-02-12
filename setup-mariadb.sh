#!/usr/bin/env bash

set -e

# Crea la directory per il PID di MariaDB
rm -rf ./mariadb_run
mkdir -p ./mariadb_run
chmod 777 ./mariadb_run

# Riavvia i container in background
docker-compose down || true
MY_UID="$(id -u)" MY_GID="$(id -g)" docker-compose up --build -d

# Aspetta che il container di MariaDB sia pronto
echo "Waiting for MariaDB to be ready..."
sleep 10

# Configura i permessi per l'accesso remoto a MariaDB 
# attenzione al nome del container, verificarlo con "docker ps"
docker exec -i docker-xampp-db-1 mariadb -u root -proot <<EOF
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root';
FLUSH PRIVILEGES;
GRANT ALL PRIVILEGES ON *.* TO 'user'@'%' IDENTIFIED BY 'user';
FLUSH PRIVILEGES;
EOF

echo "MariaDB setup complete."
