<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221004114846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE farm (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE farm_user (farm_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C38C06C65FCFA0D (farm_id), INDEX IDX_C38C06CA76ED395 (user_id), PRIMARY KEY(farm_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE farm_user ADD CONSTRAINT FK_C38C06C65FCFA0D FOREIGN KEY (farm_id) REFERENCES farm (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE farm_user ADD CONSTRAINT FK_C38C06CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE farm_user DROP FOREIGN KEY FK_C38C06C65FCFA0D');
        $this->addSql('ALTER TABLE farm_user DROP FOREIGN KEY FK_C38C06CA76ED395');
        $this->addSql('DROP TABLE farm');
        $this->addSql('DROP TABLE farm_user');
    }
}
