package PARTEII_HITOI;

public class Perro extends Animal {
 private String raza;

 // Constructor
 public Perro(String numeroChip, String nombre,int edad, String raza) {
     super(numeroChip, nombre, edad, raza);
     this.raza = raza;
 }


 public void mostrarDatos() {
     System.out.println("Perro: " + nombre + " | Chip: " + numeroChip + " | Raza: " + raza + " | Adoptado: " + (adoptado ? "Sí" : "No"));
 }

 public boolean esGato() {
     return false;
 }

 public String getRaza() {
     return raza;
 }
}
