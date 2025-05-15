package vista;

import controlador.FacturaControlador;
import modelo.Factura;

import java.util.List;
import java.util.Scanner;

public class FacturaVista {
    private FacturaControlador controlador;
    private Scanner scanner;

    public FacturaVista() {
        controlador = new FacturaControlador();
        scanner = new Scanner(System.in);
    }

    public void mostrarMenu() {
        int opcion = 0;
        do {
            System.out.println("\n--- Menú Factura ---");
            System.out.println("1. Agregar factura");
            System.out.println("2. Mostrar todas las facturas");
            System.out.println("3. Actualizar factura");
            System.out.println("4. Eliminar factura");
            System.out.println("5. Buscar factura por ID");
            System.out.println("0. Salir");
            System.out.print("Seleccione una opción: ");
            opcion = Integer.parseInt(scanner.nextLine());

            switch (opcion) {
                case 1:
                    agregarFactura();
                    break;
                case 2:
                    mostrarFacturas();
                    break;
                case 3:
                    actualizarFactura();
                    break;
                case 4:
                    eliminarFactura();
                    break;
                case 5:
                    buscarFacturaPorId();
                    break;
                case 0:
                    System.out.println("Saliendo...");
                    break;
                default:
                    System.out.println("Opción inválida.");
            }
        } while (opcion != 0);
    }

    private void agregarFactura() {
        System.out.print("ID Factura: ");
        int id = Integer.parseInt(scanner.nextLine());
        System.out.print("ID Cliente: ");
        int idCliente = Integer.parseInt(scanner.nextLine());
        System.out.print("Fecha (yyyy-MM-dd): ");
        String fecha = scanner.nextLine();
        System.out.print("Total: ");
        double total = Double.parseDouble(scanner.nextLine());

        controlador.agregarFactura(id, idCliente, fecha, total);
        System.out.println("Factura agregada.");
    }

    private void mostrarFacturas() {
        List<Factura> facturas = controlador.obtenerFacturas();
        if (facturas.isEmpty()) {
            System.out.println("No hay facturas registradas.");
            return;
        }
        for (Factura f : facturas) {
            System.out.printf("ID: %d | Cliente ID: %d | Fecha: %s | Total: %.2f\n",
                f.getIdFactura(), f.getIdCliente(), f.getFecha(), f.getTotal());
        }
    }

    private void actualizarFactura() {
        System.out.print("ID Factura a actualizar: ");
        int id = Integer.parseInt(scanner.nextLine());
        System.out.print("Nuevo ID Cliente: ");
        int idCliente = Integer.parseInt(scanner.nextLine());
        System.out.print("Nueva Fecha (yyyy-MM-dd): ");
        String fecha = scanner.nextLine();
        System.out.print("Nuevo Total: ");
        double total = Double.parseDouble(scanner.nextLine());

        controlador.actualizarFactura(id, idCliente, fecha, total);
        System.out.println("Factura actualizada.");
    }

    private void eliminarFactura() {
        System.out.print("ID Factura a eliminar: ");
        int id = Integer.parseInt(scanner.nextLine());

        controlador.eliminarFactura(id);
        System.out.println("Factura eliminada.");
    }

    private void buscarFacturaPorId() {
        System.out.print("ID Factura a buscar: ");
        int id = Integer.parseInt(scanner.nextLine());

        Factura f = controlador.obtenerFacturaPorId(id);
        if (f == null) {
            System.out.println("Factura no encontrada.");
        } else {
            System.out.printf("ID: %d | Cliente ID: %d | Fecha: %s | Total: %.2f\n",
                f.getIdFactura(), f.getIdCliente(), f.getFecha(), f.getTotal());
        }
    }

    public static void main(String[] args) {
        FacturaVista vista = new FacturaVista();
        vista.mostrarMenu();
    }
}

