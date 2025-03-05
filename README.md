# Configurazione MariaDB e phpMyAdmin con Docker su NixOS

Dockerfile e docker-compose.yml presi da [qui](https://github.com/br0kenpixel/xampp2docker)
e personalizzati per funzionare "out of the box" su Project IDX (NixOS).

## Obiettivo
Configurare un ambiente di sviluppo cloud per web-app con MariaDB e phpMyAdmin utilizzando Docker, assicurando che:
- Il DB sia accessibile da remoto con PHPMyAdmin.
- L'ambiente funzioni correttamente su NixOS.
- Sia possibile accedere a qualsiasi risorsa presente nel server accedendo alla specifica porta (3000).

Nota: potrebbe essere necessario rendere pubblici i link di accesso nella sezione "Backend Ports".

## Modifiche principali

### 1. **File `dev.nix`**
Il file `dev.nix` è stato configurato per:
- Installare Docker e Docker Compose.
- Abilitare il servizio Docker.
- Eseguire uno script personalizzato all'avvio del workspace per configurare MariaDB.

### 2. **Script `setup-mariadb.sh`**
Questo script:
1. Rimuove e ricrea la directory `mariadb_run` per evitare conflitti con i permessi di MariaDB.
2. Avvia i container definiti in `docker-compose.yml`.
3. Configura MariaDB per accettare connessioni da qualsiasi host (`%`).

### 3. **File di configurazione `Docker`**
- `docker-compose.yml` è stato adattato per consentire l'avvio di MariaDB ed evitare problemi di permessi su NixOS (cartella `mariadb_run`)
- `Dockefile` è stato modificato per installare il gestore pacchetti di PHP (composer)








### 4- **Comandi mySQL**

CREATE TABLE users
(
    ID_user int PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) not null,
    email VARCHAR(50) not null,
    password VARCHAR(64) not null
);



CREATE TABLE links
(
    ID_link int PRIMARY KEY AUTO_INCREMENT,
    ID_user int,
    link_long varchar(5000) not null,
    link_short varchar(500) not null,
    description varchar(500),
    interaction int DEFAULT 0,
    
    FOREIGN KEY (ID_user) REFERENCES users(ID_user)
    	ON DELETE RESTRICT
    	ON UPDATE CASCADE
);


