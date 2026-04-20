# MASTERCLASS JAVA ZÉRO À HÉROS : Programmation Orientée Objet (POO) Avancée

## Scénario : Sécuriser les règles métier

Le diagramme UML de MaillotPro est validé. Il faut maintenant l'implémenter en Java. Java n'est pas un langage de script, c'est un langage compilé, fortement typé, orienté objet. Son but est de construire des applications d'entreprise (Back-Office bancaire, ERP, etc.) qui ne plantent jamais. 
La règle absolue en POO : **L'objet est responsable de sa propre intégrité**. Vous ne devez jamais permettre au système de créer un Maillot avec un prix négatif, ou une quantité en stock impossible.

### 1. Le Bouclier Absolu : L'Encapsulation

L'encapsulation est le pilier #1 de la POO. 
- **La Règle** : TOUS les attributs de classe DOIVENT être `private`. 
- **L'Accès** : L'accès en lecture et écriture se fait via des méthodes `public` appelées Getters et Setters.
- **L'Objectif** : Contrôler la validité des données. Dans le setter `setPrix()`, vous pouvez ajouter une condition `if (prix < 0)`. Si l'attribut était public, n'importe qui pourrait faire `monArticle.prix = -500;` et détruire votre système.

### 2. L'Identité des Objets : equals() et hashCode()

En Java, l'opérateur `==` compare des *références mémoire*. 
Si vous avez `Article a1 = new Article(1, "Maillot PSG");` et `Article a2 = new Article(1, "Maillot PSG");`, alors `a1 == a2` renverra **FALSE**. Ce sont deux objets différents en mémoire, même s'ils ont les mêmes valeurs.
Pour comparer le *contenu*, vous devez surcharger (override) la méthode `equals()`. Pour MaillotPro, on considère que deux articles sont les mêmes s'ils ont le même `idArticle`.

### 3. Gérer l'Imprévu : Les Exceptions Personnalisées

Que faire si un programmeur essaie de définir un prix négatif ? On ne fait pas un vulgaire `System.out.println("Erreur")`. On lève une Exception. Cela force le programme appelant à gérer l'erreur de manière structurée via un bloc `try...catch`. En tant que Senior, vous allez créer vos propres classes d'Exceptions métier.

### 4. Le Code Masterpiece : L'Article Indestructible

Voici l'implémentation de la classe `Article` basée sur notre UML, avec encapsulation stricte, gestion des exceptions et redéfinition d'égalité.

```java
package com.maillotpro.models;

import java.util.Objects;

/**
 * Exception métier personnalisée pour les erreurs de règles de gestion
 */
class RègleMetierException extends IllegalArgumentException {
    public RègleMetierException(String message) {
        super(message);
    }
}

/**
 * Classe représentant un Article dans la boutique MaillotPro.
 * @version 1.0 Production
 */
public class Article {
    
    // 1. ENCAPSULATION : Attributs privés
    private final int idArticle; // final car l'ID ne change jamais après création
    private String designation;
    private double prixHT;
    private int stock;
    
    private static final double TAUX_TVA = 0.20; // Constante de classe

    /**
     * Constructeur strict
     */
    public Article(int idArticle, String designation, double prixHT, int stockInitial) {
        if (idArticle <= 0) {
            throw new RègleMetierException("L'ID de l'article doit être positif.");
        }
        
        this.idArticle = idArticle;
        this.setDesignation(designation); // On passe par les setters pour appliquer les contrôles !
        this.setPrixHT(prixHT);
        this.setStock(stockInitial);
    }

    // 2. GETTERS & SETTERS SÉCURISÉS

    public int getIdArticle() { return idArticle; }
    // Pas de setIdArticle car l'attribut est final

    public String getDesignation() { return designation; }

    public void setDesignation(String designation) {
        if (designation == null || designation.trim().isEmpty()) {
            throw new RègleMetierException("La désignation ne peut pas être vide.");
        }
        this.designation = designation.trim();
    }

    public double getPrixHT() { return prixHT; }

    public void setPrixHT(double prixHT) {
        if (prixHT <= 0) {
            throw new RègleMetierException("Le prix HT doit être strictement supérieur à zéro.");
        }
        this.prixHT = prixHT;
    }

    public int getStock() { return stock; }

    public void setStock(int stock) {
        if (stock < 0) {
            throw new RègleMetierException("Le stock ne peut pas être négatif.");
        }
        this.stock = stock;
    }

    // 3. MÉTHODES MÉTIER

    /**
     * Calcule le prix Toutes Taxes Comprises.
     * @return le prix TTC
     */
    public double getPrixTTC() {
        return this.prixHT * (1 + TAUX_TVA);
    }

    /**
     * Tente de déduire une quantité du stock lors d'une commande.
     * @param quantite La quantité à déduire
     * @return true si le stock a pu être déduit, false en cas de rupture
     */
    public boolean deduireStock(int quantite) {
        if (quantite <= 0) return false;
        
        if (this.stock >= quantite) {
            this.stock -= quantite;
            return true;
        }
        return false; // Rupture de stock
    }

    // 4. IDENTITÉ DE L'OBJET : Surcharge equals et hashCode

    @Override
    public boolean equals(Object o) {
        // Optimisation : si c'est la même référence mémoire, c'est le même objet
        if (this == o) return true;
        
        // Si l'objet comparé est null ou d'une autre classe, c'est faux
        if (o == null || getClass() != o.getClass()) return false;
        
        // Cast (Transtypage) sûr
        Article article = (Article) o;
        
        // La règle métier : deux articles sont identiques s'ils ont le même ID
        return idArticle == article.idArticle;
    }

    @Override
    public int hashCode() {
        // Doit toujours être redéfini quand equals l'est (utilisé par HashMap/HashSet)
        return Objects.hash(idArticle);
    }

    @Override
    public String toString() {
        return String.format("[%d] %s - Prix: %.0f FCFA - En Stock: %d", 
                idArticle, designation, getPrixTTC(), stock);
    }
}
```

### Leçon du Senior
Regardez le Constructeur. L'erreur classique est de faire `this.prixHT = prixHT;`. NON ! Le constructeur DOIT utiliser ses propres Setters : `this.setPrixHT(prixHT);`. Pourquoi ? Pour que la validation (empêcher un prix négatif) s'applique dès la création de l'objet, centralisant ainsi la règle métier en un seul point (le Setter). C'est ça, la programmation d'entreprise : construire un code défensif.