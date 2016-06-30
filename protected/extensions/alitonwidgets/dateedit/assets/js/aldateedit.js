(function($){
    Dateeditmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Width: 100,
                Value: null,
                Date: null,
                Name: "",
                Popup: false,
                Ready: false,
                Format: "d.m.Y H:i",
            }, options || {});
            
            var id = settings.id;
            
            settings.alDateEditSelector = "#" + id;
            settings.alDateEditInputSelector = "aldateeditinput_" + id;
            settings.alDateEditButtonSelector = "aldateeditbutton_" + id;
            settings.alDateEditImgSelector = "aldateeditimg_" + id; 
            settings.alPopupSelector = id + "_PopupCalendar";
            
            return this.each(function(){
                aldateeditSettings[id] = settings;
                id = $(this).attr("id");
                
                if (typeof Aliton !== "undefined") {
                    Aliton.Objects[id] = {
                        id: id,
                        Type: "Dateedit",
                        Ready: false,
                        Settings: settings,
                    };
                }
                
                $(this).aldateedit("Run");
                
                $("#" + settings.alDateEditInputSelector).focusin(function(){
                    $(settings.alDateEditSelector).addClass("aldateeditfocused");
                });
                
                $("#" + settings.alDateEditInputSelector).focusout(function(){
                    $(settings.alDateEditSelector).removeClass("aldateeditfocused");
                });
                
                $("#" + settings.alDateEditButtonSelector).click(function(){
                    $(settings.alDateEditSelector).aldateedit("ButtonClick");
                });
                
                $(document).on("click",  ".alCalendarDay", function(){
                    var idCalendar = $(this).attr("idcalendar");
                    if (settings.alPopupSelector === idCalendar) {
                        
                        if (aldateeditSettings[settings.id].Date !== null) {
                            var Hours = aldateeditSettings[settings.id].Date.getHours();
                            var Minutes = aldateeditSettings[settings.id].Date.getMinutes();
                            alcalendarSettings[settings.alPopupSelector].Date.setHours(Hours);
                            alcalendarSettings[settings.alPopupSelector].Date.setMinutes(Minutes);
                        }
                        $(settings.alDateEditSelector).aldateedit("SetValue", alcalendarSettings[settings.alPopupSelector].Date);
                        $("#" + settings.alPopupSelector).alcalendar("HideCalendar");
                        settings.Popup = false;
                        $("#" + settings.alDateEditInputSelector).focus();
                        Aliton.ChangeValue(id);
                        
                    }
                });
                
                $(document).on("click", function(event) {
                    var TargetId = $(event.target).attr("id");
                    if ((TargetId !== settings.alDateEditButtonSelector) &&
                        (TargetId !== settings.alDateEditImgSelector) &&
                        (TargetId !== alcalendarSettings[settings.alPopupSelector].alCalendarContentHolderPrevM) &&
                        (TargetId !== alcalendarSettings[settings.alPopupSelector].alCalendarContentHolderPrevMImg) &&
                        (TargetId !== alcalendarSettings[settings.alPopupSelector].alCalendarContentHolderPrevY) &&
                        (TargetId !== alcalendarSettings[settings.alPopupSelector].alCalendarContentHolderPrevYImg) &&
                        (TargetId !== alcalendarSettings[settings.alPopupSelector].alCalendarContentHolderNextM) &&
                        (TargetId !== alcalendarSettings[settings.alPopupSelector].alCalendarContentHolderNextMImg) &&
                        (TargetId !== alcalendarSettings[settings.alPopupSelector].alCalendarContentHolderNextY) &&
                        (TargetId !== alcalendarSettings[settings.alPopupSelector].alCalendarContentHolderNextYImg)) {
                            if (settings.Popup) {
                                $(settings.alDateEditSelector).aldateedit("ButtonClick");
                                return false;
                            }
                    }
                });
                
                $("#" + settings.alDateEditInputSelector).on("keydown", function(event){
                    var Position = $(settings.alDateEditSelector).aldateedit("GetCaretPosition", this);
                    var Text = $(this).val();
                    
                    if (event.keyCode == 13) {
                        Aliton.ChangeValue(id);
                        return false;
                    }
                    
                    if ((event.keyCode >= 35) && (event.keyCode <= 40))
                        return true;
                    
                    var ArrayOfDays = [0, 1];
                    var ArrayOfMonth = [3, 4];
                    var ArrayOfYear = [6, 7, 8, 9];
                    var ArrayOfHours = [11, 12];
                    var ArrayOfMinutes = [14, 15];
                    var ArrayOfOther = [2, 5, 10, 13];
                    
                    if (ArrayOfOther.indexOf(Position) !== -1) {
                        if ($(this).aldateedit("CodeIsNumber", event.keyCode)) {
                            Position++;
                        }
                        else {
                            Position++;
                            return false;
                        }
                    }
                    else
                    {
                        if (!$(this).aldateedit("CodeIsNumber", event.keyCode))
                            return false;
                    }
                    
                    var Char =  $(settings.alDateEditSelector).aldateedit("ToChar", event.keyCode);
                    var NewDate;
                    var Str;
                    var DecodeObject = $(settings.alDateEditSelector).aldateedit("DecodeDate", Text);
                    if (Text.length !== 16)
                        Text = $(settings.alDateEditSelector).aldateedit("AddZero", DecodeObject.Day) + "."
                                + $(settings.alDateEditSelector).aldateedit("AddZero", DecodeObject.Month) + "."
                                + $(settings.alDateEditSelector).aldateedit("AddZero", DecodeObject.Year) + " "
                                + $(settings.alDateEditSelector).aldateedit("AddZero", DecodeObject.Hours) + ":"
                                + $(settings.alDateEditSelector).aldateedit("AddZero", DecodeObject.Minutes);
                    
                    var Idx = 1;
                    
                    if (ArrayOfDays.indexOf(Position) !== -1) {
                        var CurrentDay = parseInt($(settings.alDateEditSelector).aldateedit("StrReplace", DecodeObject.DayStr, Char, Position));
                        if (CurrentDay > 31)
                            CurrentDay = 31;
                        
                        while (!$(settings.alDateEditSelector).aldateedit("ValidDate", DecodeObject.Year, DecodeObject.Month, CurrentDay, DecodeObject.Hours, DecodeObject.Minutes)) {
                            NewDate = new Date(DecodeObject.Year, DecodeObject.Month-1, 1, DecodeObject.Hours, DecodeObject.Minutes);
                            NewDate.setMonth(NewDate.getMonth()-1);
                            Str = $(settings.alDateEditSelector).aldateedit("AddZero", NewDate.getDate()) + "."
                                + $(settings.alDateEditSelector).aldateedit("AddZero", NewDate.getMonth()+1) + "."
                                + $(settings.alDateEditSelector).aldateedit("AddZero", NewDate.getFullYear()) + " "
                                + $(settings.alDateEditSelector).aldateedit("AddZero", NewDate.getHours()) + ":"
                                + $(settings.alDateEditSelector).aldateedit("AddZero", NewDate.getMinutes());
                            DecodeObject = $(settings.alDateEditSelector).aldateedit("DecodeDate", Str);
                            if (Idx > 12) {
                                break;
                            }
                            Idx++;
                        }
                        DecodeObject.Day = CurrentDay;
                        DecodeObject.DayStr = $(settings.alDateEditSelector).aldateedit("AddZero", CurrentDay);
                        
                    }
                    Idx = 1;
                    if (ArrayOfMonth.indexOf(Position) !== -1) {
                        console.log(Position);
                        var CurrentMonth = parseInt($(settings.alDateEditSelector).aldateedit("StrReplace", DecodeObject.MonthStr, Char, Position-3));
                        if (CurrentMonth > 12)
                            CurrentMonth = 12;
                        console.log("CurrentMonth:" + CurrentMonth + " Char:" + Char + " DecodeObject.MonthStr:" + DecodeObject.MonthStr);
                        while (!$(settings.alDateEditSelector).aldateedit("ValidDate", DecodeObject.Year, CurrentMonth, DecodeObject.Day, DecodeObject.Hours, DecodeObject.Minutes)) {
                           DecodeObject.Day = DecodeObject.Day-1;
                           DecodeObject.DayStr = $(settings.alDateEditSelector).aldateedit("AddZero", DecodeObject.Day);
                           if (Idx > 31)
                               break;
                           Idx++;
                        }
                        DecodeObject.Month = CurrentMonth;
                        DecodeObject.MonthStr = $(settings.alDateEditSelector).aldateedit("AddZero", CurrentMonth);
                        console.log("Вводим месяц");
                    }
                    Idx = 1;
                    if (ArrayOfYear.indexOf(Position) !== -1) {
                        var CurrentYear = parseInt($(settings.alDateEditSelector).aldateedit("StrReplace", DecodeObject.YearStr, Char, Position-6));
                        if (CurrentYear <= 1000)
                            CurrentMonth = 1900;
                        while (!$(settings.alDateEditSelector).aldateedit("ValidDate", CurrentYear, DecodeObject.Month, DecodeObject.Day, DecodeObject.Hours, DecodeObject.Minutes)) {
                           DecodeObject.Day = DecodeObject.Day-1;
                           DecodeObject.DayStr = $(settings.alDateEditSelector).aldateedit("AddZero", DecodeObject.Day);
                           if (Idx > 31)
                               break;
                           Idx++;
                        }
                        DecodeObject.Year = CurrentYear;
                        DecodeObject.YearStr = $(settings.alDateEditSelector).aldateedit("AddZero", CurrentYear);
                        console.log("Вводим год");
                    }
                    if (ArrayOfHours.indexOf(Position) !== -1) {
                        var CurrentHours = parseInt($(settings.alDateEditSelector).aldateedit("StrReplace", DecodeObject.HoursStr, Char, Position-11));
                        if (CurrentHours < 0)
                            CurrentHours = 0;
                        if (CurrentHours > 23)
                            CurrentHours = 0;
                        DecodeObject.Hours = CurrentHours;
                        DecodeObject.HoursStr = $(settings.alDateEditSelector).aldateedit("AddZero", CurrentHours);
                        console.log("Вводим часы");
                        
                    }
                    if (ArrayOfMinutes.indexOf(Position) !== -1) {
                        var CurrentMinutes = parseInt($(settings.alDateEditSelector).aldateedit("StrReplace", DecodeObject.MinutesStr, Char, Position-14));
                        if (CurrentMinutes < 0)
                            CurrentMinutes = 0;
                        if (CurrentMinutes > 59)
                            CurrentHours = 0;
                        DecodeObject.Minutes = CurrentMinutes;
                        DecodeObject.MinutesStr = $(settings.alDateEditSelector).aldateedit("AddZero", CurrentMinutes);
                        console.log("Вводим минуты");
                    }
                    
                    $(settings.alDateEditSelector).aldateedit("SetValue", new Date(DecodeObject.Year, DecodeObject.Month-1, DecodeObject.Day, DecodeObject.Hours, DecodeObject.Minutes));
                    $("#" + settings.alPopupSelector).alcalendar("SetValue", new Date(DecodeObject.Year, DecodeObject.Month-1, DecodeObject.Day, DecodeObject.Hours, DecodeObject.Minutes));
                    alcalendarSettings[settings.alPopupSelector].CurrentDate = aldateeditSettings[settings.id].Date;
                    $("#" + settings.alPopupSelector).alcalendar("DrawHeader", aldateeditSettings[settings.id].Date.getMonth() + 1, aldateeditSettings[settings.id].Date.getFullYear());
                    $("#" + settings.alPopupSelector).alcalendar("DrawBody", aldateeditSettings[settings.id].Date.getMonth() + 1, aldateeditSettings[settings.id].Date.getFullYear(), aldateeditSettings[settings.id].Date.getDate());
                    $(settings.alDateEditSelector).aldateedit("SetCaretPosition", this, Position+1);
                    return false;
                    
                });
                
            });
        },
        
        AddZero: function(Number) {
            Number = String(Number);
            return Number.length > 1 ? Number : (+Number >= 0) ? "0" + Number : Number;
        },
        
        DecodeDate: function(Str) {
            var Decode = {
                Year: 1900,
                YearStr: "1900",
                Month: 1,
                MonthStr: "01",
                Day: 1,
                DayStr: "01",
                Hours: 0,
                HoursStr: "00",
                Minutes: 0,
                MinutesStr: "00",
            }
            
            if (Str.length === 0) return Decode;
            
            Decode.Day = parseInt(Str[0] + Str[1]);
            Decode.DayStr = Str[0] + Str[1];
            
            Decode.Month = parseInt(Str[3] + Str[4]);
            Decode.MonthStr = Str[3] + Str[4];
            
            Decode.Year = parseInt(Str[6] + Str[7] + Str[8] + Str[9]);
            Decode.YearStr = Str[6] + Str[7] + Str[8] + Str[9];
            
            Decode.Hours = parseInt(Str[11] + Str[12]);
            Decode.HoursStr = Str[11] + Str[12];
            
            Decode.Minutes = parseInt(Str[14] + Str[15]);
            Decode.MinutesStr = Str[14] + Str[15];
            
            return Decode;
        },
        
        CodeIsNumber: function(KeyCode) {
            if (((event.keyCode >= 48) && (event.keyCode <= 57)) || 
                ((event.keyCode >= 96) && (event.keyCode <= 105)))
                return true;
            return false;
        },
        
        ValidDate: function (Year, Month, Day, Hours, Minutes){ 
            var NewDate = new Date (Year, Month-1, Day, Hours, Minutes);
            /*
            console.log("Month:" + Month + " Month:" + (NewDate.getMonth()+1));
            console.log("Year:" + Year + " Year:" + (NewDate.getFullYear()));
            console.log("Day:" + Day + " Day:" + (NewDate.getDate()));
            console.log("Hours:" + Hours + " Hours:" + (NewDate.getHours()));
            console.log("Minutes:" + Minutes + " Minutes:" + (NewDate.getMinutes()));
            */
            if ((Year !== NewDate.getFullYear()) ||
                (Month !== NewDate.getMonth()+1) ||
                (Day !== NewDate.getDate()) ||
                (Hours !== NewDate.getHours()) ||
                (Minutes !== NewDate.getMinutes())
                ) return false;
            return true;
        },

        ToChar: function(KeyCode) {
            var NumPadToKeyPadDelta = 48;

            if (KeyCode >= 96 && KeyCode <= 105) {
                KeyCode = KeyCode - NumPadToKeyPadDelta;
                return String.fromCharCode(KeyCode);
            }
            return String.fromCharCode(KeyCode);
        },
        
        StrReplace: function(Str, Str1, Index) {
            var Array = [];
            var Index2 = 0;
            //console.log("Str:" + Str + " Str1:" + Str1 + " Index:" + Index);
            for (var i = 0; i <= Str.length-1; i++){
                if (i === Index) {
                    Array.push(Str1[Index2]);
                    if (Str1.length > (Index2+1)) {
                        Index++;
                        Index2++;
                    }
                }
                else {
                    Array.push(Str[i]);
                }
            }
            
            return Array.join("");
            
        },
        
        SetCaretPosition: function (Ctrl, Pos) {
            if(Ctrl.setSelectionRange)
            {
                    Ctrl.focus();
                    Ctrl.setSelectionRange(Pos, Pos);
            }
            else if (Ctrl.createTextRange) {
                    var Range = Ctrl.createTextRange();
                    Range.collapse(true);
                    Range.moveEnd('character', Pos);
                    Range.moveStart('character', Pos);
                    Range.select();
            }
        },

        GetCaretPosition: function(Ctrl) {
            var CaretPos = 0;
            if (document.selection) {
                    Ctrl.focus ();
                    var Sel = document.selection.createRange ();
                    Sel.moveStart ('character', -ctrl.value.length);
                    CaretPos = Sel.text.length;
            }
            else if (Ctrl.selectionStart || Ctrl.selectionStart == '0')
                    CaretPos = Ctrl.selectionStart;
            return CaretPos;
        },

        
        ButtonClick: function() {
            var id = $(this).attr("id");
            if (!aldateeditSettings[id].Popup) {
                var Left = $(aldateeditSettings[id].alDateEditSelector).position().left;
                var Top = $(aldateeditSettings[id].alDateEditSelector).position().top;
                $("#" + aldateeditSettings[id].alPopupSelector).alcalendar("ShowCalendar", {
                    left: Left + "px",
                    top: (Top+20) + "px",
                });
                aldateeditSettings[id].Popup = true;
                $("#" + aldateeditSettings[id].alDateEditInputSelector).focus();
            }
            else {
                $("#" + aldateeditSettings[id].alPopupSelector).alcalendar("HideCalendar");
                aldateeditSettings[id].Popup = false;
                $("#" + aldateeditSettings[id].alDateEditInputSelector).focus();
            }
        },
        
        SetValue: function(Value, Ready) {
            var id = $(this).attr("id");
            
            aldateeditSettings[id].Date = Value;
            
            aldateeditSettings[id].Value = $("#" + aldateeditSettings[id].alPopupSelector).alcalendar("DateToString", Value, aldateeditSettings[id].Format);
            $("#" + aldateeditSettings[id].alDateEditInputSelector).val(aldateeditSettings[id].Value);
            
            if (Ready) {
                aldateeditSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
            
            
        },
        
        DrawControl: function() {
            var id = $(this).attr("id");
            var Str = "";
            Str += "    <tbody>";
            Str += "        <tr>";
            Str += "            <td class='dxic' style='width:100%;'>";
            Str += "                <input class='aldateeditinput' id='" + aldateeditSettings[id].alDateEditInputSelector+ "' name='" + aldateeditSettings[id].Name + "' type='text' autocomplete='off'>";
            Str += "            </td>";
            Str += "            <td id='" + aldateeditSettings[id].alDateEditButtonSelector + "' class='aldateeditbutton' idcalendar='" + id + "' style='-khtml-user-select:none;'>";
            Str += "                <img id='" + aldateeditSettings[id].alDateEditImgSelector + "' class='aldateeditimg' idcalendar='" + id + "' src='/images/whitepixel.gif' alt='v'>";
            Str += "            </td>";
            Str += "        </tr>";
            Str += "    </tbody>";
            $(aldateeditSettings[id].alDateEditSelector).append(Str);
        },
        
        StrToDate: function(Str) {
            return new Date(Str.replace(/(\d+).(\d+).(\d+)/, '$3/$2/$1'));
        },
        
        Run: function() {
            var id = $(this).attr("id");
            $(this).aldateedit("DrawControl");
            if (aldateeditSettings[id].Value !== null) {
                var D = new Date(aldateeditSettings[id].Value.replace(/(\d+).(\d+).(\d+)/, '$3/$2/$1'));
                $(this).aldateedit("SetValue", D, true); 
            }
            else
            {
                aldateeditSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
        },
    };
    $.fn.aldateedit = function(method){
        if (Dateeditmethods[method]) {
            return Dateeditmethods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return Dateeditmethods.init.apply(this, arguments);
        } else
            return false;
    };
})(jQuery);;


