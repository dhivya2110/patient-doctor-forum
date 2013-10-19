<script type="text/javascript">
$(function() {
	$( "#ask-question" ).click(function() {
	    $( "#dialog" ).dialog({
	    	modal: true,
	    	buttons: {        
        		"Post" : function() 
        		{
            		form = $( "#question-form" ).serializeArray();
            		$.ajax({ url: 'http://localhost/patient-doctor-forum/APIs/PatientPostQuestion.php',
            		    data: form,
            		    dataType: 'json',
            		    type: 'post',
            		    success: function(output) {
                		    if(output.success == true)
            		    		document.getElementById("post-qn-result").innerHTML = "Your Question was posted successfully";
            		    }
            		});
        		},
         		"Cancel" : function()
         		{
         			$(this).dialog("close");
         		}
	    	}
	    });
  	});
	
  	$( "#dialog" ).hide();
});
</script>

<div id="dialog" title= "Post your Question" >
	<div id = "post-qn-result" class = "alert" ></div>
	<form id = "question-form" method = "post" action="APIs/PatientPostQuestion.php">
		<textarea name = "question-to-post" rows="6" cols="25"></textarea>
		<input type="hidden" name = "patient_id" value="1" />
	</form>
</div>