package modelo;

import java.util.ArrayList;
import java.util.List;

public class VentaDAO {
    private List<Venta> listaVentas = new ArrayList<>();

    public void insertarVenta(Venta venta) {
        listaVentas.add(venta);
    }

    public List<Venta> obtenerTodos() {
        return listaVentas;
    }

    public void actualizarVenta(Venta venta) {
        for (int i = 0; i < listaVentas.size(); i++) {
            if (listaVentas.get(i).getIdVenta() == venta.getIdVenta()) {
                listaVentas.set(i, venta);
                return;
            }
        }
    }

    public void eliminarVenta(int idVenta) {
        listaVentas.removeIf(v -> v.getIdVenta() == idVenta);
    }

    public Venta obtenerPorId(int idVenta) {
        for (Venta v : listaVentas) {
            if (v.getIdVenta() == idVenta) {
                return v;
            }
        }
        return null;
    }
}
