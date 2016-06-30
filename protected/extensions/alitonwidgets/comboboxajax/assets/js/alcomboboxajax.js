(function($){
    Cmbmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Name: '',
                KeyValue: null,
                CurrentRow: null,
                Ready: false,
                Popup: false,
                FirstOpen: true,
                Text: '',
            }, options || {});
            
            var id = settings.id;
            
            settings.alComboboxAjaxSelector = "#" + id;
            settings.alComboboxAjaxFormInputSelector = "alComboboxAjaxFormInput_" + id;
            settings.alComboboxAjaxInputSelector = "alComboboxAjaxInput_" + id;
            settings.alComboboxAjaxButtonSelector = "alComboboxAjaxButton_" + id;
            settings.alComboboxAjaxButtonImgSelector = "alComboboxAjaxButtonImg_" + id;
            
            
            return this.each(function(){
                
                alcomboboxajaxSettings[id] = settings;
                
                id = $(this).attr("id");
                
                if (typeof Aliton !== "undefined") {
                    Aliton.Objects[id] = {
                        id: id,
                        Type: "Combobox",
                        Ready: false,
                        Settings: settings,
                    };
                }
                
                $(this).alcomboboxajax("Run");
                
                
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).focusin(function(){
                    $(settings.alComboboxAjaxSelector).addClass("alComboboxAjaxFocused");
                });
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).focusout(function(){
                    $(settings.alComboboxAjaxSelector).removeClass("alComboboxAjaxFocused");
                });
                
                $("#" + settings.alComboboxAjaxButtonSelector).click(function(){
                    $(settings.alComboboxAjaxSelector).alcomboboxajax("ButtonClick");
                });
                
                
                $(document).on("click", function(event) {
                    var TargetId = $(event.target).attr("id");
                    if ((TargetId !== settings.alComboboxAjaxButtonSelector) &&
                        (TargetId !== settings.alComboboxAjaxButtonImgSelector) &&
                        (TargetId !== algridajaxSettings[settings.PopupControl].alHeaderSelector) &&
                        (TargetId !== algridajaxSettings[settings.PopupControl].alBodySelector)) {
                            if (settings.Popup) {
                                $(settings.alComboboxAjaxSelector).alcomboboxajax("Set", settings.CurrentRow);
                                $(settings.alComboboxAjaxSelector).alcomboboxajax("ButtonClick");
                                return false;
                            }
                    }
                });
                
                $(document).on('click', "#" + settings.PopupControl + " .algridajaxBodyTable tr", function(){
                    $(settings.alComboboxAjaxSelector).alcomboboxajax("Set", algridajaxSettings[settings.PopupControl].CurrentRow);
                    $("#" + settings.PopupControl).algridajax("hideGrid");
                    settings.Popup = false;
                    $("#" + settings.alComboboxAjaxInputSelector).focus();
                });
                
                $(document).on('keyup', "#" + settings.alComboboxAjaxInputSelector, function(event){
                    if (!settings.Ready) return;
                    
                    if (settings.Text == $("#" + settings.alComboboxAjaxInputSelector).val()) return;
                    
                    if ($("#" + settings.alComboboxAjaxInputSelector).val() === "") {
                        $(settings.alComboboxAjaxSelector).alcomboboxajax("Set", null);
                        return;
                    }
                       
                    
                    
                    if (!settings.Popup) {
                        var Left = $(settings.alComboboxAjaxSelector).position().left;
                        var Top = $(settings.alComboboxAjaxSelector).position().top;
                        $("#" + settings.PopupControl).algridajax("showGrid", {
                            left: Left + "px",
                            top: (Top+20) + "px",
                            position: "absolute",
                            "z-index": "12000",
                        });
                        settings.Popup = true;
                        
                    }
                    
                    if (settings.FirstOpen) {
                        $(settings.alComboboxAjaxSelector).alcomboboxajax("Load", "");
                        return;
                    }
                    
                    if (settings.Text !== $("#" + settings.alComboboxAjaxInputSelector).val()) 
                        $(settings.alComboboxAjaxSelector).alcomboboxajax("Load", $("#" + settings.alComboboxAjaxInputSelector).val());
                        
                    
                        
                });
                
                
                
            });
        },
        
        Load: function(Text) {
            var id = $(this).attr("id");
            
            var Filetrs = Aliton.SearchForeignFilters(id);
            $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("AddFilters", Filetrs);
            
            //console.log("Text:" +  Text);
            var Condition = alcomboboxajaxSettings[id].Type.Condition;
            Condition = Condition.replace(":Value", Text);
            console.log(Condition);
            var Filter = {
                Type: "Internal",
                Control: id,
                Condition: Condition,
                Value: Text,
                Name: id,
            };
            
            $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("ClearColumnFilter", Filter.Name);
            $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("AddFilter", Filter);
            $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("Load");
            alcomboboxajaxSettings[id].Text = $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).val();
            alcomboboxajaxSettings[id].FirstOpen = false;
        },
        
        ButtonClick: function() {
            var id = $(this).attr("id");
            if (!alcomboboxajaxSettings[id].Ready) return;
                
            if (alcomboboxajaxSettings[id].Popup) {
                $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("hideGrid");
                alcomboboxajaxSettings[id].Popup = false;
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).focus();
            }
            else {
                var Left = $(alcomboboxajaxSettings[id].alComboboxAjaxSelector).position().left;
                var Top = $(alcomboboxajaxSettings[id].alComboboxAjaxSelector).position().top;
                $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("showGrid", {
                    left: Left + "px",
                    top: (Top+20) + "px",
                    position: "absolute",
                    "z-index": "12000",
                });
                alcomboboxajaxSettings[id].Popup = true;
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).focus();
                if (alcomboboxajaxSettings[id].FirstOpen) {
                    $(this).alcomboboxajax("Load", "");
                    alcomboboxajaxSettings[id].FirstOpen = false;
                }
            }
                
        },
        
        DrawControl: function() {
            var id = $(this).attr("id");
            var StrControl = "";
            StrControl += "<tbody>";
            StrControl += " <tr>"
            StrControl += "     <td style='display:none;'>";
            StrControl += "         <input class='alcomboboxajaxFormInput' id='" + alcomboboxajaxSettings[id].alComboboxAjaxFormInputSelector + "' name='" + alcomboboxajaxSettings[id].Name + "' type='hidden' value=''>";
            StrControl += "     </td>";
            StrControl += "     <td class='dxic' style='width:100%;'>";
            StrControl += "         <input class='alcomboboxajaxInput' id='" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector + "' type='text' spellcheck='false' autocomplete='off'>";
            StrControl += "     </td>";
            StrControl += "     <td id='" + alcomboboxajaxSettings[id].alComboboxAjaxButtonSelector + "' class='alComboboxAjaxButton' style='-khtml-user-select:none;'>";
            StrControl += "         <img id='" + alcomboboxajaxSettings[id].alComboboxAjaxButtonImgSelector + "' class='alcomboboxajaxButtonImg' src='/images/whitepixel.gif' alt='v'>";
            StrControl += "     </td>";
            StrControl += " </tr>";
            StrControl += "</tbody>";
            
            $(alcomboboxajaxSettings[id].alComboboxAjaxSelector).append(StrControl);
        },
        
        FindInDataGrid: function(Key, KeyValue) {
            var id = $(this).attr("id");
            var Result = -1;
            var Data = algridajaxSettings[alcomboboxajaxSettings[id].PopupControl];
            for (var i = 0; i <= Data.length; i++)
                if (Data[i][Key] === KeyValue)
                    return Data[i];
            return Result;
        },
        
        SearchAndSet: function() {
            var id = $(this).attr("id");
            var Condition = "t." + alcomboboxajaxSettings[id].KeyField + "=" + alcomboboxajaxSettings[id].KeyValue;
            var Row;
            
            var ObjectData = {
                Id: id,
                ModelName: alcomboboxajaxSettings[id].ModelName,
                CurrentPage: 1,
                CurrentPageSize: -1,
                ExternalFilters: [Condition],
                Sort: [],
            };
            
            $.ajax({
                url: alcomboboxajaxSettings[id].AjaxUrl,
                type: "POST",
                data: ObjectData,
                async: true,
                success: function(Res){
                    var Result = eval("(" + Res + ")");
                    id = Result["Id"];
                    Row = Result["Data"][0];
                    $(alcomboboxajaxSettings[id].alComboboxAjaxSelector).alcomboboxajax("Set", Row, true);
                }
            });
            
            return Row;
        },
        
        Set: function(Row, Ready) {
            var id = $(this).attr("id");
            if (Row === null) {
                alcomboboxajaxSettings[id].KeyValue = null;
                alcomboboxajaxSettings[id].CurrentRow = null;
                alcomboboxajaxSettings[id].Text = "";
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxFormInputSelector).val("");
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).val("");
            }
            else {
                alcomboboxajaxSettings[id].KeyValue = Row[alcomboboxajaxSettings[id].KeyField];
                alcomboboxajaxSettings[id].CurrentRow = Row;
                alcomboboxajaxSettings[id].Text = Row[alcomboboxajaxSettings[id].FieldName];
                console.log(Row);
                console.log("KeyField:" + Row[alcomboboxajaxSettings[id].KeyField]);
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxFormInputSelector).val(Row[alcomboboxajaxSettings[id].KeyField]);
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).val(Row[alcomboboxajaxSettings[id].FieldName]);
            }
            if (Ready) {
                alcomboboxajaxSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
            
            Aliton.ChangeValue(id);
        },
        
        SetValue: function(KeyValue, Ready) {
            var id = $(this).attr("id");
            var Row = $(this).alcomboboxajax("FindInDataGrid", alcomboboxajaxSettings[id].KeyField, KeyValue);
            
            if (Row === -1) 
                Row = $(this).alcomboboxajax("SearchAndSet");
            else 
                $(alcomboboxajaxSettings[id].alComboboxAjaxSelector).alcomboboxajax("Set", Row, true);
                
            
            
        },
        
        Run: function() {
            var id = $(this).attr("id");
            
            $(this).alcomboboxajax("DrawControl");
            
            if (alcomboboxajaxSettings[id].KeyValue !== null) {
                $(this).alcomboboxajax("SetValue", alcomboboxajaxSettings[id].KeyValue, true);
            }
            else {
                alcomboboxajaxSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
                
        },
        
    };
    
    $.fn.alcomboboxajax = function(method){
        if (Cmbmethods[method]) {
            return Cmbmethods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return Cmbmethods.init.apply(this, arguments);
        } else
            return false;
    };
})(jQuery)




