<?php
class CuentaCorriente extends Cuenta{
    // Zona de atributos
    private $descubiertoInst; # Siendo inst una abreviacion de instancia
    // Zona de metodos
    // Metodo constructor __construct
    public function __construct($objCliente,$nroCuenta,$saldo,$montoDescubierto) {
        parent ::__construct($objCliente,$nroCuenta,$saldo);
        $this->descubiertoInst = $montoDescubierto; 
    }
    // Metodo de Acceso (get's)
    public function getDescubiertoInst(){
        return $this->descubiertoInst;
    }
    // Metodo de Modificacion (set's)
    public function setDescubiertoInst($nuevoDescubierto){
        $this->descubiertoInst = $nuevoDescubierto;
    }
    // Metodo de caracteres (__toString) 
    public function __toString()
    {
        $cadena = ("\n----Cuenta Corriente----\n");
        $cadena .= parent::__toString();
        $cadena .= ("Permite girar por descubierto: " . $this->getDescubiertoInst());
        return $cadena;
    }
    // Metodo realizarRetiro($montoIng) Redefinido 
    public function realizarRetiroRed($montoIng){
        $seCompleto = false; # Defino mi variable retorno como falsa
        $resultado = parent::realizarRetiro($montoIng); # Obtengo el valor de la funcion en la clase padre
        $descubierto = $this->getDescubiertoInst(); # Obtengo el valor del descubierto
        $saldo = $this->getSaldoCuentaInst(); # Obtengo el saldo de la cuenta
        $diferenciaMontoDescubierto = ($montoIng - $saldo);
        // $retiroConDescubierto = ($saldo + $descubierto); # Creo una variable con el saldo+descubierto
        if (!$resultado && $descubierto>=$diferenciaMontoDescubierto){ # Si necesita del descubierto entonces
            $diferencia = ($montoIng - $saldo); # Creo una variable diferencia 
            $nuevoDescubierto = ($descubierto - $diferencia);
            $this->setDescubiertoInst($nuevoDescubierto); # Modifico mi descubierto
            parent::setSaldoCuentaInst(0); # Saldo pasa a ser 0
            $seCompleto = true; # Como se completo la accion, mi variable pasa a valer true
        }
        return $seCompleto; # retorno la accion como un bool
    }
}
?>