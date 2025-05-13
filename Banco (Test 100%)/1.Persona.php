<?php
class Persona{
    // Zona de atributos
    private $documentoInst; # Siendo Inst una abreviacion de instancia 
    private $nombreInst;
    private $apellidoInst;
    // Zona de metodos 
    // Metodo __construct
    public function __construct($documento,$nombre,$apellido) {
        $this->documentoInst = $documento;
        $this->nombreInst = $nombre;
        $this->apellidoInst = $apellido;
    }
    // Metodo de acceso (get's)
    public function getDocumentoInst(){
        return $this->documentoInst;
    }
    public function getnombreInst(){
        return $this->nombreInst;
    }
    public function getapellidoInst(){
        return $this->apellidoInst;
    }
    // Metodo de modificacion (set's)
    public function setDocumentoInst($nuevoDocumento){
        $this->documentoInst = $nuevoDocumento;
    }
    public function setNombreInst($nuevoNombre){
        $this->nombreInst = $nuevoNombre;
    }
    public function setApellidoInst($nuevoApellido){
        $this->apellidoInst = $nuevoApellido;
    }
    // Metodo __toString . "\n" .
    public function __toString()
    {
        $cadena = (
            "\nNombre: " . $this->getnombreInst() . "\n" .
            "Apellido: " . $this->getapellidoInst() . "\n" .
            "DNI: " . $this->getDocumentoInst() . "\n" 
        );
        return $cadena;
    }
}
?>