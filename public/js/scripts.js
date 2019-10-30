var lastSearch = '';
var offset = 0;

function getIcons(loadMore) {
	loadMore = loadMore || false;
	$(".loading").show();
	$("#icons-search-page").hide();
	$("#icons-results-page").show();

	if (!loadMore) {
		$('#my-modal').modal("hide");
		$(".loading").hide();
	}

	var companyName = $("#company-name").val() || 'Your Company Name';
	if (companyName != lastSearch) {
		lastSearch = companyName;
		offset = 0;
	} else {
		offset += 10;
	}

	$.ajax({
	 	type: "GET",
	 	url: "getIcons",
	 	dataType: 'html',
	 	data: {
	 		keywords: $("#keywords").val(),
	 		companyName: companyName,
	 		offset: offset
	 	},
	 	success: function (data, error){
	 		$("#result-icons").html(data);
			$(".loading").hide();
	 	},
	 	error: function (err) {
	 		console.log(err);
			$(".loading").hide();
	 	}
	});
}

function homePage() {
	$('#my-modal').modal("hide");
	$("#icons-results-page").hide();
	$("#icons-search-page").show();
}

function openIcon(text, imgId) {

	$('#canvas').remove();
	$('#hidden-image').remove();

	$("#modal-icon-body").append(
		'<canvas crossorigin="anonymous" crossOrigin="anonymous" id="canvas"></canvas>'+
		'<div id="hidden-image" style="display:none;">'+
		  '<img crossorigin="anonymous" crossOrigin="anonymous" id="source" src="temp/logos/bike.png">'+
		'</div>'
	);

	var canvas = document.getElementById("canvas");
	var ctx = canvas.getContext("2d");
	var img = document.getElementById(imgId);

	var offscreenCanvas = document.createElement("canvas");
	offscreenCanvas.width = 255;
	offscreenCanvas.height = 180;
	var offscreenContext = offscreenCanvas.getContext("2d");

	// The img object (as returned by document.getElementById("source") )
	// The X coordinate of the area to select
	// The Y coordinate of the area to select
	// The width of the area to select
	// The height of the area to select
	// The X coordinate to draw the img at
	// The Y coordinate to draw the img at
	// The width to draw the img
	// The height to draw the img
	offscreenContext.drawImage(img, 105, 20);
	// offscreenContext.drawImage(img, 20, 20, 600, 450, 21, 20, 200, 200);

	ctx.drawImage(offscreenCanvas, 0, 0);

	ctx.font = "24px Arial";
	ctx.textAlign = "center";     
	ctx.fillText(text, 145, 120);
}

$(document).ready( function () {
    $(document).on("click", ".icon-box", function () {

		var id = $(this).attr('id');
		var imgId = id+'-img';
		var text = $('#'+id+'-text').text();

		openIcon(text, imgId);

		$('#icon-modal-download').modal("show");
    });
});
