<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211119121210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, paint_id INT DEFAULT NULL, blog_post_id INT DEFAULT NULL, author VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, contents LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5F9E962A9017B5FF (paint_id), INDEX IDX_5F9E962AA77FBEAF (blog_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A9017B5FF FOREIGN KEY (paint_id) REFERENCES paint (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AA77FBEAF FOREIGN KEY (blog_post_id) REFERENCES blog_post (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE comments');
    }
}
