package vista;

import java.util.Scanner;

public class MenuPrincipal {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int opcion;

        ClienteVista clienteVista = new ClienteVista();
        ProveedorVista proveedorVista = new ProveedorVista();
        ArticuloVista articuloVista = new ArticuloVista();
        FacturaVista facturaVista = new FacturaVista();
        VentaVista ventaVista = new VentaVista();

        do {
            System.out.println("\n=== MENÚ PRINCIPAL ===");
            System.out.println("1. Gestión de Clientes");
            System.out.println("2. Gestión de Proveedores");
            System.out.println("3. Gestión de Artículos");
            System.out.println("4. Gestión de Facturas");
            System.out.println("5. Gestión de Ventas");
            System.out.println("0. Salir");
            System.out.print("Selecciona una opción: ");
            opcion = scanner.nextInt();

            switch (opcion) {
                case 1 -> clienteVista.mostrarMenu();
                case 2 -> proveedorVista.mostrarMenu();
                case 3 -> articuloVista.mostrarMenu();
                case 4 -> facturaVista.mostrarMenu();
                case 5 -> ventaVista.mostrarMenu();
                case 0 -> System.out.println("Saliendo del programa...");
                default -> System.out.println("Opción no válida.");
            }
        } while (opcion != 0);

        scanner.close();
    }
}
