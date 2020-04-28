<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200428231848 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE usuario');
        $this->addSql('ALTER TABLE album ADD persona_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_39986E43F5F88DB9 ON album (persona_id)');
        $this->addSql('ALTER TABLE comentarioalbum ADD persona_id INT DEFAULT NULL, ADD idPersona INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E7AC00ABF5F88DB9 ON comentarioalbum (persona_id)');
        $this->addSql('CREATE INDEX fk_comentarioImagen_persona ON comentarioalbum (idPersona)');
        $this->addSql('ALTER TABLE comentarioimagen ADD persona_id INT DEFAULT NULL, ADD idPersona INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2D168C97F5F88DB9 ON comentarioimagen (persona_id)');
        $this->addSql('CREATE INDEX fk_comentarioImagen_persona ON comentarioimagen (idPersona)');
        $this->addSql('ALTER TABLE imagen ADD persona_id INT DEFAULT NULL, ADD idPersona INT NOT NULL, CHANGE foto foto VARCHAR(300) DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_8319D2B3F5F88DB9 ON imagen (persona_id)');
        $this->addSql('CREATE INDEX fk_imagen_persona ON imagen (idPersona)');
        $this->addSql('ALTER TABLE persona ADD apodo VARCHAR(50) NOT NULL, ADD avatar BLOB DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, apodo VARCHAR(50) CHARACTER SET utf8 NOT NULL COLLATE `utf8_spanish_ci`, avatar BLOB DEFAULT NULL, idPersona INT NOT NULL, INDEX fk_usuario_persona (idPersona), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43F5F88DB9');
        $this->addSql('DROP INDEX IDX_39986E43F5F88DB9 ON album');
        $this->addSql('ALTER TABLE album DROP persona_id');
        $this->addSql('ALTER TABLE comentarioalbum DROP FOREIGN KEY FK_E7AC00ABF5F88DB9');
        $this->addSql('DROP INDEX UNIQ_E7AC00ABF5F88DB9 ON comentarioalbum');
        $this->addSql('DROP INDEX fk_comentarioImagen_persona ON comentarioalbum');
        $this->addSql('ALTER TABLE comentarioalbum DROP persona_id, DROP idPersona');
        $this->addSql('ALTER TABLE comentarioimagen DROP FOREIGN KEY FK_2D168C97F5F88DB9');
        $this->addSql('DROP INDEX UNIQ_2D168C97F5F88DB9 ON comentarioimagen');
        $this->addSql('DROP INDEX fk_comentarioImagen_persona ON comentarioimagen');
        $this->addSql('ALTER TABLE comentarioimagen DROP persona_id, DROP idPersona');
        $this->addSql('ALTER TABLE imagen DROP FOREIGN KEY FK_8319D2B3F5F88DB9');
        $this->addSql('DROP INDEX IDX_8319D2B3F5F88DB9 ON imagen');
        $this->addSql('DROP INDEX fk_imagen_persona ON imagen');
        $this->addSql('ALTER TABLE imagen DROP persona_id, DROP idPersona, CHANGE foto foto VARCHAR(200) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_spanish_ci`');
        $this->addSql('ALTER TABLE persona DROP apodo, DROP avatar');
    }
}
