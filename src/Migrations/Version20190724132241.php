<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190724132241 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comptebancaire (id INT AUTO_INCREMENT NOT NULL, iddepot_id INT DEFAULT NULL, INDEX IDX_1E236F082FC59CD3 (iddepot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depot (id INT AUTO_INCREMENT NOT NULL, datedepot DATE NOT NULL, montantdepot BIGINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, comptebancaire_id INT DEFAULT NULL, raisonsociale VARCHAR(255) NOT NULL, ninea VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adresseentreprise VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, INDEX IDX_32FFA3732850928C (comptebancaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comptebancaire ADD CONSTRAINT FK_1E236F082FC59CD3 FOREIGN KEY (iddepot_id) REFERENCES depot (id)');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA3732850928C FOREIGN KEY (comptebancaire_id) REFERENCES comptebancaire (id)');
        $this->addSql('ALTER TABLE utilisateur ADD depot_id INT DEFAULT NULL, ADD partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B38510D4DE FOREIGN KEY (depot_id) REFERENCES depot (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B398DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B38510D4DE ON utilisateur (depot_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B398DE13AC ON utilisateur (partenaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA3732850928C');
        $this->addSql('ALTER TABLE comptebancaire DROP FOREIGN KEY FK_1E236F082FC59CD3');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B38510D4DE');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B398DE13AC');
        $this->addSql('DROP TABLE comptebancaire');
        $this->addSql('DROP TABLE depot');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP INDEX IDX_1D1C63B38510D4DE ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B398DE13AC ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP depot_id, DROP partenaire_id');
    }
}
