# SPRINT 19.5 - Day 08: UML Modeling (Use Case & Sequence)

Dynamic UML is crucial for representing IS behavior. In accordance with the 2025 Syllabus directives, we focus on behavioral diagrams.

## 1. Use Case Diagram

The objective is to define "who" does "what" in the CND bank system.

**Subject**: Account opening.
- **Actors**: The Client (CND) and the Bank Employee.
- **Main Case**: Open an account.
- **Extensions (<<extend>>)**: These cases are optional. A client can request an Opening Bonus or Manage Foreign Currencies during their account opening, but it is not systematic.

## 2. Sequence Diagrams

They detail the temporal order of messages between objects.

### Sequence 1: Buy a Ticket
The traveler interacts with the Reservation System. An external actor (Banking Gateway) is necessary to validate the transaction asynchronously before the ticket is issued.

### Sequence 2: License Tracking (Pilot)
This diagram illustrates conditional interactions thanks to the **alt** (alternative) block.
- If the license is close to expiration, the renewal process is triggered.
- Otherwise, no action is required.

Activation returns (`activate`/`deactivate`) demonstrate execution control, a major requirement for correction.
