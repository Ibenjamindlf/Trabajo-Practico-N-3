<?php
class Venta{
    // Zona de atributos
    private $fechaInst; # Siendo inst una abreviacion de instancia
    private $colProductosInst; # Siendo col una referenci a coleccion
    private $clienteInst;
    // Zona de metodos
    // Metodo Constructor (__construct)
    public function __construct($fecha,$colProductos,$cliente) {
        $this->fechaInst = $fecha;
        $this->colProductosInst = $colProductos;
        $this->clienteInst = $cliente;
    }
    // Metodos de acceso (get's)
    public function getFechaInst(){
        return $this->fechaInst;
    }
    public function getColProductosInst(){
        return $this->colProductosInst;
    }
    public function getClienteInst(){
        return $this->clienteInst;
    }
    // Metodos de modificacion (set's)
    public function setFechaInst($nuevaFecha){
        $this->fechaInst = $nuevaFecha;
    }
    public function setColProductosInst($nuevaColeccion){
        $this->colProductosInst = $nuevaColeccion;
    }
    public function setClienteInst($nuevoCliente){
        $this->clienteInst = $nuevoCliente;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("Fecha: " . $this->getFechaInst() . "\n");
        $cadena .= ("Productos: " . $this->getColProductosInst() . "\n");
        $cadena .= ("Cliente: " . $this->getClienteInst() . "\n");
        return $cadena;
    }
    // Metodo calcularImporteFinal
    public function calcularImporteFinal(){
        $productos = $this->getColProductosInst();
        $total = 0;
        foreach ($productos as $producto) {
            $total += $producto->calcularPrecioVenta();
        }
        return $total;
    }
}
?>