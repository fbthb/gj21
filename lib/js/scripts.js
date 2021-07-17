function filter(element) {
	
jQuery(function ($) {
		
		var value = $(element).val();
		var visibles = 0;
		
		value = value.toLowerCase().replace(/(?:^|\\s)[a-z]/g, function(letter) {
			ret = letter.toUpperCase();
		    return ret;
		});
		
		
		if (value == '') {
		    $("#fl_list > li").each(function() {
			    $(this).hide();
			});
			window.displayBoxIndex = -1;			
			$(".fl-item").removeClass('active');
		}
		
		else if ($.isNumeric(value)) { 
	        $("#fl_list > li").each(function() {
	            if ($(this).text().startsWith(value)) {
	                $(this).show();
	                visibles++;
	            }
	            else {
	                $(this).hide();
	            }
	        });
	        
	        if (visibles==0) $("#fl_notfound").css("visibility", "visible");
	        if (visibles>0) $("#fl_notfound").css("visibility", "hidden");
	    }
	    
	    else {
	
	        $("#fl_list > li").each(function() {
	        	if ($(this).text().search(value) > -1) {
	                $(this).show();
	                visibles++;
	            }
	            else {
	                $(this).hide();
	            }
	        });
	
	        if (visibles==0) $("#fl_notfound").css("visibility", "visible");
	        if (visibles>0) $("#fl_notfound").css("visibility", "hidden");
	    }
	    	
});

}




jQuery(function ($) {
	
	
    //changes header based on scroll position
    
    var header = $("#siteheader");
    
    
    function headerchange() {
	    var scroll = $(window).scrollTop();

        if (scroll >= 500) {
            
            if (!header.hasClass("scrolled")) {
                header.addClass("scrolled");
            }
        } else {
            if (header.hasClass("scrolled")) {
                header.removeClass("scrolled");
            }
        }
    }
    
    headerchange();
    
    $(window).scroll(function() {
		headerchange();
    });
    
    
    
    
    //mobile navigation buttons
    
    
    $('#mobilenav').click(function() {
		header.toggleClass('open');	    
    });
    
    $('#mobilenav_close').click(function() {
		header.removeClass('open');	    
    });    
    
    
    
    //show search form on larger viewports
    
    $('nav#social-navigation ul li.suche').click(function(event) {
	    event.preventDefault();
		header.toggleClass('search');	    
		$('#searchinput').focus();
    });    





	//show filterlist popups
	
	$("#fl_list > li").each(function() {
	    $(this).click(function() {
		    var popup_id = this.id.replace("fl", "flp");
		    $('#'+popup_id).addClass('open');
	    });
	});
	
	
	//filterlist popups close buttons
	
	$("div.fl-popup").each(function() {
	    $("button", this).click(function(event) {
		    event.preventDefault();
		    $(this).parent().removeClass('open');
	    });
	});	
	

	//give donation form labels active class
	
	$("form.form-donation-paypal label").each(function() {
	    $(this).click(function() {
		    $("form.form-donation-paypal label").removeClass('active');
		    $(this).toggleClass('active');
	    });
	});		
	


/* home page sg navigation

	var Navigate = function(diff) {

	    displayBoxIndex += diff;
	    
	    var oBoxCollection = $(".sglist-item:visible");
	    var cssClass = "active";
	    
	    if (displayBoxIndex >= oBoxCollection.length)
	         displayBoxIndex = 0;
	    if (displayBoxIndex < 0)
	         displayBoxIndex = oBoxCollection.length - 1;

		console.log(oBoxCollection);	
			    
	    oBoxCollection.removeClass(cssClass).eq(displayBoxIndex).addClass(cssClass);
	       
	    sghref = oBoxCollection.eq(displayBoxIndex).children('a').attr("href");
	};
		
   
    
	window.displayBoxIndex = -1;
	
	$("#sgsearch").keyup(function(e) 
	{ 
		//console.log(e.keyCode);
		
	        if (e.keyCode == 40) 
	        {  
	            Navigate(1);
	        }
	        if(e.keyCode==38)
	        {
	            Navigate(-1);
	        }
	        if(e.keyCode==13)
	        {
				//console.log(sghref);
				window.location.assign("."+sghref);
	        }
	        if(e.keyCode==27)
	        {
				$('#sgsearch').val('');
				filter($('#sgsearch'));
	        }
	});	    
 */    
    
    
    
    
    
});


