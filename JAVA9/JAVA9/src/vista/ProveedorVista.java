package vista;

import controlador.ProveedorControlador;
import modelo.Proveedor;

import java.util.List;
import java.util.Scanner;

public class ProveedorVista {
    private ProveedorControlador controlador;
    private Scanner scanner;

    public ProveedorVista() {
        controlador = new ProveedorControlador();
        scanner = new Scanner(System.in);
    }

    public void mostrarMenu() {
        int opcion;
        do {
            System.out.println("\n--- GESTIÓN DE PROVEEDORES ---");
            System.out.println("1. Agregar proveedor");
            System.out.println("2. Ver todos los proveedores");
            System.out.println("3. Actualizar proveedor");
            System.out.println("4. Eliminar proveedor");
            System.out.println("0. Salir");
            System.out.print("Elige una opción: ");
            opcion = scanner.nextInt();
            scanner.nextLine();  // limpiar buffer

            switch (opcion) {
                case 1 -> agregarProveedor();
                case 2 -> verProveedores();
                case 3 -> actualizarProveedor();
                case 4 -> eliminarProveedor();
                case 0 -> System.out.println("Saliendo...");
                default -> System.out.println("Opción no válida, intenta de nuevo.");
            }
        } while (opcion != 0);
    }

    private void agregarProveedor() {
        System.out.print("ID del proveedor: ");
        int id = scanner.nextInt();
        scanner.nextLine();
        System.out.print("Nombre: ");
        String nombre = scanner.nextLine();
        System.out.print("Teléfono: ");
        String telefono = scanner.nextLine();
        System.out.print("Dirección: ");
        String direccion = scanner.nextLine();

        boolean exito = controlador.agregarProveedor(id, nombre, telefono, direccion);
        if (exito) {
            System.out.println("Proveedor agregado correctamente.");
        } else {
            System.out.println("Error al agregar proveedor.");
        }
    }

    private void verProveedores() {
        List<Proveedor> proveedores = controlador.obtenerProveedores();
        if (proveedores.isEmpty()) {
            System.out.println("No hay proveedores registrados.");
        } else {
            System.out.println("--- Lista de Proveedores ---");
            for (Proveedor p : proveedores) {
                System.out.println("ID: " + p.getIdProveedor() + ", Nombre: " + p.getNombre() +
                        ", Teléfono: " + p.getTelefono() + ", Dirección: " + p.getDireccion());
            }
        }
    }

    private void actualizarProveedor() {
        System.out.print("ID del proveedor a actualizar: ");
        int id = scanner.nextInt();
        scanner.nextLine();
        System.out.print("Nuevo nombre: ");
        String nombre = scanner.nextLine();
        System.out.print("Nuevo teléfono: ");
        String telefono = scanner.nextLine();
        System.out.print("Nueva dirección: ");
        String direccion = scanner.nextLine();

        boolean exito = controlador.actualizarProveedor(id, nombre, telefono, direccion);
        if (exito) {
            System.out.println("Proveedor actualizado correctamente.");
        } else {
            System.out.println("Error al actualizar proveedor.");
        }
    }

    private void eliminarProveedor() {
        System.out.print("ID del proveedor a eliminar: ");
        int id = scanner.nextInt();

        boolean exito = controlador.eliminarProveedor(id);
        if (exito) {
            System.out.println("Proveedor eliminado correctamente.");
        } else {
            System.out.println("Error al eliminar proveedor.");
        }
    }
}
