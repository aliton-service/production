var Aliton = {};

Aliton.FindArray = function(Array, FieldName, FieldValue) {
    for (var i = 0; i < Array.length; i++) {
        var Tmp = Array[i];
        if (Tmp[FieldName] == FieldValue)
            return Array[i];
    }
    return null;
};

Aliton.SelectRowById = function(FieldName, Value, Grid, Refresh, Scroll) {
    if (Refresh == true)
        $(Grid).jqxGrid('updatebounddata');
    if (Value == undefined) {
        $(Grid).jqxGrid('selectrow', 0);
    }
    if (Scroll == undefined) {
        Scroll = true;
    }
        
    var Rows = $(Grid).jqxGrid('getrows');
    for (var i = 0; i < Rows.length; i++) {
        var TmpVal = $(Grid).jqxGrid('getcellvalue', i, FieldName);
        if (TmpVal == Value) {
            $(Grid).jqxGrid('selectrow', i);
            if (Scroll)
                $(Grid).jqxGrid('ensurerowvisible', i);
            return;
            
        }
    }
};

Aliton.SelectRowByIdVirtual = function(FieldName, Value, Grid, Refresh) {
    
    var idx = -1;
    var Rows = $(Grid).jqxGrid('getrows');
    for (var i = 0; i < Rows.length; i++) {
        var TmpVal = $(Grid).jqxGrid('getcellvalue', i, FieldName);
        if (TmpVal == Value) {
            idx = i;
        }
    } 
    
    if (idx == -1) {
        var PI = $(Grid).jqxGrid('getpaginginformation');
        idx = PI.pagesize*PI.pagenum; 
    }
    
    $(Grid).jqxGrid('selectrow', idx);
    $(Grid).jqxGrid('ensurerowvisible', idx);
};

Aliton.GetRowById = function(FieldName, Value, Grid, Refresh) {
    var Rows = $(Grid).jqxGrid('getrows');
    for (var i = 0; i < Rows.length; i++) {
        var TmpVal = $(Grid).jqxGrid('getcellvalue', i, FieldName);
        if (TmpVal == Value) {
            return i;
        }
    } 
    
    var PI = $(Grid).jqxGrid('getpaginginformation');
    return PI.pagesize*PI.pagenum;  
};

Aliton.ShowErrorMessage = function(Msg, ErrorText, Title) {
    if (Msg == undefined)
        Msg = '';
    if (ErrorText == undefined)
        ErrorText = '';
    if (Title == undefined)
        Title = 'Внимание! Ошибка.';
    
    $('#MainDialog').on('open', function() {
        $('#BodyMainDialog').jqxTextArea('val', Msg + '\nТекст ошибки:\n' + ErrorText);
    });
    
    $('#MainDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {
        height: '260px',
        width: '600px',
        position: 'center',
        modalZIndex: 19000,
        zIndex: 99999,
        title: Title,
        initContent: function(){
            $('#BodyMainDialog').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { placeHolder: '', height: 170, width: '100%', minLength: 1}));
            
            $('#MainDialogBtnClose').jqxButton({ width: 120, height: 30 });
            $('#MainDialogBtnClose').on('click', function(){
                $('#MainDialog').jqxWindow('close');
            });
        }
    }));
    
    
    
    $('#MainDialog').jqxWindow('open');
    
}

Aliton.DateConvertToJs = function(DateStr) {
    var Result = null;
    if (DateStr === null) return null;
    // Дата приводим к формату ГГГГ-ММ-ДД ЧЧ:ММ
    if (DateStr === '' || DateStr.length <  10) return null;
    DateStr = DateStr.slice(0, 16);
    if (DateStr[4] === '-') {
        Result = new Date(DateStr.replace(/-/g, '/'));
        return Result;
    }
    
    if (DateStr[2] === '.') {
        // Считаем, что дата в формате ДД.ММ.ГГГГ ЧЧ:ММ
        Result = DateStr[6] + DateStr[7] + DateStr[8] + DateStr[9] + '/';
        Result += DateStr[3] + DateStr[4] + '/';
        Result += DateStr[0] + DateStr[1];
        if (DateStr.length > 10) {
            Result += ' ' + DateStr[11] + DateStr[12] + ':' + DateStr[14] + DateStr[15];
        }
    } else Result = new Date(DateStr);
    
    return Result;
};


/* Проверка заявок зарегестрированных сегодня, на выбранном объекте */
Aliton.CheckToDayDemands = function(Object_id) {
    var result = false;
    $.ajax({
        url: 'index.php?r=Object/TodayDemands&Object_id=' + Object_id,
        type: 'GET',
        async: false,
        success: function(Res) {
            if (parseInt(Res) == 1)
                result = false;
            else
                result = true;
        }
    });
    return result;
};

/* Создание заявки */
Aliton.NewDemand = function (Object_id, ContrS_id) {
    window.open('/index.php?r=Demands/Create&Object_id=' + Object_id + '&ContrS_id=' + ContrS_id);
};

/* Создание коммента к заявке*/
Aliton.NewComment = function (Demand_id, Report, PlanDateExec) {
    var Result = false;
    var Data = {
        ExecutorReports: {
            demand_id: Demand_id,
            report: Report,
            plandateexec: PlanDateExec
        }
    };
    $.ajax({
        url: '/index.php?r=ExecutorReports/Create',
        type: 'POST',
        data: Data,
        async: false,
        success: function(Res) {
            if (JSON.parse(Res) === 0)
                Result = true;
            else
                Result = false;
        },
        error: function() {
            Result = false;
        }
    });
    
    return Result;
};

/* Удаление коммента к заявке */
Aliton.DelComment = function (Exrp_id) {
    var Result = false;
    var Data = {
        id: Exrp_id
    };
    $.ajax({
        url: '/index.php?r=ExecutorReports/Delete',
        type: 'POST',
        data: Data,
        async: false,
        success: function(Res) {
            if (JSON.parse(Res) === 0)
                Result = true;
            else
                Result = false;
        },
        error: function() {
            Result = false;
        }
    });
    
    return Result;
};


/* Передать мастеру заявку */
Aliton.ToMaster = function (Demand_id) {
    location.href='/index.php?r=Demands/Tomaster&id=' + Demand_id;
};

/* Отработать заявку */
Aliton.WorkedOut = function (Demand_id) {
    $.ajax({
        url: '/index.php?r=Demands/Workedout&Demand_id=' + Demand_id,
        async: false,
        success: function(Res) {
            if (JSON.parse(Res) === 0)
                Aliton.ViewDemand(Demand_id, false);
                
        }
    });
};

/* Отмена отработки заявки */
Aliton.UndoWorkedOut = function (Demand_id) {
    $.ajax({
        url: '/index.php?r=Demands/UndoWorkedOut&Demand_id=' + Demand_id,
        async: false,
        success: function(Res) {
            if (JSON.parse(Res) === 0)
                Aliton.ViewDemand(Demand_id, false);
                
        }
    });
};

Aliton.ViewDemand = function (Demand_id, Blank) {
    if (Blank == undefined || Blank == true)
        Blank = true;
    else Blank = false;
    if (Blank)
        window.open('/index.php?r=Demands/View&Demand_id=' + Demand_id);
    else
        location.href = '/index.php?r=Demands/View&Demand_id=' + Demand_id;
};

/* Закрыть заявку */
Aliton.ExecDemand = function (Demand_id, Blank) {
    if (Blank == undefined)
        Blank = true;
    else Blank = false;
    if (Blank)
        window.open('/index.php?r=Demands/DemandExec&id=' + Demand_id);
    else
        location.href = '/index.php?r=Demands/DemandExec&id=' + Demand_id;
};

/* Карточка клиента*/
Aliton.ViewClient = function (ObjectGr_id, Demand_id) {
    if (Demand_id != undefined)
        window.open('/index.php?r=ObjectsGroup/Index&ObjectGr_id=' + ObjectGr_id + '&Demand_id=' + Demand_id);
    else
        window.open('/index.php?r=ObjectsGroup/Index&ObjectGr_id=' + ObjectGr_id);
};

Aliton.EditDemand = function(Demand_id) {
    location.href = '/index.php?r=Demands/Update&id=' + Demand_id;
};

/* Проверяем, есть ли в смете документ определенного типа */
Aliton.CheckToCostCalcDocs = function(docs, docType) {

    function isDocExist(doc) {
        return doc.DocType_id === docType;
    }
    return docs.some(isDocExist);
};

Aliton.Message = [];
Aliton.Message['ERROR_LOAD_PAGE'] = 'Внимание! Произошла ошибка, не удалось загрузить страницу. Попробуйте повторить попытку позже или обратитесь к администратору БД.';
Aliton.Message['ERROR_EDIT'] = 'Произошла ошибка добавления\\редактирования.';
Aliton.Message['ERROR_DEL'] = 'Произошла ошибка удаления записи.';
Aliton.Message['ERROR_AGREED_COSTCALC'] = 'Не согласовать КП/Смету.';




Aliton.SetLocation = function (curLoc){
    try {
        history.pushState(null, null, '#' + curLoc);
        return;
    } catch(e) {}
};

Aliton.GetTabIndexFromURL = function (defaultTabIndex){
    var hashStr = location.hash;
    if (hashStr === '') {
        return (defaultTabIndex === undefined) ? 0 : defaultTabIndex;
    }
    var tabIndexStr = hashStr.substr(1);
    var tabIndex = parseInt(tabIndexStr, 10);
    return tabIndex;
};


var Utf8 = {

    // public method for url encoding
    encode : function (string) {
        string = string.replace(/rn/g,"n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    // public method for url decoding
    decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while ( i < utftext.length ) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

}

Aliton.ConvertJSONToCsv = function(Obj, Columns) {
    console.log()
    
    var Result = '';
    var Tmp;
    
    for (var j = 0; j < Columns.length; j++) {
        Result += "\"" + Columns[j].text + "\";";
    }
    Result += "\n";
    
    for(var i=0; i < Obj.length; i++) {
        for (var j = 0; j < Columns.length; j++) {
            if (Obj[i][Columns[j].datafield] != null) {
                if (typeof(Obj[i][Columns[j].datafield]) == 'string')
                    Result += "\"" + Obj[i][Columns[j].datafield] + "\";";
                if (typeof(Obj[i][Columns[j].datafield]) == 'number')
                    Result += Obj[i][Columns[j].datafield] + ";";
            }
            else
                Result += ";";
        }
        Result += "\n";
    }
    return Result;
}

Aliton.GridExportToCsv = function(FileName, Array, Columns) {
    var File = Aliton.ConvertJSONToCsv(Array, Columns.records);
    var Url= 'data:text/csv;charset=utf-8,' + '\uFEFF' + encodeURIComponent(File + ';');
    
    var Link = document.createElement("a");    
    Link.href = Url;
    Link.style = "visibility:hidden";
    Link.download = FileName;
    document.body.appendChild(Link);
    Link.click();
    document.body.removeChild(Link);
};


Aliton.DateTimeToStr = function(Date, Format) {
    var Str = '';
    if (Format == undefined) Format = 'dd.mm.yyyy hh:mm';
    if (Date == null) return '';
    var Day = Date.getDate();
    var Month = Date.getMonth() + 1;
    var Year = Date.getFullYear();
    var Hours = Date.getHours();
    var Minutes = Date.getMinutes();
    if (Day < 10)
        Day = '0' + Day;
    if (Month < 10)
        Month = '0' + Month;
    if (Hours < 10)
        Hours = '0' + Hours;
    if (Minutes < 10)
        Minutes = '0' + Minutes;
    
    if (Format == 'dd.mm.yyyy hh:mm') 
        Str = Day + '.' + Month + '.' + Year + ' ' + Hours + ':' + Minutes;
    if (Format == 'dd.mm.yyyy') 
        Str = Day + '.' + Month + '.' + Year;
    
    return Str;
};

