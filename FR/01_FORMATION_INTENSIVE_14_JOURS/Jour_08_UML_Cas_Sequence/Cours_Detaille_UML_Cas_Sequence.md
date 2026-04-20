# SPRINT 19.5 - Jour 08 : Modélisation UML (Cas d'Utilisation & Séquence)

L'UML dynamique est crucial pour représenter le comportement du SI. Conformément aux directives du Syllabus 2025, nous nous concentrons sur les diagrammes comportementaux.

## 1. Diagramme de Cas d'Utilisation (Use Case)

L'objectif est de définir "qui" fait "quoi" dans le système de la banque CND.

**Sujet** : L'ouverture de compte.
- **Acteurs** : Le Client (CND) et l'Employé de Banque.
- **Cas principal** : Ouvrir un compte.
- **Extensions (<<extend>>)** : Ces cas sont optionnels. Un client peut demander un Bonus d'ouverture ou Gérer des Devises Étrangères lors de son ouverture de compte, mais ce n'est pas systématique.

## 2. Diagrammes de Séquence

Ils détaillent l'ordre temporel des messages entre les objets.

### Séquence 1 : Acheter un Billet
Le voyageur interagit avec le Système de Réservation. Un acteur externe (Passerelle Bancaire) est nécessaire pour valider la transaction de manière asynchrone avant l'émission du billet.

### Séquence 2 : Suivi de Licence (Pilote)
Ce diagramme illustre les interactions conditionnelles grâce au bloc **alt** (alternative).
- Si la licence est proche de l'expiration, le processus de renouvellement est déclenché.
- Sinon, aucune action n'est requise.

Les retours d'activation (`activate`/`deactivate`) démontrent le contrôle d'exécution, une exigence majeure de correction.
