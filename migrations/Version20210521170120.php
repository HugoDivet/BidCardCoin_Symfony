<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521170120 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F8EB576A8');
        $this->addSql('DROP INDEX UNIQ_AF86866F8EB576A8 ON offre');
        $this->addSql('ALTER TABLE offre CHANGE id_acheteur_id acheteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F96A7BB5F FOREIGN KEY (acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('CREATE INDEX IDX_AF86866F96A7BB5F ON offre (acheteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F96A7BB5F');
        $this->addSql('DROP INDEX IDX_AF86866F96A7BB5F ON offre');
        $this->addSql('ALTER TABLE offre CHANGE acheteur_id id_acheteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F8EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AF86866F8EB576A8 ON offre (id_acheteur_id)');
    }
}
