<?php
include("../header.php");
include("table.php");

$k=0;
?>


  
<style>

label
{
text-transform:capitalize;	
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>
<body>

<div class="row">
<br>
<?php
include("data_validation.php");
include("../db/connection.php");
$id=$_REQUEST['id'];
$result = mysqli_query($con,"SHOW FIELDS FROM $table");

$i = 0;
echo "<div class='container'>

<form action='update_data.php?id=$id' method='post' enctype='multipart/form-data'>";
while ($row = mysqli_fetch_array($result))
 {

  $name=$row['Field'];
  $type=$row['Type'];
  $type = explode("(", $type);
  $type_only=$type[0];
$i++;

$result2 = mysqli_query($con,"SELECT * FROM $table where id='$id'") or die(mysql_error());
$row2= mysqli_fetch_array($result2);

$datas=$row2[$name];
//echo $datas;

if($i==1 )
{
	
	// echo "<div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> <input type='text' name='$name' value='$datas' readonly></div>";
}




 elseif($i==30 )
  {
	  echo "
	  
	  <div class='col-sm-2'>".str_replace('_', ' ', $name)."</div><div class='col-sm-4'> ";
	  
	
	echo "<select name='$name' class='form-control'>";
	
	  
	  $sql2 = "select *  from division where id='$row2[division]'";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));

    
    while($row2 =mysqli_fetch_array($result2))
    {
		
		echo "<option value='$row2[id]'>$row2[division]</option>";
	}
	
	  $sql2 = "select *  from division where id!='$row2[division]'";
    $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));

    
    while($row2 =mysqli_fetch_array($result2))
    {
		
		echo "<option value='$row2[id]'>$row2[division]</option>";
	}
	
	
	
	
	
	
	
	  echo "</select>";
	    
	  echo "</div>
                                        ";
	
      
    
  }
  













  elseif($type_only=="varchar" || $type_only=="int" || $type_only=="int" || $type_only=="tinyint"  )
  {
	  
	  
	  echo "
	  
	  
	  <div class='col-md-6'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label><input type='text' name='$name' value='$datas' class='form-control' autocomplete='off' > </div>
                                        </div>";
	  
	  
	  
  }
  
  
    elseif($type_only=="date" )
  {
	  
	   $rr="t".$k;
	  	  $var = $datas;
$date2=date("d-m-Y", strtotime($var) );
	  
	    echo "
	  
	  
	  <div class='col-md-4'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label>
	   <input type='text'  name='$name'  class='form-control' id='$rr'  placeholder='mm/dd/yyyy' value='$date2' autocomplete='off'>
	  </div>
                                        </div>";
	  
	  
	  
	  
	  
	  
	  
	  
	  
	 
	  
	  ?>
	  

	    <script type="text/javascript">
/*$(function() {
	$('#<?php //echo $rr; ?>').datepick({
  dateFormat: "yyyy-mm-dd",
  maxDate: new Date('2017-12-5')
 });
	
});*/





$(function() {
	$('#<?php echo $rr; ?>').datepick({
  dateFormat: "dd-mm-yyyy",
  //maxDate: new Date('2018-11-5')
 });
	
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
      <?php
	  $k++;
  }
  
  
  
  
 if($type_only=="tinytext" )
  {
	  echo "
	  
	  	  
	  <div class='col-md-4'>
                                            <div class='form-group'><label>
	  
	  ".str_replace('_', ' ', $name)."</label>
	  
	  <input type='file' name='$name' class='form-control' value='$datas' ></div></div>";
  }
  if($type_only=="text" )
  {
	  echo "<div class='col-md-4'>
                                            <div class='form-group'><label>
											
											 ".str_replace('_', ' ', $name)."</label>
											
											<textarea name='$name' class='form-control'>$datas</textarea>
											</div>
											</div>";
  }
  
  
  

  
  
}


echo "
<div class='col-md-12'>
                              <div class='col-md-4'>              <div class='form-group'>
											<input type='submit' value='Update' name='submit' class='form-control btn-success'>";



echo "</form>";



echo "
</div></div><div class='col-md-4'>   <div class='form-group'>
<form action='select.php' method='post'><input type='submit' name='view' value='Back' class='form-control btn-danger'></form></div></div>
<div class='clearfix'></div>

</div>
";



mysqli_free_result($result);






echo "<div class='clearfix'></div>
";










mysqli_close($con);

echo "
</div></div>
<div class='clearfix'></div>
";

include("../footer.php");
?>
