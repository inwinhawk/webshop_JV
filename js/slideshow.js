$(document).ready(function ()

	$("#slideshow > div:gt(0)").hide(); // betekent dat alle div childs van #slideshow geselecteerd worden waarvan de index groter is dan  0. 
										// Dit wil zeggen dat eerst neiet geselecteerd wordt.
								

	setInterval(function() 
	{ 
	  $('#slideshow > div:first')  // we laden het eerste element in.
		.fadeOut(1000)				// out faden van afbeelding in ms
		.next()						// volgende foto in de rij oproepen
		.fadeIn(100) 				// in faden, van nieuwe afbeelding in ms
		.end()						// resetten van functie, hierna wordt alles terug normaal gemaakt
		.appendTo('#slideshow');	// toevoegen aan slideshow
	},  4000);   						// einde van de slide show + aantal sec 
	});


	