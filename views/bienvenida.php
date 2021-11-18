<!DOCTYPE html>
<html lang="en">
    <head>
	<? php
         include ("style.css");
	?>
        <meta charset="UTF-8">
        <title>Accusoft admin</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="sidebar">
           <div class="sidebar-brand">
              <a href="IngresarGuia.html" ><span class="lab la-accusoft"><h1>GDI</h1></span> </a>
           </div>

           <div class="sidebar-menu"> 
               <ul>
                <li>
                    <a href="./?ctrl=guias&acc=listar" ><span class="las la-igloo"></span>
                    <span>Ingresar GUia</span></a>
                </li>
                <li>
                    <a href="ConsultarGuias.html" ><span class="las la-users"></span>
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
            <header>
                <h2>
                    BIENVENIDO
                </h2>
                <div class="search-wrapper">
                     <span class="las la-search"></span>
                     <input type="search" placeholder="Search here" />
                </div>
                <div class="user-wrapper">
                     <img src="img/2.jpg" width="30px" height="30px" alt="">
                     <div>
                         <h4>John Doe</h4>
                         <small>Super Admin</small>
                     </div>
                </div>
            </header>

            <main>
                <div>
				<?php include_once ("router.php") ?>
				</div>


                </div>
            </main>
        </div>
        
     </body>
</html>
