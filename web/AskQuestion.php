<script type="text/javascript">
$(function() {
	$( "#ask-question" ).click(function() {
	    $( "#dialog" ).dialog({
	    	modal: true,
	    	buttons: {        
        		"Post" : function() 
        		{
        			window.alert("It worked");
        		},
         		"Cancel" : function()
         		{
         			$(this).dialog("close");
         		}
	    	}
	    });
  	});
	$( "#save-question" ).click(function()
	{
		window.alert("It worked");
	});
  	$( "#dialog" ).hide();
});
</script>

<div id="dialog" title= "Post your Question" >
	<textarea id = "question-to-post" rows="6" cols="25"></textarea>
</div>