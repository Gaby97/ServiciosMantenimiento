<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SimpleAdmin - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="assets/css/metisMenu.min.css" rel="stylesheet">
        <!-- Icons CSS -->
        <link href="assets/css/icons.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">

    </head>
	
    <body>
        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 card-box">
                                <div class="text-center">
                                    <h2 class="text-uppercase m-t-0 m-b-30">
                                        <a href="principal.php" class="text-success">
                                            <span><img src="assets/images/logo.png" style="width:270px;height:150px;"></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" action=""  method="post" name="login">

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="nameusuario">Nombre de Usuario</label>
                                                <input class="form-control" type="text" id="nameusuario" name="nameusuario" required="" placeholder="g_robles">
                                            </div>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="password">Contraseña</label>
                                                <input class="form-control" type="password" required="" id="password" name="password"  required="" placeholder="Escribe tu contraseña">
                                            </div>
                                        </div>

                                        <div class="form-group m-b-30">
                                            <div class="col-xs-12">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox5" type="checkbox">
                                                    <label for="checkbox5">
                                                        Recordarme
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <input class="btn btn-lg btn-primary btn-block" name="login"  type="submit" value="login" value="Iniciar Sesión" /> 
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- end card-box-->
                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->

        <div>
        <?php
          if(isset($_POST['login']))//Vallidamos que el formulario fue enviado
          {
            if(($_POST['nameusuario'] != '') && ($_POST['password'] != ''))
            {
							require("Config.php");	
							$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
							
							if ($mysqli->connect_error) { 
								printf("Conexión fallida: %s\n", $mysqli->connect_error);
								exit();
							}
							else 
							{
								$valido = 0;
								//Creo y ejecuto una consulta para tener validado que un restaurante no este repetido
								$user = $_POST['nameusuario'];
								$pass = $_POST['password'];
								$consulta = "SELECT administrador, id_persona FROM USUARIOS where nombre_usuario ='$user' AND contrasena='$pass'";
								
								session_start();
								$_SESSION["id_persona"] = 0;
								if($result = $mysqli->query($consulta)){
									while ($p = $result -> fetch_assoc()) {
										$_SESSION["id_persona"] = $p['id_persona'];
										$administrador = $p['administrador'];
									}
									$result->free();
								}
								
								if($_SESSION["id_persona"] >0 ){
									$idPersona = $_SESSION["id_persona"] ;
									$consulta = "SELECT CONCAT(apell_pat,' ',apell_mat,' ',+nombres) AS Nombre FROM PERSONAS WHERE id_persona = '$idPersona'";

									if($result = $mysqli->query($consulta)){
										while ($p = $result -> fetch_assoc()) {
											$_SESSION["Nombre"] = $p['Nombre'];
										}
										$result->free();
									}
									
									$updateActivo = mysqli_query($mysqli, "UPDATE USUARIOS SET login_activo= 1 WHERE id_persona='$idPersona '");
									if(!$updateActivo){
										echo 'Hubo un problema error: '.$mysqli_error($mysqli);
										exit;
									}
									
									if($administrador==0 ){
										echo '<h5>Usuario correcto</h5>';
										echo '<script>window.location.href = "Usuario/principalUsuario.php";</script>';
										exit;
									}else if($administrador==1 ){
										echo '<h5>Usuario correcto</h5>';
										echo '<script>window.location.href = "Administrador/principalAdmin.php";</script>';
										exit;
									}
									
								}else{
									echo '<h5>Usuario incorrecto</h5>';
								}
            	}
						}
          }
        ?>
        </div>
 

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>

        <!-- App Js -->
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>