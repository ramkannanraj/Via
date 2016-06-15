<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>
jQuery Populate City Dropdown Based on Country Selected
</title>
  <!--<link rel="stylesheet" href="<?php echo base_url();?>/assets/css/jquery-ui.css"/>
 <link rel="stylesheet" href="<?php echo base_url();?>/assets/DataTables-1.10.7/media/css/jquery.dataTables_themeroller.css"/>
 <link rel="stylesheet" href="<?php echo base_url();?>/assets/DataTables-1.10.7/media/css/jquery.dataTables.css"/>
  <script src="<?php echo base_url();?>/assets/js/jquery-1.10.2.js"></script>
  <script src="<?php echo base_url();?>/assets/js/jquery-ui.js"></script>
   <script src="<?php echo base_url();?>/assets/js/jquery.dataTables.min.js"></script>-->
<!--<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("select.state").change(function(){
        var selectedState = $(".state option:selected").val();
		var url="masters/ajax_city_list/";
		        $.ajax({
            type: "POST",
            url:url,
            data: { state : selectedState } 
        }).done(function(data){
            $("#response").html(data);
        });
    });
});
</script>-->
</head>
<?php
if(isset($_POST["country"])){
    // Capture selected country
    $country = $_POST["country"];
     
    // Define country and city array
   /* $countryArr = array(
                    "usa" => array("New Yourk", "Los Angeles", "California"),
                    "india" => array("Mumbai", "New Delhi", "Bangalore"),
                    "uk" => array("London", "Manchester", "Liverpool")
                );*/
     
    // Display city dropdown based on country name
    if($country !== 'Select'){
		
   
            echo "<td>";
        echo "<label>State:</label>";
        echo "<select class='state'>";
        foreach($state as $value){
            echo "<option value='$value->state_id;'>". $value->state_name . "</option>";
        }
        echo "</select>";
		    echo "</td>";
			 
			   
					   
		
    } 
}
?>

<?php
if(isset($_POST["state"])){
    // Capture selected country
    $state = $_POST["state"];
     
    // Define country and city array
   /* $countryArr = array(
                    "usa" => array("New Yourk", "Los Angeles", "California"),
                    "india" => array("Mumbai", "New Delhi", "Bangalore"),
                    "uk" => array("London", "Manchester", "Liverpool")
                );*/
     
    // Display city dropdown based on country name
	 echo "<td>";
    if($state !== 'Select'){
       
        echo "<select class='city'  name='city'>";
		echo "<option>select</option>";
        foreach($city as $value){
            echo "<option value='$value->city_id'>". $value->city_name."</option>";
        }
        echo "</select>";
		echo "</td>";
			   echo "<td id='response_state'>";
            echo "</td>";
    } 
}
?>