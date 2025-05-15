package controlador;

import modelo.Venta;
import modelo.VentaDAO;

import java.util.List;

public class InformeControlador {
    private VentaDAO ventaDAO;

    public InformeControlador() {
        ventaDAO = new VentaDAO();
    }

    public List<Venta> obtenerVentas() {
        return ventaDAO.obtenerTodos();
    }
}

