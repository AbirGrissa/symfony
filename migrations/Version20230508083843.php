<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230508083843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abscencee (id INT AUTO_INCREMENT NOT NULL, senace VARCHAR(255) NOT NULL, date DATE NOT NULL, module VARCHAR(255) NOT NULL, excuse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiantt (id INT AUTO_INCREMENT NOT NULL, matricule VARCHAR(255) NOT NULL, cin INT NOT NULL, nom VARCHAR(255) NOT NULL, classse VARCHAR(255) NOT NULL, dn DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiantt_abscencee (etudiantt_id INT NOT NULL, abscencee_id INT NOT NULL, INDEX IDX_AF59507835A49D7F (etudiantt_id), INDEX IDX_AF595078B1C24DB6 (abscencee_id), PRIMARY KEY(etudiantt_id, abscencee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudiantt_abscencee ADD CONSTRAINT FK_AF59507835A49D7F FOREIGN KEY (etudiantt_id) REFERENCES etudiantt (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiantt_abscencee ADD CONSTRAINT FK_AF595078B1C24DB6 FOREIGN KEY (abscencee_id) REFERENCES abscencee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E371124A21');
        $this->addSql('DROP TABLE abscence');
        $this->addSql('DROP TABLE etudiant');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abscence (id INT AUTO_INCREMENT NOT NULL, seance VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date DATE NOT NULL, module VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, excuse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, abs_id INT NOT NULL, matricule VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, cin INT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, classe VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, dn DATE NOT NULL, INDEX IDX_717E22E371124A21 (abs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E371124A21 FOREIGN KEY (abs_id) REFERENCES abscence (id)');
        $this->addSql('ALTER TABLE etudiantt_abscencee DROP FOREIGN KEY FK_AF59507835A49D7F');
        $this->addSql('ALTER TABLE etudiantt_abscencee DROP FOREIGN KEY FK_AF595078B1C24DB6');
        $this->addSql('DROP TABLE abscencee');
        $this->addSql('DROP TABLE etudiantt');
        $this->addSql('DROP TABLE etudiantt_abscencee');
    }
}
