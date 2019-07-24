<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190724133004 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comptebancaire ADD idutilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comptebancaire ADD CONSTRAINT FK_1E236F08EAF07004 FOREIGN KEY (idutilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_1E236F08EAF07004 ON comptebancaire (idutilisateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comptebancaire DROP FOREIGN KEY FK_1E236F08EAF07004');
        $this->addSql('DROP INDEX IDX_1E236F08EAF07004 ON comptebancaire');
        $this->addSql('ALTER TABLE comptebancaire DROP idutilisateur_id');
    }
}
