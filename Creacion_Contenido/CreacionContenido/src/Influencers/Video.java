package Influencers;

class Video extends Contenido {
    private int duracion;

    public Video(String titulo, String fechaPublicacion, int duracion) {
        super(titulo, fechaPublicacion);
        this.duracion = duracion;
    }

    public String getDetalles() {
        return "Video: Titulo=" + titulo + ", Fecha=" + fechaPublicacion + ", Duracion=" + duracion + " minutos";
    }
}