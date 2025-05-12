<?php
class Cliente{
    // Zona de atributos 
    private $tipoDocInst; # Siendo inst una abreviacion de instancia
    private $nroDocInst; 
    // Zona de Metodos
    // Metodo constructor (__construct)
    public function __construct($tipoDoc,$nroDoc) {
        $this->tipoDocInst = $tipoDoc;
        $this->nroDocInst = $nroDoc;
    }
    // Metodos de acceso (get's)
    public function getTipoDocInst(){
        return $this->tipoDocInst;
    }
    public function getNroDocInst(){
        return $this->nroDocInst;
    }
    // Metodos de modificacion (set's)
    public function setTipoDocInst($nuevoTipo){
        $this->tipoDocInst = $nuevoTipo;
    }
    public function setNroDocInst($nuevoNro){
        $this->nroDocInst = $nuevoNro;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("Tipo de documento: " . $this->getTipoDocInst() . "\n");
        $cadena .= ("Numero documento." . $this->getNroDocInst() . "\n");
        return $cadena;
    }
}
?>