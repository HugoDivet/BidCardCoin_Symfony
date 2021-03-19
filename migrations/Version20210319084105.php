<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210319084105 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE estimation ADD id_commissaire_id INT DEFAULT NULL, ADD id_produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE estimation ADD CONSTRAINT FK_D0527024CA8C2027 FOREIGN KEY (id_commissaire_id) REFERENCES commissaire_priseur (id)');
        $this->addSql('ALTER TABLE estimation ADD CONSTRAINT FK_D0527024AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_D0527024CA8C2027 ON estimation (id_commissaire_id)');
        $this->addSql('CREATE INDEX IDX_D0527024AABEFE2C ON estimation (id_produit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE estimation DROP FOREIGN KEY FK_D0527024CA8C2027');
        $this->addSql('ALTER TABLE estimation DROP FOREIGN KEY FK_D0527024AABEFE2C');
        $this->addSql('DROP INDEX IDX_D0527024CA8C2027 ON estimation');
        $this->addSql('DROP INDEX IDX_D0527024AABEFE2C ON estimation');
        $this->addSql('ALTER TABLE estimation DROP id_commissaire_id, DROP id_produit_id');
    }
}
