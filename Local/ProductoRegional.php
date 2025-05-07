<?php
class ProductoRegional extends Producto{
    // Zona de atributos
    private $porcDescuentoInst; # Siendo inst una abreviacion de instancia
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($porcDescuento) {
        $this->porcDescuentoInst = $porcDescuento;
    }
    // Metodo de acceso (get's)
    public function getPorcDescuentoInst(){
        return $this->porcDescuentoInst;
    }
    // Metodo de modificacion (set's)
    public function setPorcDescuentoInst($nuevoPorcentaje){
        $this->porcDescuentoInst = $nuevoPorcentaje;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("\n----Producto----\n");
        $cadena .= parent::__toString();
        $cadena .= ("Descuento Regional: " . $this->getPorcDescuentoInst());
        return $cadena;
    }
    // Metodo darPrecioVenta() redefinido 
    public function calcularPrecioVenta(){
        $precioVenta = parent::calcularPrecioVenta();
        $porcDcto = $this->getPorcDescuentoInst();

        $diferencia = ($precioVenta * ($porcDcto/100));
        $precioFinal = ($precioVenta - $diferencia);

        return $precioFinal;
    }

}
?>