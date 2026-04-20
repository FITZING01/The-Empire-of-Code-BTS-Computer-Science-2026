-- ==========================================
-- GESTION AÉRIENNE (Avion, Pilote, Vol)
-- ==========================================

CREATE TABLE Pilote (
    NumPil INT PRIMARY KEY,
    NomPil VARCHAR(50) NOT NULL,
    VillePil VARCHAR(50),
    Salaire DECIMAL(10, 2)
);

CREATE TABLE Avion (
    NumAv INT PRIMARY KEY,
    NomAv VARCHAR(50) NOT NULL,
    Capacite INT,
    VilleAv VARCHAR(50)
);

CREATE TABLE Vol (
    NumVol INT PRIMARY KEY,
    NumPil INT,
    NumAv INT,
    VilleD VARCHAR(50),
    VilleA VARCHAR(50),
    DateVol DATE,
    FOREIGN KEY (NumPil) REFERENCES Pilote(NumPil),
    FOREIGN KEY (NumAv) REFERENCES Avion(NumAv)
);

-- Ajout des contraintes strictes selon le cahier des charges
ALTER TABLE Pilote ADD CONSTRAINT chk_salaire CHECK (Salaire > 0);
ALTER TABLE Avion ADD CONSTRAINT chk_capacite CHECK (Capacite > 0);

-- ==========================================
-- GESTION DES VENTES (Client, Produit, Vente)
-- ==========================================

CREATE TABLE Client (
    CodeClt INT PRIMARY KEY,
    NomClt VARCHAR(50) NOT NULL,
    AdresseClt VARCHAR(100)
);

CREATE TABLE Produit (
    CodeProd INT PRIMARY KEY,
    NomProd VARCHAR(50) NOT NULL,
    Prix DECIMAL(10, 2)
);

CREATE TABLE Vente (
    NumVente INT PRIMARY KEY,
    CodeClt INT,
    CodeProd INT,
    DateVente DATE,
    Qte INT,
    FOREIGN KEY (CodeClt) REFERENCES Client(CodeClt),
    FOREIGN KEY (CodeProd) REFERENCES Produit(CodeProd)
);

-- Ajout d'une contrainte métier sur la vente
ALTER TABLE Vente ADD CONSTRAINT chk_qte CHECK (Qte > 0);
