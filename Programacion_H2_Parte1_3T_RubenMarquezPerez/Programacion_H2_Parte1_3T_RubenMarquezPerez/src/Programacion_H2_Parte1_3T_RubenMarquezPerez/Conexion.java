package Programacion_H2_Parte1_3T_RubenMarquezPerez;

import java.sql.*;

public class Conexion {

    public static Connection obtenerConexion() {
        // Datos de conexión
        String url = "jdbc:mysql://localhost:3306/cine_rubenmarquezperez"; // Cambiamos 'cine_nombreapellido' por el nombre de la BBDD que hemos creado
        String usuario = "root";
        String contrasena = "curso"; 

        try {
            // Conexión con la base de datos
            Connection conexion = DriverManager.getConnection(url, usuario, contrasena);
            return conexion;
        } catch (SQLException e) {
            System.out.println("Error de conexión: " + e.getMessage());
            return null;
        }
    }
}
