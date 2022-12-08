<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221204224218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE school ADD adress_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE school ADD CONSTRAINT FK_F99EDABB8486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F99EDABB8486F9AC ON school (adress_id)');
        $this->addSql('ALTER TABLE student ADD adress_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF338486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF338486F9AC ON student (adress_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE school DROP FOREIGN KEY FK_F99EDABB8486F9AC');
        $this->addSql('DROP INDEX UNIQ_F99EDABB8486F9AC ON school');
        $this->addSql('ALTER TABLE school DROP adress_id');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF338486F9AC');
        $this->addSql('DROP INDEX UNIQ_B723AF338486F9AC ON student');
        $this->addSql('ALTER TABLE student DROP adress_id');
    }
}
