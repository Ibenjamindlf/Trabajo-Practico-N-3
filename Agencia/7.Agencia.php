<?php
class Agencia{
    // Zona de atributos
    private $colPaquetesInst; # Siendo inst una abreviacion de instancia
    private $colVentasRealizadasInst; 
    private $colVentasOnLineRealizadasInst;
    // Zona de metodos 
    // Metodo constructor (__construct)
    public function __construct($colPaquetes,$colVentasRealizadas,$colVentasOnLineRealizadas) {
        $this->colPaquetesInst = $colPaquetes;
        $this->colVentasRealizadasInst = $colVentasRealizadas;
        $this->colVentasOnLineRealizadasInst = $colVentasOnLineRealizadas;
    }
    // Metodos de acceso (get's)
    public function getColPaquetesInst(){
        return $this->colPaquetesInst;
    }
    public function getColVentasRealizadasInst(){
        return $this->colVentasRealizadasInst;
    }
    public function getColVentasOnLineRealizadasInst(){
        return $this->colVentasOnLineRealizadasInst;
    }
    // Metodos de modificacion (set's)
    public function setColPaquetesInst($nuevaColPaq){
        $this->colPaquetesInst = $nuevaColPaq;
    }
    public function setColVentasRealizadasInst($nuevaColVentas){
        $this->colVentasRealizadasInst = $nuevaColVentas;
    }
    public function setColVentasOnLineRealizadasInst($nuevaColVentasOnLine){
        $this->colVentasOnLineRealizadasInst = $nuevaColVentasOnLine;
    }
    // Metodo de caracteres ()
    public function __toString()
    {
        $paquetes = $this->getColPaquetesInst(); # Obtengo 
        $cadenaPaquetes = ""; # Inicio la cadena en vacio
        foreach ($paquetes as $paquete) { # Recorro la coleccion obtenida y voy guardando 
            $cadenaPaquetes .= $paquete . "\n"; # Pegamos las cuentas
            }

        $ventasRealizadas = $this->getColVentasRealizadasInst(); # Obtengo 
        $cadenaVentasRealizadas = ""; # Inicio la cadena en vacio
        foreach ($ventasRealizadas as $ventaRealizada) { # Recorro la coleccion obtenida y voy guardando 
            $cadenaVentasRealizadas .= $ventaRealizada . "\n"; # Pegamos las cuentas
            }

        $ventasOnLineRealizadas = $this->getColVentasOnLineRealizadasInst(); # Obtengo 
        $cadenaVentasOnLineRealizadas = ""; # Inicio la cadena en vacio
        foreach ($ventasOnLineRealizadas as $ventaOnLineRealizada) { # Recorro la coleccion obtenida y voy guardando 
            $cadenaVentasOnLineRealizadas .= $ventaOnLineRealizada . "\n"; # Pegamos las cuentas
            }

        $cadena = ("Coleccion de paquetes: " . $cadenaPaquetes . "\n");
        $cadena .= ("Coleccion de ventas realizadas: " . $cadenaVentasRealizadas . "\n");
        $cadena .= ("Coleccion de ventas on-line realizadas: " . $cadenaVentasOnLineRealizadas . "\n");
        
        return $cadena;
    }
    // Metodo incorporarPaquete(objPaqueteTuristico)
    // Incorpora a la colección de paquetes turísticos un nuevo paquete a la agencia 
    // siempre y cuando no haya un paquete en la misma fecha al mismo destino. 
    // Si el paquete pudo ser ingresado el método debe retornar true y false en caso contrario.
    public function  incorporarPaquete($paqueteTuristicoIng){ #Siendo ing una abreviacion de ingresado
        $seIngreso = false;

        $paquetes = $this->getColPaquetesInst();
        $cantPaquetes = count($paquetes);
        $i=0;
        while (!$seIngreso && $i<$cantPaquetes){
            $unPaquete = $paquetes[$i];

            $fechaPaqueteOrg = $unPaquete->getFechaInst();
            $destinoPaqueteOrg = $unPaquete->getRefDestinoInst();
            $idDestinoPaqueteOrg = $destinoPaqueteOrg->getIdentificacionInst();

            $fechaPaqueteIng = $paqueteTuristicoIng->getFechaInst();
            $destinoPaqueteIng = $paqueteTuristicoIng->getRefDestinoInst();
            $idDestinoPaqueteIng = $destinoPaqueteIng->getIdentificacionInst();

            if ($fechaPaqueteOrg == $fechaPaqueteIng && $idDestinoPaqueteIng == $idDestinoPaqueteOrg){
                $seIngreso = true;
            }
            $i++;
        }

        if (!$seIngreso){
            array_push($paquetes,$paqueteTuristicoIng);
            $this->setColPaquetesInst($paquetes);
        }
        return (!$seIngreso);
    }
    // Metodo incorporarVenta(objPaquete,tipoDoc,numDoc,cantPer, esOnLine)
    //  recibe por parámetro el paquete, tipo documento, número de documento, la cantidad de personas que van a realizar el paquete turístico y si se trata o no de una venta on-line (valor true o false). 
    // El método retorna el importe final que debe ser abanado en caso que la venta pudo concretarse con éxito y -1 en caso contrario.
    public function incorporarVenta($paqueteIng,$tipoDoc,$numDoc,$cantPer,$esOnLine){ # $esOnLine variable de tipo bool 
        $importeFinal = -1;

        $ventasRealizadas = $this->getColVentasRealizadasInst();
        $ventasOnLineRealizadas = $this->getColVentasOnLineRealizadasInst();
        $todasLasVentas = array_merge($ventasRealizadas,$ventasOnLineRealizadas);

        
    }
}
?>