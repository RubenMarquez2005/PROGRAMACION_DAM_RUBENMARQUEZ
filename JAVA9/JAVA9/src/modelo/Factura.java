package modelo;

import java.util.Date;

public class Factura {
    private int idFactura;
    private int idCliente;
    private Date fecha;
    private double total;

    public Factura(int idFactura, int idCliente, Date fecha, double total) {
        this.idFactura = idFactura;
        this.idCliente = idCliente;
        this.fecha = fecha;
        this.total = total;
    }

    public int getIdFactura() {
        return idFactura;
    }

    public void setIdFactura(int idFactura) {
        this.idFactura = idFactura;
    }

    public int getIdCliente() {
        return idCliente;
    }

    public void setIdCliente(int idCliente) {
        this.idCliente = idCliente;
    }

    public Date getFecha() {
        return fecha;
    }

    public void setFecha(Date fecha) {
        this.fecha = fecha;
    }

    public double getTotal() {
        return total;
    }

    public void setTotal(double total) {
        this.total = total;
    }
}
