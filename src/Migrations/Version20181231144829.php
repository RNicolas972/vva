<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181231144829 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE type_acco (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status_acco (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, inscription_date DATE NOT NULL, close_date DATE DEFAULT NULL, phone_number INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, reservation_date DATE NOT NULL, arrhes_date DATE DEFAULT NULL, arrhes_amount NUMERIC(10, 2) DEFAULT NULL, numb_occupant INT NOT NULL, price_week NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accommodation (id INT AUTO_INCREMENT NOT NULL, status_acco_id INT NOT NULL, type_acco_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, numb_place INT NOT NULL, surface NUMERIC(6, 2) NOT NULL, internet TINYINT(1) DEFAULT NULL, description VARCHAR(255) NOT NULL, price_week NUMERIC(10, 2) NOT NULL, INDEX IDX_2D38541212CA64B4 (status_acco_id), INDEX IDX_2D385412323B7CC4 (type_acco_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accommodation ADD CONSTRAINT FK_2D38541212CA64B4 FOREIGN KEY (status_acco_id) REFERENCES status_acco (id)');
        $this->addSql('ALTER TABLE accommodation ADD CONSTRAINT FK_2D385412323B7CC4 FOREIGN KEY (type_acco_id) REFERENCES type_acco (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE accommodation DROP FOREIGN KEY FK_2D385412323B7CC4');
        $this->addSql('ALTER TABLE accommodation DROP FOREIGN KEY FK_2D38541212CA64B4');
        $this->addSql('DROP TABLE type_acco');
        $this->addSql('DROP TABLE status_acco');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE accommodation');
    }
}
