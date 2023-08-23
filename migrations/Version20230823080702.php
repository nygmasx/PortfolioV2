<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230823080702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE catégorie (id INT AUTO_INCREMENT NOT NULL, technos_id INT NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EF7BADB725F7B143 (technos_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_projet (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, name VARCHAR(255) NOT NULL, size VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_FF08C261C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, period DATE NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techno (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE catégorie ADD CONSTRAINT FK_EF7BADB725F7B143 FOREIGN KEY (technos_id) REFERENCES techno (id)');
        $this->addSql('ALTER TABLE image_projet ADD CONSTRAINT FK_FF08C261C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catégorie DROP FOREIGN KEY FK_EF7BADB725F7B143');
        $this->addSql('ALTER TABLE image_projet DROP FOREIGN KEY FK_FF08C261C18272');
        $this->addSql('DROP TABLE catégorie');
        $this->addSql('DROP TABLE image_projet');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE techno');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
