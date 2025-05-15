package controlador;

import modelo.Cliente;
import modelo.ClienteDAO;
import java.util.List;

public class ClienteControlador {
    private ClienteDAO clienteDAO;

    public ClienteControlador() {
        clienteDAO = new ClienteDAO();
    }

    public boolean agregarCliente(String nombre, String contacto) {
        Cliente cliente = new Cliente(nombre, contacto);
        return clienteDAO.insertarCliente(cliente);
    }

    public boolean actualizarCliente(int id, String nombre, String contacto) {
        Cliente cliente = new Cliente(id, nombre, contacto);
        return clienteDAO.actualizarCliente(cliente);
    }

    public List<Cliente> obtenerClientes() {
        return clienteDAO.obtenerTodos();
    }

    public boolean eliminarCliente(int id) {
        return clienteDAO.eliminarCliente(id);
    }

    public Cliente obtenerClientePorId(int id) {
        return clienteDAO.obtenerPorId(id);
    }
}
