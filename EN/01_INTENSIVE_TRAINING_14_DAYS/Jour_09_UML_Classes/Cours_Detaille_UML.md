# SPRINT 19.5 - Day 09: Data Modeling (UML Classes)

The class diagram is the backbone of object modeling. It defines the static structure of the system.

## 1. Key Concepts: Classes and Attributes

For the **Online Library**, we model the business entities:
- **Subscriber**: Carries user information. Its methods (`borrowBook`, `payFine`) translate its capacities for action.
- **Book**: Represents the resource. The `isAvailable` attribute is crucial for business logic.
- **Loan**: Pivot class that materializes the interaction between the Subscriber and the Book. It records temporality (return dates).

## 2. Management of Delays and Fines

The business complexity lies in the link between the Loan and the Fine.
- **Association 1 to 0..1**: A loan can generate at most one fine (if the return is late).
- **Calculation Logic**: The `calculateFine()` method of the Loan class calculates the amount due based on the days of delay.

## 3. Cardinalities (Multiplicities)

- A **Subscriber** can make several loans (`1..*`).
- A **Book** can be the subject of several historical loans (`1..*`), although it can only be physically borrowed once at a time T (managed by `isAvailable`).
- A **Loan** concerns exactly one book and one subscriber.

This rigor in associations guarantees a Java or SQL implementation without design errors.
