<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200428233144 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX fk_comentarioImagen_persona ON comentarioalbum');
        $this->addSql('ALTER TABLE comentarioalbum DROP idPersona');
        $this->addSql('DROP INDEX fk_comentarioImagen_persona ON comentarioimagen');
        $this->addSql('ALTER TABLE comentarioimagen DROP idPersona');
        $this->addSql('DROP INDEX fk_imagen_persona ON imagen');
        $this->addSql('ALTER TABLE imagen DROP idPersona');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43F5F88DB9');
        $this->addSql('ALTER TABLE comentarioalbum DROP FOREIGN KEY FK_E7AC00ABF5F88DB9');
        $this->addSql('ALTER TABLE comentarioalbum ADD idPersona INT NOT NULL');
        $this->addSql('CREATE INDEX fk_comentarioImagen_persona ON comentarioalbum (idPersona)');
        $this->addSql('ALTER TABLE comentarioimagen DROP FOREIGN KEY FK_2D168C97F5F88DB9');
        $this->addSql('ALTER TABLE comentarioimagen ADD idPersona INT NOT NULL');
        $this->addSql('CREATE INDEX fk_comentarioImagen_persona ON comentarioimagen (idPersona)');
        $this->addSql('ALTER TABLE imagen DROP FOREIGN KEY FK_8319D2B3F5F88DB9');
        $this->addSql('ALTER TABLE imagen ADD idPersona INT NOT NULL');
        $this->addSql('CREATE INDEX fk_imagen_persona ON imagen (idPersona)');
    }
}
