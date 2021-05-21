<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210521161712 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot ADD prix_depart DOUBLE PRECISION DEFAULT NULL, ADD is_sold TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FAABEFE2C');
        $this->addSql('DROP INDEX IDX_AF86866FAABEFE2C ON offre');
        $this->addSql('ALTER TABLE offre ADD date_offre DATE NOT NULL, ADD heure_offre TIME DEFAULT NULL, CHANGE id_produit_id lot_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FA8CBA5F7 FOREIGN KEY (lot_id) REFERENCES lot (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FA8CBA5F7 ON offre (lot_id)');
        $this->addSql('ALTER TABLE vente ADD lieu_id INT DEFAULT NULL, ADD date_debut DATE DEFAULT NULL, ADD date_fin DATE DEFAULT NULL, ADD heure_debut TIME DEFAULT NULL, ADD heure_fin TIME DEFAULT NULL');
        $this->addSql('ALTER TABLE vente ADD CONSTRAINT FK_888A2A4C6AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('CREATE INDEX IDX_888A2A4C6AB213CC ON vente (lieu_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lot DROP prix_depart, DROP is_sold');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FA8CBA5F7');
        $this->addSql('DROP INDEX IDX_AF86866FA8CBA5F7 ON offre');
        $this->addSql('ALTER TABLE offre DROP date_offre, DROP heure_offre, CHANGE lot_id id_produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_AF86866FAABEFE2C ON offre (id_produit_id)');
        $this->addSql('ALTER TABLE vente DROP FOREIGN KEY FK_888A2A4C6AB213CC');
        $this->addSql('DROP INDEX IDX_888A2A4C6AB213CC ON vente');
        $this->addSql('ALTER TABLE vente DROP lieu_id, DROP date_debut, DROP date_fin, DROP heure_debut, DROP heure_fin');
    }
}
