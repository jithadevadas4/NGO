<?php
include("table.php");
include("../header.php");

$del_id=0;
$i=0;
$j=0;
?>


		<link rel="stylesheet" type="text/css" href="datatables.min.css">
 
		<script type="text/javascript" src="datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>




<div class="container-fluid" style="background:#FFF;">
<br />


<?php

	echo "<div class='col-sm-2' style='float:right;margin-bottom:10px;'><form action='form.php' method='post'><input type='submit' name='view' value='Add New' class='form-control btn-danger'></form></div>";
	
?>
<div class="clearfix"></div>
<style>

</style>
                      <div class="container">
                            <div class="card-body22">
                             
                                <div class="table-responsive" style="overflow:auto;"> 
                                <div class="clearfix"></div>
                                    <table id="example" class="table table-striped table-bordered" >
       
                     
          <?php
	
		  include("../db/connection.php");
	
	
	
	
	
	
	
	
if(isset($_REQUEST['del_id']))
{
$del_id=$_REQUEST['del_id'];
mysqli_query($con,"delete from $table where id='$del_id'");
//if($del_id!="")
}
	?>
    <script>


function rem()
{
if(confirm('Are you sure you want to delete this record?')){
return true;
}
else
{
return false;
}
}


function rem2()
{
if(confirm('Are you sure you want to deactive this record?')){
return true;
}
else
{
return false;
}
}
</script>
    
	
	<?php


	
	
	

	
	
		  $result2 = mysqli_query($con,"SHOW FIELDS FROM $table");

 echo "<thead><tr >";

while ($row2 = mysqli_fetch_array($result2))
 {

  $name=$row2['Field'];

  echo "<th>".
  str_replace('_', ' ', $name)
  ."</th>";

 $i++;
 }
 echo "

<th>Update</th>
 
 <th>Del</th> 
 </tr></thead>";
   
  // $i=0;
   echo "<tbody>";
   
            
            
       
 	$result = mysqli_query($con,"SELECT * FROM $table order by id desc ");
	
		while($row = mysqli_fetch_array($result))
		{
		$id=$row['0'];
		$j++;
		echo "<tr>";
		for($k=0;$k<$i;$k++)
		{
	
			if($k==0)
			{
				echo "<td> $j </td>";
			}
			elseif($k==100)
			{
			  $sql2 = "select *  from location where id='$row[1]' ";
   $result2 = mysqli_query($con, $sql2) or die("Error in Selecting " . mysqli_error($connection));
$row2 =mysqli_fetch_array($result2);
//		
		

			echo "<td >  $row2[location]
			</td>";
				
			}
			else
			{
			echo "<td >$row[$k]</td>";
			}
		
		
		
		
		
		}
		
		
		
		
		
			echo "
			
			<td>
			
			
			
			
			<a href='update.php?id=$id'>Update</a></td>
			
			<td><a href='?del_id=$id' onclick='return rem()'>Del</a></td>
		
			</tr>";
		
		
		
		}
        
        ?>
        </tbody>
    </table>
			
		


</div></div></div>

<div class="clearfix"></div>
	
    </div> 
    <?php
	
	include("../footer.php");
	?>