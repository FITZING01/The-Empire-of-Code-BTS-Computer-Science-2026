# FICHE DE RÉVISION : LA PROGRAMMATION STRUCTURÉE EN C

## 1. DÉFINITIONS UNIVERSELLES

*   **Programmation** : Processus consistant à concevoir, écrire, tester, déboguer et maintenir le code source d'un programme informatique. C'est l'acte de traduire une solution algorithmique en un langage formalisé pour automatiser des tâches.
*   **Algorithme** : Suite finie, structurée et non ambiguë d'instructions permettant de résoudre un problème donné. Il est indépendant de tout langage de programmation.
*   **Programme** : Traduction concrète d'un algorithme dans un langage spécifique (comme le C), transformée en langage machine par un compilateur.
*   **Variable** : Emplacement mémoire nommé dont le contenu peut être lu et modifié. Elle est définie par un identificateur, un type et une valeur.
*   **Constante** : Valeur fixe qui ne peut être modifiée durant l'exécution. Définie via `#define` ou le mot-clé `const`.
*   **Type de donnée** : Classification spécifiant la nature des valeurs (ex: `int`, `float`, `char`), leur taille en mémoire et les opérations autorisées.

---

## 2. SYNTAXE DES STRUCTURES DE CONTRÔLE

### 2.1. L'alternative : `if` / `else if` / `else`
Permet de bifurquer l'exécution selon une condition logique.
```c
if (condition) {
    /* Instructions si vrai */
} else {
    /* Instructions si faux */
}
```

### 2.2. Le choix multiple : `switch`
Aiguillage optimisé pour des tests d'égalité sur des entiers ou caractères.
```c
switch (variable) {
    case valeur1: /* code */; break;
    default: /* code par defaut */; break;
}
```

### 2.3. Les boucles : `for`, `while`, `do-while`
*   `for` : Pour un nombre d'itérations connu.
*   `while` : Tant qu'une condition est vraie (test au début).
*   `do-while` : Tant qu'une condition est vraie (test à la fin, au moins une exécution).

---

## 3. MODULARITÉ (FONCTIONS & PROCÉDURES)

En C, la modularité impose de séparer l'interface de l'implémentation.
1.  **Le Prototype** : Déclaration de la signature (type de retour, nom, paramètres) avant le `main`.
2.  **La Définition** : Implémentation réelle du corps de la fonction après le `main`.

---

## 4. STRUCTURES DE DONNÉES
*   **Tableaux** : Collection homogène d'éléments indexés à partir de 0.
*   **Structures (`struct`)** : Agrégation de variables de types hétérogènes.

---

## 5. EXERCICES D'APPLICATION (MODÈLE ACADÉMIQUE)

### Exercice 1 : Gestion de la Facturation Électrique
**Énoncé :**
1. Déclarer les variables nécessaires pour stocker un index de consommation (entier) et un prix unitaire (réel).
2. Calculer le montant Total Hors Taxe (THT) en FCFA.
3. Afficher la facture formatée avec deux chiffres après la virgule.

**Solution :**
```c
#include <stdio.h>

int main() {
    int index_consommation = 450;
    float prix_kwh = 75.5;
    float montant_tht;

    montant_tht = index_consommation * prix_kwh;

    printf("--- FACTURE D'ELECTRICITE ---\n");
    printf("Consommation : %d kWh\n", index_consommation);
    printf("Prix unitaire : %.2f FCFA\n", prix_kwh);
    printf("Montant THT  : %.2f FCFA\n", montant_tht);
    printf("-----------------------------\n");

    return 0;
}
```

**Résultat attendu (Console) :**
```text
--- FACTURE D'ELECTRICITE ---
Consommation : 450 kWh
Prix unitaire : 75.50 FCFA
Montant THT  : 33975.00 FCFA
-----------------------------
```

---

### Exercice 2 : Calcul de la Prime de Rendement
**Énoncé :**
1. Déclarer une constante `TAUX_PRIME` à 0.15 (15%).
2. Demander au programme de calculer la prime sur un chiffre d'affaires de 2 500 000 FCFA.
3. Afficher le chiffre d'affaires et le montant de la prime résultante.

**Solution :**
```c
#include <stdio.h>

#define TAUX_PRIME 0.15

int main() {
    double chiffre_affaires = 2500000.0;
    double montant_prime;

    montant_prime = chiffre_affaires * TAUX_PRIME;

    printf("[GESTION COMMERCIALE]\n");
    printf("Chiffre d'Affaires : %.0f FCFA\n", chiffre_affaires);
    printf("Prime (15%%)        : %.0f FCFA\n", montant_prime);

    return 0;
}
```

**Résultat attendu (Console) :**
```text
[GESTION COMMERCIALE]
Chiffre d'Affaires : 2500000 FCFA
Prime (15%)        : 375000 FCFA
```

---

### Exercice 3 : Contrôle de Solde Bancaire
**Énoncé :**
1. Déclarer une variable `solde` et une variable `retrait` (toutes deux en FCFA).
2. Utiliser une structure `if / else` pour vérifier si le retrait est possible (solde suffisant).
3. Afficher "Transaction validée" ou "Provision insuffisante" selon le cas.

**Solution :**
```c
#include <stdio.h>

int main() {
    float solde = 50000.0;
    float retrait = 65000.0;

    printf("Tentative de retrait de : %.0f FCFA\n", retrait);

    if (retrait <= solde) {
        solde -= retrait;
        printf("Statut : Transaction validee.\n");
        printf("Nouveau solde : %.0f FCFA\n", solde);
    } else {
        printf("Statut : Provision insuffisante (Manque %.0f FCFA).\n", retrait - solde);
    }

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Tentative de retrait de : 65000 FCFA
Statut : Provision insuffisante (Manque 15000 FCFA).
```

---

### Exercice 4 : Génération de Remises en Cascade
**Énoncé :**
1. Simuler un achat de 100 000 FCFA.
2. Appliquer une remise de 10% si le montant > 50 000 FCFA via une boucle `while` (simulant une application de remise par paliers).
3. Afficher le montant final à payer.

**Solution :**
```c
#include <stdio.h>

int main() {
    float montant_achat = 100000.0;
    float remise = 0.0;

    if (montant_achat > 50000.0) {
        remise = montant_achat * 0.10;
    }

    printf("Montant brut : %.0f FCFA\n", montant_achat);
    printf("Remise (10%%) : %.0f FCFA\n", remise);
    printf("Net a payer  : %.0f FCFA\n", montant_achat - remise);

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Montant brut : 100000 FCFA
Remise (10%) : 10000 FCFA
Net a payer  : 90000 FCFA
```

---

### Exercice 5 : Menu de Caisse Automatique
**Énoncé :**
1. Déclarer une variable `choix` pour un menu (1: Café, 2: Thé, 3: Jus).
2. Utiliser un `switch` pour attribuer un prix en FCFA à chaque boisson.
3. Afficher l'article choisi et son prix.

**Solution :**
```c
#include <stdio.h>

int main() {
    int choix = 2;
    int prix = 0;

    switch (choix) {
        case 1:
            printf("Selection : Cafe Expresso\n");
            prix = 500;
            break;
        case 2:
            printf("Selection : The Menthe\n");
            prix = 300;
            break;
        case 3:
            printf("Selection : Jus d'Ananas\n");
            prix = 800;
            break;
        default:
            printf("Erreur : Produit indisponible.\n");
            break;
    }

    if (prix > 0) {
        printf("Prix a payer : %d FCFA\n", prix);
    }

    return 0;
}
```

**Résultat attendu (Console) :**
```text
Selection : The Menthe
Prix a payer : 300 FCFA
```

---

### Exercice 6 : Calcul de la TVA (Modularité - Prototypes/Définitions)
**Énoncé :**
1. Déclarer le prototype d'une fonction `calculerTVA` prenant un montant HT et retournant le montant de la taxe (18%).
2. Définir la fonction `calculerTVA` après le `main`.
3. Dans le `main`, appeler cette fonction pour un montant de 500 000 FCFA et afficher le résultat.

**Solution :**
```c
#include <stdio.h>

/* 1. Prototype de la fonction */
float calculerTVA(float montant_ht);

int main() {
    float achat_ht = 500000.0;
    float tva_calculee;

    tva_calculee = calculerTVA(achat_ht);

    printf("Calcul de la taxe sur la valeur ajoutee :\n");
    printf("Base HT  : %.0f FCFA\n", achat_ht);
    printf("TVA (18%%): %.0f FCFA\n", tva_calculee);

    return 0;
}

/* 2. Definition de la fonction */
float calculerTVA(float montant_ht) {
    return montant_ht * 0.18;
}
```

**Résultat attendu (Console) :**
```text
Calcul de la taxe sur la valeur ajoutee :
Base HT  : 500000 FCFA
TVA (18%): 90000 FCFA
```

---

### Exercice 7 : Transfert de Crédit (Pointeurs & Adresses)
**Énoncé :**
1. Déclarer le prototype d'une procédure `transfererCredit` qui prend les adresses de deux soldes (pointeurs).
2. Implémenter la procédure pour qu'elle transfère 5 000 FCFA du solde source vers le solde destination.
3. Simuler l'opération entre deux comptes dans le `main` et afficher les nouveaux soldes.

**Solution :**
```c
#include <stdio.h>

/* Prototype */
void transfererCredit(int *source, int *destination, int montant);

int main() {
    int compte_A = 15000;
    int compte_B = 2000;

    printf("AVANT - Compte A: %d FCFA | Compte B: %d FCFA\n", compte_A, compte_B);

    /* Appel par adresse */
    transfererCredit(&compte_A, &compte_B, 5000);

    printf("APRES - Compte A: %d FCFA | Compte B: %d FCFA\n", compte_A, compte_B);

    return 0;
}

/* Definition */
void transfererCredit(int *source, int *destination, int montant) {
    if (*source >= montant) {
        *source -= montant;
        *destination += montant;
    }
}
```

**Résultat attendu (Console) :**
```text
AVANT - Compte A: 15000 FCFA | Compte B: 2000 FCFA
APRES - Compte A: 10000 FCFA | Compte B: 7000 FCFA
```

---

### Exercice 8 : Statistiques de Ventes (Tableaux)
**Énoncé :**
1. Déclarer un tableau `ventes` contenant 5 montants journaliers en FCFA.
2. Parcourir le tableau avec une boucle `for` pour calculer le cumul hebdomadaire.
3. Afficher le chiffre d'affaires total de la semaine.

**Solution :**
```c
#include <stdio.h>

int main() {
    int ventes[5] = {150000, 220000, 180000, 250000, 195000};
    int total_semaine = 0;
    int i;

    for (i = 0; i < 5; i++) {
        total_semaine += ventes[i];
    }

    printf("--- RAPPORT DE VENTES HEBDOMADAIRE ---\n");
    printf("Total cumule : %d FCFA\n", total_semaine);
    printf("Moyenne jour : %d FCFA\n", total_semaine / 5);

    return 0;
}
```

**Résultat attendu (Console) :**
```text
--- RAPPORT DE VENTES HEBDOMADAIRE ---
Total cumule : 995000 FCFA
Moyenne jour : 199000 FCFA
```

---

### Exercice 9 : Registre de Paie (Structures)
**Énoncé :**
1. Définir une structure `Employe` avec `id`, `nom` et `salaire` (en FCFA).
2. Instancier un employé et lui affecter des données.
3. Afficher la fiche de paie complète de l'employé.

**Solution :**
```c
#include <stdio.h>
#include <string.h>

typedef struct {
    int id;
    char nom[50];
    int salaire;
} Employe;

int main() {
    Employe emp;

    emp.id = 501;
    strcpy(emp.nom, "KOFFI Amadou");
    emp.salaire = 350000;

    printf("--- FICHE DE PAIE ---\n");
    printf("ID      : #%d\n", emp.id);
    printf("NOM     : %s\n", emp.nom);
    printf("SALAIRE : %d FCFA\n", emp.salaire);
    printf("---------------------\n");

    return 0;
}
```

**Résultat attendu (Console) :**
```text
--- FICHE DE PAIE ---
ID      : #501
NOM     : KOFFI Amadou
SALAIRE : 350000 FCFA
---------------------
```

---

### Exercice 10 : Optimisation de Stock (Tri à bulles)
**Énoncé :**
1. Déclarer un tableau de 5 prix de produits non triés en FCFA.
2. Implémenter l'algorithme du tri à bulles (prototypé et défini séparément).
3. Afficher la liste des prix triés par ordre croissant.

**Solution :**
```c
#include <stdio.h>

/* Prototypes */
void trierPrix(int tab[], int n);
void afficherTab(int tab[], int n);

int main() {
    int prix_stock[5] = {12500, 5000, 25000, 7500, 18000};

    printf("Prix initiaux : ");
    afficherTab(prix_stock, 5);

    trierPrix(prix_stock, 5);

    printf("Prix tries    : ");
    afficherTab(prix_stock, 5);

    return 0;
}

/* Definitions */
void trierPrix(int tab[], int n) {
    int i, j, temp;
    for (i = 0; i < n - 1; i++) {
        for (j = 0; j < n - i - 1; j++) {
            if (tab[j] > tab[j + 1]) {
                temp = tab[j];
                tab[j] = tab[j + 1];
                tab[j + 1] = temp;
            }
        }
    }
}

void afficherTab(int tab[], int n) {
    int i;
    for (i = 0; i < n; i++) {
        printf("%d FCFA ", tab[i]);
    }
    printf("\n");
}
```

**Résultat attendu (Console) :**
```text
Prix initiaux : 12500 FCFA 5000 FCFA 25000 FCFA 7500 FCFA 18000 FCFA 
Prix tries    : 5000 FCFA 7500 FCFA 12500 FCFA 18000 FCFA 25000 FCFA 
```
