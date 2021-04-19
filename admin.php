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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>


    
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      Contenido barra superior y notificaciones
      *********************************************************************************************************************************************************** -->
      <!-- inicio header -->
      <header class="header black-bg">

            <!-- inicio logo -->

                <a href="index.php" class="logo"><img src="assets/img/assistant-144.png" class="img-circle"><b>Parqueando Ando</b></a>
            
            <!-- fin logo -->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li class="header-user-banner">
                    
                    <button class="btn btn-banner btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user mt-button" style="margin-right: 7px;"></i>
                    <?php echo $_SESSION['email']; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
                    </div>
                    </li>
                    <div class="dropdown">
                    
                    </div>
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
                <li class="mt">
                <h2 class="ul-sidebar-menu-title">Menús</h2>
                      <a href="admin.php">
                          <i class="fa fa-home mt-button"></i>
                          <span>Inicio</span>
                      </a>
                      <a href="basic_table.php">
                          <i class="fa fa-car mt-button"></i>
                          <span>Parqueaderos</span>
                      </a>
                      <a href="basic_table2.php">
                          <i class="fa fa-user mt-button"></i>
                          <span>Asistentes</span>
                      </a>
                      <a href="admin_request.php">
                          <i class="fa fa-book mt-button"></i>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!-- Script para esta página -->
    <script src="assets/js/sparkline-chart.js"></script>
	<script src="assets/js/zabuto_calendar.js"></script>

	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | obligatorio) el encabezado de esta notificacion
            title: 'Bienvenido a ParqueandoAndo!',
            // (string | obligatorio) El texto dentro de la notificacion
            text: 'Facilita tu estacionamiento.'
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
