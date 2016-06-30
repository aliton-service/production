(function($) {

    $.fn.togglerDialog = function(options) {
        var element = this;

        var dialog = $.extend({
            label: null,

            _create: function(element) {

                $(element).hide()

                    .append('<div class="close-popup"></div>')
                    .wrap('<div class="togglerDialog">')
                $(element).parent().uniqueId()
                this.id_toggler = 'edit-'+$(element).parent().attr('id')

                $(element).parent().append('<input type="checkbox" class="form-control" id="'+this.id_toggler+'">'
                    +'<label for="'+this.id_toggler+'">'+this.label+'</label>')
                $(element).parent().find('input[type=checkbox]').click(function(){
                    if($(this).is(':checked'))
                        dialog._show(element)
                    else {
                        dialog._hide(element)
                        dialog.unchecked($(element))
                    }
                })
                $(element).find('.close-popup').click(function () {
                    dialog._hide(element)
                })

            },

            _show: function(element) {
                this.beforeShow($(element))
                $(element).dialog({modal:false, minHeight:390, minWidth:350 })
              //  $(element).dialog('destroy')
                this.afterShow()
            },

            _hide: function(element) {
                //$(element).hide().addClass('dialog-open')
                $(element).dialog('destroy')

            },

            beforeShow: function(){},
            afterShow: function(){},
            unchecked: function(){},
        }, options)



        $(element).each(function () {
            $(this).wrap('<div class="modal-box">')
            dialog._create($(this).parent())
        })

    }

})(jQuery);

//(function($) {
//    $.fn.togglerEditForm = function(options) {
//        var element = this;
//
//        var editor = $.extend({
//            label: 'Режим редактирвоания',
//
//            _create: function(element) {
//
//                $(element).addClass('ui-editForm')
//                this.id = $(element).attr('id')
//                $(element).wrap('<div class="togglerEditForm">')
//                $(element).parent().uniqueId()
//                this.id_toggler = 'edit-'+$(element).parent().attr('id')
//
//                $(element).parent().append('<input type="checkbox" class="ui-edit-control form-control" id="'+this.id_toggler+'">'
//                    +'<label for="'+this.id_toggler+'">'+this.label+'</label>')
//
//                this._init(element)
//                $(element).parent().on('click','input[type=checkbox]',function(){
//                    if($(this).is(':checked'))
//                        editor._activateEdit(element)
//                    else
//                        editor._deactivateEdit(element)
//                })
//
//            },
//
//            _init: function(element){
//                if($(element).parent().find('input[type=checkbox]').is(':checked'))
//                    editor._activateEdit(element)
//                else
//                    editor._deactivateEdit(element)
//            },
//
//            _activateEdit: function(element) {
//                this.beforeActivate($(element))
//                $(element).parent().find('input, select, textarea').attr('disabled', false)
//                $('.alcomboboxeditbuttom').removeClass('disabled')
//                this.afterActivate()
//            },
//
//            _deactivateEdit: function(element) {
//                $(element).parent().find('input:not(.ui-edit-control), select, textarea').attr('disabled', true)
//                $('.alcomboboxeditbuttom').addClass('disabled')
//            },
//
//            beforeActivate: function(){},
//            afterActivate: function(){},
//        }, options)
//
//
//
//        $(element).each(function () {
//            if(!$(this).hasClass('ui-editForm'))
//                editor._create(this)
//        })
//
//    }
//})(jQuery);

(function($) {

    $.widget('aliton.ajaxSender', {
        options: {
            ajaxOption: {}
        },
        _init: function() {
            var _t = this


            //this.each(function(){
            //$(this).wrap('<form class="ajaxSender">')
            _t.element.addClass('ajaxSender')
            !_t.options.sendEvent ? _t.options.sendEvent = 'submit' : _t.options.sendEvent
            _t.element.on(_t.options.sendEvent, function(e) {
                e.preventDefault()
                _t._send()
            })
            //  });
        },

        _send: function() {
            var _t = this
            //console.log(_t);

            _t.options.data = {
                params: _t.options.params || null,
                formData: _t.element.serialize(),
            }
            _t.options.data.params == null ? _t.options.data = _t.element.serialize() : ''
            $.ajax(_t.options)
        },

        _setOption: function() {
            $.Widget.prototype._setOption.apply( this, arguments );
        },
    })
//    var sender = {
//
//        ajaxOption: {
//            //method: 'get',
//            //url: '/index.php',
//            //async: true,
//
//        },
//
//        _init: function(options) {
//            $.extend(sender.ajaxOption, options)
//var _t = this
//            //this.each(function(){
//                //$(this).wrap('<form class="ajaxSender">')
//                $(_t).addClass('ajaxSender')
//                !options.sendEvent ? options.sendEvent = 'submit' : options.sendEvent
//                $('body').on(options.sendEvent, _t, function(e) {
//                    e.preventDefault()
//                    sender._send.apply(_t)
//                })
//          //  });
//        },
//
//        _send: function() {
//            var _t = this
//            //console.log(_t);
//
//            sender.ajaxOption.data = {
//                params: sender.ajaxOption.params || null,
//                formData: $(_t).serialize(),
//            }
//            sender.ajaxOption.data.params == null ? sender.ajaxOption.data = $(_t).serialize() : ''
//            $.ajax(sender.ajaxOption)
//        }
//
//
//    }

    //$.fn.ajaxSender = function( method ) {
    //
    //    if ( sender[method] ) {
    //        return sender[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
    //    } else if ( typeof method === 'object' || ! method ) {
    //        return sender._init.apply( this, arguments );
    //    } else {
    //        $.error( 'Метод с именем ' +  method + ' не существует для jQuery.ajaxSender' );
    //    }
    //
    //
    //};




})(jQuery);

//
//(function($){
//
//    var toggler = {
//        options: {
//
//        },
//
//        params: {
//            contain:  'toggleVisible-container',
//            itemClass: 'item-visible',
//            togglerClass: 'toggler-visible',
//            inputClass: '',
//            toggler: '',
//            item: '',
//        },
//
//        _init: function() {
//            if(!this.hasClass('toggleVisible')) {
//                toggler._create.apply(this)
//            }
//        },
//
//        _create: function() {
//            this.wrap('<div class="'+toggler.params.contain+'">'
//                            +'<div class="'+toggler.params.itemClass+'" style="display: none;">'
//                      +'</div>')
//            this.parent().before('<div class="'+toggler.params.togglerClass+'"><input class="'+toggler.params.inputClass+'" type="checkbox"></div>')
//          // this.closest('.'+toggler.params.contain).find('.'+toggler.params.togglerClass+' input[type=checkbox]')
//
//            var _t = this
//
//            this.closest('.'+toggler.params.contain).find('.'+toggler.params.togglerClass+' input[type=checkbox]').on('click', function(){
//                if ($(this).is(':checked')) {
//                    toggler._show.apply(_t)
//                } else {
//                    toggler._hide.apply(_t)
//                }
//
//            })
//        },
//
//        _show: function() {
//
//            this.parent().slideDown(500)
//        },
//
//        _hide: function() {
//            this.parent().slideUp(500)
//        },
//
//        _destroy: function() {
//
//        }
//    }
//
//    $.fn.toggleVisible = function( method ) {
//        if ( toggler[method] ) {
//            return toggler[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
//        } else if ( typeof method === 'object' || ! method ) {
//            return toggler._init.apply( this, arguments );
//        } else {
//            $.error( 'Метод с именем ' +  method + ' не существует для jQuery.toggleVisible' );
//        }
//    };
//
//})(jQuery);


(function($) {
    $.widget('aliton.togglerEditForm', {
        options: {
            label: 'Режим редактирования',
            enabled: false,
            beforeActivate: null,
            afterActivate: null,
        },

        params: {
            classEdit: 'ui-edit-control',
            classCheckBox: 'form-control',
            checked: '',
        },

            _create: function() {



                this.element.addClass('ui-editForm')
                this.id = this.element.attr('id')
                this.element.wrap('<div class="togglerEditForm">')
                this.element.parent().uniqueId()
                this.id_toggler = 'edit-'+this.element.parent().attr('id')

                this.element.parent().append(
                    '<input type="checkbox" class="'+this.params.classEdit+' '+this.params.classCheckBox+'" id="'+this.id_toggler+'">'
                    +'<label for="'+this.id_toggler+'">'+this.options   .label+'</label>')

                if(this.options.enabled) {
                    this.element.parent().find('input.'+this.params.classEdit+'[type=checkbox]').attr('checked', true)
                } else {
                    this.element.parent().find('input.'+this.params.classEdit+'[type=checkbox]').attr('checked', false)
                }

                this._init()
                var _t = this
                this.element.parent().on('change','input.'+this.params.classEdit+'[type=checkbox]',function(){
                    if($(this).is(':checked'))
                       _t._activateEdit()
                    else
                        _t._deactivateEdit()
                })

            },

            _init: function(){
                if(this.element.parent().find('input.'+this.params.classEdit+'[type=checkbox]').is(':checked'))
                    this._activateEdit()
                else
                    this._deactivateEdit()
            },

            _activateEdit: function() {
                this._trigger('beforeActivate')
                this.element.find('input, select, textarea').attr('disabled', false)
                this.element.find('.alcomboboxeditbuttom').removeClass('disabled')
                this._trigger('afterActivate')
            },

            _deactivateEdit: function() {
                this.element.parent().find('input:not(.'+this.params.classEdit+'), select, textarea').attr('disabled', true)
                this.element.find('.alcomboboxeditbuttom').addClass('disabled')
            },

            _destroy: function () {
                this._deactivateEdit()
                this.element.parent().find('input.'+this.params.classEdit).remove()
                this.element.parent().removeClass('togglerEditForm')
            },

            destroy: function() {
                this._destroy()
            },

            _setOption: function() {
                $.Widget.prototype._setOption.apply( this, arguments );
            }
        });


})(jQuery);

(function ($) {
    $.widget('aliton.alToggler', {
        options: {
            label: 'Переключатель',
        },

        params: {
            contain:  'toggleVisible-container',
            itemClass: 'item-visible',
            togglerClass: 'toggler-visible',
            inputClass: 'form-control',
            toggler: '',
            item: '',
        },

        _init: function() {
            if(!this.element.hasClass('toggleVisible')) {
                this._create()
            }
            if($('#'+thiss.params.toggler).is(':checked')) {
                this._show()
            } else {
                this._hide()
            }
        },

        _create: function() {
            this._trigger('beforeCreate')
            this.element.addClass('toggleVisible')
            this.element.wrap('<div class="'+this.params.contain+'">')
            this.element.wrap('<div class="'+this.params.itemClass+'" style="display: none;">')
            this.element.parent().before('<div class="'+this.params.togglerClass+'"><input class="'+this.params.inputClass+'" type="checkbox"></div>')
            this.params.toggler = this.element.closest('.'+this.params.contain).find('.'+this.params.togglerClass+' input[type=checkbox]').uniqueId().attr('id')
            this.element.closest('.'+this.params.contain).find('.'+this.params.togglerClass)
                .append('<label for="'+this.params.toggler+'">'+this.options.label+'</label>')

            var _t = this

            $('#'+this.params.toggler).on('change', function(){
                if ($(this).is(':checked')) {
                    _t._show()
                } else {
                    _t._hide()
                }

            })
        },

        _show: function() {
            this._trigger('beforeShow')
            this.element.parent().slideDown(500)
            this._trigger('afterShow')
        },

        _hide: function() {
            this._trigger('beforeHide')
            this.element.parent().slideUp(500)
            this._trigger('afterHide')
        },

        _destroy: function() {

        },

        _setOption: function() {
            $.Widget.prototype._setOption.apply( this, arguments );
        },
    })
})(jQuery);


(function($){
    $.widget('aliton.modelup', {
        props: {}, // <-- for options.prop
        bindProp: {}, // <-- for options.prop.bind
        options: {
            /*
             * prop - Property model
             * * bind - relations prop model with DOM element (test: '#test'), if change prop then change value DOM element
             * * relations - relations prop model with DOM element, if change value DOM element then change value prop model
             *   ** relations object: {
             *   ** target (string, jQuery selector) - DOM element
             *   ** update (bool) - if true then after change target element full update model and bind DOM element
             *   ** }
             * * onUpdate - a set of methods for execute after update prop. name of method equal name of prop
             * * decorator - decorate output data for this prop bind bloc.
             * * validate - live validate input data
             *   * required -  required or not
             *   * regex - regex or use set:
             *   *  * 1) number - only number,
             *   *  * 2) float - only float with use '.' or ','
             *   *  * 3) default - any symbol
             *   * maxLength - max length symbol
             *   * minLength - min length symbol
             *   * max - max value
             *   * min - min value
             * sendAjax - jQuery ajax options for send data in controller
             * table - Name table model
             * eventSend - event for send data
             * sendData - 1) array, list props send in controller, 2) object, any params send, 3) string, 'all' - all prop model
             * onChange - event change, before send data
             * source - source property model
             * decorator - decorate output data for general bloc element. result only return
             * updateAfterChange - update bind blocks after update props of model
             * timeLiveUpdate - interval update model data (ms)
             * whiteList - update and add onlythis list ({key:true})
             */

            eventSend: 'submit',
            sendData: 'all',
            source: '/?r=AjaxData/model',
            updateAfterChange: true,
            timeLiveUpdate: 15000,
            onUpdateProp: {},

            decorator: function(elem) {
                return '<div>'+elem+'</div>'
            }
        },

        errors: {
            props:[],
        },
        actualData: true,

        settings: {
            className: 'model',
            msgs: {
                errorUpdateProps: 'Произошла ошибка обновления данных модели',
                changePropOut: 'Данные модели были изменены извне. Данные обновлены.',
                valid: {
                    requiredField: ' Это обязательное поле.',
                    number: ' Допустимы только цифры.',
                    float: 'Допустимы только цифры с плавающей точкой (после точки только 2 символа).',
                    minLength: function(v) {
                        return ' Минимальное количество символов '+v+'.'
                    },
                    maxLength: function(v) {
                        return ' Максимальное количество символов '+v+'.'
                    },
                    min: function(v) {
                        return ' Минимальное значение '+v+'.'
                    },
                    max: function(v) {
                        return ' Максимальное значение '+v+'.'
                    },
                    default: ' Введите корректные данные.',

                    incorrectProp: function(prop) {
                        return 'Получены некорретные данные для свойства: '+prop+'.'
                    },
                    confirmUsedIncorrectData: function(prop) {
                        return 'Получены некорректные данные для поля "'+prop+'.'
                        +'", они могут нанести вред информационной системе. Использовать эти данные?'
                    },
                    allModelDataUpdate: 'Данные модели успешно обновлены.',
                    notAllModelDataUpdate: 'Данные модели обновлены с ошибками.',
                    addNewPropInModel: 'Были добавлены новые свойства в модель.'
                },
            },
            validate: {
                number: /^[0-9]*$/,
                float: /^(?:[\d]|$)(?:[\d]*)(?:\.|\,?)[\d]{0,2}$/,
                default: /^[\S ]*$/,
            },
            timeLive: {
                informer: 10,
            },
            ACA: {
                data_attr: 'data-aca',
                container: 'container',
                placeholder: 'placeholder',
                input: 'input',
            }
        },


        _init: function() {
            if(!$(this.element).hasClass(this.settings.className))
                this.element.almodel || this._create()
        },


        _create: function(event) {
            _t = this
            this.element.addClass(this.settings.className)
            this.element.almodel = true
            this._registerProps()
            for(prop in this.options.prop) {
                this.options.prop[prop].bind && this._bindPropToElement(prop)
                this.options.prop[prop].relations && this._createRelations(prop)
                this.options.prop[prop].validate && this._validation(prop)
                _t.options.prop.value = _t.options.prop.bind = false
            }
            this.update()

            $('body').on('click','.informer .close', function () {
                $.when($(this).parent().fadeOut(500)).then(function () {
                    $(this).remove()
                })
            })

            this._createDaemons()

            $(this.element).on('change', function () {
                _t._trigger('onChange', event, _t.options.prop)

            })
            _t.options.eventSend && this.options.sendForm && $('body').on(_t.options.eventSend, this.options.sendForm || this.element, function (e) {
                e.preventDefault()
                _t.sendData()
            })
        },


        _registerProps: function () {
            for(prop in this.options.prop) {
                this.props[prop] = this.options.prop[prop].value
            }
        },


        _createRelations: function(prop) {
            _t = this
            $(this.options.prop[prop].relations.target).addClass('model-rel')
            $(this.options.prop[prop].relations.target+'.model-rel').on('change', function () {
                if( update in _t.options.prop[prop].relations
                    && _t.options.prop[prop].relations.update === true ) {
                    var update = true
                } else {
                    var update = false
                }
                _t.setProp(_t.options.prop[prop].relations.target, $(this).val(), update)
            })
        },


        _bindPropToElement: function(prop) {
            _t = this
            //var value = _t.options.prop[prop]
            _t.bindProp[prop] = _t.options.prop[prop].bind
            $(_t.bindProp[prop]).addClass('model-bind')
            $(_t.bindProp[prop]+'.model-bind').on('keypress', function(e){
                if(e.keyCode == 27) {
                    $(this).val(_t.props[prop]).blur()
                }

            })
                .on('change', function(){
                    _t.setProp(prop,$(this).val())
                })
        },


        _createDaemons: function() {
            _t = this
            timeLive = this.settings.timeLive.informer
            setInterval(function () {
                $('.info-block').each(function () {
                    $(this).hasClass('remove') ? $(this).remove() : ''
                    var timeout = $(this).attr('data-timeout')
                    timeout == 0 ? $.when($(this).fadeOut(1500)).then(function(){
                        $(this).addClass('remove')
                    })
                    : $(this).attr('data-timeout', --timeout)
                })
            }, 1000)
            $('body').on('mouseenter, mousemove', '.info-block', function () {
                    $(this).stop().attr('data-timeout', timeLive).fadeIn(500).removeClass('remove')
                })

            this.options.liveUpdate && setInterval(function () {
                _t.updateProps(true, true)
            }, this.options.timeLiveUpdate)

        },


        _validation: function(prop) {
            _t = this
            var regex = _t.options.prop[prop].validate.regex
                ,required = _t.options.prop[prop].validate.required,
                min = ((regex == 'number' || regex == 'float') && _t.options.prop[prop].validate.min) || false,
                max = ((regex == 'number' || regex == 'float') && _t.options.prop[prop].validate.max) || false,
                minLength = _t.options.prop[prop].validate.minLength,
                maxLength = _t.options.prop[prop].validate.maxLength,
                erorCode = 'default',
                set = []

            if(regex && typeof regex == 'string') {
                erorCode = regex
                _t.settings.validate[regex] ? regex = _t.settings.validate[regex]
                    : regex == 'set' ? set = _t.options.prop[prop].validate.set : regex = _t.settings.validate.default
            }

            //if(typeof props == 'string') {
            //
            //}
            if(regex && regex !== 'set') {
                _liveValidation()
            } else if(regex === 'set' && set) {
                _ACA()
            }

            function _ACA() {

                var value = _t.props[prop]
                    ,placeholder
                    ,original_value
                //var regex = new RegExp('^'+value.toLowerCase())


                $(_t.bindProp[prop]).autocomplete({
                    source: [],
                    focus: function (e, ui) {
                        var value = $(this).val()
                        var regexp = new RegExp('^'+value,'i')
                        placeholder = ui.item.value.replace(regexp, value)
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').val(placeholder)
                        return false
                    }
                })
                    .wrap('<div '+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.container+'">')
                    .attr(_t.settings.ACA.data_attr, _t.settings.ACA.input)
                    .before('<input style="display: none" '+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'" value="">')
                    .on('keypress', function(e) {
                        if (e.keyCode === 13) {
                            $(this).val(placeholder)
                                .change()
                            return false
                        }
                        var f = 0
                            ,new_value = $(this).val()
                            ,regex = new RegExp('^'+new_value.toLowerCase())

                        for(var i = 0; i < set.length; i++) {
                            if(regex.test(set[i].toLowerCase())) {
                                f = 1
                                value = $(this).val()
                            }
                        }
                        if(f === 0) {
                            return false
                        }
                    })
                    .on('keyup', function(e) {
                        switch (e.keyCode) {
                            case 40:
                            case 38:
                                return false
                            case 27:
                                console.log(_t.props[prop])
                                $(this)
                                    .val(_t.props[prop])
                                    .autocomplete('close')
                                    .blur()
                                return false
                            default:
                                break
                        }
                        var f = 0
                            ,new_value = $(this).val()
                            ,regex = new RegExp('^'+new_value.toLowerCase())
                            ,source = []
                        placeholder = ''
                        for(var i = 0; i < set.length; i++) {
                            if(regex.test(set[i].toLowerCase())) {
                                if(f === 0 && new_value != 0) {
                                    var regexp = new RegExp('^'+new_value,'i')
                                    placeholder = set[i].replace(regexp, new_value)
                                    original_value = set[i]
                                }
                                f = 1
                                source.push(set[i])
                            }
                        }
                        if(f===0){
                            $(this).val(value)
                            var regexp = new RegExp('^'+value,'i')
                            placeholder = set[i].replace(regexp, value)
                        }
                        $(this).autocomplete('option',{source: source})
                        $(this).autocomplete('search')
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').val(placeholder)
                    })
                    .on('focus',function(){
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').show()
                    })
                    .on('blur',function(){
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').hide()
                    })
                    .on('change', function(){
                        $(this).val(original_value)
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').val(original_value)
                    })
            }

            function _liveValidation() {
                var value = _t.props[prop]

                $(_t.bindProp[prop]).tooltip()

                $(_t.bindProp[prop]).on('keypress', function (e) {
                    if ((regex && !regex.test($(this).val()))
                        || (maxLength && $(this).val().length > maxLength)
                        || (max && parseFloat($(this).val()) > max)) {
                        return false
                    }
                    value = $(this).val()
                })
                    .on('keyup', function () {
                        var tooltip = false
                        var tooltip_msg = ''

                        if (regex && regex !== 'set') {
                            if (!regex.test($(this).val())) {
                                $(this).val(value)

                                tooltip = true
                                tooltip_msg = _t.options.prop[prop].validate.label
                                    || _t.settings.msgs.valid[erorCode]
                                    || _t.settings.msgs.valid.default
                            } else {
                                tooltip = false
                            }

                        }

                        if (minLength) {
                            if ($(this).val().length < minLength) {
                                tooltip = true
                                tooltip_msg += _t.settings.msgs.valid.minLength(minLength)
                            }
                        }

                        if (maxLength) {
                            if ($(this).val().length > maxLength) {
                                $(this).val(value)
                                tooltip = true
                                tooltip_msg += _t.settings.msgs.valid.maxLength(maxLength)
                            }
                        }

                        if (min) {
                            if (parseInt($(this).val()) < min) {
                                tooltip = true
                                tooltip_msg += _t.settings.msgs.valid.min(min)
                            }
                        }

                        if (max) {
                            if (parseInt($(this).val()) > max) {
                                $(this).val(value)
                                tooltip = true
                                tooltip_msg += _t.settings.msgs.valid.max(max)
                            }
                        }

                        if ($(this).val() == '' && required) {
                            tooltip = true
                            tooltip_msg += _t.settings.msgs.valid.requiredField
                        }
                        tooltip ? $(this).attr('title', tooltip_msg).tooltip('open') : $(this).tooltip('close')

                    })
                    .on('keydown', function () {
                        $(this).tooltip('close')
                    })
            }
        },


        _validateData: function (props) {
            _t = this
            var error_prop = 0
            for(prop in props) {
                var error = 0
                if(_t.options.prop[prop] && _t.options.prop[prop].validate) {
                    var regex = _t.options.prop[prop].validate.regex,
                        min = ((regex == 'number' || regex == 'float') && _t.options.prop[prop].validate.min) || false,
                        max = ((regex == 'number' || regex == 'float') && _t.options.prop[prop].validate.max) || false,
                        minLength = _t.options.prop[prop].validate.minLength,
                        maxLength = _t.options.prop[prop].validate.maxLength
                }
                if(regex && typeof regex == 'string') {
                    erorCode = regex
                    _t.settings.validate[regex] ? regex = _t.settings.validate[regex]
                        : regex = _t.settings.validate.default
                }

               if (regex && !regex.test(props[prop])) {
                   error++
                   _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
               }

                if (maxLength && props[prop].length > maxLength) {
                    error++
                    _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
                }

                if (minLength && props[prop].length < minLength) {
                    error++
                    _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
                }

                if (max && parseFloat(props[prop]) > max) {
                    error++
                    _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
                }

                if (min && parseFloat(props[prop]) < min) {
                    error++
                    _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
                }

                if(error > 0) {
                    error_prop++
                }

                if(error > 0 && !confirm(_t.settings.msgs.valid.confirmUsedIncorrectData(prop))) {
                    props[prop] = null
                }
            }

            //error_prop == 0 && this._addSuccessMsg(_t.settings.msgs.valid.allModelDataUpdate)
            //error_prop > 0 && this._addWarning(_t.settings.msgs.valid.notAllModelDataUpdate)
            return error_prop

        },


        _addError: function(msg) {
            var date = new Date()
            this.errors.props.push({
                date:date.getHours()+':'+date.getMinutes()+':'+date.getSeconds(),
                msg: msg,
            })
            this._createInformer(msg, 'error')
        },


        _addInformation: function(msg) {
            this._createInformer(msg, 'info')
        },


        _addWarning: function(msg) {
            this._createInformer(msg, 'warning')
        },


        _addSuccessMsg: function(msg) {
            this._createInformer(msg, 'success')
        },


        _createInformer: function(msg, code) {
            return false
            if(!code) code='info'
            $('.informer').length > 0 ? '' : $('body').append('<div class="informer"></div>')
            $('.informer').append('<div data-timeout="'+this.settings.timeLive.informer+'" class="'+code+' info-block">'
                +msg+'<div class="close"></div></div>')
        },


        _destroy: function() {
            _t = this
           // $(this.element).off()// исправить на конкретные функции, дабы не сорвать события, повешанные из других мест
                .removeClass(_t.settings.className)

            //for(rel in this.options.relations) {
            //    $(this.options.relations[rel].target).off() // исправить на конкретные функции, дабы не сорвать события, повешанные из других мест
            //}
        },


        _setOption: function() {
            $.Widget.prototype._setOption.apply( this, arguments );
        },


        getProp: function(prop) {
            if(!prop) {
                return this.props
            } else {
                return this.props[prop]
            }
        },

        getOpt: function(opt) {
            if(!opt) {
                return this.options
            } else {
                return this.options[opt]
            }
        },

        setProp: function (props, value, update) {
            var error = 0, change = 0;
            if(typeof props == 'string') {
                var prop = props
                props = {}
                props[prop] = value
                value = update
            }
            error = this._validateData(props)
            if(typeof props == 'string') {
                this.props[props] = value
                change = {}
                change[props] = value
                if(update) {
                    this.updateProps()
                    return false
                }
            } else if(typeof props == 'object'){
                //if(value === false && update === true) {
                    change = this._checkChangeData(props)
                    //console.log(change)
                //}
               // console.log('test update')
               // for(prop in props) {
               //     if (this.options.whiteList && !(prop in this.options.whiteList)) {
               //         delete props[prop]
               //     }
               // }

                $.extend(this.props, props);
                //( typeof value == 'string' && this.updateProps(value) )
                //|| ( value === true && this.updateProps(value) )
                if(typeof value == 'string' || value === true) {
                    this.updateProps(value)
                    this._callAfterUpdateProps(change)
                    this.actualData = false
                    return false
                }
            }

            //console.log(change)
            //console.log(error)
            //console.log(update)

            if(change && value === false && update === true) {
                this._addInformation(this.settings.msgs.changePropOut)
            }
            if(error) {
                this._addWarning(this.settings.msgs.valid.notAllModelDataUpdate)
            }
            if(!change) this.actualData = true
            if((change && !error && !update) || !this.actualData) {
                this._addSuccessMsg(this.settings.msgs.valid.allModelDataUpdate)
                this.actualData = true
            }
            //if(!_t.actualData) {
            //    this._addSuccessMsg(_t.settings.msgs.valid.allModelDataUpdate)
            //    _t.actualData = true
            //}

            this._callAfterUpdateProps(change)

            this.update()
        },


        _checkChangeData: function(props) {
            var i = 0, p = {}, k = 0
            for(prop in props) {
                if (this.options.whiteList && !(prop in this.options.whiteList)) {
                    delete props[prop]
                    continue
                }
                if(this.props[prop] && this.props[prop] != props[prop]) {
                    i++
                    p[prop] = prop
                } else if(!(prop in this.props)) {
                    k++
                }
            }
            k > 0 && this._addInformation(this.settings.msgs.valid.addNewPropInModel)
            //i > 0 && this._addInformation('Данные модели были изменены извне. Данные обновлены.')
            return i ? p : false
        },


        sendData: function() {
            _t = this
            var sender = $.extend(true,{
                url: this.options.source,
                data: $.extend({},this.formData(this.options.prop),{table: this.options.table,action:'call_sp'}),
                method: 'post',
                success: function() {

                },
                error: function () {

                },
            }, this.options.sendAjax)
            $.ajax(sender)

            this.updateProps()
        },


        formData: function() {
            var data = {}
            if(this.options.sendData == 'all') {
                data[this.options.table] = this.props
            } else if(typeof this.options.sendData == 'object') {
                if(this.options.sendData.length) {
                    var props = {}
                    for(i = 0; i < this.options.sendData.length; i++) {
                        props[this.options.sendData[i]] = this.props[this.options.sendData[i]]
                    }
                    data[this.options.table] = props
                } else {
                    data = this.options.sendData
                }
            }
            return data
        },


        updateProps: function(source, check) {
            _t = this
            if(!_t.options.source && !source) {
                this.update()
                return false
            }
            $.ajax({
                url: (typeof source == 'string' && source) || _t.options.source,
                method: 'post',
                dataType: 'json',
                data: $.extend({action:'update_props',table: this.options.table, addparams: this.options.addparams || ''},_t.formData()),
                success: function(r) {
                    if(!typeof r == 'object') return false
                    _t.setProp(r.props,false, check)
                },
                error: function() {
                    _t._addError(_t.settings.msgs.errorUpdateProps)
                    _t.actualData = false
                }
            })
        },


        _callAfterUpdateProps: function (props) {
            //this.options.onUpdateProp.all && this.options.onUpdateProp.all()
            switch (typeof props) {
                case 'string':
                    this.options.prop[props].onUpdate && this.options.prop[props].onUpdate()
                    break
                case 'object':
                    for(prop in props) {
                       // console.log(this.options.prop[prop])
                        //if(typeof props[prop] == 'string' || typeof props[prop] == 'number') {
                        //    this.options.onUpdateProp[prop] && this.options.onUpdateProp[prop]()
                        //}
                        this.options.prop[prop] && this.options.prop[prop].onUpdate && this.options.prop[prop].onUpdate()
                    }
                    break
                default:
                    break
            }
        },


        update: function() {
            if(!this.options.updateAfterChange) {
                return false
            }
            for(elem in this.bindProp) {
                $(this.bindProp[elem]).val(this.props[elem])
                    .html((this.options.prop[elem].decorator && typeof this.options.prop[elem].decorator == 'function')
                        ? this.options.prop[elem].decorator(this.props[elem]) :
                        ((this.options.decorator && typeof this.options.decorator == 'function')
                            ? this.options.decorator(this.props[elem]) : this.props[elem]))
            }
        },


        destroy: function() {
            this._destroy()
        }
    })
})(jQuery);


//
//(function ($,undefined) {
//    $.widget('aliton.aldialog', $.ui.dialog, {
//        options: {
//
//        },
//
//        msg: {
//            errorLoadData: 'Не удалось загрузить данные',
//        },
//
//        ajaxOptions: {
//            success: function(r) {
//                _t.element.html(r)
//            },
//            error: function() {
//                _t.element.html(_t.msg.erorLoadData)
//            }
//        },
//
//        _create: function() {
//            var _t = this
//            $.ui.dialog.prototype._create.call(_t);
//            if(_t.options.ajaxOptions && typeof _t.options.ajaxOptions != 'object') {
//                $.extend(_t.ajaxOptions, _t.options.ajaxOptions)
//                $.ajax(_t.ajaxOptions)
//            }
//
//        },
//
//        destroy: function() {
//            $.ui.dialog.prototype.destroy.call(_t);
//        },
//
//
//    })
//})(jQuery)
