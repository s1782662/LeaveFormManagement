function disapprove(regno)
{

	$.post('disapproval',{regno:regno},function(data){
		
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

