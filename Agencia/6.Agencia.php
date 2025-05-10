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
    public function incorporarVenta($paqueteIng,$tipoDocIng,$numDocIng,$cantPerIng,$esOnLineIng){ # $esOnLineIng variable de tipo bool, siendo Ing una abreviacion de ingresado
        // Inicio mi variable retorno como si no se fuera a realizar la venta
        $importeFinal = -1;
        // Obtengo ambas colecciones de ventas y las plazas disponibles del objPaquete que ingresa por parametros
        $ventasRealizadas = $this->getColVentasRealizadasInst();
        $ventasOnlineRealizadas = $this->getColVentasOnLineRealizadasInst();
        $cantPlazasDisponibles = $paqueteIng->getCantDisponiblesPlazasInst();
        // Inicio una variable con la fecha actual (para mi se deberia recibir por parametros)
        $fechaActual = new DateTime();
        $fechaString = $fechaActual->format('Y-m-d');
        // Creo el objPersona con el tipo y numero de dcto ingresado
        $ObjPersona = new Cliente($tipoDocIng,$numDocIng);
        // Analizo si la cantidad de plazas disponibles es mayor o igual a la cantidad de personas ingresadas y si el pago se realiza de manera online
        if ($cantPlazasDisponibles >= $cantPerIng && $esOnLineIng) {
            // Resto y modifico la cantidad de plazas disponibles
            $nuevasPlazas = ($cantPlazasDisponibles-$cantPerIng);
            $paqueteIng->setCantDisponiblesPlazasInst($nuevasPlazas);
            // Creo la venta online y la incorporo a la coleccion de ventas online
            $ventaOnline = new VentaOnLine($fechaString,$paqueteIng,$cantPerIng,$ObjPersona,20);
            array_push($ventasOnlineRealizadas,$ventaOnline);
            $this->setColVentasOnLineRealizadasInst($ventasOnlineRealizadas);
            // Con la venta creada, llamo al metodo que me calcula el importe y se lo asigno a mi variable retorno
            $importeFinal = $ventaOnline->darImporteVenta();
        // Analizo lo mismo en cuento a plazas, pero con la diferencia que si el pago se realiza de forma presencial
        } elseif ($cantPlazasDisponibles >= $cantPerIng && !$esOnLineIng) {
            // Resto y modifico la cantidad de plazas disponibles
            $nuevasPlazas = ($cantPlazasDisponibles-$cantPerIng);
            $paqueteIng->setCantDisponiblesPlazasInst($nuevasPlazas);
            // Creo la venta online y la incorporo a la coleccion de ventas online
            $venta = new venta($fechaString,$paqueteIng,$cantPerIng,$ObjPersona);
            array_push($ventasRealizadas,$venta);
            $this->setColVentasRealizadasInst($ventasRealizadas);
            // Con la venta creada, llamo al metodo que me calcula el importe y se lo asigno a mi variable retorno
            $importeFinal = $venta->darImporteVenta();
        }
        // Retorno el importe final, como aclara el enunciado
        return $importeFinal;
    }
    // Metodo informarPaquetesTuristicos(fecha,destino)
    //  retorna una colección con todos los paquetes que se realizan en una fecha y a un destino
    public function informarPaquetesTuristicos($fechaIng,$destinoIng){ # Siendo ing una abreviacion de ingresado
        // Obtengo el lugar del destino ingresado
        $lugarDestinoIng = $destinoIng->getLugarInst();
        // Inicializo mi coleccion de retorno como vacia
        $paquetesObtenidos = [];
        // Obtengo la coleccion de paquetes
        $paquetes = $this->getColPaquetesInst();
        // Recorro toda la coleccion de paquetes y guardo cada uno en paquete
        foreach ($paquetes as $unPaquete) {
            // Obtengo la fecha, el destino y el lugar del destino
            $fechaPaqueteObt = $unPaquete->getFechaInst(); # Siendo Obt una abreviacion de obtenido
            $destinoPaqueteObt = $unPaquete->getRefDestinoInst();
            $lugarDestinoObt = $destinoPaqueteObt->getLugarInst();
            // Comparo todo lo obtenido con lo ingresado 
            if ($fechaIng == $fechaPaqueteObt && $lugarDestinoIng == $lugarDestinoObt){
                // Si se encuentran paquetes, los pusheo a la varibale creada anteriormente
                array_push($paquetesObtenidos,$unPaquete);
            }
        }
        // Retorno la coleccion de paquetes, como null o con contenido dentro
        return $paquetesObtenidos;
    }
    // Metodo paqueteMasEcomomico(fecha,destino)
    // retorna el paquete turístico mas económico para una fecha y un destino.
    public function paqueteMasEcomomico($fecha,$destino){
        # Continuar por aca 
    }
}
?>