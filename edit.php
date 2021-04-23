<?php
session_start();

require 'mysqlConnect.php';

if(isset($_GET['edit'])){
    $edit_id=$_GET['edit'];

    $sel="select * from parkings where id='$edit_id'";
    $run=mysqli_query($con,$sel);

    $row=mysqli_fetch_array($run);
    $location=$row['location'];
    $street=$row['street'];
    $name=$row['name'];
    $slot=$row['slot'];
    $price=$row['price'];
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>ParqueandoAndo</title>
    <link rel="icon" href="assets/img/logo.ico" />

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Estilos personalizados para esta página -->
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
      <!--inicio header-->
      <header class="header black-bg">

            <!--inicio logo-->
            <a href="index.php" class="logo"><b>ParqueandoAndo</b></a>
            <!--fin logo-->
            <div class="top-menu">
            </div>
        </header>
      <!--fin header-->

      <!-- **********************************************************************************************************************************************************
      Menú barra lateral principal (sidebar)
      *********************************************************************************************************************************************************** -->
      <!--inicio sidebar-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- inicio menú sidebar-->
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
              <!-- fin menú sidebar-->
          </div>
      </aside>
      <!--fin sidebar-->

      <!-- **********************************************************************************************************************************************************
      Contenido principal (main content)
      *********************************************************************************************************************************************************** -->
      <!--inicio main content-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Actualizar los detalles de los Parqueaderos</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
              <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="location" name="location" value="<?php echo $location; ?>"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="Street" name="street" value="<?php echo $street; ?>" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control"  placeholder="Parking name" name="name" value="<?php echo $name; ?>" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Number of slot" name="slot" value="<?php echo $slot; ?>" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Amount" name="price" value="<?php echo $price; ?>" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-6 col-sm-10">
            <button type="submit" class="btn btn-default" name="update">Actualizar</button>
          </div>
        </div>
      </form>
          		</div>
          	</div>

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--fin main content-->
      <!--footer start-->
      <?php
if(isset($_POST['update'])){

  $location = mysqli_real_escape_string($con,$_POST['location']);
  $street=mysqli_real_escape_string($con,$_POST['street']);
  $name =mysqli_real_escape_string($con,$_POST['name']);
  $slot =mysqli_real_escape_string($con,$_POST['slot']);
  $price =mysqli_real_escape_string($con,$_POST['price']);

  $update="UPDATE `parkings` SET `location` = '$location', `street` = '$street', `name` = '$name', `slot` = '$slot', `price` = '$price' WHERE `parkings`.`id`='$edit_id';";
    $run_update=mysqli_query($con,$update);
    if($run_update){
      echo"<script>alert('Successful updated')</script>";
      echo"<script>window.open('basic_table.php','_self')</script>";

    }
    else{
      echo"<script>alert('Error please try again')</script>";
      echo"<script>window.open('basic_table.php','_self')</script>";
    }
}


?>
      <!--inicio footer-->
      <footer class="site-footer">
          <div class="text-center">
              &copy; <?php echo date("Y"); ?> Copyright.
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--fin footer-->
  </section>

    <!-- js puesto al final del documento para que la página cargue más rápido -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--Script general para todas las páginas-->
    <script src="assets/js/common-scripts.js"></script>

    <!--Script para esta página-->

  <script>
      //cuadro de selección personalizado (custom select box)

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
