package HITO1;

public class Perro extends Animal {// Hereda de animal
    private String tamaño; // añado el atributo privado que es el tamaño del perro

    // Constructor de Perro
    public Perro(int chip, String nombre, int edad, String raza, boolean adoptado, String tamaño) {
        super(chip, nombre, edad, raza, adoptado);  // constructor de la clase Animal
        this.tamaño = tamaño;
    }

    // método mostrar que lo hereda de animal
    public void mostrar() {
        System.out.println("Perro");
        System.out.println("Nº Chip: " + getChip());  // Usamos el get Animal para mostrar el Chip
        System.out.println("Nombre: " + getNombre());  // Usamos el get Animal para mostrar el nombre
        System.out.println("Edad: " + getEdad());  // Usamos el get Animal para mostrar la edad
        System.out.println("Raza: " + getRaza());  // Usamos el get Animal para mostrar la raza
        System.out.println("¿Es adoptado?: " + (isAdoptado() ? "Sí" : "No"));  // Nos muestra si es adoptado o no
        System.out.println("Tamaño: " + tamaño); // nos muestra el tamaño del perro
    }
}
