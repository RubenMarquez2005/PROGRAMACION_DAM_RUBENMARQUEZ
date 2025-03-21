public class Comparador{
	public void comparar(int a, int b){ //SI NO RETORNA ES VOID, SI RETORNA ES EL TIPO DE DATO
		if (a > b){
			System.out.println("El numero mayor es: " +a);
		}
		else if (a < b){
			System.out.println("El número mayor es: " +b);
		}
		else {
			System.out.println("Los numeros: " +a+ " y " +b+ " son iguales");
		}
	}
	public static void main(String[] args){
		Comparador comp = new Comparador();
		comp.comparar(8,6);
		comp.comparar(8,9);
		comp.comparar(8,8);
	}


}


	