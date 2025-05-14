<?php
class VentaOnLine extends Venta{
    // Zona de atributos
    private $porDctoInst; # Siendo inst una abreviacion de instancia
    // Zona de metodos
    // Metodo constructor (__construct)
    public function __construct($fecha,$objPaquete,$cantPersonas,$objCliente) {
        parent ::__construct($fecha,$objPaquete,$cantPersonas,$objCliente);
        $this->porDctoInst = (0.2); // Valor por defecto 20%
    }
    // Metodo de acceso (get's)
    public function getPorDctoInst(){
        return $this->porDctoInst;
    }
    // Metodo de modificacion (set's)
    public function setPorDctoInst($nuevoPorDcto){
        $this->porDctoInst = $nuevoPorDcto;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("\n----Producto----\n");
        $cadena .= parent::__toString();
        $cadena .= ("Porcentaje de descuento: " . $this->getPorDctoInst(). "\n");
        return $cadena;
    }

    // Metodo darImporteVenta() redefinido
    // Retorna el valor que debe ser abonado por el cliente
    public function darImporteVenta(){
        // $precioVenta = parent::calcularPrecioVenta();
        $importeVentaSinDcto = parent::darImporteVenta();
        $porDcto = $this->getPorDctoInst();
        $importeVentaConDcto = ($importeVentaSinDcto-($importeVentaSinDcto*$porDcto));

        return $importeVentaConDcto;
    }
}
?>