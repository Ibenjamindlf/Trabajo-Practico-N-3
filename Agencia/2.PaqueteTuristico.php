<?php
class PaqueteTuristico {
    // Zona de atributos 
    private $fechaInst; # Siendo inst una abreviaciond de instancia
    private $cantDiasInst;
    private $refDestinoInst; # Referencia a la clase destino 
    private $cantPlazasInst;
    private $cantDisponiblesPlazasInst;
    // Zona de metodos
    // Metodo constructor
    public function __construct($fecha,$cantDias,$objDestino,$cantPlazas) {
        $this->fechaInst = $fecha;
        $this->cantDiasInst = $cantDias;
        $this->refDestinoInst = $objDestino;
        $this->cantPlazasInst = $cantPlazas;
        $this->cantDisponiblesPlazasInst = $cantPlazas;
    }
    // Metodo de acceso (get's)
    public function getFechaInst(){
        return $this->fechaInst;
    }
    public function getCantDiasInst(){
        return $this->cantDiasInst;
    }
    public function getRefDestinoInst(){
        return $this->refDestinoInst;
    }
    public function getCantPlazasInst(){
        return $this->cantPlazasInst;
    }
    public function getCantDisponiblesPlazasInst(){
        return $this->cantDisponiblesPlazasInst;
    }
    // Metodos de modificacion (set's)
    public function setFechaInst($nuevaFecha){
        $this->fechaInst = $nuevaFecha;
    }
    public function setCantDiasInst($nuevaCantDias){
        $this->cantDiasInst = $nuevaCantDias;
    }
    public function setRefDestinoInst($nuevaReferencia){
        $this->refDestinoInst = $nuevaReferencia;
    }
    public function setCantPlazasInst($nuevaCant){
        $this->cantPlazasInst = $nuevaCant;
    }
    public function setCantDisponiblesPlazasInst($nuevaCantDisponible){
        $this->cantDisponiblesPlazasInst = $nuevaCantDisponible;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("fecha: " . $this->getFechaInst() . "\n");
        $cadena .= ("Cantidad Dias: " . $this->getCantDiasInst() . "\n");
        $cadena .= ("Destino: " . $this->getRefDestinoInst() . "\n");
        $cadena .= ("Cantidad Plazas: " . $this->getCantPlazasInst() . "\n");
        $cadena .= ("Cantidad de plazas disponibles: " . $this->getCantDisponiblesPlazasInst() . "\n");
        return $cadena;
    }
}
?>