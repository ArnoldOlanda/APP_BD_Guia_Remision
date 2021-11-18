<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Accusoft admin</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="sidebar">
           <div class="sidebar-brand">
              <a href="./?ctrl=paginas&acc=inicio" ><span class="lab la-accusoft"><h1>GDI</h1></span> </a>
           </div>

           <div class="sidebar-menu"> 
               <ul>
                <li>
                    <a href="./?ctrl=guias&acc=insertar" ><span class="las la-igloo"></span>
                    <span>Ingresar GUia</span></a>
                </li>
                <li>
                    <a href="./?ctrl=guias&acc=listar" ><span class="las la-users"></span>
                    <span>Consultar Guia</span></a>
                </li>
                <li>
                    <a href="Clientes.html"><span class="las la-clipboard-list"></span>
                    <span>Clientes</span></a>
                </li>
                <li>
                    <a href="Productos.html"><span class="las la-shopping-bag"></span>
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
                        <main>
                <div>
				<?php include_once ("router.php") ?>
				</div>


                </div>
            </main>
        </div>
        
     </body>
</html>
