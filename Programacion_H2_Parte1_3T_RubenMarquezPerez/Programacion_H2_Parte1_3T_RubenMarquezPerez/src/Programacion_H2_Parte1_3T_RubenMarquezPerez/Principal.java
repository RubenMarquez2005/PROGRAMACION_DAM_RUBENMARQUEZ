package Programacion_H2_Parte1_3T_RubenMarquezPerez;

import java.sql.*; //para poder interactuar con sql
import java.util.Scanner; //para que el usuario pueda meter datos por teclado

public class Principal {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        // Mostrar el menú y ejecutar las opciones hasta que el usuario decida salir
        while (true) {
            System.out.println("\nMenú:");
            System.out.println("1. Ver películas");
            System.out.println("2. Salir");
            System.out.print("Seleccione una opción: ");
            int opcion = scanner.nextInt();
            scanner.nextLine(); // Limpiar el buffer del scanner

            if (opcion == 1) {
                // Ver películas
                mostrarPeliculas();
            } else if (opcion == 2) {
                // Salir del programa
                System.out.println("Saliendo del programa...");
                break;
            } else {
                System.out.println("Opción no válida. Intente de nuevo.");
            }
        }

        scanner.close(); // Cerramos el scanner
    }

    // Función para que podamos ver las peliculas
    public static void mostrarPeliculas() {
        Connection conexion = Conexion.obtenerConexion();
        if (conexion == null) {
            System.out.println("No se pudo conectar a la base de datos.");
            return;
        }

        try {
            // Creamos una sentencia SQL con un JOIN para obtener los datos de las películas y los directores
            Statement stmt = conexion.createStatement();
            String sql = "SELECT p.id_pelicula, p.titulo, p.duracion, p.genero, p.anio, d.nombre, d.apellido " +
                         "FROM peliculas p " +
                         "JOIN directores d ON p.id_director = d.id_director";
            
            // Ejecutamos la consulta para ver las películas
            ResultSet rs = stmt.executeQuery(sql);

            // Mostramos los datos de las películas
            System.out.println("\nPelículas en la base de datos:");
            while (rs.next()) {
                System.out.println("ID: " + rs.getInt("id_pelicula") + 
                                   " Título: " + rs.getString("titulo") + 
                                   " Duración: " + rs.getInt("duracion") + 
                                   " Género: " + rs.getString("genero") + 
                                   " Año: " + rs.getInt("anio") + 
                                   " Director: " + rs.getString("nombre") + " " + rs.getString("apellido"));
            }

            // Cerramos la conexion
            rs.close();
            stmt.close();
            conexion.close();
        } catch (SQLException e) {
            System.out.println("Error al obtener las películas correspondientes: " + e.getMessage());
        }
    }
}

