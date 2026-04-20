# SPRINT 19.5 - Jour 02 : Création des Bases de Données (SQL)

Ce document centralise l'approche architecturale et les standards stricts du Syllabus Génie Logiciel & Informatique de Gestion (IGL, GSI...) 2025 pour la création de schémas relationnels SQL (DDL).

## 1. Contexte du Sprint (Aérien & Ventes)

Le cahier des charges impose une double modélisation pour garantir une polyvalence maximale des candidats :
- **Gestion Aérienne** : Suivi des Pilotes, Avions, et de leurs Vols respectifs.
- **Gestion Commerciale** : Suivi des Clients, Produits, et de l'historique de Vente.

## 2. Standards de Création (DDL)

Chaque table doit respecter les règles suivantes :
- Une clé primaire (`PRIMARY KEY`) par table, identifiant unique de l'enregistrement.
- L'utilisation de `NOT NULL` pour les colonnes stratégiques (Nom, etc.).
- La déclaration propre des clés étrangères (`FOREIGN KEY`) pour garantir l'intégrité référentielle.

## 3. L'Importance des Contraintes (ALTER TABLE)

L'ajout de contraintes a posteriori permet de sécuriser le modèle sans alourdir le script de création initial.

```sql
ALTER TABLE Pilote ADD CONSTRAINT chk_salaire CHECK (Salaire > 0);
```

Cette syntaxe garantit que les données insérées respectent la logique métier (pas de salaire négatif, pas d'avion à capacité négative, etc.). Une base de données robuste est la clé d'un SI pérenne.
