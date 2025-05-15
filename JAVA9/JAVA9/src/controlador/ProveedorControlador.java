package controlador;

import modelo.Proveedor;
import modelo.ProveedorDAO;
import java.util.List;

public class ProveedorControlador {
    private ProveedorDAO proveedorDAO;

    public ProveedorControlador() {
        proveedorDAO = new ProveedorDAO();
    }

    public boolean agregarProveedor(int id, String nombre, String telefono, String direccion) {
        try {
            Proveedor proveedor = new Proveedor(id, nombre, telefono, direccion);
            proveedorDAO.insertarProveedor(proveedor);
            return true;
        } catch (Exception e) {
            return false;
        }
    }

    public List<Proveedor> obtenerProveedores() {
        return proveedorDAO.obtenerTodos();
    }

    public boolean actualizarProveedor(int id, String nombre, String telefono, String direccion) {
        try {
            Proveedor proveedor = new Proveedor(id, nombre, telefono, direccion);
            proveedorDAO.actualizarProveedor(proveedor);
            return true;
        } catch (Exception e) {
            return false;
        }
    }

    public boolean eliminarProveedor(int id) {
        try {
            proveedorDAO.eliminarProveedor(id);
            return true;
        } catch (Exception e) {
            return false;
        }
    }

    public Proveedor obtenerProveedorPorId(int id) {
        return proveedorDAO.obtenerPorId(id);
    }
}
