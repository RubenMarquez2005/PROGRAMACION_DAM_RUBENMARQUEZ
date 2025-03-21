public class Numeros{
	public static void main(String[] args){
		for(int n = 1; n<10; n++){
			if (n == 5){// Omite la impresion del numero 5
				continue;
			}
			else if(n== 8){
				break;// Para el bucle.
			}
		System.out.println(n);
		}
	}

}