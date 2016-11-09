/* Настройки по умолчанию для грида */
var GridDefaultSettings = {
    width: '100%',
    height: 200,
    sortable: true,
    sorttogglestates: 1,
    showfilterrow: true,
    filterable: true,
    autoshowfiltericon: true,
    pageable: true,
    pagesizeoptions: ['10', '200', '500', '1000'],
    pagesize:200,
    columnsresize: true,
    columnsreorder: true,
    virtualmode: false,
    autosavestate: true,
    enableanimations: false,
    //autoloadstate: true,
    //enablebrowserselection: true,
    localization: getLocalization('ru'),
    updatefilterconditions: function (type, defaultconditions) {
        var stringcomparisonoperators = ['NULL', 'NOT_NULL', 'CONTAINS', 'DOES_NOT_CONTAIN', 'STARTS_WITH', 'ENDS_WITH', 'STR_EQUAL', 'STR_NOT_EQUAL'];
        var numericcomparisonoperators = ['EQUAL', 'NOT_EQUAL', 'LESS_THAN', 'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'NULL', 'NOT_NULL', 'IN'];
        var datecomparisonoperators = ['DATE_EQUAL', 'DATE_NOT_EQUAL', 'DATE_LESS_THAN', 'DATE_LESS_THAN_OR_EQUAL', 'DATE_GREATER_THAN', 'DATE_GREATER_THAN_OR_EQUAL', 'NULL', 'NOT_NULL'];
        var booleancomparisonoperators = ['EQUAL', 'NOT_EQUAL'];
        switch (type) {
            case 'stringfilter':
                return stringcomparisonoperators;
            case 'numericfilter':
                return numericcomparisonoperators;
            
            case 'datefilter':
                return datecomparisonoperators;
            case 'booleanfilter':
                return booleancomparisonoperators;
        }
    },
    rendergridrows: function (params) {
            return params.data;
    },
};

/* Настройки по умолчанию для диалогового окна (модальный режим) */
var DialogDefaultSettings = {  
    width: 500,
    maxHeight: 2000,
    maxWidth: 2000,
    height: 130,
    resizable: false,
    position: 'center',
    isModal: true,
    autoOpen: false,
    animationType: 'none'
};

/* Настройки по умолчанию для поля со временем */
var DateTimeDefaultSettings = {
    showFooter: true,
    todayString: 'Сегодня',
    clearString: 'Очистить',
    //width: '150px',
    height: '25px',
    formatString: 'dd.MM.yyyy HH:mm',
    culture: 'ru-RU',
    readonly: false,
    max: new Date(2999, 12, 31)
};

/* Настройки по умолчанию для инпутов */
var InputDefaultSettings = {
    height: 25,
    width: 200,
    minLength: 1
};

/* Настройки по умолчанию для пароль-инпутов */
var PasswordInputDefaultSettings = {
    height: 25,
    minLength: 1,
    showStrength: true,
    showStrengthPosition: "right"
};

/* Настройки по умолчанию для кнопок */
var ButtonDefaultSettings = {
    width: 120,
    height: 30,
    imgPosition: "left"
};

var DropDownButtonDefaultSettings = {
    width: 120,
    height: 30
};

/* Настройки по умолчанию для Tree */
var TreeDefaultSettings = {
    height: '300px',
    width: '400px'
};


/* Настройки по умолчанию для ComboBox */
var ComboBoxDefaultSettings = {
    height: 25,
    width: 200
    //minLength: 1
};

/* Настройки по умолчанию для TextArea */
var TextAreaDefaultSettings = {
    height: 70,
    width: 340
};


/* Настройки по умолчанию для CheckBox */
var CheckBoxDefaultSettings = {
    width: 25, 
    height: 25
};

var NumberInputDefaultSettings = {
    width: 125, 
    height: 25,
    inputMode: 'simple'
};

var RadioButtonDefaultSettings = {
    width: 20, 
    height: 22
};

var ToggleButtonDefaultSettings = {
    width: 200,
    height: 30,
};



var GridFilters = {};

GridFilters.CreateFilter = function(Type, Operator, Value, Condition, FilterGroup) {
    var FilterType = Type; 
    var FilterOrOperator = Operator;
    var FilterValue = Value;
    var FilterCondition = Condition;
    
    var Filter = FilterGroup.createfilter(FilterType, FilterValue, FilterCondition);
    FilterGroup.addfilter(FilterOrOperator, Filter);
    
    return Filter;
};

GridFilters.CreateFilterAndFilterGroup = function(Type, Operator, Value, Condition, FilterGroup) {
    if (FilterGroup == undefined)
        FilterGroup = new $.jqx.filter();
    
    var Filter = GridFilters.CreateFilter(Type, Operator, Value, Condition, FilterGroup)
    return FilterGroup;
};

GridFilters.AddFilter = function(ID, FieldName, Type, Operator, Value, Condition, Apply, FilterGroup, Filter) {
    
    if (Apply == undefined)
        Apply = true;
    
    var FilterType = Type; //'stringfilter';
    var FilterOrOperator = Operator; //1;
    var FilterValue = Value;
    var FilterCondition = Condition; //'contains';
    
    if (FilterGroup == undefined)
        FilterGroup = new $.jqx.filter();
    
    var Filter = FilterGroup.createfilter(FilterType, FilterValue, FilterCondition);
    FilterGroup.addfilter(FilterOrOperator, Filter);
    
    $('#' + ID).jqxGrid('addfilter', FieldName, FilterGroup);
    
    if (Apply)
        $('#' + ID).jqxGrid('applyfilters');
    
    return FilterGroup; 
};

GridFilters.AddControlFilter = function(ID_CONTROL, TYPE_CONTROL, ID, FieldName, Type, Operator, Condition, Apply, FilterGroup, Filter) {
    var Value = null;
    
    if (TYPE_CONTROL == 'jqxInput') {
        $('#' + ID_CONTROL).on('change', function (event) { 
            Value = $('#' + ID_CONTROL).jqxInput('val');
            var isCompleted = $('#' + ID).jqxGrid('isBindingCompleted');
            if (Value != '' && Value != null && isCompleted)
                GridFilters.AddFilter(ID, FieldName, Type, Operator, Value, Condition, Apply, FilterGroup);
            else
                $('#' + ID).jqxGrid('removefilter', FieldName);
        });
    };
    
    if (TYPE_CONTROL == 'jqxNumberInput') {
        $('#' + ID_CONTROL).on('change', function (event) { 
            Value = $('#' + ID_CONTROL).jqxNumberInput('val');
            var isCompleted = $('#' + ID).jqxGrid('isBindingCompleted');
            if (Value != '' && Value != null && isCompleted)
                GridFilters.AddFilter(ID, FieldName, Type, Operator, Value, Condition, Apply, FilterGroup);
            else
                $('#' + ID).jqxGrid('removefilter', FieldName);
        });
        $('#' + ID_CONTROL).on('keydown', function(event) {
            Value = $('#' + ID_CONTROL).jqxNumberInput('val');
            var isCompleted = $('#' + ID).jqxGrid('isBindingCompleted');
            if (Value != '' && Value != null && isCompleted)
                GridFilters.AddFilter(ID, FieldName, Type, Operator, Value, Condition, Apply, FilterGroup);
            else
                $('#' + ID).jqxGrid('removefilter', FieldName);
        });
    };
    
    if (TYPE_CONTROL == 'jqxComboBox') {
        $('#' + ID_CONTROL).on('keydown', function(event) {
            var isCompleted = $('#' + ID).jqxGrid('isBindingCompleted');
            var keyCode = event.keyCode;
            if (keyCode == 13) {
                Value = $('#' + ID_CONTROL).val();
                if (Value == ''|| Value == -1 || Value == null) {
                    $('#' + ID_CONTROL).jqxComboBox('clearSelection');
                    $('#' + ID).jqxGrid('removefilter', FieldName);
                }
                else if (isCompleted)
                    GridFilters.AddFilter(ID, FieldName, Type, Operator, Value, Condition, Apply, FilterGroup);
                
            }
        });
    };
    
    if (TYPE_CONTROL == 'jqxCheckBox') {
        $('#' + ID_CONTROL).bind('change', function (event) {
            var isCompleted = $('#' + ID).jqxGrid('isBindingCompleted');
            var Checked = event.args.checked;
            if (Checked && isCompleted)
                GridFilters.AddFilter(ID, FieldName, Type, Operator, '\'' + Value + '\'', Condition, Apply, FilterGroup);
            else 
                $('#' + ID).jqxGrid('removefilter', FieldName);
        });
    };
    
    if (TYPE_CONTROL == 'jqxDateTimeInput') {
        $('#' + ID_CONTROL).on('valueChanged', function (event) {
            var isCompleted = $('#' + ID).jqxGrid('isBindingCompleted');
            var Value = event.args.date;
            if (Value !== null) {
                var NewValue = new Date(Value);
                NewValue = NewValue.getDate() + "." + (NewValue.getMonth()+ 1)  + "." + NewValue.getFullYear();
                if (isCompleted)
                    GridFilters.AddFilter(ID, FieldName, Type, Operator, NewValue, Condition, Apply, FilterGroup, Filter);
            }
            else 
                $('#' + ID).jqxGrid('removefilter', FieldName);
        });
    };
    return FilterGroup;    
};

var GridState = {};

GridState.LoadGridSettings = function(ID, KEY) {
    var Result = [];
    $.ajax({
        url: '/index.php?r=Personalization/JqxLoad',
        type: 'POST',
        async: false,
        data: {
            Key: KEY
        },
        success: function(Res){
            if (Res !== '') {
                Res = JSON.parse(Res);
                Res = JSON.parse(Res.Columns);
                Result = Res;
            }
        }
    });
    return Result;
};

GridState.AddEvenColumns = function (ID, KEY) {
    $('#' + ID).on("columnreordered", function (event) { 
        GridState.SaveGridSettings(ID, KEY);
    });
    $('#' + ID).on("columnresized", function (event) 
    {
        GridState.SaveGridSettings(ID, KEY);
    });
};

GridState.SaveGridSettings = function(ID, KEY) {
    var State = $('#' + ID).jqxGrid('savestate');
    State = State.columns;
    
    $.ajax({
        url: '/index.php?r=Personalization/JqxSave',
        type: 'POST',
        data: {
            Key: KEY,
            Id: ID,
            Columns: JSON.stringify(State)
        }
    });
    
};

GridState.StateInitGrid = function(ID, KEY) {
    $('#' + ID).on('bindingcomplete', function(){
        $('#' + ID).jqxGrid('selectrow', 0);
        
        
    });
    
       
    GridState.AddEvenColumns(ID, KEY);
};


/* Индивидуальные настройки для гридов */         
var GridsSettings = [];

// Просмотр объектов (Грид)
GridsSettings['ObjectsGrid'] = {
    columns: [
        { text: 'Адрес', dataField: 'Addr', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250},
        { text: 'Организация', dataField: 'FullName', width: 150 },
        { text: 'Юр. лицо', dataField: 'JuridicalPerson', width: 100 },
        { text: 'Район', dataField: 'AreaName', width: 100 },
        { text: 'Тип обслуживания', dataField: 'ServiceType', width: 100 },
        { text: 'Мастер', dataField: 'MasterName', width: 180 },
        { text: 'Новостройка', dataField: 'year_construction', width: 180 },
        { text: 'ВИП', dataField: 'VIP', width: 180 },
        { text: 'Участок', dataField: 'Territ_Name', width: 180 },
    ]
};



// Просмотр заявок (Ход работы)
GridsSettings['ProgressGrid'] = {
    enablebrowserselection: true,
    columns:
    [
        { text: 'Дата сообщения', datafield: 'date', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
        { text: 'Администрирующий', datafield: 'EmployeeName', width: 100 },
        { text: 'План. дата вып.', /* filtertype: 'range' ,*/ datafield: 'plandateexec', width: 150, cellsformat: 'dd.MM.yyyy' },
        { text: 'Дата вып.', filtertype: 'range', datafield: 'dateexec', width: 150, cellsformat: 'dd.MM.yyyy HH:mm' },
        { text: 'Действие', filtertype: 'range', datafield: 'report', width: 250 },
        { text: 'Исполнители', filtertype: 'range', datafield: 'othername', width: 150 },
        { text: '№ Заявки', datafield: 'demand_id', width: 100},
    ]
};

// Просмотр заявок (Ход работы)
GridsSettings['ExecutorsGrid'] = {
    columns:
    [
        { text: 'Исполнитель', filtertype: 'range', datafield: 'EmployeeName', width: 250 },
        { text: 'Дата сообщения', datafield: 'Date', width: 150, cellsformat: 'dd.MM.yyyy HH:mm'},
    ]
};

