<?php
class Venta{
    // Zona de atributos
    private $fechaInst; # Siendo inst una abreviacion de instancia
    private $refPaqueteInst; # Siendo ref una abreviacion de referencia
    private $cantPersonasInst;
    private $refClienteInst; # Siendo ref una abreviacion de referencia
    // Zona de metodos 
    // Metodo constructor (__construct)
    public function __construct($fecha,$objPaquete,$cantPersonas,$objCliente) {
        $this->fechaInst = $fecha;
        $this->refPaqueteInst = $objPaquete;
        $this->cantPersonasInst = $cantPersonas;
        $this->refClienteInst = $objCliente;
    }
    // Metodos de acceso (get's)
    public function getFechaInst(){
        return $this->fechaInst;
    }
    public function getRefPaqueteInst(){
        return $this->refPaqueteInst;
    }
    public function getCantPersonasInst(){
        return $this->cantPersonasInst;
    }
    public function getRefClienteInst(){
        return $this->refClienteInst;
    }
    // Metodos de modificacion (set's)
    public function setFechaInst($nuevaFecha){
        $this->fechaInst = $nuevaFecha;
    }
    public function setRefPaqueteInst($nuevoPaquete){
        $this->refPaqueteInst = $nuevoPaquete;
    }
    public function setCantPersonasInst($nuevaCantidad){
        $this->cantPersonasInst = $nuevaCantidad;
    }
    public function setRefClienteInst($nuevoCliente){
        $this->refClienteInst = $nuevoCliente;
    }
    // Metodo de caracteres ()
    public function __toString()
    {
        $cadena = ("Fecha: " . $this->getFechaInst() . "\n");
        $cadena .= ("Paquete: " . $this->getRefPaqueteInst() . "\n");
        $cadena .= ("Cantidad Personas: ". $this->getCantPersonasInst() . "\n");
        $cadena .= ("Cliente: " . $this->getRefClienteInst() . "\n");
        return $cadena;
    }
    // Metodo darImporteVenta()
    // Retorna el valor que debe ser abonado por el cliente
    public function darImporteVenta(){
        // cantidad de días, por el importe del día del paquete, por la cantidad de personas de la venta
        $importeFinal = null;

        $paquete = $this->getRefPaqueteInst();
        $cantDias = $paquete->getCantDiasInst();
        $cantPersonas = $this->getCantPersonasInst();
        $destino = $paquete->getRefDestinoInst();
        $importeDiaPaquete = $destino->getValorPorDiaInst();

        $importeFinal = (($cantDias*$importeDiaPaquete)*$cantPersonas);
        
        return $importeFinal;
    }
}
?>