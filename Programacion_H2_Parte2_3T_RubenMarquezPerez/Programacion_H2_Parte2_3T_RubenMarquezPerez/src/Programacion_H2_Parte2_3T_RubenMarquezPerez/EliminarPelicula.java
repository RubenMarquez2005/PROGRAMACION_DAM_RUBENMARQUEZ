package Programacion_H2_Parte2_3T_RubenMarquezPerez;

import java.sql.*;
import java.util.Scanner;

public class EliminarPelicula {
    public static void eliminar(Scanner scanner) {//Nos pide el id de la pelicula que quermos eliminar
        System.out.print("Introduce el ID de la película que quieres eliminar: ");
        String id = scanner.nextLine();

        try (Connection conexion = Conexion.obtenerConexion()) {// obtenemos la conexion con la bbdd
            if (conexion == null) {
                System.out.println("No se pudo conectar a la base de datos.");//Si ocurre algun error
                return;
            }

            // Comprobamos si la película existe
            String comprobarSQL = "SELECT * FROM peliculas WHERE id_pelicula = ?";
            PreparedStatement comprobarStmt = conexion.prepareStatement(comprobarSQL);
            comprobarStmt.setString(1, id);
            ResultSet rs = comprobarStmt.executeQuery();

            if (!rs.next()) {
                System.out.println("La película con ID " + id + " no existe.");
            } else {
                String deleteSQL = "DELETE FROM peliculas WHERE id_pelicula = ?";// Consulta para eliminar l apelicuila con el Id correspondiente
                PreparedStatement deleteStmt = conexion.prepareStatement(deleteSQL);
                deleteStmt.setString(1, id);
                deleteStmt.executeUpdate();
                System.out.println("Película eliminada correctamente.");// Se ha eliminado
            }

        } catch (SQLException e) {
            System.out.println("Error al eliminar película: " + e.getMessage());// Ha ocurrido un error y no se ha podido eliminar
        }
    }
}
