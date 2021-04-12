<?php session_start();
require 'update_slots.php';
if (!$_SESSION['email']) {
  header("location: admin_login.php");
}
else {

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin - PA</title>
    <link rel="icon" href="assets/img/logo.ico" />
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>


    <style>
    a {
    display: block;
    padding: 10px 35px;
}

.left-links li a{
    color:#7D879E !important;
    /*font-weight:bold;*/
    font-family: 'Open Sans', sans-serif;
    font-size: 15px;
    /*border-bottom:1px solid #7D879E;*/
}

.left-links li a:hover{
    color:#ABB8D6 !important;
}
    </style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      Contenido barra superior y notificaciones
      *********************************************************************************************************************************************************** -->
      <!-- inicio header -->
      <header class="header black-bg">

            <!-- inicio logo -->
            <a href="index.php" class="logo"><b>Parqueando Ando</b></a>
            <!-- fin logo -->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php" style="background-color:#ffd777;">Cerrar sesión</a></li>
            	</ul>
            </div>
        </header>
      <!-- fin header -->

      <!-- **********************************************************************************************************************************************************
      Menú barra lateral principal (sidebar)
      *********************************************************************************************************************************************************** -->
      <!-- inicio sidebar -->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- inicio menú sidebar -->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><a href="#"><img src="assets/img/assistant-144.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"> <?php echo $_SESSION['email']; ?> </h5>
                
                     
                <li class="mt">
                      <a href="blank.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Nuevo parqueadero</span>
                      </a>
                      <a href="basic_table.php">
                          <i class="fa fa-pencil"></i>
                          <span>Parqueaderos</span>
                      </a>
                      <a href="attentant.php">
                          <i class="fa fa-plus"></i>
                          <span>Nuevo asistente</span>
                      </a>
                      <a href="basic_table2.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Asistentes</span>
                      </a>
                      <a href="admin_request.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Requerimientos</span>
                      </a>
                  </li>       
            </ul>
              <!-- fin menú sidebar -->
          </div>
      </aside>
      <!-- fin sidebar -->

      <!-- **********************************************************************************************************************************************************
      Contenido principal (main content)
      *********************************************************************************************************************************************************** -->
      <!-- inicio main content -->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">

                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">


                      </div>
                      <!-- fin custom chart -->
					</div><!-- /row -->

                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      Contenido barra lateral derecha
      *********************************************************************************************************************************************************** -->


                      </div>

                  </div><!-- /col-lg-3 -->
              </div><!--/row -->
          </section>
      </section>

      <!-- fin footer -->
  </section>

    <!-- js puesto al final del documento para que la página cargue más rápido -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!-- Script general para todas las páginas -->
    <script src="assets/js/common-scripts.js"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!-- Script para esta página -->
    <script src="assets/js/sparkline-chart.js"></script>
	<script src="assets/js/zabuto_calendar.js"></script>

	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | obligatorio) el encabezado de esta notificacion
            title: 'Welcome to smart-parking!',
            // (string | obligatorio) El texto dentro de la notificacion
            text: 'Makes your parking easier.'
            // (string | opcional) La imagen puesta en la izquierda
            image: 'assets/img/ui-sam.jpg',
            // (bool | opcional) Si quieres que se desvanezca por sí solo o se quede ahí
            sticky: true,
            // (int | opcional) El tiempo que quieres que dure antes que se desvanezca
            time: '',
            // (string | opcional) El nombre de la clase al que quieras aplicar este mensaje
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>

	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });

            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });


        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>


  </body>
</html>
<?php } ?>
