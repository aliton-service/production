$(function($){
    Dialogmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null
            }, options || {});
            
            var id = settings.id;
            
            settings.alDialogSelector = "#" + id;
            settings.alBlockPanel = "#alBlockPanel_" + id;
            settings.alDialogContent = "#alDialogContent_" + id;
                    
            return this.each(function(){
                id = $(this).attr("id");
                aldialogSettings[id] = settings;
                
                if (typeof Aliton !== "undefined") {
                    Aliton.Objects[id] = {
                        id: id,
                        Type: "Dialog",
                        Ready: false,
                        Settings: settings,
                    };
                }
                
                $(this).aldialog("Run");
            });
        },
        
        DrawControl: function() {
            id = $(this).attr("id");
            var Str = "";
            Str += "<div id='" + aldialogSettings[id].alDialogContent + "'></div>";
            Str += "<div id='" + aldialogSettings[id].alBlockPanel + "'></div>";
            $(aldialogSettings[id].alDialogSelector).append(Str);
        },
        
        Run: function() {
            id = $(this).attr("id");
            $(this).aldialog("DrawControl");
        },
    };
    
    $.fn.aldialog = function(method){
        if (Dialogmethods[method]) {
            return Dialogmethods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return Dialogmethods.init.apply(this, arguments);
        } else
            return false;
    };
});


