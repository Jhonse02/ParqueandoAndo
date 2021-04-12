<?php
session_start();
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

    <title>Parqueaderos - PA</title>
    <link rel="icon" href="assets/img/ny.jpg" />

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Estilos personalizados para esta plantilla -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      Contenido barra superior y notificaciones 
      *********************************************************************************************************************************************************** -->
      <!--inicio header -->
      <header class="header black-bg">

            <!-- inicio logo -->
            <a href="index.php" class="logo"><b>ParqueandoAndo</b></a>
            <!-- fin logo -->

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
                    <h5 class="centered"> <?php echo $_SESSION['email']; ?></h5>

                  <li class="mt">
                      <a href="admin.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Inicio</span>
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
      <!--inicio main content -->
      <section id="main-content">
          <section class="wrapper">
				<div class="row">

	                  <div class="col-md-12">
	                  	  <div class="content-panel">

              <table class="table table-bordered">
                      <tr><h2> Ver parqueaderos</h2></tr>
                      <tr align="center">
                      <th>S.N </th>
                      <th>Ubicacion </th>
                      <th>Calle </th>
                      <th>Nombre </th>
                      <th>Espacios </th>
                      <th>Precio </th>
                      <th>Borrar </th>
                      <th>Editar </th>
                      </tr>
<?php
$sel="select * from parkings";
$run=mysqli_query($con,$sel);
$i=0;
while($row=mysqli_fetch_array($run)){
$id=$row['id'];
$location=$row['location'];
$street=$row['street'];
$name=$row['name'];
$slot=$row['slot'];
$price=$row['price'];
$i++;

?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $location; ?></td>
<td><?php echo $street; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $slot; ?></td>
<td><?php echo $price; ?></td>
<td><a href="edit.php? edit=<?php echo $id; ?>">Editar</a</td>
<td><a href="basic_table.php?delete=<?php echo $id; ?>">Borrar</a></td>
</tr>
<?php }?>
</table>
<?php
if(isset($_GET['delete']))
{
  $delete_id=$_GET['delete'];
  $delete="DELETE FROM `parkings` WHERE `parkings`.`id` ='$delete_id'";
  $run_delete=mysqli_query($con,$delete);
  if($run_delete)
  {
    echo "<script>alert('Parking deleted successfully')</script>";
    echo "<script>window.open('basic_table.php','_self')</script>";
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
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--Script general para todas las páginas-->
    <script src="assets/js/common-scripts.js"></script>

    <!-- script para esta página -->

  <script>
      //cuadro de selección personalizado (custom select box)

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
