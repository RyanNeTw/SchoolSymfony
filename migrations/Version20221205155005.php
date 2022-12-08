<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221205155005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grade ADD classroom_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE grade ADD CONSTRAINT FK_595AAE346278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id)');
        $this->addSql('CREATE INDEX IDX_595AAE346278D5A8 ON grade (classroom_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE grade DROP FOREIGN KEY FK_595AAE346278D5A8');
        $this->addSql('DROP INDEX IDX_595AAE346278D5A8 ON grade');
        $this->addSql('ALTER TABLE grade DROP classroom_id');
    }
}
