use multinote;
-- users
-- +----------+-------------+------+-----+---------+----------------+
-- | Field    | Type        | Null | Key | Default | Extra          |
-- +----------+-------------+------+-----+---------+----------------+
-- | id       | int(11)     | NO   | PRI | NULL    | auto_increment |
-- | login    | varchar(50) | NO   |     | NULL    |                |
-- | password | char(41)    | NO   |     | NULL    |                |
-- | email    | varchar(50) | NO   |     | NULL    |                |
-- +----------+-------------+------+-----+---------+----------------+

insert into users (login,password,email) values ('user','password','email@example.com');
insert into users (login,password,email) values ('user2','password2','email2@example.com');
insert into users (login,password,email) values ('user3','password3','email3@example.com');

-- notes
-- +----------------+----------------+------+-----+-------------------+-----------------------------+
-- | Field          | Type           | Null | Key | Default           | Extra                       |
-- +----------------+----------------+------+-----+-------------------+-----------------------------+
-- | id             | int(11)        | NO   | PRI | NULL              | auto_increment              |
-- | owner          | varchar(50)    | NO   |     | NULL              |                             |
-- | text           | varchar(65000) | NO   |     | NULL              |                             |
-- | last_modified  | timestamp      | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
-- | login_modified | varchar(50)    | NO   |     | NULL              |                             |
-- | is_private     | tinyint(1)     | NO   |     | 1                 |                             |
-- | is_modified    | tinyint(1)     | NO   |     | NULL              |                             |
-- +----------------+----------------+------+-----+-------------------+-----------------------------+

insert into notes (owner,text,last_modified,login_modified,is_private,is_modified) values ('user','lala',NULL,'user',0,0);
insert into notes (owner,text,last_modified,login_modified,is_private,is_modified) values ('user','ЛаЛа-Ла-лала-лааааа',NULL,'user',0,1);
insert into notes (owner,text,last_modified,login_modified,is_private,is_modified) values ('user2','lolo',NULL,'user2',0,0);
insert into notes (owner,text,last_modified,login_modified,is_private,is_modified) values ('user2','ЛоЛо-ллаа-лооо2',NULL,'user',0,0);
insert into notes (owner,text,last_modified,login_modified,is_private,is_modified) values ('user3','А вот это просто тест',NULL,'user2',0,1);

-- access;
-- +--------------+-------------+------+-----+---------+----------------+
-- | Field        | Type        | Null | Key | Default | Extra          |
-- +--------------+-------------+------+-----+---------+----------------+
-- | id           | int(11)     | NO   | PRI | NULL    | auto_increment |
-- | id_note      | int(11)     | NO   |     | NULL    |                |
-- | access_login | varchar(50) | NO   |     | NULL    |                |
-- +--------------+-------------+------+-----+---------+----------------+

insert into access (id_note,access_login) values (1,'user2');
insert into access (id_note,access_login) values (1,'user3');
insert into access (id_note,access_login) values (2,'user2');
insert into access (id_note,access_login) values (2,'user3');
insert into access (id_note,access_login) values (3,'user');
insert into access (id_note,access_login) values (3,'user3');
insert into access (id_note,access_login) values (4,'user');
insert into access (id_note,access_login) values (4,'user3');
insert into access (id_note,access_login) values (5,'user2');
insert into access (id_note,access_login) values (5,'user');

