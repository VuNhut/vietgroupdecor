/**
 * Created with JetBrains PhpStorm.
 * User: Lak
 * Date: 8/5/13
 * Time: 4:02 PM
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function(){
	  
	// SCROLL BANNER RIGHT SUPPORT
	/*var offset = $("#topsupport").offset();
	var topPadding = 50;
	$(window).scroll(function() {
		if ($(window).scrollTop() > offset.top) {
			$("#topsupport").stop().animate({
				marginTop: $(window).scrollTop() - offset.top + topPadding
			});
		} else {
			$("#topsupport").stop().animate({
				marginTop: 0
			});
		};
     });
	 */
	 // TOP SEARCH
	$('#s').focus(function() {
		$(this).animate({width: "215"}, 300 );	
		$(this).val('')
	});
	
	$('#s').blur(function() {
		$(this).animate({width: "100"}, 300 );
	});
	
});

 /*** SUPPORT NHANH PHIA DUOI ***/
$(function(){
  
	var showsupport=function(){
		$("#float-bar").hide();
		$("#wrap-support-ct").fadeIn("fast");
		return false;
	};
	$("#a-float-bar").click(showsupport)
	$("#cloud-bg").click(showsupport);
	$("#a-float-bar-min").click(function(){
		$("#wrap-support-ct").hide();
		$("#float-bar").fadeIn("fast");
		return false;
	})

});

/*** KIEM TRA CAC TRUONG DU LIEU TRUOC KHI GUI ***/
$(function() {

	var sg_name    =  $( "#sg_name" ),
		sg_email   =  $( "#sg_email" ),
		sg_phone   =  $( "#sg_phone" ),
		sg_content =  $( "#sg_content" ),
		allFields  =  $( [] ).add( sg_name ).add( sg_email ).add( sg_phone ).add( sg_content ),
		tips = $( ".validateTips" );

	function updateTips( t ) {
		tips
			.text( t )
			.addClass( "ui-state-highlight" );
		setTimeout(function() {
			tips.removeClass( "ui-state-highlight", 1500 );
		}, 500 );
	}

	function checkLength( o, min ) {
		if ( o.val().length < min ) {
			o.addClass( "ui-state-error" );
			updateTips( "Vui lòng điền chính xác thông tin" );
			return false;
		} else {
			return true;
		}
	}
	
	function checkRegexp( o, regexp, n ) {
		if ( !( regexp.test( o.val() ) ) ) {
			o.addClass( "ui-state-error" );
			updateTips( n );
			return false;
		} else {
			return true;
		}
	}

		$( "#submit_float" ).click(function(){	
	//alert($("#g-recaptcha-response" ).val());
	  var bValid = true;
		  allFields.removeClass( "ui-state-error" );
		  bValid = bValid && checkLength( sg_name,  3 );
		  bValid = bValid && checkLength( sg_phone, 9 );
		  bValid = bValid && checkLength( sg_email, 5 );				
		  bValid = bValid && checkLength( sg_content, 10 );
		  bValid = bValid && checkRegexp( sg_phone, /^[0-9]+$/i, "Số điện thoại không hợp lệ" );
		  bValid = bValid && checkRegexp( sg_email, /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/i, "Email không hợp lệ" );

		  if ( bValid ) {
			if ($("#g-recaptcha-response").val()){
			  /*** AJAX ***/
			  $.ajax({
				  url: $("#frm-float-support").attr('action'),
				  cache:false,
				  traditional: true,
				  type: "POST",
				  dataType: "html",
				  data: 'sg_name='+sg_name.val()+'&sg_phone='+sg_phone.val()+'&sg_email='+sg_email.val()+'&sg_content='+sg_content.val(),
				  beforeSend: function () {
					  $('.notice-success').show('fast');
				  },
				  success: function(){
					  $("#float-bar").fadeIn("fast");
					  $("#wrap-support-ct").fadeOut( "fast" );
					  $('.notice-success').hide('fast');
					  $('#frm-float-support input:text, #frm-float-support textarea').val('').text('');
				  },
			  });
	
			}else{$(".recaptcha-checkbox").addClass( "ui-state-error" );}
		  }
	
 	
	
	});
	
	
});

/*
 convert a string to number
 */
function unformatNumber(str){
    var grp_sep = ",";
    var dec_sep = ".";
    str = String(str);
    str = str.replace(grp_sep, '');
    str = str.replace(grp_sep, '');
    str = str.replace(grp_sep, '');
    str = str.replace(grp_sep, '');
    str = str.replace(dec_sep, '.');
    num = Number(str);
    return num;
}

/*
 convert number to a string
 */
function formatNumber(number){
    var decimals = 0;
    var dec_point = ".";
    var thousands_sep = ",";
    // http://kevin.vanzonneveld.net
    // + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // + bugfix by: Michael White (http://crestidg.com)
    // + bugfix by: Benjamin Lupton
    // + bugfix by: Allan Jensen (http://www.winternet.no)
    // + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // * example 1: number_format(1234.5678, 2, '.', '');
    // * returns 1: 1234.57
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
