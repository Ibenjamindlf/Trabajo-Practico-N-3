<?php
class Agencia{
    // Zona de atributos
    private $colPaquetesInst; # Siendo inst una abreviacion de instancia
    private $colVentasRealizadasInst; 
    private $colVentasOnLineRealizadasInst;
    // Zona de metodos 
    // Metodo constructor (__construct)
    public function __construct($colPaquetes,$colVentasRealizadas,$colVentasOnLineRealizadas) {
        $this->colPaquetesInst = $colPaquetes;
        $this->colVentasRealizadasInst = $colVentasRealizadas;
        $this->colVentasOnLineRealizadasInst = $colVentasOnLineRealizadas;
    }
    // Metodos de acceso (get's)
    public function getColPaquetesInst(){
        return $this->colPaquetesInst;
    }
    public function getColVentasRealizadasInst(){
        return $this->colVentasRealizadasInst;
    }
    public function getColVentasOnLineRealizadasInst(){
        return $this->colVentasOnLineRealizadasInst;
    }
    // Metodos de modificacion (set's)
    public function setColPaquetesInst($nuevaColPaq){
        $this->colPaquetesInst = $nuevaColPaq;
    }
    public function setColVentasRealizadasInst($nuevaColVentas){
        $this->colVentasRealizadasInst = $nuevaColVentas;
    }
    public function setColVentasOnLineRealizadasInst($nuevaColVentasOnLine){
        $this->colVentasOnLineRealizadasInst = $nuevaColVentasOnLine;
    }
    // Metodo de caracteres ()
    public function __toString()
    {
        $paquetes = $this->getColPaquetesInst(); # Obtengo 
        $cadenaPaquetes = ""; # Inicio la cadena en vacio
        foreach ($paquetes as $paquete) { # Recorro la coleccion obtenida y voy guardando 
            $cadenaPaquetes .= $paquete . "\n"; # Pegamos las cuentas
            }

        $ventasRealizadas = $this->getColVentasRealizadasInst(); # Obtengo 
        $cadenaVentasRealizadas = ""; # Inicio la cadena en vacio
        foreach ($ventasRealizadas as $ventaRealizada) { # Recorro la coleccion obtenida y voy guardando 
            $cadenaVentasRealizadas .= $ventaRealizada . "\n"; # Pegamos las cuentas
            }

        $ventasOnLineRealizadas = $this->getColVentasOnLineRealizadasInst(); # Obtengo 
        $cadenaVentasOnLineRealizadas = ""; # Inicio la cadena en vacio
        foreach ($ventasOnLineRealizadas as $ventaOnLineRealizada) { # Recorro la coleccion obtenida y voy guardando 
            $cadenaVentasOnLineRealizadas .= $ventaOnLineRealizada . "\n"; # Pegamos las cuentas
            }

        $cadena = ("Coleccion de paquetes: " . $cadenaPaquetes . "\n");
        $cadena .= ("Coleccion de ventas realizadas: " . $cadenaVentasRealizadas . "\n");
        $cadena .= ("Coleccion de ventas on-line realizadas: " . $cadenaVentasOnLineRealizadas . "\n");
        
        return $cadena;
    }
}
?>