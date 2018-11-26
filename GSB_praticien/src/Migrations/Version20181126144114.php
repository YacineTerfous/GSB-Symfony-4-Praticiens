<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181126144114 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE posseder (id INT AUTO_INCREMENT NOT NULL, pos_diplome DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE praticien ADD posseder_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE praticien ADD CONSTRAINT FK_D9A27D31DB77787 FOREIGN KEY (posseder_id) REFERENCES posseder (id)');
        $this->addSql('CREATE INDEX IDX_D9A27D31DB77787 ON praticien (posseder_id)');
        $this->addSql('ALTER TABLE specialite ADD posseder_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_E7D6FCC11DB77787 FOREIGN KEY (posseder_id) REFERENCES posseder (id)');
        $this->addSql('CREATE INDEX IDX_E7D6FCC11DB77787 ON specialite (posseder_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE praticien DROP FOREIGN KEY FK_D9A27D31DB77787');
        $this->addSql('ALTER TABLE specialite DROP FOREIGN KEY FK_E7D6FCC11DB77787');
        $this->addSql('DROP TABLE posseder');
        $this->addSql('DROP INDEX IDX_D9A27D31DB77787 ON praticien');
        $this->addSql('ALTER TABLE praticien DROP posseder_id');
        $this->addSql('DROP INDEX IDX_E7D6FCC11DB77787 ON specialite');
        $this->addSql('ALTER TABLE specialite DROP posseder_id');
    }
}
