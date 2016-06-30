(function($){
    
    var albuttonSettings = [];
    
    Buttonmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Width: null,
                Height: null,
                Text: null,
                ShowGlyph: null,
                Href: null,
                FormName: null,
                Type: null,
                Params: [],
                ParamsStr: '',
                OnAfterClick: '',
            }, options || {});
            
            var id = settings.id;
            
            settings.albuttonSelector = "#" + id;
            
            return this.each(function(){
                albuttonSettings[id] = settings;
                
                $(document).on("click", settings.albuttonSelector, function(event){
                    
                    console.log(settings);
                    
                    $(settings.albuttonSelector).albutton("setParamsValue");
                    
                    if (settings.Type == 'Window')
                        $(location).attr('href', settings.Href + settings.ParamsStr);
                    
                    if (settings.Type == 'NewWindow')
                        window.open(settings.Href + settings.ParamsStr);
                    
                    if (settings.Type == 'Ajax')
                        $.ajax({
                                url: settings.Href + settings.ParamsStr,
                                type: 'GET',
                                async: true,
                                success: function(){
                                    location.reload(true);
                                }
                            });
                    
                    if (settings.Type == 'Form')
                    {
                        
                        $("#" + settings.FormName).submit();
                    }
                    
                    eval(settings.OnAfterClick);
                });
                
                
            });
            
            
        },
        setParamsValue: function(){
            var id = $(this).attr("id");
            
            albuttonSettings[id].ParamsStr = '';
            
            for (var i = 0; i < albuttonSettings[id].Params.length; i++)
            {
                if (albuttonSettings[id].Params[i].TypeControl == "Grid")
                {
                    var CurrentRow = $("#" + albuttonSettings[id].Params[i].NameControl).algridajax("getCurrentRow");
                    var Value = CurrentRow[albuttonSettings[id].Params[i].FieldControl];
                    albuttonSettings[id].ParamsStr += "&" + albuttonSettings[id].Params[i].ParamName + "=" + Value;
                }
            }
        },
    };
    
    $.fn.albutton = function(method){
        if (Buttonmethods[method]) {
            return Buttonmethods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return Buttonmethods.init.apply(this, arguments);
        } else
            return false;
    };
    
})(jQuery);

