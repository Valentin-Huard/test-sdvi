<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200528141819 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE IF NOT EXISTS nombre_ingredient_par_pizza (id_ingredient_pizza INT AUTO_INCREMENT NOT NULL, ingredient_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_551E6DE2933FE08C (ingredient_id), PRIMARY KEY(id_ingredient_pizza)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS pizzeria (id_pizzeria INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, marge DOUBLE PRECISION NOT NULL, num_telephone VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_1B80AB296C6E55B5 (nom), PRIMARY KEY(id_pizzeria)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS pizzaiolo (id_pizzaiolo INT AUTO_INCREMENT NOT NULL, pizzeria_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, numero_secu VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8E1DFF222D5D15DB (numero_secu), INDEX IDX_8E1DFF22F1965E46 (pizzeria_id), PRIMARY KEY(id_pizzaiolo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS ingredient (id_ingredient INT AUTO_INCREMENT NOT NULL, cout DOUBLE PRECISION NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6BAF78706C6E55B5 (nom), PRIMARY KEY(id_ingredient)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS pizza (id_pizza INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_CFDD826F6C6E55B5 (nom), PRIMARY KEY(id_pizza)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nombre_ingredient_par_pizza ADD CONSTRAINT FK_551E6DE2933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id_ingredient)');
        $this->addSql('ALTER TABLE pizzaiolo ADD CONSTRAINT FK_8E1DFF22F1965E46 FOREIGN KEY (pizzeria_id) REFERENCES pizzeria (id_pizzeria)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pizzaiolo DROP FOREIGN KEY FK_8E1DFF22F1965E46');
        $this->addSql('ALTER TABLE nombre_ingredient_par_pizza DROP FOREIGN KEY FK_551E6DE2933FE08C');
        $this->addSql('DROP TABLE nombre_ingredient_par_pizza');
        $this->addSql('DROP TABLE pizzeria');
        $this->addSql('DROP TABLE pizzaiolo');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE pizza');
    }
}
