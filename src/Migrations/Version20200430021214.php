<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20200430021214 extends AbstractMigration
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
         'ALTER TABLE property ADD surface INT NOT NULL,
         ADD rooms INT NOT NULL,
         ADD bedrooms INT NOT NULL,
         ADD floor INT NOT NULL,
         ADD price INT NOT NULL,
         ADD heat INT NOT NULL,
         ADD city VARCHAR(255) NOT NULL,
         ADD address VARCHAR(255) NOT NULL,
         ADD postal_code VARCHAR(255) NOT NULL,
         ADD sold TINYINT(1) NOT NULL,
         ADD created_at DATETIME NOT NULL'
         );
    }
      
    public function down(Schema $schema) : void
    {
        $this->abortIf(
            $this->connection
            ->getDatabasePlatform()
            ->getName()
            !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );
        $this->addSql(
         'ALTER TABLE property DROP surface, DROP rooms, DROP bedrooms, DROP floor, DROP price, DROP heat,
         DROP city, DROP address, DROP postal_code, DROP sold, DROP created_at'
         );
    }
}
