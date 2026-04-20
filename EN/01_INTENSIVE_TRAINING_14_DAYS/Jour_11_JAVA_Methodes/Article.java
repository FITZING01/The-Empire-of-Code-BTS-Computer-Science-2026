// ==============================================================================
// DAY 11: JAVA METHODS - Article Class (Subject 2)
// 🎯 Objective: Protected, toString(;), strict equals(), Exceptions
// ==============================================================================

// Custom exception
class InvalidCategoryException extends Exception {
    public InvalidCategoryException(String message) {
        super(message);
    }
}

public class Article {
    // 1. Protected visibility for child classes
    protected String code;
    protected String description;
    protected double price;
    protected String category;

    // 2. Default Constructor
    public Article() {
        this.code = "000";
        this.description = "Unknown";
        this.price = 0.0;
        this.category = "IT";
    }

    // 3. Initialization Constructor
    public Article(String code, String description, double price, String category) throws InvalidCategoryException {
        this.code = code;
        this.description = description;
        this.price = price;
        this.setCategory(category); // Using the setter for validation
    }

    // 4. Getters and Setters (Accessors/Mutators)
    public String getCategory() {
        return this.category;
    }

    public void setCategory(String category) throws InvalidCategoryException {
        if (!category.equalsIgnoreCase("IT") && !category.equalsIgnoreCase("Office")) {
            throw new InvalidCategoryException("Error: Category must be 'IT' or 'Office'.");
        }
        this.category = category;
    }

    public double getPrice() {
        return this.price;
    }

    public void setPrice(double price) {
        if (price >= 0) {
            this.price = price;
        }
    }

    // 5. Override toString() with semicolon separator
    @Override
    public String toString() {
        return this.code + ";" + this.description + ";" + this.price + ";" + this.category;
    }

    // 6. Strict override of equals()
    @Override
    public boolean equals(Object obj) {
        // a. Same memory reference
        if (this == obj) return true;
        
        // b. Null or different type
        if (obj == null || !(obj instanceof Article)) return false;
        
        // c. Explicit cast
        Article other = (Article) obj;
        
        // d. Comparison of all properties
        return this.code.equals(other.code) &&
               this.description.equals(other.description) &&
               this.price == other.price &&
               this.category.equals(other.category);
    }
}
