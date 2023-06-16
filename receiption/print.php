<!DOCTYPE html>
<?php include 'includes/config.php';?>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body onload="window.print()">
	<div style="width:1100px; height:1580px; border: 5px solid grey">
			<div class="container pt-5">
	<div class="container "><h1 class="text-center" >HCMS Vacination</h1>
	<h3 class="text-center text-primary">Certificate for Covid 19</h3>
</div>
<div class="container pt-5">
<table align="center">
<?php
if(isset($_GET['cert']))
{
$aadhar=$_GET['cert'];
$p=mysqli_query($con,"SELECT*FROM vaccine WHERE id='$aadhar'");
while($d=mysqli_fetch_array($p)){
$name=$d['name'];
$aadhar=$d['aadhar'];
$vaccine=$d['name'];
$phone=$d['phone'];
$vaccine=$d['vac_nme'];
$dose=$d['reg_dte'];
$doctor=$d['dname'];

}
}
?>
<tr class="pt-5">
<td class=" pb-4"><strong>Beneficiary Name</strong></td>
	<td class="pl-5 pb-4 css"><?php echo $name;?></td></tr>
<tr><td class=" pb-4"><strong>ID Verified</strong></td>
	<td class="pl-5 pb-4 css">AADHAR CARD NO: XXXX XXXX XXXX <?php echo $aadhar;?></td></tr>
<tr><td class=" pb-4"><strong>Phone</strong></td>
	<td class="pl-5 pb-4 css"><?php echo $phone;?></td></tr>
<tr><td class=" pb-4"><strong>Vaccine Name</strong></td>
	<td class="pl-5 pb-4 css"><?php echo $vaccine;?></td></tr>
<tr><td class=" pb-4"><strong>Dose Date </strong></td>
	<td class="pl-5 pb-4 css"><?php echo $dose;?></td></tr>
<tr><td class=" pb-4"><strong>Doctor Name</strong></td>
	<td class="pl-5 pb-4 css"><?php echo $doctor;?></td></tr>
<tr><td class="pt-5 pl-5"><strong>Sign/Stamp</strong></td></tr>
<h3></h3>
</table>
</div>
<div class="" style="margin-top: 200px;">
<img src="modi.jpg" style="" class="h-100 w-100">
</div>
<h4 class="text-center pt-5 ">Thank You.</h4>
</div>
</div>
</body>
</html>
<style type="">
	td{
		/*padding-left: 15rem!important;*/
		text-transform: uppercase;
}
	
</style>
