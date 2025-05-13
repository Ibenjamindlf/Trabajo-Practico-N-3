<?php
include_once '1.Persona.php';
include_once '2.Cliente.php';
include_once '3.Cuenta.php';
include_once '4.CuentaCorriente.php';
include_once '5.CajaAhorro.php';
include_once '6.Banco.php';

$clienteA = new Cliente(44628595,"Paulo","Dybala",21);
$clienteB = new Cliente(30226425,"Lionel","Messi",10);

$cuentaCorriente1 = new CuentaCorriente($clienteA,1,15000,1000); # Cta 1
$cuentaCorriente2 = new CuentaCorriente($clienteB,2,2000,200); # Cta 2

$cajaAhorro1 = new CajaAhorro($clienteA,3,2500); # Cta 3
$cajaAhorro2 = new CajaAhorro($clienteA,4,50000); # Cta 4
$cajaAhorro3 = new CajaAhorro($clienteB,5,6000); # Cta 5

$banco = new Banco([$cuentaCorriente1,$cuentaCorriente2],[$cajaAhorro1,$cajaAhorro2,$cajaAhorro3],300,[$clienteA,$clienteB]);

// echo $banco; # Datos originales 

$banco->realizarDeposito(3,300);
$banco->realizarDeposito(4,300);
$banco->realizarDeposito(5,300);
$banco->realizarRetiro(1,150);
$banco->realizarDeposito(5,150);
echo $banco; # Datos luego de las transacciones 
?>