
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>jQuery Populate City Dropdown Based on Country Selected</title>
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/jquery-ui.css"/>
 <link rel="stylesheet" href="<?php echo base_url();?>/assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
 <link rel="stylesheet" href="<?php echo base_url();?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
  <script src="<?php echo base_url();?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url();?>/assets/js/jquery-ui.js"></script>
   <script src="<?php echo base_url();?>/assets/js/jquery.dataTables.min.js"></script>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>-->

<script type="text/javascript">
$(document).ready(function(){
    $("select.state").change(function(){
        var selectedState = $(".state option:selected").val();
		var url="ajax_city_list/";
		//alert(url);
        $.ajax({
            type: "POST",
            url:url,
            data: { state : selectedState } 
        }).done(function(data){
            $("#response_state").html(data);
        });
    });
});
</script>
</head>

<?php
if(isset($_POST["country"])){
    // Capture selected country
    $country = $_POST["country"];
     
  
    if($country !== 'Select'){
		
   
            echo "<td>";
     
        echo "<select class='state' name='state'>";
		echo "<option>select</option>";
        foreach($state as $value){
			
            echo "<option value='$value->state_id'>". $value->state_name . "</option>";
        }
        echo "</select>";
		    echo "</td>";
			echo "<td id='response_state'>";
               
            echo"</td>";
			 
			   
					   
		
    } 
}
?>





