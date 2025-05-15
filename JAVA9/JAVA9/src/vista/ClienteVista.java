package vista;

import controlador.ClienteControlador;
import modelo.Cliente;

import java.util.List;
import java.util.Scanner;

public class ClienteVista {
    private ClienteControlador controlador;
    private Scanner scanner;

    public ClienteVista() {
        this.controlador = new ClienteControlador();
        this.scanner = new Scanner(System.in);
    }

    public void mostrarMenu() {
        int opcion;
        do {
            System.out.println("\n--- GESTIÓN DE CLIENTES ---");
            System.out.println("1. Agregar cliente");
            System.out.println("2. Ver todos los clientes");
            System.out.println("3. Actualizar cliente");
            System.out.println("4. Eliminar cliente");
            System.out.println("0. Volver al menú principal");
            System.out.print("Selecciona una opción: ");
            opcion = scanner.nextInt();
            scanner.nextLine();

            switch (opcion) {
                case 1 -> agregarCliente();
                case 2 -> verClientes();
                case 3 -> actualizarCliente();
                case 4 -> eliminarCliente();
                case 0 -> System.out.println("Volviendo al menú principal...");
                default -> System.out.println("Opción no válida.");
            }
        } while (opcion != 0);
    }

    private void agregarCliente() {
        System.out.print("Nombre: ");
        String nombre = scanner.nextLine();
        System.out.print("Teléfono: ");
        String telefono = scanner.nextLine();

        if (controlador.agregarCliente(nombre, telefono)) {
            System.out.println("Cliente agregado.");
        } else {
            System.out.println("Error al agregar cliente.");
        }
    }

    private void verClientes() {
        List<Cliente> clientes = controlador.obtenerClientes();
        for (Cliente c : clientes) {
            System.out.println("ID: " + c.getIdCliente() + ", Nombre: " + c.getNombre() + ", Teléfono: " + c.getTelefono());
        }
    }

    private void actualizarCliente() {
        System.out.print("ID del cliente: ");
        int id = scanner.nextInt();
        scanner.nextLine();
        System.out.print("Nuevo nombre: ");
        String nombre = scanner.nextLine();
        System.out.print("Nuevo teléfono: ");
        String telefono = scanner.nextLine();

        if (controlador.actualizarCliente(id, nombre, telefono)) {
            System.out.println("Cliente actualizado.");
        } else {
            System.out.println("Error al actualizar cliente.");
        }
    }

    private void eliminarCliente() {
        System.out.print("ID del cliente: ");
        int id = scanner.nextInt();

        if (controlador.eliminarCliente(id)) {
            System.out.println("Cliente eliminado.");
        } else {
            System.out.println("Error al eliminar cliente.");
        }
    }
}
