<?php
class Carrito {
    // Lista para guardar los productos
    private $productos = array();

    // Función para agregar un producto
    public function agregarProducto($nombre, $precio, $cantidad){
        $this->productos[] = array('nombre' => $nombre, 'precio' => $precio, 'cantidad' => $cantidad);
    }

    // Función para eliminar un producto por nombre
    public function quitarProducto($nombre){
        $nuevosProductos = array(); 
        foreach($this->productos as $producto){
            if($producto['nombre'] != $nombre){  
                $nuevosProductos[] = $producto;
            }
        }
        $this->productos = $nuevosProductos;  
    }

    // Función para calcular el total del carrito
    public function calcularTotal(){
        $total = 0;
        foreach($this->productos as $producto){
            $total += $producto['precio'] * $producto['cantidad'];
        }
        return $total;
    }

    // Función para mostrar los productos
    public function mostrarProductos(){
        foreach($this->productos as $producto){
            echo "Producto: " . $producto['nombre'] . " | Precio: " . $producto['precio'] . " | Cantidad: " . $producto['cantidad'] . "<br>";
        }
    }
}

// Crear el carrito
$carrito = new Carrito();

// Agregar productos
$carrito->agregarProducto('Producto1', 10, 2);
$carrito->agregarProducto('Producto2', 20, 3);

// Mostrar productos y total
$carrito->mostrarProductos();
echo "Total: " . $carrito->calcularTotal() . "<br>";

// Eliminar un producto y mostrar de nuevo
$carrito->quitarProducto('Producto2');
$carrito->mostrarProductos();
echo "Total: " . $carrito->calcularTotal() . "<br>";
?>
