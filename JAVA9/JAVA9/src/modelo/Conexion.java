package modelo;

import java.sql.*;

public class Conexion {
    public static Connection obtenerConexion() {
        String url = "jdbc:mysql://localhost:3306/JAVAPOO";
        String usuario = "root";
        String contrasena = "curso";

        try {
            return DriverManager.getConnection(url, usuario, contrasena);
        } catch (SQLException e) {
            System.out.println("Error de conexión: " + e.getMessage());
            return null;
        }
    }
}
