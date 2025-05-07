package Programacion_H2_Parte2_3T_RubenMarquezPerez;


import java.util.Scanner;//Para que el usuario pueda meter por teclado

public class Principal {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int opcion;//la variable tipo int

        do {//Bucle infinito para que hasta que el usuario no quiera salir no salga
            System.out.println("\nMenú:");
            System.out.println("1. Ver películas");
            System.out.println("2. Añadir película");
            System.out.println("3. Modificar película");
            System.out.println("4. Eliminar película");
            System.out.println("5. Salir");
            System.out.print("Seleccione una opción: ");
            opcion = scanner.nextInt();
            scanner.nextLine();

            switch (opcion) {// las opciones 
                case 1:
                    VerPelicula.ver();
                    break;
                case 2:
                    AgregarPelicula.anadir(scanner);
                    break;
                case 3:
                    EditarPelicula.modificar(scanner);
                    break;
                case 4:
                    EliminarPelicula.eliminar(scanner);
                    break;
                case 5:
                    System.out.println("Saliendo del programa...");
                    break;
                default:
                    System.out.println("Opción no válida. Intente de nuevo.");
            }

        } while (opcion != 5);

        scanner.close();// se cierra el scanner
    }
}
