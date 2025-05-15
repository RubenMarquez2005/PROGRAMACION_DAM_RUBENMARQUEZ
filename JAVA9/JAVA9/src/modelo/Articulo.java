package modelo;

public class Articulo {
    private int idArticulo;
    private String nombre;
    private double precioUnitario;
    private int stock;

    public Articulo(int idArticulo, String nombre, double precioUnitario, int stock) {
        this.idArticulo = idArticulo;
        this.nombre = nombre;
        this.precioUnitario = precioUnitario;
        this.stock = stock;
    }

    public int getIdArticulo() {
        return idArticulo;
    }

    public String getNombre() {
        return nombre;
    }

    public double getPrecioUnitario() {
        return precioUnitario;
    }

    public int getStock() {
        return stock;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public void setPrecioUnitario(double precioUnitario) {
        this.precioUnitario = precioUnitario;
    }

    public void setStock(int stock) {
        this.stock = stock;
    }
}
