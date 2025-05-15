package vista;

import controlador.VentaControlador;
import modelo.Venta;

import java.util.List;
import java.util.Scanner;

public class VentaVista {
    private VentaControlador controlador;
    private Scanner scanner;

    public VentaVista() {
        controlador = new VentaControlador();
        scanner = new Scanner(System.in);
    }

    public void mostrarMenu() {
        int opcion;
        do {
            System.out.println("\n--- GESTIÓN DE VENTAS ---");
            System.out.println("1. Agregar venta");
            System.out.println("2. Ver todas las ventas");
            System.out.println("3. Actualizar venta");
            System.out.println("4. Eliminar venta");
            System.out.println("0. Salir");
            System.out.print("Elige una opción: ");
            opcion = scanner.nextInt();
            scanner.nextLine(); // limpiar buffer

            switch (opcion) {
                case 1 -> agregarVenta();
                case 2 -> verVentas();
                case 3 -> actualizarVenta();
                case 4 -> eliminarVenta();
                case 0 -> System.out.println("Saliendo...");
                default -> System.out.println("Opción no válida.");
            }
        } while (opcion != 0);
    }

    private void agregarVenta() {
        System.out.print("ID venta: ");
        int idVenta = scanner.nextInt();
        System.out.print("ID cliente: ");
        int idCliente = scanner.nextInt();
        scanner.nextLine();
        System.out.print("Fecha (ejemplo: 2025-05-15): ");
        String fechaVenta = scanner.nextLine();
        System.out.print("Total: ");
        double total = scanner.nextDouble();
        scanner.nextLine();

        controlador.agregarVenta(idVenta, idCliente, fechaVenta, total);
        System.out.println("Venta agregada.");
    }

    private void verVentas() {
        List<Venta> ventas = controlador.obtenerVentas();
        System.out.println("--- LISTA DE VENTAS ---");
        for (Venta v : ventas) {
            System.out.println("ID venta: " + v.getIdVenta() + ", ID cliente: " + v.getIdCliente() +
                    ", Fecha: " + v.getFechaVenta() + ", Total: " + v.getTotal());
        }
    }

    private void actualizarVenta() {
        System.out.print("ID venta a actualizar: ");
        int idVenta = scanner.nextInt();
        System.out.print("Nuevo ID cliente: ");
        int idCliente = scanner.nextInt();
        scanner.nextLine();
        System.out.print("Nueva fecha (ejemplo: 2025-05-15): ");
        String fechaVenta = scanner.nextLine();
        System.out.print("Nuevo total: ");
        double total = scanner.nextDouble();
        scanner.nextLine();

        controlador.actualizarVenta(idVenta, idCliente, fechaVenta, total);
        System.out.println("Venta actualizada.");
    }

    private void eliminarVenta() {
        System.out.print("ID venta a eliminar: ");
        int idVenta = scanner.nextInt();
        scanner.nextLine();

        controlador.eliminarVenta(idVenta);
        System.out.println("Venta eliminada.");
    }
}
