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
               <ul>
                <li>
                    <a href="./?ctrl=guias&acc=insertar" <?PHP if($_GET["ctrl"]=='guias' && $_GET["acc"]=='insertar') echo "class='active'"?>><span class="las la-igloo"></span>
                    <span>Ingresar Guia</span></a>
                </li>
                <li>
                    <a href="./?ctrl=guias&acc=listar" <?PHP if($_GET["ctrl"]=='guias' && $_GET["acc"]=='listar') echo "class='active'"?>><span class="las la-users"></span>
                    <span>Consultar Guia</span></a>
                </li>
                <li>
                    <a href="./?ctrl=clientes&acc=listar" <?PHP if($_GET["ctrl"]=='clientes' && $_GET["acc"]=='listar') echo "class='active'"?>><span class="las la-clipboard-list"></span>
                    <span>Clientes</span></a>
                </li>
                <li>
                    <a href="./?ctrl=productos&acc=listar" <?PHP if($_GET["ctrl"]=='productos' && $_GET["acc"]=='listar') echo "class='active'"?>><span class="las la-shopping-bag"></span>
                    <span>Productos</span></a>
                </li>
                <li>
                    <a href="Vehiculos.html"><span class="las la-receipt"></span>
                    <span>Vehiculos</span></a>
                </li>
                <li>
                    <a href="Conductores.html"><span class="las la-user-circle"></span>
                    <span>Conductores</span></a>
                </li>
               </ul>


           </div>
        </div>
        <div class="main-content">
			<header>
                <h1>
                    <?php ECHO ucfirst($_GET["ctrl"])?>
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
