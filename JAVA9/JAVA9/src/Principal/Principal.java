package Principal;


import vista.VentaVista;
import vista.ProveedorVista;
import vista.ArticuloVista;
import vista.InformeVista;

import java.util.Scanner;

public class Principal {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        VentaVista ventaVista = new VentaVista();
        ProveedorVista proveedorVista = new ProveedorVista();
        ArticuloVista articuloVista = new ArticuloVista();
        InformeVista informeVista = new InformeVista();

        int opcion;

        do {
            System.out.println("\n=== MENÚ PRINCIPAL ===");
            System.out.println("1. Gestión de Ventas");
            System.out.println("2. Gestión de Proveedores");
            System.out.println("3. Gestión de Artículos");
            System.out.println("4. Mostrar Informe de Ventas");
            System.out.println("0. Salir");
            System.out.print("Seleccione una opción: ");

            opcion = scanner.nextInt();
            scanner.nextLine();  // Limpiar buffer

            switch (opcion) {
                case 1:
                    ventaVista.mostrarMenu();
                    break;
                case 2:
                    proveedorVista.mostrarMenu();
                    break;
                case 3:
                    articuloVista.mostrarMenu();
                    break;
                case 4:
                    informeVista.mostrarInforme();
                    break;
                case 0:
                    System.out.println("Saliendo del programa...");
                    break;
                default:
                    System.out.println("Opción no válida, intente de nuevo.");
            }

        } while (opcion != 0);

        scanner.close();
    }
}
