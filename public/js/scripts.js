$(document).ready(function(){

	loadCart();

	var items = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('q'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			url: 'autocomp.php?q=%QUERY',
			wildcard: '%QUERY'
		}
	});

	items.initialize();

	$('#qry').typeahead({
		hint: true,
		highlight: true,
		minLength: 1//3
	},{
		name: 'items',
		displayKey: 'name',
		source: items.ttAdapter()
	});

	$('.trunwrap').dotdotdot({
		/*	The text to add as ellipsis. */
		ellipsis	: '... ',
 
		/*	How to cut off the text/html: 'word'/'letter'/'children' */
		wrap		: 'word',
 
		/*	Wrap-option fallback to 'letter' for long words */
		fallbackToLetter: true,
 
		/*	jQuery-selector for the element to keep and put after the ellipsis. */
		after		: null,
 
		/*	Whether to update the ellipsis: true/'window' */
		watch		: false,
	
		/*	Optionally set a max-height, if null, the height will be measured. */
		height		: 30,
 
		/*	Deviation for the height-option. */
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

	$('#cart').click(function(){
		$('#cartModal').modal('toggle');
	});

	$('#chkout').click(function(){
		checkout();
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

function addToCart(id){

	$.ajax({
			url: "cart.php",
			type: "POST",
			data: "add="+id,
			success: function(response){
				//alert(response);
				loadCart();
				// $('#cartContents').html(response);
				$('#cartModal').modal('show');
			}
		});
}

function subFromCart(id){

	$.ajax({
			url: "cart.php",
			type: "POST",
			data: "sub="+id,
			success: function(response){
				//alert(response);
				loadCart();
				// $('#cartContents').html(response);
				//$('#cartModal').modal('show');
			}
		});
}

function loadCart(){
	$.ajax({
			url: "cart.php",
			type: "GET",
			success: function(response){
				if(response)
					$('#cartContents').html(response);
				//$('#cartModal').modal('show');
			}
		});
}

function checkout(){
	$.ajax({
			url: "cart.php",
			type: "POST",
			data: "send="+true,
			success: function(response){
				alert(response);
				loadCart();
				//$('#cartContents').html(response);
				// $('#cartContents').html(response);
				// $('#cartModal').modal('show');
			}
		});
}