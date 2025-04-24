package Influencers;

class PublicacionPatrocinada extends Contenido {
    private String marca;

    public PublicacionPatrocinada(String titulo, String fechaPublicacion, String marca) {
        super(titulo, fechaPublicacion);
        this.marca = marca;
    }

    public String getDetalles() {
        return "Publicacion Patrocinada: Titulo=" + titulo + ", Fecha=" + fechaPublicacion + ", Marca=" + marca;
    }
}