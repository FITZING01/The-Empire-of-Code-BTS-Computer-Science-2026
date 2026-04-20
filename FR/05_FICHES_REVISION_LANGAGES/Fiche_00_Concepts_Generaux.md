# 🧠 FICHE 00 : CONCEPTS GÉNÉRAUX & POO
**Le Socle Théorique Universel (MAJ 20/04/2026)**

---

## 1. LES FONDATIONS STRUCTURÉES
*   **Algorithme** : Suite finie d'instructions permettant de résoudre un problème.
*   **Variable** : Emplacement mémoire nommé pour stocker une donnée.
*   **Constante** : Donnée immuable durant l'exécution.
*   **Signature d'une fonction/méthode** : Elle se compose du **nom** de la fonction et de la **liste de ses paramètres** (type et ordre). C'est l'identité unique de la fonction.

---

## 2. MODULARITÉ & PASSAGE DE PARAMÈTRES
*   **Fonction** : Bloc de code réutilisable retournant une valeur.
*   **Procédure** : Bloc de code réalisant des actions sans retourner de valeur (`void`).
*   **Passage par Valeur** : On envoie une **copie** de la variable. Si la fonction modifie le paramètre, la variable originale reste intacte.
*   **Passage par Adresse (ou Référence)** : On envoie l'**adresse mémoire** de la variable. La fonction travaille directement sur l'original. Toute modification est répercutée partout.

---

## 3. PROGRAMMATION ORIENTÉE OBJET (POO)
*   **Classe** : C'est le "moule" ou le plan de construction. Elle définit la structure (attributs) et le comportement (méthodes) des futurs objets.
*   **Objet** : C'est une "instance" d'une classe. C'est l'entité concrète créée à partir du moule (ex: la classe est "Voiture", l'objet est "Ma Toyota").
*   **Attribut** : Une variable interne à une classe (caractéristique de l'objet).
*   **Méthode** : Une fonction interne à une classe (action que l'objet peut réaliser).

---

## 4. ENCAPSULATION & ACCÈS
*   **Encapsulation** : Concept consistant à masquer les détails internes d'un objet (en mettant les attributs en `private`) et à n'autoriser l'accès que via des méthodes spécifiques.
*   **Accesseur (Getter)** : Méthode permettant de **lire** la valeur d'un attribut privé. (Nom conventionnel : `getNom()`).
*   **Mutateur (Setter)** : Méthode permettant de **modifier** la valeur d'un attribut privé tout en contrôlant la validité de la donnée. (Nom conventionnel : `setNom()`).

---

## 5. MÉCANISMES AVANCÉS
*   **Héritage** : Mécanisme permettant à une classe (fille) de récupérer les attributs et méthodes d'une autre classe (mère). Favorise la réutilisation du code.
*   **Polymorphisme** : Capacité d'un code à se comporter différemment selon le type de l'objet qui l'appelle (ex: une méthode `calculerSalaire()` qui agit différemment pour un "Employé" ou un "Directeur").
*   **Constructeur** : Méthode spéciale appelée automatiquement lors de la création d'un objet pour initialiser ses attributs.
*   **Destructeur** : Méthode appelée lors de la suppression d'un objet (principalement en C++).
