<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180401005821 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE master_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE location (id INT NOT NULL, title VARCHAR(25) NOT NULL, class_name VARCHAR(25) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE machine (id INT NOT NULL, location_id INT DEFAULT NULL, macs_id INT NOT NULL, type VARCHAR(50) NOT NULL, title VARCHAR(25) NOT NULL, description VARCHAR(120) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1505DF8464D218E ON machine (location_id)');
        $this->addSql('CREATE TABLE machine_permission (id INT NOT NULL, machine_id INT DEFAULT NULL, member_id INT DEFAULT NULL, can_use BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_94EC8A0BF6B75B26 ON machine_permission (machine_id)');
        $this->addSql('CREATE INDEX IDX_94EC8A0B7597D3FE ON machine_permission (member_id)');
        $this->addSql('CREATE TABLE member (id INT NOT NULL, amember_id INT NOT NULL, rf_id INT NOT NULL, valid_until TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE machine ADD CONSTRAINT FK_1505DF8464D218E FOREIGN KEY (location_id) REFERENCES location (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE machine_permission ADD CONSTRAINT FK_94EC8A0BF6B75B26 FOREIGN KEY (machine_id) REFERENCES machine (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE machine_permission ADD CONSTRAINT FK_94EC8A0B7597D3FE FOREIGN KEY (member_id) REFERENCES member (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE machine DROP CONSTRAINT FK_1505DF8464D218E');
        $this->addSql('ALTER TABLE machine_permission DROP CONSTRAINT FK_94EC8A0BF6B75B26');
        $this->addSql('ALTER TABLE machine_permission DROP CONSTRAINT FK_94EC8A0B7597D3FE');
        $this->addSql('DROP SEQUENCE master_seq CASCADE');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE machine_permission');
        $this->addSql('DROP TABLE member');
    }
}
