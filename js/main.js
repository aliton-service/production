
(function( $ ){


	  $.relDropList = function( options ) {

  	!options.empty ? options.empty = " " : ""

    // логика вызова метода
    // if ( DropList[method] ) {
    //   return DropList[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    // } else if ( typeof method === 'object' || ! method ) {
    //   return DropList.init.apply( this, arguments );
    // } else {
    //   $.error( 'Метод с именем ' +  method + ' не существует для jQuery.relDropList' );
    // }
   //  var DropList = $.extend({
   //  	action : false,
   //  	rel : false,

   //  	 init : function( options ) {

	  //     // return this.each(function(){
	  //     //    $(this).click(function(){ alert(this.tt) })
	  //     //  });
			// //console.log(DropList)
	  //   },
   //  },options);

	//console.log($this)



	$(options.list).attr('rel',options.rel)

  	if ($(options.rel).val() == 0)
		$(options.list).attr('disabled',true)
	var html



	$(options.rel).change(function(){
		$this=$(options.list)
// console.log("select[rel='#"+$("select[rel='#"+$("select[rel='"+options.list+"']").attr('id')+"']").attr('id')+"']")
		$this.attr('disabled',false)

		$("select[rel='"+options.list+"'], select[rel='#"+$("select[rel='"+options.list+"']").attr('id')+"'],"
			+"select[rel='#"+$("select[rel='#"+$("select[rel='"+options.list+"']").attr('id')+"']").attr('id')+"']").attr('disabled',true)

		$("select[rel='"+options.list+"'] option, select[rel='#"+$("select[rel='"+options.list+"']").attr('id')+"'] option,"
			+"select[rel='#"+$("select[rel='#"+$("select[rel='"+options.list+"']").attr('id')+"']").attr('id')+"'] option").attr('selected',false)

		html = "<option value=''>"+options.empty+"</option>"

		if ($(options.rel).attr('rel')) {
			console.log($(options.rel).attr('rel'))
			// if ($($(options.rel).attr('rel')).val() !== '')
				options.parent = "&parent_id="+$($(options.rel).attr('rel')).val()

			if ($($(options.rel).attr('rel')).attr('rel')) {
				// if ($($($(options.rel).attr('rel')).attr('rel')).val() !== '')
					options.parent += "&parent_parent_id="+$($($(options.rel).attr('rel')).attr('rel')).val()

				if ($($($(options.rel).attr('rel')).attr('rel')).attr('rel')) {
					// if ($($($($(options.rel).attr('rel')).attr('rel')).attr('rel')).val() !== '' )
						options.parent += "&parent_parent_parent_id="+$($($($(options.rel).attr('rel')).attr('rel')).attr('rel')).val()

				}
			}

		}
		else
			options.parent = ""

		$.ajax({
			async: false,
			url:'/index.php?r='+options.controller+'/'+options.action,
			data:'id='+$(options.rel).val()+options.parent,
			success:function(e){

				console.log($(options.rel).val())
				for (var i = 0; i < e.length; i++) {

					html += "<option value="+e[i]['id']+">"+e[i]['value']+"</option>"
				};

				$this.html(html)
				console.log(html)
			}
		})
	})


	if(options.add) {

		if($(options.add).val() != 0) $(options.add).attr('disabled',false)

		$(options.add).change(function(){
			$(options.rel).change()
		//console.log('sdfd')
		})
	}

    //DropList.init.apply( this, arguments );
  };



})( jQuery );

(function ($) {
	//$.fn.ACA = function(options) {
    //
	//	var AC = $.extend({
	//		source : $.ajax({
    //
	//			url: options.url,
	//			async:false,
	//			success: function(e) {
	//				return e;
	//			}
	//		}),
	//		select: function () {
	//		},
	//		open: function () {
	//		},
	//		search: function () {
	//		},
	//	},options)
    //
	//	$t=$(this);
	//	$cntrl = false;
    //
    //
	//	$t.keydown(function(e) {
	//		console.log(e.keyCode)
	//		if(e.keyCode == 17 || e.keyCode == 16) $cntrl = true
	//		if(enKey(e.key)) {
	//			$t.parent().find('.alert').remove()
	//			$t.parent().append('<p class="alert">Допустимы только русские символы</p>')
	//			return false
	//		}
	//		else $t.parent().find('.alert').remove()
	//		$this=$(this)
	//		$key=""
	//		if(e.key.length==1) {
	//			$text = $this.val()+ e.key
	//		}
	//		$regex = new RegExp("^"+$text.toLowerCase())
	//		$flag = 0
	//		$(AC.source.responseJSON).each(function () {
	//			if($regex.test($(this)[0]['label'].toLowerCase())) {
	//				console.log('yes!')
	//				$flag = 1
	//			}
	//		})
	//		if($flag==0 && e.key.length==1 && !$cntrl){
	//			$t.parent().find('.alert').remove()
	//			$t.parent().append('<p class="alert">Вы пытаетесь ввести несуществующие данные</p>')
	//			$('.ui-autocomplete').hide()
	//			return false
	//		}
	//	})
	//	$t.keyup(function(e) {
	//		if (e.keyCode == 17 || e.keyCode == 16) $cntrl = false
	//	})
    //
	//	$t.autocomplete({
	//		source: options.url,
	//		delay: 500,
	//		search: AC.search,
	//		open: AC.open,
	//		select: AC.select
	//	})
	//};

$i = 0;

	$.fn.ACA = function(options) {
		$i++;
		$t=$(this);

		options.i = $i
		var AC = $.extend({
			//index: $t.index(),
			source : $.ajax({

				url: options.url,
				//async:false,
				success: function(e) {
					//$('body').find('#alert'+options.i).remove()
					return e;
				},
				error: function () {
					//$('body').find('#alert'+options.i).remove()
					//$('body').append('<p class="alert">Во время загрузки данных взникли ошибки. Некоторые функции могут работать некорректно.</p>')
				},
				beforeSend: function() {
					//$t.parent().append('<p id="alert'+options.i+'" class="alert">Подождите пока загрузятся все данные</p>')
				}
			}),
			select: function () {
			},
			open: function () {
			},
			search: function () {
			},
		},options)


		$cntrl = false;



		$t.keypress(function(e) {

			if($key = getChar(e)) {

				if (enKey($key)) {
					$t.parent().find('.alert').remove()
					$t.parent().append('<p class="alert">Допустимы только русские символы</p>')
					return false
				}
				else $t.parent().find('.alert').remove()

				$text = $(this).val() + $key

				$regex = new RegExp("^" + $text.toLowerCase())
				$flag = 0
				$(AC.source.responseJSON).each(function () {
					if ($regex.test($(this)[0]['label'].toLowerCase())) {
						console.log($(this)[0]['label'])
						$flag = 1
					}
				})
				if ($flag == 0) {
					$t.parent().find('.alert').remove()
					$t.parent().append('<p class="alert">Вы пытаетесь ввести несуществующие данные</p>')
					$('.ui-autocomplete').hide()
					return false
				}
			}
		})


		$t.autocomplete({
			source: options.url,
			delay: 500,
			search: AC.search,
			open: AC.open,
			select: AC.select
		})
	};
	function getChar(event) {
		if (event.which == null) { // IE
			if (event.keyCode < 32) return false; // спец. символ
			return String.fromCharCode(event.keyCode)
		}

		if (event.which != 0 && event.charCode != 0) { // все кроме IE
			if (event.which < 32) return false; // спец. символ

			return String.fromCharCode(event.which); // остальные
		}

		return false; // спец. символ
	}


	enKey = function(key) {
		if (key == 'q' || key == 'w' || key == 'e' || key == 'r' || key == 't' || key == 'y' || key == 'u' || key == 'i' || key == 'o' || key == 'p'
			|| key == 'a' || key == 's' || key == 'd' || key == 'f' || key == 'g' || key == 'h' || key == 'j' || key == 'k' || key == 'l' || key == 'z'
			|| key == 'x' || key == 'c' || key == 'v' || key == 'b' || key == 'n' || key == 'm' ) {

			return true
		}
		else return false
	}
})(jQuery);


$(function(){
	//$('.grid-view table').scroll(function(){
	//	alert('ff')
	//})
var table_width=0
	$('body').on('mouseover','.grid-view',function(){
//console.log($(this).is(':has(.fix-head)'))


		$grid_wrap = $(this)
		$grid_table = $(this).find('.items_table table')

		$('.grid-view tr th').resizable({

 			td:false,

 			create: function(){
 				$(this).css({'width':$(this).outerWidth()+'px', 'border':'1px solid #fff'})
					table_width += $(this).outerWidth()
					//console.log($(this).index())
				var index = $(this).index()
					$(this).parents('table').find('td').removeAttr('width')

				//$(this).parents('table').find('tbody tr').eq(0).find('td').eq(index).css({'width':$(this).outerWidth()+'px'})


			},
			start: function(){
				console.log(table_width)
				$(this).parents('table').css({'width':table_width+'px'})
				 td = parseFloat($(this)[0]['style']['width'])
				 table_width -= td

			},
			resize: function(){
				console.log($(this)[0]['style']['width'])
				td = parseFloat($(this)[0]['style']['width'])
				$(this).parents('table').css({'width':table_width+td+'px'})
			},
			stop: function() {
				table_width += td
			}
		})

		//if(!$grid_wrap.is(':has(.fix-head)')) {
		//	$grid = $('.grid-view thead').clone()
		//	$grid.addClass('fix-head')
		//	$grid.css({'position':'absolute','top':'0','left':'0','width': table_width+'px'})
		//	$grid_wrap.find('.items_table table').append($grid)
		//}



		$( ".grid-view tr" ).eq(0).sortable({

			start: function(event, ui){
				index_drag = $(ui.item).index()
				table = $(this).parents('table')
				console.log(index_drag);
				// $(this).css({'z-index':'999'})
				// console.log($(ui.item).index())
			},
			update: function(event, ui){

				index_drop = $(ui.item).index()
				console.log(index_drop);

				// $(this).css({'z-index':'999'})
				 console.log($(ui.item))

				if (index_drop<index_drag) {
					for (var i = index_drag; i > index_drop; i--) {
						table.find('tr').each(function(){
							cell1 = $(this).find('td').eq(i)
							cell2 = $(this).find('td').eq(i-1)

							clone2 = cell2.clone()
							clone1 = cell1.clone()

							cell1.replaceWith(clone2)
							cell2.replaceWith(clone1)
						})
					};
				}
				else if (index_drop>index_drag) {
					for (var i = index_drag; i < index_drop; i++) {
						table.find('tr').each(function(){
							cell1 = $(this).find('td').eq(i)
							cell2 = $(this).find('td').eq(i+1)

							clone2 = cell2.clone()
							clone1 = cell1.clone()

							cell1.replaceWith(clone2)
							cell2.replaceWith(clone1)
						})
					};
				}


			}
		})

		$( "body").on("dblclick", ".grid-view tr", function(){
			location.href = $('#sidebar .operations li[data-action=update] a').attr('href')


		})

	//	$(".grid-view").scroll(sc($(this), $('.items_table').offset()))

	})

	// $('body').('click','.grid-view tr th', function(){

	// })
	function sc(t, pos_par) {
		var pos = t.find('tr').eq(0).offset()
		//console.log(pos)
		//var pos_par = t.parents('items_table').offset()
		console.log(pos_par)
		t.find('tr').eq(0).css({'position':'absolute', 'top':pos_par.top+'px'})
	}
})


