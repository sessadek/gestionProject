<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200612045834 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client_location (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404559771C8EE');
        $this->addSql('DROP INDEX IDX_C74404559771C8EE ON client');
        $this->addSql('ALTER TABLE client CHANGE client_type_id client_location_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045570604B5 FOREIGN KEY (client_location_id) REFERENCES client_location (id)');
        $this->addSql('CREATE INDEX IDX_C744045570604B5 ON client (client_location_id)');
        $this->addSql('ALTER TABLE task CHANGE finished_at finished_at DATETIME DEFAULT NULL, CHANGE estimated_time estimated_time VARCHAR(255) DEFAULT NULL, CHANGE spent_time spent_time VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045570604B5');
        $this->addSql('DROP TABLE client_location');
        $this->addSql('DROP INDEX IDX_C744045570604B5 ON client');
        $this->addSql('ALTER TABLE client CHANGE client_location_id client_type_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404559771C8EE FOREIGN KEY (client_type_id) REFERENCES client_type (id)');
        $this->addSql('CREATE INDEX IDX_C74404559771C8EE ON client (client_type_id)');
        $this->addSql('ALTER TABLE task CHANGE finished_at finished_at DATETIME DEFAULT \'NULL\', CHANGE estimated_time estimated_time VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE spent_time spent_time VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
