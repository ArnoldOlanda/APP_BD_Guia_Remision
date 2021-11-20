﻿<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Bienvenida GDI</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css\nifty.min.css" rel="stylesheet">
    <link href="css\demo\nifty-demo-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins\pace\pace.min.css" rel="stylesheet">
    <script src="plugins\pace\pace.min.js"></script>
    <link href="css\demo\nifty-demo.min.css" rel="stylesheet">      
</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        <header id="navbar">
            <div id="navbar-container" class="boxed">

                <!--Brand logo & name-->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">
                        <img src="img\logo.png" alt="Nifty Logo" class="brand-icon">
                        <div class="brand-title">
                            <span class="brand-text">GDI</span>
                        </div>
                    </a>
                </div>
                <!--Navbar Dropdown-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <!--Navigation toogle button-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="#">
                                <i class="demo-pli-list-view"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <div class="boxed">

            <div id="content-container">
                <?php include_once ("router.php") ?>
            </div>

            <nav id="mainnav-container">
                <div id="mainnav">
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <!--Profile Widget-->
                                <div id="mainnav-profile" class="mainnav-profile">
                                    <div class="profile-wrap text-center">
                                        <div class="pad-btm">
                                            <img class="img-circle img-md" src="img\profile-photos\11.jpeg" alt="Profile Picture">
                                        </div>
                                        <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
    
                                            <p class="mnp-name">Gabrilel Tuco</p>
                                            <span class="mnp-desc">gabriel.tuco@ucsm.edu.pe</span>
                                        </a>
                                    </div>
                                </div>
                                <!--DASHBOARD-->
                                <ul id="mainnav-menu" class="list-group">
						            <li class="list-header">OPCIONES</li>
									<li>
						                <a href="./?ctrl=guias&acc=insertar">
						                    <i class="demo-pli-receipt-4"></i>
						                    <span class="menu-title">Ingresar Guia</span>
						                </a>
						            </li>
									
						            <li>
						                <a href="./?ctrl=guias&acc=listar">
						                    <i class="demo-pli-file-html"></i>
						                    <span class="menu-title">Consultar Guias</span>
											<i class="arrow"></i>
						                </a>
						                <ul class="collapse">
						                    <li><a href="./?ctrl=guias&acc=listar">Cliente Natural</a></li>
											<li><a href="#">Cliente Juridico</a></li>
											<li><a href="#">Factura</a></li>
											<li><a href="#">Boleta</a></li>
											<li><a href="#">Motivo de traslado</a></li>
											
						                </ul>
						            </li>

						            <li>
						                <a href="#">
						                    <i class="demo-pli-add-user"></i>
						                    <span class="menu-title">Clientes</span>
											<i class="arrow"></i>
						                </a>
						                <ul class="collapse">
						                    <li><a href="./?ctrl=clientes&acc=listar_natural">Natural</a></li>
											<li><a href="./?ctrl=clientes&acc=listar_juridico">Juridico</a></li>											
						                </ul>
						            </li>

									<li>
						                <a href="./?ctrl=productos&acc=listar">
						                    <i class="demo-pli-credit-card-2"></i>
						                    <span class="menu-title">Productos</span>
						                </a>
						            </li>

									<li>
						                <a href="BuscarVehiculos.html">
						                    <i class="demo-pli-map-2"></i>
						                    <span class="menu-title">Vehiculos</span>
						                </a>
						            </li>

									<li>
						                <a href="BuscarConductores.html">
						                    <i class="demo-pli-add-user"></i>
						                    <span class="menu-title">conductores</span>
						                </a>
						            </li>
						            <li class="list-divider"></li>
								</ul>
 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    <script src="js\jquery.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <script src="js\nifty.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
