import java.util.Scanner;

public class DiasSemana{
	public static void main(String[] args){
		Scanner scanner = new Scanner(System.in);

		System.out.println("Escribe un número del 1 al 7: ");

		int numero = scanner.nextInt();

		switch (numero){
			case 1:
				System.out.println("Es lunes");
				break;
			
			case 2:
				System.out.println("Es martes");
				break;
			
			case 3:
				System.out.println("Es miércoles");
				break;
			
			case 4:
				System.out.println("Es jueves");
				break;
			
			case 5:
				System.out.println("Es viernes");
				break;
			
			case 6:
				System.out.println("Es sábado");
				break;
			
			case 7:
				System.out.println("Es domingo");
				break;
			
			default:
				System.out.println("Número no válido");
				break;
			
		}
	
	scanner.close();
	}
}