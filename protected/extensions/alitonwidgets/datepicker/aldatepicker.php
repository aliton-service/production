<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 08.09.2015
 * Time: 17:36
 */

class aldatepicker extends CWidget {

	public $id = null;
	public $onChange= null;
	public $name = null;
	public $value = null;
	public $label = false;
	public $options = false;


	public function init() {
		parent::init();
	}

	public function run() {

		Yii::app()->clientScript->registerPackage('jquery_js');

		if($this->name == null) {
			$this->name = 'datepicker-'.uniqid();
		}

		if($this->value && $this->value != null) $datetime ="value=\"".Yii::app()->dateFormatter->formatDateTime("$this->value", 'alFormat', 'alFormat')."\"";
		else $datetime = null;

		if($this->label) {
			?>
			<label><?=$this->label?></label>
			<?php
		}
		?>
		<input id="<?=$this->id?>" name="<?=$this->name?>" <?php $this->renderOptions() ?><?=$datetime?>>
		<script>
			$(function () {
				var ph = $(this).val()
				$("input[name='<?=$this->name?>']").datepicker({
					changeMonth: true,
					changeYear: true,
					dateFormat: 'dd.mm.yy',
					firstDay: 1, changeFirstDay: false,
					navigationAsDateFormat: false,
					showButtonPanel:true,
					duration: 0,
					currentText: 'Сегодня',
					closeText: 'Закрыть',
					monthNamesShort: ["Янв", "Фев", "Март", "Апр", "Май", "Июнь", "Июль", "Авг", "Сен", "Окт", "Нояб", "Дек"],
					dayNamesMin: ["Вс","Пн","Вт","Ср","Чт","Пт","Сб"],
					onSelect: function() {
						datepickerTimeSetTime();
						eval(<?=json_encode($this->onChange)?>)
					}

				}).click(function(){
					$(".datepickerTimeSelected").removeClass("datepickerTimeSelected");
					$(this).addClass("datepickerTimeSelected");
					//datepickerTimeSetClockSelect();
					var v = $(this).val().split(' ')
					if(v.length > 1)
					{
						var his = v[1].split(":");
						$("input[name=h]").val(his[0]);
						$("input[name=i]").val(his[1]);
					}

					var ph = $(this).val()

				})
					.keyup(function(e){
						var v = $(this).val().split(' ')
						if(v.length > 1)
						{
							var his = v[1].split(":");
							$("input[name=h]").val(his[0]);
							$("input[name=i]").val(his[1]);
						}

					});
				$("input[name='<?=$this->name?>']").mask("99.99.9999 99:99",{placeholder:"дд.мм.гггг чч:мм"})
					.val(<?=$datetime?>);



			})
		</script>
		<?php
	}

	public function renderOptions()
	{

		if(isset($this->options) && is_array($this->options) && count($this->options)>0)
		{
			foreach($this->options as $key => $value)
			{
				echo ' '.$key.'="'.$value.'"';
			}
		}


	}

}