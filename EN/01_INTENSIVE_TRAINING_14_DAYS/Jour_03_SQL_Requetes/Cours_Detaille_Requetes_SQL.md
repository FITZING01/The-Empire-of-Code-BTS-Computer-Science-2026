# SPRINT 19.5 - Day 03: SQL Query Mastery (DML)

The BTS ECMN 2025 Syllabus emphasizes nested queries and precise data manipulation. This document guides the student in writing high-performance queries.

## 1. Filtering and Uniqueness (DISTINCT)

To avoid duplicate results, the `DISTINCT` keyword is indispensable.
Example: Extract the unique list of departure cities for flights.

## 2. Data Manipulation (UPDATE / DELETE)

Updates and deletions must be targeted. Conditions can involve joins or subqueries.

```sql
DELETE FROM Flight WHERE FlightDate < '2025-03-01' AND PlaneNum IN (...);
```

## 3. Subqueries (Calculations and Comparisons)

- **ALL / ANY**: Allow comparing a value to the entire result set of a subquery.
- **AVG / MAX / MIN / SUM**: Essential aggregation functions for management statistics.

The candidate must be able to compare an individual row to a global metric (for example: find salaries higher than the average).

## 4. Joins

To link two entities (Client and Sale), the SQL join is the foundation of relational interrogation.
