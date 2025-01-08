<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108132216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, id_annonce INT NOT NULL, labelle VARCHAR(200) NOT NULL, description VARCHAR(500) NOT NULL, prix DOUBLE PRECISION NOT NULL, solde DOUBLE PRECISION NOT NULL, Kenisitherapeute_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_F65593E5A6383EC1 (Kenisitherapeute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5A6383EC1 FOREIGN KEY (Kenisitherapeute_id) REFERENCES kenisitherapeute (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5A6383EC1');
        $this->addSql('DROP TABLE annonce');
    }
}
