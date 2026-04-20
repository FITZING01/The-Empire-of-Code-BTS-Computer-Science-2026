// ==============================================================================
// JOUR 10 : JAVA LES BASES - Classe Account (Sujet 1)
// 🎯 Objectif : Encapsulation, Constructeurs, Calculs d'intérêts
// ==============================================================================

public class Account {
    // 1. Encapsulation stricte (private)
    private double solde;
    private String titulaire;

    // 2. Constructeur par défaut
    public Account() {
        this.titulaire = "Anonyme";
        this.solde = 0.0;
    }

    // 3. Constructeur avec paramètres (Surcharge)
    public Account(String titulaire, double soldeInitial) {
        this.titulaire = titulaire;
        this.solde = (soldeInitial >= 0) ? soldeInitial : 0.0;
    }

    // 4. Getters & Setters
    public double getSolde() { 
        return this.solde; 
    }
    
    public String getTitulaire() { 
        return this.titulaire; 
    }

    // 5. Méthodes métiers
    public void deposer(double montant) {
        if (montant > 0) {
            this.solde += montant;
        }
    }

    public boolean retirer(double montant) {
        if (montant > 0 && this.solde >= montant) {
            this.solde -= montant;
            return true;
        }
        return false;
    }

    /**
     * Ajoute des intérêts au solde actuel.
     * Formule : Solde * (1 + TauxInteret)
     * @param tauxInteret Le taux sous forme décimale (ex: 0.05 pour 5%)
     */
    public void ajouterInteret(double tauxInteret) {
        if (tauxInteret > 0) {
            this.solde = this.solde * (1 + tauxInteret);
        }
    }
}
