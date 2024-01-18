<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240118150715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD id_page_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66D2DBCA94 FOREIGN KEY (id_page_id) REFERENCES page (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66D2DBCA94 ON article (id_page_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66D2DBCA94');
        $this->addSql('DROP INDEX IDX_23A0E66D2DBCA94 ON article');
        $this->addSql('ALTER TABLE article DROP id_page_id');
    }
}
