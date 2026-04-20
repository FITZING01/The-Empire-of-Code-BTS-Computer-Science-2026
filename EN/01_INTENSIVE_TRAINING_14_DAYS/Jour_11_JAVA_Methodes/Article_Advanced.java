package bts.java;

import java.util.Objects;

/**
 * Custom exception for article category (Subject 2)
 */
class InvalidCategoryException extends Exception {
    public InvalidCategoryException(String message) {
        super(message);
    }
}

/**
 * @description Article class with protected visibility and exception management (Subject 2)
 */
public class Article {
    // Protected attributes (visible in child classes)
    protected String code;
    protected String description;
    protected double price;
    protected String category; // "IT" or "Office"

    // Default constructor
    public Article() {}

    // Initialization constructor with category validation
    public Article(String code, String description, double price, String category) throws InvalidCategoryException {
        this.code = code;
        this.description = description;
        this.price = price;
        setCategory(category);
    }

    // Accessor for category
    public String getCategory() {
        return category;
    }

    // Mutator for category with exception trigger
    public void setCategory(String category) throws InvalidCategoryException {
        if (category.equalsIgnoreCase("IT") || category.equalsIgnoreCase("Office")) {
            this.category = category;
        } else {
            throw new InvalidCategoryException("Category '" + category + "' not allowed.");
        }
    }

    // Virtual method for price
    public double getPrice() {
        return price;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    // toString with semicolon separator
    @Override
    public String toString() {
        return code + ";" + description + ";" + price + ";" + category;
    }

    // Equals method: compares all properties
    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Article article = (Article) o;
        return Double.compare(article.price, price) == 0 &&
                Objects.equals(code, article.code) &&
                Objects.equals(description, article.description) &&
                Objects.equals(category, article.category);
    }

    /**
     * Simulation and Test
     */
    public static void main(String[] args) {
        try {
            Article a1 = new Article("A001", "Gamer PC", 750000, "IT");
            Article a2 = new Article("A001", "Gamer PC", 750000, "IT");
            
            System.out.println("Article 1: " + a1.toString());
            System.out.println("Are they equal? " + a1.equals(a2));
            
            // Error test
            Article a3 = new Article("A003", "Chair", 25000, "Furniture");
        } catch (InvalidCategoryException e) {
            System.err.println("ERROR: " + e.getMessage());
        }
    }
}
