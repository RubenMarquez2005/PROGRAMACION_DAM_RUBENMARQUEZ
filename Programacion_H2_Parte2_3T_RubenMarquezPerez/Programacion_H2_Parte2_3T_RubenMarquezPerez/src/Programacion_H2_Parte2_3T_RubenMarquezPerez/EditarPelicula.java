package Programacion_H2_Parte2_3T_RubenMarquezPerez;

import java.sql.*;
import java.util.Scanner; // para que el usario pueda escribir y meter por teclado datos

public class EditarPelicula {
    public static void modificar(Scanner scanner) {// Nos pide el ID para modificar la pelicula
        System.out.print("Introduce el ID de la película a modificar: ");
        String id = scanner.nextLine();

        try (Connection conexion = Conexion.obtenerConexion()) {
            if (conexion == null) {
                System.out.println("No se pudo conectar a la base de datos.");
                return;
            }

            // Verificamos si existe
            String comprobarSQL = "SELECT * FROM peliculas WHERE id_pelicula = ?";
            PreparedStatement comprobarStmt = conexion.prepareStatement(comprobarSQL);
            comprobarStmt.setString(1, id);
            ResultSet rs = comprobarStmt.executeQuery();

            if (!rs.next()) {// Nos muestra un error de que esa pelicula no existe
                System.out.println("No existe ninguna película con ese ID.");
                return;
            }

            // Pedimos los nuevos datos de la pelicula
            System.out.print("Nuevo título: ");
            String nuevoTitulo = scanner.nextLine();

            System.out.print("Nuevo género: ");
            String nuevoGenero = scanner.nextLine();

            String updateSQL = "UPDATE peliculas SET titulo = ?, genero = ? WHERE id_pelicula = ?";
            PreparedStatement updateStmt = conexion.prepareStatement(updateSQL);
            updateStmt.setString(1, nuevoTitulo);
            updateStmt.setString(2, nuevoGenero);
            updateStmt.setString(3, id);
            updateStmt.executeUpdate();

            System.out.println("Película modificada correctamente.");

        } catch (SQLException e) {// Nos dice que no se ha podido modificar por que ha ocurrido algun error
            System.out.println("Error al modificar la película: " + e.getMessage());
        }
    }
}
