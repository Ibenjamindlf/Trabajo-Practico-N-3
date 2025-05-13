<?php
include_once '1.Producto.php';
include_once '2.ProductoImportado.php';
include_once '3.ProductoRegional.php';
include_once '4.Rubro.php';
include_once '5.Venta.php';
include_once '6.Local.php';
// Se crean 2 rubros: conservas con un 35 % de ganancia, regalos con un 55 % de ganancia.
$rubro1 = new Rubro("Conservas",35);
$rubro2 = new Rubro("Regalos",55);
// Se crean 4 instancias de la clase Producto y se vinculan a los rubros creados en el inciso anterior.
$producto1 = new Producto("779001","Lata de duraznos en almíbar",120,21,250,$rubro1);
$producto2 = new Producto("779002", "Frasco de pickles surtidos", 80, 21, 310, $rubro1);
$producto3 = new Producto("880001", "Caja de bombones artesanales", 50, 10, 850, $rubro2);
$producto4 = new Producto("880002", "Vela aromática decorativa", 70, 15, 430, $rubro2);
// Se incorpora cada instancia de la clase Producto a la Tienda.
$local = new Local([]);
$local->incorporarProductoLocal($producto1);
$local->incorporarProductoLocal($producto2);
$local->incorporarProductoLocal($producto3);
$local->incorporarProductoLocal($producto4);
// Se incorpora nuevamente la última instancia de producto incorporada a la tienda y visualizar el resultado.
$local->incorporarProductoLocal($producto4);
echo $local;
// Se retorna el precio de venta de cada uno de los productos creados.
$precioVenta1 = $producto1->darPrecioVenta();
$precioVenta2 = $producto2->darPrecioVenta();
$precioVenta3 = $producto3->darPrecioVenta();
$precioVenta4 = $producto4->darPrecioVenta();
// Se retorna el costo en productos que tiene hasta el momento la tienda.
$costoProductosLocal = $local->retornarCostoProductoLocal();
echo $costoProductosLocal;
?>