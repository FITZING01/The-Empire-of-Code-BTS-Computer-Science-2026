# Full Correction: Subject 2 (Sales & Banking)

## Part A: Theory
1. **Digital vs. Traditional Marketing**: Digital is measurable, interactive, and cheaper than traditional billboards or TV.
2. **B2B vs. B2C**: B2B (Business to Business), B2C (Business to Consumer).
3. **Marketplace**: A connecting platform (e.g., a multi-vendor school supplies store).

---

## Part B: Practice

### Section 1: UML (Account Opening & Library)
- **Inheritance**: Client -> CNDClient (Non-Resident Currency Account).
- **Classes**: Library owns Document (Book, Movie) with a `calculateLateFees()` method.

### Section 2: SQL (Sales Management)
```sql
-- Products cheaper than average
SELECT ProdName FROM Product WHERE ProdPrice < (SELECT AVG(ProdPrice) FROM Product);

-- Clients living in the same city as C2
SELECT CliName FROM Client WHERE CliCity = (SELECT CliCity FROM Client WHERE CliID = 'C2') AND CliID <> 'C2';

-- Deletion by date and city
DELETE FROM Sale WHERE CliID IN (SELECT CliID FROM Client WHERE CliCity = 'Douala') 
AND SaleDate < '2025-03-01';
```

### Section 3: Web (School Supplies)
- **ContactForm.php**: Added `neighborhood` and `phone` fields required by the subject.
- **School.js**: Displays notebooks, pens, and textbooks with their prices.

### Section 4: Java (Article Class)
- **Protected visibility**: `protected String code;`
- **Exceptions**: `throw new InvalidCategoryException()` if the category is not IT or Office.
- **toString**: `"A01;Keyboard;15000;IT"`.
- **Equals**: Structural equality check (all fields).
