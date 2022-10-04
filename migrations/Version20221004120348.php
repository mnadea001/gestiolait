<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004120348 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vaccin_injection (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, injection_date DATE NOT NULL, end_period DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD vaccin_injection_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FDCE88EC FOREIGN KEY (vaccin_injection_id) REFERENCES vaccin_injection (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231FDCE88EC ON animal (vaccin_injection_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FDCE88EC');
        $this->addSql('DROP TABLE vaccin_injection');
        $this->addSql('DROP INDEX IDX_6AAB231FDCE88EC ON animal');
        $this->addSql('ALTER TABLE animal DROP vaccin_injection_id');
    }
}
