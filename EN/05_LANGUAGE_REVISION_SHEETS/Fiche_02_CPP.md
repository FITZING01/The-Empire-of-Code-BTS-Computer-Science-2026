# Master Review Sheet: C++ Programming (BTS Standard)

This sheet constitutes the mandatory knowledge base for mastering software development in industrial and academic environments. It links universal algorithmic concepts to their rigorous implementation in C++.

---

## 1. UNIVERSAL DEFINITIONS (THE FUNDAMENTALS)

*   **Programming**: The discipline of designing, writing, testing, and maintaining the source code of software.
*   **Algorithm**: A finite, ordered, and unambiguous sequence of operations used to solve a problem.
*   **Program**: The concrete realization of an algorithm in the form of an executable file after compilation.
*   **Variable**: A named location in RAM used to store a modifiable value.
*   **Constant**: An identifier whose value is fixed during declaration via `const`.
*   **Data Type**: An attribute indicating the nature of the value and the required memory space (e.g., `int`, `double`, `bool`).

---

## 2. SYNTAX OF CONTROL STRUCTURES IN C++

### 2.1. Conditional Structures
*   **`if` / `else if` / `else`**: Conditional branching.
*   **`switch`**: Multiple selection on discrete values.

### 2.2. Iterative Structures
*   **`for`**: Repetition with a counter.
*   **`while`**: Repetition as long as a condition is true (initial test).
*   **`do-while`**: Repetition with a final test (one execution guaranteed).

---

## 3. MODULARITY & OBJECT-ORIENTED PROGRAMMING (OOP)

### 3.1. Structured Approach
*   **Function**: Returns a value.
*   **Procedure**: A function of type `void`.
*   **Overloading**: Multiple functions with the same name but different parameters.

### 3.2. Object-Oriented Approach (OOP)
*   **Class**: A model of data and behaviors.
*   **Object**: A concrete instance of a class.
*   **Encapsulation**: Protection via `private`, `public`, and `protected`.
*   **Inheritance**: Specialization of an existing class.
*   **Polymorphism**: The ability of an object to take several forms via `virtual` functions.

---

## 4. DATA STRUCTURES
*   **Static Arrays**: Fixed size.
*   **Vectors (`vector`)**: Dynamic arrays from the STL.
*   **String**: Advanced management of character strings.

---

## 5. APPLICATION EXERCISES (ACADEMIC MODEL)

### Exercise 1: Initial Payment Calculation (Input/Output Streams)
**Statement:**
1. Declare variables for a land price (double) and the down payment percentage (double).
2. Calculate the initial payment amount in FCFA.
3. Display the result with an explicit message.

**Solution:**
```cpp
#include <iostream>
#include <iomanip>

using namespace std;

int main() {
    double land_price = 15000000.0;
    double down_payment_rate = 0.30; // 30%
    double initial_payment;

    initial_payment = land_price * down_payment_rate;

    cout << fixed << setprecision(0);
    cout << "--- FINANCIAL EVALUATION ---" << endl;
    cout << "Land price             : " << land_price << " FCFA" << endl;
    cout << "Required down payment (30%): " << initial_payment << " FCFA" << endl;
    cout << "-----------------------------" << endl;

    return 0;
}
```

**Expected Result (Console):**
```text
--- FINANCIAL EVALUATION ---
Land price             : 15000000 FCFA
Required down payment (30%): 4500000 FCFA
-----------------------------
```

---

### Exercise 2: Price Input Validation (Do-While Loop)
**Statement:**
1. Declare a `product_price` variable (integer).
2. Use a `do-while` loop to force the input of a positive price between 500 and 100,000 FCFA.
3. Display the validated final price.

**Solution:**
```cpp
#include <iostream>

using namespace std;

int main() {
    int product_price;

    do {
        cout << "Please enter the product price (500 - 100000 FCFA): ";
        cin >> product_price;
        
        if (product_price < 500 || product_price > 100000) {
            cout << "ERROR: Price out of bounds." << endl;
        }
    } while (product_price < 500 || product_price > 100000);

    cout << "Validated price: " << product_price << " FCFA" << endl;

    return 0;
}
```

**Expected Result (Console):**
```text
Please enter the product price (500 - 100000 FCFA): 250
ERROR: Price out of bounds.
Please enter the product price (500 - 100000 FCFA): 12500
Validated price: 12500 FCFA
```

---

### Exercise 3: Commission Calculation Overloading (Modularity)
**Statement:**
1. Implement a `calculateCommission` function taking a sales amount (double) and applying 5%.
2. Overload the function to take a sales amount and a grade (integer), applying 10% if grade == 1.
3. Test both functions in `main`.

**Solution:**
```cpp
#include <iostream>

using namespace std;

/* Base function: 5% commission */
double calculateCommission(double sales) {
    return sales * 0.05;
}

/* Overload: 10% for grade 1, otherwise 5% */
double calculateCommission(double sales, int grade) {
    if (grade == 1) return sales * 0.10;
    return sales * 0.05;
}

int main() {
    double monthly_sales = 1000000.0;

    cout << "Standard commission : " << calculateCommission(monthly_sales) << " FCFA" << endl;
    cout << "Manager commission (Grade 1): " << calculateCommission(monthly_sales, 1) << " FCFA" << endl;

    return 0;
}
```

**Expected Result (Console):**
```text
Standard commission : 50000 FCFA
Manager commission (Grade 1): 100000 FCFA
```

---

### Exercise 4: Average Daily Revenue (Arrays)
**Statement:**
1. Declare an array of 3 daily revenues in FCFA.
2. Calculate the sum and the average using a `for` loop.
3. Display the formatted average.

**Solution:**
```cpp
#include <iostream>

using namespace std;

int main() {
    int revenues[3] = {45000, 62000, 53000};
    int total = 0;

    for (int i = 0; i < 3; i++) {
        total += revenues[i];
    }

    double average = total / 3.0;

    cout << "Total revenue     : " << total << " FCFA" << endl;
    cout << "Daily average     : " << average << " FCFA" << endl;

    return 0;
}
```

**Expected Result (Console):**
```text
Total revenue     : 160000 FCFA
Daily average     : 53333.3 FCFA
```

---

### Exercise 5: Savings Account Management Class (Encapsulation)
**Statement:**
1. Create a `SavingsAccount` class with a private `balance` attribute.
2. Implement a constructor and a `deposit(amount)` method.
3. Add a `displayBalance()` method and test the class.

**Solution:**
```cpp
#include <iostream>
#include <string>

using namespace std;

class SavingsAccount {
private:
    double balance;
public:
    SavingsAccount(double initial) : balance(initial) {}

    void deposit(double amount) {
        if (amount > 0) balance += amount;
    }

    void displayBalance() {
        cout << "Current savings balance: " << balance << " FCFA" << endl;
    }
};

int main() {
    SavingsAccount myAccount(50000);
    myAccount.deposit(25000);
    myAccount.displayBalance();

    return 0;
}
```

**Expected Result (Console):**
```text
Current savings balance: 75000 FCFA
```

---

### Exercise 6: Dynamic Article List (Vector)
**Statement:**
1. Use `std::vector` to store product names (string).
2. Add "Computer", "Printer", and "Scanner" to the list.
3. Display the number of articles and the list content using a loop.

**Solution:**
```cpp
#include <iostream>
#include <vector>
#include <string>

using namespace std;

int main() {
    vector<string> stock;

    stock.push_back("Computer");
    stock.push_back("Printer");
    stock.push_back("Scanner");

    cout << "Inventory (Size: " << stock.size() << ")" << endl;
    for (const string& article : stock) {
        cout << "- " << article << endl;
    }

    return 0;
}
```

**Expected Result (Console):**
```text
Inventory (Size: 3)
- Computer
- Printer
- Scanner
```

---

### Exercise 7: Personnel Inheritance (Specialization)
**Statement:**
1. Create an `Employee` base class with a name and a base salary (in FCFA).
2. Create a `Director` derived class adding a fixed function bonus of 200,000 FCFA.
3. Display the director's total salary.

**Solution:**
```cpp
#include <iostream>
#include <string>

using namespace std;

class Employee {
protected:
    string name;
    double baseSalary;
public:
    Employee(string n, double s) : name(n), baseSalary(s) {}
};

class Director : public Employee {
private:
    double functionBonus = 200000.0;
public:
    Director(string n, double s) : Employee(n, s) {}
    
    void displayPayroll() {
        cout << "Director: " << name << endl;
        cout << "Total to receive: " << (baseSalary + functionBonus) << " FCFA" << endl;
    }
};

int main() {
    Director dir("Mr. TOURE", 800000);
    dir.displayPayroll();

    return 0;
}
```

**Expected Result (Console):**
```text
Director: Mr. TOURE
Total to receive: 1000000 FCFA
```

---

### Exercise 8: Pricing Polymorphism (Virtual)
**Statement:**
1. Declare a `Client` abstract class with a pure virtual `calculatePrice(grossPrice)` method.
2. Create `LoyalClient` (10% discount) and `PassingClient` (no discount).
3. Use a base class pointer to test polymorphism.

**Solution:**
```cpp
#include <iostream>

using namespace std;

class Client {
public:
    virtual double calculatePrice(double grossPrice) = 0; // Pure virtual
    virtual ~Client() {}
};

class LoyalClient : public Client {
public:
    double calculatePrice(double grossPrice) override {
        return grossPrice * 0.90;
    }
};

class PassingClient : public Client {
public:
    double calculatePrice(double grossPrice) override {
        return grossPrice;
    }
};

int main() {
    Client* c1 = new LoyalClient();
    Client* c2 = new PassingClient();
    double purchase = 100000.0;

    cout << "Loyal Client Price  : " << c1->calculatePrice(purchase) << " FCFA" << endl;
    cout << "Passing Client Price: " << c2->calculatePrice(purchase) << " FCFA" << endl;

    delete c1;
    delete c2;
    return 0;
}
```

**Expected Result (Console):**
```text
Loyal Client Price  : 90000 FCFA
Passing Client Price: 100000 FCFA
```

---

### Exercise 9: Sales Association (Business Logic)
**Statement:**
1. Create a `Product` class with name and price.
2. Create an `Order` class containing a pointer to a `Product` and a quantity.
3. Calculate the total order amount in FCFA.

**Solution:**
```cpp
#include <iostream>
#include <string>

using namespace std;

class Product {
public:
    string name;
    int price;
    Product(string n, int p) : name(n), price(p) {}
};

class Order {
private:
    Product* p;
    int quantity;
public:
    Order(Product* art, int qte) : p(art), quantity(qte) {}
    int calculateTotal() {
        return p->price * quantity;
    }
};

int main() {
    Product p1("Smartphone", 150000);
    Order o1(&p1, 2);

    cout << "Order Invoice: " << endl;
    cout << "Item  : " << p1.name << " (x2)" << endl;
    cout << "Total : " << o1.calculateTotal() << " FCFA" << endl;

    return 0;
}
```

**Expected Result (Console):**
```text
Order Invoice: 
Item  : Smartphone (x2)
Total : 300000 FCFA
```

---

### Exercise 10: Beverage Stock Management (Complete System)
**Statement:**
1. Define a `Beverage` structure with name and unit price.
2. Create a vector of `Beverage` structures representing the stock.
3. Calculate the total value of the stock in FCFA using a loop.

**Solution:**
```cpp
#include <iostream>
#include <vector>
#include <string>

using namespace std;

struct Beverage {
    string name;
    int price;
};

int main() {
    vector<Beverage> stock = {
        {"Mineral Water", 500},
        {"Lemon Soda", 800},
        {"Orange Juice", 1200}
    };

    int totalValue = 0;

    cout << "--- STOCK STATUS ---" << endl;
    for (const auto& b : stock) {
        cout << b.name << " : " << b.price << " FCFA" << endl;
        totalValue += b.price;
    }
    cout << "----------------------" << endl;
    cout << "Stock value: " << totalValue << " FCFA" << endl;

    return 0;
}
```

**Expected Result (Console):**
```text
--- STOCK STATUS ---
Mineral Water : 500 FCFA
Lemon Soda : 800 FCFA
Orange Juice : 1200 FCFA
----------------------
Stock value: 2500 FCFA
```
