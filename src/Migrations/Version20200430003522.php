<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200430003522 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->abortIf(
            $this->connection
            ->getDatabasePlatform()
            ->getName()!== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );
        
        $this->addSql(
           'CREATE TABLE property(id INT AUTO_INCREMENT NOT NULL,title VARCHAR(255) NOT NULL,
           description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)
           )
           DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
    }
    
    public function down(Schema $schema) : void
    {
        $this->abortIf(
            $this->connection
            ->getDatabasePlatform()
            ->getName()!== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );
        $this->addSql('DROP TABLE property');
    }
}
