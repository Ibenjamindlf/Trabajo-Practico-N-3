<?php
class Rubro{
    // Zona de atributos
    private $descripcionInst; # Siendo Inst una abreviacion de instancia
    private $porcGanancia;
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($descripcionRubro,$porcentajeGanancia) {
        $this->descripcionInst = $descripcionRubro;
        $this->porcGanancia = $porcentajeGanancia;
    }
    // Metodo de acceso (get's)
    public function getDescripcionInst(){
        return $this->descripcionInst;
    }
    public function getPorcGanancia(){
        return $this->porcGanancia;
    }
    // Metodo de modificacion (set's)
    public function setDescripcionInst($nuevaDescripcion){
        $this->descripcionInst = $nuevaDescripcion;
    }
    public function setPorcGanancia($nuevaGanancia){
        $this->porcGanancia = $nuevaGanancia;
    }
    // Metodo de caracteres
    public function __toString()
    {
        $cadena = ("Descripcion: " . $this->getDescripcionInst() . "\n");
        $cadena .= ("Porcentaje ganancia: " . $this->getPorcGanancia() . "\n");
        return $cadena;
    }
}
?>