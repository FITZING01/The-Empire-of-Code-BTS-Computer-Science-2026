-- ==========================================
-- SPRINT 19.5 - ADVANCED SQL QUERIES
-- ==========================================

-- 1. DISTINCT selection of departure cities
SELECT DISTINCT DepartureCity FROM Flight;

-- 2. Conditional UPDATE: Update plane 101 capacity to 220
UPDATE Plane
SET Capacity = 220
WHERE PlaneNum = 101;

-- 3. Complex conditional DELETE: 
-- Delete flights to Douala before March 1st, 2025 operated by planes with capacity < 200
DELETE FROM Flight
WHERE ArrivalCity = 'Douala' 
  AND FlightDate < '2025-03-01'
  AND PlaneNum IN (SELECT PlaneNum FROM Plane WHERE Capacity < 200);

-- 4. Complex subqueries: Pilots with salary higher than ALL pilots from Yaoundé
-- Mandatory use of ALL (Standard BTS Syllabus)
SELECT * FROM Pilot
WHERE Salary > ALL (SELECT Salary FROM Pilot WHERE PilotCity = 'Yaounde');

-- 5. Alternative subquery: Pilots with salary higher than the MAX of pilots from Yaoundé
SELECT * FROM Pilot
WHERE Salary > (SELECT MAX(Salary) FROM Pilot WHERE PilotCity = 'Yaounde');

-- 6. Average calculations and filters: Planes with capacity above the fleet average
SELECT * FROM Plane
WHERE Capacity > (SELECT AVG(Capacity) FROM Plane);

-- 7. Sales: Products sold in quantity higher than the global sales average
SELECT p.ProductName, s.Qty 
FROM Product p
JOIN Sale s ON p.ProductCode = s.ProductCode
WHERE s.Qty > (SELECT AVG(Qty) FROM Sale);
