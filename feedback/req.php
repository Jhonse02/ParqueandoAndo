
<?php
session_start();
@require '../update_slots.php';
require '../mysqlConnect.php';
?>

<style>
.custom {
    color: #006064;
}
</style>
<div class="panel panel-success custom">
<div class="panel-body ">

</div class="table-responsive ">
<table class="table  table-bordered table-striped table-hover " >
<thaed>
  <th>#</th>
  <th>Parqueadero</th>
  <th>Localizacion</th>
  <th>Direccion</th>
  <th>Zona</th>
  <th>Hora</th>
  <th>Costo</th>
  <th>Vehiculo</th>
  <th>Placa</th>
  <th>Fecha</th>
  <th>Estado</th>
  <th>Accion</th>
 


</thead>
<tbody>
<?php
$customer = $_SESSION['driver_email'];  
if ($_POST) {
    $stat = $_POST['status'];
       
    $req = "SELECT `requests`.`id`, `parking_id`, `slots`, `hours`, `cost`, `time`, `status`,`location`, `street`, `name`, `vehiculo`, `placa` FROM `requests`,`parkings` WHERE `requests`.`parking_id`=`parkings`.`id` AND `requests`.`customer`='$customer' AND `requests`.`status`='$stat'";

    $res = mysqli_query($con, $req);

while ($request = mysqli_fetch_array($res)) {
    $id = $request['id'];
    $parking = $request['name'];
    $slots= $request['slots'];
    $hours = $request['hours'];
    $cost = $request['cost'];
    $placa= $request['placa'];
    $vehiculo = $request['vehiculo'];
    $time = $request['time'];
    $stat = $request['status'];
    $location = $request['location'];
    $street = $request['street'];

?>
<tr>
  <td>#</td>
  <td><?=$parking; ?></td>
  <td><?=$location; ?></td>
  <td><?=$street; ?></td>
  <td><?=$slots; ?></td>
  <td><?=$hours; ?> hora</td>
  <td>Cop. <?=$cost; ?></td>
  <td><?=$vehiculo; ?></td>
  <td><?=$placa; ?></td>
  <td><?=$time; ?></td>
  <td><?=$stat; ?></td>
  <td></td>
</tr>

<?php    

}

}else {





 $status = 'requested';    
    $req = "SELECT `requests`.`id`, `parking_id`, `slots`, `hours`, `cost`, `time`, `status`,`location`, `street`, `name`, `vehiculo`, `placa` FROM `requests`,`parkings` WHERE `requests`.`parking_id`=`parkings`.`id` AND `requests`.`customer`='$customer' AND `requests`.`status`='$status'";

    $res = mysqli_query($con, $req);

while ($request = mysqli_fetch_array($res)) {
    $id = $request['id'];
    $parking = $request['name'];
    $slots= $request['slots'];
    $hours = $request['hours'];
    $cost = $request['cost'];
    $vehiculo = $request['vehiculo'];
    $placa = $request['placa'];
    $time = $request['time'];
    $stat = $request['status'];
    $location = $request['location'];
    $street = $request['street'];
$url = "print1.php?request_id=".urlencode($id);
?>
<tr>
  <td>#</td>
  <td><?=$parking; ?></td>
  <td><?=$location; ?></td>
  <td><?=$street; ?></td>
  <td><?=$slots; ?></td>
  <td><?=$hours; ?> hora</td>
  <td>Cop. <?=$cost; ?></td>
  <td><?=$vehiculo; ?></td>
  <td><?=$placa; ?></td>
  <td><?=$time; ?></td>
  <td><?=$stat; ?></td>
  <td><a href="<?=$url;?> " class="btn btn-default" type="submit"><span class="glyphicon glyphicon-save-file"></span> Print</a></td>
</tr>

<?php    

}
}



?>
<script>
$(function () {
    $('.table').DataTable();
} );

  function loadData(){
    $(".table").Datatable();
  }

  document.onready = function(){
    loadData();
  }

  
</script>
</tbody>
</table>
</div>
  </div>
</div>
