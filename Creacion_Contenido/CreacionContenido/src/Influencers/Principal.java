package Influencers;

import java.util.ArrayList;
import java.util.Scanner;

public class Principal {
    static ArrayList<Creador> creadores = new ArrayList<>();
    static Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) {
        int opcion;
        do {
            System.out.println("\n--- Menú de Gestión de Creadores ---");
            System.out.println("1. Añadir nuevo creador");
            System.out.println("2. Mostrar todos los creadores");
            System.out.println("3. Registrar nuevo contenido para un creador");
            System.out.println("4. Registrar nueva colaboración para un creador");
            System.out.println("5. Consultar contenidos de un creador");
            System.out.println("6. Consultar colaboraciones de un creador");
            System.out.println("7. Eliminar un creador");
            System.out.println("8. Salir");
            System.out.print("Elige una opción: ");
            opcion = Integer.parseInt(scanner.nextLine());

            switch (opcion) {
                case 1 -> anadirCreador();
                case 2 -> mostrarCreadores();
                case 3 -> registrarContenido();
                case 4 -> registrarColaboracion();
                case 5 -> consultarContenidos();
                case 6 -> consultarColaboraciones();
                case 7 -> eliminarCreador();
                case 8 -> System.out.println("Saliendo...");
                default -> System.out.println("Opción no válida.");
            }
        } while (opcion != 8);
    }

    static void anadirCreador() {
        System.out.print("Introduce el ID del creador: ");
        String id = scanner.nextLine();
        for (Creador c : creadores) {
            if (c.getId().equals(id)) {
                System.out.println("Ya existe un creador con ese ID.");
                return;
            }
        }
        System.out.print("Introduce el nombre del creador: ");
        String nombre = scanner.nextLine();
        creadores.add(new Creador(id, nombre));
        System.out.println("Creador añadido exitosamente.");
    }

    static void mostrarCreadores() {
        if (creadores.isEmpty()) {
            System.out.println("No hay creadores registrados.");
        } else {
            for (Creador c : creadores) {
                System.out.println(c.mostrar());
            }
        }
    }

    static Creador buscarCreador() {
        System.out.print("Introduce el ID del creador: ");
        String id = scanner.nextLine();
        for (Creador c : creadores) {
            if (c.getId().equals(id)) {
                return c;
            }
        }
        System.out.println("Creador no encontrado.");
        return null;
    }

    static void registrarContenido() {
        Creador creador = buscarCreador();
        if (creador == null) return;

        System.out.println("Tipo de contenido:\n1. Video\n2. Publicación Patrocinada");
        int tipo = Integer.parseInt(scanner.nextLine());

        System.out.print("Introduce el título: ");
        String titulo = scanner.nextLine();
        System.out.print("Introduce la fecha de publicación: ");
        String fecha = scanner.nextLine();

        if (tipo == 1) {
            System.out.print("Introduce la duración en minutos: ");
            int duracion = Integer.parseInt(scanner.nextLine());
            creador.agregarContenido(new Video(titulo, fecha, duracion));
        } else if (tipo == 2) {
            System.out.print("Introduce la marca patrocinadora: ");
            String marca = scanner.nextLine();
            creador.agregarContenido(new PublicacionPatrocinada(titulo, fecha, marca));
        } else {
            System.out.println("Tipo de contenido no válido.");
        }
    }

    static void registrarColaboracion() {
        Creador creador = buscarCreador();
        if (creador == null) return;

        System.out.print("Introduce la marca: ");
        String marca = scanner.nextLine();
        System.out.print("Introduce la duración en meses: ");
        int duracion = Integer.parseInt(scanner.nextLine());

        creador.agregarColaboracion(new Colaboraciones(marca, duracion));
        System.out.println("Colaboración registrada exitosamente.");
    }

    static void consultarContenidos() {
        Creador creador = buscarCreador();
        if (creador == null) return;
        for (Contenido contenido : creador.getContenidos()) {
            System.out.println(contenido.getDetalles());
        }
    }

    static void consultarColaboraciones() {
        Creador creador = buscarCreador();
        if (creador == null) return;
        for (Colaboraciones colaboracion : creador.getColaboraciones()) {
            System.out.println(colaboracion.getDetalles());
        }
    }

    static void eliminarCreador() {
        Creador creador = buscarCreador();
        if (creador != null) {
            creadores.remove(creador);
            System.out.println("Creador eliminado exitosamente.");
        }
    }
}