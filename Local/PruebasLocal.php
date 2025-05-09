<?php
include_once 'Producto.php';
include_once 'ProductoRegional.php';
include_once 'ProductoImportado.php';
include_once 'Rubro.php';
include_once 'Venta.php';
include_once 'Local.php';

$rubro1 = new Rubro("Bienestar Personal",15);
$rubro2 = new Rubro("Fitness",25);

$producto1 = new ProductoRegional(5,7791234567890,"Despierta Zen (Infusion)",30,15,500,$rubro1);
$producto2 = new ProductoRegional(6,7799876543210,"Respira Claro (Spray)",90,8,600,$rubro1);
$producto3 = new ProductoRegional(7,8509876543212,"PowerGrip Max (Guantes)",200,16,125,$rubro2);
$producto4 = new ProductoRegional(10,4009876543219,"CoreMat Elite (Colchoneta)",40,7,300,$rubro2);

$producto5 = new ProductoImportado(15,30,4001234567897,"Pulso Sereno (Pulsera)",45,10,250,$rubro2);
$producto6 = new ProductoImportado(10,12,8411234567895,"Noche Profunda (Suplemento)",100,5,800,$rubro1);
$producto7 = new ProductoImportado(5,20,7794567891234,"FlexBand Pro (Bandas)",500,6,450,$rubro2);
$producto8 = new ProductoImportado(20,15,7791122334455,"HydroJug Sport (Botella)",80,7,900,$rubro2);

$venta1 = new Venta("7/5/2025",[$producto1,$producto2,$producto3,$producto4],"Juan Perez");
$precioTotalVenta1 = $venta1->calcularImporteFinal();
// echo $precioTotalVenta1;

$venta2 = new Venta("5/7/2025",[$producto5,$producto6,$producto7,$producto8],"Pedro Alcachofa");
$precioTotalVenta2 = $venta2->calcularImporteFinal();
// echo ("\n" . $precioTotalVenta2);

$local = new Local([$producto1,$producto3,$producto7]);
$productoX = new ProductoRegional(6,7799876543210,"Respira Claro (Spray)",90,8,600,$rubro1);
$pruebaMetodo = $local->incorporarProductoLocal($productoX);
if ($pruebaMetodo){
    echo "ok";
} else{
    echo "F";
}
?>