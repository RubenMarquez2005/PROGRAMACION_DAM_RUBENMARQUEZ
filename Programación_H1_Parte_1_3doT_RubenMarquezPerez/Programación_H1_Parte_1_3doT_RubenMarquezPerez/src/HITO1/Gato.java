package HITO1;

public class Gato extends Animal {// subclase gato que hereda de animal
    private boolean testLeucemia;

    // Constructor de Gato
    public Gato(int chip, String nombre, int edad, String raza, boolean adoptado, boolean testLeucemia) {
        super(chip, nombre, edad, raza, adoptado);  // constructor de la clase Animal
        this.testLeucemia = testLeucemia;
    }

    // método mostrar que lo hereda de animal
    public void mostrar() {
        System.out.println("Gato");
        System.out.println("Nº Chip: " + getChip());  // Usamos el get Animal para mostrar el Chip
        System.out.println("Nombre: " + getNombre());  //Usamos el get Animal para mostrar el nombre
        System.out.println("Edad: " + getEdad());  // Usamos el get Animal para mostrar la edad
        System.out.println("Raza: " + getRaza());  // Usamos el get Animal para mostrar la raza
        System.out.println("¿Es adoptado?: " + (isAdoptado() ? "Sí" : "No"));  // Usamos el get Animal para mostrar si es adoptado o no
        System.out.println("El test de Leucemia: " + (testLeucemia ? "Positivo" : "Negativo")); // nos muestra si el test da positivo o negativo en leucemia
    }

}
