package Programacion_H2_Parte2_3T_RubenMarquezPerez;

import java.sql.*;

public class VerPelicula {
    public static void ver() {
        try (Connection conexion = Conexion.obtenerConexion()) {// Para obtener la conexion
            if (conexion == null) {
                System.out.println("No se pudo conectar a la base de datos.");
                return;
            }

            String sql = "SELECT * FROM peliculas"; //hace la consulta sql para que nos muestre las peliculas
            Statement stmt = conexion.createStatement();
            ResultSet rs = stmt.executeQuery(sql);

            System.out.println("\nListado de películas:"); // nos muestra las peliculas
            while (rs.next()) {
                System.out.println("ID: " + rs.getString("id_pelicula") +
                        " | Título: " + rs.getString("titulo") +
                        " | Género: " + rs.getString("genero") +
                        " | Duración: " + rs.getInt("duracion") +
                        " | Año: " + rs.getInt("anio") +
                        " | Director: " + rs.getString("id_director"));
            }

        } catch (SQLException e) {// Si ocurre algun error
            System.out.println("Error al mostrar películas: " + e.getMessage());
        }
    }
}
