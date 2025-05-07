package Programacion_H2_Parte2_3T_RubenMarquezPerez;

import java.sql.*;

public class Conexion {

    public static Connection obtenerConexion() {// Datos de inicio de sesion de mysql y donde está alojada la bbdd que vamos a utilizar
        String url = "jdbc:mysql://localhost:3306/cine_rubenmarquezperez";
        String usuario = "root";
        String contrasena = "curso";

        try {
            return DriverManager.getConnection(url, usuario, contrasena);
        } catch (SQLException e) {
            System.out.println("Error de conexión: " + e.getMessage());// Si ocurre algun error
            return null;
        }
    }
}
