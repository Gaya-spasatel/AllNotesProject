CREATE USER 'multinote'@'database' IDENTIFIED BY 'multinotepassword';
GRANT CREATE, SELECT, INSERT, UPDATE, DELETE ON multinote.* TO 'multinote'@'database';
FLUSH PRIVILEGES;

CREATE DATABASE  IF NOT EXISTS multinote CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use multinote;

-- Создаем таблицу users
create table if not exists users (
                       id INT NOT NULL AUTO_INCREMENT,
                       login VARCHAR(50) NOT NULL,
                       password CHAR(41) NOT NULL,
                       email VARCHAR(50) NOT NULL,
                       PRIMARY KEY ( id ));

-- Создаем таблицу access
create table if not exists access (
                        id INT NOT NULL AUTO_INCREMENT,
                        id_note INT NOT NULL,
                        access_login VARCHAR(50) NOT NULL,
                        PRIMARY KEY ( id ));

-- Создаем таблицу notes
create table if not exists notes (
                       id INT NOT NULL AUTO_INCREMENT,
                       owner VARCHAR(50) NOT NULL,
                       text VARCHAR(65000) NOT NULL,
                       last_modified TIMESTAMP NOT NULL,
                       login_modified VARCHAR(50) NOT NULL,
                       is_private BOOL NOT NULL DEFAULT 1,
                       is_modified BOOL NOT NULL,
                       PRIMARY KEY ( id ));
