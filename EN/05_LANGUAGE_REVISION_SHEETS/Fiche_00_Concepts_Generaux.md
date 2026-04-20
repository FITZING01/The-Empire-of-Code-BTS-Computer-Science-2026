# 🧠 SHEET 00: GENERAL CONCEPTS & OOP
**The Universal Theoretical Foundation (Updated 20/04/2026)**

---

## 1. THE STRUCTURED FOUNDATIONS
*   **Algorithm**: A finite sequence of instructions used to solve a problem.
*   **Variable**: A named memory location used to store data.
*   **Constant**: Immutable data during execution.
*   **Function/Method Signature**: It consists of the **name** of the function and the **list of its parameters** (type and order). It is the unique identity of the function.

---

## 2. MODULARITY & PARAMETER PASSING
*   **Function**: A reusable block of code that returns a value.
*   **Procedure**: A block of code that performs actions without returning a value (`void`).
*   **Pass by Value**: A **copy** of the variable is sent. If the function modifies the parameter, the original variable remains intact.
*   **Pass by Address (or Reference)**: The **memory address** of the variable is sent. The function works directly on the original. Any modification is reflected everywhere.

---

## 3. OBJECT-ORIENTED PROGRAMMING (OOP)
*   **Class**: This is the "mold" or construction plan. It defines the structure (attributes) and behavior (methods) of future objects.
*   **Object**: This is an "instance" of a class. It is the concrete entity created from the mold (e.g., the class is "Car", the object is "My Toyota").
*   **Attribute**: A variable internal to a class (characteristic of the object).
*   **Method**: A function internal to a class (action that the object can perform).

---

## 4. ENCAPSULATION & ACCESS
*   **Encapsulation**: A concept consisting of hiding the internal details of an object (by setting attributes to `private`) and only allowing access via specific methods.
*   **Accessor (Getter)**: A method used to **read** the value of a private attribute. (Conventional name: `getName()`).
*   **Mutator (Setter)**: A method used to **modify** the value of a private attribute while controlling data validity. (Conventional name: `setName()`).

---

## 5. ADVANCED MECHANISMS
*   **Inheritance**: A mechanism allowing a class (child) to inherit the attributes and methods of another class (parent). Promotes code reuse.
*   **Polymorphism**: The ability of code to behave differently depending on the type of the object calling it (e.g., a `calculateSalary()` method that acts differently for an "Employee" or a "Director").
*   **Constructor**: A special method called automatically when an object is created to initialize its attributes.
*   **Destructor**: A method called when an object is deleted (mainly in C++).
