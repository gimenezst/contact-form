<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180601125749 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__contact AS SELECT id, name, first_name, email, message, checked FROM contact');
        $this->addSql('DROP TABLE contact');
        $this->addSql('CREATE TABLE contact (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, first_name VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, message CLOB NOT NULL COLLATE BINARY, checked BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO contact (id, name, first_name, email, message, checked) SELECT id, name, first_name, email, message, checked FROM __temp__contact');
        $this->addSql('DROP TABLE __temp__contact');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__contact AS SELECT id, name, first_name, email, message, checked FROM contact');
        $this->addSql('DROP TABLE contact');
        $this->addSql('CREATE TABLE contact (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message CLOB NOT NULL, checked BOOLEAN DEFAULT \'0\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO contact (id, name, first_name, email, message, checked) SELECT id, name, first_name, email, message, checked FROM __temp__contact');
        $this->addSql('DROP TABLE __temp__contact');
    }
}
