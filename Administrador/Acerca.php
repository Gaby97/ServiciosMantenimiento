<?php
	session_start();
	$idPersona = $_SESSION["id_persona"];
	require("../Config.php");
	$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
	if ($mysqli->connect_error) { 
		printf("Conexión fallida: %s\n", $mysqli->connect_error);
		exit();
	}
	else 
	{	
		//USUARIOS ACTIVOS
		$consulta = "SELECT COUNT(id_persona) AS Activos FROM PERSONA WHERE login_activo = 1";
		if($result = $mysqli->query($consulta)){
			while ($p = $result -> fetch_assoc()) {
				$Activos = $p['Activos'];
			}
			$result->free();
		}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>SimpleAdmin - Responsive Admin Dashboard Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="shortcut icon" href="../assets/images/favicon.ico">
	<link rel="stylesheet" href="../assets/plugins/switchery/switchery.min.css">

	<!--Morris Chart CSS -->
	<link rel="stylesheet" href="../assets/plugins/morris/morris.css">

	<!-- Bootstrap core CSS -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- MetisMenu CSS -->
	<link href="../assets/css/metisMenu.min.css" rel="stylesheet">
	<!-- Icons CSS -->
	<link href="../assets/css/icons.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="../assets/css/style.css" rel="stylesheet">

</head>


<body>

	<div id="page-wrapper">

		<!-- Top Bar Start -->
		<div class="topbar">

			<!-- LOGO -->
			<div class="topbar-left">
				<div class="">
					<a href="index.html" class="logo">
                            <img src="../assets/images/logo.png" alt="logo" class="logo-lg" style="width:120;height:75px;" />
                            <img src="../assets/images/logo_sm.png" alt="logo" class="logo-sm hidden" style="width:270px;height:150px;" />
                        </a>
				</div>
			</div>

			<!-- Top navbar -->
			<div class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="">

						<!-- Mobile menu button -->
						<div class="pull-left">
							<button type="button" class="button-menu-mobile visible-xs visible-sm">
                                    <i class="fa fa-bars"></i>
                                </button>
							<span class="clearfix"></span>
						</div>

						<!-- Top nav left menu -->
						<ul class="nav navbar-nav hidden-sm hidden-xs top-navbar-items">
							<li><a href="#">Acerca de</a></li>
							<li><a href="#">Ayuda</a></li>
							<li><a href="#">Contacto</a></li>
						</ul>
						
					
						
						

						<!-- Top nav Right menu -->
						<ul class="nav navbar-nav navbar-right top-navbar-items-right pull-right">
							<li class="hidden-xs">
								<form role="search" class="navbar-left app-search pull-left">
									<input type="text" placeholder="Buscar..." class="form-control">
									<a href=""><i class="fa fa-search"></i></a>
								</form>
							</li>
							<li class="dropdown top-menu-item-xs">
								<a href="#" data-target="#" class="dropdown-toggle menu-right-item" data-toggle="dropdown" aria-expanded="true">
                                        <i class="mdi mdi-bell"></i> <span class="label label-danger">3</span>
                                    </a>
								<ul class="dropdown-menu p-0 dropdown-menu-lg">
									<!--<li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification</li>-->
									<li class="list-group notification-list" style="height: 267px;">
										<div class="slimscroll">
											<!-- list item-->
											<a href="javascript:void(0);" class="list-group-item">
												<div class="media">
													<div class="media-left p-r-10">
														<em class="fa fa-diamond bg-primary"></em>
													</div>
													<div class="media-body">
														<h5 class="media-heading">A new order has been placed A new order has been placed</h5>
														<p class="m-0">
															<small>There are new settings available</small>
														</p>
													</div>
												</div>
											</a>

											<!-- list item-->
											<a href="javascript:void(0);" class="list-group-item">
												<div class="media">
													<div class="media-left p-r-10">
														<em class="fa fa-cog bg-warning"></em>
													</div>
													<div class="media-body">
														<h5 class="media-heading">New settings</h5>
														<p class="m-0">
															<small>There are new settings available</small>
														</p>
													</div>
												</div>
											</a>

											<!-- list item-->
											<a href="javascript:void(0);" class="list-group-item">
												<div class="media">
													<div class="media-left p-r-10">
														<em class="fa fa-bell-o bg-custom"></em>
													</div>
													<div class="media-body">
														<h5 class="media-heading">Updates</h5>
														<p class="m-0">
															<small>There are <span class="text-primary font-600">2</span> new updates available</small>
														</p>
													</div>
												</div>
											</a>

											<!-- list item-->
											<a href="javascript:void(0);" class="list-group-item">
												<div class="media">
													<div class="media-left p-r-10">
														<em class="fa fa-user-plus bg-danger"></em>
													</div>
													<div class="media-body">
														<h5 class="media-heading">New user registered</h5>
														<p class="m-0">
															<small>You have 10 unread messages</small>
														</p>
													</div>
												</div>
											</a>

											<!-- list item-->
											<a href="javascript:void(0);" class="list-group-item">
												<div class="media">
													<div class="media-left p-r-10">
														<em class="fa fa-diamond bg-primary"></em>
													</div>
													<div class="media-body">
														<h5 class="media-heading">A new order has been placed A new order has been placed</h5>
														<p class="m-0">
															<small>There are new settings available</small>
														</p>
													</div>
												</div>
											</a>

											<!-- list item-->
											<a href="javascript:void(0);" class="list-group-item">
												<div class="media">
													<div class="media-left p-r-10">
														<em class="fa fa-cog bg-warning"></em>
													</div>
													<div class="media-body">
														<h5 class="media-heading">New settings</h5>
														<p class="m-0">
															<small>There are new settings available</small>
														</p>
													</div>
												</div>
											</a>
										</div>
									</li>
									<!--<li>-->
									<!--<a href="javascript:void(0);" class="list-group-item text-right">-->
									<!--<small class="font-600">See all notifications</small>-->
									<!--</a>-->
									<!--</li>-->
								</ul>
							</li>

							<li class="dropdown top-menu-item-xs">
								<a href="" class="dropdown-toggle menu-right-item profile" data-toggle="dropdown" aria-expanded="true"><img src="../assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
								<ul class="dropdown-menu">
									<li><a href="javascript:void(0)"><i class="ti-user m-r-10"></i> Perfil</a></li>
									<li><a href="javascript:void(0)"><i class="ti-settings m-r-10"></i> Configuración</a></li>
									<li><a href="javascript:void(0)"><i class="ti-lock m-r-10"></i> Bloquear Pantalla</a></li>
									<li class="divider"></li>
									<li><a href="../CerrarSesion.php"><i class="ti-power-off m-r-10"></i> Cerrar Sesión </a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- end container -->
			</div>
			<!-- end navbar -->
		</div>
		<!-- Top Bar End -->
		
		
		

		<!-- Page content start -->
		<div class="page-contentbar">

			<!--left navigation start-->
			<aside class="sidebar-navigation">
				<div class="scrollbar-wrapper">
					<div>
						<button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                                <i class="mdi mdi-close"></i>
                            </button>
						<!-- User Detail box -->
						<div class="user-details">
							<div class="pull-left">
								<img src="../assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
							</div>
							<div class="user-info">
								<a href="#"><?php echo $_SESSION["Nombre"]; ?></a>
								<p class="text-muted m-0">Administrador</p>
							</div>
						</div>
						<!--- End User Detail box -->

						<!-- Left Menu Start -->
						<ul class="metisMenu nav" id="side-menu">
							<li><a href="principalAdmin.php"><i class="ti-home"></i> Dashboard </a></li>
							<li><a href="Solicitudes.php"><span class="label label-custom pull-right"></span> <i class="mdi mdi-file-outline"></i> Solicitudes</a></li>
							 <li><a href="RegistroUsuarios.php"><span class="label label-custom pull-right"></span> <i class="mdi mdi-account-plus"></i>Registrar Usuarios</a></li>
						  <li><a href="RegistroUsuarios.php"><span class="label label-custom pull-right"></span> <i class="mdi mdi-account-settings-variant"></i>Modificar Usuarios</a></li>
							<li><a href="PerfilAdmin.php"><span class="label label-custom pull-right"></span> <i class="mdi mdi-account"></i> Mi Cuenta</a></li>
							

							<li>
								<a href="javascript: void(0);" aria-expanded="true"><i class=" mdi mdi-wrench"></i> Servicios <span class="fa arrow"></span></a>
								<ul class="nav-second-level nav" aria-expanded="true">
									<li><a href="ProblemasConexion.php">Problemas de conexión</a></li>
									<li><a href="components-alerts.html">Dudas en navegación</a></li>
									<li><a href="components-icons.html">Requiero de la instalación de un programa</a></li>
									<li><a href="components-widgets.html">Problemas con la impresora</a></li>
									<li><a href="components-widgets.html">Documentos perdidos</a></li>
								</ul>
							</li>
							
              </div>
                            </div>
                        </div>


                    </div>
                    <!-- end container -->
        <!-- START PAGE CONTENT -->
          
									
									 <div id="page-right-content">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="header-title">Basic Tables</h4>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="m-b-20">
                                            <h5>Basic Example</h5>
                                            <p class="text-muted font-13 m-b-20">
                                                For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code> to any <code>&lt;table&gt;</code>.
                                            </p>

                                            <table class="table m-0">

                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Username</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Mark</td>
                                                        <td>Otto</td>
                                                        <td>@mdo</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Jacob</td>
                                                        <td>Thornton</td>
                                                        <td>@fat</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Larry</td>
                                                        <td>the Bird</td>
                                                        <td>@twitter</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                        </div>

                                    </div>
                                </div>
                                <!--- end row -->


                              
                                 

									
									
									
									
									
									
									
								</div>
							</div>
						</div>
						
                        <!--end row -->

										
                    <div class="footer">
                        <div class="pull-right hidden-xs">
                            Project Completed <strong class="text-custom">100%</strong>.
                        </div>
                        <div>
                            <strong>Simple Admin</strong> - Copyright &copy; 2017
                        </div>
                    </div> <!-- end footer -->

                </div>
                <!-- End #page-right-content -->

            </div>
            <!-- end .page-contentbar -->
        </div>
        <!-- End #page-wrapper -->



	 			<!-- js placed at the end of the document so the pages load faster -->
        <script src="../assets/js/jquery-2.1.4.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/jquery.slimscroll.min.js"></script>

        <!-- Datatable js -->
        <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="../assets/plugins/datatables/jszip.min.js"></script>
        <script src="../assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="../assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="../assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="../assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="../assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="../assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="../assets/plugins/datatables/dataTables.colVis.js"></script>
        <script src="../assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <!-- init -->
        <script src="../assets/pages/jquery.datatables.init.js"></script>

        <!-- App Js -->
        <script src="../assets/js/jquery.app.js"></script>


</body>

</html>