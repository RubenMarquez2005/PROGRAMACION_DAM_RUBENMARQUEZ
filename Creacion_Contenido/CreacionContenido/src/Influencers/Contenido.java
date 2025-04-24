package Influencers;

public abstract class Contenido {
    protected String titulo;
    protected String fechaPublicacion;

    public Contenido(String titulo, String fechaPublicacion) {
        this.titulo = titulo;
        this.fechaPublicacion = fechaPublicacion;
    }

    public abstract String getDetalles();
}