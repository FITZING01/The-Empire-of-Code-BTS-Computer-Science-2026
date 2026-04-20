# REVIEW SHEET: JAVA LANGUAGE (BTS SPECIAL)

This sheet constitutes the core of theoretical and practical knowledge necessary to master the Java language in an academic and professional context.

---

## 1. UNIVERSAL DEFINITIONS AND JAVA CONCEPTS

### 1.1. Fundamentals of Computing
*   **Programming:** The process of designing and writing source code intended to accomplish a task.
*   **Algorithm:** A logical sequence of instructions independent of the language.
*   **Program:** The concrete translation of an algorithm into a language (e.g., Java).
*   **Variable:** A named memory container for storing modifiable data.
*   **Constant:** An identifier with a fixed value (`final` keyword in Java).
*   **Data Type:** A classification of data (e.g., `int`, `double`, `boolean`, `String`).

### 1.2. Java Architecture
*   **Bytecode:** An intermediate format (`.class`) that is platform-independent.
*   **JVM (Java Virtual Machine):** Interprets the bytecode and manages memory (Garbage Collector).
*   **JDK (Java Development Kit):** Complete tools for development (compiler, JRE).

---

## 2. SYNTAX OF CONTROL STRUCTURES

### 2.1. Conditional Structures
*   `if / else if / else`: Choice based on boolean conditions.
*   `switch`: Multiple selection on fixed values.

### 2.2. Iterative Structures (Loops)
*   `for`: Iteration with a counter.
*   `while`: Iteration as long as true (test at the beginning).
*   `do-while`: Iteration as long as true (test at the end).
*   `for-each`: Simplified traversal of collections.

---

## 3. MODULARITY: METHODS

*   **Static Methods (`static`):** Belong to the class, callable without an instance.
*   **Instance Methods:** Belong to the object, manipulate the state via `this`.
*   **Return Type:** `void` for no value, or a specific type (e.g., `int`).

---

## 4. OBJECT-ORIENTED PROGRAMMING (OOP)

*   **Encapsulation:** `private` attributes, access via Getters/Setters.
*   **Inheritance (`extends`):** Transmission of properties from a parent class to a child class.
*   **Interfaces (`implements`):** Behavioral contracts.
*   **Polymorphism:** The ability of a reference to point to objects of different types.

---

## 5. SYNTHESIS EXERCISE: ERP PAYROLL SYSTEM

**Statement:**
1. Create a `SalaryEmployee` class with a name and a fixed salary (in FCFA).
2. Create a `Salesperson` class inheriting from `SalaryEmployee` with a `turnover` variable and a 5% bonus on the turnover.
3. Implement a test class instantiating a salesperson and displaying their total remuneration.

**Solution:**
```java
// --- BUSINESS LOGIC ---
class SalaryEmployee {
    protected String name;
    protected double fixedSalary;

    public SalaryEmployee(String name, double fixedSalary) {
        this.name = name;
        this.fixedSalary = fixedSalary;
    }

    public double calculateTotalSalary() {
        return fixedSalary;
    }
}

class Salesperson extends SalaryEmployee {
    private double turnover;

    public Salesperson(String name, double fixedSalary, double turnover) {
        super(name, fixedSalary);
        this.turnover = turnover;
    }

    @Override
    public double calculateTotalSalary() {
        return fixedSalary + (turnover * 0.05);
    }
}

// --- TEST CODE ---
public class PayrollManagement {
    public static void main(String[] args) {
        Salesperson s = new Salesperson("Jean EBOUE", 300000, 2500000);
        
        System.out.println("Pay slip for : " + s.name);
        System.out.println("Total Salary : " + s.calculateTotalSalary() + " FCFA");
    }
}
```

**Expected Result (Console):**
```text
Pay slip for : Jean EBOUE
Total Salary : 425000.0 FCFA
```

---

## 6. PROGRESSIVE EXERCISES (ACADEMIC MODEL)

### Exercise 1: Invoice Calculation (Arithmetic)
**Statement:**
1. Declare variables for a quantity of items and a unit price in FCFA.
2. Calculate the Total Amount Including Tax with an 18% VAT.
3. Display the final amount in the console.

**Solution:**
```java
public class Billing {
    public static void main(String[] args) {
        int quantity = 10;
        double unitPrice = 2500.0;
        double vat = 0.18;
        
        double totalExclTax = quantity * unitPrice;
        double totalInclTax = totalExclTax * (1 + vat);
        
        System.out.println("Total Excluding Tax : " + totalExclTax + " FCFA");
        System.out.println("Total Including Tax (18%) : " + totalInclTax + " FCFA");
    }
}
```

**Expected Result (Console):**
```text
Total Excluding Tax : 25000.0 FCFA
Total Including Tax (18%) : 29500.0 FCFA
```

---

### Exercise 2: Discount System (Conditional)
**Statement:**
1. Simulate a purchase of a given amount in FCFA.
2. Apply a 10% discount if the amount exceeds 100,000 FCFA.
3. Display the discount amount and the net to pay.

**Solution:**
```java
public class CashRegister {
    public static void main(String[] args) {
        double purchaseAmount = 120000.0;
        double discount = 0;
        
        if (purchaseAmount > 100000) {
            discount = purchaseAmount * 0.10;
        }
        
        System.out.println("Purchase : " + purchaseAmount + " FCFA");
        System.out.println("Discount applied : " + discount + " FCFA");
        System.out.println("Net to pay : " + (purchaseAmount - discount) + " FCFA");
    }
}
```

**Expected Result (Console):**
```text
Purchase : 120000.0 FCFA
Discount applied : 12000.0 FCFA
Net to pay : 108000.0 FCFA
```

---

### Exercise 3: Simplified Amortization Table (Loop)
**Statement:**
1. Declare an initial debt of 500,000 FCFA.
2. Simulate 5 monthly repayments of 100,000 FCFA.
3. Display the remaining balance for each month using a `for` loop.

**Solution:**
```java
public class Amortization {
    public static void main(String[] args) {
        double debt = 500000.0;
        double monthlyPayment = 100000.0;
        
        for (int month = 1; month <= 5; month++) {
            debt -= monthlyPayment;
            System.out.println("Month " + month + " : Remaining balance " + debt + " FCFA");
        }
    }
}
```

**Expected Result (Console):**
```text
Month 1 : Remaining balance 400000.0 FCFA
Month 2 : Remaining balance 300000.0 FCFA
Month 3 : Remaining balance 200000.0 FCFA
Month 4 : Remaining balance 100000.0 FCFA
Month 5 : Remaining balance 0.0 FCFA
```

---

### Exercise 4: Currency Conversion (Static Methods)
**Statement:**
1. Create a static method `euroToFcfa` taking an amount in Euro and returning its value in FCFA (Rate: 655.957).
2. Create the main program to test this method.
3. Display the result of converting 100 Euros.

**Solution:**
```java
public class Converter {
    public static double euroToFcfa(double euroAmount) {
        return euroAmount * 655.957;
    }

    public static void main(String[] args) {
        double euros = 100.0;
        System.out.println(euros + " Euros = " + euroToFcfa(euros) + " FCFA");
    }
}
```

**Expected Result (Console):**
```text
100.0 Euros = 65595.7 FCFA
```

---

### Exercise 5: Wallet Management (Class & Encapsulation)
**Statement:**
1. Create a `Wallet` class with a private `balanceFcfa` attribute.
2. Implement `credit(amount)` and `getBalance()` methods.
3. Prevent any negative credit.

**Solution:**
```java
class Wallet {
    private double balanceFcfa;

    public void credit(double amount) {
        if (amount > 0) {
            this.balanceFcfa += amount;
        }
    }

    public double getBalance() {
        return this.balanceFcfa;
    }
}

public class BankTest {
    public static void main(String[] args) {
        Wallet w = new Wallet();
        w.credit(50000);
        System.out.println("Wallet balance : " + w.getBalance() + " FCFA");
    }
}
```

**Expected Result (Console):**
```text
Wallet balance : 50000.0 FCFA
```

---

### Exercise 6: Mobile Inventory (Inheritance)
**Statement:**
1. Create an `Article` class with `description` and `priceFcfa`.
2. Create a `Phone` class inheriting from `Article` adding a `brand` attribute.
3. Display the full characteristics of a phone.

**Solution:**
```java
class Article {
    protected String description;
    protected int priceFcfa;

    public Article(String des, int price) {
        this.description = des;
        this.priceFcfa = price;
    }
}

class Phone extends Article {
    private String brand;

    public Phone(String des, int price, String brand) {
        super(des, prix);
        this.brand = brand;
    }

    public void display() {
        System.out.println("Product : " + description + " | Brand : " + brand);
        System.out.println("Price : " + priceFcfa + " FCFA");
    }
}

public class StockManagement {
    public static void main(String[] args) {
        Phone p = new Phone("Smartphone Pro", 450000, "Samsux");
        p.display();
    }
}
```

**Expected Result (Console):**
```text
Product : Smartphone Pro | Brand : Samsux
Price : 450000 FCFA
```

---

### Exercise 7: Services Contract (Interface)
**Statement:**
1. Define a `Rateable` interface with a `getDailyRate()` method.
2. Implement this interface in a `Consultant` class.
3. Display the consultant's daily rate in FCFA.

**Solution:**
```java
interface Rateable {
    int getDailyRate();
}

class Consultant implements Rateable {
    public int getDailyRate() {
        return 150000;
    }
}

public class ServiceProvision {
    public static void main(String[] args) {
        Rateable c = new Consultant();
        System.out.println("Expert Rate : " + c.getDailyRate() + " FCFA / day");
    }
}
```

**Expected Result (Console):**
```text
Expert Rate : 150000 FCFA / day
```

---

### Exercise 8: Order Tracking (ArrayList)
**Statement:**
1. Create a list of order amounts (ArrayList of integers).
2. Add 3 amounts in FCFA.
3. Calculate the total sum of orders via a list traversal.

**Solution:**
```java
import java.util.ArrayList;

public class OrderTracking {
    public static void main(String[] args) {
        ArrayList<Integer> orders = new ArrayList<>();
        orders.add(25000);
        orders.add(45000);
        orders.add(15000);
        
        int total = 0;
        for (int m : orders) {
            total += m;
        }
        
        System.out.println("Number of orders : " + orders.size());
        System.out.println("Total turnover : " + total + " FCFA");
    }
}
```

**Expected Result (Console):**
```text
Number of orders : 3
Total turnover : 85000 FCFA
```

---

### Exercise 9: Withdrawal Security (Exceptions)
**Statement:**
1. Simulate a `withdraw(amount)` method that throws an exception if the amount is greater than 10,000 FCFA (withdrawal limit).
2. Use a `try-catch` block to capture the error in `main`.
3. Display a warning message.

**Solution:**
```java
public class Counter {
    public static void withdraw(int amount) throws Exception {
        if (amount > 10000) {
            throw new Exception("Withdrawal limit exceeded !");
        }
        System.out.println("Withdrawal successful : " + amount + " FCFA");
    }

    public static void main(String[] args) {
        try {
            withdraw(15000);
        } catch (Exception e) {
            System.out.println("ALERT : " + e.getMessage());
        }
    }
}
```

**Expected Result (Console):**
```text
ALERT : Withdrawal limit exceeded !
```

---

### Exercise 10: Audit Report (Polymorphism)
**Statement:**
1. Create an `Account` class with a `generateReport()` method.
2. Create `CurrentAccount` and `SavingsAccount` child classes redefining the report.
3. Use an `Account` array to display reports polymorphically.

**Solution:**
```java
class Account {
    public void generateReport() {
        System.out.println("Standard account report.");
    }
}

class CurrentAccount extends Account {
    @Override
    public void generateReport() {
        System.out.println("Current Account Audit : No anomalies.");
    }
}

class SavingsAccount extends Account {
    @Override
    public void generateReport() {
        System.out.println("Savings Account Audit : Interests calculated.");
    }
}

public class BankAudit {
    public static void main(String[] args) {
        Account[] accounts = { new CurrentAccount(), new SavingsAccount() };
        
        for (Account a : accounts) {
            a.generateReport();
        }
    }
}
```

**Expected Result (Console):**
```text
Current Account Audit : No anomalies.
Savings Account Audit : Interests calculated.
```
