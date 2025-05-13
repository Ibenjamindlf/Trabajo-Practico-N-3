<?php
class ProductoImportado extends Producto{
    // Zona de atributos 
    private $porIncrementoInst; # Siendo inst una abreviacion de instancia
    private $porImpuestoInst;
    // Zona de metodos 
    // Metodo constructor
    public function __construct($incremento,$impuesto,$codigoBarra,$descripcion,$stock,$porcIva,$precioCompra,$objRubro) {
        $this->porIncrementoInst = $incremento;
        $this->porImpuestoInst = $impuesto;
        parent ::__construct($codigoBarra,$descripcion,$stock,$porcIva,$precioCompra,$objRubro);
    }
    // Metodo de acceso (get's)
    public function getporIncrementoInst(){
        return $this->porIncrementoInst;
    }
    public function getporImpuestoInst(){
        return $this->porImpuestoInst;
    }
    // Metodo de modificacion (set's)
    public function setporIncrementoInst($nuevoIncremento){
        $this->porIncrementoInst = $nuevoIncremento;
    }
    public function setporImpuestoInst($nuevoImpuesto){
        $this->porImpuestoInst = $nuevoImpuesto;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("\n----Producto----\n");
        $cadena .= parent::__toString();
        $cadena .= ("\nIncremento importado: " . $this->getporIncrementoInst());
        $cadena .= ("\nImpuesto de importacion: " . $this->getporImpuestoInst());
        return $cadena;
    }
    // Metodo darPrecioVenta() redefinido
    public function darPrecioVenta(){
        $precioVenta = parent::darPrecioVenta();
        $porcIncremento = $this->getporIncrementoInst();
        $porcImpuesto = $this->getporImpuestoInst();

        $imp = ($precioVenta * ($porcImpuesto/100));
        $inc = ($precioVenta * ($porcIncremento/100));
        $precioFinal = ($precioVenta + $imp + $inc);

        return $precioFinal;
    }
}
?>