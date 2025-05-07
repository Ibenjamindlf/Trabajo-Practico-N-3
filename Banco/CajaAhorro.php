<?php
class CajaAhorro extends Cuenta{
    // Zona de atributos
    // La clase no tiene atributos propios, ya que los hereda directamente
    // Zona de metodos
    // Metodo contructor (__construct)
    public function __construct($objCliente,$nroCuenta,$saldo) {
        parent ::__construct($objCliente,$nroCuenta,$saldo);
    }
    // Metodo de caracteres (__toString) . "\n" .
    public function __toString()
    {
        $cadena = ("\n----Caja de Ahorro----\n");
        $cadena .= parent::__toString();
        return $cadena;
    }
}
?>