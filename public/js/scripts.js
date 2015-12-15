$(document).ready(function(){

	$('.trunwrap').dotdotdot({
		ellipsis	: '... ',
		wrap		: 'word',
		fallbackToLetter: true,		
		after		: null,
		watch		: false,		
		height		: 30,
		tolerance	: 0,
	});

	$('.saranwrap').dotdotdot({
		ellipsis	: '... ',
		wrap		: 'word',
		fallbackToLetter: true,
		after		: null,
		watch		: false,
		height		: 80,
		tolerance	: 0,
	});
	
	$('form.ajax').on('submit',function(){
		var formData = new FormData($(this)[0]);

		var that = $(this),
			url = that.attr('action'),
			method = that.attr('method');

		$.ajax({
			url: url,
			type: method,
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			success: function(response){
				//that[0].reset();
				alert(response);
			}
		});

		return false;
	});	

});

function addParam(param, value) {
    var a = document.createElement('a'), regex = /(?:\?|&amp;|&)+([^=]+)(?:=([^&]*))*/g;
    var match, str = []; a.href = window.location.href; param = encodeURIComponent(param);
    while (match = regex.exec(a.search))
    	if (param != match[1]) 
       		str.push(match[1]+(match[2]?"="+match[2]:""));
    str.push(param+(value?"="+ encodeURIComponent(value):""));
    a.search = str.join("&");
    window.location.href = a.href;
}

