-- ==========================================
-- SPRINT 19.5 - REQUÊTES SQL AVANCÉES
-- ==========================================

-- 1. Sélection DISTINCT des villes de départ
SELECT DISTINCT VilleD FROM Vol;

-- 2. UPDATE conditionnel : Mise à jour de la capacité de l'avion 101 à 220
UPDATE Avion
SET Capacite = 220
WHERE NumAv = 101;

-- 3. DELETE conditionnel complexe : 
-- Supprimer les vols vers Douala avant le 01-Mars-2025 opérés par des avions de capacité < 200
DELETE FROM Vol
WHERE VilleA = 'Douala' 
  AND DateVol < '2025-03-01'
  AND NumAv IN (SELECT NumAv FROM Avion WHERE Capacite < 200);

-- 4. Sous-requêtes complexes : Pilotes avec salaire supérieur à TOUS les pilotes de Yaoundé
-- Utilisation obligatoire de ALL (Standard Syllabus BTS)
SELECT * FROM Pilote
WHERE Salaire > ALL (SELECT Salaire FROM Pilote WHERE VillePil = 'Yaounde');

-- 5. Sous-requête alternative : Pilotes avec salaire supérieur au MAX des pilotes de Yaoundé
SELECT * FROM Pilote
WHERE Salaire > (SELECT MAX(Salaire) FROM Pilote WHERE VillePil = 'Yaounde');

-- 6. Calculs de moyenne et filtres : Avions avec capacité supérieure à la moyenne du parc
SELECT * FROM Avion
WHERE Capacite > (SELECT AVG(Capacite) FROM Avion);

-- 7. Ventes : Produits vendus en quantité supérieure à la moyenne globale des ventes
SELECT p.NomProd, v.Qte 
FROM Produit p
JOIN Vente v ON p.CodeProd = v.CodeProd
WHERE v.Qte > (SELECT AVG(Qte) FROM Vente);
