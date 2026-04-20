-- ==============================================================================
-- NIVEAU 3 : GESTION SCOLARITÉ (LIAISON N-N) - VERSION RÉALITÉ MÉTIER
-- ==============================================================================
DROP DATABASE IF EXISTS bts_niveau3;
CREATE DATABASE bts_niveau3;
USE bts_niveau3;

-- 1. Table Étudiant (Champs BTS types)
CREATE TABLE etudiant (
    id_etu INT AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(20) UNIQUE NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    date_naissance DATE,
    sexe ENUM('M', 'F') NOT NULL,
    telephone VARCHAR(15)
) ENGINE=InnoDB;

-- 2. Table Cours (Champs BTS types)
CREATE TABLE cours (
    id_cours INT AUTO_INCREMENT PRIMARY KEY,
    code_cours VARCHAR(10) UNIQUE NOT NULL,
    libelle VARCHAR(100) NOT NULL,
    coefficient INT DEFAULT 1
) ENGINE=InnoDB;

-- 3. Table Inscription (La liaison avec champs de contexte)
CREATE TABLE inscription (
    id_etu INT,
    id_cours INT,
    annee_scolaire VARCHAR(10) NOT NULL, -- ex: 2025-2026
    date_inscription DATE NOT NULL,
    montant_frais DECIMAL(10,2) DEFAULT 0,
    PRIMARY KEY (id_etu, id_cours, annee_scolaire),
    FOREIGN KEY (id_etu) REFERENCES etudiant(id_etu) ON DELETE CASCADE,
    FOREIGN KEY (id_cours) REFERENCES cours(id_cours) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ==============================================================================
-- SEEDS LOCAUX
-- ==============================================================================
INSERT INTO etudiant (matricule, nom, prenom, sexe, telephone) VALUES 
('BTS2026-001', 'KOUADIO', 'Awa', 'F', '0707070707'),
('BTS2026-002', 'DIALLO', 'Moussa', 'M', '0102030405');

INSERT INTO cours (code_cours, libelle, coefficient) VALUES 
('PROG101', 'Algorithmique et C', 4),
('WEB202', 'Développement PHP/MySQL', 3);

INSERT INTO inscription VALUES (1, 1, '2025-2026', '2026-04-20', 25000), (2, 2, '2025-2026', '2026-04-20', 30000);
