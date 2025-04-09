package PARTEII_HITOI;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class GestionAnimales {
    private List<Animal> animales; // Lista para almacenar todos los animales
    private List<Adopcion> adopciones; // Lista para almacenar las adopciones
    private Scanner scanner; // Para leer lo que el usuario escribe

    // Constructor donde iniciamos las listas y el scanner
    public GestionAnimales() {
        animales = new ArrayList<>(); 
        adopciones = new ArrayList<>(); 
        scanner = new Scanner(System.in); 
    }

    // Método para dar de alta un animal, pidiendo los datos al usuario
    public void darDeAltaAnimal() {
        System.out.print("Introduce el número de chip: "); 
        String numeroChip = scanner.nextLine(); // Cambiado de int a String
        System.out.print("Introduce el nombre del animal: "); 
        String nombre = scanner.nextLine(); // Leemos el nombre del animal
        System.out.print("¿Es un gato? (true/false): "); 
        boolean esGato = scanner.nextBoolean(); // Leemos si es gato o no
        scanner.nextLine();  // Limpiamos el buffer de entrada

        // Creamos el animal según sea gato o perro
        Animal animal = null;
        if (esGato) {
            System.out.print("¿Tiene leucemia? (true/false): "); 
            boolean tieneLeucemia = scanner.nextBoolean(); // Si es gato, le preguntamos si tiene leucemia
            scanner.nextLine(); // Limpiamos el buffer
            System.out.print("Introduce la edad del gato: ");
            int edad = scanner.nextInt(); // Leemos la edad
            scanner.nextLine();  // Limpiamos el buffer de nuevo
            animal = new Gato(numeroChip, nombre, edad, tieneLeucemia); // Creamos un gato
        } else {
            System.out.print("Introduce la raza del perro: "); 
            String raza = scanner.nextLine(); // Si no es gato, preguntamos la raza
            System.out.print("Introduce la edad del perro: ");
            int edad = scanner.nextInt(); // Leemos la edad
            scanner.nextLine();  // Limpiamos el buffer
            animal = new Perro(numeroChip, nombre, edad, raza); // Creamos un perro
        }

        // Aquí validamos que el chip no esté repetido
        if (existeChip(numeroChip)) {
            System.out.println("Error: Este chip ya está registrado."); // Si el chip ya existe, mostramos un error
            return; // Salimos del método para no añadir el animal
        }

        animales.add(animal); // Añadimos el animal a la lista
        System.out.println("Animal dado de alta correctamente."); // Avisamos que se dio de alta
    }

    // Método para listar todos los animales registrados
    public void listarAnimales() {
        for (Animal animal : animales) {
            animal.mostrarDatos(); // Mostramos los datos de cada animal
        }
    }

    // Método para buscar un animal por su chip
    public void buscarAnimal() {
        System.out.print("Introduce el número de chip: "); 
        String numeroChip = scanner.nextLine(); // Pedimos el chip para buscarlo
        boolean encontrado = false;

        // Buscamos el animal con ese chip
        for (Animal animal : animales) {
            if (animal.getNumeroChip().equals(numeroChip)) {
                animal.mostrarDatos(); // Si lo encontramos, mostramos los datos
                encontrado = true;
                break;
            }
        }

        // Si no encontramos el animal con ese chip, mostramos un mensaje de error
        if (!encontrado) {
            System.out.println("No se encontró ningún animal con ese chip.");
        }
    }

    // Método para realizar la adopción de un animal
    public void realizarAdopcion() {
        System.out.print("Introduce el número de chip del animal a adoptar: "); 
        String numeroChip = scanner.nextLine(); // Pedimos el chip para adoptar el animal
        Animal animal = null;

        // Buscamos el animal con ese chip
        for (Animal a : animales) {
            if (a.getNumeroChip().equals(numeroChip)) {
                animal = a;
                break;
            }
        }

        // Si el animal no está o ya está adoptado, mostramos un error
        if (animal == null || animal.esAdoptado()) {
            System.out.println("No se puede realizar la adopción: el animal no existe o ya está adoptado.");
            return;
        }

        // Pedimos los datos del adoptante o de la persona que le va a adoptar
        System.out.print("Introduce el nombre del adoptante: "); 
        String nombreAdoptante = scanner.nextLine(); 
        System.out.print("Introduce el DNI del adoptante: ");
        String dniAdoptante = scanner.nextLine();

        // Creamos la adopción y la añadimos
        Adopcion adopcion = new Adopcion(numeroChip, nombreAdoptante, dniAdoptante);
        adopciones.add(adopcion);
        animal.setAdoptado(true); // Marcamos al animal como adoptado
        System.out.println("Adopción realizada con éxito.");
        adopcion.mostrar();
    }

    // Método para dar de baja un animal
    public void darDeBajaAnimal() {
        System.out.print("Introduce el número de chip del animal a dar de baja: ");
        String numeroChip = scanner.nextLine(); // Pedimos el chip para dar de baja el animal
        Animal animal = null;

        // Buscamos el animal con ese chip
        for (Animal a : animales) {
            if (a.getNumeroChip().equals(numeroChip)) {
                animal = a;
                break;
            }
        }

        // Si no encontramos el animal, muestra un error
        if (animal == null) {
            System.out.println("No se encontró el animal.");
            return;
        }

        // Si el animal ya está adoptado, eliminamos la adopción también
        if (animal.esAdoptado()) {
            for (int i = 0; i < adopciones.size(); i++) {
                if (adopciones.get(i).getNumeroChipAnimal().equals(numeroChip)) {
                    adopciones.remove(i);
                    break;
                }
            }
        }

        // Eliminamos el animal de la lista
        animales.remove(animal);
        System.out.println("Animal dado de baja correctamente.");
    }

    // Método para mostrar estadísticas de los gatos
    public void mostrarEstadisticasGatos() {
        int totalGatos = 0; // Iniciamos un contador
        int gatosLeucemia = 0; // Iniciamos un contador

        // Contamos los gatos y los que tienen leucemia
        for (Animal animal : animales) {
            if (animal.esGato()) {
                totalGatos++;
                if (((Gato) animal).tieneLeucemia()) {
                    gatosLeucemia++;
                }
            }
        }

        // Mostramos las estadísticas
        System.out.println("Total de gatos: " + totalGatos);
        System.out.println("Gatos con leucemia: " + gatosLeucemia);
    }

    // Menú de opciones para el usuario
    public void menu() {
        int opcion;
        do {
            System.out.println("1 – Dar de alta animal");
            System.out.println("2 – Listar animales");
            System.out.println("3 – Buscar animal");
            System.out.println("4 – Realizar adopción");
            System.out.println("5 – Dar de baja");
            System.out.println("6 – Mostrar estadísticas de gatos");
            System.out.println("7 – Salir");
            System.out.print("Selecciona una opción: ");
            opcion = scanner.nextInt();
            scanner.nextLine();

            // Ejecutamos la opción que elija el usuario
            switch (opcion) {
                case 1:
                    darDeAltaAnimal();
                    break;
                case 2:
                    listarAnimales();
                    break;
                case 3:
                    buscarAnimal();
                    break;
                case 4:
                    realizarAdopcion();
                    break;
                case 5:
                    darDeBajaAnimal();
                    break;
                case 6:
                    mostrarEstadisticasGatos();
                    break;
                case 7:
                    System.out.println("Saliendo...");
                    break;
                default:
                    System.out.println("Opción no válida.");
            }
        } while (opcion != 7);
    }

    // Método que verifica si un chip ya existe
    public boolean existeChip(String numeroChip) {
        for (Animal animal : animales) {
            if (animal.getNumeroChip().equals(numeroChip)) {
                return true; // Si el chip ya existe, retorna true
            }
        }
        return false; // Si no existe, retorna false
    }
}
