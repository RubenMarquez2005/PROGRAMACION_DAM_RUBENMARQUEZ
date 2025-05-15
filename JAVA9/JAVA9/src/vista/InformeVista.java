package vista;

import controlador.InformeControlador;
import modelo.Venta;

import java.util.List;

public class InformeVista {
    private InformeControlador controlador;

    public InformeVista() {
        controlador = new InformeControlador();
    }

    public void mostrarInforme() {
        List<Venta> ventas = controlador.obtenerVentas();

        System.out.println("--- INFORME DE VENTAS ---");
        if (ventas.isEmpty()) {
            System.out.println("No hay ventas registradas.");
            return;
        }

        double totalGeneral = 0;
        for (Venta v : ventas) {
            System.out.println("ID Venta: " + v.getIdVenta() +
                    ", ID Cliente: " + v.getIdCliente() +
                    ", Fecha: " + v.getFechaVenta() +
                    ", Total: " + v.getTotal());
            totalGeneral += v.getTotal();
        }
        System.out.println("Total general de ventas: " + totalGeneral);
    }
}
