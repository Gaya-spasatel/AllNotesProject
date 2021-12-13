<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213142257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, login_modified_id INT NOT NULL, login_id_id INT NOT NULL, note_text LONGTEXT NOT NULL, last_modified DATETIME NOT NULL, is_private TINYINT(1) NOT NULL, is_modified TINYINT(1) NOT NULL, INDEX IDX_CFBDFA14177B41A0 (login_modified_id), INDEX IDX_CFBDFA14793459C3 (login_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(50) NOT NULL, password VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14177B41A0 FOREIGN KEY (login_modified_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14793459C3 FOREIGN KEY (login_id_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE notes');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE access ADD note_id_id INT DEFAULT NULL, ADD login_id_id INT DEFAULT NULL, DROP id_note, DROP access_login');
        $this->addSql('ALTER TABLE access ADD CONSTRAINT FK_6692B541A543D80 FOREIGN KEY (note_id_id) REFERENCES note (id)');
        $this->addSql('ALTER TABLE access ADD CONSTRAINT FK_6692B54793459C3 FOREIGN KEY (login_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6692B541A543D80 ON access (note_id_id)');
        $this->addSql('CREATE INDEX IDX_6692B54793459C3 ON access (login_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE access DROP FOREIGN KEY FK_6692B541A543D80');
        $this->addSql('ALTER TABLE access DROP FOREIGN KEY FK_6692B54793459C3');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14177B41A0');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14793459C3');
        $this->addSql('CREATE TABLE notes (id INT AUTO_INCREMENT NOT NULL, owner VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, text TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, last_modified DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, login_modified VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, is_private TINYINT(1) DEFAULT \'1\' NOT NULL, is_modified TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, password CHAR(41) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, email VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_6692B541A543D80 ON access');
        $this->addSql('DROP INDEX IDX_6692B54793459C3 ON access');
        $this->addSql('ALTER TABLE access ADD id_note INT NOT NULL, ADD access_login VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, DROP note_id_id, DROP login_id_id');
    }
}
