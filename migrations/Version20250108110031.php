<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108110031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kenisitherapeute (id INT AUTO_INCREMENT NOT NULL, personne_id INT DEFAULT NULL, ville VARCHAR(20) NOT NULL, services VARCHAR(250) NOT NULL, premium TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_A12336BDA21BD112 (personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE kenisitherapeute ADD CONSTRAINT FK_A12336BDA21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE kenisitherapeute DROP FOREIGN KEY FK_A12336BDA21BD112');
        $this->addSql('DROP TABLE kenisitherapeute');
    }
}
