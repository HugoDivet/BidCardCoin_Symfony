<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210319080600 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acheteur (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, solvable TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_304AFF9DC6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie_categorie (categorie_source INT NOT NULL, categorie_target INT NOT NULL, INDEX IDX_E422D933D9ACD54A (categorie_source), INDEX IDX_E422D933C04985C5 (categorie_target), PRIMARY KEY(categorie_source, categorie_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commissaire_priseur (id INT AUTO_INCREMENT NOT NULL, id_personne_id INT NOT NULL, UNIQUE INDEX UNIQ_E21F5C61BA091CE5 (id_personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estimation (id INT AUTO_INCREMENT NOT NULL, date_estimation DATE NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offre (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT DEFAULT NULL, id_acheteur_id INT DEFAULT NULL, offre_acheteur DOUBLE PRECISION DEFAULT NULL, INDEX IDX_AF86866FAABEFE2C (id_produit_id), UNIQUE INDEX UNIQ_AF86866F8EB576A8 (id_acheteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_14B78418AABEFE2C (id_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_lot_id INT DEFAULT NULL, id_vente_id INT DEFAULT NULL, nom INT NOT NULL, description VARCHAR(255) DEFAULT NULL, prix_de_depart DOUBLE PRECISION DEFAULT NULL, etat VARCHAR(255) DEFAULT NULL, INDEX IDX_29A5EC278EFC101A (id_lot_id), INDEX IDX_29A5EC272D1CFB9F (id_vente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, id_personne_id INT NOT NULL, adresse VARCHAR(255) DEFAULT NULL, pays VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3BA091CE5 (id_personne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendeur (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, UNIQUE INDEX UNIQ_7AF49996C6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vente (id INT AUTO_INCREMENT NOT NULL, attribute VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acheteur ADD CONSTRAINT FK_304AFF9DC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE categorie_categorie ADD CONSTRAINT FK_E422D933D9ACD54A FOREIGN KEY (categorie_source) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_categorie ADD CONSTRAINT FK_E422D933C04985C5 FOREIGN KEY (categorie_target) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commissaire_priseur ADD CONSTRAINT FK_E21F5C61BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866FAABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE offre ADD CONSTRAINT FK_AF86866F8EB576A8 FOREIGN KEY (id_acheteur_id) REFERENCES acheteur (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC278EFC101A FOREIGN KEY (id_lot_id) REFERENCES lot (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC272D1CFB9F FOREIGN KEY (id_vente_id) REFERENCES vente (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE vendeur ADD CONSTRAINT FK_7AF49996C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866F8EB576A8');
        $this->addSql('ALTER TABLE categorie_categorie DROP FOREIGN KEY FK_E422D933D9ACD54A');
        $this->addSql('ALTER TABLE categorie_categorie DROP FOREIGN KEY FK_E422D933C04985C5');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC278EFC101A');
        $this->addSql('ALTER TABLE commissaire_priseur DROP FOREIGN KEY FK_E21F5C61BA091CE5');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BA091CE5');
        $this->addSql('ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FAABEFE2C');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418AABEFE2C');
        $this->addSql('ALTER TABLE acheteur DROP FOREIGN KEY FK_304AFF9DC6EE5C49');
        $this->addSql('ALTER TABLE vendeur DROP FOREIGN KEY FK_7AF49996C6EE5C49');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC272D1CFB9F');
        $this->addSql('DROP TABLE acheteur');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE categorie_categorie');
        $this->addSql('DROP TABLE commissaire_priseur');
        $this->addSql('DROP TABLE date');
        $this->addSql('DROP TABLE estimation');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE lot');
        $this->addSql('DROP TABLE offre');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vendeur');
        $this->addSql('DROP TABLE vente');
    }
}
