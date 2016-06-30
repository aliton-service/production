(function($){
    Checkboxmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Width: 100,
                Checked: false,
                Label: "",
                Name: "",
            }, options || {});
            
            var id = settings.id;
            
            settings.alCheckboxSelector = "#" + id;
            settings.alCheckboxCellEditSelector = "alcheckboxcelledit_" + id;
            settings.alCheckboxInput = "alcheckboxinput_" + id;
            
            return this.each(function(){
                alcheckboxSettings[id] = settings;
                id = $(this).attr("id");
                
                if (typeof Aliton !== "undefined") {
                    Aliton.Objects[id] = {
                        id: id,
                        Type: "Checkbox",
                        Ready: false,
                        Settings: settings,
                    };
                }
                
                $(this).alcheckbox("Run");
                
                $(settings.alCheckboxSelector).on("click", function(){
                    $(this).alcheckbox("SetValue", !settings.Checked);
                });
                
            });
        },
        
        SetValue: function(Value, Ready) {
            var id = $(this).attr("id");
            
            if (Value === 1)
                Value = true;
            if (Value === 0)
                Value = false;
            
            console.log("id:" + id + " Value:" + Value);
            
            alcheckboxSettings[id].Checked = Value;
            
            if (Value) {
                console.log(Value);
                $("#" + alcheckboxSettings[id].alCheckboxCellEditSelector).removeClass("alcheckboxunchecked");
                $("#" + alcheckboxSettings[id].alCheckboxCellEditSelector).addClass("alcheckboxchecked");
                $("#" + alcheckboxSettings[id].alCheckboxInput).val(true);
            } else {
                $("#" + alcheckboxSettings[id].alCheckboxCellEditSelector).addClass("alcheckboxunchecked");
                $("#" + alcheckboxSettings[id].alCheckboxCellEditSelector).removeClass("alcheckboxchecked");
                $("#" + alcheckboxSettings[id].alCheckboxInput).val(false);
            }
            
            if (Ready) {
                alcheckboxSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
            Aliton.ChangeValue(id);
        },
        
        DrawControl: function() {
            var id = $(this).attr("id");
            var Str = "";
            Str += "<tbody>";
            Str += "    <tr>";
            Str += "        <td class='alcheckboxcell'>";
            Str += "            <span class='alcheckboxcelledit alcheckboxunchecked' id='" + alcheckboxSettings[id].alCheckboxCellEditSelector + "'>";
            Str += "                <span class='alchb'>";
            Str += "                    <input id='" + alcheckboxSettings[id].alCheckboxInput + "' name='" + alcheckboxSettings[id].Name + "' value='' type='text' readonly='' style='opacity:0;width:1px;height:1px;position:relative;background-color:transparent;display:block;margin:0;padding:0;border-width:0;font-size:0pt;'>";
            Str += "                </span>";
            Str += "            </span>";
            Str += "        </td>";
            Str += "        <td class='alcheckboxlabel'>";
            Str += "            <label>" + alcheckboxSettings[id].Label + "</label>";
            Str += "        </td>";
            Str += "    </tr>";
            Str += "</tbody>";
            $(alcheckboxSettings[id].alCheckboxSelector).append(Str);
        },
        
        Run: function() {
            var id = $(this).attr("id");
            $(this).alcheckbox("DrawControl");
            $(this).alcheckbox("SetValue", alcheckboxSettings[id].Checked, true);
        },
        
        
    };
    $.fn.alcheckbox = function(method){
        if (Checkboxmethods[method]) {
            return Checkboxmethods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return Checkboxmethods.init.apply(this, arguments);
        } else
            return false;
    };
})(jQuery);
        