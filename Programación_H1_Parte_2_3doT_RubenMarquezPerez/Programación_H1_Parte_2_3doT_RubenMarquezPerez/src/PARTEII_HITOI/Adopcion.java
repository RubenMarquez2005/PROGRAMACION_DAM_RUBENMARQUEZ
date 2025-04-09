package PARTEII_HITOI;

public class Adopcion {
 private String numeroChipAnimal;//atributos
 private String nombreAdoptante;
 private String dniAdoptante;

 // Constructor
 public Adopcion(String numeroChipAnimal, String nombreAdoptante, String dniAdoptante) {
     this.numeroChipAnimal = numeroChipAnimal;//constructor
     this.nombreAdoptante = nombreAdoptante;
     this.dniAdoptante = dniAdoptante;
 }

 public String getNumeroChipAnimal() { // retorna numero del chip del animal
     return numeroChipAnimal;
 }

 public String mostrar() { // nos muestra los datos introducidos y quien a adoptado al animal
     return "Adopción: Animal con chip " + numeroChipAnimal + " adoptado por " + nombreAdoptante + 
            " (DNI: " + dniAdoptante + ")";
 }
}
