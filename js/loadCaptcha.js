$(function() {
			
			$('#reloadCaptcha').click(function(){				
				$('#captcha').attr('src', 'captcha?' + (new Date).getTime());
			});
		});
