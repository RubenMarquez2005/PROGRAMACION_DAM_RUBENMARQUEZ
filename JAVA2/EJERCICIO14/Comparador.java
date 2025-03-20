public class Comparador{
	public void compararNumeros(int a, int b){
		if (a > b){
			System.out.println("El número ("+ a +") es mayor que el número ("+ b +")");
		}
		else if (a < b){
			System.out.println("El número ("+ a +") es menor que el número ("+ b +")");
		}
		else {
			System.out.println("El número ("+ a +") es igual que el número ("+ b +")");
		}
	}
}