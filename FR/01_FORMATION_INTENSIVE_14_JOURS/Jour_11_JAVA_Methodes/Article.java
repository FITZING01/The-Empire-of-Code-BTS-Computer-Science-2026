// ==============================================================================
// JOUR 11 : JAVA MÉTHODES - Classe Article (Sujet 2)
// 🎯 Objectif : Protected, toString(;), equals() strict, Exceptions
// ==============================================================================

// Exception personnalisée
class CategorieInvalideException extends Exception {
    public CategorieInvalideException(String message) {
        super(message);
    }
}

public class Article {
    // 1. Visibilité protected pour les classes filles
    protected String code;
    protected String designation;
    protected double prix;
    protected String categorie;

    // 2. Constructeur par défaut
    public Article() {
        this.code = "000";
        this.designation = "Inconnu";
        this.prix = 0.0;
        this.categorie = "Informatique";
    }

    // 3. Constructeur d'initialisation
    public Article(String code, String designation, double prix, String categorie) throws CategorieInvalideException {
        this.code = code;
        this.designation = designation;
        this.prix = prix;
        this.setCategorie(categorie); // Utilisation du setter pour la validation
    }

    // 4. Getters et Setters (Accesseurs/Mutateurs)
    public String getCategorie() {
        return this.categorie;
    }

    public void setCategorie(String categorie) throws CategorieInvalideException {
        if (!categorie.equals("Informatique") && !categorie.equals("Bureautique")) {
            throw new CategorieInvalideException("Erreur : La catégorie doit être 'Informatique' ou 'Bureautique'.");
        }
        this.categorie = categorie;
    }

    public double getPrix() {
        return this.prix;
    }

    public void setPrix(double prix) {
        if (prix >= 0) {
            this.prix = prix;
        }
    }

    // 5. Surcharge de toString() avec séparateur point-virgule
    @Override
    public String toString() {
        return this.code + ";" + this.designation + ";" + this.prix + ";" + this.categorie;
    }

    // 6. Surcharge stricte de equals()
    @Override
    public boolean equals(Object obj) {
        // a. Même référence mémoire
        if (this == obj) return true;
        
        // b. Nullité ou type différent
        if (obj == null || !(obj instanceof Article)) return false;
        
        // c. Cast explicite
        Article autre = (Article) obj;
        
        // d. Comparaison de toutes les propriétés
        return this.code.equals(autre.code) &&
               this.designation.equals(autre.designation) &&
               this.prix == autre.prix &&
               this.categorie.equals(autre.categorie);
    }
}
