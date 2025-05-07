<?php
include_once 'Persona.php';
include_once 'Cliente.php';
include_once 'Cuenta.php';
include_once 'CajaAhorro.php';
include_once 'CuentaCorriente.php';
include_once 'Banco.php';

$objCliente1 = new Cliente(44628595,"Benjamin","Perco",30);
$objCliente2 = new Cliente(30226425,"Andrea","Perez",99);
$objCliente3 = new Cliente(45628595,"Matias","basile",7);
$objCliente4 = new Cliente(30226696,"Paulo","Dybala",21);
$objCliente5 = new Cliente(45226595,"Lionel","Messi",10);
// $cuenta1 = new Cuenta($objCliente1,1,10);
$cajaAhorro1 = new CajaAhorro($objCliente1,1,1000);
$cajaAhorro2 = new CajaAhorro($objCliente2,2,2000);

$cuentaCorriente1 = new CuentaCorriente($objCliente3,3,3000,300);
$cuentaCorriente2 = new CuentaCorriente($objCliente4,4,4000,400);


// echo $cajaAhorro1;
// echo $cuentaCorriente1;
// echo ("\n--------------------------------\n");
// $cuentaCorriente1->realizarRetiro(20);
// echo $cuentaCorriente1;
// echo ("\n--------------------------------\n");
// $cuentaCorriente1->realizarRetiroRed(30);
// echo $cuentaCorriente1;

$banco = new Banco([$cuentaCorriente1,$cuentaCorriente2],[$cajaAhorro1,$cajaAhorro2],300,[$objCliente1,$objCliente2,$objCliente3,$objCliente4,$objCliente5]);
echo $banco;

// $banco->incorporarCliente($objCliente5);
// echo ("\n--------------------------------\n");
// echo $banco;

// $banco->incorporarCuentaCorriente(10,600);
// echo ("\n--------------------------------\n");
// echo $banco;

// $banco->realizarDeposito(3,4000);
// echo ("\n--------------------------------\n");
// echo $banco;

$banco->realizarRetiro(3,3150);
echo ("\n--------------------------------\n");
$banco->realizarRetiro(4,4397);
echo ("\n--------------------------------\n");
echo $banco;
?>