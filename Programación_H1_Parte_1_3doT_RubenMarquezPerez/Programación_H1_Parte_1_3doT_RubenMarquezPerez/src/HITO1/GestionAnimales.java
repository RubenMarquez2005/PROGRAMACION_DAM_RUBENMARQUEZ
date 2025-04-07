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

    // Funcion para añadir un animal a la protectora
    public void añadirAnimal(Animal animal) {
        boolean chipRepetido = false;

        // si el chip ya existe para que no se añadan dos animales con el mismo chip
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

    // Funcion para buscar un animal por el chip que tenga ese animal
    public void buscarAnimal(int chip) {
        boolean encontrado = false;

        // Recorremos el HashMap para buscar el animal por el chip que tiene el animal
        Iterator<Map.Entry<Integer, Animal>> it = animales.entrySet().iterator();
        while (it.hasNext()) {
            Map.Entry<Integer, Animal> entry = it.next();
            if (entry.getKey() == chip) {
                entry.getValue().mostrar();
                encontrado = true;
                break;
            }
        }

        // Si el animal no se encuentra dentro de los animales registrados
        if (!encontrado) {
            System.out.println("Animal no encontrado.");
        }
    }

    // Funcion para obtener todos los animales (esto permite que podamos acceder a el desde otra clase)
    public HashMap<Integer, Animal> getAnimales() {
        return animales;
    }
}
