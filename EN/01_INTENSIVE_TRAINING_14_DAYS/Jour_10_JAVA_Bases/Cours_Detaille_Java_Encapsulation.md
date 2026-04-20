# MASTERCLASS DAY 10: JAVA - ENCAPSULATION AND OBJECTS
**🎯 Objective: Master the basics of Object-Oriented Programming (OOP) for the Java exam.**

---

## 1. Why OOP in Java?
Java is an "all-object" language. To manipulate data (a client, a bank account, an article), we create **Classes** that serve as templates for creating **Objects**.

In `Account_Basic.java`, we have a perfect example of a well-structured class.

---

## 2. Analysis of the `Account` Class

### A. Encapsulation (The Vault)
```java
private double balance;
private String owner;
```
In Java, we always use the **`private`** keyword for attributes.
- Why? To prevent another part of the code from modifying the balance directly (e.g., `account.balance = -1000000;`).
- This is called **Encapsulation**: protecting the data.

### B. The Constructor (The Birth of the Object)
```java
public Account(String owner, double initialBalance) {
    this.owner = owner;
    this.balance = (initialBalance >= 0) ? initialBalance : 0;
}
```
The constructor has the **same name as the class**. It is used to initialize values at the time of object creation.
- `this.balance = (initialBalance >= 0) ? initialBalance : 0;`: Here, we add a check. If we try to create an account with a negative balance, we force it to 0.

### C. Getters and Setters (The Windows)
Since attributes are `private`, we need `public` methods to read or modify them in a controlled way.
```java
public double getBalance() { return balance; }
public String getOwner() { return owner; }
```
- **Getter**: Method that *returns* the value (`get` = obtain).

### D. Operation Methods (Behavior)
```java
public void deposit(double amount) {
    if (amount > 0) this.balance += amount;
}
```
A method is an action. Here, we define how to deposit money. Note the `if (amount > 0)` check: another security measure to avoid business logic bugs.

---

## 3. How to use this class (Instantiation)

In the exam, you may be asked to simulate its use in a `main` method:
```java
public static void main(String[] args) {
    // 1. Object creation
    Account myAccount = new Account("Alice", 1000.0);

    // 2. Action
    myAccount.deposit(500.0);

    // 3. Display
    System.out.println("Balance for " + myAccount.getOwner() + " : " + myAccount.getBalance());
}
```

---

## 4. Application Exercise (To be done on your code)

1. **Add a Getter** for the owner if it is missing.
2. **Add a method `withdraw(double amount)`**:
   - It must check if the amount is positive.
   - It must check if the balance is sufficient before subtracting.

---

## 5. Summary for the Big Day
- **Attributes**: Always `private`.
- **Methods**: Often `public`.
- **Constructor**: Same name as the class, no return type (`void`, `int`, etc.).
- **This**: Used to refer to the attribute of the current object.

**Next step: Day 11 - Advanced methods and Exceptions!**
