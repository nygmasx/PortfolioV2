<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230823081323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image_techno (id INT AUTO_INCREMENT NOT NULL, techno_id INT NOT NULL, name VARCHAR(255) NOT NULL, size VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_969AB01451F3C1BC (techno_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet_techno (projet_id INT NOT NULL, techno_id INT NOT NULL, INDEX IDX_1B2E5E8AC18272 (projet_id), INDEX IDX_1B2E5E8A51F3C1BC (techno_id), PRIMARY KEY(projet_id, techno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image_techno ADD CONSTRAINT FK_969AB01451F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id)');
        $this->addSql('ALTER TABLE projet_techno ADD CONSTRAINT FK_1B2E5E8AC18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_techno ADD CONSTRAINT FK_1B2E5E8A51F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_techno DROP FOREIGN KEY FK_969AB01451F3C1BC');
        $this->addSql('ALTER TABLE projet_techno DROP FOREIGN KEY FK_1B2E5E8AC18272');
        $this->addSql('ALTER TABLE projet_techno DROP FOREIGN KEY FK_1B2E5E8A51F3C1BC');
        $this->addSql('DROP TABLE image_techno');
        $this->addSql('DROP TABLE projet_techno');
    }
}
