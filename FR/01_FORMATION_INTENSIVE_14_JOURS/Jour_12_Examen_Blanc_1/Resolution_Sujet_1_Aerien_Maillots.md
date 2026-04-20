# Correction Intégrale : Sujet 1 (Aérien & Maillots)

## Partie A : Théorie (Extraits Choisis)
1. **URL (4 éléments)** : Protocole (http), Domaine (www.air-cameroun.cm), Port (80), Chemin (/vols/recherche).
2. **Local Storage** : Utilisé pour stocker le panier de maillots du client entre deux sessions sans interaction serveur.
3. **Responsive** : Utilisation des Media Queries pour adapter l'affichage du site de vol sur mobile.

---

## Partie B : Pratique

### Section 1 : UML (Vente de Billet)
- **Cas d'Utilisation** : Le client "Achète un billet". Cela inclut la recherche de vol, le choix d'une option et le paiement sécurisé par carte bancaire.
- **Séquence** : 
  - Client -> Soumet (VilleD, VilleA, Date).
  - Serveur -> Retourne Liste Vols.
  - Client -> Sélectionne Vol.
  - Serveur -> Demande Paiement (CB).

### Section 2 : SQL (Gestion des Vols)
```sql
-- Afficher les données des avions dont la capacité est la plus basse
SELECT * FROM Avion WHERE CapaciteAV = (SELECT MIN(CapaciteAV) FROM Avion);

-- Noms des pilotes conduisant un AIRBUS en service
SELECT NomPIL FROM Pilote p JOIN Vol v ON p.NumPIL = v.NumPIL 
JOIN Avion a ON v.NumAV = a.NumAV WHERE a.NomAV = 'AIRBUS';
```

### Section 3 : Web (Marketplace Maillots)
- **Index.php** : Contient le titre `<meta>` et le lien vers `ListeMaillots.php`.
- **Maillot.js** : Utilise une boucle pour afficher 5 maillots (Cameroun, France, Brésil, Argentine, Sénégal).
- **FormContact.php** : Valide l'email avec `filter_var()`.

### Section 4 : Java (Classe Account)
- Implémentation du constructeur `Account(double initial)` et de la méthode `ajouterInteret(double taux)`.
- Exemple : Un solde de 1000 avec un taux de 0.05 devient 1050.
