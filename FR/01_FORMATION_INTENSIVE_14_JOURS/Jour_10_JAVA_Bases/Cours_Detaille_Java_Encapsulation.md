# MASTERCLASS JOUR 10 : JAVA - L'ENCAPSULATION ET LES OBJETS
**🎯 Objectif : Maîtriser les bases de la Programmation Orientée Objet (POO) pour l'examen Java.**

---

## 1. Pourquoi la POO en Java ?
Java est un langage "tout-objet". Pour manipuler des données (un client, un compte bancaire, un article), on crée des **Classes** qui servent de moules pour créer des **Objets**.

Dans `Account_Basic.java`, nous avons un exemple parfait de classe bien structurée.

---

## 2. Analyse de la Classe `Account`

### A. L'Encapsulation (Le Coffre-fort)
```java
private double solde;
private String titulaire;
```
En Java, on utilise toujours le mot-clé **`private`** pour les attributs.
- Pourquoi ? Pour empêcher qu'une autre partie du code ne modifie le solde directement (ex: `compte.solde = -1000000;`).
- C'est ce qu'on appelle l'**Encapsulation** : protéger les données.

### B. Le Constructeur (La Naissance de l'Objet)
```java
public Account(String titulaire, double soldeInitial) {
    this.titulaire = titulaire;
    this.solde = (soldeInitial >= 0) ? soldeInitial : 0;
}
```
Le constructeur porte le **même nom que la classe**. Il sert à initialiser les valeurs au moment de la création de l'objet.
- `this.solde = (soldeInitial >= 0) ? soldeInitial : 0;` : Ici, on ajoute une sécurité. Si on essaie de créer un compte avec un solde négatif, on le force à 0.

### C. Les Getters et Setters (Les Fenêtres)
Puisque les attributs sont `private`, nous avons besoin de méthodes `public` pour les lire ou les modifier de façon contrôlée.
```java
public double getSolde() { return solde; }
public String getTitulaire() { return titulaire; }
```
- **Getter** : Méthode qui *retourne* la valeur (`get` = obtenir).

### D. Les Méthodes d'Opération (Le Comportement)
```java
public void deposer(double montant) {
    if (montant > 0) this.solde += montant;
}
```
Une méthode est une action. Ici, on définit comment déposer de l'argent. Notez la vérification `if (montant > 0)` : encore une sécurité pour éviter des bugs métiers.

---

## 3. Comment utiliser cette classe (Instanciation)

En examen, on peut vous demander de simuler l'utilisation dans un `main` :
```java
public static void main(String[] args) {
    // 1. Création de l'objet
    Account monCompte = new Account("Alice", 1000.0);

    // 2. Action
    monCompte.deposer(500.0);

    // 3. Affichage
    System.out.println("Solde de " + monCompte.getTitulaire() + " : " + monCompte.getSolde());
}
```

---

## 4. Exercice d'Application (À faire sur votre code)

1. **Ajouter un Getter** pour le titulaire s'il manque.
2. **Ajouter une méthode `retirer(double montant)`** :
   - Elle doit vérifier si le montant est positif.
   - Elle doit vérifier si le solde est suffisant avant de soustraire.

---

## 5. Synthèse pour le Jour J
- **Attributs** : Toujours `private`.
- **Méthodes** : Souvent `public`.
- **Constructeur** : Même nom que la classe, pas de type de retour (`void`, `int`, etc.).
- **This** : Sert à désigner l'attribut de l'objet actuel.

**Prochaine étape : Jour 11 - Les méthodes avancées et les Exceptions !**
