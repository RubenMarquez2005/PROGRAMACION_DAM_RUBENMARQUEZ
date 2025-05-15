package controlador;

import modelo.Articulo;
import modelo.ArticuloDAO;
import java.util.List;

public class ArticuloControlador {
    private ArticuloDAO articuloDAO;

    public ArticuloControlador() {
        articuloDAO = new ArticuloDAO();
    }

    public void agregarArticulo(int id, String nombre, double precioUnitario, int stock) {
        Articulo articulo = new Articulo(id, nombre, precioUnitario, stock);
        articuloDAO.insertarArticulo(articulo);
    }

    public List<Articulo> obtenerArticulos() {
        return articuloDAO.obtenerTodos();
    }

    public void actualizarArticulo(int id, String nombre, double precioUnitario, int stock) {
        Articulo articulo = new Articulo(id, nombre, precioUnitario, stock);
        articuloDAO.actualizarArticulo(articulo);
    }

    public void eliminarArticulo(int id) {
        articuloDAO.eliminarArticulo(id);
    }

    public Articulo obtenerArticuloPorId(int id) {
        return articuloDAO.obtenerPorId(id);
    }
}
