<?php
class Cuenta{
    // Zona de atributos 
    private $refClienteInst; # Siendo inst una abreviacion de instancia
    private $nroCuentaInst;
    private $saldoCuentaInst;
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($cliente,$nroCuenta,$saldoCuenta) {
        $this->refClienteInst = $cliente;
        $this->nroCuentaInst = $nroCuenta;
        $this->saldoCuentaInst = $saldoCuenta;
    }
    // Metodo de acceso (get)
    public function getRefClienteInst(){
        return $this->refClienteInst;
    }
    public function getNroCuentaInst(){
        return $this->nroCuentaInst;
    }
    public function getSaldoCuentaInst(){
        return $this->saldoCuentaInst;
    }
    // Metodo de modificacion (set)
    public function setRefClienteInst($nuevoCliente){
        $this->refClienteInst = $nuevoCliente;
    }
    public function setNroCuentaInst($nuevoNroCuenta){
        $this->nroCuentaInst = $nuevoNroCuenta;
    }
    public function setSaldoCuentaInst($nuevoSaldoCuenta){
        $this->saldoCuentaInst = $nuevoSaldoCuenta;
    }
    // Metodo __toString . "\n" .
    public function __toString()
    {
        $cadena = (
            "Cliente: " . $this->getRefClienteInst() . "\n" .
            "Numero de cuenta: " . $this->getNroCuentaInst() . "\n" .
            "Saldo en cuenta: " . $this->getSaldoCuentaInst() . "\n" 
        );
        return $cadena;
    }
    // Metodo saldoCuenta() : retorna el saldo de la cuenta
    public function saldoCuenta(){
        $saldoEnCuenta = $this->getSaldoCuentaInst();
        return $saldoEnCuenta;
    }
    // Metodo realizarDeposito(monto): permite realizar un depósito a la cuenta una cantidad “monto” de dinero.
    public function realizarDeposito($montoIng){ # Siendo Ing una abreviacion de ingresado
        $saldoEnCuenta = $this->getSaldoCuentaInst(); # Obtengo el saldo
        $nuevoSaldo = ($saldoEnCuenta + $montoIng); # Sumo el saldo obtenido con el ingresado
        $this->setSaldoCuentaInst($nuevoSaldo); # Modifico el saldo 
        return true; # Devuelvo "true" como señal de que el depósito se hizo correctamente
    }
    // Metodo realizarRetiro  
    // permite realizar un retiro de la cuenta por una cantidad “monto” de dinero
    // Retorna un true en caso de que el retiro haya sido exitoso o falso en caso contrario
    public function realizarRetiro($montoIng){  # Siendo Ing una abreviacion de ingresado
        $seCompleto = false; # Defino mi variable retorno como falsa
        $saldoObtenido = $this->getSaldoCuentaInst(); # Obtengo el saldo 
        if ($montoIng <= $saldoObtenido){ # Si monto es igual o menor que saldo entonces
            $nuevoSaldo = ($saldoObtenido - $montoIng); # Creo el nuevo saldo
            $this->setSaldoCuentaInst ($nuevoSaldo); # Lo actualizo
            $seCompleto = true; # Cambio mi variable retorno, por que fue efectivo el retiro
        }
        return $seCompleto; # Devuelvo "true" como señal de que el depósito se hizo correctamente o false en caso contrario
    }   
}
?>