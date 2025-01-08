<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108110511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE donneur (id INT AUTO_INCREMENT NOT NULL, personne_id INT DEFAULT NULL, nom_materiel VARCHAR(150) NOT NULL, categorie VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, quantite INT NOT NULL, etat_materiel VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_4493D773A21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE donneur ADD CONSTRAINT FK_4493D773A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donneur DROP FOREIGN KEY FK_4493D773A21BD112');
        $this->addSql('DROP TABLE donneur');
    }
}
