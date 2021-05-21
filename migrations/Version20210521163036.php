<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521163036 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot ADD vente_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B7DC7170A FOREIGN KEY (vente_id) REFERENCES vente (id)');
        $this->addSql('CREATE INDEX IDX_B81291B7DC7170A ON lot (vente_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC272D1CFB9F');
        $this->addSql('DROP INDEX IDX_29A5EC272D1CFB9F ON produit');
        $this->addSql('ALTER TABLE produit DROP id_vente_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B7DC7170A');
        $this->addSql('DROP INDEX IDX_B81291B7DC7170A ON lot');
        $this->addSql('ALTER TABLE lot DROP vente_id');
        $this->addSql('ALTER TABLE produit ADD id_vente_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC272D1CFB9F FOREIGN KEY (id_vente_id) REFERENCES vente (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC272D1CFB9F ON produit (id_vente_id)');
    }
}
