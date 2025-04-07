package HITO1;

public abstract class Animal {// añadimos los atributos a la clase abstracta animal
    private int chip;
    private String nombre;
    private int edad;
    private String raza;
    private boolean adoptado;

    // Constructor de Animal
    public Animal(int chip, String nombre, int edad, String raza, boolean adoptado) {
        this.chip = chip;
        this.nombre = nombre;
        this.edad = edad;
        this.raza = raza;
        this.adoptado = adoptado;
    }

    // metodos get nos devuelve el dato que le pidamos
    public int getChip() {
        return chip;// nos retorna el chip
    }

    public String getNombre() {
        return nombre; //nos retorna el nombre
    }

    public int getEdad() {
        return edad; // nos retorna la edad
    }

    public String getRaza() {
        return raza; // nos retorna la raza
    }

    public boolean isAdoptado() {
        return adoptado; //nos retorna si es adoptado o no
    }

    // metodo abstracto que vamos a añadir en las subclases
    public abstract void mostrar();
}
