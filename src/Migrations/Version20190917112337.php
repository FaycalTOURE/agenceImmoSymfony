<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190917112337 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE property_entity_option (property_id INT NOT NULL, entity_option_id INT NOT NULL, INDEX IDX_8C33529D549213EC (property_id), INDEX IDX_8C33529DD1BAA843 (entity_option_id), PRIMARY KEY(property_id, entity_option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE property_entity_option ADD CONSTRAINT FK_8C33529D549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE property_entity_option ADD CONSTRAINT FK_8C33529DD1BAA843 FOREIGN KEY (entity_option_id) REFERENCES entity_option (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE entity_option_property');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entity_option_property (entity_option_id INT NOT NULL, property_id INT NOT NULL, INDEX IDX_D850EC1ED1BAA843 (entity_option_id), INDEX IDX_D850EC1E549213EC (property_id), PRIMARY KEY(entity_option_id, property_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE entity_option_property ADD CONSTRAINT FK_D850EC1E549213EC FOREIGN KEY (property_id) REFERENCES property (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entity_option_property ADD CONSTRAINT FK_D850EC1ED1BAA843 FOREIGN KEY (entity_option_id) REFERENCES entity_option (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE property_entity_option');
    }
}
