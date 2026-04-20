package bts.java;

import java.util.Objects;

/**
 * Exception personnalisée pour la catégorie d'article (Sujet 2)
 */
class CategorieInvalideException extends Exception {
    public CategorieInvalideException(String message) {
        super(message);
    }
}

/**
 * @description Classe Article avec visibilité protégée et gestion d'exceptions (Sujet 2)
 */
public class Article {
    // Attributs protégés (visibles dans les classes filles)
    protected String code;
    protected String designation;
    protected double prix;
    protected String categorie; // "Informatique" ou "Bureautique"

    // Constructeur par défaut
    public Article() {}

    // Constructeur d'initialisation avec validation de catégorie
    public Article(String code, String designation, double prix, String categorie) throws CategorieInvalideException {
        this.code = code;
        this.designation = designation;
        this.prix = prix;
        setCategorie(categorie);
    }

    // Accesseur pour catégorie
    public String getCategorie() {
        return categorie;
    }

    // Mutateur pour catégorie avec déclenchement d'exception
    public void setCategorie(String categorie) throws CategorieInvalideException {
        if (categorie.equalsIgnoreCase("Informatique") || categorie.equalsIgnoreCase("Bureautique")) {
            this.categorie = categorie;
        } else {
            throw new CategorieInvalideException("Catégorie '" + categorie + "' non autorisée.");
        }
    }

    // Méthode virtuelle pour le prix
    public double getPrix() {
        return prix;
    }

    public void setPrix(double prix) {
        this.prix = prix;
    }

    // toString avec séparateur point-virgule
    @Override
    public String toString() {
        return code + ";" + designation + ";" + prix + ";" + categorie;
    }

    // Méthode Equals : compare toutes les propriétés
    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Article article = (Article) o;
        return Double.compare(article.prix, prix) == 0 &&
                Objects.equals(code, article.code) &&
                Objects.equals(designation, article.designation) &&
                Objects.equals(categorie, article.categorie);
    }

    /**
     * Simulation et Test
     */
    public static void main(String[] args) {
        try {
            Article a1 = new Article("A001", "PC Gamer", 750000, "Informatique");
            Article a2 = new Article("A001", "PC Gamer", 750000, "Informatique");
            
            System.out.println("Article 1: " + a1.toString());
            System.out.println("Sont égaux ? " + a1.equals(a2));
            
            // Test erreur
            Article a3 = new Article("A003", "Chaise", 25000, "Mobilier");
        } catch (CategorieInvalideException e) {
            System.err.println("ERREUR : " + e.getMessage());
        }
    }
}
