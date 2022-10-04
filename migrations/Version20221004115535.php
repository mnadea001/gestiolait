<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004115535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE farm_animal (farm_id INT NOT NULL, animal_id INT NOT NULL, INDEX IDX_768CC70265FCFA0D (farm_id), INDEX IDX_768CC7028E962C16 (animal_id), PRIMARY KEY(farm_id, animal_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE farm_animal ADD CONSTRAINT FK_768CC70265FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE farm_animal ADD CONSTRAINT FK_768CC7028E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE farm_animal DROP FOREIGN KEY FK_768CC70265FCFA0D');
        $this->addSql('ALTER TABLE farm_animal DROP FOREIGN KEY FK_768CC7028E962C16');
        $this->addSql('DROP TABLE farm_animal');
    }
}
