package HITO1;

import java.util.Scanner;

public class Principal {
    public static void main(String[] args) {
        // Instanciamos la gestión de animales
        GestionAnimales gestion = new GestionAnimales();

        // Creamos algunos animales
        Perro perro1 = new Perro(12345, "Max", 3, "Labrador", true, "Grande");
        Perro perro2 = new Perro(67890, "Rocky", 2, "Bulldog", false, "Mediano");
        Gato gato1 = new Gato(11223, "Miau", 4, "Siames", true, false);
        Gato gato2 = new Gato(44556, "Pelusa", 1, "Persa", false, true);

        // Añadimos los animales a la gestion de animales
        gestion.añadirAnimal(perro1);
        gestion.añadirAnimal(perro2);
        gestion.añadirAnimal(gato1);
        gestion.añadirAnimal(gato2);

        // Intentamos añadir un animal con un chip repetido
        Perro perroRepetido = new Perro(12345, "Toby", 5, "Golden Retriever", true, "Pequeño");
        gestion.añadirAnimal(perroRepetido);  // Esto debería dar error porque el chip ya está registrado

        // Mostramos todos los chips de los animales disponibles para que el usuario le sea mas facil consultarlo al meter el chip
        System.out.println("Chips de los animales registrados:");
        for (int chip : gestion.getAnimales().keySet()) {
            System.out.println("Chip: " + chip);
        }

        // Pedimos al usuario que ingrese un chip para buscar el animal una vez que nos ha mostrado todos los chips registrados
        Scanner scanner = new Scanner(System.in);
        System.out.print("\nIntroduce el chip del animal para ver los detalles: ");
        int chipUsuario = scanner.nextInt();

        // Buscamos y se muestra el animal con el chip que el usuario ha metido por teclado
        gestion.buscarAnimal(chipUsuario);

        scanner.close(); //cerramos scanner que es para que el usuario pueda meter por teclado
    }
}
