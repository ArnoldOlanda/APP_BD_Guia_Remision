<?php
    require_once("../dbConnection.php");

    function getDireccionesClienteJuridicoRUC($RUCD)
		{
            $db=BD::crearInstancia();
			$result=[];
			$resultado = $db->prepare("call sp_lista_direccion_cliente_juridico_ruc(?);");
			$resultado->execute([$RUCD]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
            //$db->closeCursor();
			return $result;
		}
	function getDireccionesClienteNaturalDni($dni){
            $db=BD::crearInstancia();
			$result=[];
			$resultado = $db->prepare("call sp_buscar_direccion_cliente_natural_dni(?);");
			$resultado->execute([$dni]);
			while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) 
			{
				$result[] = $row;
			}
            //$db->closeCursor();
			return $result;
            
		}

    if($_POST){
        $rucOrDni=$_POST['destinatario'];
        if(strlen($rucOrDni)<9){
            $data=getDireccionesClienteNaturalDni($rucOrDni);
        }else{
            $data=getDireccionesClienteJuridicoRUC($rucOrDni);
        }
        echo json_encode($data);
        
    }
