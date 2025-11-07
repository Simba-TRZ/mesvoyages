<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251106102715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE environnement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON user (username)');
        $this->addSql('CREATE TABLE visite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ville VARCHAR(50) NOT NULL, pays VARCHAR(50) NOT NULL, datecreation DATE DEFAULT NULL, note INTEGER DEFAULT NULL, avis CLOB DEFAULT NULL, tempmin INTEGER DEFAULT NULL, tempmax INTEGER DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, image_size INTEGER DEFAULT NULL, updated_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TABLE visite_environnement (visite_id INTEGER NOT NULL, environnement_id INTEGER NOT NULL, PRIMARY KEY(visite_id, environnement_id), CONSTRAINT FK_6690F746C1C5DC59 FOREIGN KEY (visite_id) REFERENCES visite (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_6690F746BAFB82A1 FOREIGN KEY (environnement_id) REFERENCES environnement (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_6690F746C1C5DC59 ON visite_environnement (visite_id)');
        $this->addSql('CREATE INDEX IDX_6690F746BAFB82A1 ON visite_environnement (environnement_id)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE environnement');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE visite');
        $this->addSql('DROP TABLE visite_environnement');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
