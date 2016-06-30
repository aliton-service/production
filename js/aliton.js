var Aliton = {};

var alcomboboxajaxSettings = [];
var algridajaxSettings = [];
var aleditSettings = [];
var alcheckboxSettings = [];
var alradiobuttonSettings = [];
var alcalendarSettings = [];
var aldateeditSettings = [];
var almemoSettings = [];
var aldialogSettings = [];
var albuttonSettings = [];

Aliton.ListComboboxs = [];
Aliton.ListGrids = [];
Aliton.Links = [];
Aliton.Objects = [];

Aliton.DateConvertToJs = function(DateStr) {
    var Result = null;
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
    if (Blank == undefined)
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
Aliton.ViewClient = function (ObjectGr_id) {
    window.open('/index.php?r=ObjectsGroup/Index&ObjectGr_id=' + ObjectGr_id);
};

Aliton.EditDemand = function(Demand_id) {
    location.href = '/index.php?r=Demands/Update&id=' + Demand_id;
};

Aliton.isRelationsNotReady = function(id) {
    for (key in Aliton.Links) {
        if (Aliton.Links[key].In === id) {
            if (typeof Aliton.Objects[Aliton.Links[key].Out] === "undefined")
                return true;
            if (!Aliton.Objects[Aliton.Links[key].Out].Ready)
                return true;
        }
    }
    return false;
};

Aliton.SearchForeignLocate = function(id) {
    var Result = [];
    var Link;
    
    for (key in Aliton.Links) {
        Link = Aliton.Links[key];
        if (Link.In === id) {
            if (Aliton.Objects[Link.Out].Type === "Grid") {
                if (Link.TypeLink === "Locate") {
                    var Value = algridajaxSettings[Link.Out].CurrentRow[Link.Field];
                    var Condition = Link.Condition.replace(":Value", Value);
                    Result.push(Condition);
                }
            }
            if (Aliton.Objects[Link.Out].Type === "Combobox") {
                if (Link.TypeLink === "Locate") {
                    var Value = alcomboboxajaxSettings[Link.Out].KeyValue;
                    var Condition = Link.Condition.replace(":Value", Value);
                    Result.push(Condition);
                }
            }
        }
    }
    return Result;
};

Aliton.SearchForeignFilters = function(id) {
    var Result = [];
    var Link;
    
    for (key in Aliton.Links) {
        Link = Aliton.Links[key];
        
        if (Link.isNullRun === undefined)
            Link.isNullRun = true;
        
        if (Link.In == id) { 
            
            if (Aliton.Objects[Link.Out].Type === "Grid") {
                if (Link.TypeLink === "Filter") {
                    var Filter = {};
                    
                    
                    
                    if (algridajaxSettings[Link.Out].CurrentRow !== null) {
                        if (typeof algridajaxSettings[Link.Out].CurrentRow[Link.Field] !== "undefined")
                            Filter.Value = algridajaxSettings[Link.Out].CurrentRow[Link.Field];
                    }
                    else
                        Filter.Value = "";
                    
                    if ((Filter.Value === null) || (Filter.Value === ""))
                        if (typeof Link.NullValue !== "undefined")
                            Filter.Value = Link.NullValue;
                    
                    Filter.Condition = Link.Condition.replace(":Value", Filter.Value);
                    
                    if ((Filter.Value === null) || (Filter.Value === ""))
                        if (!Link.isNullRun)
                            Filter.Condition = "";
                        
                    
                    
                    
                    Filter.Control = Link.Out;
                    Filter.Type = Link.TypeFilter;
                    Filter.Name = Link.Name;

                    Result.push(Filter);
                }
            }
            
            if (Aliton.Objects[Link.Out].Type === "Edit") {
                if (Link.TypeLink === "Filter") {
                    var Filter = {};
                    Filter.Value = aleditSettings[Link.Out].Value;
                    if (Filter.Value === null) {
                        Filter.Value = "";
                        
                        if (!Link.isNullRun) 
                            Filter.Condition = "";
                        else
                            Filter.Condition = Link.Condition.replace(":Value", Filter.Value.trim());
                    }
                    else
                        Filter.Condition = Link.Condition.replace(":Value", Filter.Value.trim());
                    
                    Filter.Control = Link.Out;
                    Filter.Type = Link.TypeFilter;
                    Filter.Name = Link.Name;
                    Result.push(Filter);
                    
                }
            }
            
            if (Aliton.Objects[Link.Out].Type === "Combobox") {
                if (Link.TypeLink === "Filter") {
                    var Filter = {};
                    
                    Filter.Value = alcomboboxajaxSettings[Link.Out].KeyValue;
                    if (typeof Link.Field !== "undefined")
                        if (Link.Field !== "")
                            if  (alcomboboxajaxSettings[Link.Out].CurrentRow !== null)
                                Filter.Value = alcomboboxajaxSettings[Link.Out].CurrentRow[Link.Field];
                    
                    
                    if (Filter.Value === null) {
                        Filter.Value = "null";
                        
                        if (!Link.isNullRun) 
                            Filter.Condition = "";
                        else
                            Filter.Condition = Link.Condition.replace(":Value", Filter.Value);                       
                    }
                    else
                        Filter.Condition = Link.Condition.replace(":Value", Filter.Value);
                    
                    Filter.Control = Link.Out;
                    Filter.Type = Link.TypeFilter;
                    Filter.Name = Link.Name;
                    Result.push(Filter);
                    
                }
            }
            
            if (Aliton.Objects[Link.Out].Type === "Memo") {
                if (Link.TypeLink === "Filter") {
                    var Filter = {};
                    Filter.Value = almemoSettings[Link.Out].Value;
                    if (Filter.Value === null) {
                        Filter.Value = "";
                        
                        if (!Link.isNullRun) 
                            Filter.Condition = "";
                        else
                            Filter.Condition = Link.Condition.replace(":Value", Filter.Value.trim());
                    }
                    else
                        Filter.Condition = Link.Condition.replace(":Value", Filter.Value.trim());
                    
                    Filter.Control = Link.Out;
                    Filter.Type = Link.TypeFilter;
                    Filter.Name = Link.Name;
                    Result.push(Filter);
                    
                }
            }
            
            if (Aliton.Objects[Link.Out].Type === "Checkbox") {
                if (Link.TypeLink === "Filter") {
                    var Filter = {};
                    Filter.Value = alcheckboxSettings[Link.Out].Checked;
                    if (Filter.Value === false) {
                        if (!Link.isNullRun) 
                            Filter.Condition = "";
                        else
                            Filter.Condition = Link.ConditionFalse;
                    }
                    else
                        Filter.Condition = Link.Condition.replace(":Value", Filter.Value);
                    
                    Filter.Control = Link.Out;
                    Filter.Type = Link.TypeFilter;
                    Filter.Name = Link.Name;
                    Result.push(Filter);
                    
                }
            }
            
            if (Aliton.Objects[Link.Out].Type === "Calendar") {
                if (Link.TypeLink === "Filter") {
                    var Filter = {};
                    Filter.Value = alcalendarSettings[Link.Out].Date;
                    if (Filter.Value === null) {
                        if (!Link.isNullRun) 
                            Filter.Condition = "";
                        else
                            Filter.Condition = Link.Condition.replace(":Value", Filter.Value.getDate() + "." + (Filter.Value.getMonth()+1) + "." + Filter.Value.getFullYear() + " " + Filter.Value.getHours() + ":" + Filter.Value.getMinutes());
                    }
                    else
                        Filter.Condition = Link.Condition.replace(":Value", Filter.Value.getDate() + "." + (Filter.Value.getMonth()+1) + "." + Filter.Value.getFullYear() + " " + Filter.Value.getHours() + ":" + Filter.Value.getMinutes());
                    
                    Filter.Control = Link.Out;
                    Filter.Type = Link.TypeFilter;
                    Filter.Name = Link.Name;
                    Result.push(Filter);
                    
                }
            }
            
            if (Aliton.Objects[Link.Out].Type === "Dateedit") {
                if (Link.TypeLink === "Filter") {
                    
                    var Filter = {};
                    Filter.Value = aldateeditSettings[Link.Out].Date;
                    if (Filter.Value === null) {
                        if (!Link.isNullRun) 
                            Filter.Condition = "";
                        else
                            Filter.Condition = Link.Condition.replace(":Value", Filter.Value.getDate() + "." + (Filter.Value.getMonth()+1) + "." + Filter.Value.getFullYear() + " " + Filter.Value.getHours() + ":" + Filter.Value.getMinutes());
                    }
                    else
                        Filter.Condition = Link.Condition.replace(":Value", Filter.Value.getDate() + "." + (Filter.Value.getMonth()+1) + "." + Filter.Value.getFullYear() + " " + Filter.Value.getHours() + ":" + Filter.Value.getMinutes());
                    
                    Filter.Control = Link.Out;
                    Filter.Type = Link.TypeFilter;
                    Filter.Name = Link.Name;
                    Result.push(Filter);
                    
                }
            }
            
            
        }
    }
    return Result;
};

Aliton.LoadDataObject = function(id) {
    var In;
    for (key in Aliton.Links) {
        if (Aliton.Links[key].Out === id) {
            In = Aliton.Links[key].In;
            if (Aliton.ObjectExists(In)){
                if (!Aliton.Objects[In].Ready) {
                    if (Aliton.Objects[In].Type === "Grid") {
                        $("#" + In).algridajax("Load");
                    }
                }
            }
        }
    }
};

Aliton.ObjectExists = function(id) {
    var Result = false;
    if (typeof Aliton.Objects[id] !== "undefined")
        if (document.getElementById(id) !== null) {
            if (Aliton.Objects[id].Type === "Grid") {
                if (document.getElementById(algridajaxSettings[id].alBodySelector) !== null)
                    Result = true;
            }
            else
                Result = true;
        }
    return Result;
}

Aliton.ChangeValue = function(id) {
    
    for (key in Aliton.Links) {
        if (Aliton.Links[key].Out === id) {
            if (Aliton.ObjectExists(Aliton.Links[key].In))
                Aliton.Objects[Aliton.Links[key].In].Ready = false;
        }
    }
    
    for (key in Aliton.Links) {
        if (Aliton.Links[key].Out === id) {
            
            if (Aliton.ObjectExists(Aliton.Links[key].In)) {
                if (Aliton.Objects[Aliton.Links[key].In].Type === "Grid") 
                    $("#" + Aliton.Links[key].In).algridajax("Load");
                if (Aliton.Objects[Aliton.Links[key].In].Type === "Edit") 
                    $("#" + Aliton.Links[key].In).aledit("Refresh");
                if (Aliton.Objects[Aliton.Links[key].In].Type === "Memo") 
                    $("#" + Aliton.Links[key].In).almemo("Refresh");
                if (Aliton.Objects[Aliton.Links[key].In].Type === "Dateedit") 
                    $("#" + Aliton.Links[key].In).aldateedit("Refresh");
                if (Aliton.Objects[Aliton.Links[key].In].Type === "Combobox") {
                    $("#" + Aliton.Links[key].In).alcomboboxajax("Load", "", true);
                }
            }
        }
    }
};





var aliton = {


    models: {},

    model: function() {

        this.prop = {}

        this.getProp = function(prop) {
            if(!prop) {
                return this.prop
            } else {
                return this.prop[prop]
            }
        }


        this.getTable = function () {
            return table
        }


        this.setProp = function (props) {
            $.extend(this.prop, props)
        }


        this.sendData = function(opt) {
            var sender = $.extend({
                url: '',
                data: this.formData(this.prop),
                method: 'post',
                success: function() {

                },
                error: function () {

                },
            }, opt)
            $.ajax(sender)
        }


        this.formData = function(props) {
            var data = new Object()
            data[table] = this.prop
            return data
        }

        this.bindProp = function(props) {
            _t = this
            for(prop in props) {
                $(props[prop]).change(function () {
                    _t.prop[prop] = $(this).val()
                })
            }
        }


        this.createSender = function(selector, event) {
            if(!event) event = 'change'
            _t = this
            $(selector).on(event, function () {
                _t.sendData()
            })
        }

    },

    getModel: function (name) {
        return this.models[name]
    },

    createModel: function(opt) {

    }

}


aliton.form = {
    //getFormEdit: function(table, action, id) {
    //    if(action === 'update') {
    //        var queryString = 'id='+id
    //    } else {
    //        queryString = ''
    //    }
    //    $.ajax({
    //        url: '/?r='+table+'/'+action,
    //        type: 'get',
    //        data: queryString,
    //        beforeSend: function () {
    //            $('#edit-monitoring-form').html('<p>Загрузка...</p>')
    //        },
    //        success: function(r){
    //            $('#edit-monitoring-form').html(r)
    //        },
    //        error: function (r) {
    //            var errmsg = '<p>Произошла ошибка во время загрузки данных, повторите попытку позже</p>'
    //            r.responseText ? errmsg = r.responseText : ''
    //            $('#edit-monitoring-form').html(errmsg)
    //        }
    //    })
    //}

    delete: function(action, id, callback){
        $.ajax({
            url: '/?r='+action+'&id='+id,
            type:'post',
            dataType: 'json',
            success: function (r) {
                if(r.status !== 'ok') {
                    //error
                }
                if(callback && typeof callback === 'function'){
                    callback()
                }

                alert('удалено')
            }
        })
    }
}

aliton.chanel = (function($){
    var event = $({});
    return {
        on: on,
        emit: trigger
    };
    function on(){
        event.on.apply(event, arguments);
    }
    function trigger(){
        event.trigger.apply(event, arguments);
    }
})(jQuery);



var core = {

    titleBlinker: function(){},
    title: {
        original: document.title
    },

    createNamespace: function(str) {
        var parts = str.split('.');
        $.each(parts, function(key, value) {
            if (!window[value]) {
                window[value] = {};
            }
            window = window[value];
        });
    },

    titleBlink: function (newTxt) {
        this.titleBlinkStop(false, true)
        this.title.newTitle = newTxt
        _t = this
        this.titleBlinker = setInterval(function () {
            if (document.title == _t.title.original) {
                document.title = newTxt;
            } else {
                document.title = _t.title.original;
            }
        }, 1000)
    },

    titleBlinkStop: function (title, only_interval) {
        clearInterval(this.titleBlinker)
        !only_interval ? document.title=title || this.title.original : '';
        this.titleBlinker = false
    },

    exporter: function(type, data, name) {
        if(!type || !data) {
            return false
        }
        switch (type) {
            case 'XLS':
                this.exportXLS(data, name || '')
                break
            default :
                break
        }
    },

    exportXLS: (function (data) {
            var uri = 'data:application/vnd.ms-excel;base64,'
                , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
                , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
                , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
            return function(data, name) {
                var ctx = {worksheet: name || 'Worksheet', table: data}
                window.location.href = uri + base64(format(template, ctx))
            }
    })()

}


$(function () {
    core.title.original = document.title
})



var extClass = {

    getOpt: function(opt) {
        if(!opt) {
            return this
        } else {
            return this[opt]
        }
    },

    setOpt: function(opt) {
        if(!opt || typeof opt != 'object') return false
        $.extend(this, opt)
    },


    events: {
        showmsg: {
            event: 'click',
            selector: '#testdoc',
            action: 'showmsg',
        },
    },

    showmsg: function(){
        alert(123)
    },


    init: function(){

    },


    extend: function(o) {
        if(this.isCreate) {
            $.extend(true, this, o)
        } else {
            return $.extend(true,{}, this, o, { isCreate: true })
        }
    }

}

var evented = {
    init: function() {
        var _t = this

        $.each(this.events, function(){
            var event = this.event
                ,selector = this.selector
                ,action = this.action
            $(document).on(event, selector, function(e){
                _t[action](e)
            })
        })
    }
}




function WHDocuments() {
    aliton.model.apply(this, arguments)
    table = 'WHDocuments'
    this.prop = {
        docm_id: null,
        dctp_id: null,

    }

    this.setProcess = function(selector, opt) {
        var sender = $.extend({
            url: '',
            data: this.formData(this.prop),
            method: 'post',
            success: function(r) {
                //$(selector).html(r)
            },
            error: function () {

            },
        }, opt)
        $.ajax(sender)
    }
}
