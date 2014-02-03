$(document).ready(function(){
$("#date").click(function(){
$("#date").val('');
$("#postdate").val('');
$("#posttime").val('');
$("#info").empty();

});

$("#date").datepicker({
	minDate: 0,
	beforeShowDay: function(date) {
        var day = date.getDay();
        return [(day != 0), ''];
    },
	showAnim: 'show',
	onSelect:function(){
							
			var date=$("#date").datepicker({ }).val();
			var slotchecker=date;
			var finaldate=date;
			
			$("#postdate").val(date);
			
				$.ajax({
						type:'POST',
						url:'allocation.php',
						data:{slotchecker:slotchecker},
						cache:false,
						success:function(callback){
						
						//$("#availability").html(callback);
						$('tr td button').each(function(){
							$(this).removeClass();			
						});
						var slots = $(callback).filter('div');
						$('tr td button').addClass('btn btn-success');

						$(slots).each(function(){
						var booked_slots=$(this).html();
									
						$('tr td button').each(function(){
							var time_slots=$(this).html();
								if(booked_slots==time_slots)
									{
										$(this).removeClass('btn btn-success');
										$(this).addClass('btn btn-danger');
									}
								
								});

							});
							
						}//success call end
								
								
					});//ajax call end
						

				}
		});

var count=0;
$('tr td button').click(function(){
	if($(this).hasClass('btn btn-success'))
	{
		$('tr td button').each(function(){
			
			if($(this).hasClass('btn btn-warning'))
			{
				count++;
			}
		});
		
		if(count<1)
		{
			$(this).removeClass('btn btn-success');
			$(this).addClass('btn btn-warning');
			var slot=$(this).html();
			$('#posttime').val(slot);
		}
		else
		{
			alert('you can pick only one time slot in a day cancel your picked appointment');		
		}

	}
	
	else if($(this).hasClass('btn btn-warning'))
	{
		$(this).removeClass('btn btn-warning');
		$(this).addClass('btn btn-success');
		count=0;
		$('#posttime').val('');
	}

	else
	{
		alert('Selected slot is already booked,cannot rebook');
	}


	
	});
});
   
/* generating appointments table for a particular function*/
$(document).ready(function(){
var username=$("#welcome_message").html();
//jQuery.load()
$.post( 
             "appointments.php",
             { name: name },
             function(data) {
                $('#appts').html(data);
                
             }

          );

});

    
/* clicking submit */
$(document).ready(function(){
$("#sub").click(function(){

var finaldate=$("#postdate").val();
var finaltime=$("#posttime").val();
//alert(finaldate);
//alert(finaltime);
$.ajax({
		type:'POST',
		url:'submission.php',
		data:{finaldate:finaldate,
			  finaltime:finaltime
			 },
		success:function(info){
		alert(info);
		}
		
});
});
});

