# Full Correction: Subject 1 (Aviation & Jerseys)

## Part A: Theory (Selected Excerpts)
1. **URL (4 elements)**: Protocol (http), Domain (www.air-cameroon.cm), Port (80), Path (/flights/search).
2. **Local Storage**: Used to store the customer's jersey cart between two sessions without server interaction.
3. **Responsive**: Use of Media Queries to adapt the flight site display on mobile.

---

## Part B: Practice

### Section 1: UML (Ticket Sale)
- **Use Case**: The customer "Buys a ticket". This includes flight search, choosing an option, and secure payment by credit card.
- **Sequence**: 
  - Client -> Submits (DepartureCity, ArrivalCity, Date).
  - Server -> Returns Flights List.
  - Client -> Selects Flight.
  - Server -> Requests Payment (CC).

### Section 2: SQL (Flight Management)
```sql
-- Show data for planes with the lowest capacity
SELECT * FROM Plane WHERE PlaneCapacity = (SELECT MIN(PlaneCapacity) FROM Plane);

-- Names of pilots flying an AIRBUS in service
SELECT PilotName FROM Pilot p JOIN Flight v ON p.PilotNum = v.PilotNum 
JOIN Plane a ON v.PlaneNum = a.PlaneNum WHERE a.PlaneName = 'AIRBUS';
```

### Section 3: Web (Jersey Marketplace)
- **index.php**: Contains the `<meta>` title and the link to `JerseyList.php`.
- **Jersey.js**: Uses a loop to display 5 jerseys (Cameroon, France, Brazil, Argentina, Senegal).
- **ContactForm.php**: Validates the email with `filter_var()`.

### Section 4: Java (Account Class)
- Implementation of the `Account(double initial)` constructor and the `addInterest(double rate)` method.
- Example: A balance of 1000 with a rate of 0.05 becomes 1050.
