  $(document).ready(function() {
  $(function() {
    $('#vehicle').change(
	function(){ 
	if ($('#vehicle').val() != false){
      $('.vehicles').hide();
      $('#engine').show();
      $('#' + $(this).val()).show();
	  $('#reply').show();
    }
    }
	);
  });
 

	$('#send').click(function() {
        var ew = $('#weight').val();
        var fw = $('#fullWeight').val();
		var vl = $('#volume').val();
		
         $.ajax({ 
             type: 'POST', 
               url: 'test.php', 
               data: {ew : ew, fw : fw, vl : vl}, 
                success: function(data){ 
                    if (data['error']) { 
                        alert(data['error']); 
                    } else { 
					 $("#duty").val(data);
                        }
                },
				error: function(){
				alert('catch');
				},
    })

    })

 });
   