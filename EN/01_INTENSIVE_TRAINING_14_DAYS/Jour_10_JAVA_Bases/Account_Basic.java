package bts.java;

/**
 * @description Account class simulating a bank account (Subject 1)
 * Includes management of balance, deposits, withdrawals, and interest calculation.
 */
public class Account {
    private double balance;

    // Default constructor: balance at zero
    public Account() {
        this.balance = 0.0;
    }

    // Constructor with initial balance
    public Account(double initialBalance) {
        if (initialBalance >= 0) {
            this.balance = initialBalance;
        } else {
            this.balance = 0.0;
        }
    }

    // Returns current balance
    public double getBalance() {
        return this.balance;
    }

    // Deposit an amount
    public void deposit(double amount) {
        if (amount > 0) {
            this.balance += amount;
        }
    }

    // Withdraw an amount
    public void withdraw(double amount) {
        if (amount > 0 && amount <= this.balance) {
            this.balance -= amount;
        } else {
            System.out.println("Insufficient balance or invalid amount.");
        }
    }

    /**
     * @param rate Interest rate (e.g., 0.05 for 5%)
     * Modifies the balance by applying the formula: balance * (1 + rate)
     */
    public void addInterest(double rate) {
        this.balance = this.balance * (1 + rate);
    }
}
