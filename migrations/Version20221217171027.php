<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221217171027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dept CHANGE DEPTNO DEPTNO INT AUTO_INCREMENT NOT NULL COMMENT \'Department\'\'s identification number\'');
        $this->addSql('ALTER TABLE emp DROP FOREIGN KEY fk_MGR');
        $this->addSql('ALTER TABLE emp CHANGE EMPNO EMPNO INT AUTO_INCREMENT NOT NULL, CHANGE DEPTNO DEPTNO INT DEFAULT NULL COMMENT \'Department\'\'s identification number\'');
        $this->addSql('ALTER TABLE emp ADD CONSTRAINT FK_310BB40FBD5E2E9B FOREIGN KEY (MGR) REFERENCES emp (EMPNO)');
        $this->addSql('ALTER TABLE proj DROP FOREIGN KEY fk_PROJ');
        $this->addSql('ALTER TABLE proj CHANGE PROJID PROJID INT AUTO_INCREMENT NOT NULL, CHANGE EMPNO EMPNO INT DEFAULT NULL');
        $this->addSql('ALTER TABLE proj ADD CONSTRAINT FK_520C3C90DB6AB0FE FOREIGN KEY (EMPNO) REFERENCES emp (EMPNO)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE datatypes CHANGE INT_ INT_ INT DEFAULT 12 NOT NULL, CHANGE DEC_ DEC_ NUMERIC(10, 2) UNSIGNED DEFAULT NULL, CHANGE FIXED_ FIXED_ NUMERIC(10, 2) UNSIGNED DEFAULT NULL, CHANGE NUMERIC_ NUMERIC_ NUMERIC(10, 2) UNSIGNED DEFAULT NULL, CHANGE NATIONAL_CHAR NATIONAL_CHAR CHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE N_CHAR N_CHAR CHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE NATIONAL_VARCHAR NATIONAL_VARCHAR VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE N_VAR_CHAR N_VAR_CHAR VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE BINARY_ BINARY_ BINARY(10) DEFAULT NULL, CHANGE VAR_BINARY VAR_BINARY VARBINARY(20) DEFAULT \'4564\'');
        $this->addSql('ALTER TABLE dept CHANGE DEPTNO DEPTNO INT NOT NULL COMMENT \'Department\'\'s identification number\'');
        $this->addSql('ALTER TABLE emp DROP FOREIGN KEY FK_310BB40FBD5E2E9B');
        $this->addSql('ALTER TABLE emp CHANGE EMPNO EMPNO INT NOT NULL, CHANGE DEPTNO DEPTNO INT NOT NULL');
        $this->addSql('ALTER TABLE emp ADD CONSTRAINT fk_MGR FOREIGN KEY (MGR) REFERENCES emp (EMPNO) ON UPDATE CASCADE ON DELETE SET NULL');
        $this->addSql('ALTER TABLE proj DROP FOREIGN KEY FK_520C3C90DB6AB0FE');
        $this->addSql('ALTER TABLE proj CHANGE PROJID PROJID INT NOT NULL, CHANGE EMPNO EMPNO INT NOT NULL');
        $this->addSql('ALTER TABLE proj ADD CONSTRAINT fk_PROJ FOREIGN KEY (EMPNO) REFERENCES emp (EMPNO) ON UPDATE CASCADE ON DELETE NO ACTION');
    }
}
