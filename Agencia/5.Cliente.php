<?php
class Cliente extends Persona{ # Generamos la nueva clase client heredada (extends de persona)
    // Zona de atributos
    private $nroClienteInst; # Siendo Inst una abreviacion de instancia
    // Zona de metodos 
    // Metodo constructor (__construct)
    public function __construct($documento,$nombre,$apellido,$nroCliente) {
        parent :: __construct($documento,$nombre,$apellido); # Llamamos al constructor padre con parent
        $this->nroClienteInst = $nroCliente; # Agregamos el nuevo atributo, correspondiente a la clase cliente
    }
    // Metodo de acceso (get's)
    public function getNroClienteInst(){
        return $this->nroClienteInst;
    }
    // Metodo de modificacion (set's)
    public function setNroClienteInst($nuevoNroCliente){
        $this->nroClienteInst = $nuevoNroCliente;
    }
    // Metodo __toString . "\n" .
    public function __toString()
    {
        $cadena = parent :: __toString();
        $cadena .= ("Numero de cliente: " . $this->getNroClienteInst());
        return $cadena;
    }
} 
?>