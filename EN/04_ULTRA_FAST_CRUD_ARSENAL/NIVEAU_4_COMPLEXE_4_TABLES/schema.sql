-- ==============================================================================
-- LEVEL 4 : E-COMMERCE ERP (4 TABLES) - BUSINESS REALITY VERSION
-- ==============================================================================
DROP DATABASE IF EXISTS bts_niveau4;
CREATE DATABASE bts_niveau4;
USE bts_niveau4;

-- 1. Client Table (Local reference)
CREATE TABLE client (
    id_cli INT AUTO_INCREMENT PRIMARY KEY,
    code_cli VARCHAR(10) UNIQUE NOT NULL, -- ex: CLI001
    nom_cli VARCHAR(100) NOT NULL,
    ville_cli VARCHAR(50) DEFAULT 'Abidjan',
    tel_cli VARCHAR(15)
) ENGINE=InnoDB;

-- 2. Product Table (Stock with references)
CREATE TABLE produit (
    id_prod INT AUTO_INCREMENT PRIMARY KEY,
    ref_prod VARCHAR(20) UNIQUE NOT NULL, -- ex: LAP-HP-G8
    nom_prod VARCHAR(100) NOT NULL,
    prix_u DECIMAL(12,2) NOT NULL
) ENGINE=InnoDB;

-- 3. Order Table (Billing headers)
CREATE TABLE commande (
    id_cmd INT AUTO_INCREMENT PRIMARY KEY,
    num_facture VARCHAR(20) UNIQUE NOT NULL,
    date_cmd DATE NOT NULL,
    id_cli INT,
    FOREIGN KEY (id_cli) REFERENCES client(id_cli) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 4. OrderLine Table (Cart details)
CREATE TABLE ligne_commande (
    id_cmd INT,
    id_prod INT,
    qte INT NOT NULL DEFAULT 1,
    PRIMARY KEY (id_cmd, id_prod),
    FOREIGN KEY (id_cmd) REFERENCES commande(id_cmd) ON DELETE CASCADE,
    FOREIGN KEY (id_prod) REFERENCES produit(id_prod) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ==============================================================================
-- REALISTIC SEEDS (FCFA)
-- ==============================================================================
INSERT INTO client (code_cli, nom_cli, ville_cli, tel_cli) VALUES 
('C-001', 'MAILLOT PRO SARL', 'Abidjan', '+225 07080910'),
('C-002', 'BUREAUTIQUE PLUS', 'Douala', '+237 699887766');

INSERT INTO produit (ref_prod, nom_prod, prix_u) VALUES 
('INF-001', 'Ordinateur Laptop HP', 350000), 
('INF-002', 'Imprimante Canon G3411', 125000),
('BUR-001', 'Ram de Papier A4 (Carton)', 15000);

INSERT INTO commande (num_facture, date_cmd, id_cli) VALUES 
('FACT-2026-001', '2026-04-20', 1),
('FACT-2026-002', '2026-04-20', 2);

INSERT INTO ligne_commande VALUES (1, 1, 1), (1, 3, 2), (2, 2, 5);
