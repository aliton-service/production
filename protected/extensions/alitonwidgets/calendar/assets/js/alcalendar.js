(function($){
    var Months = [
        "Январь",
        "Февраль",
        "Март",
        "Апрель",
        "Май",
        "Июнь",
        "Июль",
        "Август",
        "Сентябрь",
        "Октябрь",
        "Ноябрь",
        "Декабрь"];
    
    var Weeks = [
        "Пн",
        "Вт",
        "Ср",
        "Чт",
        "Пт",
        "Сб",
        "Вс"
    ];
    Calendarmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Width: 100,
                Value: null,
                Date: null,
                Name: "",
                CurrentDate: null,
            }, options || {});
            
            var id = settings.id;
            
            settings.alContentCalendarSelector = "#alcalendarcontent_" + id;
            settings.alCalendarSelector = "#" + id;
            settings.alCalendarHeader = "alCalendarHeader_" + id;
            settings.alCalendarContentHolderPrevY = "alCalendarContentHolderPrevY_" + id;
            settings.alCalendarContentHolderPrevYImg = "alCalendarContentHolderPrevYImg_" + id;
            settings.alCalendarContentHolderPrevM = "alCalendarContentHolderPrevM_" + id;
            settings.alCalendarContentHolderPrevMImg = "alCalendarContentHolderPrevMImg_" + id;
            settings.alCalendarHeaderContentText = "alCalendarHeaderContentText_" + id;
            settings.alCalendarHeaderText = "alCalendarHeaderText_" + id;
            settings.alCalendarContentHolderNextM = "alCalendarContentHolderNextM_" + id;
            settings.alCalendarContentHolderNextMImg = "alCalendarContentHolderNextMImg_" + id;
            settings.alCalendarContentHolderNextY = "alCalendarContentHolderNextY_" + id;
            settings.alCalendarContentHolderNextYImg = "alCalendarContentHolderNextYImg_" + id;
            settings.alCalendarBody = "alCalendarBody_" + id;
            settings.alCalendarHeaderWeeks = "alCalendarHeaderWeeks_" + id;
            settings.alCalendarDyas = "alCalendarDyas_" + id;
            
            return this.each(function(){
                alcalendarSettings[id] = settings;
                id = $(this).attr("id");
                
                if (typeof Aliton !== "undefined") {
                    Aliton.Objects[id] = {
                        id: id,
                        Type: "Calendar",
                        Ready: false,
                        Settings: settings,
                    };
                }
                
                $(this).alcalendar("Run");
                
            });
        },
        
        AddEventDayClick: function() {
            var id = $(this).attr("id");
            
            $(alcalendarSettings[id].alCalendarSelector + " .alCalendarDay").click(function(){
                var Year = $(this).attr("year");
                var Month = $(this).attr("month");
                var Day = $(this).attr("day");
                var id = $(this).attr("idcalendar");
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("SetValue", new Date(Year, Month-1, Day));
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("DrawBody", parseInt(Month), parseInt(Year), parseInt(Day)); 
                
            });
        },
        
        AddEventMoveMonth: function() {
            var id = $(this).attr("id");
            $("#" + alcalendarSettings[id].alCalendarContentHolderPrevM).click(function(){
                var id = $(this).attr("idcalendar");
                alcalendarSettings[id].CurrentDate.setMonth(alcalendarSettings[id].CurrentDate.getMonth()-1);
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("DrawHeader", alcalendarSettings[id].CurrentDate.getMonth() + 1, alcalendarSettings[id].CurrentDate.getFullYear());
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("DrawBody", alcalendarSettings[id].CurrentDate.getMonth() + 1, alcalendarSettings[id].CurrentDate.getFullYear(), alcalendarSettings[id].CurrentDate.getDate());
                
            });
            $("#" + alcalendarSettings[id].alCalendarContentHolderNextM).click(function(){
                var id = $(this).attr("idcalendar");
                alcalendarSettings[id].CurrentDate.setMonth(alcalendarSettings[id].CurrentDate.getMonth()+1);
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("DrawHeader", alcalendarSettings[id].CurrentDate.getMonth() + 1, alcalendarSettings[id].CurrentDate.getFullYear());
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("DrawBody", alcalendarSettings[id].CurrentDate.getMonth() + 1, alcalendarSettings[id].CurrentDate.getFullYear(), alcalendarSettings[id].CurrentDate.getDate());
            });
        },
        
        AddEventMoveYear: function() {
            var id = $(this).attr("id");
            $("#" + alcalendarSettings[id].alCalendarContentHolderPrevY).click(function(){
                var id = $(this).attr("idcalendar");
                alcalendarSettings[id].CurrentDate.setYear(alcalendarSettings[id].CurrentDate.getFullYear()-1);
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("DrawHeader", alcalendarSettings[id].CurrentDate.getMonth() + 1, alcalendarSettings[id].CurrentDate.getFullYear());
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("DrawBody", alcalendarSettings[id].CurrentDate.getMonth() + 1, alcalendarSettings[id].CurrentDate.getFullYear(), alcalendarSettings[id].CurrentDate.getDate());
            });
            $("#" + alcalendarSettings[id].alCalendarContentHolderNextY).click(function(){
                var id = $(this).attr("idcalendar");
                alcalendarSettings[id].CurrentDate.setYear(alcalendarSettings[id].CurrentDate.getFullYear()+1);
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("DrawHeader", alcalendarSettings[id].CurrentDate.getMonth() + 1, alcalendarSettings[id].CurrentDate.getFullYear());
                $(alcalendarSettings[id].alCalendarSelector).alcalendar("DrawBody", alcalendarSettings[id].CurrentDate.getMonth() + 1, alcalendarSettings[id].CurrentDate.getFullYear(), alcalendarSettings[id].CurrentDate.getDate());
            });
        },
        
        AddZero: function(Number) {
            Number = String(Number);
            return Number.length > 1 ? Number : (+Number >= 0) ? "0" + Number : Number;
        },
        
        DateToString: function(Date, Format) {
            var Year = Date.getFullYear();
            var Month = Date.getMonth() + 1;
            var Day = Date.getDate();
            var Hours = Date.getHours();
            var Minutes = Date.getMinutes();
            if (Format === "d.m.Y H:i")
                return $(this).alcalendar("AddZero", Day) + "." + $(this).alcalendar("AddZero", Month) + "." + Year + " " + $(this).alcalendar("AddZero", Hours) + ":" + $(this).alcalendar("AddZero", Minutes);
            
            if (Format === "d.m.Y")
                return $(this).alcalendar("AddZero", Day) + "." + $(this).alcalendar("AddZero", Month) + "." + $(this).alcalendar("AddZero", Year);
            
            return $(this).alcalendar("AddZero", Day) + "." + $(this).alcalendar("AddZero", Month) + "." + Year + " " + $(this).alcalendar("AddZero", Hours) + ":" + $(this).alcalendar("AddZero", Minutes);
        },
        
        DaysInMonth: function(Year, Month) {
            return 32 - new Date(Year, Month-1, 32).getDate();
        },
        
        SetValue: function(Value, Ready) {
            var id = $(this).attr("id");
            alcalendarSettings[id].Date = new Date(Value.getFullYear(), Value.getMonth(), Value.getDate());
            alcalendarSettings[id].Value = Value.getDate() + "." + Value.getMonth() + "." + Value.getFullYear();
            if (Ready) {
                alcalendarSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
            Aliton.ChangeValue(id);
        },
        
        DrawHeader: function(Month, Year) {
            var id = $(this).attr("id");
            var Str = "<td id='" + alcalendarSettings[id].alCalendarHeader + "' class='alCalendarHeader' style='border-top:0;'>";
            
            Str += "<table style='width:100%;border-collapse:collapse;'>";
            Str += "    <tbody>";
            Str += "        <tr>";
            Str += "            <td id='" + alcalendarSettings[id].alCalendarContentHolderPrevY + "' class='alCalendarContentHolderPrevY' idcalendar='" + id + "'>";
            Str += "                <img id='" + alcalendarSettings[id].alCalendarContentHolderPrevYImg + "' class='alCalendarContentHolderPrevYImg' src='/images/whitepixel.gif' alt=''>";
            Str += "            </td>";
            Str += "            <td class='dxeCHS'>";
            Str += "            </td>";
            Str += "            <td id='" + alcalendarSettings[id].alCalendarContentHolderPrevM + "' class='alCalendarContentHolderPrevM' idcalendar='" + id + "'>";
            Str += "                <img id='" + alcalendarSettings[id].alCalendarContentHolderPrevMImg + "' class='alCalendarContentHolderPrevMImg' src='/images/whitepixel.gif' alt=''>";
            Str += "            </td>";
            Str += "            <td id='" + alcalendarSettings[id].alCalendarHeaderContentText+ "' class='alCalendarHeaderContentText' style='width:100%;cursor:default;'>";
            Str += "                <span id='" + alcalendarSettings[id].alCalendarHeaderText + "' class='alCalendarHeaderText' style='cursor:pointer;'>"
            Str += "                    " + Months[Month-1] + ", " + Year;
            Str += "                </span>";
            Str += "            </td>";
            Str += "            <td id='" + alcalendarSettings[id].alCalendarContentHolderNextM + "' class='alCalendarContentHolderNextM' idcalendar='" + id + "'>";
            Str += "                <img id='" + alcalendarSettings[id].alCalendarContentHolderNextMImg + "' class='alCalendarContentHolderNextMImg' src='/images/whitepixel.gif' alt='>'>";
            Str += "            </td>";
            Str += "            <td class='dxeCHS'></td>";
            Str += "            <td id='" + alcalendarSettings[id].alCalendarContentHolderNextY + "' class='alCalendarContentHolderNextY' idcalendar='" + id + "'>";
            Str += "                <img id='" + alcalendarSettings[id].alCalendarContentHolderNextYImg + "' class='alCalendarContentHolderNextYImg' src='/images/whitepixel.gif' alt='>>'>";
            Str += "            </td>";
            Str += "        </tr>";
            Str += "    </tbody>";
            Str += "</table></td>";
            $("#" + alcalendarSettings[id].alCalendarHeader).replaceWith(Str);
            $(this).alcalendar("AddEventMoveMonth");
            $(this).alcalendar("AddEventMoveYear");
        },
        
        DrawHeaderWeeks: function() {
            var id = $(this).attr("id");
            var Str = "";
            Str += "<tr id='" + alcalendarSettings[id].alCalendarHeaderWeeks + "' class='alCalendarHeaderWeeks'>";
            for (var i = 0; i <= 7; i++) {
                if (i === 0) 
                    Str += "<td id='alCalendarDayHeader" + i + "'></td>";
                else {
                    Str += "<td class='alCalendarDayHeader' id='alCalendarDayHeader" + i + "'>" + Weeks[i-1]+ "</td>";
                }
            }
            Str += "</tr>";
            $("#" + alcalendarSettings[id].alCalendarHeaderWeeks).replaceWith(Str);
        },
        
        GetDayOfWeek: function(Date) {
            var Day = Date.getDay();
            if (Day === 0)
                return 6;
            else
                return Day-1;
        },
        
        GetDays: function(Year, Month, Day) {
            var id = $(this).attr("id");
            var Days = [];
            var Tmp = [];
            var Line = 0;
            var Day = 1;
            var DaysInMonth = $(this).alcalendar("DaysInMonth", Year, Month);
            var DayOfWeek;
            for (Day; Day <= DaysInMonth; Day++) {
                
                DayOfWeek = $(this).alcalendar("GetDayOfWeek", new Date(Year, Month-1, Day));
                Tmp[DayOfWeek] = Day;
                if (Day === DaysInMonth) {
                    Days[Line] = Tmp;
                    Tmp = [];
                    break;
                }
                if (DayOfWeek === 6) {
                    Days[Line] = Tmp;
                    Tmp = [];
                    Line++;
                }
            }
            return Days;
        },
        
        DrawBody: function(Month, Year, Day) {
            var id = $(this).attr("id");
            var Days = $(this).alcalendar("GetDays", Year, Month, Day);
            var Tmp;
            var Weekend;
            var Selected;
            var WeekNumber;
            var CurrentDate;
            var Str = "<td id='" + alcalendarSettings[id].alCalendarBody + "' class='alCalendarBody' style='-khtml-user-select:none;'>";
            Str += "<table id='ContentHolder_calendar_mt' style='width:100%;border-collapse:separate;'>";
            Str += "    <tbody>";
            Str += "        <tr id='" + alcalendarSettings[id].alCalendarHeaderWeeks + "' class='alCalendarHeaderWeeks'></tr>";
            WeekNumber = $(this).alcalendar("WeekNumberOfDate", new Date(Year, Month-1, 1));
            for (var Line = 0; Line < Days.length; Line++) {
                Str += "<tr id='" + alcalendarSettings[id].alCalendarDyas + "_" + Line+ "'>";
                Str += "<td class='alCalendarWeekNumber' id=''>" + WeekNumber + "</td>";
                WeekNumber++;
                for (var WeekDay = 0; WeekDay <= 6; WeekDay++) {
                    if ((WeekDay === 5) || (WeekDay === 6))
                        Weekend = " alCalendarDayWeekend";
                    else
                        Weekend = "";
                    
                    Tmp = Days[Line];
                    if (Tmp[WeekDay] !== undefined) {
                        if (alcalendarSettings[id].Date !== null) {
                            if ((Year === alcalendarSettings[id].Date.getFullYear()) &&
                                    (Month-1 === alcalendarSettings[id].Date.getMonth()) &&
                                    (Tmp[WeekDay] === alcalendarSettings[id].Date.getDate())) {

                                        Selected = " alCalendarDaySelected";
                                    }
                            else
                                Selected = "";
                        }
                        else Selected = "";
                        
                        
                        Str += "<td Day='" + Tmp[WeekDay] + "' Month='" + Month + "' Year='" + Year + "' id='alCalendarDay_" + Tmp[WeekDay] + "' class='alCalendarDay" + Weekend + Selected + "' idcalendar='" + id + "' style='cursor: pointer;'>" + Tmp[WeekDay] + "</td>";
                    }
                    else
                        Str += "<td class='alCalendarDay" + Weekend + "' style='cursor: pointer;'></td>";
                }
                Str += "</tr>"
            }
            
            Str += "    </tbody>";
            Str += "</table></td>";
            $("#" + alcalendarSettings[id].alCalendarBody).replaceWith(Str);
            $(this).alcalendar("DrawHeaderWeeks");
            $(this).alcalendar("AddEventDayClick");
            //$(this).alcalendar("DrawDays", Year, Month, Day);
        },
        
        WeekNumberOfDate: function(Day) {
            var StartTimeOfCurrentYear = (new Date(Day.getFullYear(), 0, 1)).getTime();
            var PastTimeOfStartCurrentYear = Day.getTime() - StartTimeOfCurrentYear;
            var HourOfMillisecs = 3600000;
            var HoursOfOneWeek = 168;
            var Number = PastTimeOfStartCurrentYear / HourOfMillisecs / HoursOfOneWeek;
            return parseInt(Number.toFixed(0)) + 1;
        },
        
        HideCalendar: function() {
            var id = $(this).attr("id");
            $(alcalendarSettings[id].alContentCalendarSelector).css({
                "display": "none",
            });
        },
        
        ShowCalendar: function(CssObject) {
            var id = $(this).attr("id");
            CssObject = $.extend({
                "position": "absolute",
                "display": "block",
                "z-index": "12000",
                //"left": "100px", 
                
            }, CssObject || {});
            $(alcalendarSettings[id].alContentCalendarSelector).css(CssObject);
        },
        
        DrawControl: function() {
            var id = $(this).attr("id");
            var Str = "";
            Str += "<tbody>";
            Str += "    <tr>";
            Str += "        <td id='" + alcalendarSettings[id].alCalendarHeader + "' class='alCalendarHeader' style='border-top:0;'></td>";
            Str += "    </tr>";
            Str += "    <tr>";
            Str += "        <td id='" + alcalendarSettings[id].alCalendarBody + "' class='alCalendarBody' style='-khtml-user-select:none;'></td>";
            Str += "    </tr>";
            Str += "</tbody>";
            $(alcalendarSettings[id].alCalendarSelector).append(Str);
            $(this).alcalendar("DrawHeader", alcalendarSettings[id].CurrentDate.getMonth()+1, alcalendarSettings[id].CurrentDate.getFullYear());
            $(this).alcalendar("DrawBody", alcalendarSettings[id].CurrentDate.getMonth()+1, alcalendarSettings[id].CurrentDate.getFullYear(), alcalendarSettings[id].CurrentDate.getDate());
            if (!alcalendarSettings[id].Visible)
                $(this).alcalendar("HideCalendar");    
            
        },
        
        Run: function() {
            var id = $(this).attr("id");
            if ((alcalendarSettings[id].Value !== "") && (alcalendarSettings[id].Value !== undefined) && (alcalendarSettings[id].Value !== null)) {
                var D = new Date(alcalendarSettings[id].Value.replace(/(\d+).(\d+).(\d+)/, '$3/$2/$1'));
                alcalendarSettings[id].CurrentDate = D;
                $(this).alcalendar("SetValue", D, true);
            }
            else {
                alcalendarSettings[id].CurrentDate = new Date();
            }
            $(this).alcalendar("DrawControl");
        },
        
    };
    $.fn.alcalendar = function(method){
        if (Calendarmethods[method]) {
            return Calendarmethods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return Calendarmethods.init.apply(this, arguments);
        } else
            return false;
    };
})(jQuery);
        


