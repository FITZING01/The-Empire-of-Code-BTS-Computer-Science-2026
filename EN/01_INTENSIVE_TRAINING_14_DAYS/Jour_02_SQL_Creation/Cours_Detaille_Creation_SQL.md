# SPRINT 19.5 - Day 02: Database Creation (SQL)

This document centralizes the architectural approach and strict 2025 BTS ECMN Syllabus standards for creating SQL relational schemas (DDL).

## 1. Sprint Context (Aviation & Sales)

The specifications require dual modeling to ensure maximum versatility for candidates:
- **Aviation Management**: Tracking Pilots, Planes, and their respective Flights.
- **Commercial Management**: Tracking Customers, Products, and Sales history.

## 2. Creation Standards (DDL)

Each table must comply with the following rules:
- One primary key (`PRIMARY KEY`) per table, the record's unique identifier.
- Use of `NOT NULL` for strategic columns (Name, etc.).
- Proper declaration of foreign keys (`FOREIGN KEY`) to ensure referential integrity.

## 3. The Importance of Constraints (ALTER TABLE)

Adding constraints after the fact allows for securing the model without cluttering the initial script.

```sql
ALTER TABLE Pilote ADD CONSTRAINT chk_salaire CHECK (Salaire > 0);
```

This syntax ensures that inserted data respects business logic (no negative salary, no plane with negative capacity, etc.). A robust database is the key to a sustainable Information System (IS).
