package HITO1;

import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;

public class GestionAnimales {
    private HashMap<Integer, Animal> animales;

    // Constructor para iniciar el HashMap
    public GestionAnimales() {
        animales = new HashMap<>();
    }

    // Función para añadir un animal a la protectora
    public void añadirAnimal(Animal animal) {
        boolean chipRepetido = false;

        // Si el chip ya existe, para que no se añadan dos animales con el mismo chip
        Iterator<Map.Entry<Integer, Animal>> it = animales.entrySet().iterator();
        while (it.hasNext()) {
            Map.Entry<Integer, Animal> entry = it.next();
            if (entry.getKey() == animal.getChip()) {
                chipRepetido = true;
                break;
            }
        }

        // Si el chip está repetido, muestra un error
        if (chipRepetido) {
            System.out.println("Error: El chip ya está registrado.");
        } else {
            // Si no está repetido, añadimos el animal 
            animales.put(animal.getChip(), animal);
            System.out.println("Animal añadido correctamente.");
        }
    }

    // Función para buscar un animal por el chip
    public void buscarAnimal(int chip) {
        boolean encontrado = false;

        // Recorremos el HashMap para buscar el animal por el chip
        Iterator<Map.Entry<Integer, Animal>> it = animales.entrySet().iterator();
        while (it.hasNext()) {
            Map.Entry<Integer, Animal> entry = it.next();
            if (entry.getKey() == chip) {
                entry.getValue().mostrar();
                encontrado = true;
                break;
            }
        }

        // Si el animal no se encuentra
        if (!encontrado) {
            System.out.println("Animal no encontrado.");
        }
    }

    // Función para obtener todos los animales (esto permite que podamos acceder desde otra clase sin causar problemas)
    public HashMap<Integer, Animal> getAnimales() {
        return animales;
    }

    // Función para contar cuántos animales hay registrados
    public int contarAnimales() {
        return animales.size();
    }
}

