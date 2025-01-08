<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250108125556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donneur DROP FOREIGN KEY FK_4493D773A21BD112');
        $this->addSql('DROP INDEX UNIQ_4493D773A21BD112 ON donneur');
        $this->addSql('ALTER TABLE donneur ADD Kenisitherapeute_id INT DEFAULT NULL, CHANGE personne_id patient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE donneur ADD CONSTRAINT FK_4493D7736B899279 FOREIGN KEY (patient_id) REFERENCES patient (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE donneur ADD CONSTRAINT FK_4493D773A6383EC1 FOREIGN KEY (Kenisitherapeute_id) REFERENCES kenisitherapeute (id) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4493D7736B899279 ON donneur (patient_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4493D773A6383EC1 ON donneur (Kenisitherapeute_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donneur DROP FOREIGN KEY FK_4493D7736B899279');
        $this->addSql('ALTER TABLE donneur DROP FOREIGN KEY FK_4493D773A6383EC1');
        $this->addSql('DROP INDEX UNIQ_4493D7736B899279 ON donneur');
        $this->addSql('DROP INDEX UNIQ_4493D773A6383EC1 ON donneur');
        $this->addSql('ALTER TABLE donneur ADD personne_id INT DEFAULT NULL, DROP patient_id, DROP Kenisitherapeute_id');
        $this->addSql('ALTER TABLE donneur ADD CONSTRAINT FK_4493D773A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4493D773A21BD112 ON donneur (personne_id)');
    }
}
