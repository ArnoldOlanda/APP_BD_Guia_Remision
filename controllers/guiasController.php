<?php
    require_once('./models/GuiaDeRemisionModel.php');
    require_once('./models/Cliente_NaturalModel.php');
    require_once('./models/ClienteJuridicoModel.php');
    require_once('./models/MotivoTrasladoModel.php');
    require_once('./models/DireccionesModel.php');
    require_once('./models/VehiculoModel.php');
    require_once('./models/TransportistaModel.php');
    require_once('./models/ProductoModel.php');
    require_once('./models/EmpresaTransportistaModel.php');
    require_once('./models/TipoComprobanteModel.php');

    class GuiasController
    {
        public function listar()
        {
            $data=[];
            $guia=new Guia_remision();
            if($_GET){

                $clienteNatural=new Cliente_NaturalModel();
                $clienteJuridico=new Cliente_Juridico();
                
                $data=$guia->getAllGuias();
                $dataClienteNatural=$clienteNatural->get_Clientes_Naturales();
                $dataClienteJuridico=$clienteJuridico->get_ListaCliente_Juridico();

                foreach ($dataClienteNatural as $value) {
                    $dataCliente[]=[$value['dni'],$value['nombres']];
                }
                foreach ($dataClienteJuridico as $value) {
                    $dataCliente[]=[$value['ruc'],$value['nombre_empresa']];
                }
            }
            require_once('./views/Guia/mostrar_guia.php');
        }
        public function listarBoleta()
        {
            $data=[];
            if($_GET){
                $guia=new Guia_remision();
                $clienteNatural=new Cliente_NaturalModel();
                $data=$guia->getGuiasBoleta();
                $dataClienteNatural=$clienteNatural->get_Clientes_Naturales();

                foreach ($dataClienteNatural as $value) {
                    $dataCliente[]=[$value['dni'],$value['apellidos']." ".$value['nombres']];
                }
                
            }
            require_once('./views/Guia/GuiaBoleta.php');
        }
        public function listarFactura()
        {
            $data=[];
            if($_GET){
                $guia=new Guia_remision();
                $clienteJuridico=new Cliente_Juridico();

                $data=$guia->getGuiasFactura();
                $dataClienteJuridico=$clienteJuridico->get_ListaCliente_Juridico();

                foreach ($dataClienteJuridico as $value) {
                    $dataCliente[]=[$value['ruc'],$value['nombre_empresa']];
                }
            }
            require_once('./views/Guia/GuiaFactura.php');
        }
        public function detalle(){
            if($_GET){
                $guia=new Guia_remision();
                $nroGuia=$_GET['nro'];

                $result=$guia->get_guiaRemisionNroGuia($nroGuia);
            }
            require_once('./views/Guia/detalle.php');
        }
        public function insertar()
        {   
            $mainData=[];
            if($_GET){
                $direccion=new DireccionesModel();
                $motivoTraslado= new MotivoTrasladoModel();
                $clienteNatural=new Cliente_NaturalModel();
                $clienteJuridico=new Cliente_Juridico();
                $vehiculo=new VehiculoModel();
                $conductor=new TransportistaModel();
                $producto=new ProductoModel();
                $empresaTransportista=new EmpresaTransportistaModel();
                $tipoComprobante=new TipoComprobanteModel();

                $mainData[]=$direccion->getAllDirecciones();
                $dataClienteNatural=$clienteNatural->get_Clientes_Naturales();
                $dataClienteJuridico=$clienteJuridico->get_ListaCliente_Juridico();
                foreach ($dataClienteNatural as $value) {
                    $dataCliente[]=[$value['dni'],$value['apellidos']." ".$value['nombres']];
                }
                foreach ($dataClienteJuridico as $value) {
                    $dataCliente[]=[$value['ruc'],$value['nombre_empresa']];
                }
                $mainData[]=$dataCliente;
                $mainData[]=$vehiculo->get_Lista_vehiculos();
                $mainData[]=$conductor->getAllTransportistas();
                $mainData[]=$producto->get_Lista_Productos();
                $mainData[]=$empresaTransportista->getAllEmpresaTransportista();
                $mainData[]=$tipoComprobante->getAllTipoComprobante();
                $mainData[]=$motivoTraslado->getAllMotivosTraslado();
            }
            require_once('./views/Guia/ingresarGuia.php');
        }
        public function registrar(){
            if($_POST){
                $nroGuia=$_POST['nroGuia'];
                $fechaEmision=explode('-',$_POST['fechaEmision']);
                $fe_anio=$fechaEmision[0];
                $fe_mes=$fechaEmision[1];
                $fe_dia=$fechaEmision[2];

                $fechaTraslado=explode('-',$_POST['fechaTraslado']);
                $ft_anio=$fechaTraslado[0];
                $ft_mes=$fechaTraslado[1];
                $ft_dia=$fechaTraslado[2];

                $puntoPartida=$_POST['puntoPartida'];
                $puntoLlegada=$_POST['puntoLlegada'];
                $destinatario=$_POST['destinatario'];
                $placa=explode('_',$_POST['placa'])[0];

                $licenciaConducir=$_POST['nombreChofer'];
                $nroFilas=$_POST['totalFilasDetalle'];
                $dataProductos=[];
                for ($i=1; $i <= $nroFilas; $i++) { 
                    $dataProductos[]=[explode('_',$_POST['producto'.$i])[0],$_POST['cantidad'.$i],$_POST['peso'.$i]];
                }
                $nombreTransportista=$_POST['nombreTransportista'];
                $tipoComprobante=$_POST['tipoComprobante'];
                $nroComprobante=$_POST['nroComprobante'];
                $motivoTraslado=$_POST['motivoTraslado'];
                $firmaResponsable=$_POST['firmaResponsable'];
                $firmaCliente=$_POST['firmaCliente'];
                if($_POST['nombreConfCliente']=="") $nombreConfCliente=0;
                else $nombreConfCliente=1;
                
                $guia=new Guia_remision();
                $guia->ingresarGuia($nroGuia,$fe_anio,$fe_dia,$fe_mes,$ft_anio,$ft_dia,$ft_mes,$puntoPartida,$puntoLlegada,$licenciaConducir,
                $placa,$nombreTransportista,$tipoComprobante,$motivoTraslado,$firmaResponsable,$firmaCliente,$nombreConfCliente,
                $nroComprobante,$nroComprobante,$destinatario,$destinatario,$dataProductos);


                header('Location:./?ctrl=guias&acc=listar');
            }
            //require_once('./views/Guia/ingresarGuia.php');
        }
        public function filtrar()
        {
            if($_POST){
                $filtroNroGuia=$_POST['fNroGuia'];
                $filtroFecha=$_POST['fFecha'];
                if(isset($_POST['fCliente'])){
                    $filtroCliente=$_POST['fCliente'];
                }else{
                    $filtroCliente="";
                }
                

                $guia=new Guia_remision();
                $clienteNatural=new Cliente_NaturalModel();
                $clienteJuridico=new Cliente_Juridico();
                if($filtroNroGuia!="" && $filtroFecha=="" && $filtroCliente==""){
                    $data=$guia->getGuiaFiltroNroGuia($filtroNroGuia);

                }else if($filtroNroGuia=="" && $filtroFecha!="" && $filtroCliente==""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasFiltroFecha($fechaArray[1],$fechaArray[0]);

                }else if($filtroNroGuia=="" && $filtroFecha=="" && $filtroCliente!=""){
                    if(strlen($filtroCliente)<9){
                        $data=$guia->getGuiasFiltroClienteNatural($filtroCliente);
                    }else{
                        $data=$guia->getGuiasFiltroClienteJuridico($filtroCliente);
                    }
                }else if($filtroNroGuia=="" && $filtroFecha!="" && $filtroCliente!=""){
                    $fechaArray=explode('-',$filtroFecha);
                    if(strlen($filtroCliente)<9){
                        $data=$guia->getGuiasFiltroFechaClienteNatural($fechaArray[1],$fechaArray[0],$filtroCliente);
                    }else{
                        $data=$guia->getGuiasFiltroFechaClienteJuridico($fechaArray[1],$fechaArray[0],$filtroCliente);
                    }
                }
                
                $dataClienteNatural=$clienteNatural->get_Clientes_Naturales();
                $dataClienteJuridico=$clienteJuridico->get_ListaCliente_Juridico();
                foreach ($dataClienteNatural as $value) {
                    $dataCliente[]=[$value['dni'],$value['apellidos']." ".$value['nombres']];
                }
                foreach ($dataClienteJuridico as $value) {
                    $dataCliente[]=[$value['ruc'],$value['nombre_empresa']];
                }
            }
            require_once('./views/Guia/mostrar_guia.php');
        }
        public function facturaFiltrar()
        {
            if($_POST){
                $filtroNroFactura=$_POST['fNroFactura'];
                $filtroFecha=$_POST['fFecha'];
                if(isset($_POST['fCliente'])){
                    $filtroCliente=$_POST['fCliente'];
                }else{
                    $filtroCliente="";
                }
                

                $guia=new Guia_remision();
                $clienteJuridico=new Cliente_Juridico();

                if($filtroNroFactura!="" && $filtroFecha=="" && $filtroCliente==""){
                    $data=$guia->getGuiaFacturaFiltroNroFactura($filtroNroFactura);

                }else if($filtroNroFactura=="" && $filtroFecha!="" && $filtroCliente==""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasFacturaFiltroFecha($fechaArray[1],$fechaArray[0]);

                }else if($filtroNroFactura=="" && $filtroFecha=="" && $filtroCliente!=""){
                    $data=$guia->getGuiasFacturaFiltroCliente($filtroCliente);

                }else if($filtroNroFactura=="" && $filtroFecha!="" && $filtroCliente!=""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasFacturaFiltroFechaCliente($fechaArray[1],$fechaArray[0],$filtroCliente);
                }
                
                $dataClienteJuridico=$clienteJuridico->get_ListaCliente_Juridico();
                foreach ($dataClienteJuridico as $value) {
                    $dataCliente[]=[$value['ruc'],$value['nombre_empresa']];
                }
            }
            require_once('./views/Guia/GuiaFactura.php');
        }
        public function boletaFiltrar()
        {
            if($_POST){
                $filtroNroBoleta=$_POST['fNroBoleta'];
                $filtroFecha=$_POST['fFecha'];
                if(isset($_POST['fCliente'])){
                    $filtroCliente=$_POST['fCliente'];
                }else{
                    $filtroCliente="";
                }
                

                $guia=new Guia_remision();
                $clienteNatural=new Cliente_NaturalModel();

                if($filtroNroBoleta!="" && $filtroFecha=="" && $filtroCliente==""){
                    $data=$guia->getGuiaBoletaFiltroNroBoleta($filtroNroBoleta);

                }else if($filtroNroBoleta=="" && $filtroFecha!="" && $filtroCliente==""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasBoletaFiltroFecha($fechaArray[1],$fechaArray[0]);

                }else if($filtroNroBoleta=="" && $filtroFecha=="" && $filtroCliente!=""){
                    $data=$guia->getGuiasBoletaFiltroCliente($filtroCliente);

                }else if($filtroNroBoleta=="" && $filtroFecha!="" && $filtroCliente!=""){
                    $fechaArray=explode('-',$filtroFecha);
                    $data=$guia->getGuiasBoletaFiltroFechaCliente($fechaArray[1],$fechaArray[0],$filtroCliente);
                }
                $dataCliente=[];
                $dataClienteNatural=$clienteNatural->get_Clientes_Naturales();
                foreach ($dataClienteNatural as $value) {
                    $dataCliente[]=[$value['dni'],$value['apellidos']." ".$value['nombres']];
                }
            }
            require_once('./views/Guia/GuiaBoleta.php');
        }
    }
?>
