<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190411100255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pokemon_team ADD trainer_id INT NOT NULL, ADD pokemon_id INT NOT NULL, ADD sur_name VARCHAR(255) DEFAULT NULL, ADD hp INT NOT NULL');
        $this->addSql('ALTER TABLE pokemon_team ADD CONSTRAINT FK_F849D85CFB08EDF6 FOREIGN KEY (trainer_id) REFERENCES trainer (id)');
        $this->addSql('ALTER TABLE pokemon_team ADD CONSTRAINT FK_F849D85C2FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id)');
        $this->addSql('CREATE INDEX IDX_F849D85CFB08EDF6 ON pokemon_team (trainer_id)');
        $this->addSql('CREATE INDEX IDX_F849D85C2FE71C3E ON pokemon_team (pokemon_id)');
        $this->addSql('ALTER TABLE trainer DROP FOREIGN KEY FK_C51508204506A43F');
        $this->addSql('DROP INDEX IDX_C51508204506A43F ON trainer');
        $this->addSql('ALTER TABLE trainer DROP pokemon_team_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pokemon_team DROP FOREIGN KEY FK_F849D85CFB08EDF6');
        $this->addSql('ALTER TABLE pokemon_team DROP FOREIGN KEY FK_F849D85C2FE71C3E');
        $this->addSql('DROP INDEX IDX_F849D85CFB08EDF6 ON pokemon_team');
        $this->addSql('DROP INDEX IDX_F849D85C2FE71C3E ON pokemon_team');
        $this->addSql('ALTER TABLE pokemon_team DROP trainer_id, DROP pokemon_id, DROP sur_name, DROP hp');
        $this->addSql('ALTER TABLE trainer ADD pokemon_team_id INT NOT NULL');
        $this->addSql('ALTER TABLE trainer ADD CONSTRAINT FK_C51508204506A43F FOREIGN KEY (pokemon_team_id) REFERENCES pokemon_team (id)');
        $this->addSql('CREATE INDEX IDX_C51508204506A43F ON trainer (pokemon_team_id)');
    }
}
