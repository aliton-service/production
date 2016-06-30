<?php
/**
 *
 * @var EventOffersController $this
 */


$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
	'reload' => false,
	'id' => 'event-offer',
	'header' => array(
		array(
			'name' => 'События',
			'options' => array(
				'data-type' => 'event',
			),
//			'ajax'=>true,
//			'options'=>array(
//				'url'=>$this->createUrl('Demands/TabGeneral'),
//			),
		),
		array(
			'name' => 'Предложения',
			'options' => array(
				'data-type' => 'offer',
			),
//			'ajax'=>true,
//			'options'=>array(
//				'url'=>$this->createUrl('Demands/TabAdministration'),
//			),
		),
	),
	'content' => array(
		array(
			'id' => 'tabEvent',
			'content' => '<div id="listEvent">Загрузка данных...</div>'
		),

		array(
			'id' => 'tabOffer',

			'content' => function() {
				?>
				<div class="btn-group">
				<?php
				$this->widget('application.extensions.alitonwidgets.button.albutton', array(
					'id' => 'offerGr1',
					'Text' => 'Предложения по модернизации',
					'Type' => 'none',
					'OnAfterClick' => 'group_id = 1; loadOffers()',
				));

				$this->widget('application.extensions.alitonwidgets.button.albutton', array(
					'id' => 'offerGr2',
					'Text' => 'Комплексное обслуживание',
					'Type' => 'none',
					'OnAfterClick' => 'group_id = 2; loadOffers()',
				));

				$this->widget('application.extensions.alitonwidgets.button.albutton', array(
					'id' => 'offerGr3',
					'Text' => 'Другие предложения',
					'Type' => 'none',
					'OnAfterClick' => 'group_id = 3; loadOffers()',
				));
				?>
				</div>
				<?php
				echo '<div id="listOffer">Загрузка данных...</div>';
			}

		)
	),

	'afterActivate' => 'loadData()'
));

?>

<!--<div id="listOffer">Загрузка данных...</div>-->
<br>
<label>Примечание</label>
<?php
$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
	'id' => 'offerNote',
	'Name' => 'EventOffers[note]',
	'Width' => 400,
));
?>

<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'change',
		'Text' => 'Изменить',
		'Type' => 'none',
		'OnAfterClick' => 'window.open("/?r=events/view&id="+evnt_id)',
	));
	?>
</div>


<script>
	var events = false;
	var offers = false;
	var group_id = 1;
	var evnt_id = 0;

	loadData();

	$(document).on('click', '#tabOffer .albutton', function() {
		$('#tabOffer .albutton').removeClass('selected');
		$(this).addClass('selected');
	})

	function loadData() {
		switch ($('#event-offer .ui-tabs-active a').attr('data-type')) {
			case 'event':
				loadEvents();
				break
			case 'offer':
				loadOffers();
				break;
			default:
				break;
		}
	}

	function loadEvents() {
		if($('#listEvent').hasClass('loaded')) {
			return false
		}
		$.ajax({
			url: '/?r=eventOffers/GetObjectEvents&objgr_id=<?php echo $objgr_id ?>',
			dataType: 'json',
			success: function (r) {
				if (r.status != 'ok') {
					return false
				}

				events = r.data
				var html =
					'<div class="header items">'
						+'<div class="item">'
							+ '<div class="item-field">Дата</div>'
							+ '<div class="item-field">Исполнитель</div>'
							+ '<div class="item-field">Дата выполнения</div>'
						+'</div>'
					+ '</div>'
					+ '<div class="clearfix"></div>';
				var type = '';
				var lvl = 0;

				for (i in events) {
					if (events[i].eventtype != type) {
						if (lvl > 0) {
							html += '</div></div>'
						}
						lvl++;
						type = events[i].eventtype;
						html += '<div class="offers-group"><i class="list">+</i><a class="title">' + events[i].eventtype + '</a><div class="items">'
					}
					html += '<div class="item" data-id="' + i + '"><div class="item-field">' + events[i].date.split(' ')[0] + ' </div><div class="item-field"> ' + events[i].empl_name + '</div>'
						+ '<div class="item-field">'+events[i].date_exec+'</div>';
					html += '<div class="clearfix"></div></div>'
				}
				if (lvl > 0) {
					html += '</div></div>'
				}
				$('#listEvent').html(html);
				$('#listEvent').addClass('loaded')
			}
		})

		$('#listEvent').on('click', '.offers-group a', function () {
			if ($(this).parent().find('.items').is(':hidden')) {
				$(this).parent().find('.items').show();
				$(this).parent().find('.list').text('-')
			} else {
				$(this).parent().find('.items').hide();
				$(this).parent().find('.list').text('+')
			}
		})

		$('#listEvent').on('click', '.items .item', function () {
			$('#listEvent .items .item').removeClass('selected');
			$(this).addClass('selected');
			$('#offerNote').almemo('SetValue', events[$(this).attr('data-id')].note)
			evnt_id = offers[$(this).attr('data-id')].evnt_id
		})
	}

	function loadOffers() {
		if($('#listOffer').hasClass('loaded') && group_id == $('#listOffer').attr('data-gr')) {
			return false
		}
		$.ajax({
			url: '/?r=eventOffers/GetObjectOffers&objgr_id=<?php echo $objgr_id ?>&group_id='+group_id,
			dataType: 'json',
			success: function (r) {
				if (r.status != 'ok') {
					return false
				}

				offers = r.data
				var html = ''
					+'<div class="header items">'
						+'<div class="item">'
							+ '<div class="item-field">Дата</div>'
							+ '<div class="item-field">Исполнитель</div>'
							+ '<div class="item-field">Результат</div>'
							+ '<div class="item-field">Примечание</div>'
						+'</div>'
					+ '</div>'
					+ '<div class="clearfix"></div>'
				var type = ''
				var lvl = 0

				for (i in offers) {
					if (offers[i].offertype != type) {
						if (lvl > 0) {
							html += '</div></div>'
						}
						lvl++
						type = offers[i].offertype
						html += '<div class="offers-group"><i class="list">+</i><a class="title">' + offers[i].offertype + '</a><div class="items">'
					}
					html += '<div class="item" data-id="' + i + '"><div class="item-field">' + offers[i].date.split(' ')[0] + ' </div><div class="item-field"> ' + offers[i].emplname + '</div>'
						+ '<div class="item-field">'+offers[i].resultname+'</div>'
						+ '<div class="item-field">'+offers[i].note+'</div>'
						+ '<div class="clearfix"></div></div>'
				}
				if (lvl > 0) {
					html += '</div></div>'
				}
				$('#listOffer').html(html)
				$('#listOffer').addClass('loaded');
				$('#listOffer').attr('data-gr',group_id)
			}
		})

		$('#listOffer').on('click', '.offers-group a', function () {
			if ($(this).parent().find('.items').is(':hidden')) {
				$(this).parent().find('.items').show();
				$(this).parent().find('.list').text('-')
			} else {
				$(this).parent().find('.items').hide();
				$(this).parent().find('.list').text('+')
			}
		})

		$('#listOffer').on('click', '.items .item', function () {
			$('#listOffer .items .item').removeClass('selected');
			$(this).addClass('selected');
			$('#offerNote').almemo('SetValue', offers[$(this).attr('data-id')].note);
			evnt_id = offers[$(this).attr('data-id')].evnt_id
		})
	}
</script>