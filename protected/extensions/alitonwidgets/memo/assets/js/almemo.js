(function($){
    Memomethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Width: 100,
                Value: null,
                ReadOnly: false,
                Name: '',
                Type: 'String',
                Ready: false,
                Mode: 'Standart',
            }, options || {});
            
            var id = settings.id;
            
            settings.alMemoSelector = "#" + id;
            settings.alMemoTextAreaSelector = "alMemoTextArea_" + id;
            
            return this.each(function(){
                almemoSettings[id] = settings;
                id = $(this).attr("id");
                
                if (typeof Aliton !== "undefined") {
                    Aliton.Objects[id] = {
                        id: id,
                        Type: "Memo",
                        Ready: false,
                        Settings: settings,
                    };
                }
                
                $(this).almemo("Run");
                
                $(document).on('keyup', settings.alMemoSelector +  " .almemocontrol", function(event){
                    var Value = $("#" + settings.alMemoTextAreaSelector).val();
                    if (Value !== settings.Value) {
                        $(settings.alMemoSelector).almemo("SetValue", Value);
                    }
                    
                    if (event.keyCode == 13)
                        Aliton.ChangeValue(id);
                });
            });
        },
        
        Refresh: function() {
            var id = $(this).attr("id");
            var Result = Aliton.SearchForeignFilters(id);
            if ((Result[0].Condition == null) || (Result[0].Condition === "null"))
                $(this).almemo("SetValue", "");
            else
                $(this).almemo("SetValue", Result[0].Condition);
            
        },
        
        SetValue: function(Value, Ready) {
            var id = $(this).attr("id");
            
            if (almemoSettings[id].Type === "Numeric") {
                if ((!$.isNumeric(Value)) && (Value !== "")) { 
                    $("#" + almemoSettings[id].alMemoTextAreaSelector).val(almemoSettings[id].Value);
                    return;
                }
            } 
            if (Value === "") 
                almemoSettings[id].Value = null
            else 
                almemoSettings[id].Value = Value;
            
            $("#" + almemoSettings[id].alMemoTextAreaSelector).val(almemoSettings[id].Value);
            
            if (Ready) {
                almemoSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
            
            if (almemoSettings[id].Mode === "Auto")
                Aliton.ChangeValue(id);
        },
        
        DrawControl: function() {
            var id = $(this).attr("id");
            var ReadOnly = "";
            if (almemoSettings[id].ReadOnly)
                ReadOnly = "readonly='readonly'";
            var Str = "";
            Str += "<tbody>";
            Str += "    <tr>"
            Str += "        <td style='width:100%;'>";
            Str += "            <textarea class='almemocontrol' id='" + almemoSettings[id].alMemoTextAreaSelector+ "' name='" + almemoSettings[id].Name + "' " + ReadOnly + " style='height: 100%; width: 100%;'></textarea>";
            Str += "        </td>";
            Str += "    </tr>";
            Str += "</tbody>";
            $(almemoSettings[id].alMemoSelector).append(Str);
        },
        
        Run: function() {
            var id = $(this).attr("id");
            $(this).almemo("DrawControl");
            $(this).almemo("SetValue", almemoSettings[id].Value, true);
        },
    };
    $.fn.almemo = function(method){
        if (Memomethods[method]) {
            return Memomethods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return Memomethods.init.apply(this, arguments);
        } else
            return false;
    };
})(jQuery)


