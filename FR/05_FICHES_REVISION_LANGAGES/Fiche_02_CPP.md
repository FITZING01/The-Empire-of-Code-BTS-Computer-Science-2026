# Fiche de Révision Magistrale : Programmation en C++ (Standard BTS)

Cette fiche constitue le socle de connaissances impératif pour la maîtrise du développement logiciel en environnement industriel et académique. Elle lie les concepts algorithmiques universels à leur implémentation rigoureuse en C++.

---

## 1. DÉFINITIONS UNIVERSELLES (LES FONDAMENTAUX)

*   **Programmation** : Discipline consistant à concevoir, écrire, tester et maintenir le code source d'un logiciel.
*   **Algorithme** : Suite finie, ordonnée et non ambiguë d'opérations permettant de résoudre un problème.
*   **Programme** : Réalisation concrète d'un algorithme sous forme d'un fichier exécutable après compilation.
*   **Variable** : Emplacement nommé dans la RAM permettant de stocker une valeur modifiable.
*   **Constante** : Identificateur dont la valeur est fixée lors de la déclaration via `const`.
*   **Type de donnée** : Attribut indiquant la nature de la valeur et l'espace mémoire requis (ex: `int`, `double`, `bool`).

---

## 2. SYNTAXE DES STRUCTURES DE CONTRÔLE EN C++

### 2.1. Structures Conditionnelles
*   **`if` / `else if` / `else`** : Branchement conditionnel.
*   **`switch`** : Sélection multiple sur valeurs discrètes.

### 2.2. Structures Itératives
*   **`for`** : Répétition avec compteur.
*   **`while`** : Répétition tant qu'une condition est vraie (test initial).
*   **`do-while`** : Répétition avec test final (une exécution garantie).

---

## 3. MODULARITÉ & PROGRAMMATION ORIENTÉE OBJET (POO)

### 3.1. Approche Structurée
*   **Fonction** : Retourne une valeur.
*   **Procédure** : Fonction de type `void`.
*   **Surcharge** : Plusieurs fonctions de même nom avec des paramètres différents.

### 3.2. Approche Orientée Objet (POO)
*   **Classe** : Modèle de données et de comportements.
*   **Objet** : Instance concrète d'une classe.
*   **Encapsulation** : Protection via `private`, `public` et `protected`.
*   **Héritage** : Spécialisation d'une classe existante.
*   **Polymorphisme** : Capacité d'un objet à prendre plusieurs formes via les fonctions `virtual`.

---

## 4. STRUCTURES DE DONNÉES
*   **Tableaux Statiques** : Taille fixe.
*   **Vecteurs (`vector`)** : Tableaux dynamiques de la STL.
*   **String** : Gestion évoluée des chaînes de caractères.

---

## 5. EXERCICES D'APPLICATION (MODÈLE ACADÉMIQUE)

### Exercice 1 : Calcul de Versement Initial (Flux d'entrée/sortie)
**Énoncé :**
1. Déclarer les variables pour le prix d'un terrain (double) et le pourcentage d'apport (double).
2. Calculer le montant du versement initial en FCFA.
3. Afficher le résultat avec un message explicite.

**Solution :**
```cpp
#include <iostream>
#include <iomanip>

using namespace std;

int main() {
    double prix_terrain = 15000000.0;
    double taux_apport = 0.30; // 30%
    double versement_initial;

    versement_initial = prix_terrain * taux_apport;

    cout << fixed << setprecision(0);
    cout << "--- EVALUATION FINANCIERE ---" << endl;
    cout << "Prix du terrain : " << prix_terrain << " FCFA" << endl;
    cout << "Apport requis (30%) : " << versement_initial << " FCFA" << endl;
    cout << "-----------------------------" << endl;

    return 0;
}
```

**Résultat attendu (Console) :**
```text
--- EVALUATION FINANCIERE ---
Prix du terrain : 15000000 FCFA
Apport requis (30%) : 4500000 FCFA
-----------------------------
```

---

### Exercice 2 : Validation de Saisie d'un Tarif (Boucle Do-While)
**Énoncé :**
1. Déclarer une variable `prix_article` (entier).
2. Utiliser une boucle `do-while` pour forcer la saisie d'un prix positif entre 500 et 100 000 FCFA.
3. Afficher le prix final validé.

**Solution :**
```cpp
#include <iostream>

using namespace std;

int main() {
    int prix_article;

    do {
        cout << "Veuillez saisir le prix de l'article (500 - 100000 FCFA) : ";
        cin >> prix_article;
        
        if (prix_article < 500 || prix_article > 100000) {
            cout << "ERREUR : Tarif hors limites." << endl;
        }
    } while (prix_article < 500 || prix_article > 100000);

    cout << "Prix valide : " << prix_article << " FCFA" << endl;

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Veuillez saisir le prix de l'article (500 - 100000 FCFA) : 250
ERREUR : Tarif hors limites.
Veuillez saisir le prix de l'article (500 - 100000 FCFA) : 12500
Prix valide : 12500 FCFA
```

---

### Exercice 3 : Surcharge de Calcul de Commission (Modularité)
**Énoncé :**
1. Implémenter une fonction `calculerCommission` prenant un montant de vente (double) et appliquant 5%.
2. Surcharger la fonction pour prendre un montant de vente et un grade (entier), appliquant 10% si grade == 1.
3. Tester les deux fonctions dans le `main`.

**Solution :**
```cpp
#include <iostream>

using namespace std;

/* Fonction de base : 5% de commission */
double calculerCommission(double vente) {
    return vente * 0.05;
}

/* Surcharge : 10% pour le grade 1, sinon 5% */
double calculerCommission(double vente, int grade) {
    if (grade == 1) return vente * 0.10;
    return vente * 0.05;
}

int main() {
    double vente_mensuelle = 1000000.0;

    cout << "Commission standard : " << calculerCommission(vente_mensuelle) << " FCFA" << endl;
    cout << "Commission Manager (Grade 1) : " << calculerCommission(vente_mensuelle, 1) << " FCFA" << endl;

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Commission standard : 50000 FCFA
Commission Manager (Grade 1) : 100000 FCFA
```

---

### Exercice 4 : Moyenne des Recettes Journalières (Tableaux)
**Énoncé :**
1. Déclarer un tableau de 3 recettes journalières en FCFA.
2. Calculer la somme et la moyenne via une boucle `for`.
3. Afficher la moyenne formatée.

**Solution :**
```cpp
#include <iostream>

using namespace std;

int main() {
    int recettes[3] = {45000, 62000, 53000};
    int total = 0;

    for (int i = 0; i < 3; i++) {
        total += recettes[i];
    }

    double moyenne = total / 3.0;

    cout << "Total des recettes : " << total << " FCFA" << endl;
    cout << "Moyenne journaliere : " << moyenne << " FCFA" << endl;

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Total des recettes : 160000 FCFA
Moyenne journaliere : 53333.3 FCFA
```

---

### Exercice 5 : Classe de Gestion de Compte Epargne (Encapsulation)
**Énoncé :**
1. Créer une classe `CompteEpargne` avec un attribut privé `solde`.
2. Implémenter un constructeur et une méthode `deposer(montant)`.
3. Ajouter une méthode `afficherSolde()` et tester l'ensemble.

**Solution :**
```cpp
#include <iostream>
#include <string>

using namespace std;

class CompteEpargne {
private:
    double solde;
public:
    CompteEpargne(double initial) : solde(initial) {}

    void deposer(double montant) {
        if (montant > 0) solde += montant;
    }

    void afficherSolde() {
        cout << "Solde actuel de l'epargne : " << solde << " FCFA" << endl;
    }
};

int main() {
    CompteEpargne monCompte(50000);
    monCompte.deposer(25000);
    monCompte.afficherSolde();

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Solde actuel de l'epargne : 75000 FCFA
```

---

### Exercice 6 : Liste Dynamique d'Articles (Vector)
**Énoncé :**
1. Utiliser `std::vector` pour stocker des noms de produits (string).
2. Ajouter "Ordinateur", "Imprimante" et "Scanner" à la liste.
3. Afficher le nombre d'articles et le contenu de la liste via une boucle.

**Solution :**
```cpp
#include <iostream>
#include <vector>
#include <string>

using namespace std;

int main() {
    vector<string> stock;

    stock.push_back("Ordinateur");
    stock.push_back("Imprimante");
    stock.push_back("Scanner");

    cout << "Inventaire (Taille : " << stock.size() << ")" << endl;
    for (const string& article : stock) {
        cout << "- " << article << endl;
    }

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Inventaire (Taille : 3)
- Ordinateur
- Imprimante
- Scanner
```

---

### Exercice 7 : Héritage de Personnel (Specialisation)
**Énoncé :**
1. Créer une classe de base `Employe` avec un nom et un salaire de base (en FCFA).
2. Créer une classe dérivée `Directeur` ajoutant une prime de fonction fixe de 200 000 FCFA.
3. Afficher le salaire total du directeur.

**Solution :**
```cpp
#include <iostream>
#include <string>

using namespace std;

class Employe {
protected:
    string nom;
    double salaireBase;
public:
    Employe(string n, double s) : nom(n), salaireBase(s) {}
};

class Directeur : public Employe {
private:
    double primeFonction = 200000.0;
public:
    Directeur(string n, double s) : Employe(n, s) {}
    
    void afficherPaie() {
        cout << "Directeur : " << nom << endl;
        cout << "Total a percevoir : " << (salaireBase + primeFonction) << " FCFA" << endl;
    }
};

int main() {
    Directeur dir("Monsieur TOURE", 800000);
    dir.afficherPaie();

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Directeur : Monsieur TOURE
Total a percevoir : 1000000 FCFA
```

---

### Exercice 8 : Polymorphisme de Tarification (Virtual)
**Énoncé :**
1. Déclarer une classe abstraite `Client` avec une méthode virtuelle pure `calculerPrix(prixBrut)`.
2. Créer `ClientFidele` (remise 10%) et `ClientPassager` (pas de remise).
3. Utiliser un pointeur de la classe de base pour tester le polymorphisme.

**Solution :**
```cpp
#include <iostream>

using namespace std;

class Client {
public:
    virtual double calculerPrix(double prixBrut) = 0; // Virtuelle pure
    virtual ~Client() {}
};

class ClientFidele : public Client {
public:
    double calculerPrix(double prixBrut) override {
        return prixBrut * 0.90;
    }
};

class ClientPassager : public Client {
public:
    double calculerPrix(double prixBrut) override {
        return prixBrut;
    }
};

int main() {
    Client* c1 = new ClientFidele();
    Client* c2 = new ClientPassager();
    double achat = 100000.0;

    cout << "Prix Client Fidele  : " << c1->calculerPrix(achat) << " FCFA" << endl;
    cout << "Prix Client Passager: " << c2->calculerPrix(achat) << " FCFA" << endl;

    delete c1;
    delete c2;
    return 0;
}
```

**Résultat attendu (Console) :**
```text
Prix Client Fidele  : 90000 FCFA
Prix Client Passager: 100000 FCFA
```

---

### Exercice 9 : Association de Vente (Logique métier)
**Énoncé :**
1. Créer une classe `Produit` avec nom et prix.
2. Créer une classe `Commande` contenant un pointeur vers un `Produit` et une quantité.
3. Calculer le total de la commande en FCFA.

**Solution :**
```cpp
#include <iostream>
#include <string>

using namespace std;

class Produit {
public:
    string nom;
    int prix;
    Produit(string n, int p) : nom(n), prix(p) {}
};

class Commande {
private:
    Produit* p;
    int quantite;
public:
    Commande(Produit* art, int qte) : p(art), quantite(qte) {}
    int calculerTotal() {
        return p->prix * quantite;
    }
};

int main() {
    Produit p1("Smartphone", 150000);
    Commande c1(&p1, 2);

    cout << "Facture Commande : " << endl;
    cout << "Article : " << p1.nom << " (x2)" << endl;
    cout << "Total : " << c1.calculerTotal() << " FCFA" << endl;

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Facture Commande : 
Article : Smartphone (x2)
Total : 300000 FCFA
```

---

### Exercice 10 : Gestion de Stock de Boissons (Système complet)
**Énoncé :**
1. Définir une structure `Boisson` avec nom et prix unitaire.
2. Créer un vecteur de structures `Boisson` représentant le stock.
3. Calculer la valeur totale du stock en FCFA via une boucle de parcours.

**Solution :**
```cpp
#include <iostream>
#include <vector>
#include <string>

using namespace std;

struct Boisson {
    string nom;
    int prix;
};

int main() {
    vector<Boisson> stock = {
        {"Eau Minerale", 500},
        {"Soda Citron", 800},
        {"Jus d'Orange", 1200}
    };

    int valeurTotale = 0;

    cout << "--- ETAT DU STOCK ---" << endl;
    for (const auto& b : stock) {
        cout << b.nom << " : " << b.prix << " FCFA" << endl;
        valeurTotale += b.prix;
    }
    cout << "----------------------" << endl;
    cout << "Valeur du stock : " << valeurTotale << " FCFA" << endl;

    return 0;
}
```

**Résultat attendu (Console) :**
```text
--- ETAT DU STOCK ---
Eau Minerale : 500 FCFA
Soda Citron : 800 FCFA
Jus d'Orange : 1200 FCFA
----------------------
Valeur du stock : 2500 FCFA
```
