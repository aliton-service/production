(function($){
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
                OnAfterAjaxSuccess: '',
                Enabled: true,
            }, options || {});
            
            var id = settings.id;
            
            settings.albuttonSelector = "#" + id;
            
            return this.each(function(){
                if(!albuttonSettings[id]) {
                    albuttonSettings[id] = settings;


                    if (typeof Aliton !== "undefined") {
                        Aliton.Objects[id] = {
                            id: id,
                            Type: "Button",
                            Ready: false,
                            Settings: settings,
                        };
                    }
                }
                
                $(settings.albuttonSelector).click(function(e){
                    e.preventDefault()
                    $(settings.albuttonSelector).albutton("BtnClick");
                });
            });
            
            
        },
        
        BtnClick: function() {
            var id = $(this).attr("id");
            
            if (!albuttonSettings[id].Enabled)
                return 0;
            
            albuttonSettings[id].Enabled = false;
            
            $(albuttonSettings[id].albuttonSelector).albutton("setParamsValue");
                    
            if (albuttonSettings[id].Type == 'Window') {
                $(location).attr('href', albuttonSettings[id].Href + albuttonSettings[id].ParamsStr);
                albuttonSettings[id].Enabled = true;
            }

            if (albuttonSettings[id].Type == 'NewWindow') {
                window.open(albuttonSettings[id].Href + albuttonSettings[id].ParamsStr);
                albuttonSettings[id].Enabled = true;
            }
            
            if ((albuttonSettings[id].Type == 'AjaxForm'))
                $.ajax({
                    url: albuttonSettings[id].Href + albuttonSettings[id].ParamsStr,
                    type: 'POST',
                    dataType: "html", //Тип данных
                    data: $("#"+albuttonSettings[id].FormName).serialize(), 
                    async: true,
                    success: function(Res){
                        eval(albuttonSettings[id].OnAfterAjaxSuccess);
                        albuttonSettings[id].Enabled = true;
                    }
                });
            
            if (albuttonSettings[id].Type == 'Ajax')
                $.ajax({
                        url: albuttonSettings[id].Href + albuttonSettings[id].ParamsStr,
                        type: 'GET',
                        async: true,
                        success: function(Res){
                            eval(albuttonSettings[id].OnAfterAjaxSuccess);
                            albuttonSettings[id].Enabled = true;
                        }
                    });

            if (albuttonSettings[id].Type == 'Form')
            {
                if (albuttonSettings[id].Href != "")
                    $("#" + albuttonSettings[id].FormName).attr("action", albuttonSettings[id].Href);
                $("#" + albuttonSettings[id].FormName).submit();
                
                albuttonSettings[id].Enabled = true;
            }
            
            eval(albuttonSettings[id].OnAfterClick);
            
            if (albuttonSettings[id].Type.toLowerCase() == 'none')
                albuttonSettings[id].Enabled = true;
        },
        
        setParamsValue: function(){
            var id = $(this).attr("id");
            
            albuttonSettings[id].ParamsStr = '';
            
            for (var i = 0; i < albuttonSettings[id].Params.length; i++)
            {
                if (albuttonSettings[id].Params[i].TypeControl == "Grid")
                {
                    
                    //var CurrentRow = $("#" + albuttonSettings[id].Params[i].NameControl).algridajax("getCurrentRow");
                    var CurrentRow = algridajaxSettings[albuttonSettings[id].Params[i].NameControl].CurrentRow;
                    
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
    
    /****************************/
    
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
                if(!alcalendarSettings[id]) {
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
            var Selected = "";
            var WeekNumber;
            var CurrentDate = new Date();
            var CurrentYear = CurrentDate.getFullYear();
            var CurrentMonth = CurrentDate.getMonth();
            var CurrentDay = CurrentDate.getDate();
            
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
                        
                        
                        if  (   (Year === CurrentYear) &&
                                (Month-1 === CurrentMonth) &&
                                (Tmp[WeekDay] === CurrentDay)) {
                                    Selected = Selected + " alCalendarCurrentDay";
                        }
                        
                        
                        Str += "<td Day='" + Tmp[WeekDay] + "' Month='" + Month + "' Year='" + Year + "' id='alCalendarDay_" + Tmp[WeekDay] + "' class='alCalendarDay" + Weekend + Selected + "' idcalendar='" + id + "' style='cursor: pointer;'>" + Tmp[WeekDay] + "</td>";
                    }
                    else 
                    {
                        
                        Str += "<td class='alCalendarDay" + Weekend + "' style='cursor: pointer;'></td>";
                    }
                }
                Str += "</tr>"
            }
            Str += "        <tr>";
            Str += "            <td colspan='4'>";
            Str += "                <div class='alToday but' idcalendar='"+id+"'>Сегодня</div>";
            Str += "            </td>";
            Str += "            <td colspan='4'>";
            Str += "                <div class='alClear but' idcalendar='"+id+"'>Очистить</div>";
            Str += "            </td>";
            Str += "        </tr>";
            
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
    
    /*************************/
    Checkboxmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Width: 100,
                Checked: false,
                Label: "",
                Name: "",
                OnChange: "",
            }, options || {});
            
            var id = settings.id;
            
            settings.alCheckboxSelector = "#" + id;
            settings.alCheckboxCellEditSelector = "alcheckboxcelledit_" + id;
            settings.alCheckboxInput = "alcheckboxinput_" + id;
            
            return this.each(function(){
                if(!alcheckboxSettings[id]) {
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
                }
                $(this).alcheckbox("Run");
                
                $(settings.alCheckboxSelector).on("click", function(){
                    $(this).alcheckbox("SetValue", !settings.Checked);
                    eval(alcheckboxSettings[id].OnAfterClick)
                });
                
            });
        },
        
        SetValue: function(Value, Ready) {
            var id = $(this).attr("id");
            
            if ((Value === 1) || (Value === 'true') || (Value === '1') || (Value === true))
                Value = true;
            if ((Value === 0) || (Value === 'false') || (Value == null) || (Value === '0') || (Value === false))
                Value = false;
            
            
            
            alcheckboxSettings[id].Checked = Value;
            
            if (Value) {
                
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
            eval(alcheckboxSettings[id].OnChange);
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
    
    /***********************/
    
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
                if(!aldateeditSettings[id]) {
                    aldateeditSettings[id] = settings;
                    id = $(this).attr("id");

                    if (typeof Aliton !== "undefined") {
                        Aliton.Objects[id] = {
                            id: id,
                            Type: "Dateedit",
                            Ready: false,
                            Settings: settings,
                            OnAfterChange: '',
                        };
                    }
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

                $(document).on("click",  ".alToday", function(){
                    var idCalendar = $(this).attr("idcalendar");
                    if (settings.alPopupSelector === idCalendar) {
                        $(settings.alDateEditSelector).aldateedit("SetValue", new Date());
                        //$("#" + settings.alPopupSelector).alcalendar("HideCalendar");
                        //settings.Popup = false;
                        //$("#" + settings.alDateEditInputSelector).focus();
                        //Aliton.ChangeValue(id);
                    }
                    Aliton.ChangeValue(id);

                });

                $(document).on("click",  ".alClear", function(){
                    var idCalendar = $(this).attr("idcalendar");
                    if (settings.alPopupSelector === idCalendar) {
                        $(settings.alDateEditSelector).aldateedit("SetValue", null);
                    }
                    Aliton.ChangeValue(id);

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
                    if (settings.ReadOnly) return false;
                    
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
                        
                        var CurrentMonth = parseInt($(settings.alDateEditSelector).aldateedit("StrReplace", DecodeObject.MonthStr, Char, Position-3));
                        if (CurrentMonth > 12)
                            CurrentMonth = 12;
                        
                        while (!$(settings.alDateEditSelector).aldateedit("ValidDate", DecodeObject.Year, CurrentMonth, DecodeObject.Day, DecodeObject.Hours, DecodeObject.Minutes)) {
                           DecodeObject.Day = DecodeObject.Day-1;
                           DecodeObject.DayStr = $(settings.alDateEditSelector).aldateedit("AddZero", DecodeObject.Day);
                           if (Idx > 31)
                               break;
                           Idx++;
                        }
                        DecodeObject.Month = CurrentMonth;
                        DecodeObject.MonthStr = $(settings.alDateEditSelector).aldateedit("AddZero", CurrentMonth);
                        
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
                        
                    }
                    if (ArrayOfHours.indexOf(Position) !== -1) {
                        var CurrentHours = parseInt($(settings.alDateEditSelector).aldateedit("StrReplace", DecodeObject.HoursStr, Char, Position-11));
                        if (CurrentHours < 0)
                            CurrentHours = 0;
                        if (CurrentHours > 23)
                            CurrentHours = 0;
                        DecodeObject.Hours = CurrentHours;
                        DecodeObject.HoursStr = $(settings.alDateEditSelector).aldateedit("AddZero", CurrentHours);
                        
                        
                    }
                    if (ArrayOfMinutes.indexOf(Position) !== -1) {
                        var CurrentMinutes = parseInt($(settings.alDateEditSelector).aldateedit("StrReplace", DecodeObject.MinutesStr, Char, Position-14));
                        if (CurrentMinutes < 0)
                            CurrentMinutes = 0;
                        if (CurrentMinutes > 59)
                            CurrentHours = 0;
                        DecodeObject.Minutes = CurrentMinutes;
                        DecodeObject.MinutesStr = $(settings.alDateEditSelector).aldateedit("AddZero", CurrentMinutes);
                        
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

        Refresh: function() {
            var id = $(this).attr("id");
            var Result = Aliton.SearchForeignFilters(id);
            
            if (Result.length === 0) return;
            
            var Val = $(this).algridajax("DateToString", Result[0].Condition, "d.m.Y H:i");
            
            if ((Result[0].Condition == null) || (Result[0].Condition === "null"))
                $(this).aldateedit("SetValue", null, true);
            else
                $(this).aldateedit("SetValue", $(this).aldateedit("StrToDate", Val) , true);
            
        },
        
        ButtonClick: function() {
            var id = $(this).attr("id");
            
            if (aldateeditSettings[id].ReadOnly) return;
            
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
            if(Value === null) {
                aldateeditSettings[id].Value = null;
            } else {
                aldateeditSettings[id].Value = $("#" + aldateeditSettings[id].alPopupSelector).alcalendar("DateToString", Value, aldateeditSettings[id].Format);
            }
            $("#" + aldateeditSettings[id].alDateEditInputSelector).val(aldateeditSettings[id].Value);
            
            if (Ready) {
                aldateeditSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
            
            eval(aldateeditSettings[id].OnAfterChange);
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
    
    /***************************/
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
                OnKeyUpEnter: '',
                OnChange: '',
                PlaceHolder: '',
            }, options || {});
            
            var id = settings.id;
            
            settings.alEditSelector = "#" + id;
            settings.alEditInputSelector = "aleditInput_" + id;
            
            return this.each(function(){
                if(!aleditSettings[id]) {
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
                }
                $("#" + id).aledit("Run");
                
                $(document).on('keyup', settings.alEditSelector +  " .aleditcontrol", function(event){
                    var Value = $("#" + settings.alEditInputSelector).val();
                    if (Value !== settings.Value) {
                        $(settings.alEditSelector).aledit("SetValue", Value);
                        eval(settings.OnChange);
                    }
                    
                    if (event.keyCode == 13) {
                        Aliton.ChangeValue(id);
                        eval(settings.OnKeyUpEnter);
                        eval(settings.OnChange);
                    }
                    
                    
                });
            });
        },
        
        Refresh: function() {
            var id = $(this).attr("id");
            var Result = Aliton.SearchForeignFilters(id);
            
            if (Result.length === 0) return;
            
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
            
            if ($("#" + aleditSettings[id].alEditInputSelector).val() !== aleditSettings[id].Value)
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
            Str +="             <input id='" + aleditSettings[id].alEditInputSelector + "' placeholder='" + aleditSettings[id].PlaceHolder + "' class='aleditcontrol' name='" + aleditSettings[id].Name + "' type='text' " + ReadOnly + " style='width: 100%;' autocomplete='off'>";
            Str +="         </td>";
            Str +="     </tr>";
            Str +=" </tbody>";
            $(aleditSettings[id].alEditSelector).append(Str);
        },
        
        Run: function() {
            var id = $(this).attr("id");
            $(this).aledit("DrawControl");
            $(this).aledit("SetValue", aleditSettings[id].Value, true);
            $(this).aledit("Refresh");
            
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
    
    /***********************/
    
    methods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Key: "NotKey",
                Width: 0,
                Height: 0,
                Columns: [],
                ArrayColumns: [],
                Data: [],
                DataDetails: null,
                CurrentIndex: 0,
                CurrentFocusedIndex: 1,
                CurrentRow: null,
                CurrentPage: -1,
                CurrentPageSize: 200,
                OldPageSize: 200,
                TableWidth: 0,
                RowHeight: 24,
                ScrollStart: null,
                ScrollTop: 0,
                Sort: [],
                Filters: [],
                InternalFilters: [],
                ColumnResize: false,
                ColumnResizeIndex: null,
                MouseInColBorder: false,
                Drag: false,
                Drop: false,
                DropOutIndex: null,
                DropInIndex: null,
                ShowFilters: true,
                PageSizeList: [10, 20, 50, 100, 200, 500],
                RunF: false,
                LoadingData: false,
                OnDblClick: '',
                OnAfterClick: '',
                OnDrawRow: '',
                Visible: true,
                BodyDraw: false,
                Focused: false,
                ShowPager: true,
                Timer: null,
                Combobox: false,
                FilterControls: [],
                FirstLoad: true,
                FirstBoot: true,
                params: false,
                Process_ID: 0,
                SearchProcess_ID: 0
            }, options || {});
            
            for (key in settings.Columns)
            {
                settings.Columns[key] = $.extend(
                {
                    Width: 100,
                    Filter: {
                        Condition: '',
                    },
                    Sort: {
                        CurrentSort: 'None',
                        Up: null,
                        Down: null,
                    },
                }, settings.Columns[key] || {});
            }
            
            var id = settings.id;
            
            settings.algridajaxSelector = "#" + id;
            settings.alContentSelector = "alContent_" + id;
            settings.alHeaderSelector = "alHeader_" + id;
            settings.alSubHeaderSelector = "alSubHeader_" + id;
            settings.alTableHeaderSelector = "alTableHeader_" + id;
            settings.alHeaderRowSelector = "alHeaderRow_" + id;
            settings.alBodySelector = "alBody_" + id;
            settings.alBodyTableSelector = "alBodyTable_" + id;
            settings.alLoadingPanelSelector = "alLoadingPanel_"  + id;
            settings.alLoadingPanelBlockSelector = "alLoadingPanelBlock_"  + id;
            settings.alPagerBottomPanelSelector = "alPagerBottomPanel_" + id;
            settings.alPagerBottomPanelContentSelector = "alPagerBottomPanelContentSelector_" + id;
            settings.algridajaxFilterSelector = "algridajaxHeaderFilterColumns";
            settings.algridajaxPageSizePopupSelector = "alajaxgridPageSizePopup_" + id;
            settings.algridajaxPageSizeSelector = "alajaxgridPageSizeList_" + id;
            settings.alPagerBottomPanelSummarySelector = "alPagerBottomPanelSummary_" + id;
            settings.alTopBlockSelector = "alTopBlock_" + id;
            settings.alBottomBlockSelector = "alBottomBlock_" + id;
            settings.alBodyTableRowSelector = "alBodyTableRow_" + id;
            
            return this.each(function(){
                if(!algridajaxSettings[id]) {


                    algridajaxSettings[id] = settings;

                    id = $(this).attr("id");

                    if (typeof Aliton !== "undefined")
                        if (typeof Aliton.ListGrids !== "undefined") {
                            Aliton.Objects[id] = {
                                id: id,
                                Type: "Grid",
                                Ready: false,
                                Settings: settings,
                            };
                        }


                    $("#" + id).algridajax("loadFile");
                }
                                
                $(this).algridajax("Run");
                
                
                
                $(document).on("click", settings.algridajaxSelector + " .alPagerPrevButton", function(event){
                    if ((settings.CurrentPage - 1) > 0)
                    {
                        //settings.CurrentPage = settings.CurrentPage - 1;
                        $(settings.algridajaxSelector).algridajax("ChangePage", settings.CurrentPage - 1);
                    }
                });
                
                $(document).on("click", settings.algridajaxSelector + " .alPagerNextButton", function(event){
                    if ((settings.CurrentPage + 1) <= parseInt(settings.DataDetails["PageCount"]))
                    {
                        //settings.CurrentPage = settings.CurrentPage + 1;
                        $(settings.algridajaxSelector).algridajax("ChangePage", settings.CurrentPage + 1);
                    }
                });
                
                $(document).on("click", settings.algridajaxSelector + " .alPagerNum", function(event){
                    var ClickPage = parseInt($(this).text());
                    if (settings.CurrentPage != ClickPage)
                    {
                        //settings.CurrentPage = ClickPage;
                        $(settings.algridajaxSelector).algridajax("ChangePage", ClickPage);
                    }
                });
                
                $(document).on("mousedown", settings.algridajaxSelector + " .algridajaxHeaderColumns", function(e){
                    if (settings.MouseInColBorder)
                    {
                        settings.ColumnResize = true;
                        LeftElem = $(this).offset().left;
                        WidthElem = $(this).outerWidth();
                        Index = $(this).attr("ColIndex");
                        
                        BorderL = ((e.pageX - LeftElem) <= 3) ? true : false;
                        BorderR = (((LeftElem + WidthElem) - e.pageX) <= 3) ? true : false;
                        if (BorderL)
                            settings.ColumnResizeIndex = Index - 1;
                        else
                            settings.ColumnResizeIndex = Index;
                        
                        $("body").css("cursor", "col-resize");
                    }
                    else
                        settings.ColumnResize = false;
                    
                    
                });
                
                $(document).on("mouseup", settings.algridajaxSelector + " .algridajaxHeaderColumns", function(event){
                    if ((!settings.ColumnResize) && (!settings.Drag))
                        $(settings.algridajaxSelector).algridajax("sortColumn", parseInt($(this).attr("ColIndex")));
                });
                
                $(document).on("mouseup", function(){
                    if (settings.ColumnResize)
                    {
                        settings.ColumnResize = false;
                        $("body").css("cursor", "");
                        $(settings.algridajaxSelector).algridajax("saveToFile");
                    }
                });
                
                $(document).on("mousemove", function(e){
                    
                    if (settings.ColumnResize)
                    {
                        
                        Column = $("#alHeaderCol" + settings.ColumnResizeIndex + "_" + settings.id);
                        LeftColumn = Column.offset().left;
                        WidthColumn = Column.outerWidth();
                        NewWidthColumn = (e.pageX - (LeftColumn + WidthColumn)) + WidthColumn;
                        if (NewWidthColumn < 25) NewWidthColumn = 25;
                        
                        settings.ArrayColumns[settings.ColumnResizeIndex].Width = NewWidthColumn;
                        settings.Columns[settings.ArrayColumns[settings.ColumnResizeIndex].ColName].Width = NewWidthColumn;
                        
                        //settings.Columns[settings.ColumnResizeIndex].Width = NewWidthColumn;
                        
                        var TableWidth = 0;
                        for (var i = 0; i < settings.ArrayColumns.length; i++)
                            TableWidth += parseFloat(settings.ArrayColumns[i].Width); 
                        
                        settings.TableWidth = TableWidth;
                        $("#" + settings.alTableHeaderSelector).css("width", TableWidth);
                        $("#" + settings.alBodyTableSelector).css("width", TableWidth);
                        
                        Column.css("width", NewWidthColumn);
                        $(settings.algridajaxSelector + " .algridajaxTD" + settings.ColumnResizeIndex).css("width", NewWidthColumn);
                    }
                    
                });
                
                $(document).on("mousemove", settings.algridajaxSelector + " .algridajaxHeaderColumns", function(e){
                    LeftElem = $(this).offset().left;
                    WidthElem = $(this).outerWidth();
                    Index = $(this).attr("ColIndex");
                    BorderL = ((e.pageX - LeftElem) <= 3) ? true : false;
                    BorderR = (((LeftElem + WidthElem) - e.pageX) <= 3) ? true : false;
                    
                    if (!settings.ColumnResize){
                        settings.MouseInColBorder = false;
                        $(this).css("cursor", "pointer");
                        if (BorderR){
                            $(this).css("cursor", "col-resize");
                            settings.MouseInColBorder = true;
                        }
                        if ((BorderL) && (Index != 0)) {
                            $(this).css("cursor", "col-resize");
                            settings.MouseInColBorder = true;
                        }
                    }
                    
                });
                
                $(document).on('change.algridajax keydown.algridajax', settings.algridajaxSelector + " ." + settings.algridajaxFilterSelector, function (event) {
                    if (event.type === 'keydown') {
                        if (event.keyCode !== 13) return;
                        else eventType = 'keydown';
                    } else {
                        if (eventType === 'keydown') {
                                eventType = '';
                                return;
                        }
                    }
                    
                    Element = event.target;
                    AbIndex = $(Element).attr("index");
                    Value = $(Element).val();
                    Id = $(Element).attr("id");
                    $(settings.algridajaxSelector).algridajax("AddColumnFilter", AbIndex, Value, Id);
                    
                });
                
                $(document).on('mousemove.algridajax', ".alajaxgridPageSizeButton", function(event) {
                    $(this).addClass("alajaxgridPageSizeButtonFocused");
                });
                
                $(document).on('mouseout.algridajax', ".alajaxgridPageSizeButton", function(event) {
                    $(this).removeClass("alajaxgridPageSizeButtonFocused");
                });
                
                $(document).on('click.algridajax', settings.algridajaxSelector + " .alajaxgridPageSizeButton", function(event) {
                                        
                    if ($("#" + settings.algridajaxPageSizePopupSelector).css("display") === "none")
                        $(settings.algridajaxSelector).algridajax("openPopupPageSize");
                    else
                        $(settings.algridajaxSelector).algridajax("closePoupSize");
                    
                });
                
                $(document).on('click', function(event){
                    Element = $(event.target);
                    
                    if (!Element.hasClass("alajaxgridPageSizeList") &&
                        !Element.hasClass("alajaxgridPageSizeButton") &&
                        !Element.hasClass("alajaxgridPageSizeInput") &&
                        !Element.hasClass("alajaxgridPageSizeButtonImg") &&
                        !Element.hasClass("alajaxgridPageSizeItem") &&
                        !Element.hasClass("alajaxgridPageSizeItemContent") &&
                        !Element.hasClass("dx-vam") 
                        )
                    {
                        $(settings.algridajaxSelector).algridajax("closePoupSize");
                    }
                    
                });
                
                $(document).on('click', settings.algridajaxSelector + " .alajaxgridPageSizeItemContent", function(){
                    PageSize = parseInt($(this).find("span").first().text());
                    settings.CurrentPageSize = PageSize;
                    settings.CurrentPage = 1;
                    settings.CurrentFocusedIndex = 1;
                    settings.CurrentIndex = 0;
                    $(settings.algridajaxSelector).algridajax("LoadData", true, 1, PageSize, 1, true);
                    //Aliton.ChangeValue(settings.id);
                    
                });
                
                $(document).on('click', settings.algridajaxSelector + " .algridajaxBodyTable tr", function(){
                    var RowNumber = parseInt($(this).attr("rownumber"));
                    $(algridajaxSettings[id].algridajaxSelector).algridajax("SetFocused", RowNumber);
                    eval(settings.OnAfterClick);
                });
                
                $(document).on('dblclick', settings.algridajaxSelector + " .algridajaxBodyTable tr", function(){
                    eval(settings.OnDblClick);
                });
                
                $(window).on("resize", function(){
                    $(settings.algridajaxSelector).algridajax("SetSize");
                });
                
            });
        },
        
        SummaryRefresh: function() {
            var id = $(this).attr("id");
            var RecordCount = algridajaxSettings[id].DataDetails["Count"];
            var PageCount = algridajaxSettings[id].DataDetails["PageCount"];
            var RowNumber = algridajaxSettings[id].CurrentFocusedIndex;
            $("#" + algridajaxSettings[id].alPagerBottomPanelSummarySelector).text("Запись " + RowNumber + " из " + RecordCount + " (" + PageCount +" страниц)");
        },
        
        GetColumn: function(Index) {
            var id = $(this).attr("id");
            for (key in algridajaxSettings[id].Columns) {
                if (parseInt(algridajaxSettings[id].Columns[key].Index) === Index) 
                    return algridajaxSettings[id].Columns[key];
            }
            return null;
        },
       
        ClearColumnFilter: function(Name) {
            var id = $(this).attr("id");
            for (var i = 0; i < algridajaxSettings[id].Filters.length; i++) {
                if (algridajaxSettings[id].Filters[i].Name === Name)
                    algridajaxSettings[id].Filters.splice(i, 1);
            }
        },
       
        AddColumnFilter: function(Index, Value, Name) {
            var id = $(this).attr("id");
            
            var Column = $(this).algridajax("GetColumn", parseInt(Index));
            
            $(this).algridajax("ClearColumnFilter", Name);
            
            if ((Column.Filter.Condition === undefined) || (Column.Filter.Condition === ""))
                return;
            
            if (Value === "") {
                $(this).algridajax("RunFilters");
                return;
            }
            
            $(algridajaxSettings[id].algridajaxSelector).algridajax("AddFilter", {
                Type: "Internal",
                Control: id,
                Condition: Column.Filter.Condition,
                Value: Value,
                Name: Name,
            }, true);
            
        },
        
        AddFilters: function(Filters) {
            var id = $(this).attr("id");
            for (var i = 0; i < Filters.length; i++) {
                $(this).algridajax("ClearColumnFilter", Filters[i].Name);
                if (Filters[i].Condition !== "")
                    $(this).algridajax("AddFilter", Filters[i], false);
            }
        },
        
        AddFilter: function(Obj, Run) {
            var id = $(this).attr("id");
            
            Obj.Condition = Obj.Condition.replace(":Value", Obj.Value);
           
            algridajaxSettings[id].Filters.push(Obj);
            
            if (Run)
                $(this).algridajax("RunFilters");
        },
        
        RunFilters: function() {
            var id = $(this).attr("id");
            algridajaxSettings[id].CurrentFocusedIndex = 1;
            algridajaxSettings[id].CurrentIndex = 0;
            algridajaxSettings[id].CurrentRow = null;
            algridajaxSettings[id].CurrentPage = 1;
            //$(this).algridajax("LoadData", true, 1, algridajaxSettings[id].CurrentPageSize, 1, true);
            $(this).algridajax("Load", true, algridajaxSettings[id].CurrentPage, algridajaxSettings[id].CurrentPageSize, true, true);
        },
        
        SetSize: function() {
            // Устанавливаем размеры грида
            var id = $(this).attr("id");
            
            if (!algridajaxSettings[id].Stretch) return; // Если грид не должен растягиватся выходим
            
            var ParentElement = $(this).parent();
            
            var ParentWidth = ParentElement.width() - 3;
            var ParentHeight = ParentElement.height() - 10;
            
            if ((ParentWidth <= 0) || (ParentHeight <= 0))
                return false;
            
            $(algridajaxSettings[id].algridajaxSelector).outerWidth(ParentWidth);
            $("#" + algridajaxSettings[id].alSubHeaderSelector).outerWidth(ParentWidth - 17);
            $("#" + algridajaxSettings[id].alBodySelector).outerWidth(ParentWidth);
            
            
            var HeaderHeight = $("#" + algridajaxSettings[id].alHeaderSelector).outerHeight(true);
            var PagerHeight = $("#" + algridajaxSettings[id].alPagerBottomPanelSelector).outerHeight(true);
            
            //$("#" + algridajaxSettings[id].alBodySelector).outerHeight(ParentHeight - HeaderHeight - PagerHeight);
            
            
        },
        
        AddControlFilter: function(Filter, Run) {
            var id = $(this).attr("id");
            
            if (Run === undefined) Run = true;
            
            if (Filter.TypeControl === "Grid") {
                if (typeof algridajaxSettings[Filter.In] !== "undefined") {
                    if (algridajaxSettings[id].CurrentRow === null) return;
                    $("#"  + Filter.In).algridajax("ClearColumnFilter", Filter.Name);
                    $("#"  + Filter.In).algridajax("AddFilter", 
                        {
                            Type: Filter.TypeFilter,
                            Control: id,
                            Condition: Filter.Condition,
                            Value: algridajaxSettings[id].CurrentRow[Filter.Field],
                            Name: Filter.Name,
                        }, Run);
                }
            }
        },
        
        SetFilterControls: function(Run) {
            var id = $(this).attr("id");
            if (Run === undefined) Run = true;
            for (key in Aliton.Links) {
                if (Aliton.Links[key].Out === id)
                    $(this).algridajax("AddControlFilter", Aliton.Links[key], Run);
            }
        },
        
        Find: function(Filters, AsyncMode, Locate) {
            var id = $(this).attr("id");
            
            Aliton.Objects[id].Ready = false;
            Aliton.Objects[id].Load = true;
            
            var Result = null;
            
            if (AsyncMode === undefined)
                AsyncMode = true;
            
            var ForeignFilters = Aliton.SearchForeignFilters(id);
            $(this).algridajax("AddFilters", ForeignFilters);
            
            var InternalFilterArray = [];
            var ExternalFilterArray = [];
            
            
            
            for (var i = 0; i < algridajaxSettings[id].Filters.length; i++) {
                if (algridajaxSettings[id].Filters[i].Type == "Internal")
                    InternalFilterArray.push(algridajaxSettings[id].Filters[i].Condition);
                if (algridajaxSettings[id].Filters[i].Type == "External")
                    ExternalFilterArray.push(algridajaxSettings[id].Filters[i].Condition);
            }
            
            ExternalFilterArray = $.merge(ExternalFilterArray, Filters);
            var Count = -1;
            
            if (algridajaxSettings[id].DataDetails !== null)
                if (parseInt(algridajaxSettings[id].DataDetails.Count) !== 0)
                    Count = algridajaxSettings[id].DataDetails.Count;
            algridajaxSettings[id].Process_ID++;
            
            
            var objData = {
                Id: id,
                ModelName: algridajaxSettings[id].ModelName,
                CurrentPage: 1,
                CurrentPageSize: Count,
                Sort: algridajaxSettings[id].Sort,
                InternalFilters: InternalFilterArray,
                ExternalFilters: ExternalFilterArray,
                params: algridajaxSettings[id].params,
                Process_ID: algridajaxSettings[id].Process_ID,
            };
            
            $(this).algridajax("LoadingPanelShow");
            
            
            $.ajax({
                url: algridajaxSettings[id].AjaxUrl,
                type: "POST",
                data: objData,
                async: AsyncMode,
                success: function(Res){
                    Result = eval("(" + Res + ")");
                    id = Result["Id"];
                    var Process_ID = parseInt(Result["Process_ID"]);
                    algridajaxSettings[id].DataDetails = Result["Details"];
                    
                    Result = Result["Data"];
                    
                    
                    
                    if (Process_ID === algridajaxSettings[id].Process_ID)
                        algridajaxSettings[id].Process_ID = 0;
                    else
                        return;
                    
                    if (Locate) {
                        if (Result.length > 0) {
                            var Row = Result[0];
                            var OldCurrentPage = algridajaxSettings[id].CurrentPage;
                            
                            algridajaxSettings[id].CurrentFocusedIndex = Row["RowNumber"];
                            
                            algridajaxSettings[id].CurrentPage = $(algridajaxSettings[id].algridajaxSelector).algridajax("GetPageNumberForCurrentRow");
                            
                            $(algridajaxSettings[id].algridajaxSelector).algridajax("SetFocused", Row["RowNumber"], Row);
                            
                            if (OldCurrentPage !== algridajaxSettings[id].CurrentPage) {
                                $(algridajaxSettings[id].algridajaxSelector).algridajax("LoadDataGrid", true, true);
                                
                                //$(algridajaxSettings[id].algridajaxSelector).algridajax("GoFocusedRow");
                            }
                            else
                            {
                                $(algridajaxSettings[id].algridajaxSelector).algridajax("GoFocusedRow");
                                $("#" + id).algridajax("LoadingPanelHide");
                                Aliton.Objects[id].Ready = true;
                                Aliton.Objects[id].Load = false;
                            }
                            
                        }
                        else
                        {
                            $("#" + id).algridajax("LoadingPanelHide");
                            Aliton.Objects[id].Ready = true;
                            Aliton.Objects[id].Load = false;
                        }
                    }
                    else
                    {
                        $("#" + id).algridajax("LoadingPanelHide");
                        Aliton.Objects[id].Ready = true;
                        Aliton.Objects[id].Load = false;
                    }
                    
                    
                        
                }
            });
            
            return Result;
        },
        
        RemoveFocusedRow: function() {
            var id = $(this).attr("id");
            $("#" + algridajaxSettings[id].alBodySelector + " tr").removeClass("algridajaxRowFocused");
        },
        
        SetFocusedRow: function(RowNumber) {
            var id = $(this).attr("id");
            $("#" + algridajaxSettings[id].alBodyTableRowSelector + "_" + RowNumber).addClass("algridajaxRowFocused");
        },
        
        SetFocusedAndLocate: function(Filters, AsyncMode, Locate, Timer) {
            var id = $(this).attr("id");
            
            if (Timer === undefined)
                Timer = 0;
            
            if (Timer > 0) {
                var JsCommand = "";
                if (typeof algridajaxSettings[id].Timer !== "undefined")
                    clearTimeout(algridajaxSettings[id].Timer);
                
                JsCommand = '$("#' + id +'").algridajax("Find", ["' + Filters.join(',') + '"], ' + AsyncMode + ', ' + Locate+ ');';
                algridajaxSettings[id].Timer = setTimeout(JsCommand, 300);
                
                
            }
            else
                var Rows = $(this).algridajax("Find", Filters, AsyncMode, Locate);
        },
        
        SetFocused: function(RowNumber, Row) {
            var id = $(this).attr("id");
            
            if (algridajaxSettings[id].Data.length < 1) return;
            
            Start = algridajaxSettings[id].Data[0]["RowNumber"];
            End = algridajaxSettings[id].Data[algridajaxSettings[id].Data.length-1]["RowNumber"];
            
            if ((RowNumber >= Start) && (RowNumber <= End)) {
                
                algridajaxSettings[id].CurrentIndex = RowNumber - Start;
                algridajaxSettings[id].CurrentRow =  algridajaxSettings[id].Data[algridajaxSettings[id].CurrentIndex];
                algridajaxSettings[id].CurrentFocusedIndex = RowNumber;
                
                $(this).algridajax("RemoveFocusedRow");
                $(this).algridajax("SetFocusedRow", RowNumber);
                $(this).algridajax("SummaryRefresh");
                //$(this).algridajax("SetFilterControls");
                Aliton.ChangeValue(id);
                
            } 
        },
        
        GetPageNumberForCurrentRow: function(RowNumber) {
            var id = $(this).attr("id");
            
            if (RowNumber === undefined)
                RowNumber = algridajaxSettings[id].CurrentFocusedIndex;
            
            var Result  = RowNumber/algridajaxSettings[id].CurrentPageSize | 0;
            var Mod = RowNumber % algridajaxSettings[id].CurrentPageSize;
            if (Mod > 0)
                Result++;
            return Result;
        },
        
        GoFocusedRow: function() {
            // Переход на активную строку
            var id = $(this).attr("id");
            var PageNumber = $(this).algridajax("GetPageNumberForCurrentRow");
            var RowHeight = $(this).algridajax("GetRowHeight");
            
            //var RowHeight = parseInt($("#alBodyTableRow_" + id +"_1").outerHeight()) + 1;
            //if (RowHeight < algridajaxSettings[id].RowHeight)
            //    RowHeight = algridajaxSettings[id].RowHeight;
            
            var StartScroll = PageNumber * algridajaxSettings[id].CurrentPageSize * RowHeight - (algridajaxSettings[id].CurrentPageSize * RowHeight);
            var StartScroll = PageNumber * algridajaxSettings[id].CurrentPageSize - algridajaxSettings[id].CurrentPageSize;
            var EndScroll = StartScroll + algridajaxSettings[id].CurrentPageSize * RowHeight;
            var CurrentRow = algridajaxSettings[id].CurrentFocusedIndex;
            var PosScroll = CurrentRow * RowHeight - RowHeight;
            
            
            var Start = PageNumber * algridajaxSettings[id].CurrentPageSize - algridajaxSettings[id].CurrentPageSize + 1;
            var Index = algridajaxSettings[id].CurrentFocusedIndex - Start;
            var BodyHeight = $("#" + algridajaxSettings[id].alBodySelector).outerHeight();
            var CountRowBody = (BodyHeight - 17) / RowHeight | 0;
            var ScrollTop;
            
            if (Index <= (algridajaxSettings[id].CurrentPageSize - CountRowBody - 1)) {
                ScrollTop = algridajaxSettings[id].CurrentFocusedIndex * RowHeight - RowHeight;
                algridajaxSettings[id].Focused = true;
                $("#" + algridajaxSettings[id].alBodySelector).scrollTop(ScrollTop);
                
            }
            else {
                ScrollTop = algridajaxSettings[id].CurrentFocusedIndex * RowHeight;
                ScrollTop = ScrollTop - (BodyHeight - 17);
                
                algridajaxSettings[id].Focused = true;
                $("#" + algridajaxSettings[id].alBodySelector).scrollTop(ScrollTop);
                
            }
            
        },
        
        setFocusedRow: function(RowIndex) {
            /*
            var id = $(this).attr("id");
            
            algridajaxSettings[id].CurrentFocusedIndex = RowIndex;
            var CurrentPage = (((RowIndex - 1)/algridajaxSettings[id].CurrentPageSize | 0) + 1);
            
            if ((CurrentPage > algridajaxSettings[id].CurrentPage) || (CurrentPage < algridajaxSettings[id].CurrentPage) || algridajaxSettings[id].Combobox)
            {
                algridajaxSettings[id].Focused = true;
                algridajaxSettings[id].CurrentPage = CurrentPage;
                $(algridajaxSettings[id].algridajaxSelector).algridajax("changePage", CurrentPage); 
            }
            
            if (CurrentPage === algridajaxSettings[id].CurrentPage)
                $(algridajaxSettings[id].algridajaxSelector).algridajax("setScrollTopCurrentRow");
            */
        },
        
        setScrollTopCurrentRow: function() {
            var id = $(this).attr("id");
            var RowNumber = algridajaxSettings[id].CurrentFocusedIndex;
            var TopBlockHeight = $("#" + algridajaxSettings[id].alTopBlockSelector).outerHeight();
            var TableHeight = $("#" + algridajaxSettings[id].alBodyTableSelector).outerHeight();
            var BodyHeight = $("#" + algridajaxSettings[id].alBodySelector).outerHeight();
            var ScrollTop = (algridajaxSettings[id].RowHeight*RowNumber - algridajaxSettings[id].RowHeight) - TopBlockHeight;
            $(algridajaxSettings[id].algridajaxSelector + " .algridajaxBodyTable tr").removeClass("algridajaxRowFocused");
            $(algridajaxSettings[id].algridajaxSelector + " .algridajaxBodyTable tr[rownumber=" + RowNumber + "]").toggleClass("algridajaxRowFocused");
            
            if (ScrollTop > (TableHeight - BodyHeight))
            {
                
                $("#" + algridajaxSettings[id].alBodySelector).scrollTop(TopBlockHeight + (ScrollTop + 24 + 17) - BodyHeight);
            }
            else
            {
                
                $("#" + algridajaxSettings[id].alBodySelector).scrollTop((TopBlockHeight + ScrollTop));
            }
            
            
        },
        
        nextRow: function() {
            var id = $(this).attr("id");
            var Element = $(algridajaxSettings[id].algridajaxSelector + " tr.algridajaxRowFocused");
            var Index = parseInt(Element.attr("index"));
            var RowNumber = parseInt(Element.attr("rownumber")) + 1;
            if (RowNumber <= algridajaxSettings[id].DataDetails["Count"])
            {
                $(algridajaxSettings[id].algridajaxSelector + " .algridajaxBodyTable tr").removeClass("algridajaxRowFocused");
                $(algridajaxSettings[id].algridajaxSelector + " .algridajaxBodyTable tr[rownumber=" + RowNumber + "]").toggleClass("algridajaxRowFocused");
                algridajaxSettings[id].CurrentFocusedIndex = RowNumber;
                $(algridajaxSettings[id].algridajaxSelector).algridajax("setScrollTopCurrentRow");
            }
        },
        
        prevRow: function() {
            var id = $(this).attr("id");
            var Element = $(algridajaxSettings[id].algridajaxSelector + " tr.algridajaxRowFocused");
            var Index = parseInt(Element.attr("index"));
            var RowNumber = parseInt(Element.attr("rownumber")) - 1;
            if ((Index  - 1) >= 0)
            {
                $(algridajaxSettings[id].algridajaxSelector + " .algridajaxBodyTable tr").removeClass("algridajaxRowFocused");
                $(algridajaxSettings[id].algridajaxSelector + " .algridajaxBodyTable tr[rownumber=" + RowNumber + "]").toggleClass("algridajaxRowFocused");
                algridajaxSettings[id].CurrentFocusedIndex = RowNumber;
                $(algridajaxSettings[id].algridajaxSelector).algridajax("setScrollTopCurrentRow");
            }
        },
        
        getRow: function(Index) {
            var id = $(this).attr("id");
            return algridajaxSettings[id].Data[Index];
        },
        
        getCurrentRow: function() {
            var id = $(this).attr("id");
            return algridajaxSettings[id].CurrentRow;
        },
        
        showGrid: function(cssObject) {
            var id = $(this).attr("id");
            $(algridajaxSettings[id].algridajaxSelector).css("display", "block");
            $(algridajaxSettings[id].algridajaxSelector).css(cssObject);
        },
        
        hideGrid: function() {
            var id = $(this).attr("id");
            $(algridajaxSettings[id].algridajaxSelector).css({
                "position": "absolute",
                "top": -9999,
                "left": -9999,
            });
        },
        
        openPopupPageSize: function() {
            id = $(this).attr("id");
            var popup = $("#" + algridajaxSettings[id].algridajaxPageSizeSelector);
            Left = popup.offset().left;
            Top = popup.offset().top;
            Height = popup.outerHeight();

            $("#" + algridajaxSettings[id].algridajaxPageSizePopupSelector).css("display",  "block");
            $("#" + algridajaxSettings[id].algridajaxPageSizePopupSelector).offset({left: Left, top: (Top + Height)});
        },
        
        closePoupSize: function() {
            var id = $(this).attr("id");
            if (algridajaxSettings[id])
                $("#" + algridajaxSettings[id].algridajaxPageSizePopupSelector).css("display",  "none");
        },
        
        addFilter: function(SqlFilter, ControlName) {
            var id = $(this).attr("id");
            
            if (typeof ControlName !== "undefined") 
                for (var i= 0; i < algridajaxSettings[id].Filters.length; i++)
                    if (algridajaxSettings[id].Filters[i].Control === ControlName)
                        algridajaxSettings[id].Filters.splice(i, 1);
            
            if (typeof SqlFilter !== "undefined")
                algridajaxSettings[id].Filters.push({
                    Type: "External",
                    Condition: SqlFilter,
                    Control: ControlName,
                });
        },
        
        clearExternalFilter: function(ControlName) {
            var id = $(this).attr("id");
            
            
            
            if (typeof ControlName !== "undefined")
            {    
                for (var i = 0; i < algridajaxSettings[id].Filters.length; i++)
                    if ((algridajaxSettings[id].Filters[i].Type == "External") && (algridajaxSettings[id].Filters[i].Control == ControlName))
                        algridajaxSettings[id].Filters.splice(i, 1);
            }
            else
            {
                for (var i = 0; i < algridajaxSettings[id].Filters.length; i++)
                    if (algridajaxSettings[id].Filters[i].Type == "External")
                        algridajaxSettings[id].Filters.splice(i, 1);
            }
        },
        
        
        loadFile: function() {
            
            id = $(this).attr("id");
            if (!algridajaxSettings[id]) return;
            Data = {
                Key: algridajaxSettings[id].Key,
                Id: algridajaxSettings[id].id,
            };
            
            $.ajax({
                url: '/index.php?r=Personalization/Load',
                type: "POST",
                data: Data,
                async: false,
                success: function(Res){
                    if (Res != "")
                    {
                        Obj = eval("(" + Res + ")");
                        id = Obj.Id; 
                        
                        for (key in algridajaxSettings[id].Columns) {
                            
                            
                            if (Obj.Columns[key] !== undefined)
                                algridajaxSettings[id].Columns[key].Width = Obj.Columns[key].Width;
                            
                            if (Obj.Columns[key] !== undefined)
                                algridajaxSettings[id].Columns[key].Index = Obj.Columns[key].Index;
                            
                            /*
                            if (!$("#" + id).algridajax("CheckIndexColumn", algridajaxSettings[id].Columns[key].Index, key)) {
                                algridajaxSettings[id].Columns[key].Index = $("#" + id).algridajax("MaxIndex") + 1;
                            }
                            */
                        }
                        
                        //algridajaxSettings[id].Columns = $.extend(true, algridajaxSettings[id].Columns, Obj.Columns);
                        
                        
                    }
                }
            });
        },
        
        MaxIndex: function() {
            var id = $(this).attr("id");
            var MaxIndex = 0;
            for (var key in algridajaxSettings[id].Columns) {
                if (MaxIndex < parseInt(algridajaxSettings[id].Columns[key].Index))
                    MaxIndex = parseInt(algridajaxSettings[id].Columns[key].Index);
            }
            return MaxIndex;
        },
        
        CheckIndexColumn: function(Index, KeyColumn) {
            var id = $(this).attr("id");
            for (var key in algridajaxSettings[id].Columns) {
                if ((parseInt(Index) === parseInt(algridajaxSettings[id].Columns[key].Index)) && KeyColumn !== key) {
                    return false;
                }
            }
            return true;
        },
        
        saveToFile: function() {
            var id = $(this).attr("id");
            
            Data = {
                Key: algridajaxSettings[id].Key,
                Columns: {},
            };
            
            Data.Columns = $.extend(Data.Columns, algridajaxSettings[id].Columns);
            
            $.ajax({
                url: '/index.php?r=Personalization/Save',
                type: "POST",
                data: Data,
                async: true,
                success: function(Res){
                    
                }
            });
        },
        
        addSort: function(Column) {
            id = $(this).attr("id");
            
            if (Column.CurrentSort === "Up")
                if (Column.Sort.Up !== null)
                    algridajaxSettings[id].Sort.push(Column.Sort.Up);
            if (Column.CurrentSort === "Down")
                if (Column.Sort.Down !== null)
                    algridajaxSettings[id].Sort.push(Column.Sort.Down);
        },
        
        sortColumn: function(Index){
            id = $(this).attr("id");
            
            algridajaxSettings[id].Sort = [];
            
            
            
            for (key in algridajaxSettings[id].Columns)
            {
            //for (var i = 0; i < algridajaxSettings[id].Columns.length; i++)
            //{
                
                if (Index == parseInt(algridajaxSettings[id].Columns[key].Index))
                {
                    if ((algridajaxSettings[id].Columns[key].CurrentSort === "None") || (algridajaxSettings[id].Columns[key].CurrentSort === "Down"))
                    {
                        algridajaxSettings[id].Columns[key].CurrentSort = "Up";
                        $(this).algridajax("addSort", algridajaxSettings[id].Columns[key]);
                    }
                    else
                    {
                        algridajaxSettings[id].Columns[key].CurrentSort = "Down";
                        $(this).algridajax("addSort", algridajaxSettings[id].Columns[key]);
                    }
                }
                else
                    algridajaxSettings[id].Columns[key].CurrentSort = "None";
            }
            
            $(this).algridajax("drawHeaderGrid");
            if (algridajaxSettings[id].Sort.length > 0)
                $(this).algridajax("LoadDataGrid");
        },
        
        ChangePage: function(PageNum, AsyncMode){
            var id = $(this).attr("id");
            
            if (typeof PageNum === "undefined") return;
                //algridajaxSettings[id].CurrentPage = PageNum;
            
            if (AsyncMode === undefined)
                AsyncMode = true;
            
            
            $(this).algridajax("LoadData", AsyncMode, PageNum, algridajaxSettings[id].CurrentPageSize, null, true);
        },
        
        GetPageNumber: function(ScrollTop) {
            //  Функция номер страницы относитель положения скролла
            var id = $(this).attr("id");
            var alBodyElement = $("#" + algridajaxSettings[id].alBodySelector);
            var RowHeight = $(this).algridajax("GetRowHeight");
            var PageSize = algridajaxSettings[id].CurrentPageSize * RowHeight;
            var PageNumber;
            var BodyHeight = alBodyElement.outerHeight();
            
            if (PageSize < BodyHeight) Diff = BodyHeight - PageSize + 17; else Diff = 17;
            
            if (ScrollTop === undefined)
                ScrollTop = alBodyElement.scrollTop();
            
            var ScrollDirect = (ScrollTop > algridajaxSettings[id].ScrollTop) ? true : false;
            
            if (ScrollDirect) 
                PageNumber = (ScrollTop + BodyHeight - Diff)/(PageSize) | 0;
            else
                PageNumber = (ScrollTop)/PageSize | 0;
            PageNumber++;
            return PageNumber;
        },
        
        GetScrollTopForPageNumber: function(PageNumber) {
            // Высчитаваем позиции скролла (верхней границы) относительно страницы
            var id = $(this).attr("id");
            //var RowHeight = $
            var RowHeight = $(this).algridajax("GetRowHeight");
            var ScrollTop = (PageNumber * algridajaxSettings[id].CurrentPageSize * RowHeight) - (algridajaxSettings[id].CurrentPageSize * RowHeight)
            return ScrollTop;
        },
        
        ChangeScroll: function() {
            var id = $(this).attr("id");
            
            var ScrollTop = $("#" + algridajaxSettings[id].alBodySelector).scrollTop();
            
            var ScrollLeft =  $("#" + algridajaxSettings[id].alBodySelector).scrollLeft();
            var PageNumber = $(algridajaxSettings[id].algridajaxSelector).algridajax("GetPageNumber");
            
            
            
            
            algridajaxSettings[id].ScrollTop = ScrollTop;
            $("#" + algridajaxSettings[id].alSubHeaderSelector).scrollLeft(ScrollLeft);

            if ((PageNumber !== algridajaxSettings[id].CurrentPage) || (algridajaxSettings[id].Data.length === 0)) {
                
                var JsCommand = '$("#' + algridajaxSettings[id].id + '").algridajax("ChangePage", ' + PageNumber + ');'
                
                if (typeof algridajaxSettings[id].Timer !== "undefined")
                    clearTimeout(algridajaxSettings[id].Timer);

                algridajaxSettings[id].Timer = setTimeout(JsCommand, 300); 
            }
            
        },
        
        addEventScrollBody: function() {
            var id = $(this).attr("id");
            /* Добавляем событие на скролл */
            $("#" + algridajaxSettings[id].alBodySelector).on("scroll", function(event){
                $(algridajaxSettings[id].algridajaxSelector).algridajax("ChangeScroll");
            });
            
        },
        
        changeColumnIndex: function(Id, OutIndex, InIndex){
            if (OutIndex < InIndex)
            {
                ColIndex = null;
                for (key in algridajaxSettings[Id].Columns)
                {
                //for (var i = 0; i < algridajaxSettings[Id].Columns.length; i++)
                //{
                    CurrentIndex = parseInt(algridajaxSettings[Id].Columns[key].Index);
                    if (CurrentIndex == OutIndex)
                        ColIndex = key;
                    if ((CurrentIndex != OutIndex) && (CurrentIndex < InIndex) && (CurrentIndex >= OutIndex))
                        algridajaxSettings[Id].Columns[key].Index = (CurrentIndex - 1);
                }
                if (ColIndex != null)
                    algridajaxSettings[Id].Columns[ColIndex].Index =parseInt(InIndex - 1);
                    
                
            }
            
            if (OutIndex > InIndex)
            {
                ColIndex = null;
                for (key in algridajaxSettings[Id].Columns)
                {
                //for (var i = 0; i < algridajaxSettings[Id].Columns.length; i++)
                //{
                    CurrentIndex = parseInt(algridajaxSettings[Id].Columns[key].Index);
                    if (CurrentIndex == OutIndex)
                        ColIndex = key;
                    if ((CurrentIndex != OutIndex) && (CurrentIndex >= InIndex) && (CurrentIndex <= OutIndex))
                        algridajaxSettings[Id].Columns[key].Index = (CurrentIndex + 1);
                }
                if (ColIndex != null)
                    algridajaxSettings[Id].Columns[ColIndex].Index =parseInt(InIndex);
            }
        },
        
        addEventDragHeader: function(){
            var id = $(this).attr("id");
            
            $(algridajaxSettings[id].algridajaxSelector + " .algridajaxHeaderColumns").draggable({
                helper: "clone",
                drag: function(e, ui){
                    
                    Index = parseInt(ui.helper.attr("colindex"));
                    var idHeaderCol = $(this).attr("id");
                    var idGrid = idHeaderCol.replace("alHeaderCol" + Index + "_", "");
                    algridajaxSettings[idGrid].Drop = false;
                    algridajaxSettings[idGrid].Drag = false;
                    if (!algridajaxSettings[idGrid].ColumnResize)
                    {
                        algridajaxSettings[idGrid].Drag = true;
                        
                        for (key in algridajaxSettings[idGrid].Columns)
                        {
                        //for (var i = 0; i < algridajaxSettings[idGrid].Columns.length; i++)
                        //{
                            var Col = $("#alHeaderCol" + parseInt(algridajaxSettings[idGrid].Columns[key].Index) + "_" + idGrid);
                            
                            InIndex = parseInt(algridajaxSettings[idGrid].Columns[key].Index);
                            var LeftCol = Col.offset().left;
                            var TopCol = Col.offset().top;
                            var HeightCol = Col.outerHeight();
                            var WidthCol = Col.outerWidth();
                            
                            if ((e.pageY >= TopCol) && (e.pageY <= (TopCol + HeightCol)))
                                if ((e.pageX >= LeftCol) && (e.pageX <= (LeftCol + WidthCol)))
                                    if ((e.pageX - LeftCol) > (WidthCol/2))
                                    {
                                        InIndex = InIndex + 1;
                                        if ((Index !== InIndex) && ((Index + 1) != InIndex))
                                        {
                                            
                                            algridajaxSettings[idGrid].Drop = true;
                                            algridajaxSettings[idGrid].DropOutIndex = Index;
                                            algridajaxSettings[idGrid].DropInIndex = InIndex;
                                            
                                        }
                                    }
                                    else
                                    {
                                        if ((Index !== InIndex) && ((Index + 1) != InIndex))
                                        {
                                            algridajaxSettings[idGrid].Drop = true;
                                            algridajaxSettings[idGrid].DropOutIndex = Index;
                                            algridajaxSettings[idGrid].DropInIndex = InIndex;
                                            
                                        }
                                    }
                        }
                    }
                    else
                        return false;
                },
                stop: function(){
                    var idHeaderCol = $(this).attr("id");
                    var idGrid = idHeaderCol.replace("alHeaderCol" + Index + "_", "");
                    algridajaxSettings[idGrid].Drag = false;
                    if (algridajaxSettings[idGrid].Drop)
                    {
                        $("#" + idGrid).algridajax("changeColumnIndex", idGrid, algridajaxSettings[idGrid].DropOutIndex, algridajaxSettings[idGrid].DropInIndex);
                        $("#" + idGrid).algridajax("drawHeaderGrid");
                        $("#" + idGrid).algridajax("DrawBodyGrid");
                        $("#" + idGrid).algridajax("saveToFile");
                        
                    }
                },
            });
        },
        
        setSizeGrid: function() {
            id = $(this).attr("id");
            if (!algridajaxSettings[id]) return;
            if (algridajaxSettings[id].Stretch)
                $(algridajaxSettings[id].algridajaxSelector).css({
                    "width": "100%",
                    "min-width": algridajaxSettings[id].Width,
                });
            else
                $(algridajaxSettings[id].algridajaxSelector).css({
                    "width": algridajaxSettings[id].Width,
                });
        },
        
        drawHeaderGrid: function() {
            id = $(this).attr("id");
            if (!algridajaxSettings[id]) return;
            var StrHeader1 = "";
            if (!algridajaxSettings[id].Stretch && (algridajaxSettings[id].Width != 0))
                StrHeader1 += "<div id='" + algridajaxSettings[id].alHeaderSelector +"' class='algridajaxHeader' style='padding-right: 17px; width: " + (algridajaxSettings[id].Width - 17) + "px;'>";
            else    
                StrHeader1 += "<div id='" + algridajaxSettings[id].alHeaderSelector +"' class='algridajaxHeader' style='padding-right: 17px;'>";
            StrHeader1 += "<div id='" + algridajaxSettings[id].alSubHeaderSelector + "' style='overflow: hidden;'>";
            
            var StrHeader3 = "<tr id='" + algridajaxSettings[id].alHeaderRowSelector + "'>";
            var WidthTable = 0;
            
            function sortFn(prop){
                return function(a, b) {
                    return (parseInt(a[prop]) - parseInt(b[prop]));
                }
            }
            
            algridajaxSettings[id].ArrayColumns = [];
            
            for (key in algridajaxSettings[id].Columns)
                algridajaxSettings[id].ArrayColumns.push($.extend(true, {ColName: key}, algridajaxSettings[id].Columns[key]));
            
            algridajaxSettings[id].ArrayColumns.sort(sortFn("Index"));
            
            for (var i = 0; i < algridajaxSettings[id].ArrayColumns.length; i++) {
                algridajaxSettings[id].ArrayColumns[i].Index = i;
                algridajaxSettings[id].Columns[algridajaxSettings[id].ArrayColumns[i].ColName].Index = i;
            }
                
            
            
            for (var i = 0; i < algridajaxSettings[id].ArrayColumns.length; i++)
            {
                var Column = algridajaxSettings[id].ArrayColumns[i];
                WidthTable += parseFloat(Column.Width);
                StrHeader3 += "<td ColIndex='"+ Column.Index +"' id='alHeaderCol" + Column.Index + "_" + id + "' style='width: " + parseFloat(Column.Width) + "px; border-top-width:0px;border-left-width:0px;' class='algridajaxHeaderColumns'>";
                StrHeader3 += "<table style='width: 100%'><tbody><tr><td>" + Column.Name + "</td>";
                StrHeader3 += "<td style='width:1px;text-align:right;'><span class='algridajaxSort'>&nbsp;</span>";
                
                if (Column.CurrentSort === "Up")
                    StrHeader3 += "<img class='algridajaxSortUp' src='/images/whitepixel.gif' alt='|' style='margin-left:5px;'></td>";
                if (Column.CurrentSort === "Down")
                    StrHeader3 += "<img class='algridajaxSortDown' src='/images/whitepixel.gif' alt='|' style='margin-left:5px;'></td>";
                if (Column.CurrentSort === "None")
                    StrHeader3 += "</td>";
                
                StrHeader3 += "</tr></tbody></table>";
            }
            var StrHeader2 = "<table id='" + algridajaxSettings[id].alTableHeaderSelector + "' class='algridajaxTableHeader' style='width:"+WidthTable+"px'><tbody>";
            algridajaxSettings[id].TableWidth = WidthTable;
            StrHeader3 += "</tr>";
            var StrHeader5 = "</tbody></table></div></div>";
            var StrHeader4 = "";
            // Отрисовка фильтров
            if (algridajaxSettings[id].ShowFilters)
            {
                StrHeader4 += "<tr>"; 
                for (var i = 0; i < algridajaxSettings[id].ArrayColumns.length; i++)
                {   
                    StrHeader4 += "<td class='algridajaxHeaderFilterColumns' style='border-left: 0px'>";
                    StrHeader4 += "<table index='"+i+"' class='alajaxgridTextBox' id='alajaxgridTextBox_Col" + i + "_" + id +"' style='width:100%;'>";
                    StrHeader4 += "<tbody><tr>";
                    StrHeader4 += "<td class='alajaxgridConTextBox' style='width:100%;'>";
                    StrHeader4 += "<input index='"+i+"' class='alajaxgridInputTextBox' id='alajaxgridInput_Col" + i + "_" + id + "' name='' type='text'></td>";
                    StrHeader4 += "</tr></tbody></table>";
                    StrHeader4 += "</td>";
                }
                StrHeader4 += "</tr>";
            }
            
            if (document.getElementById(algridajaxSettings[id].alHeaderSelector) !== null)
                $("#" + algridajaxSettings[id].alHeaderSelector).replaceWith(StrHeader1 + StrHeader2 + StrHeader3 + StrHeader4 + StrHeader5);
            else
                $("#" + algridajaxSettings[id].alContentSelector).append(StrHeader1 + StrHeader2 + StrHeader3 + StrHeader4 + StrHeader5);
            
            $(this).algridajax("addEventDragHeader");
        },
        
        drawLoadingPanel: function() {
            var id = $(this).attr("id");
            if (!algridajaxSettings[id]) return;
            var StrLoading = "<table id='" + algridajaxSettings[id].alLoadingPanelSelector + "' class='alLoadingPanel' style='left:0px;top:0px;z-index:30000;display:none;position:absolute'>"
            StrLoading += "<tbody><tr>"
            StrLoading += "<td class='' style='padding-right:0px;'><img class='alLoadingPanelImg' src='/images/load.gif' alt='' style='vertical-align:middle;'></td><td class='al' style='padding-left:0px;'><span id='alLoadingPanelText'>Загрузка…</span></td>";
            StrLoading += "</tr></tbody></table>"
            StrLoading += "<div id='" + algridajaxSettings[id].alLoadingPanelBlockSelector + "' class='alLoadingPanleBlock' style='display:none;z-index:29999;position:absolute;'></div>";
            $("#" + algridajaxSettings[id].alContentSelector).append(StrLoading);
        },
        
        LoadingPanelShow: function() {
            var id = $(this).attr("id");
            Left = $(this).position().left;
            Top = $(this).position().top;
            Width = $(this).outerWidth() - 3;
            Height = $(this).outerHeight();
            
            // блокируем грид
            $("#" + algridajaxSettings[id].alLoadingPanelBlockSelector).css({
                "display": "block",
                "left": Left,
                "top": Top,
                "width": Width,
                "height": Height,
                "position": "absolute",
            });
            
            LDP = $("#" + algridajaxSettings[id].alLoadingPanelSelector);
            LDP_Width = LDP.outerWidth();
            LDP_Height = LDP.outerHeight();
            
            TH = $("#" + algridajaxSettings[id].alBodySelector);
            TH_Width = TH.outerWidth();
            B = $("#" + algridajaxSettings[id].alBodySelector); 
            B_Height = B.outerHeight();
            B_Left = B.position().left;
            B_Top = B.position().top;
            
            $("#" + algridajaxSettings[id].alLoadingPanelSelector).css({
                "display": "block",
                "left": (B_Left + (TH_Width/2) - (LDP_Width/2)),
                "top": (B_Top + (B_Height/2) - (LDP_Height/2)),
            });
            
            
        },
        
        LoadingPanelHide: function() {
            var id = $(this).attr("id");
            $("#" + algridajaxSettings[id].alLoadingPanelBlockSelector).css({
                "display": "none"
            });
            
            $("#" + algridajaxSettings[id].alLoadingPanelSelector).css({
                "display": "none"
            });
        },
        
        ChangeScrollTop: function() {
            // Изменение положение скролла, относительно страницы
            var id = $(this).attr("id");
            
            if (algridajaxSettings[id].Focused)
            {
                
                $("#" + algridajaxSettings[id].alBodySelector).scrollTop(algridajaxSettings[id].ScrollTop);
            }
            else {
                var ScrollTop = $(this).algridajax("GetScrollTopForPageNumber", algridajaxSettings[id].CurrentPage);
                
                $("#" + algridajaxSettings[id].alBodySelector).scrollTop(ScrollTop);
            }
            
            algridajaxSettings[id].Focused = false;
        },
        
        GetRowHeight: function() {
            var id = $(this).attr("id");
            
            var RowHeight = 24;
            if ($(this).css("font-size") === "14px")
                RowHeight = 27;
            if ($(this).css("font-size") === "12px")
                RowHeight = 24;
            
            return RowHeight;
        },
        
        DrawBodyGrid: function() {
            var id = $(this).attr("id");
            
            var StrBody = "";
            
            if (!algridajaxSettings[id].Stretch && (algridajaxSettings[id].Width != 0))
                StrBody += "<div id='"+algridajaxSettings[id].alBodySelector+"' class='algridajaxBody' style='height: "+ (algridajaxSettings[id].Height - 28) +"px; width: " + algridajaxSettings[id].Width + "px; overflow: scroll;' align='left'>";
            else
                StrBody += "<div id='"+algridajaxSettings[id].alBodySelector+"' class='algridajaxBody' style='height: "+ (algridajaxSettings[id].Height - 28) +"px; overflow: scroll;' align='left'>";
            
            var RecordCount = 0;
            
            if (algridajaxSettings[id].DataDetails != null)
                RecordCount = algridajaxSettings[id].DataDetails["Count"];
            
            var RowHeight =  $(this).algridajax("GetRowHeight");
            var AllHeight = RecordCount * RowHeight;
            var PageHeight = algridajaxSettings[id].CurrentPageSize * RowHeight;
            var TopBlockHeight = (algridajaxSettings[id].CurrentPage * PageHeight) - PageHeight;
            var BottomBlockHeight = AllHeight - (PageHeight + TopBlockHeight);
            var CurrentPageHeight = algridajaxSettings[id].Data.length * RowHeight;
            
            if (CurrentPageHeight < (algridajaxSettings[id].Height - 28)) {
                BottomBlockHeight = (algridajaxSettings[id].Height - 28) - CurrentPageHeight - 18;
            }
            
            
            StrBody += "<div id='" + algridajaxSettings[id].alTopBlockSelector + "' style='width: 1px; height: "+TopBlockHeight+"px'></div>";
            
            StrBody += "<table id='"+algridajaxSettings[id].alBodyTableSelector+"' class='algridajaxBodyTable' style='width:" + algridajaxSettings[id].TableWidth + "px;empty-cells:show;table-layout:fixed;overflow:hidden;'><tbody>";
            
            var LightingLineClass = "";
            if (algridajaxSettings[id].LightingLine)
                LightingLineClass = "alLightingLine";
            
            var RowStyle = "";
            var Row;
            
            for (var i = 0; i < algridajaxSettings[id].Data.length; i++)
            {
                Row = algridajaxSettings[id].Data[i];
                eval(algridajaxSettings[id].OnDrawRow);
                
                if (parseInt(Row["RowNumber"]) === parseInt(algridajaxSettings[id].CurrentFocusedIndex))
                {
                    StrBody += "<tr id='" + algridajaxSettings[id].alBodyTableRowSelector + "_" + Row["RowNumber"] + "' index='" + i + "' rownumber='" + Row["RowNumber"] + "' class='algridajaxRowFocused  " + LightingLineClass + "' style='" + RowStyle + "'>";
                    algridajaxSettings[id].CurrentIndex = i;
                    algridajaxSettings[id].CurrentRow = Row;
                    
                }
                else
                    StrBody += "<tr id='" + algridajaxSettings[id].alBodyTableRowSelector + "_" + Row["RowNumber"] + "' index='" + i + "' rownumber='" + Row["RowNumber"] + "' class='" + LightingLineClass + "' style='" + RowStyle + "'>";
                
                for (var j = 0; j < algridajaxSettings[id].ArrayColumns.length; j++)
                {
                    var Column = algridajaxSettings[id].ArrayColumns[j];
                    if (Row[Column["FieldName"]] !== undefined)
                    {
                        //StrBody += "<td class='algridajaxTD algridajaxTD"+j+"' style='overflow: hidden; width: " + Column["Width"] + "px; height: "+(algridajaxSettings[id].RowHeight - 8)+"px'>" + algridajaxSettings[id].Data[i][Column["FieldName"]] + "</td>";
                        var CellValue = Row[Column["FieldName"]];
                        
                        if (CellValue === null)
                            StrBody += "<td class='algridajaxTD algridajaxTD"+Column.Index+"' style='width: " + Column["Width"] + "px;'></td>";
                        else {
                            if ((Column.Format === "d.m.Y H:i") || (Column.Format === "d.m.Y")){
                                CellValue = $(this).algridajax("DateToString", CellValue, Column.Format);
                            }
                            
                            StrBody += "<td class='algridajaxTD algridajaxTD"+Column.Index+"' style='overflow: hidden; width: " + Column["Width"] + "px'>" + CellValue + "</td>";
                            
                        }
                    }
                    else
                        StrBody += "<td class='algridajaxTD algridajaxTD"+Column.Index+"' style='width: " + Column["Width"] + "px;'></td>";
                }
                StrBody += "</tr>";
            }
            StrBody += "</tbody></table>";
            StrBody += "<div id='" + algridajaxSettings[id].alBottomBlockSelector + "' style='width: 1px; height: "+BottomBlockHeight+"px'>";
            StrBody += "</div>";
            
            if (document.getElementById(algridajaxSettings[id].alBodySelector) !== null) {
                $("#" + algridajaxSettings[id].alBodySelector).replaceWith(StrBody);
                
            }
            else {
                
                $("#" + algridajaxSettings[id].alContentSelector).append(StrBody);
                //var temp = $("#" + algridajaxSettings[id].alContentSelector).html();
                //var e = document.getElementById(algridajaxSettings[id].alContentSelector);
                //e.innerHTML = temp + StrBody;
                //$("#" + algridajaxSettings[id].alContentSelector).html(temp + StrBody);
            }
            
            //$(this).algridajax("ChangeScroll");
            var ScrollLeft =  $("#" + algridajaxSettings[id].alSubHeaderSelector).scrollLeft();
            
            $(this).algridajax("ChangeScrollTop");
            $(this).algridajax("addEventScrollBody");
            $(this).algridajax("SetSize"); 
            $("#" + algridajaxSettings[id].alBodySelector).scrollLeft(ScrollLeft);
        },
        
        AddZero: function(Number) {
            Number = String(Number);
            return Number.length > 1 ? Number : (+Number >= 0) ? "0" + Number : Number;
        },
        
        DateToString: function(Date, Format) {
            //2015-06-22 15:51:35.92
            //01234567890123456789
            var Year = Date[0] + Date[1] + Date[2] + Date[3];
            var Month = Date[5] + Date[6];
            var Day = Date[8] + Date[9];
            var Hours = Date[11] + Date[12];
            var Minutes = Date[14] + Date[15];
            
            if (Format === 'd.m.Y H:i')
                return $(this).algridajax("AddZero", Day) + "."
                        + $(this).algridajax("AddZero", Month) + "."
                        + $(this).algridajax("AddZero", Year) + " "
                        + $(this).algridajax("AddZero", Hours) + ":"
                        + $(this).algridajax("AddZero", Minutes);
            if (Format === 'd.m.Y')
                return $(this).algridajax("AddZero", Day) + "."
                        + $(this).algridajax("AddZero", Month) + "."
                        + $(this).algridajax("AddZero", Year);
                
            return $(this).algridajax("AddZero", Day) + "."
                        + $(this).algridajax("AddZero", Month) + "."
                        + $(this).algridajax("AddZero", Year) + " "
                        + $(this).algridajax("AddZero", Hours) + ":"
                        + $(this).algridajax("AddZero", Minutes);
        },
        
        DrawPagerBottomPanel: function() {
            id = $(this).attr("id");
            
            if (!algridajaxSettings[id].ShowPager) return;
            
            var RecordCount = 0;
            var PageCount = 0;
            var CurrentPage = algridajaxSettings[id].CurrentPage;
            var CurrentPageSize = algridajaxSettings[id].CurrentPageSize;
            var CurrentFocusedIndex = algridajaxSettings[id].CurrentFocusedIndex;
             
            if (algridajaxSettings[id].DataDetails != null)
            {
                RecordCount = algridajaxSettings[id].DataDetails["Count"];
                PageCount = algridajaxSettings[id].DataDetails["PageCount"];
                
            }
            
            var StrBottom = "";
            if (!algridajaxSettings[id].Stretch && (algridajaxSettings[id].Width != 0))
                StrBottom += "<div id='"+algridajaxSettings[id].alPagerBottomPanelSelector+"' class='alPagerBottomPanel' style='width: " + algridajaxSettings[id].Width + "px;'>";
            else
                StrBottom += "<div id='"+algridajaxSettings[id].alPagerBottomPanelSelector+"' class='alPagerBottomPanel'>";
            
            StrBottom += "  <div class='alPagerBottomPanelContent' id='"+algridajaxSettings[id].alPagerBottomPanelContentSelector+"' style='width: 100%;'>";
            StrBottom += "      <b id='" + algridajaxSettings[id].alPagerBottomPanelSummarySelector + "' class='alPagerBottomPanelSummary'>Запись " + CurrentFocusedIndex + " из " + RecordCount + " (" + PageCount +" страниц)</b>";
            StrBottom += "      <b class='alPagerPrevButton'>";
            //StrBottom += "          <b id='alPagerBottomPanelSummary_" + id + "' class='alPagerBottomPanelSummary'>Запись " + CurrentFocusedIndex + " из " + RecordCount + " (" + PageCount +" страниц)</b>";
            StrBottom += "          <img class='alPagerPrevImg' src='/images/whitepixel.gif' alt='Prev'>";
            StrBottom += "      </b>";
            
            var DiffStart = 0;
            var DiffEnd = 0;
            var PgStart = CurrentPage - 5;
            var PgEnd = CurrentPage + 5;
            
            if (PgStart <= 0)            
            {    
                DiffStart = PgStart;
                PgStart = 1;
            }
            
            if (PgEnd > PageCount)
            {
                DiffEnd = PgEnd - PageCount;
                PgEnd = PageCount; 
            }
            
            if ((PgStart - DiffEnd) > 0)
                PgStart = PgStart - DiffEnd;
            
            if ((PgEnd - DiffStart) <= PageCount)
                PgEnd = PgEnd - DiffStart; 
            
            for (PgStart; PgStart <= PgEnd; PgStart++)
                if (PgStart === CurrentPage)
                    StrBottom += "      <b class='alPagerNum alPagerNumCurrent'>"+PgStart+"</b>";
                else
                    StrBottom += "      <a class='alPagerNum'>"+PgStart+"</a>";
            
            StrBottom += "      <a class='alPagerNextButton'>";
            StrBottom += "          <img class='alPagerNextImg' src='/images/whitepixel.gif' alt='Next'>";
            StrBottom += "      </a>";
            
            StrBottom += "      <b class='dxp-spacer' style='width: 0px;'>&nbsp;</b>";
            StrBottom += "      <b class='alPageSize'>";
            StrBottom += "          <span class='alPageSizeText' style='float: left;'>";
            StrBottom += "              <label>Размер стр.:</label>";
            StrBottom += "          </span>";
            StrBottom += "          <span id='alajaxgridPageSizeList_" + id + "' class='alajaxgridPageSizeList' style='margin-left:4px;'>";
            StrBottom += "              <input class='alajaxgridPageSizeInput' id='alajaxgridPageSizeInput_" + id + "' type='text' readonly='readonly' value='" + algridajaxSettings[id].CurrentPageSize + "' style='border-width:0px;'>";
            StrBottom += "              <span id='alajaxgridPageSizeButton_" + id + "' class='alajaxgridPageSizeButton' style='height: 5px;'>";
            StrBottom += "                  <img id='alajaxgridPageSizeButtonImg_" + id + "' class='alajaxgridPageSizeButtonImg' src='/images/whitepixel.gif' alt='v' style='margin-top: 0px;'>";
            StrBottom += "              </span>";
            StrBottom += "          </span>";
            
            StrBottom += "      </b>";
            StrBottom += "  </div>";
            StrBottom += "  <b class='dx-clear'></b>";
            
            StrBottom += "<div id='alajaxgridPageSizePopup_" + id + "' style='z-index: 19998; position: absolute; left: 1148px; top: 485px; overflow: visible; width: 45px; height: 118px; visibility: visible; display: none;'>";
            StrBottom += "  <div class='alajaxgridPageSizePopupLits' id='alajaxgridPageSizePopupLits_" + id + "' style='border-spacing: 0px; width: 41px; left: 0px; top: 0px;'>";
            StrBottom += "      <ul class='alajaxgridPageSizePopupUl'>";
            
            for (var i = 0; i < algridajaxSettings[id].PageSizeList.length; i++)
            {
                if (algridajaxSettings[id].PageSizeList[i] === algridajaxSettings[id].CurrentPageSize)
                    StrBottom += "          <li class='alajaxgridPageSizeItem alajaxgridPageSizeItemSelected' id='alajaxgridPageSizeItem" + i + "'>";
                else
                    StrBottom += "          <li class='alajaxgridPageSizeItem' id='alajaxgridPageSizeItem" + i + "'>";
                
                StrBottom += "              <div class='alajaxgridPageSizeItemContent' id='alajaxgridPageSizeItemContent" + i + "' style='float: none;'>";
                StrBottom += "                  <span class='dx-vam'>" + algridajaxSettings[id].PageSizeList[i] + "</span>";
                StrBottom += "              </div>";
                StrBottom += "              <b class='dx-clear'></b>";
                StrBottom += "          </li>";
                StrBottom += "          <li class='alajaxgridPageSizeItemSpacing' id='alajaxgridPageSizeItemSpacing" + i + "'></li>";
            }
            
            StrBottom += "      </ul>";
            StrBottom += "  </div>";
            StrBottom += "</div>";
            
            StrBottom += "</div>";
            
            if (document.getElementById(algridajaxSettings[id].alPagerBottomPanelSelector) !== null)
                $("#" + algridajaxSettings[id].alPagerBottomPanelSelector).replaceWith(StrBottom);
            else
                $("#" + algridajaxSettings[id].alContentSelector).append(StrBottom);
            
            
        },
        
        drawBottomGrid: function() {
            id = $(this).attr("id");
        },
        
        GetFilters: function(Type) {
            id = $(this).attr("id");
            var Result = [];
            for (key in algridajaxSettings[id].Filters) {
                if (algridajaxSettings[id].Filters[key].Type === Type)
                    Result.push(algridajaxSettings[id].Filters[key].Condition);
            }
            return Result;
        },
        
        Search: function(Async, Filters, PageNumber, RowNumber) {
            var id = $(this).attr("id");
            
            var ForeignFilters = Aliton.SearchForeignFilters(id);
            $(this).algridajax("AddFilters", ForeignFilters);
            
            var InternalFilterArray = $(this).algridajax("GetFilters", "Internal");
            var ExternalFilterArray = $(this).algridajax("GetFilters", "External");
            
            
            ExternalFilterArray = $.merge(ExternalFilterArray, Filters);
            
            algridajaxSettings[id].SearchProcess_ID++;
            
            var ObjectData = {
                Id: id,
                ModelName: algridajaxSettings[id].ModelName,
                CurrentPage: 1,
                CurrentPageSize: -1,
                Sort: algridajaxSettings[id].Sort,
                InternalFilters: InternalFilterArray,
                ExternalFilters: ExternalFilterArray,
                params: algridajaxSettings[id].params,
                Process_ID: algridajaxSettings[id].SearchProcess_ID,
                PageNumber: PageNumber,
            };
            
            $(this).algridajax("LoadingPanelShow");
            
            if ((algridajaxSettings[id].CurrentRow !== null) && (RowNumber !== undefined)) {
                if (RowNumber === algridajaxSettings[id].CurrentRow["RowNumber"])
                    $("#" + id).algridajax("LocateAfterSearch", algridajaxSettings[id].CurrentRow); 
                
            }
            
            $.ajax({
                url: algridajaxSettings[id].AjaxUrl,
                type: "POST",
                data: ObjectData,
                async: Async,
                success: function(Res){
                    Result = eval("(" + Res + ")");
                    id = Result["Id"];
                    
                    var SearchProcess_ID = parseInt(Result["Process_ID"]);
                    var PageNumber = parseInt(Result["PageNumber"]);
                    
                    if (SearchProcess_ID !== algridajaxSettings[id].SearchProcess_ID) return;
                    
                    algridajaxSettings[id].SearchProcess_ID = 0;
                    
                    var NewInternalFilters = $("#" + id).algridajax("GetFilters", "Internal");
                    
                    if (Result["Data"].length > 0) {
                        $("#" + id).algridajax("LocateAfterSearch", Result["Data"][0]); 
                        
                    }
                    else {
                        
                        if (algridajaxSettings[id].FirstLoad) {
                            $("#" + id).algridajax("LoadData", Async, 1, algridajaxSettings[id].CurrentPageSize, null, true);
                            return;
                        }
                        
                        
                        if ((!$(this).algridajax("ArrayEquals", NewInternalFilters, algridajaxSettings[id].InternalFilters))) {
                        
                            $("#" + id).algridajax("LoadData", Async, 1, algridajaxSettings[id].CurrentPageSize, null, true);
                            return;
                        }
                        
                        $("#" + id).algridajax("LoadingPanelHide");
                        
                    }
                    //$("#" + id).algridajax("LoadingPanelHide");    
                }
            });
            
        },
        
        LocateAfterSearch: function(Row) {
            var id = $(this).attr("id");
            if ((Row === null) || (Row === undefined)) return;
            var NewInternalFilters = $("#" + id).algridajax("GetFilters", "Internal");
            var RowNumber = Row["RowNumber"];
            if ($(this).algridajax("ArrayEquals", NewInternalFilters, algridajaxSettings[id].InternalFilters)) {
                if (algridajaxSettings[id].Data.length > 0) {
                    if ((RowNumber >= algridajaxSettings[id].Data[0].RowNumber) && (RowNumber <= algridajaxSettings[id].Data[algridajaxSettings[id].Data.length-1].RowNumber)) {
                        $("#" + id).algridajax("SetFocused", RowNumber); 
                        $("#" + id).algridajax("GoFocusedRow");
                        $("#" + id).algridajax("LoadingPanelHide");
                    }
                    else {
                        var CurrentPage = $("#" + id).algridajax("GetPageNumberForCurrentRow", RowNumber);
                        
                        $("#" + id).algridajax("LoadData", true, CurrentPage, algridajaxSettings[id].CurrentPageSize, RowNumber, true);

                    }

                }
                else {
                    var CurrentPage = $("#" + id).algridajax("GetPageNumberForCurrentRow", RowNumber);
                    
                    $("#" + id).algridajax("LoadData", true, CurrentPage, algridajaxSettings[id].CurrentPageSize, RowNumber, true);
                }
            }
            else {
                var CurrentPage = $("#" + id).algridajax("GetPageNumberForCurrentRow", RowNumber);

                $("#" + id).algridajax("LoadData", true, CurrentPage, algridajaxSettings[id].CurrentPageSize, RowNumber, true);
            }
        },
        
        ArrayEquals: function (Array1, Array2) {
            if (Array1.length != Array2.length) return false;
            var On = 0;
            for (var i = 0; i < Array1.length; i++ ) {
                for (var j = 0; j < Array2.length; j++ ) {
                    if (Array1[i] === Array2[j]) {
                        On++
                        break
                    }
                }
            }
            return On == Array1.length ? true:false;
        },

        
        Load: function(Async, CurrentPage, CurrentPageSize, Draw, ChangeValue) {
            var id = $(this).attr("id");
            
            if (Aliton.isRelationsNotReady(id)) return;
            
            if ((CurrentPage === undefined) || (CurrentPage === null) || (CurrentPage === -1))
                CurrentPage = algridajaxSettings[id].CurrentPage;
            
            if ((CurrentPageSize === undefined) || (CurrentPageSize === null))
                CurrentPageSize = algridajaxSettings[id].CurrentPageSize;
            
            if ((Draw === undefined) || (Draw === null))
                Draw = true;
            
            if ((ChangeValue === undefined) || (ChangeValue === null))
                ChangeValue = false;
            
            if ((Async === undefined) || (Async === null))
                Async = true;
            
            var ForeignLocate = Aliton.SearchForeignLocate(id);
            
            if (ForeignLocate.length !== 0) {  
                $(this).algridajax("Search", Async, ForeignLocate, CurrentPage);
            }
            else {
                var ForeignFilters = Aliton.SearchForeignFilters(id);
                $(this).algridajax("AddFilters", ForeignFilters);
                
                var NewInternalFilters = $(this).algridajax("GetFilters", "Internal");
                if (($(this).algridajax("ArrayEquals", NewInternalFilters, algridajaxSettings[id].InternalFilters)) || (algridajaxSettings[id].FirstBoot)){
                    algridajaxSettings[id].CurrentRow = null;
                    $(this).algridajax("LoadData", Async, CurrentPage, CurrentPageSize, algridajaxSettings[id].CurrentFocusedIndex, Draw, ChangeValue);
                }
            }
            
        },
        
        LoadData: function(Async, CurrentPage, CurrentPageSize, CurrentRow, Draw, ChangeValue) {
            var id = $(this).attr("id");
            
            if ((CurrentPage === undefined) || (CurrentPage === null) || (CurrentPage === -1))
                CurrentPage = 1;
            
            if ((CurrentPageSize === undefined) || (CurrentPageSize === null))
                CurrentPageSize = 200;
            
            if ((Draw === undefined) || (Draw === null))
                Draw = true;
            
            if ((ChangeValue === undefined) || (ChangeValue === null))
                ChangeValue = false;
            
            if ((CurrentRow === undefined) || (CurrentRow === null))
                CurrentRow = -1;
            
            var ForeignFilters = Aliton.SearchForeignFilters(id);
            
            
            $(this).algridajax("AddFilters", ForeignFilters);
            var InternalFilterArray = $(this).algridajax("GetFilters", "Internal");
            var ExternalFilterArray = $(this).algridajax("GetFilters", "External");
            
            algridajaxSettings[id].Process_ID++;
            
            var ObjectData = {
                Id: id,
                ModelName: algridajaxSettings[id].ModelName,
                CurrentPage: CurrentPage,
                CurrentPageSize: CurrentPageSize,
                Sort: algridajaxSettings[id].Sort,
                InternalFilters: InternalFilterArray,
                ExternalFilters: ExternalFilterArray,
                params: algridajaxSettings[id].params,
                Process_ID: algridajaxSettings[id].Process_ID,
                Draw: Draw,
                CurrentRow: CurrentRow,
            };
            
            
            
            $(this).algridajax("LoadingPanelShow");
            
            $.ajax({
                url: algridajaxSettings[id].AjaxUrl,
                type: "POST",
                data: ObjectData,
                async: Async,
                success: function(Res){
                    var Result = eval("(" + Res + ")");
                    
                    id = Result["Id"];
                    
                    var Process_ID = parseInt(Result["Process_ID"]); 
                    
                    if (Process_ID !== algridajaxSettings[id].Process_ID) return;
                     
                    var Draw = Result["Draw"];
                    var CurrentRow = parseInt(Result["CurrentRow"]);
                    
                    algridajaxSettings[id].Data = Result["Data"];
                    algridajaxSettings[id].DataDetails = Result["Details"];
                    algridajaxSettings[id].CurrentPage = parseInt(Result["CurrentPage"]);
                    algridajaxSettings[id].CurrentPageSize = parseInt(Result["CurrentPageSize"]);
                    algridajaxSettings[id].InternalFilters = $("#" + id).algridajax("GetFilters", "Internal");
                    algridajaxSettings[id].OldPageSize = algridajaxSettings[id].CurrentPageSize; 
                            
                    if (Draw) {
                        $("#" + id).algridajax("DrawBodyGrid");
                        $("#" + id).algridajax("DrawPagerBottomPanel");
                        
                    }
                    
                    
                    
                    if (CurrentRow !== -1) {
                        $("#" + id).algridajax("SetFocused", CurrentRow); 
                        $("#" + id).algridajax("GoFocusedRow");
                    }
                    
                    $("#" + id).algridajax("LoadingPanelHide");
                    
                    Aliton.Objects[id].Ready = true;
                    Aliton.Objects[id].Load = false;
                    algridajaxSettings[id].FirstLoad = false;
                    algridajaxSettings[id].Focused = false;
                    
                    //if (ChangeValue)
                    //    Aliton.ChangeValue(id);
                    
                    Aliton.LoadDataObject(id);
                }
            });
        },
        
        LoadDataGrid: function(AsyncMode, Locate) {
            var id = $(this).attr("id");
            
            if (Aliton.isRelationsNotReady(id))
                return;
            
            Aliton.Objects[id].Ready = false;
            Aliton.Objects[id].Load = true;
            
            if (AsyncMode == undefined)
                AsyncMode = true;
            
            if (Locate == undefined)
                Locate = false;
            
            algridajaxSettings[id].LoadingData = true;
            
            var ForeignLocate = Aliton.SearchForeignLocate(id);
            if (ForeignLocate.length !== 0) {
                $(this).algridajax("Find", ForeignLocate, true, true);
                return;
            }
            
            
            var ForeignFilters = Aliton.SearchForeignFilters(id);
            $(this).algridajax("AddFilters", ForeignFilters);
            //algridajaxSettings[id].Filters = $.merge(algridajaxSettings[id].Filters, Result);
            
            
            var InternalFilterArray = [];
            var ExternalFilterArray = [];
            
            for (var i = 0; i < algridajaxSettings[id].Filters.length; i++) {
                if (algridajaxSettings[id].Filters[i].Type == "Internal")
                    InternalFilterArray.push(algridajaxSettings[id].Filters[i].Condition);
                if (algridajaxSettings[id].Filters[i].Type == "External")
                    ExternalFilterArray.push(algridajaxSettings[id].Filters[i].Condition);
            }
            
            
            
            
            if (algridajaxSettings[id].CurrentPage === -1)
                algridajaxSettings[id].CurrentPage = 1;
            
            var objData = {
                Id: id,
                ModelName: algridajaxSettings[id].ModelName,
                CurrentPage: algridajaxSettings[id].CurrentPage,
                CurrentPageSize: algridajaxSettings[id].CurrentPageSize,
                Sort: algridajaxSettings[id].Sort,
                InternalFilters: InternalFilterArray,
                ExternalFilters: ExternalFilterArray,
                params: algridajaxSettings[id].params,
                Process_ID: algridajaxSettings[id].Process_ID,
            };
            
            
            
            $("#" + id).algridajax("delEventScrollBody");
            $(this).algridajax("LoadingPanelShow");
            
            
            $.ajax({
                url: algridajaxSettings[id].AjaxUrl,
                type: "POST",
                data: objData,
                async: AsyncMode,
                success: function(Res){
                    var Result = eval("(" + Res + ")");
                    id = Result["Id"];
                    var Process_ID = Result["Process_ID"]; 
                    
                    algridajaxSettings[id].Data = Result["Data"];
                    algridajaxSettings[id].DataDetails = Result["Details"];
                    
                    
            
                    
                    $("#" + id).algridajax("DrawBodyGrid");
                    $("#" + id).algridajax("LoadingPanelHide");
                    $("#" + id).algridajax("DrawPagerBottomPanel");
                    //$("#" + id).algridajax("SetFilterControls");
                    
                    if (Locate)
                        $("#" + id).algridajax("GoFocusedRow");
                    
                    algridajaxSettings[id].Focused = false;
                    algridajaxSettings[id].LoadingData = false;
                    Aliton.Objects[id].Ready = true;
                    Aliton.Objects[id].Load = false;
                    Aliton.LoadDataObject();
                }
            });
        
        },
        
        SearchFilters: function() {
            var id = $(this).attr("id");
            
            for (key in Aliton.Links) {
                if (Aliton.Links[key].In === id) {
                    $(Aliton.Links[key].Out).algridajax("SetFilterControls", false);
                }
            }
        },
        
        ExternalFilterExists: function() {
            var id = $(this).attr("id");
            for (key in Aliton.Links) 
                if ((Aliton.Links[key].In === id) && (Aliton.Links[key]))
                    return true;
            return false;
        },
        
        Run: function() {
            var id = $(this).attr("id");
            
            $(this).algridajax("setSizeGrid");
            $(this).algridajax("drawHeaderGrid");
            $(this).algridajax("DrawBodyGrid");
            $(this).algridajax("drawLoadingPanel");
            $(this).algridajax("DrawPagerBottomPanel");
            $(this).algridajax("SetSize");
            $(this).algridajax("SearchFilters");
            
            //if ($(this).algridajax("ExternalFilterExists")) return;
            
            if (algridajaxSettings[id].FirstLoad)
                $(this).algridajax("Load");
            
            //$(this).algridajax("SearchFilters");
        },

        setParams: function (params) {
            var id = $(this).attr("id");
            $.extend(true, algridajaxSettings[id].params, params)
        }
    };
    
    $.fn.algridajax = function(method){
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else
            return false;
    };
    
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
                if(!almemoSettings[id]) {
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
            
            if (Result.length === 0) return;
            
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
            $(this).almemo("Refresh");
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
    
    Radiobuttonmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Checked: false,
                Label: '',
                GroupName: '',
                OnAfterClick: '',
            }, options || {});
            
            var id = settings.id;
            
            settings.alRadioButtonSelector = "#" + id;
            settings.alRbtnSelector = "alrbtn_" + id;
            settings.alRbtnInputSelector = "alrbtninput_" + id;
            
            return this.each(function(){
                if(!alradiobuttonSettings[id]) {
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
                }
                
                $(this).alradiobutton("Run");
                
                $(settings.alRadioButtonSelector).on("click", function(){
                    if (!settings.Checked)
                        $(settings.alRadioButtonSelector).alradiobutton("SetValue", true, false, true);
                    eval(alradiobuttonSettings[id].OnAfterClick);
                    
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
            
            if ((F) && ((Value == true) || (Value == 'true')))
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
            
            if ((Value == true) || (Value == 'true'))
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
            Str += "                    <input id='" + alradiobuttonSettings[id].alRbtnInputSelector + "' name='" + alradiobuttonSettings[id].Name + "' value='' type='text' style='opacity:0;width:1px;height:1px;position:relative;background-color:transparent;display:block;margin:0;padding:0;border-width:0;font-size:0pt;'>";
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
    
    
    /**********************/
    
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

                if(!alcomboboxajaxSettings[id]) {


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
                
                $(document).on('keydown', "#" + settings.alComboboxAjaxInputSelector, function(event){
                    if (settings.ReadOnly) return false;
                });
                
                $(document).on('keyup', "#" + settings.alComboboxAjaxInputSelector, function(event){
                    if (!settings.Ready) return;
                    
                    
                    
                    if (settings.Text == $("#" + settings.alComboboxAjaxInputSelector).val()) return;
                    
                    
                       
                    
                    
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
                        
                    
                    if ($("#" + settings.alComboboxAjaxInputSelector).val() === "") {
                        $(settings.alComboboxAjaxSelector).alcomboboxajax("Set", null);
                        return;
                    }
                        
                });
                
                
                
            });
        },
        
        Load: function(Text, Selected) {
            var id = $(this).attr("id");
            
            if (Selected === undefined)
                Selected = false;
            
            if (Aliton.isRelationsNotReady(id)) return;
            
            var Filetrs = Aliton.SearchForeignFilters(id);
            $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("AddFilters", Filetrs);
            
            
            var Condition = alcomboboxajaxSettings[id].Type.Condition;
            Condition = Condition.replace(":Value", Text);
            
            var Filter = {
                Type: "Internal",
                Control: id,
                Condition: Condition,
                Value: Text,
                Name: id,
            };
            
            $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("ClearColumnFilter", Filter.Name);
            $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("AddFilter", Filter);
            if (Selected)
                $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("Load", false);
            else
                $("#" + alcomboboxajaxSettings[id].PopupControl).algridajax("Load");
            alcomboboxajaxSettings[id].Text = $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).val();
            alcomboboxajaxSettings[id].FirstOpen = false;
            
            if (Selected) {
                
                var KeyValue = null;
                
                if (algridajaxSettings[alcomboboxajaxSettings[id].PopupControl].CurrentRow !== null) {
                    
                    
                    KeyValue = algridajaxSettings[alcomboboxajaxSettings[id].PopupControl].CurrentRow[alcomboboxajaxSettings[id].KeyField];
                    
                    $("#" + id).alcomboboxajax("SetValue", KeyValue, true);
                }
                else
                {
                    
                    $("#" + id).alcomboboxajax("Set", null, true);
                }
            }
        },
        
        ButtonClick: function() {
            var id = $(this).attr("id");
            
            if (alcomboboxajaxSettings[id].ReadOnly) return;
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
            var Data = algridajaxSettings[alcomboboxajaxSettings[id].PopupControl].Data;
            
            
            for (var i = 0; i < Data.length; i++)
                if (Data[i][Key] === KeyValue)
                    return Data[i];
            return Result;
        },
        
        SearchAndSet: function(KeyValue) {
            var id = $(this).attr("id");
            
            if (KeyValue === undefined)
                KeyValue = alcomboboxajaxSettings[id].KeyValue;
            
            var Condition = "t." + alcomboboxajaxSettings[id].KeyField + "=" + KeyValue;
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
            if ((Row === null) || (Row === undefined)){
                alcomboboxajaxSettings[id].KeyValue = null;
                alcomboboxajaxSettings[id].CurrentRow = null;
                alcomboboxajaxSettings[id].Text = "";
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxFormInputSelector).val(null);
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).val(null);
            }
            else {
                alcomboboxajaxSettings[id].KeyValue = Row[alcomboboxajaxSettings[id].KeyField];
                alcomboboxajaxSettings[id].CurrentRow = Row;
                alcomboboxajaxSettings[id].Text = Row[alcomboboxajaxSettings[id].FieldName];
                
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxFormInputSelector).val(Row[alcomboboxajaxSettings[id].KeyField]);
                $("#" + alcomboboxajaxSettings[id].alComboboxAjaxInputSelector).val(Row[alcomboboxajaxSettings[id].FieldName]);
            }
            if (Ready) {
                alcomboboxajaxSettings[id].Ready = true;
                Aliton.Objects[id].Ready = true;
            }
            
            eval(alcomboboxajaxSettings[id].OnAfterChange);
            
            Aliton.ChangeValue(id);
        },
        
        SetValue: function(KeyValue, Ready) {
            var id = $(this).attr("id");
            
            
            var Row = $(this).alcomboboxajax("FindInDataGrid", alcomboboxajaxSettings[id].KeyField, KeyValue);
            
            if (Row === -1) 
                Row = $(this).alcomboboxajax("SearchAndSet", KeyValue);
            else { 
                
                $(alcomboboxajaxSettings[id].alComboboxAjaxSelector).alcomboboxajax("Set", Row, true);
            }
                
            
            
        },
        
        Run: function() {
            var id = $(this).attr("id");
            
            $(this).alcomboboxajax("DrawControl");
            
            if ((alcomboboxajaxSettings[id].KeyValue !== null) && (alcomboboxajaxSettings[id].KeyValue !== "")) {
                $(this).alcomboboxajax("SetValue", alcomboboxajaxSettings[id].KeyValue, true);
            }
            else {
                $(this).alcomboboxajax("Set", null, true);
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
    
    /******************/
    
    Dialogmethods = {
        init: function(options) {
            var settings = $.extend({
                id: null,
                Width: 400,
                Height: 400,
                ContentUrl: "",
                FirstShow: true,
                Show: false,
                OnClose: "",
            }, options || {});
            
            var id = settings.id;
            
            settings.alDialogSelector = "#" + id;
            settings.alBlockPanel = "alBlockPanel_" + id;
            settings.alDialogContent = "alDialogContent_" + id;
                    
            return this.each(function(){
                id = $(this).attr("id");
                if(!aldialogSettings[id]) {
                    aldialogSettings[id] = settings;

                    if (typeof Aliton !== "undefined") {
                        Aliton.Objects[id] = {
                            id: id,
                            Type: "Dialog",
                            Ready: false,
                            Settings: settings,
                        };
                    }

                    $(window).resize(function () {
                        if (settings.Show) {
                            var WindowWidth = $(window).outerWidth();
                            var WindowHeight = $(window).outerWidth();

                            $("#" + settings.alBlockPanel).css({
                                "width": WindowWidth,
                                "height": WindowHeight,
                            });
                        }
                    });
                }
                $(this).aldialog("Run");
            });
        },
        
        Load: function(Params) {
            var id = $(this).attr("id");
            
            var Str = "";
            
            for (key in Params) {
                Str += "&" + key + "=" + Params[key];
            }
            
            
            $.ajax({
                url: aldialogSettings[id].ContentUrl + Str,
                type: 'GET',
                async: true,
                success: function(Res){
                    $("#" + aldialogSettings[id].alDialogContent).html(Res);
                }
            });
            
            aldialogSettings[id].FirstShow = false;
        },
        
        HideContent: function() {
            id = $(this).attr("id");
            $("#" + aldialogSettings[id].alBlockPanel).css({
                "display" : "none",
                "width": "0px",
                "height": "0px",
                "z-index": 0,
                "left": "-100px",
                "top": "-100px",
             });
             
            $("#" + aldialogSettings[id].alDialogContent).css({
                "display" : "none",
                "width": "0px",
                "height": "0px",
                "z-index": 0,
                "left": "-100px",
                "top": "-100px",
             }); 
             
            aldialogSettings[id].Show = false;
            eval(aldialogSettings[id].OnClose);
        },
        
        ShowContent: function() {
            id = $(this).attr("id");
            
            var WindowWidth = $(document).outerWidth();
            var WindowHeight = $(document).outerHeight();
            
            $("#" + aldialogSettings[id].alBlockPanel).css({
                "display": "block",
                "width": WindowWidth - 17,
                "height": WindowHeight,
                "left": "0px",
                "top": "0px",
                "position": "absolute",
                "z-index": 11999,
                "opacity": 0.6,
                "background-color": "white",
            });
            
            $("#" + aldialogSettings[id].alDialogContent).css({
                "display": "block",
                "width": aldialogSettings[id].Width,
                "height": aldialogSettings[id].Height,
                "left": (WindowWidth/2 - aldialogSettings[id].Width/2) + "px",
                "top": (WindowHeight/2 - aldialogSettings[id].Height/2) + "px",
                "position": "absolute",
                "z-index": 12000,
                "background-color": "white",
                "border": "1px solid",
            });
            
            aldialogSettings[id].Show = true;
        },
        
        Show: function(Params, Reload) {
            id = $(this).attr("id");
            
            if (Reload == 'udefined' || Reload == null)
                Reload = false;
            
            $(this).aldialog("ShowContent");
            
            if ((aldialogSettings[id].FirstShow) || (Reload))
                $(this).aldialog("Load", Params);
        },
        
        DrawControl: function() {
            id = $(this).attr("id");
            var Str = "";
            Str += "<div id='" + aldialogSettings[id].alDialogContent + "' class='alDialogContent'></div>";
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
    
    
    // Егише //
    
    $.fn.togglerDialog = function(options) {
        var element = this;

        var dialog = $.extend({
            label: null,

            _create: function(element) {

                $(element).hide()

                    .append('<div class="close-popup"></div>')
                    .wrap('<div class="togglerDialog">')
                $(element).parent().uniqueId()
                this.id_toggler = 'edit-'+$(element).parent().attr('id')

                $(element).parent().append('<input type="checkbox" class="form-control" id="'+this.id_toggler+'">'
                    +'<label for="'+this.id_toggler+'">'+this.label+'</label>')
                $(element).parent().find('input[type=checkbox]').click(function(){
                    if($(this).is(':checked'))
                        dialog._show(element)
                    else {
                        dialog._hide(element)
                        dialog.unchecked($(element))
                    }
                })
                $(element).find('.close-popup').click(function () {
                    dialog._hide(element)
                })

            },

            _show: function(element) {
                this.beforeShow($(element))
                $(element).dialog({modal:false, minHeight:390, minWidth:350 })
              //  $(element).dialog('destroy')
                this.afterShow()
            },

            _hide: function(element) {
                //$(element).hide().addClass('dialog-open')
                $(element).dialog('destroy')

            },

            beforeShow: function(){},
            afterShow: function(){},
            unchecked: function(){},
        }, options)



        $(element).each(function () {
            $(this).wrap('<div class="modal-box">')
            dialog._create($(this).parent())
        })

    };
    
    var sender = {

        ajaxOption: {
            //method: 'get',
            //url: '/index.php',
            //async: true,

        },

        _init: function(options) {
            $.extend(sender.ajaxOption, options)

            this.each(function(){
                //$(this).wrap('<form class="ajaxSender">')
                $(this).addClass('ajaxSender')
                $(this).on('submit', function(e) {
                    e.preventDefault()
                    sender._send.apply(this)
                })
            });
        },

        _send: function() {
            sender.ajaxOption.data = {
                params: sender.ajaxOption.params || null,
                formData: $(this).serialize(),
            }
            sender.ajaxOption.data = $(this).serialize()
            $.ajax(sender.ajaxOption)
        }
    };

    $.fn.ajaxSender = function( method ) {

        if ( sender[method] ) {
            return sender[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return sender._init.apply( this, arguments );
        } else {
            $.error( 'Метод с именем ' +  method + ' не существует для jQuery.ajaxSender' );
        }


    };
    
    $.widget('aliton.togglerEditForm', {
        options: {
            label: 'Режим редактирования',
            enabled: false,
            beforeActivate: null,
            afterActivate: null,
        },

        params: {
            classEdit: 'ui-edit-control',
            classCheckBox: 'form-control',
            checked: '',
        },

            _create: function() {



                this.element.addClass('ui-editForm')
                this.id = this.element.attr('id')
                this.element.wrap('<div class="togglerEditForm">')
                this.element.parent().uniqueId()
                this.id_toggler = 'edit-'+this.element.parent().attr('id')

                this.element.parent().append(
                    '<input type="checkbox" class="'+this.params.classEdit+' '+this.params.classCheckBox+'" id="'+this.id_toggler+'">'
                    +'<label for="'+this.id_toggler+'">'+this.options   .label+'</label>')

                if(this.options.enabled) {
                    this.element.parent().find('input.'+this.params.classEdit+'[type=checkbox]').attr('checked', true)
                } else {
                    this.element.parent().find('input.'+this.params.classEdit+'[type=checkbox]').attr('checked', false)
                }

                this._init()
                var _t = this
                this.element.parent().on('change','input.'+this.params.classEdit+'[type=checkbox]',function(){
                    if($(this).is(':checked'))
                       _t._activateEdit()
                    else
                        _t._deactivateEdit()
                })

            },

            _init: function(){
                if(this.element.parent().find('input.'+this.params.classEdit+'[type=checkbox]').is(':checked'))
                    this._activateEdit()
                else
                    this._deactivateEdit()
            },

            _activateEdit: function() {
                this._trigger('beforeActivate')
                this.element.find('input, select, textarea').attr('disabled', false)
                this.element.find('.alcomboboxeditbuttom').removeClass('disabled')
                this._trigger('afterActivate')
            },

            _deactivateEdit: function() {
                this.element.parent().find('input:not(.'+this.params.classEdit+'), select, textarea').attr('disabled', true)
                this.element.find('.alcomboboxeditbuttom').addClass('disabled')
            },

            _destroy: function () {
                this._deactivateEdit()
                this.element.parent().find('input.'+this.params.classEdit).remove()
                this.element.parent().removeClass('togglerEditForm')
            },

            destroy: function() {
                this._destroy()
            },

            _setOption: function() {
                $.Widget.prototype._setOption.apply( this, arguments );
            }
        });
    
    $.widget('aliton.alToggler', {
        options: {
            label: 'Переключатель',
        },

        params: {
            contain:  'toggleVisible-container',
            itemClass: 'item-visible',
            togglerClass: 'toggler-visible',
            inputClass: 'form-control',
            toggler: '',
            item: '',
        },

        _init: function() {
            if(!this.element.hasClass('toggleVisible')) {
                this._create()
            }
            if($('#'+thiss.params.toggler).is(':checked')) {
                this._show()
            } else {
                this._hide()
            }
        },

        _create: function() {
            this._trigger('beforeCreate')
            this.element.addClass('toggleVisible')
            this.element.wrap('<div class="'+this.params.contain+'">')
            this.element.wrap('<div class="'+this.params.itemClass+'" style="display: none;">')
            this.element.parent().before('<div class="'+this.params.togglerClass+'"><input class="'+this.params.inputClass+'" type="checkbox"></div>')
            this.params.toggler = this.element.closest('.'+this.params.contain).find('.'+this.params.togglerClass+' input[type=checkbox]').uniqueId().attr('id')
            this.element.closest('.'+this.params.contain).find('.'+this.params.togglerClass)
                .append('<label for="'+this.params.toggler+'">'+this.options.label+'</label>')

            var _t = this

            $('#'+this.params.toggler).on('change', function(){
                if ($(this).is(':checked')) {
                    _t._show()
                } else {
                    _t._hide()
                }

            })
        },

        _show: function() {
            this._trigger('beforeShow')
            this.element.parent().slideDown(500)
            this._trigger('afterShow')
        },

        _hide: function() {
            this._trigger('beforeHide')
            this.element.parent().slideUp(500)
            this._trigger('afterHide')
        },

        _destroy: function() {

        },

        _setOption: function() {
            $.Widget.prototype._setOption.apply( this, arguments );
        },
    });
    
    $.widget('aliton.modelup', {
        props: {}, // <-- for options.prop
        bindProp: {}, // <-- for options.prop.bind
        options: {
            /*
             * prop - Property model
             * * bind - relations prop model with DOM element (test: '#test'), if change prop then change value DOM element
             * * relations - relations prop model with DOM element, if change value DOM element then change value prop model
             *   ** relations object: {
             *   ** target (string, jQuery selector) - DOM element
             *   ** update (bool) - if true then after change target element full update model and bind DOM element
             *   ** }
             * * onUpdate - a set of methods for execute after update prop. name of method equal name of prop
             * * decorator - decorate output data for this prop bind bloc.
             * * validate - live validate input data
             *   * required -  required or not
             *   * regex - regex or use set:
             *   *  * 1) number - only number,
             *   *  * 2) float - only float with use '.' or ','
             *   *  * 3) default - any symbol
             *   * maxLength - max length symbol
             *   * minLength - min length symbol
             *   * max - max value
             *   * min - min value
             * sendAjax - jQuery ajax options for send data in controller
             * table - Name table model
             * eventSend - event for send data
             * sendData - 1) array, list props send in controller, 2) object, any params send, 3) string, 'all' - all prop model
             * onChange - event change, before send data
             * source - source property model
             * decorator - decorate output data for general bloc element. result only return
             * updateAfterChange - update bind blocks after update props of model
             * timeLiveUpdate - interval update model data (ms)
             * whiteList - update and add onlythis list ({key:true})
             */

            eventSend: 'submit',
            sendData: 'all',
            source: '/?r=AjaxData/model',
            updateAfterChange: true,
            timeLiveUpdate: 15000,
            onUpdateProp: {},

            decorator: function(elem) {
                return '<div>'+elem+'</div>'
            }
        },

        errors: {
            props:[],
        },
        actualData: true,

        settings: {
            className: 'model',
            msgs: {
                errorUpdateProps: 'Произошла ошибка обновления данных модели',
                changePropOut: 'Данные модели были изменены извне. Данные обновлены.',
                valid: {
                    requiredField: ' Это обязательное поле.',
                    number: ' Допустимы только цифры.',
                    float: 'Допустимы только цифры с плавающей точкой (после точки только 2 символа).',
                    minLength: function(v) {
                        return ' Минимальное количество символов '+v+'.'
                    },
                    maxLength: function(v) {
                        return ' Максимальное количество символов '+v+'.'
                    },
                    min: function(v) {
                        return ' Минимальное значение '+v+'.'
                    },
                    max: function(v) {
                        return ' Максимальное значение '+v+'.'
                    },
                    default: ' Введите корректные данные.',

                    incorrectProp: function(prop) {
                        return 'Получены некорретные данные для свойства: '+prop+'.'
                    },
                    confirmUsedIncorrectData: function(prop) {
                        return 'Получены некорректные данные для поля "'+prop+'.'
                        +'", они могут нанести вред информационной системе. Использовать эти данные?'
                    },
                    allModelDataUpdate: 'Данные модели успешно обновлены.',
                    notAllModelDataUpdate: 'Данные модели обновлены с ошибками.',
                    addNewPropInModel: 'Были добавлены новые свойства в модель.'
                },
            },
            validate: {
                number: /^[0-9]*$/,
                float: /^(?:[\d]|$)(?:[\d]*)(?:\.|\,?)[\d]{0,2}$/,
                default: /^[\S ]*$/,
            },
            timeLive: {
                informer: 10,
            },
            ACA: {
                data_attr: 'data-aca',
                container: 'container',
                placeholder: 'placeholder',
                input: 'input',
            }
        },


        _init: function() {
            if(!$(this.element).hasClass(this.settings.className))
                this.element.almodel || this._create()
        },


        _create: function(event) {
            _t = this
            this.element.addClass(this.settings.className)
            this.element.almodel = true
            this._registerProps()
            for(prop in this.options.prop) {
                this.options.prop[prop].bind && this._bindPropToElement(prop)
                this.options.prop[prop].relations && this._createRelations(prop)
                this.options.prop[prop].validate && this._validation(prop)
                _t.options.prop.value = _t.options.prop.bind = false
            }
            this.update()

            $('body').on('click','.informer .close', function () {
                $.when($(this).parent().fadeOut(500)).then(function () {
                    $(this).remove()
                })
            })

            this._createDaemons()

            $(this.element).on('change', function () {
                _t._trigger('onChange', event, _t.options.prop)

            })
            _t.options.eventSend && $('body').on(_t.options.eventSend, this.options.sendForm || this.element, function (e) {
                e.preventDefault()
                _t.sendData()
            })
        },


        _registerProps: function () {
            for(prop in this.options.prop) {
                this.props[prop] = this.options.prop[prop].value
            }
        },


        _createRelations: function(prop) {
            _t = this
            $(this.options.prop[prop].relations.target).addClass('model-rel')
            $(this.options.prop[prop].relations.target+'.model-rel').on('change', function () {
                if( update in _t.options.prop[prop].relations
                    && _t.options.prop[prop].relations.update === true ) {
                    var update = true
                } else {
                    var update = false
                }
                _t.setProp(_t.options.prop[prop].relations.target, $(this).val(), update)
            })
        },


        _bindPropToElement: function(prop) {
            _t = this
            //var value = _t.options.prop[prop]
            _t.bindProp[prop] = _t.options.prop[prop].bind
            $(_t.bindProp[prop]).addClass('model-bind')
            $(_t.bindProp[prop]+'.model-bind').on('keypress', function(e){
                if(e.keyCode == 27) {
                    $(this).val(_t.props[prop]).blur()
                }

            })
                .on('change', function(){
                    _t.setProp(prop,$(this).val())
                })
        },


        _createDaemons: function() {
            _t = this
            timeLive = this.settings.timeLive.informer
            setInterval(function () {
                $('.info-block').each(function () {
                    $(this).hasClass('remove') ? $(this).remove() : ''
                    var timeout = $(this).attr('data-timeout')
                    timeout == 0 ? $.when($(this).fadeOut(1500)).then(function(){
                        $(this).addClass('remove')
                    })
                    : $(this).attr('data-timeout', --timeout)
                })
            }, 1000)
            $('body').on('mouseenter, mousemove', '.info-block', function () {
                    $(this).stop().attr('data-timeout', timeLive).fadeIn(500).removeClass('remove')
                })

            this.options.liveUpdate && setInterval(function () {
                _t.updateProps(true, true)
            }, this.options.timeLiveUpdate)

        },


        _validation: function(prop) {
            _t = this
            var regex = _t.options.prop[prop].validate.regex
                ,required = _t.options.prop[prop].validate.required,
                min = ((regex == 'number' || regex == 'float') && _t.options.prop[prop].validate.min) || false,
                max = ((regex == 'number' || regex == 'float') && _t.options.prop[prop].validate.max) || false,
                minLength = _t.options.prop[prop].validate.minLength,
                maxLength = _t.options.prop[prop].validate.maxLength,
                erorCode = 'default',
                set = []

            if(regex && typeof regex == 'string') {
                erorCode = regex
                _t.settings.validate[regex] ? regex = _t.settings.validate[regex]
                    : regex == 'set' ? set = _t.options.prop[prop].validate.set : regex = _t.settings.validate.default
            }

            //if(typeof props == 'string') {
            //
            //}
            if(regex && regex !== 'set') {
                _liveValidation()
            } else if(regex === 'set' && set) {
                _ACA()
            }

            function _ACA() {

                var value = _t.props[prop]
                    ,placeholder
                    ,original_value
                //var regex = new RegExp('^'+value.toLowerCase())


                $(_t.bindProp[prop]).autocomplete({
                    source: [],
                    focus: function (e, ui) {
                        var value = $(this).val()
                        var regexp = new RegExp('^'+value,'i')
                        placeholder = ui.item.value.replace(regexp, value)
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').val(placeholder)
                        return false
                    }
                })
                    .wrap('<div '+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.container+'">')
                    .attr(_t.settings.ACA.data_attr, _t.settings.ACA.input)
                    .before('<input style="display: none" '+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'" value="">')
                    .on('keypress', function(e) {
                        if (e.keyCode === 13) {
                            $(this).val(placeholder)
                                .change()
                            return false
                        }
                        var f = 0
                            ,new_value = $(this).val()
                            ,regex = new RegExp('^'+new_value.toLowerCase())

                        for(var i = 0; i < set.length; i++) {
                            if(regex.test(set[i].toLowerCase())) {
                                f = 1
                                value = $(this).val()
                            }
                        }
                        if(f === 0) {
                            return false
                        }
                    })
                    .on('keyup', function(e) {
                        switch (e.keyCode) {
                            case 40:
                            case 38:
                                return false
                            case 27:
                                
                                $(this)
                                    .val(_t.props[prop])
                                    .autocomplete('close')
                                    .blur()
                                return false
                            default:
                                break
                        }
                        var f = 0
                            ,new_value = $(this).val()
                            ,regex = new RegExp('^'+new_value.toLowerCase())
                            ,source = []
                        placeholder = ''
                        for(var i = 0; i < set.length; i++) {
                            if(regex.test(set[i].toLowerCase())) {
                                if(f === 0 && new_value != 0) {
                                    var regexp = new RegExp('^'+new_value,'i')
                                    placeholder = set[i].replace(regexp, new_value)
                                    original_value = set[i]
                                }
                                f = 1
                                source.push(set[i])
                            }
                        }
                        if(f===0){
                            $(this).val(value)
                            var regexp = new RegExp('^'+value,'i')
                            placeholder = set[i].replace(regexp, value)
                        }
                        $(this).autocomplete('option',{source: source})
                        $(this).autocomplete('search')
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').val(placeholder)
                    })
                    .on('focus',function(){
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').show()
                    })
                    .on('blur',function(){
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').hide()
                    })
                    .on('change', function(){
                        $(this).val(original_value)
                        $('input['+_t.settings.ACA.data_attr+'="'+_t.settings.ACA.placeholder+'"]').val(original_value)
                    })
            }

            function _liveValidation() {
                var value = _t.props[prop]

                $(_t.bindProp[prop]).tooltip()

                $(_t.bindProp[prop]).on('keypress', function (e) {
                    if ((regex && !regex.test($(this).val()))
                        || (maxLength && $(this).val().length > maxLength)
                        || (max && parseFloat($(this).val()) > max)) {
                        return false
                    }
                    value = $(this).val()
                })
                    .on('keyup', function () {
                        var tooltip = false
                        var tooltip_msg = ''

                        if (regex && regex !== 'set') {
                            if (!regex.test($(this).val())) {
                                $(this).val(value)

                                tooltip = true
                                tooltip_msg = _t.options.prop[prop].validate.label
                                    || _t.settings.msgs.valid[erorCode]
                                    || _t.settings.msgs.valid.default
                            } else {
                                tooltip = false
                            }

                        }

                        if (minLength) {
                            if ($(this).val().length < minLength) {
                                tooltip = true
                                tooltip_msg += _t.settings.msgs.valid.minLength(minLength)
                            }
                        }

                        if (maxLength) {
                            if ($(this).val().length > maxLength) {
                                $(this).val(value)
                                tooltip = true
                                tooltip_msg += _t.settings.msgs.valid.maxLength(maxLength)
                            }
                        }

                        if (min) {
                            if (parseInt($(this).val()) < min) {
                                tooltip = true
                                tooltip_msg += _t.settings.msgs.valid.min(min)
                            }
                        }

                        if (max) {
                            if (parseInt($(this).val()) > max) {
                                $(this).val(value)
                                tooltip = true
                                tooltip_msg += _t.settings.msgs.valid.max(max)
                            }
                        }

                        if ($(this).val() == '' && required) {
                            tooltip = true
                            tooltip_msg += _t.settings.msgs.valid.requiredField
                        }
                        tooltip ? $(this).attr('title', tooltip_msg).tooltip('open') : $(this).tooltip('close')

                    })
                    .on('keydown', function () {
                        $(this).tooltip('close')
                    })
            }
        },


        _validateData: function (props) {
            _t = this
            var error_prop = 0
            for(prop in props) {
                var error = 0
                if(_t.options.prop[prop] && _t.options.prop[prop].validate) {
                    var regex = _t.options.prop[prop].validate.regex,
                        min = ((regex == 'number' || regex == 'float') && _t.options.prop[prop].validate.min) || false,
                        max = ((regex == 'number' || regex == 'float') && _t.options.prop[prop].validate.max) || false,
                        minLength = _t.options.prop[prop].validate.minLength,
                        maxLength = _t.options.prop[prop].validate.maxLength
                }
                if(regex && typeof regex == 'string') {
                    erorCode = regex
                    _t.settings.validate[regex] ? regex = _t.settings.validate[regex]
                        : regex = _t.settings.validate.default
                }

               if (regex && !regex.test(props[prop])) {
                   error++
                   _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
               }

                if (maxLength && props[prop].length > maxLength) {
                    error++
                    _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
                }

                if (minLength && props[prop].length < minLength) {
                    error++
                    _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
                }

                if (max && parseFloat(props[prop]) > max) {
                    error++
                    _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
                }

                if (min && parseFloat(props[prop]) < min) {
                    error++
                    _t._addError(_t.settings.msgs.valid.incorrectProp(prop))
                }

                if(error > 0) {
                    error_prop++
                }

                if(error > 0 && !confirm(_t.settings.msgs.valid.confirmUsedIncorrectData(prop))) {
                    props[prop] = null
                }
            }

            //error_prop == 0 && this._addSuccessMsg(_t.settings.msgs.valid.allModelDataUpdate)
            //error_prop > 0 && this._addWarning(_t.settings.msgs.valid.notAllModelDataUpdate)
            return error_prop

        },


        _addError: function(msg) {
            var date = new Date()
            this.errors.props.push({
                date:date.getHours()+':'+date.getMinutes()+':'+date.getSeconds(),
                msg: msg,
            })
            this._createInformer(msg, 'error')
        },


        _addInformation: function(msg) {
            this._createInformer(msg, 'info')
        },


        _addWarning: function(msg) {
            this._createInformer(msg, 'warning')
        },


        _addSuccessMsg: function(msg) {
            this._createInformer(msg, 'success')
        },


        _createInformer: function(msg, code) {
            if(!code) code='info'
            $('.informer').length > 0 ? '' : $('body').append('<div class="informer"></div>')
            $('.informer').append('<div data-timeout="'+this.settings.timeLive.informer+'" class="'+code+' info-block">'
                +msg+'<div class="close"></div></div>')
        },


        _destroy: function() {
            _t = this
           // $(this.element).off()// исправить на конкретные функции, дабы не сорвать события, повешанные из других мест
                .removeClass(_t.settings.className)

            //for(rel in this.options.relations) {
            //    $(this.options.relations[rel].target).off() // исправить на конкретные функции, дабы не сорвать события, повешанные из других мест
            //}
        },


        _setOption: function() {
            $.Widget.prototype._setOption.apply( this, arguments );
        },


        getProp: function(prop) {
            if(!prop) {
                return this.props
            } else {
                return this.props[prop]
            }
        },

        getOpt: function(opt) {
            if(!opt) {
                return this.options
            } else {
                return this.options[opt]
            }
        },

        setProp: function (props, value, update) {
            var error = 0, change = 0;
            if(typeof props == 'string') {
                var prop = props
                props = {}
                props[prop] = value
                value = update
            }
            error = this._validateData(props)
            if(typeof props == 'string') {
                this.props[props] = value
                change = {}
                change[props] = value
                if(update) {
                    this.updateProps()
                    return false
                }
            } else if(typeof props == 'object'){
                //if(value === false && update === true) {
                    change = this._checkChangeData(props)
                    //console.log(change)
                //}
               // console.log('test update')
               // for(prop in props) {
               //     if (this.options.whiteList && !(prop in this.options.whiteList)) {
               //         delete props[prop]
               //     }
               // }

                $.extend(this.props, props);
                //( typeof value == 'string' && this.updateProps(value) )
                //|| ( value === true && this.updateProps(value) )
                if(typeof value == 'string' || value === true) {
                    this.updateProps(value)
                    this._callAfterUpdateProps(change)
                    this.actualData = false
                    return false
                }
            }

            //console.log(change)
            //console.log(error)
            //console.log(update)

            if(change && value === false && update === true) {
                this._addInformation(this.settings.msgs.changePropOut)
            }
            if(error) {
                this._addWarning(this.settings.msgs.valid.notAllModelDataUpdate)
            }
            if(!change) this.actualData = true
            if((change && !error && !update) || !this.actualData) {
                this._addSuccessMsg(this.settings.msgs.valid.allModelDataUpdate)
                this.actualData = true
            }
            //if(!_t.actualData) {
            //    this._addSuccessMsg(_t.settings.msgs.valid.allModelDataUpdate)
            //    _t.actualData = true
            //}

            this._callAfterUpdateProps(change)

            this.update()
        },


        _checkChangeData: function(props) {
            var i = 0, p = {}, k = 0
            for(prop in props) {
                if (this.options.whiteList && !(prop in this.options.whiteList)) {
                    delete props[prop]
                    continue
                }
                if(this.props[prop] && this.props[prop] != props[prop]) {
                    i++
                    p[prop] = prop
                } else if(!(prop in this.props)) {
                    k++
                }
            }
            k > 0 && this._addInformation(this.settings.msgs.valid.addNewPropInModel)
            //i > 0 && this._addInformation('Данные модели были изменены извне. Данные обновлены.')
            return i ? p : false
        },


        sendData: function() {
            _t = this
            var sender = $.extend(true,{
                url: this.options.source,
                data: $.extend({},this.formData(this.options.prop),{table: this.options.table,action:'call_sp'}),
                method: 'post',
                success: function() {

                },
                error: function () {

                },
            }, this.options.sendAjax)
            $.ajax(sender)

            this.updateProps()
        },


        formData: function() {
            var data = {}
            if(this.options.sendData == 'all') {
                data[this.options.table] = this.props
            } else if(typeof this.options.sendData == 'object') {
                if(this.options.sendData.length) {
                    var props = {}
                    for(i = 0; i < this.options.sendData.length; i++) {
                        props[this.options.sendData[i]] = this.props[this.options.sendData[i]]
                    }
                    data[this.options.table] = props
                } else {
                    data = this.options.sendData
                }
            }
            return data
        },


        updateProps: function(source, check) {
            _t = this
            if(!_t.options.source && !source) {
                this.update()
                return false
            }
            $.ajax({
                url: (typeof source == 'string' && source) || _t.options.source,
                method: 'post',
                dataType: 'json',
                data: $.extend({action:'update_props',table: this.options.table},_t.formData()),
                success: function(r) {
                    if(!typeof r == 'object') return false
                    _t.setProp(r.props,false, check)
                },
                error: function() {
                    _t._addError(_t.settings.msgs.errorUpdateProps)
                    _t.actualData = false
                }
            })
        },


        _callAfterUpdateProps: function (props) {
            //this.options.onUpdateProp.all && this.options.onUpdateProp.all()
            switch (typeof props) {
                case 'string':
                    this.options.prop[props].onUpdate && this.options.prop[props].onUpdate()
                    break
                case 'object':
                    for(prop in props) {
                       // console.log(this.options.prop[prop])
                        //if(typeof props[prop] == 'string' || typeof props[prop] == 'number') {
                        //    this.options.onUpdateProp[prop] && this.options.onUpdateProp[prop]()
                        //}
                        this.options.prop[prop] && this.options.prop[prop].onUpdate && this.options.prop[prop].onUpdate()
                    }
                    break
                default:
                    break
            }
        },


        update: function() {
            if(!this.options.updateAfterChange) {
                return false
            }
            for(elem in this.bindProp) {
                $(this.bindProp[elem]).val(this.props[elem])
                    .html((this.options.prop[elem].decorator && typeof this.options.prop[elem].decorator == 'function')
                        ? this.options.prop[elem].decorator(this.props[elem]) :
                        ((this.options.decorator && typeof this.options.decorator == 'function')
                            ? this.options.decorator(this.props[elem]) : this.props[elem]))
            }
        },


        destroy: function() {
            this._destroy()
        }
    });
    
})(jQuery);




