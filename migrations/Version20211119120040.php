<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211119120040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog_post (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, contents LONGTEXT NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_BA5AE01DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paint_categories (paint_id INT NOT NULL, categories_id INT NOT NULL, INDEX IDX_BF57DB79017B5FF (paint_id), INDEX IDX_BF57DB7A21214B7 (categories_id), PRIMARY KEY(paint_id, categories_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog_post ADD CONSTRAINT FK_BA5AE01DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE paint_categories ADD CONSTRAINT FK_BF57DB79017B5FF FOREIGN KEY (paint_id) REFERENCES paint (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paint_categories ADD CONSTRAINT FK_BF57DB7A21214B7 FOREIGN KEY (categories_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE paint ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE paint ADD CONSTRAINT FK_577A8417A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_577A8417A76ED395 ON paint (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE blog_post');
        $this->addSql('DROP TABLE paint_categories');
        $this->addSql('ALTER TABLE paint DROP FOREIGN KEY FK_577A8417A76ED395');
        $this->addSql('DROP INDEX IDX_577A8417A76ED395 ON paint');
        $this->addSql('ALTER TABLE paint DROP user_id');
    }
}
