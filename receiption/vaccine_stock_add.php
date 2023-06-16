<?php include 'header.php';
include("includes/config.php"); ?>
<?php
date_default_timezone_set('Asia/Kolkata');
if (isset($_POST['add_stock'])) {
  $vac_name = $_POST['vac_name'];
  $vac_qty = $_POST['vac_qty'];
  $vac_price = $_POST['vac_price'];
  $date_time=date('d-M-Y');
  $query="INSERT INTO `vacc_stk`(`date`, `vac_name`, `quantity`, `price`) VALUES ('$date_time','$vac_name','$vac_qty','$vac_price')";
  $result = mysqli_query($con,$query);

  if ($result) {
      echo '<script>alert("Your vaccine stock added")</script>';
     echo '<script>window.location.href="vaccine_stock.php";</script>';
  }else{
      echo '<script>alert("Your stock added filed..")</script>';
    echo '<script>window.location.href="vaccine_stock_add.php";</script>';
  }
}
if (isset($_POST['stock_update'])) {
  $stock_id=$_POST['stock_id'];
  $vac_name = $_POST['vac_name'];
  $vac_qty = $_POST['vac_qty'];
  $vac_price = $_POST['vac_price'];
  $date_time=date('d-M-Y');
  $query="UPDATE `vacc_stk` SET `vac_name`='$vac_name',
                               `quantity`='$vac_qty',
                               `price`='$vac_price',
                               `date`='$date_time' WHERE id='$stock_id'";
  $result = mysqli_query($con,$query);

  if ($result) {
      echo '<script>alert("Your Vaccine stock updated")</script>';
  echo '<script>window.location.href="vaccine_stock.php";</script>';
  }else{
      echo '<script>alert("Your updated filed..")</script>';
    echo '<script>window.location.href="vaccine_stock_add.php";</script>';
  }
}


if (isset($_GET['del'])) {
  $stock_id=$_GET['del'];
  $query="DELETE FROM `vacc_stk` WHERE id='$stock_id'";
  $result = mysqli_query($con,$query);
  if ($result) {
    echo '<script>window.location.href="vaccine_stock.php";</script>';
  }else{
      echo '<script>alert("Your updated filed..")</script>';
  echo '<script>window.location.href="vaccine_stock.php";</script>';
  }
}

?>
<div class="content-wrapper">
   <div class="container-fluid">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Vaccine Stock</li>
      </ol>
      
<?php if(isset($_GET['edit'])){
$w=mysqli_query($con,"SELECT * FROM `vacc_stk` WHERE id='".$_GET['edit']."'");
while($row=mysqli_fetch_array($w))
{
$vac_name=$row['vac_name'];
$vac_qty=$row['quantity'];
$vac_price=$row['price'];
$stock_id=$row['id'];
}
?>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Vaccine Stock</div>
        <div class="card-body">
          <form class="panel panel-success" role="form" action="#" method="Post" enctype="multi">
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="username">Vaccine Name</label>
                <input type="text" class="form-control" name="vac_name" value="<?php echo $vac_name;?>">
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label for="">Qty</label>
                <input type="text" name="vac_qty" class="form-control" value="<?php echo $vac_qty;?>">
              </div>
            </div>
              <div class="col-md-6">
                  <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="vac_price" class="form-control"value="<?php echo $vac_price;?>">
              </div>
            </div>  
            </div>
           <a href="vaccine_stock.php" class="btn btn-secondary">Back</a>
           <input type="hidden" name="stock_id" value="<?php echo $stock_id;?>">
            <button type="submit" class="btn btn-primary" name="stock_update">UPDATE</button>
          </form>
        </div>
      </div>
      <?php }else{?>
     <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Vaccine Stock</div>
        <div class="card-body">
          <form class="panel panel-success" role="form" action="#" method="Post" enctype="multi">
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                <label for="username">Vaccine Name</label>
                <input type="text" class="form-control" name="vac_name" value="">
              </div>
            </div>
             <div class="col-md-3">
              <div class="form-group">
                <label for="">Qty</label>
                <input type="text" name="vac_qty" class="form-control" value="">
              </div>
            </div>
              <div class="col-md-3">
                  <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="vac_price" class="form-control"value="">
              </div>
            </div>  
            </div>
           <a href="vaccine_stock.php" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary" name="add_stock">Submit</button>
          </form>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<?php include 'footer.php'; ?>