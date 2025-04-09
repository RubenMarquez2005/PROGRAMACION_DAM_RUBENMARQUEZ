package PARTEII_HITOI;

public class Gato extends Animal {
    private boolean tieneLeucemia;

    // Constructor
    public Gato(String numeroChip, String nombre, int edad, boolean tieneLeucemia) {
        super(numeroChip, nombre, edad );  // No usamos raza para el gato
        this.tieneLeucemia = tieneLeucemia;
    }

    public void mostrarDatos() {
        // Mostrar todos los datos heredados de Animal, además de los específicos de Gato
        System.out.println("Gato: " + nombre + " | Chip: " + numeroChip + " | Edad: " + edad + " | Leucemia: " + (tieneLeucemia ? "Sí" : "No") + " | Adoptado: " + (adoptado ? "Sí" : "No"));
    }

    public boolean esGato() {
        return true;
    }

    public boolean tieneLeucemia() {
        return tieneLeucemia;
    }
}
