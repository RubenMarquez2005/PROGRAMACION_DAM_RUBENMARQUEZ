package controlador;

import modelo.Venta;
import modelo.VentaDAO;
import java.util.List;

public class VentaControlador {
    private VentaDAO ventaDAO;

    public VentaControlador() {
        ventaDAO = new VentaDAO();
    }

    public boolean agregarVenta(int idVenta, int idCliente, String fechaVenta, double total) {
        Venta venta = new Venta(idVenta, idCliente, fechaVenta, total);
        ventaDAO.insertarVenta(venta);
        return true;
    }

    public List<Venta> obtenerVentas() {
        return ventaDAO.obtenerTodos();
    }

    public boolean actualizarVenta(int idVenta, int idCliente, String fechaVenta, double total) {
        Venta venta = new Venta(idVenta, idCliente, fechaVenta, total);
        ventaDAO.actualizarVenta(venta);
        return true;
    }

    public boolean eliminarVenta(int idVenta) {
        ventaDAO.eliminarVenta(idVenta);
        return true;
    }

    public Venta obtenerVentaPorId(int idVenta) {
        return ventaDAO.obtenerPorId(idVenta);
    }
}
