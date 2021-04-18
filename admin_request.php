<?php session_start();
require 'mysqlConnect.php';
require 'update_slots.php';
?>
<!DOCTYPE html>
<html lang="en">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>parqueadero</title>
    <link rel="icon" href="assets/img/logo.ico" />

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Estilos personalizados para esta plantilla --> 
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
           <link href="dataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
          <link rel="stylesheet" href="dataTables/js/reports-plugins/buttons.dataTables.min.css"/>

  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      Contenido de la barra superior y notificaciones
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
      Menu principal de la barra lateral (sidebar)
      *********************************************************************************************************************************************************** -->
      <!-- inicio sidebar -->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- inicio menu sidebar -->
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
              <!-- fin menu sidebar -->
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

	                  <div class="col-md-12">
	                  	  <div class="content-panel">
<h2>Ver los Requerimientos</h2>

              <table class="table table-bordered" >
                      <thead>
                      <tr>
                      <th>S.N </th>
                      <th>Parqueadero</th>
                      <th>Espacios </th>
                      <th>Hora</th>
                      <th>Costo</th>
                      <th>Cliente</th>
                      <th>Estado</th>
                      </tr>
                      </thead>
<?php
$sel="SELECT `requests`.`id`, `slots`, `hours`, `cost`, `customer`, `time`, `status`,`name` FROM `requests`,`parkings` WHERE `parkings`.`id`=`requests`.`parking_id`";
$run=mysqli_query($con,$sel);
$i=0;
while($row=mysqli_fetch_array($run)){
$id=$row['id'];
$parking_name=$row['name'];
$slots=$row['slots'];
$hours=$row['hours'];
$cost=$row['cost'];
$customer=$row['customer'];
$status=$row['status'];
$i++;

?>
<tr>
<td><?php echo $i; ?></td>
<td ><strong style="data-transform:uppercase !important;"><?php echo $parking_name; ?></strong></td>
<td><?php echo $slots; ?></td>
<td><?php echo $hours; ?></td>
<td><?php echo $cost; ?></td>
<td><?php echo $customer; ?></td>
<td><?php echo $status; ?></td>
</tr>
<?php }?>
</table>
<?php
if(isset($_GET['delete']))
{
  $delete_id=$_GET['delete'];
  $delete="DELETE FROM `requests` WHERE `requests`.`id` ='$delete_id'";
  $run_delete=mysqli_query($con,$delete);
  if($run_delete)
  {
    echo "<script>alert('request deleted successfully')</script>";
    echo "<script>window.open('request.php','_self')</script>";
  }
}
?>
	                  	  </div><!--/content-panel -->
	                  </div><!-- /col-md-12 -->

				</div>

		</section><!--wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!-- fin main content -->

      <!-- fin footer -->
  </section>

    <!-- js puesto al final del documento para que la página cargue más rápido -->

    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!-- script general para todas las páginas -->
    <script src="assets/js/common-scripts.js"></script>

    <!--script para esta página -->

  <script>
      //cuadro de selección personalizado (custom select box)

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

     <!-- Scripts tablas de datos -->
        <script type="text/javascript" src="dataTables/js/jquery.min.js"></script>
         <script type="text/javascript" src="dataTables/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="dataTables/js/jquery.dataTables.min.js"></script>

        <script src="dataTables/js/reports-plugins/dataTables.buttons.min.js"></script>
        <script src="dataTables/js/reports-plugins/jszip.min.js"></script>
        <script src="dataTables/js/reports-plugins/pdfmake.min.js"></script>
        <script src="dataTables/js/reports-plugins/vfs_fonts.js"></script>
        <script src="dataTables/js/reports-plugins/buttons.flash.min.js"></script>
        <script src="dataTables/js/reports-plugins/buttons.html5.min.js"></script>
        <script src="dataTables/js/reports-plugins/buttons.print.min.js"></script>
        <script>
          function loadData(){

             $(".table").DataTable({
                 dom: 'Bflirt',
                 buttons: [
                     'excel','pdf', 'print'
                 ]
             });
          }
          document.onready= function (){
                loadData();
            }
    </script>
  </body>
</html>
