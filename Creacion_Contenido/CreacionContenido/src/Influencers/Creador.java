package Influencers;
import java.util.ArrayList;
class Creador {
    private String id;
    private String nombre;
    private ArrayList<Contenido> contenidos = new ArrayList<>();
    private ArrayList<Colaboraciones> colaboraciones = new ArrayList<>();

    public Creador(String id, String nombre) {
        this.id = id;
        this.nombre = nombre;
    }

    public String getId() {
        return id;
    }

    public void agregarContenido(Contenido contenido) {
        contenidos.add(contenido);
    }

    public void agregarColaboracion(Colaboraciones colaboracion) {
        colaboraciones.add(colaboracion);
    }

    public ArrayList<Contenido> getContenidos() {
        return contenidos;
    }

    public ArrayList<Colaboraciones> getColaboraciones() {
        return colaboraciones;
    }

    public String mostrar() {
        return "Creador: ID=" + id + ", Nombre=" + nombre;
    }
}