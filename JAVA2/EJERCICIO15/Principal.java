import operaciones.Multiplicador;
public class Principal{
	public static void main(String[] args){
		int a = 8;
		int b = 4;
		Multiplicador multiplicacion = new Multiplicador();
		System.out.println(multiplicacion.multiplicar(a , b));
	}
}