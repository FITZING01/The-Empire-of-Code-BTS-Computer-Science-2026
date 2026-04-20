# JAVA MASTERCLASS FROM ZERO TO HERO: Advanced Object-Oriented Programming (OOP)

## Scenario: Securing Business Rules

The MaillotPro UML diagram is validated. Now it must be implemented in Java. Java is not a script language, it is a compiled, strongly typed, object-oriented language. Its goal is to build enterprise applications (Banking Back-Office, ERP, etc.) that never crash.
The absolute rule in OOP: **The object is responsible for its own integrity**. You must never allow the system to create a Jersey with a negative price, or an impossible stock quantity.

### 1. The Absolute Shield: Encapsulation

Encapsulation is the #1 pillar of OOP.
- **The Rule**: ALL class attributes MUST be `private`.
- **Access**: Read and write access is done via `public` methods called Getters and Setters.
- **The Objective**: Control data validity. In the `setPrice()` setter, you can add a condition `if (price < 0)`. If the attribute were public, anyone could do `myArticle.price = -500;` and destroy your system.

### 2. Object Identity: equals() and hashCode()

In Java, the `==` operator compares *memory references*.
If you have `Article a1 = new Article(1, "PSG Jersey");` and `Article a2 = new Article(1, "PSG Jersey");`, then `a1 == a2` will return **FALSE**. They are two different objects in memory, even if they have the same values.
To compare the *content*, you must override the `equals()` method. For MaillotPro, we consider two articles to be the same if they have the same `articleId`.

### 3. Managing the Unexpected: Custom Exceptions

What to do if a programmer tries to set a negative price? We don't do a vulgar `System.out.println("Error")`. We throw an Exception. This forces the calling program to handle the error in a structured way via a `try...catch` block. As a Senior, you will create your own business Exception classes.

### 4. The Masterpiece Code: The Indestructible Article

Here is the implementation of the `Article` class based on our UML, with strict encapsulation, exception management, and equality redefinition.

```java
package com.maillotpro.models;

import java.util.Objects;

/**
 * Custom business exception for management rule errors
 */
class BusinessRuleException extends IllegalArgumentException {
    public BusinessRuleException(String message) {
        super(message);
    }
}

/**
 * Class representing an Article in the MaillotPro shop.
 * @version 1.0 Production
 */
public class Article {
    
    // 1. ENCAPSULATION: Private attributes
    private final int articleId; // final because the ID never changes after creation
    private String description;
    private double priceExclTax;
    private int stock;
    
    private static final double VAT_RATE = 0.20; // Class constant

    /**
     * Strict constructor
     */
    public Article(int articleId, String description, double priceExclTax, int initialStock) {
        if (articleId <= 0) {
            throw new BusinessRuleException("The article ID must be positive.");
        }
        
        this.articleId = articleId;
        this.setDescription(description); // We use setters to apply controls!
        this.setPriceExclTax(priceExclTax);
        this.setStock(initialStock);
    }

    // 2. SECURED GETTERS & SETTERS

    public int getArticleId() { return articleId; }
    // No setArticleId because the attribute is final

    public String getDescription() { return description; }

    public void setDescription(String description) {
        if (description == null || description.trim().isEmpty()) {
            throw new BusinessRuleException("The description cannot be empty.");
        }
        this.description = description.trim();
    }

    public double getPriceExclTax() { return priceExclTax; }

    public void setPriceExclTax(double priceExclTax) {
        if (priceExclTax <= 0) {
            throw new BusinessRuleException("The price excluding tax must be strictly greater than zero.");
        }
        this.priceExclTax = priceExclTax;
    }

    public int getStock() { return stock; }

    public void setStock(int stock) {
        if (stock < 0) {
            throw new BusinessRuleException("The stock cannot be negative.");
        }
        this.stock = stock;
    }

    // 3. BUSINESS METHODS

    /**
     * Calculates the price including all taxes.
     * @return the price including tax
     */
    public double getPriceInclTax() {
        return this.priceExclTax * (1 + VAT_RATE);
    }

    /**
     * Attempts to deduct a quantity from the stock during an order.
     * @param quantity The quantity to deduct
     * @return true if the stock could be deducted, false in case of shortage
     */
    public boolean deductStock(int quantity) {
        if (quantity <= 0) return false;
        
        if (this.stock >= quantity) {
            this.stock -= quantity;
            return true;
        }
        return false; // Out of stock
    }

    // 4. OBJECT IDENTITY: Override equals and hashCode

    @Override
    public boolean equals(Object o) {
        // Optimization: if it's the same memory reference, it's the same object
        if (this == o) return true;
        
        // If the compared object is null or of another class, it's false
        if (o == null || getClass() != o.getClass()) return false;
        
        // Safe Cast
        Article article = (Article) o;
        
        // The business rule: two articles are identical if they have the same ID
        return articleId == article.articleId;
    }

    @Override
    public int hashCode() {
        // Must always be redefined when equals is (used by HashMap/HashSet)
        return Objects.hash(articleId);
    }

    @Override
    public String toString() {
        return String.format("[%d] %s - Price: %.0f FCFA - In Stock: %d", 
                articleId, description, getPriceInclTax(), stock);
    }
}
```

### Senior's Lesson
Look at the Constructor. The classic mistake is to do `this.priceExclTax = priceExclTax;`. NO! The constructor MUST use its own Setters: `this.setPriceExclTax(priceExclTax);`. Why? So that the validation (preventing a negative price) is applied as soon as the object is created, thus centralizing the business rule in a single point (the Setter). This is enterprise programming: building defensive code.
