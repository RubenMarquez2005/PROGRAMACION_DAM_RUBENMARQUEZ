package Influencers;

class Colaboraciones {
    private String marca;
    private int duracion;

    public Colaboraciones(String marca, int duracion) {
        this.marca = marca;
        this.duracion = duracion;
    }

    public String getDetalles() {
        return "Colaboracion con " + marca + ", Duracion: " + duracion + " meses";
    }
}