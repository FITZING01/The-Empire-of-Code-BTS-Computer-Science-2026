// ==============================================================================
// DAY 10: JAVA BASICS - Account Class (Subject 1)
// 🎯 Objective: Encapsulation, Constructors, Interest Calculations
// ==============================================================================

public class Account {
    // 1. Strict Encapsulation (private)
    private double balance;
    private String owner;

    // 2. Default Constructor
    public Account() {
        this.owner = "Anonymous";
        this.balance = 0.0;
    }

    // 3. Constructor with parameters (Overloading)
    public Account(String owner, double initialBalance) {
        this.owner = owner;
        this.balance = (initialBalance >= 0) ? initialBalance : 0.0;
    }

    // 4. Getters & Setters
    public double getBalance() { 
        return this.balance; 
    }
    
    public String getOwner() { 
        return this.owner; 
    }

    // 5. Business methods
    public void deposit(double amount) {
        if (amount > 0) {
            this.balance += amount;
        }
    }

    public boolean withdraw(double amount) {
        if (amount > 0 && this.balance >= amount) {
            this.balance -= amount;
            return true;
        }
        return false;
    }

    /**
     * Adds interest to the current balance.
     * Formula: Balance * (1 + InterestRate)
     * @param interestRate The rate in decimal form (e.g., 0.05 for 5%)
     */
    public void addInterest(double interestRate) {
        if (interestRate > 0) {
            this.balance = this.balance * (1 + interestRate);
        }
    }
}
