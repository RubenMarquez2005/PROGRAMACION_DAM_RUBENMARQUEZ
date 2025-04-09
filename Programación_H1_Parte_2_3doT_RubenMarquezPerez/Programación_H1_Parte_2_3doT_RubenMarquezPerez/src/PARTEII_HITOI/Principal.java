package PARTEII_HITOI;

public class Principal {
    public static void main(String[] args) {
        // Instanciamos la clase GestionAnimales para poder interactuar con los animales
        GestionAnimales gestion = new GestionAnimales();

        // Llamamos al método menu() para que el usuario vea las opciones y pueda interactuar
        gestion.menu();
    }
}
