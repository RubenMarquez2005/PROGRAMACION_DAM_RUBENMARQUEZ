package HITO1;

import java.util.Scanner;

public class Principal {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        GestionAnimales gestion = new GestionAnimales();

        // Creo dos animales de prueba para que no empiece vacío el programa
        Perro perro1 = new Perro(101, "Rocco", 3, "Labrador", false, "Grande");
        Gato gato1 = new Gato(202, "Misha", 2, "Siamés", false, false);
        gestion.añadirAnimal(perro1);
        gestion.añadirAnimal(gato1);

        int opcion = 0;

        // Hacemos el menú que se repite hasta que el usuario quiera salir
        while (opcion != 4) {
            System.out.println("\n--- Menú ---");
            System.out.println("1. Buscar un animal por chip");
            System.out.println("2. Añadir un animal nuevo");
            System.out.println("3. Ver cuántos animales hay registrados");
            System.out.println("4. Salir");
            System.out.print("Elige una opción: ");
            opcion = scanner.nextInt();

            switch (opcion) {
                case 1:
                    // Opción para buscar animal por chip
                    System.out.print("Introduce el número de chip del animal: ");
                    int chipBusqueda = scanner.nextInt();
                    gestion.buscarAnimal(chipBusqueda);
                    break;

                case 2:
                    // Opción para añadir un animal, pregunto si es perro o gato
                    System.out.println("¿Qué tipo de animal quieres añadir? (1. Perro / 2. Gato): ");
                    int tipoAnimal = scanner.nextInt();

                    // Pido los datos básicos que tienen todos los animales
                    System.out.print("Número de chip: ");
                    int chip = scanner.nextInt();
                    scanner.nextLine(); // Esto limpia el buffer porque luego uso nextLine()

                    System.out.print("Nombre: ");
                    String nombre = scanner.nextLine();

                    System.out.print("Edad: ");
                    int edad = scanner.nextInt();
                    scanner.nextLine(); // Limpio otra vez

                    System.out.print("Raza: ");
                    String raza = scanner.nextLine();

                    System.out.print("¿Está adoptado? (true/false): ");
                    boolean adoptado = scanner.nextBoolean();

                    if (tipoAnimal == 1) {
                        // Si es un perro, pido el tamaño también
                        scanner.nextLine(); // Limpio buffer
                        System.out.print("Tamaño del perro (Pequeño/Mediano/Grande): ");
                        String tamaño = scanner.nextLine();

                        // Creo el perro con todos los datos y lo añado
                        Perro nuevoPerro = new Perro(chip, nombre, edad, raza, adoptado, tamaño);
                        gestion.añadirAnimal(nuevoPerro);

                    } else if (tipoAnimal == 2) {
                        // Si es un gato, pido si tiene leucemia o no
                        System.out.print("¿Test de leucemia positivo? (true/false): ");
                        boolean leucemia = scanner.nextBoolean();

                        // Creo el gato con todos los datos y lo añado
                        Gato nuevoGato = new Gato(chip, nombre, edad, raza, adoptado, leucemia);
                        gestion.añadirAnimal(nuevoGato);
                    } else {
                        // Por si acaso meten un número que no es 1 ni 2
                        System.out.println("Opción no válida.");
                    }
                    break;

                case 3:
                    // Muestro cuántos animales hay guardados ahora mismo
                    System.out.println("Animales registrados: " + gestion.getAnimales().size());
                    break;

                case 4:
                    // Si eligen salir, lo avisamos
                    System.out.println("Saliendo del programa...");
                    break;

                default:
                    // Por si escriben una opción que no existe
                    System.out.println("Opción no válida, intenta otra vez.");
            }
        }

        scanner.close(); // Cierro el scanner
    }
}
