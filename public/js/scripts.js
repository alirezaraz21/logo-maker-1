function getIcons() {
	$.ajax({
	 	type: "GET",
	 	url: "/getIcons",
	 	dataType: 'html',
	 	data: {keywords: $("#keywords").val()},
	 	success: function (data, error){
	    	console.log(data); 
	 	},
	 	error: function (err) {
	 		console.log(err);
	 	}
	});
}