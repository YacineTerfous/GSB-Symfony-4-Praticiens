<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181126150003 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE posseder ADD praticiens_id INT DEFAULT NULL, ADD specialite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA3D329473 FOREIGN KEY (praticiens_id) REFERENCES praticien (id)');
        $this->addSql('ALTER TABLE posseder ADD CONSTRAINT FK_62EF7CBA2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('CREATE INDEX IDX_62EF7CBA3D329473 ON posseder (praticiens_id)');
        $this->addSql('CREATE INDEX IDX_62EF7CBA2195E0F0 ON posseder (specialite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA3D329473');
        $this->addSql('ALTER TABLE posseder DROP FOREIGN KEY FK_62EF7CBA2195E0F0');
        $this->addSql('DROP INDEX IDX_62EF7CBA3D329473 ON posseder');
        $this->addSql('DROP INDEX IDX_62EF7CBA2195E0F0 ON posseder');
        $this->addSql('ALTER TABLE posseder DROP praticiens_id, DROP specialite_id');
    }
}
