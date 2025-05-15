package vista;

import controlador.ArticuloControlador;
import modelo.Articulo;

import java.util.List;
import java.util.Scanner;

public class ArticuloVista {
    private ArticuloControlador controlador;
    private Scanner scanner;

    public ArticuloVista() {
        controlador = new ArticuloControlador();
        scanner = new Scanner(System.in);
    }

    public void mostrarMenu() {
        int opcion;
        do {
            System.out.println("\n--- Menú Artículos ---");
            System.out.println("1. Agregar artículo");
            System.out.println("2. Mostrar todos los artículos");
            System.out.println("3. Actualizar artículo");
            System.out.println("4. Eliminar artículo");
            System.out.println("5. Buscar artículo por ID");
            System.out.println("0. Salir");
            System.out.print("Seleccione opción: ");
            opcion = Integer.parseInt(scanner.nextLine());

            switch (opcion) {
                case 1 -> agregarArticulo();
                case 2 -> mostrarArticulos();
                case 3 -> actualizarArticulo();
                case 4 -> eliminarArticulo();
                case 5 -> buscarArticuloPorId();
                case 0 -> System.out.println("Saliendo...");
                default -> System.out.println("Opción inválida.");
            }
        } while (opcion != 0);
    }

    private void agregarArticulo() {
        System.out.print("Nombre: ");
        String nombre = scanner.nextLine();
        System.out.print("Precio unitario: ");
        double precio = Double.parseDouble(scanner.nextLine());
        System.out.print("Stock: ");
        int stock = Integer.parseInt(scanner.nextLine());

        controlador.agregarArticulo(0, nombre, precio, stock); // id no se usa en insert
        System.out.println("Artículo agregado.");
    }

    private void mostrarArticulos() {
        List<Articulo> lista = controlador.obtenerArticulos();
        if (lista.isEmpty()) {
            System.out.println("No hay artículos.");
        } else {
            for (Articulo a : lista) {
                System.out.printf("ID: %d | Nombre: %s | Precio: %.2f | Stock: %d%n",
                    a.getIdArticulo(), a.getNombre(), a.getPrecioUnitario(), a.getStock());
            }
        }
    }

    private void actualizarArticulo() {
        System.out.print("ID del artículo a actualizar: ");
        int id = Integer.parseInt(scanner.nextLine());
        System.out.print("Nuevo nombre: ");
        String nombre = scanner.nextLine();
        System.out.print("Nuevo precio unitario: ");
        double precio = Double.parseDouble(scanner.nextLine());
        System.out.print("Nuevo stock: ");
        int stock = Integer.parseInt(scanner.nextLine());

        controlador.actualizarArticulo(id, nombre, precio, stock);
        System.out.println("Artículo actualizado.");
    }

    private void eliminarArticulo() {
        System.out.print("ID del artículo a eliminar: ");
        int id = Integer.parseInt(scanner.nextLine());

        controlador.eliminarArticulo(id);
        System.out.println("Artículo eliminado.");
    }

    private void buscarArticuloPorId() {
        System.out.print("ID del artículo a buscar: ");
        int id = Integer.parseInt(scanner.nextLine());

        Articulo a = controlador.obtenerArticuloPorId(id);
        if (a == null) {
            System.out.println("Artículo no encontrado.");
        } else {
            System.out.printf("ID: %d | Nombre: %s | Precio: %.2f | Stock: %d%n",
                a.getIdArticulo(), a.getNombre(), a.getPrecioUnitario(), a.getStock());
        }
    }

    public static void main(String[] args) {
        ArticuloVista vista = new ArticuloVista();
        vista.mostrarMenu();
    }
}
