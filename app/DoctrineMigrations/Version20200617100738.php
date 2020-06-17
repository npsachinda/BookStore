<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20200617100738 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, order_id_id INT NOT NULL, paid_amount NUMERIC(8, 2) NOT NULL, card_cvc INT NOT NULL, card_expiry_month VARCHAR(5) NOT NULL, card_expiry_year VARCHAR(5) NOT NULL, payment_status VARCHAR(10) NOT NULL, card_holder_number VARCHAR(50) NOT NULL, payment_reference VARCHAR(255) DEFAULT NULL, INDEX IDX_6D28840DFCDAEAAA (order_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840DFCDAEAAA FOREIGN KEY (order_id_id) REFERENCES orders (id)');
       
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE payment');
        $this->addSql('ALTER TABLE books DROP INDEX UNIQ_4A1B2A9212469DE2, ADD INDEX FK_4A1B2A9212469DE2 (category_id)');
    }
}
