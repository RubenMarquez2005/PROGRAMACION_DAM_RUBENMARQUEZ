package modelo;

import java.sql.*;
import java.util.*;

public class FacturaDAO {

    public List<Factura> obtenerTodos() {
        List<Factura> lista = new ArrayList<>();
        String sql = "SELECT * FROM factura";
        try (Connection conn = Conexion.obtenerConexion();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                Factura factura = new Factura(
                    rs.getInt("id_factura"),
                    rs.getInt("id_cliente"),
                    rs.getDate("fecha"),
                    rs.getDouble("total")
                );
                lista.add(factura);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return lista;
    }

    public void insertarFactura(Factura factura) {
        String sql = "INSERT INTO factura (id_cliente, fecha, total) VALUES (?, ?, ?)";
        try (Connection conn = Conexion.obtenerConexion();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, factura.getIdCliente());
            ps.setDate(2, new java.sql.Date(factura.getFecha().getTime()));
            ps.setDouble(3, factura.getTotal());
            ps.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void actualizarFactura(Factura factura) {
        String sql = "UPDATE factura SET id_cliente = ?, fecha = ?, total = ? WHERE id_factura = ?";
        try (Connection conn = Conexion.obtenerConexion();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, factura.getIdCliente());
            ps.setDate(2, new java.sql.Date(factura.getFecha().getTime()));
            ps.setDouble(3, factura.getTotal());
            ps.setInt(4, factura.getIdFactura());
            ps.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void eliminarFactura(int idFactura) {
        String sql = "DELETE FROM factura WHERE id_factura = ?";
        try (Connection conn = Conexion.obtenerConexion();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, idFactura);
            ps.executeUpdate();

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public Factura obtenerPorId(int idFactura) {
        Factura factura = null;
        String sql = "SELECT * FROM factura WHERE id_factura = ?";
        try (Connection conn = Conexion.obtenerConexion();
             PreparedStatement ps = conn.prepareStatement(sql)) {

            ps.setInt(1, idFactura);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    factura = new Factura(
                        rs.getInt("id_factura"),
                        rs.getInt("id_cliente"),
                        rs.getDate("fecha"),
                        rs.getDouble("total")
                    );
                }
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
        return factura;
    }
}
