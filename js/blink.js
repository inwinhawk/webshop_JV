$(document).ready(function blinker()
	{
		

		$('.alert').fadeOut(500);
		$('.alert').fadeIn(500);
	
		setTimeout(blinker, 1000); //Runs every second
	});

	