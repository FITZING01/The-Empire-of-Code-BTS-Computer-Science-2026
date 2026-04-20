# REVIEW SHEET: STRUCTURED PROGRAMMING IN C

## 1. UNIVERSAL DEFINITIONS

*   **Programming**: The process of designing, writing, testing, debugging, and maintaining the source code of a computer program. It is the act of translating an algorithmic solution into a formalized language to automate tasks.
*   **Algorithm**: A finite, structured, and unambiguous sequence of instructions used to solve a given problem. It is independent of any programming language.
*   **Program**: The concrete translation of an algorithm into a specific language (like C), transformed into machine language by a compiler.
*   **Variable**: A named memory location whose content can be read and modified. It is defined by an identifier, a type, and a value.
*   **Constant**: A fixed value that cannot be changed during execution. Defined via `#define` or the `const` keyword.
*   **Data Type**: A classification specifying the nature of values (e.g., `int`, `float`, `char`), their size in memory, and the allowed operations.

---

## 2. SYNTAX OF CONTROL STRUCTURES

### 2.1. The alternative: `if` / `else if` / `else`
Allows branching execution based on a logical condition.
```c
if (condition) {
    /* Instructions if true */
} else {
    /* Instructions if false */
}
```

### 2.2. Multiple choice: `switch`
Optimized routing for equality tests on integers or characters.
```c
switch (variable) {
    case value1: /* code */; break;
    default: /* default code */; break;
}
```

### 2.3. Loops: `for`, `while`, `do-while`
*   `for`: For a known number of iterations.
*   `while`: As long as a condition is true (test at the beginning).
*   `do-while`: As long as a condition is true (test at the end, at least one execution).

---

## 3. MODULARITY (FUNCTIONS & PROCEDURES)

In C, modularity requires separating the interface from the implementation.
1.  **The Prototype**: Declaration of the signature (return type, name, parameters) before `main`.
2.  **The Definition**: Actual implementation of the function body after `main`.

---

## 4. DATA STRUCTURES
*   **Arrays**: A homogeneous collection of elements indexed starting from 0.
*   **Structures (`struct`)**: Aggregation of variables of heterogeneous types.

---

## 5. APPLICATION EXERCISES (ACADEMIC MODEL)

### Exercise 1: Electricity Billing Management
**Statement:**
1. Declare the necessary variables to store a consumption index (integer) and a unit price (real).
2. Calculate the Total Amount Excluding Tax (TET) in FCFA.
3. Display the formatted bill with two decimal places.

**Solution:**
```c
#include <stdio.h>

int main() {
    int consumption_index = 450;
    float kwh_price = 75.5;
    float tet_amount;

    tet_amount = consumption_index * kwh_price;

    printf("--- ELECTRICITY BILL ---\n");
    printf("Consumption : %d kWh\n", consumption_index);
    printf("Unit price  : %.2f FCFA\n", kwh_price);
    printf("TET Amount  : %.2f FCFA\n", tet_amount);
    printf("-----------------------------\n");

    return 0;
}
```

**Expected Result (Console):**
```text
--- ELECTRICITY BILL ---
Consumption : 450 kWh
Unit price  : 75.50 FCFA
TET Amount  : 33975.00 FCFA
-----------------------------
```

---

### Exercise 2: Performance Bonus Calculation
**Statement:**
1. Declare a constant `BONUS_RATE` at 0.15 (15%).
2. Ask the program to calculate the bonus on a turnover of 2,500,000 FCFA.
3. Display the turnover and the resulting bonus amount.

**Solution:**
```c
#include <stdio.h>

#define BONUS_RATE 0.15

int main() {
    double turnover = 2500000.0;
    double bonus_amount;

    bonus_amount = turnover * BONUS_RATE;

    printf("[COMMERCIAL MANAGEMENT]\n");
    printf("Turnover      : %.0f FCFA\n", turnover);
    printf("Bonus (15%%)   : %.0f FCFA\n", bonus_amount);

    return 0;
}
```

**Expected Result (Console):**
```text
[COMMERCIAL MANAGEMENT]
Turnover      : 2500000 FCFA
Bonus (15%)   : 375000 FCFA
```

---

### Exercise 3: Bank Balance Control
**Statement:**
1. Declare a `balance` variable and a `withdrawal` variable (both in FCFA).
2. Use an `if / else` structure to check if the withdrawal is possible (sufficient balance).
3. Display "Transaction validated" or "Insufficient funds" as appropriate.

**Solution:**
```c
#include <stdio.h>

int main() {
    float balance = 50000.0;
    float withdrawal = 65000.0;

    printf("Attempting to withdraw: %.0f FCFA\n", withdrawal);

    if (withdrawal <= balance) {
        balance -= withdrawal;
        printf("Status : Transaction validated.\n");
        printf("New balance : %.0f FCFA\n", balance);
    } else {
        printf("Status : Insufficient funds (Missing %.0f FCFA).\n", withdrawal - balance);
    }

    return 0;
}
```

**Expected Result (Console):**
```text
Attempting to withdraw: 65000 FCFA
Status : Insufficient funds (Missing 15000 FCFA).
```

---

### Exercise 4: Tiered Discount Generation
**Statement:**
1. Simulate a purchase of 100,000 FCFA.
2. Apply a 10% discount if the amount > 50,000 FCFA using an `if` condition.
3. Display the final amount to pay.

**Solution:**
```c
#include <stdio.h>

int main() {
    float purchase_amount = 100000.0;
    float discount = 0.0;

    if (purchase_amount > 50000.0) {
        discount = purchase_amount * 0.10;
    }

    printf("Gross amount : %.0f FCFA\n", purchase_amount);
    printf("Discount (10%%) : %.0f FCFA\n", discount);
    printf("Net to pay     : %.0f FCFA\n", purchase_amount - discount);

    return 0;
}
```

**Expected Result (Console):**
```text
Gross amount : 100000 FCFA
Discount (10%) : 10000 FCFA
Net to pay     : 90000 FCFA
```

---

### Exercise 5: Vending Machine Menu
**Statement:**
1. Declare a `choice` variable for a menu (1: Coffee, 2: Tea, 3: Juice).
2. Use a `switch` to assign a price in FCFA to each drink.
3. Display the chosen item and its price.

**Solution:**
```c
#include <stdio.h>

int main() {
    int choice = 2;
    int price = 0;

    switch (choice) {
        case 1:
            printf("Selection : Espresso Coffee\n");
            price = 500;
            break;
        case 2:
            printf("Selection : Mint Tea\n");
            price = 300;
            break;
        case 3:
            printf("Selection : Pineapple Juice\n");
            price = 800;
            break;
        default:
            printf("Error : Product unavailable.\n");
            break;
    }

    if (price > 0) {
        printf("Price to pay : %d FCFA\n", price);
    }

    return 0;
}
```

**Expected Result (Console):**
```text
Selection : Mint Tea
Price to pay : 300 FCFA
```

---

### Exercise 6: VAT Calculation (Modularity - Prototypes/Definitions)
**Statement:**
1. Declare the prototype of a `calculateVAT` function taking an amount excluding tax and returning the tax amount (18%).
2. Define the `calculateVAT` function after `main`.
3. In `main`, call this function for an amount of 500,000 FCFA and display the result.

**Solution:**
```c
#include <stdio.h>

/* 1. Function Prototype */
float calculateVAT(float tet_amount);

int main() {
    float purchase_tet = 500000.0;
    float calculated_vat;

    calculated_vat = calculateVAT(purchase_tet);

    printf("Value Added Tax calculation:\n");
    printf("Base TET  : %.0f FCFA\n", purchase_tet);
    printf("VAT (18%%) : %.0f FCFA\n", calculated_vat);

    return 0;
}

/* 2. Function Definition */
float calculateVAT(float tet_amount) {
    return tet_amount * 0.18;
}
```

**Expected Result (Console):**
```text
Value Added Tax calculation:
Base TET  : 500000 FCFA
VAT (18%) : 90000 FCFA
```

---

### Exercise 7: Credit Transfer (Pointers & Addresses)
**Statement:**
1. Declare the prototype of a `transferCredit` procedure that takes the addresses of two balances (pointers).
2. Implement the procedure to transfer 5,000 FCFA from the source balance to the destination balance.
3. Simulate the operation between two accounts in `main` and display the new balances.

**Solution:**
```c
#include <stdio.h>

/* Prototype */
void transferCredit(int *source, int *destination, int amount);

int main() {
    int account_A = 15000;
    int account_B = 2000;

    printf("BEFORE - Account A: %d FCFA | Account B: %d FCFA\n", account_A, account_B);

    /* Call by address */
    transferCredit(&account_A, &account_B, 5000);

    printf("AFTER  - Account A: %d FCFA | Account B: %d FCFA\n", account_A, account_B);

    return 0;
}

/* Definition */
void transferCredit(int *source, int *destination, int amount) {
    if (*source >= amount) {
        *source -= amount;
        *destination += amount;
    }
}
```

**Expected Result (Console):**
```text
BEFORE - Account A: 15000 FCFA | Account B: 2000 FCFA
AFTER  - Account A: 10000 FCFA | Account B: 7000 FCFA
```

---

### Exercise 8: Sales Statistics (Arrays)
**Statement:**
1. Declare a `sales` array containing 5 daily amounts in FCFA.
2. Traverse the array with a `for` loop to calculate the weekly total.
3. Display the total turnover for the week.

**Solution:**
```c
#include <stdio.h>

int main() {
    int sales[5] = {150000, 220000, 180000, 250000, 195000};
    int weekly_total = 0;
    int i;

    for (i = 0; i < 5; i++) {
        weekly_total += sales[i];
    }

    printf("--- WEEKLY SALES REPORT ---\n");
    printf("Total accumulated : %d FCFA\n", weekly_total);
    printf("Daily average     : %d FCFA\n", weekly_total / 5);

    return 0;
}
```

**Expected Result (Console):**
```text
--- WEEKLY SALES REPORT ---
Total accumulated : 995000 FCFA
Daily average     : 199000 FCFA
```

---

### Exercise 9: Payroll Register (Structures)
**Statement:**
1. Define an `Employee` structure with `id`, `name`, and `salary` (in FCFA).
2. Instantiate an employee and assign data to them.
3. Display the employee's full pay slip.

**Solution:**
```c
#include <stdio.h>
#include <string.h>

typedef struct {
    int id;
    char name[50];
    int salary;
} Employee;

int main() {
    Employee emp;

    emp.id = 501;
    strcpy(emp.name, "KOFFI Amadou");
    emp.salary = 350000;

    printf("--- PAY SLIP ---\n");
    printf("ID      : #%d\n", emp.id);
    printf("NAME    : %s\n", emp.name);
    printf("SALARY  : %d FCFA\n", emp.salary);
    printf("---------------------\n");

    return 0;
}
```

**Expected Result (Console):**
```text
--- PAY SLIP ---
ID      : #501
NAME    : KOFFI Amadou
SALARY  : 350000 FCFA
---------------------
```

---

### Exercise 10: Stock Optimization (Bubble Sort)
**Statement:**
1. Declare an array of 5 unsorted product prices in FCFA.
2. Implement the bubble sort algorithm (prototyped and defined separately).
3. Display the list of prices sorted in ascending order.

**Solution:**
```c
#include <stdio.h>

/* Prototypes */
void sortPrices(int tab[], int n);
void displayTab(int tab[], int n);

int main() {
    int stock_prices[5] = {12500, 5000, 25000, 7500, 18000};

    printf("Initial prices : ");
    displayTab(stock_prices, 5);

    sortPrices(stock_prices, 5);

    printf("Sorted prices  : ");
    displayTab(stock_prices, 5);

    return 0;
}

/* Definitions */
void sortPrices(int tab[], int n) {
    int i, j, temp;
    for (i = 0; i < n - 1; i++) {
        for (j = 0; j < n - i - 1; j++) {
            if (tab[j] > tab[j + 1]) {
                temp = tab[j];
                tab[j] = tab[j + 1];
                tab[j + 1] = temp;
            }
        }
    }
}

void displayTab(int tab[], int n) {
    int i;
    for (i = 0; i < n; i++) {
        printf("%d FCFA ", tab[i]);
    }
    printf("\n");
}
```

**Expected Result (Console):**
```text
Initial prices : 12500 FCFA 5000 FCFA 25000 FCFA 7500 FCFA 18000 FCFA 
Sorted prices  : 5000 FCFA 7500 FCFA 12500 FCFA 18000 FCFA 25000 FCFA 
```
