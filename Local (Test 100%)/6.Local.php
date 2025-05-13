<?php
class Local{
    // Zona de atributos
    private $colProductos;
    // Zona de metodos
    // Metodo Constructor (__construct)
    public function __construct($productosEnVenta) {
        $this->colProductos = $productosEnVenta;
    }
    // Metodos de acceso (get's)
    public function getColProductos(){
        return $this->colProductos;
    }
    // Metodos de modificacion (set's)
    public function setColProductos($nuevaColeccion){
        $this->colProductos = $nuevaColeccion;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $productos = $this->getColProductos(); 
        $cadenaProductos = ""; 
        foreach ($productos as $producto) { 
            $cadenaProductos .= $producto . "\n"; 
        }

        $cadena = ("\n----Productos en venta----\n");
        $cadena .= ($cadenaProductos);
        return $cadena;
    }
    // Metodo incorporarProductoLocal (objProducto)
    // recibe por parámetro un objeto Producto 
    // verifica que el código de barra no se encuentre dentro de la lista. 
    // Si el producto ya existe no es incorporado dentro de la lista de productos de la tienda. 
    // El método retorna verdadero o falso según corresponda.
    public function incorporarProductoLocal ($objProductoIng){ # Siendo ing una abreviacion de ingresado
        $seCompleto = true;
        $productos = $this->getColProductos(); 
        $cantProductos = count($productos); 
        $i = 0;
        while ($seCompleto && $i<$cantProductos){ 
            $unProducto = $productos[$i]; 
            $codigoBarraUnProducto = $unProducto->getCodigoBarraInst(); 
            $codigoBarraProductoIng = $objProductoIng->getCodigoBarraInst(); 
            if ($codigoBarraProductoIng == $codigoBarraUnProducto){ 
                $seCompleto = false;
            } 
        $i++; 
        }
        if ($seCompleto){ 
            array_push($productos,$objProductoIng);
            $this->setColProductos($productos);
        }
        if ($productos == []) {
            array_push($productos,$objProductoIng);
            $this->setColProductos($productos); 
        }
        return $seCompleto; 
    }
    // Metodo retornarImporteProducto(codProducto) 
    // Recibe por parámetro el código de un producto 
    // y retorna el precio de venta.
    public function retornarImporteProducto($codProductoIng){
        $bandera = false;
        $productos = $this->getColProductos();
        $cantProductos = count($productos);
        $i=0;
        while (!$bandera && $i<$cantProductos) {
            $unProducto = $productos[$i];
            $codigoUnProducto = $unProducto->getCodigoBarraInst();
            if ($codProductoIng == $codigoUnProducto) {
                $bandera = true;
                $precioVenta = $unProducto->getPrecioCompraInst();
            }
            $i++;
        }
        return $precioVenta;
    }
    // Metodo retornarCostoProductoLocal()
    // recorre todos los productos de la tienda 
    // retorna la suma de los costos de cada producto teniendo en cuenta el stock de cada uno.
    public function retornarCostoProductoLocal(){
        $productos = $this->getColProductos();
        $sumatoriaCostoProductoLocal = 0;
        // Utilizando un while como recorrido total
        $cantProductos = count($productos);
        $i = 0;
        while ($i<$cantProductos){
            $unProducto = $productos[$i];
            $precioCompraUnProducto = $unProducto->getPrecioCompraInst();
            $stockUnProducto = $unProducto->getStockInst();
            $costoTotalUnProducto = ($precioCompraUnProducto * $stockUnProducto);
            $sumatoriaCostoProductoLocal = ($sumatoriaCostoProductoLocal+$costoTotalUnProducto);
            $i++;
        }
        return $sumatoriaCostoProductoLocal;
    }
}
?>