# FICHE DE RÉVISION : LE LANGAGE JAVA (SPÉCIAL BTS)

Cette fiche constitue le socle de connaissances théoriques et pratiques nécessaires pour maîtriser le langage Java dans un contexte académique et professionnel.

---

## 1. DÉFINITIONS UNIVERSELLES ET CONCEPTS JAVA

### 1.1. Fondamentaux de l'Informatique
*   **Programmation :** Processus de conception et d'écriture de code source destiné à accomplir une tâche.
*   **Algorithme :** Suite logique d'instructions indépendante du langage.
*   **Programme :** Traduction concrète d'un algorithme dans un langage (ex: Java).
*   **Variable :** Conteneur mémoire nommé pour stocker des données modifiables.
*   **Constante :** Identifiant à valeur fixe (mot-clé `final` en Java).
*   **Type de donnée :** Classification des données (ex: `int`, `double`, `boolean`, `String`).

### 1.2. L'Architecture Java
*   **Bytecode :** Format intermédiaire (`.class`) indépendant de la plateforme.
*   **JVM (Java Virtual Machine) :** Interprète le bytecode et gère la mémoire (Garbage Collector).
*   **JDK (Java Development Kit) :** Outils complets pour le développement (compilateur, JRE).

---

## 2. SYNTAXE DES STRUCTURES DE CONTRÔLE

### 2.1. Structures Conditionnelles
*   `if / else if / else` : Choix basé sur des conditions booléennes.
*   `switch` : Sélection multiple sur des valeurs fixes.

### 2.2. Structures Itératives (Boucles)
*   `for` : Itération avec compteur.
*   `while` : Itération tant que vrai (test au début).
*   `do-while` : Itération tant que vrai (test à la fin).
*   `for-each` : Parcours simplifié de collections.

---

## 3. MODULARITÉ : LES MÉTHODES

*   **Méthodes Statiques (`static`) :** Appartiennent à la classe, appelables sans instance.
*   **Méthodes d'Instance :** Appartiennent à l'objet, manipulent l'état via `this`.
*   **Type de retour :** `void` pour aucune valeur, ou type spécifique (ex: `int`).

---

## 4. PROGRAMMATION ORIENTÉE OBJET (POO)

*   **Encapsulation :** Attributs `private`, accès via Getters/Setters.
*   **Héritage (`extends`) :** Transmission des propriétés d'une classe mère à une classe fille.
*   **Interfaces (`implements`) :** Contrats de comportement.
*   **Polymorphisme :** Capacité d'une référence à désigner des objets de types différents.

---

## 5. EXERCICE DE SYNTHÈSE : SYSTÈME DE PAIE ERP

**Énoncé :**
1. Créer une classe `Salarie` avec un nom et un salaire fixe (en FCFA).
2. Créer une classe `Commercial` héritant de `Salarie` avec une variable `chiffreAffaires` et une prime de 5% du CA.
3. Implémenter une classe de test instanciant un commercial et affichant sa rémunération totale.

**Solution :**
```java
// --- LOGIQUE METIER ---
class Salarie {
    protected String nom;
    protected double salaireFixe;

    public Salarie(String nom, double salaireFixe) {
        this.nom = nom;
        this.salaireFixe = salaireFixe;
    }

    public double calculerSalaireTotal() {
        return salaireFixe;
    }
}

class Commercial extends Salarie {
    private double chiffreAffaires;

    public Commercial(String nom, double salaireFixe, double ca) {
        super(nom, salaireFixe);
        this.chiffreAffaires = ca;
    }

    @Override
    public double calculerSalaireTotal() {
        return salaireFixe + (chiffreAffaires * 0.05);
    }
}

// --- CODE DE TEST ---
public class GestionPaie {
    public static void main(String[] args) {
        Commercial c = new Commercial("Jean EBOUE", 300000, 2500000);
        
        System.out.println("Fiche de paie de : " + c.nom);
        System.out.println("Salaire Total : " + c.calculerSalaireTotal() + " FCFA");
    }
}
```

**Résultat attendu (Console) :**
```text
Fiche de paie de : Jean EBOUE
Salaire Total : 425000.0 FCFA
```

---

## 6. EXERCICES PROGRESSIFS (MODÈLE ACADÉMIQUE)

### Exercice 1 : Calcul de Facture (Arithmétique)
**Énoncé :**
1. Déclarer les variables pour une quantité d'articles et un prix unitaire en FCFA.
2. Calculer le montant Total TTC avec une TVA de 18%.
3. Afficher le montant final dans la console.

**Solution :**
```java
public class Facturation {
    public static void main(String[] args) {
        int quantite = 10;
        double prixUnitaire = 2500.0;
        double tva = 0.18;
        
        double totalHT = quantite * prixUnitaire;
        double totalTTC = totalHT * (1 + tva);
        
        System.out.println("Total Hors Taxe : " + totalHT + " FCFA");
        System.out.println("Total TTC (18%) : " + totalTTC + " FCFA");
    }
}
```

**Résultat attendu (Console) :**
```text
Total Hors Taxe : 25000.0 FCFA
Total TTC (18%) : 29500.0 FCFA
```

---

### Exercice 2 : Système de Remise (Conditionnelle)
**Énoncé :**
1. Simuler un achat d'un montant donné en FCFA.
2. Appliquer une remise de 10% si le montant dépasse 100 000 FCFA.
3. Afficher le montant de la remise et le net à payer.

**Solution :**
```java
public class Caisse {
    public static void main(String[] args) {
        double montantAchat = 120000.0;
        double remise = 0;
        
        if (montantAchat > 100000) {
            remise = montantAchat * 0.10;
        }
        
        System.out.println("Achat : " + montantAchat + " FCFA");
        System.out.println("Remise appliquee : " + remise + " FCFA");
        System.out.println("Net a payer : " + (montantAchat - remise) + " FCFA");
    }
}
```

**Résultat attendu (Console) :**
```text
Achat : 120000.0 FCFA
Remise appliquee : 12000.0 FCFA
Net a payer : 108000.0 FCFA
```

---

### Exercice 3 : Tableau d'Amortissement Simplifié (Boucle)
**Énoncé :**
1. Déclarer une dette initiale de 500 000 FCFA.
2. Simuler 5 remboursements mensuels de 100 000 FCFA.
3. Afficher le reste à payer à chaque mois via une boucle `for`.

**Solution :**
```java
public class Amortissement {
    public static void main(String[] args) {
        double dette = 500000.0;
        double mensualite = 100000.0;
        
        for (int mois = 1; mois <= 5; mois++) {
            dette -= mensualite;
            System.out.println("Mois " + mois + " : Reste a payer " + dette + " FCFA");
        }
    }
}
```

**Résultat attendu (Console) :**
```text
Mois 1 : Reste a payer 400000.0 FCFA
Mois 2 : Reste a payer 300000.0 FCFA
Mois 3 : Reste a payer 200000.0 FCFA
Mois 4 : Reste a payer 100000.0 FCFA
Mois 5 : Reste a payer 0.0 FCFA
```

---

### Exercice 4 : Conversion de Devises (Méthodes Statiques)
**Énoncé :**
1. Créer une méthode statique `euroToFcfa` prenant un montant en Euro et retournant sa valeur en FCFA (Taux : 655.957).
2. Créer le programme principal pour tester cette méthode.
3. Afficher le résultat de la conversion de 100 Euros.

**Solution :**
```java
public class Convertisseur {
    public static double euroToFcfa(double montantEuro) {
        return montantEuro * 655.957;
    }

    public static void main(String[] args) {
        double euros = 100.0;
        System.out.println(euros + " Euros = " + euroToFcfa(euros) + " FCFA");
    }
}
```

**Résultat attendu (Console) :**
```text
100.0 Euros = 65595.7 FCFA
```

---

### Exercice 5 : Gestion de Portefeuille (Classe & Encapsulation)
**Énoncé :**
1. Créer une classe `Portefeuille` avec un attribut privé `soldeFcfa`.
2. Implémenter des méthodes `crediter(montant)` et `getSolde()`.
3. Empêcher tout crédit négatif.

**Solution :**
```java
class Portefeuille {
    private double soldeFcfa;

    public void crediter(double montant) {
        if (montant > 0) {
            this.soldeFcfa += montant;
        }
    }

    public double getSolde() {
        return this.soldeFcfa;
    }
}

public class TestBanque {
    public static void main(String[] args) {
        Portefeuille p = new Portefeuille();
        p.crediter(50000);
        System.out.println("Solde du portefeuille : " + p.getSolde() + " FCFA");
    }
}
```

**Résultat attendu (Console) :**
```text
Solde du portefeuille : 50000.0 FCFA
```

---

### Exercice 6 : Inventaire Mobile (Héritage)
**Énoncé :**
1. Créer une classe `Article` avec `designation` et `prixFcfa`.
2. Créer une classe `Telephone` héritant de `Article` ajoutant un attribut `marque`.
3. Afficher les caractéristiques complètes d'un téléphone.

**Solution :**
```java
class Article {
    protected String designation;
    protected int prixFcfa;

    public Article(String des, int prix) {
        this.designation = des;
        this.prixFcfa = prix;
    }
}

class Telephone extends Article {
    private String marque;

    public Telephone(String des, int prix, String marque) {
        super(des, prix);
        this.marque = marque;
    }

    public void afficher() {
        System.out.println("Produit : " + designation + " | Marque : " + marque);
        System.out.println("Prix : " + prixFcfa + " FCFA");
    }
}

public class GestionStock {
    public static void main(String[] args) {
        Telephone t = new Telephone("Smartphone Pro", 450000, "Samsux");
        t.afficher();
    }
}
```

**Résultat attendu (Console) :**
```text
Produit : Smartphone Pro | Marque : Samsux
Prix : 450000 FCFA
```

---

### Exercice 7 : Contrat de Services (Interface)
**Énoncé :**
1. Définir une interface `Tarifiable` avec une méthode `getTarifJournalier()`.
2. Implémenter cette interface dans une classe `Consultant`.
3. Afficher le tarif journalier du consultant en FCFA.

**Solution :**
```java
interface Tarifiable {
    int getTarifJournalier();
}

class Consultant implements Tarifiable {
    public int getTarifJournalier() {
        return 150000;
    }
}

public class Prestation {
    public static void main(String[] args) {
        Tarifiable c = new Consultant();
        System.out.println("Tarif Expert : " + c.getTarifJournalier() + " FCFA / jour");
    }
}
```

**Résultat attendu (Console) :**
```text
Tarif Expert : 150000 FCFA / jour
```

---

### Exercice 8 : Suivi des Commandes (ArrayList)
**Énoncé :**
1. Créer une liste de montants de commandes (ArrayList d'entiers).
2. Ajouter 3 montants en FCFA.
3. Calculer la somme totale des commandes via un parcours de liste.

**Solution :**
```java
import java.util.ArrayList;

public class SuiviCommandes {
    public static void main(String[] args) {
        ArrayList<Integer> commandes = new ArrayList<>();
        commandes.add(25000);
        commandes.add(45000);
        commandes.add(15000);
        
        int total = 0;
        for (int m : commandes) {
            total += m;
        }
        
        System.out.println("Nombre de commandes : " + commandes.size());
        System.out.println("Chiffre d'affaires total : " + total + " FCFA");
    }
}
```

**Résultat attendu (Console) :**
```text
Nombre de commandes : 3
Chiffre d'affaires total : 85000 FCFA
```

---

### Exercice 9 : Sécurisation de Retrait (Exceptions)
**Énoncé :**
1. Simuler une méthode `retirer(montant)` qui lève une exception si le montant est supérieur à 10 000 FCFA (limite de retrait).
2. Utiliser un bloc `try-catch` pour capturer l'erreur dans le `main`.
3. Afficher un message d'alerte.

**Solution :**
```java
public class Guichet {
    public static void retirer(int montant) throws Exception {
        if (montant > 10000) {
            throw new Exception("Plafond de retrait depasse !");
        }
        System.out.println("Retrait effectue : " + montant + " FCFA");
    }

    public static void main(String[] args) {
        try {
            retirer(15000);
        } catch (Exception e) {
            System.out.println("ALERTE : " + e.getMessage());
        }
    }
}
```

**Résultat attendu (Console) :**
```text
ALERTE : Plafond de retrait depasse !
```

---

### Exercice 10 : Rapport d'Audit (Polymorphisme)
**Énoncé :**
1. Créer une classe `Compte` avec une méthode `genererRapport()`.
2. Créer des classes filles `CompteCourant` et `CompteEpargne` redéfinissant le rapport.
3. Utiliser un tableau de `Compte` pour afficher les rapports de manière polymorphe.

**Solution :**
```java
class Compte {
    public void genererRapport() {
        System.out.println("Rapport standard du compte.");
    }
}

class CompteCourant extends Compte {
    @Override
    public void genererRapport() {
        System.out.println("Audit Compte Courant : Aucune anomalie.");
    }
}

class CompteEpargne extends Compte {
    @Override
    public void genererRapport() {
        System.out.println("Audit Compte Epargne : Interets calcules.");
    }
}

public class AuditBanque {
    public static void main(String[] args) {
        Compte[] comptes = { new CompteCourant(), new CompteEpargne() };
        
        for (Compte c : comptes) {
            c.genererRapport();
        }
    }
}
```

**Résultat attendu (Console) :**
```text
Audit Compte Courant : Aucune anomalie.
Audit Compte Epargne : Interets calcules.
```
