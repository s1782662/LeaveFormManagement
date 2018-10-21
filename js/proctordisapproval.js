
function disapprove(regno)
{

	$.post('proc.disapp',{regno:regno},function(data){
		
	if(data==1)
		{
			$('#'+regno).hide();
		}
		else
		{
			alert(data);
		}

	});
}
