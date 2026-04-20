# Correction Intégrale : Sujet 2 (Ventes & Banque)

## Partie A : Théorie
1. **Marketing Digital vs Traditionnel** : Le digital est mesurable, interactif et moins cher que l'affichage ou la TV traditionnelle.
2. **B2B vs B2C** : B2B (Entreprise à Entreprise), B2C (Entreprise à Particulier/Consommateur).
3. **Marketplace** : Plateforme de mise en relation (ex: boutique de fournitures scolaires multi-vendeurs).

---

## Partie B : Pratique

### Section 1 : UML (Ouverture Compte & Bibliothèque)
- **Héritage** : Client -> ClientCND (Compte Non-Résident Devises).
- **Classes** : Bibliothèque possède Document (Livre, Film) avec une méthode `calculerFraisRetard()`.

### Section 2 : SQL (Gestion des Ventes)
```sql
-- Produits moins chers que la moyenne
SELECT NomP FROM Produit WHERE PrixP < (SELECT AVG(PrixP) FROM Produit);

-- Clients habitant la même ville que C2
SELECT NomCli FROM Client WHERE VilleCli = (SELECT VilleCli FROM Client WHERE IdCli = 'C2') AND IdCli <> 'C2';

-- Suppression par date et ville
DELETE FROM Vente WHERE IdCli IN (SELECT IdCli FROM Client WHERE VilleCli = 'Douala') 
AND DateV < '2025-03-01';
```

### Section 3 : Web (Fournitures Scolaires)
- **FormulaireContact.php** : Ajout des champs `quartier` et `telephone` requis par l'énoncé.
- **Scolaire.js** : Affiche les cahiers, stylos et manuels avec leur prix.

### Section 4 : Java (Classe Article)
- **Visibilité protégée** : `protected String code;`
- **Exceptions** : `throw new CategorieInvalideException()` si la catégorie n'est pas Informatique ou Bureautique.
- **toString** : `"A01;Clavier;15000;Informatique"`.
- **Equals** : Vérification de l'égalité structurelle (tous les champs).
