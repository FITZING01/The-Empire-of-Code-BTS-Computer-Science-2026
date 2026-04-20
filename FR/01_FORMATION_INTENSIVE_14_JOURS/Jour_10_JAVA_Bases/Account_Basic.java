package bts.java;

/**
 * @description Classe Account simulant un compte bancaire (Sujet 1)
 * Inclut la gestion du solde, dépôts, retraits et calcul d'intérêts.
 */
public class Account {
    private double balance;

    // Constructeur par défaut : solde à zéro
    public Account() {
        this.balance = 0.0;
    }

    // Constructeur avec balance initiale
    public Account(double initialBalance) {
        if (initialBalance >= 0) {
            this.balance = initialBalance;
        } else {
            this.balance = 0.0;
        }
    }

    // Renvoie le solde actuel
    public double getBalance() {
        return this.balance;
    }

    // Déposer un montant
    public void deposer(double montant) {
        if (montant > 0) {
            this.balance += montant;
        }
    }

    // Retirer un montant
    public void retirer(double montant) {
        if (montant > 0 && montant <= this.balance) {
            this.balance -= montant;
        } else {
            System.out.println("Solde insuffisant ou montant invalide.");
        }
    }

    /**
     * @param taux Taux d'intérêt (ex: 0.05 pour 5%)
     * Modifie le solde en appliquant la formule : solde * (1 + taux)
     */
    public void ajouterInteret(double taux) {
        this.balance = this.balance * (1 + taux);
    }
}
