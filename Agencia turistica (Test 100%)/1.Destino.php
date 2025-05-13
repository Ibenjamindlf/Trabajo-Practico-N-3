<?php
class Destino{
    // Zona de atributos
    private $identificacionInst; # Siendo inst una abreviacion de instancia
    private $lugarInst;
    private $valorPorDiaInst;
    // Zona de metodos 
    // Metodo constructor (__construct)
    public function __construct($identificacion,$lugar,$valorXdia) {
        $this->identificacionInst = $identificacion;
        $this->lugarInst = $lugar;
        $this->valorPorDiaInst = $valorXdia;
    }
    // Metodos de accesos (get's)
    public function getIdentificacionInst(){
        return $this->identificacionInst;
    }
    public function getLugarInst(){
        return $this->lugarInst;
    }
    public function getValorPorDiaInst(){
        return $this->valorPorDiaInst;
    }
    // Metodos de Modificacion (set's)
    public function setIdentificacionInst($nuevoID){
        $this->identificacionInst = $nuevoID;
    }
    public function setLugarInst($nuevoLugar){
        $this->lugarInst = $nuevoLugar;
    }
    public function setValorPorDiaInst($nuevoValor){
        $this->valorPorDiaInst = $nuevoValor;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("Identificacion: " . $this->getIdentificacionInst() . "\n");
        $cadena .= ("Nombre del lugar: " . $this->getLugarInst() . "\n");
        $cadena .= ("Valor por dia" . $this->getValorPorDiaInst() . "\n");
        return $cadena;
    }
}

?>