<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Factura (No Pagada)</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">  
           <link href="dataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
           <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
          <link rel="stylesheet" href="dataTables/js/reports-plugins/buttons.dataTables.min.css"/>     

    <style>
    
body {
  background: #999;
  padding: 40px;
  font-family: "Open Sans Condensed", sans-serif;
  background: url(assets/img/Smp.jpg) no-repeat center center fixed;
  background-size: cover;
}  


    </style>   

</head>
<body >                


<div class="panel-body">
<div class="table-responsive col-md-6 col-md-offset-3">
<a href="request.php" type="button" class="btn btn-primary btn-lg"><i class="fa fa-home" aria-hidden="true"></i>Volver a Inicio</a>
<hr>
<table class="table table-bordered table-hover" >
  <thead style="background: #000 !important; color: #fff;">

     <th>Categoria</th>
     <th>Descripcion</th>

  </thead>
<tbody>
<?php
session_start();
require 'mysqlConnect.php';
require 'update_slots.php';
$req_id = $_GET['request_id'];
    $req = "SELECT `requests`.`id`, `parking_id`, `slots`, `hours`, `cost`, `time`, `status`,`location`, `street`, `name`, `placa`, `vehiculo` FROM `requests`,`parkings` WHERE `requests`.`parking_id`=`parkings`.`id` AND `requests`.`id`='$req_id ' AND `requests`.`customer`= '{$_SESSION['driver_email']}' ";

    $res = mysqli_query($con, $req);

while ($request = mysqli_fetch_array($res)) {
    $id = $request['id'];
    $parking = $request['name'];
    $slots= $request['slots'];
    $hours = $request['hours'];
    $cost = $request['cost'];
    $time = $request['time'];
    $stat = $request['status'];
    $location = $request['location'];
    $when = $request['time'];
    $street = $request['street'];
    $vehiculo = $request['vehiculo'];
    $placa = $request['placa'];

?>

<tr>
<td>Nombre de Parqueadero:</td>
<td><?=$parking; ?></td>
</tr>

<tr>
<td>Tipo de Auto:</td>
<td><?=$vehiculo; ?></td>
</tr>

<tr>
<td>Placa:</td>
<td><?=$placa; ?> </td>
</tr>

<tr>
<td>Correo:</td>
<td><?=$_SESSION['driver_email']; ?></td>
</tr>

<tr>
<td>Localizacion:</td> 
<td><?=$location; ?></td>
</tr>

<tr>
<td>Direccion de Parqueadero:</td>
 <td><?=$street; ?></td>
 </tr>

<tr>
<td>Hora de Parqueo:</td> 
<td><?=$hours; ?> Hora</td>
</tr>

<tr>
<td>Numero de Espacio:</td> 
<td><?=$slots; ?></td>
</tr>

<tr>
<td>Saldo Total:</td> 
<td>Cop. $<?=$cost; ?></td>
</tr>

<tr>
<td>Tiempo y Fecha:</td>
<td><?=$when; ?> </td>
</tr>
<?php    

}  

?>      
</tbody>

</table>
</div> 
</div>

   
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
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
                 dom: 'Brt',
                 buttons: [
                     'pdf', 'print'
                 ]
             });
          }
          document.onready= function (){
                loadData();
            }
    </script>     
</body>
</html>