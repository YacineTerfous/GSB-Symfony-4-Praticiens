<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181210080939 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE posseder (praticiens_num INT AUTO_INCREMENT NOT NULL, specialite_id INT NOT NULL, pos_diplome DATE NOT NULL, INDEX IDX_62EF7CBA2195E0F0 (specialite_id), UNIQUE INDEX posseder_unique (praticiens_num, specialite_id), PRIMARY KEY(praticiens_num)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE praticien (pra_num INT AUTO_INCREMENT NOT NULL, type_code_id INT DEFAULT NULL, pra_nom VARCHAR(255) NOT NULL, pra_adr LONGTEXT DEFAULT NULL, pra_cp INT DEFAULT NULL, pra_ville VARCHAR(255) DEFAULT NULL, pra_coefnotoriete DOUBLE PRECISION DEFAULT NULL, avatar LONGTEXT DEFAULT NULL, INDEX IDX_D9A27D3FFB91E2 (type_code_id), PRIMARY KEY(pra_num)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, spe_code INT NOT NULL, spe_libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_praticient (id INT AUTO_INCREMENT NOT NULL, type_code INT NOT NULL, type_libelle VARCHAR(255) NOT NULL, type_lieu VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE praticien ADD CONSTRAINT FK_D9A27D3FFB91E2 FOREIGN KEY (type_code_id) REFERENCES type_praticient (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA2195E0F0');
        $this->addSql('ALTER TABLE praticien DROP FOREIGN KEY FK_D9A27D3FFB91E2');
        $this->addSql('DROP TABLE posseder');
        $this->addSql('DROP TABLE praticien');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP TABLE type_praticient');
    }
}
