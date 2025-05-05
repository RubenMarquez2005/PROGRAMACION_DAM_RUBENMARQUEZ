package PARTEII_HITOI;

public abstract class Animal {
    protected String numeroChip;
    protected String nombre;
    protected int edad;
    protected String raza;  // Raza puede ser null
    protected boolean adoptado;

    // Constructor completo
    public Animal(String numeroChip, String nombre, int edad, String raza) {
        this.numeroChip = numeroChip;
        this.nombre = nombre;
        this.edad = edad;
        this.raza = raza;
        this.adoptado = false; // Por defecto, un animal no está adoptado
    }

    // Constructor sin raza (para los animales que no la necesiten)
    public Animal(String numeroChip, String nombre, int edad) {
        this(numeroChip, nombre, edad, null);  // En este caso, raza es null
    }

    // Métodos abstractos que deben ser implementados en las subclases
    public abstract void mostrarDatos();

    public abstract boolean esGato();

    // Getter y Setter
    public String getNumeroChip() {
        return numeroChip;
    }

    public boolean esAdoptado() {
        return adoptado;
    }

    public void setAdoptado(boolean adoptado) {
        this.adoptado = adoptado;
    }
}
