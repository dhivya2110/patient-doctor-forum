<?php

include 'config.php';

global $question_type_list;

if(!isset($_COOKIE["type"]))
{
?>	
	<script>
	  function setCookie(c_name,value,exdays)
	  {
		var exdate=new Date();
		exdate.setDate(exdate.getDate() + exdays);
		var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
		document.cookie=c_name + "=" + c_value;
	  }
	  
	  $(function() {
	    $( "#dialog" ).dialog({
	    	modal: true,
	    	closeOnEscape: false,
	    	buttons: [{
	            id:"btn-accept",
	            text: "Accept",
	            click: function() {
	                	setCookie("type", document.getElementById("qn_type").value, 15);
	                    $(this).dialog("close");
	            }
	    	}]
	    });
	  });
	</script>
	
	<div id="dialog" title="Select your preference" >
	
	Select category of questions that you will be interesting in : 
	
	  <select id = "qn_type">
	  	<?php 
	  		echo "<option value =  $cardilogy_type> Cardiology </option>";
	  		echo "<option value =  $neurology_type> Neurology </option>";
	  	?>
	  </select>
	</div>
<?php
}
?>