(function($){
    Editmethods = {
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
            
            settings.alEditSelector = "#" + id;
            settings.alEditInputSelector = "aleditInput_" + id;
            
            return this.each(function(){
                aleditSettings[id] = settings;
                id = $(this).attr("id");
                
                if (typeof Aliton !== "undefined") {
                    Aliton.Objects[id] = {
                        id: id,
                        Type: "Edit",
                        Ready: false,
                        Settings: settings,
                    };
                }
                
                $("#" + id).aledit("Run");
                
                $(document).on('keyup', settings.alEditSelector +  " .aleditcontrol", function(event){
                    var Value = $("#" + settings.alEditInputSelector).val();
                    if (Value !== settings.Value) {
                        $(settings.alEditSelector).aledit("SetValue", Value);
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
                $(this).aledit("SetValue", "");
            else
                $(this).aledit("SetValue", Result[0].Condition);
            
        },
        
        SetValue: function(Value, Ready) {
            var id = $(this).attr("id");
            
            if (aleditSettings[id].Type === "Numeric") {
                if ((!$.isNumeric(Value)) && (Value !== "")) { 
                    $("#" + aleditSettings[id].alEditInputSelector).val(aleditSettings[id].Value);
                    return;
                }
            } 
            if (Value === "") 
                aleditSettings[id].Value = null
            else 
                aleditSettings[id].Value = Value;
            
            $("#" + aleditSettings[id].alEditInputSelector).val(aleditSettings[id].Value);
            
            if (Ready) {
                aleditSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
            
            if (aleditSettings[id].Mode === "Auto")
                Aliton.ChangeValue(id);
        },
        
        DrawControl: function() {
            var id = $(this).attr("id");
            var ReadOnly = "";
            if (aleditSettings[id].ReadOnly)
                ReadOnly = "readonly='readonly'";
            
            var Str = "";
            Str +=" <tbody>";
            Str +="     <tr>";
            Str +="         <td class='aleditc' style='width:100%;'>";
            Str +="             <input id='" + aleditSettings[id].alEditInputSelector + "' class='aleditcontrol' name='" + aleditSettings[id].Name + "' type='text' " + ReadOnly + " style='width: 100%;'>";
            Str +="         </td>";
            Str +="     </tr>";
            Str +=" </tbody>";
            $(aleditSettings[id].alEditSelector).append(Str);
        },
        
        Run: function() {
            var id = $(this).attr("id");
            $(this).aledit("DrawControl");
            $(this).aledit("SetValue", aleditSettings[id].Value, true);
        },
    };
    
    $.fn.aledit = function(method){
        if (Editmethods[method]) {
            return Editmethods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return Editmethods.init.apply(this, arguments);
        } else
            return false;
    };
})(jQuery);
