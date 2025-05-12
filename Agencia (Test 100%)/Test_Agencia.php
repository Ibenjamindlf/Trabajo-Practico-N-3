<?php
include_once '1.Destino.php';
include_once '2.PaqueteTuristico.php';
include_once '3.Venta.php';
include_once '4.VentaOnLine.php';
include_once '5.Cliente.php';
include_once '6.Agencia.php';

$destino = new Destino(1,"Bariloche",250);
$paqueteTuristico = new PaqueteTuristico("23/05/2014",3,$destino,25);
$agencia = new Agencia([],[],[]);
$agencia->incorporarPaquete($paqueteTuristico);
$agencia->incorporarPaquete($paqueteTuristico);
$agencia->incorporarVenta($paqueteTuristico,"DNI",27898654,5,false);
$agencia->incorporarVenta($paqueteTuristico,"DNI",27898654,4,true);
$agencia->incorporarVenta($paqueteTuristico,"DNI",27898654,15,true);
// echo $destino;
echo $agencia;

?>