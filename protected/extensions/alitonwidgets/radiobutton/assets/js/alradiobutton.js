(function($){
    
    Radiobuttonmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Checked: false,
                Label: '',
                GroupName: '',
            }, options || {});
            
            var id = settings.id;
            
            settings.alRadioButtonSelector = "#" + id;
            settings.alRbtnSelector = "alrbtn_" + id;
            settings.alRbtnInputSelector = "alrbtninput_" + id;
            
            return this.each(function(){
                alradiobuttonSettings[id] = settings;
                
                id = $(this).attr("id");
                
                if (typeof Aliton !== "undefined") {
                    Aliton.Objects[id] = {
                        id: id,
                        Type: "Radiobutton",
                        Ready: false,
                        Settings: settings,
                    };
                }
                
                $(this).alradiobutton("Run");
                
                $(settings.alRadioButtonSelector).on("click", function(){
                    if (!settings.Checked)
                        $(this).alradiobutton("SetValue", true, false, true);
                    
                });
            });
        },
        
        ClearCheckedForGroup: function() {
            var id = $(this).attr("id");
            for (key in alradiobuttonSettings) {
                if ((alradiobuttonSettings[id].GroupName === alradiobuttonSettings[key].GroupName) && (id !== key) && (alradiobuttonSettings[key].Ready))
                    $(alradiobuttonSettings[key].alRadioButtonSelector).alradiobutton("SetValue", false, false, false);
            }
        },
        
        SetValue: function(Value, Ready, F) {
            var id = $(this).attr("id");
            
            if (F)
                $(alradiobuttonSettings[id].alRadioButtonSelector).alradiobutton("ClearCheckedForGroup");
            
            alradiobuttonSettings[id].Checked = Value;
            
            if (Value) {
                $("#" + alradiobuttonSettings[id].alRbtnSelector).removeClass("alrbtnunchecked");
                $("#" + alradiobuttonSettings[id].alRbtnSelector).addClass("alrbtnchecked");
                $("#" + alradiobuttonSettings[id].alRbtnInputSelector).val(true);
            } else {
                $("#" + alradiobuttonSettings[id].alRbtnSelector).addClass("alrbtnunchecked");
                $("#" + alradiobuttonSettings[id].alRbtnSelector).removeClass("alrbtnchecked");
                $("#" + alradiobuttonSettings[id].alRbtnInputSelector).val(false);
            }
            
            if (Ready) {
                alradiobuttonSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
            Aliton.ChangeValue(id);
        },
        
        DrawControl: function() {
            var id = $(this).attr("id");
            var Str = "";
            Str += "<tbody>";
            Str += "    <tr>"
            Str += "        <td class='alradiobuttoncell'>";
            Str += "            <span id='" + alradiobuttonSettings[id].alRbtnSelector + "' class='alrbtn alrbtnunchecked' id=''>";
            Str += "                <span class='dxKBSW'>";
            Str += "                    <input id='" + alradiobuttonSettings[id].alRbtnInputSelector + "' name='' value='' type='text' style='opacity:0;width:1px;height:1px;position:relative;background-color:transparent;display:block;margin:0;padding:0;border-width:0;font-size:0pt;'>";
            Str += "                </span>";
            Str += "            </span>"
            Str += "        </td>";
            Str += "        <td class='dxichTextCellSys'>";
            Str += "            <label class='dx-wrap'>" + alradiobuttonSettings[id].Label + "</label>";
            Str += "        </td>";
            Str += "    </tr>";
            Str += "</tbody>";
            $(alradiobuttonSettings[id].alRadioButtonSelector).append(Str);
        },
        
        Run: function() {
            var id = $(this).attr("id");
            $(this).alradiobutton("DrawControl");
            $(this).alradiobutton("SetValue", alradiobuttonSettings[id].Checked, true, true);
        },
    };
    
    $.fn.alradiobutton = function(method){
        if (Radiobuttonmethods[method]) {
            return Radiobuttonmethods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return Radiobuttonmethods.init.apply(this, arguments);
        } else
            return false;
    };
    
})(jQuery);


