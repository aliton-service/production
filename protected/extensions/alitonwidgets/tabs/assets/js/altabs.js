(function($){
    $.fn.altabs = function(options) {
        var page_url = location.href.replace(/#[\S ]*/, '')

        $t = $(this);
        $t.addClass('ui-altabs')

        var tabs = $.extend({
            select: function () {
            },
            reload: false,
            _load: function (_t) {


                if(_t.parent().hasClass("tab-loaded") && !this.reload) { return false }

                    //if (_t.attr('func') && _t.attr('func') != 0)
                    //
                    //else {
                        $r = _t.attr('href')
                        $url = _t.attr('url')
                        $.ajax({
                            url: _t.attr('url'),
                            beforeSend: function () {
                                $(_t.attr('href')).html('<div class="loader">Loading...</div>')
                            },
                            complete: function() {
                                $(_t.attr('href')).remove('.loader')
                            },
                            success: function (r) {
                                
                                $(_t.attr('href')).html(r);
                                _t.parent().addClass("tab-loaded");

                                     eval(tabs.success)
                                eval(tabs.afterLoad)
                                                                

                            },
                            error: function () {
                                $(_t.attr('href')).html('Error. 404.')
                            }
                        })

                   // }


            }
        }, options)

        $t.tabs()

        $('body').on("click",".ui-altabs .tab-nav li a",function(){
            location.href = page_url + $(this).attr('href')
            $(this).attr('type') == 'ajax' && tabs._load($(this))
            eval(tabs.activate)
        })

        $(function(){
            $(this).find(".tab-nav li.ui-tabs-active a[type='ajax']").each(function () {
                tabs._load($(this))
                eval(tabs.activate)
            })
        })



    }
})(jQuery)