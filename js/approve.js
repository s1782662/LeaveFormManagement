function approve(regno)
{

	$.post('approval',{regno:regno},function(data){
		
	if(data==1){
     $('#'+regno).hide();
    }else if(data == 0){
     //return string proctor has not approved the leaveform
    }else{
     alert(data);
    }
	});
}

