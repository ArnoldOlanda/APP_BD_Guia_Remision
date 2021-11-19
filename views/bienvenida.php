<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Agrosur | Molipesa</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="sidebar">
           <div class="sidebar-brand">
              <a href="./?ctrl=paginas&acc=inicio" ><span class="lab la-accusoft"><h1>G	DI</h1></span> </a>
           </div>

           <div class="sidebar-menu"> 
			<?PHP  
			if(isset($_GET["ctrl"]) && isset($_GET["acc"])){
				$flag=$_GET["ctrl"].$_GET["acc"];
			}
			else
				$flag=" ";
			?>
               <ul>
                <li>
						
                    <a href="./?ctrl=guias&acc=insertar" <?PHP if($flag=="guiasinsertar") echo "class='active'"?>><span class="las la-igloo"></span>
                    <span>Ingresar Guia</span></a>
                </li>
                <li>
                    <a href="./?ctrl=guias&acc=listar" <?PHP if($flag=="guiaslistar") echo "class='active'"?>><span class="las la-users"></span>
                    <span>Consultar Guia</span></a>
                </li>
                <li>
                    <a href="./?ctrl=clientes&acc=listar" <?PHP if($flag=="clienteslistar") echo "class='active'"?>><span class="las la-clipboard-list"></span>
                    <span>Clientes</span></a>
                </li>
                <li>
                    <a href="./?ctrl=productos&acc=listar" <?PHP if($flag=="productoslistar") echo "class='active'"?>><span class="las la-shopping-bag"></span>
                    <span>Productos</span></a>
                </li>
                <li>
                    <a href="./?ctrl=vehiculos&acc=listar" <?PHP if($flag=="vehiculoslistar") echo "class='active'"?>><span class="las la-receipt"></span>
                    <span>Vehiculos</span></a>
                </li>
                <li>
                    <a href="./?ctrl=conductores&acc=listar" <?PHP if($flag=="conductoreslistar") echo "class='active'"?>><span class="las la-user-circle"></span>
                    <span>Conductores</span></a>
                </li>
				
				

               </ul>
			

           </div>
        </div>
        <div class="main-content">
			<header>
                <h1>
                    <?php //ECHO ucfirst($_GET["ctrl"])?>
                </h1>
            </header>
            <main>
                <div>
				<?php include_once ("router.php") ?>
				</div>	
            </main>
        </div>
        
     </body>
</html>
