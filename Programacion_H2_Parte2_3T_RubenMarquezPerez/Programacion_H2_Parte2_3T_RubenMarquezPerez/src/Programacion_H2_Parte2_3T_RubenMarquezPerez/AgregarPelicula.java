package Programacion_H2_Parte2_3T_RubenMarquezPerez;


import java.sql.*;//Para obtener conexion con sql
import java.util.Scanner;// Para que el usuario meta datos por teclado

public class AgregarPelicula {
    public static void anadir(Scanner scanner) {// Para que el usuario meta los datos
        System.out.print("Introduce ID de la película: ");
        String id = scanner.nextLine();

        System.out.print("Título: ");
        String titulo = scanner.nextLine();

        System.out.print("Duración (minutos): ");
        int duracion = scanner.nextInt();
        scanner.nextLine();

        System.out.print("Género: ");
        String genero = scanner.nextLine();

        System.out.print("Año: ");
        int anio = scanner.nextInt();
        scanner.nextLine();

        System.out.print("ID del director: ");
        int idDirector = scanner.nextInt();
        scanner.nextLine();

        try (Connection conexion = Conexion.obtenerConexion()) {// Para obtener la comexion con la BBDD
            if (conexion == null) {
                System.out.println("No se pudo conectar a la base de datos.");
                return;
            }

            // Comprobamos si ya existe esa película
            String comprobarSQL = "SELECT * FROM peliculas WHERE id_pelicula = ?";
            PreparedStatement comprobarStmt = conexion.prepareStatement(comprobarSQL);
            comprobarStmt.setString(1, id);
            ResultSet rs = comprobarStmt.executeQuery();

            if (rs.next()) {
                System.out.println("Ya existe una película con ese ID.");
            } else {
                // Agregamos la pelicula si no existe claro
                String insertSQL = "INSERT INTO peliculas (id_pelicula, titulo, duracion, genero, anio, id_director) VALUES (?, ?, ?, ?, ?, ?)";
                PreparedStatement insertStmt = conexion.prepareStatement(insertSQL);
                insertStmt.setString(1, id);
                insertStmt.setString(2, titulo);
                insertStmt.setInt(3, duracion);
                insertStmt.setString(4, genero);
                insertStmt.setInt(5, anio);
                insertStmt.setInt(6, idDirector);
                insertStmt.executeUpdate();

                System.out.println("Película añadida correctamente.");
            }

        } catch (SQLException e) {//Nos muestra el error
            System.out.println("Error al añadir película: " + e.getMessage());
        }
    }
}
