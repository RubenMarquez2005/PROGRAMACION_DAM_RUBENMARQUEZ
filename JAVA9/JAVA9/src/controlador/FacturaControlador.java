package controlador;

import modelo.Factura;
import modelo.FacturaDAO;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;

public class FacturaControlador {
    private FacturaDAO facturaDAO;

    public FacturaControlador() {
        facturaDAO = new FacturaDAO();
    }
    public void agregarFactura(int id, int idCliente, String fechaStr, double total) {
        try {
            SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
            Date fecha = sdf.parse(fechaStr);
            Factura factura = new Factura(id, idCliente, fecha, total);
            facturaDAO.insertarFactura(factura);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public List<Factura> obtenerFacturas() {
        return facturaDAO.obtenerTodos();
    }

    public void actualizarFactura(int id, int idCliente, String fechaStr, double total) {
        try {
            SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
            Date fecha = sdf.parse(fechaStr);
            Factura factura = new Factura(id, idCliente, fecha, total);
            facturaDAO.actualizarFactura(factura);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public void eliminarFactura(int id) {
        facturaDAO.eliminarFactura(id);
    }

    public Factura obtenerFacturaPorId(int id) {
        return facturaDAO.obtenerPorId(id);
    }
}
