import java.util.Scanner;
public class SumaNumeros{
	public static void main(String[] args){
	Scanner scanner = new Scanner(System.in);
	int sum = 0;
	int numero;
		do{//Lo que quiere que haga el bucle
			System.out.println("Escribe un número: ");
			numero = scanner.nextInt();
			sum += numero;
			
		}while(numero != 0); // La condición del bucle para que se ejecute.
	System.out.println("El resultado de la suma es: " +sum);
	scanner.close();
	}
	
}
	