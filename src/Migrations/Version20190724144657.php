<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190724144657 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comptebancaire ADD idpartenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comptebancaire ADD CONSTRAINT FK_1E236F08E1440477 FOREIGN KEY (idpartenaire_id) REFERENCES partenaire (id)');
        $this->addSql('CREATE INDEX IDX_1E236F08E1440477 ON comptebancaire (idpartenaire_id)');
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA3732850928C');
        $this->addSql('DROP INDEX IDX_32FFA3732850928C ON partenaire');
        $this->addSql('ALTER TABLE partenaire DROP comptebancaire_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comptebancaire DROP FOREIGN KEY FK_1E236F08E1440477');
        $this->addSql('DROP INDEX IDX_1E236F08E1440477 ON comptebancaire');
        $this->addSql('ALTER TABLE comptebancaire DROP idpartenaire_id');
        $this->addSql('ALTER TABLE partenaire ADD comptebancaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA3732850928C FOREIGN KEY (comptebancaire_id) REFERENCES comptebancaire (id)');
        $this->addSql('CREATE INDEX IDX_32FFA3732850928C ON partenaire (comptebancaire_id)');
    }
}
