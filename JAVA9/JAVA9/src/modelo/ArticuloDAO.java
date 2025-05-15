package modelo;

import java.sql.*;
import java.util.*;

public class ArticuloDAO {

    public List<Articulo> obtenerTodos() {
        List<Articulo> lista = new ArrayList<>();
        String sql = "SELECT * FROM articulos";
        try (Connection conn = Conexion.obtenerConexion();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {
            while (rs.next()) {
                Articulo a = new Articulo(
                    rs.getInt("id_articulo"),
                    rs.getString("nombre"),
                    rs.getDouble("precio_unitario"),
                    rs.getInt("stock")
                );
                lista.add(a);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return lista;
    }

    public void insertarArticulo(Articulo articulo) {
        String sql = "INSERT INTO articulos (nombre, precio_unitario, stock) VALUES (?, ?, ?)";
        try (Connection conn = Conexion.obtenerConexion();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setString(1, articulo.getNombre());
            ps.setDouble(2, articulo.getPrecioUnitario());
            ps.setInt(3, articulo.getStock());
            ps.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void actualizarArticulo(Articulo articulo) {
        String sql = "UPDATE articulos SET nombre = ?, precio_unitario = ?, stock = ? WHERE id_articulo = ?";
        try (Connection conn = Conexion.obtenerConexion();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setString(1, articulo.getNombre());
            ps.setDouble(2, articulo.getPrecioUnitario());
            ps.setInt(3, articulo.getStock());
            ps.setInt(4, articulo.getIdArticulo());
            ps.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public void eliminarArticulo(int idArticulo) {
        String sql = "DELETE FROM articulos WHERE id_articulo = ?";
        try (Connection conn = Conexion.obtenerConexion();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setInt(1, idArticulo);
            ps.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public Articulo obtenerPorId(int idArticulo) {
        Articulo articulo = null;
        String sql = "SELECT * FROM articulos WHERE id_articulo = ?";
        try (Connection conn = Conexion.obtenerConexion();
             PreparedStatement ps = conn.prepareStatement(sql)) {
            ps.setInt(1, idArticulo);
            try (ResultSet rs = ps.executeQuery()) {
                if (rs.next()) {
                    articulo = new Articulo(
                        rs.getInt("id_articulo"),
                        rs.getString("nombre"),
                        rs.getDouble("precio_unitario"),
                        rs.getInt("stock")
                    );
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return articulo;
    }
}
