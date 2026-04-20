-- ==============================================================================
-- NIVEAU 2 : GESTION DE STOCK - VERSION RÉALITÉ MÉTIER
-- ==============================================================================
DROP DATABASE IF EXISTS bts_niveau2;
CREATE DATABASE bts_niveau2;
USE bts_niveau2;

CREATE TABLE categorie (
    id_cat INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE produit (
    id_prod INT AUTO_INCREMENT PRIMARY KEY,
    ref_prod VARCHAR(20) UNIQUE NOT NULL,
    nom_prod VARCHAR(100) NOT NULL,
    prix_u DECIMAL(10,2) NOT NULL,
    qte_stock INT DEFAULT 0,
    seuil_alerte INT DEFAULT 5,
    id_cat INT,
    FOREIGN KEY (id_cat) REFERENCES categorie(id_cat) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Seeds
INSERT INTO categorie (libelle) VALUES ('Électronique'), ('Fournitures');
INSERT INTO produit (ref_prod, nom_prod, prix_u, qte_stock, id_cat) VALUES 
('L-HP-01', 'Laptop HP Pro', 450000, 10, 1),
('S-LOG-02', 'Souris Logitech', 15000, 3, 1), -- Alerte (3 < 5)
('P-A4-01', 'Papier A4', 3500, 50, 2);
