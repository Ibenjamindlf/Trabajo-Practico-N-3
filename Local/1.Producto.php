<?php
class Producto{
    // Zona de atributos
    private $codigoBarraInst; # Siendo inst una abreviacion de instancia
    private $descripcionInst; 
    private $stockInst;
    private $porcIvaInst;
    private $precioCompraInst;
    private $refRubroInst; # Referencia a otra class
    // Zona de metodos
    // Metodo constructor
    public function __construct($codigoBarra,$descripcion,$stock,$porcIva,$precioCompra,$objRubro) {
        $this->codigoBarraInst = $codigoBarra;
        $this->descripcionInst = $descripcion;
        $this->stockInst = $stock;
        $this->porcIvaInst = $porcIva;
        $this->precioCompraInst = $precioCompra;
        $this->refRubroInst = $objRubro;
    }
    // Metodo de acceso (get's)
    public function getCodigoBarraInst(){
        return $this->codigoBarraInst;
    }
    public function getDescripcionInst(){
        return $this->descripcionInst;
    }
    public function getStockInst(){
        return $this->stockInst;
    }
    public function getPorcIvaInst(){
        return $this->porcIvaInst; 
    }
    public function getPrecioCompraInst(){
        return $this->precioCompraInst;
    }
    public function getRefRubroInst(){
        return $this->refRubroInst;
    }
    // Metodo de modificacion (set's)
    public function setCodigoBarraInst($nuevoCodigo){
        $this->codigoBarraInst = $nuevoCodigo;
    }
    public function setDescripcionInst($nuevaDescripcion){
        $this->descripcionInst = $nuevaDescripcion;
    }
    public function setStockInst($nuevoStock){
        $this->stockInst = $nuevoStock;
    }
    public function setPorcIvaInst($nuevoPorcentaje){
        $this->porcIvaInst = $nuevoPorcentaje; 
    }
    public function setPrecioCompraInst($nuevoPrecio){
        $this->precioCompraInst = $nuevoPrecio;
    }
    public function setRefRubroInst($nuevoRubro){
        $this->refRubroInst = $nuevoRubro;
    }
    // Metodo de caracteres (__toString)
    public function __toString()
    {
        $cadena = ("Codigo de barras: " . $this->getCodigoBarraInst() . "\n");
        $cadena .= ("Descripcion: " . $this->getDescripcionInst() . "\n");
        $cadena .= ("Stock : " . $this->getStockInst() . "\n");
        $cadena .= ("Porcentaje Iva: " . $this->getPorcIvaInst() . "\n");
        $cadena .= ("Precio Compra: " . $this->getPrecioCompraInst() . "\n");
        $cadena .= ("----Rubro----" . "\n" . $this->getRefRubroInst() . "\n");
        return $cadena;
    }
    // Metodo darPrecioVenta()
    public function darPrecioVenta(){
        $porcIVA = $this->getPorcIvaInst();
        $precioCompra = $this->getPrecioCompraInst();
        $refRubro = $this->getRefRubroInst();
        $porGananciaRubro = $refRubro->getPorcGanancia();

        $ganancia = ($precioCompra*($porGananciaRubro/100));
        $precioConGanancia = ($precioCompra+$ganancia);
        $iva = ($precioConGanancia*($porcIVA/100));
        $precioVenta = ($precioConGanancia + $iva);

        return $precioVenta;
    }
}
?>