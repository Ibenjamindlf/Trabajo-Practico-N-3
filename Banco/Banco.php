<?php
class Banco{
    // Zona de atributos
        # coleccionCuentaCorriente: variable que contiene una colección de instancias de la claseCuentas Corrientes.
    private $colCuentasCorrienteInst; # Siendo inst una abreviacion de instancia
        # coleccionCajaAhorro: variable que contiene una colección de instancias de la clase Caja de Ahorro .
    private $colCajasAhorroInst;
        # ultimoValorCuentaAsignado: variable que contiene el ultimo valor asignado a una cuenta del banco.
    private $ultimoValorCuentaAsignadoInst;
        # coleccionCliente: variable que contiene una colección de instancias de la clase Cliente
    private $colClientesInst;
    // Zona de metodos 
    // Metodo constructor
    public function __construct($colObjCC,$colObjCA,$ultValor,$colObjClientes) {
        $this->colCuentasCorrienteInst = $colObjCC;
        $this->colCajasAhorroInst = $colObjCA;
        $this->ultimoValorCuentaAsignadoInst = $ultValor;
        $this->colClientesInst = $colObjClientes;
    }
    // Metodos de acceso (get's)
    public function getColCuentasCorrienteInst(){
        return $this->colCuentasCorrienteInst;
    }
    public function getColCajasAhorroInst(){
        return $this->colCajasAhorroInst;
    }
    public function getUltimoValorCuentaAsignadoInst(){
        return $this->ultimoValorCuentaAsignadoInst;
    }
    public function getColClientesInst(){
        return $this->colClientesInst;
    }
    // Metodos de modificacion (set's)
    public function setColCuentasCorrienteInst($nuevaColCC){
        $this->colCuentasCorrienteInst = $nuevaColCC;
    }
    public function setColCajasAhorroInst($nuevaColCA){
        $this->colCajasAhorroInst = $nuevaColCA;
    }
    public function setUltimoValorCuentaAsignadoInst($nuevoValor){
        $this->ultimoValorCuentaAsignadoInst = $nuevoValor;
    }
    public function setColClientesInst($nuevaColClientes){
        $this->colClientesInst = $nuevaColClientes;
    }
    // Metodo de caracteres __toString
    public function __toString()
    {
        $cuentasCorrientes = $this->getColCuentasCorrienteInst(); # Obtengo 
        $cadenaCuentasCorrientes = ""; # Inicio la cadena en vacio
        foreach ($cuentasCorrientes as $cuentaCorriente) { # Recorro la coleccion obtenida y voy guardando 
            $cadenaCuentasCorrientes .= $cuentaCorriente . "\n"; # Pegamos las cuentas
        }
        $cajasAhorro = $this->getColCajasAhorroInst(); # Obtengo 
        $cadenaCajasAhorro = ""; # Inicio la cadena en vacio
        foreach ($cajasAhorro as $cajaAhorro) { # Recorro la coleccion obtenida y voy guardando 
            $cadenaCajasAhorro .= $cajaAhorro . "\n"; # Pegamos las cajas de ahorro
        }
        $clientes = $this->getColClientesInst(); # Obtengo 
        $cadenaClientes = ""; # Inicio la cadena en vacio
        foreach ($clientes as $cliente) { # Recorro la coleccion obtenida y voy guardando 
            $cadenaClientes .= $cliente . "\n"; # Pegamos las cajas de ahorro
        }
        $cadena = (
            "\nCuentas Corrientes:\n " . $cadenaCuentasCorrientes . 
            "\nCajas de Ahorro:\n " . $cadenaCajasAhorro . 
            "\nUltimo Valor Asignado:" . $this->getUltimoValorCuentaAsignadoInst() .
            "\nclientes:\n " . $cadenaClientes 
        ); 
        return $cadena;
    }
    // Metodo incorporarCliente(objCliente)
    // permite agregar un nuevo cliente al Banco, retorna un bool
    public function incorporarCliente($objClienteIng){
        $seCompleto = false;
        $colClientes = $this->getColClientesInst();
        if ($objClienteIng != null){
            array_push($colClientes,$objClienteIng);
            $this->setColClientesInst($colClientes);
            $seCompleto = true;
        }
        return $seCompleto;
    }
    // Metodo incorporarCuentaCorriente(numeroCliente, montoDescubierto):
    // Agregar una nueva Cuenta a la colección de cuentas, verificando que el cliente dueño de la cuenta es cliente del Banco.
    public function incorporarCuentaCorriente($nroClienteIng,$montoDescubiertoIng){
        $seAgrego = false;
        $clientes = $this->getColClientesInst();
        $cantClientes = count($clientes);
        $i = 0;
        while (!$seAgrego && $i<$cantClientes){
            $unCliente = $clientes[$i];
            $nroCliente = $unCliente->getNroClienteInst();
            if ($nroClienteIng === $nroCliente) {
                $ctaCorriente = new CuentaCorriente($unCliente,$nroClienteIng,30,$montoDescubiertoIng);
                $colCuentasCorrientes = $this->getColCuentasCorrienteInst();
                array_push($colCuentasCorrientes,$ctaCorriente);
                $this->setColCuentasCorrienteInst($colCuentasCorrientes);
                $seAgrego = true;
            }
            $i++;
        }
        return $seAgrego;
    } 
    // Metodo realizarDeposito(numCuenta,monto) 
    // Dado un número de Cuenta y un monto, realizar depósito.
    public function realizarDeposito($numCuentaIng,$montoIng){
        $seRealizo = false;
        $colCC = $this->getColCuentasCorrienteInst();
        $colCA = $this->getColCajasAhorroInst();
        $colTotalCtas = array_merge($colCC,$colCA);
        $cantColTotales = count($colTotalCtas);
        $i=0;
        while (!$seRealizo && $i<=$cantColTotales){
            $unaCuenta = $colTotalCtas[$i];
            $nroCuenta = $unaCuenta->getNroCuentaInst();
            if ($numCuentaIng === $nroCuenta){
                $seRealizo = $unaCuenta->realizarDeposito($montoIng);
            }
        $i++;
        }
        return $seRealizo;
    } 
    // realizarRetiro(numCuenta,monto)
    // Dado un número de Cuenta y un monto, realizar retiro
    public function realizarRetiro($numCuentaIng,$montoIng){
        $seRealizo = false;
        // $retornoPrueba = ("No Ingresa");
        $colCC = $this->getColCuentasCorrienteInst();
        $colCA = $this->getColCajasAhorroInst();
        $colTotalCtas = array_merge($colCC,$colCA);
        $cantColTotales = count($colTotalCtas);
        $j=0;
        while (!$seRealizo && $j < $cantColTotales){
            $unaCuenta = $colTotalCtas[$j];
            $nroCuenta = $unaCuenta->getNroCuentaInst();
            if ($numCuentaIng === $nroCuenta){
                $seRealizo = $unaCuenta->realizarRetiro($montoIng);
                // $retornoPrueba = ("ingreso al primer if");
                if (!$seRealizo){
                    $seRealizo = $unaCuenta->realizarRetiro($montoIng);
                    // $retornoPrueba = ("ingreso al segundo if");
                }
            }
        $j++;
        }
        // return $retornoPrueba;
        return $seRealizo;
    } 
}
?>