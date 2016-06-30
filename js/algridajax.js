(function($){
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
            $(this).algridajax("Load");
        },
        
        SetSize: function() {
            // Устанавливаем размеры грида
            var id = $(this).attr("id");
            
            if (!algridajaxSettings[id].Stretch) return; // Если грид не должен растягиватся выходим
            
            ParentWidth = $(this).parent().outerWidth();
            $(algridajaxSettings[id].algridajaxSelector).outerWidth(ParentWidth);
            $("#" + algridajaxSettings[id].alSubHeaderSelector).outerWidth(ParentWidth - 17);
            $("#" + algridajaxSettings[id].alBodySelector).outerWidth(ParentWidth);
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
            
            var StartScroll = PageNumber * algridajaxSettings[id].CurrentPageSize * algridajaxSettings[id].RowHeight - (algridajaxSettings[id].CurrentPageSize * algridajaxSettings[id].RowHeight);
            var StartScroll = PageNumber * algridajaxSettings[id].CurrentPageSize - algridajaxSettings[id].CurrentPageSize;
            var EndScroll = StartScroll + algridajaxSettings[id].CurrentPageSize * algridajaxSettings[id].RowHeight;
            var CurrentRow = algridajaxSettings[id].CurrentFocusedIndex;
            var PosScroll = CurrentRow * algridajaxSettings[id].RowHeight - algridajaxSettings[id].RowHeight;
            
            
            var Start = PageNumber * algridajaxSettings[id].CurrentPageSize - algridajaxSettings[id].CurrentPageSize + 1;
            var Index = algridajaxSettings[id].CurrentFocusedIndex - Start;
            var BodyHeight = $("#" + algridajaxSettings[id].alBodySelector).outerHeight();
            var CountRowBody = (BodyHeight - 17) / algridajaxSettings[id].RowHeight | 0;
            var ScrollTop;
            
            if (Index <= (algridajaxSettings[id].CurrentPageSize - CountRowBody - 1)) {
                ScrollTop = algridajaxSettings[id].CurrentFocusedIndex * algridajaxSettings[id].RowHeight - algridajaxSettings[id].RowHeight;
                algridajaxSettings[id].Focused = true;
                $("#" + algridajaxSettings[id].alBodySelector).scrollTop(ScrollTop);
                
            }
            else {
                ScrollTop = algridajaxSettings[id].CurrentFocusedIndex * algridajaxSettings[id].RowHeight;
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
                        
                        for (key in Obj.Columns)
                        {
                            delete Obj.Columns[key].Filter;
                            delete Obj.Columns[key].Sort;
                        }
                        
                        algridajaxSettings[id].Columns = $.extend(true, algridajaxSettings[id].Columns, Obj.Columns);
                        
                    }
                }
            });
        },
        
        saveToFile: function() {
            id = $(this).attr("id");
            
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
            var PageSize = algridajaxSettings[id].CurrentPageSize * algridajaxSettings[id].RowHeight;
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
            var ScrollTop = (PageNumber * algridajaxSettings[id].CurrentPageSize * algridajaxSettings[id].RowHeight) - (algridajaxSettings[id].CurrentPageSize * algridajaxSettings[id].RowHeight)
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
                            var Col = $("#alHeaderCol" + parseInt(algridajaxSettings[idGrid].Columns[key].Index) + "_" + algridajaxSettings[idGrid].id);
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
                algridajaxSettings[id].ArrayColumns.push(algridajaxSettings[id].Columns[key]);
            algridajaxSettings[id].ArrayColumns.sort(sortFn("Index"));
            //algridajaxSettings[id].Columns.sort(sortFn("Index"));
            
            for (var i = 0; i < algridajaxSettings[id].ArrayColumns.length; i++)
            {
                var Column = algridajaxSettings[id].ArrayColumns[i];
                WidthTable += parseFloat(Column.Width);
                StrHeader3 += "<td ColIndex='"+ i +"' id='alHeaderCol" + i + "_" + id + "' style='width: " + parseFloat(Column.Width) + "px; border-top-width:0px;border-left-width:0px;' class='algridajaxHeaderColumns'>";
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
            Width = $(this).outerWidth();
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
        
        DrawBodyGrid: function() {
            var id = $(this).attr("id");
            
            //console.log("DrawBodyGrid ID:" + id);
            
            var StrBody = "";
            
            if (!algridajaxSettings[id].Stretch && (algridajaxSettings[id].Width != 0))
                StrBody += "<div id='"+algridajaxSettings[id].alBodySelector+"' class='algridajaxBody' style='height: "+ (algridajaxSettings[id].Height - 28) +"px; width: " + algridajaxSettings[id].Width + "px; overflow: scroll;' align='left'>";
            else
                StrBody += "<div id='"+algridajaxSettings[id].alBodySelector+"' class='algridajaxBody' style='height: "+ (algridajaxSettings[id].Height - 28) +"px; overflow: scroll;' align='left'>";
            
            var RecordCount = 0;
            
            if (algridajaxSettings[id].DataDetails != null)
                RecordCount = algridajaxSettings[id].DataDetails["Count"];
            
            var AllHeight = RecordCount * algridajaxSettings[id].RowHeight;
            var PageHeight = algridajaxSettings[id].CurrentPageSize * algridajaxSettings[id].RowHeight;
            var TopBlockHeight = (algridajaxSettings[id].CurrentPage * PageHeight) - PageHeight;
            var BottomBlockHeight = AllHeight - (PageHeight + TopBlockHeight);
            var CurrentPageHeight = algridajaxSettings[id].Data.length * algridajaxSettings[id].RowHeight;
            
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
                            StrBody += "<td class='algridajaxTD algridajaxTD"+j+"' style='width: " + Column["Width"] + "px;'></td>";
                        else {
                            if ((Column.Format === "d.m.Y H:i") || (Column.Format === "d.m.Y")){
                                CellValue = $(this).algridajax("DateToString", CellValue, Column.Format);
                            }
                            
                            StrBody += "<td class='algridajaxTD algridajaxTD"+j+"' style='overflow: hidden; width: " + Column["Width"] + "px'>" + CellValue + "</td>";
                            
                        }
                    }
                    else
                        StrBody += "<td class='algridajaxTD algridajaxTD"+j+"' style='width: " + Column["Width"] + "px;'></td>";
                }
                StrBody += "</tr>";
            }
            StrBody += "</tbody></table>";
            StrBody += "<div id='" + algridajaxSettings[id].alBottomBlockSelector + "' style='width: 1px; height: "+BottomBlockHeight+"px'>";
            StrBody += "</div>";
            
            if (document.getElementById(algridajaxSettings[id].alBodySelector) !== null) {
                //console.log("!!!!!");
                $("#" + algridajaxSettings[id].alBodySelector).replaceWith(StrBody);
            }
            else {
                
                $("#" + algridajaxSettings[id].alContentSelector).append(StrBody);
            }
            
            $("#" + algridajaxSettings[id].alBodyTableSelector + " td").outerHeight(algridajaxSettings[id].RowHeight);
            $("#" + algridajaxSettings[id].alBodyTableSelector + " td").first().outerHeight(algridajaxSettings[id].RowHeight + 1);
            
            
            $(this).algridajax("ChangeScrollTop");
            $(this).algridajax("addEventScrollBody");
            $(this).algridajax("SetSize"); 
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
                        //console.log(NewInternalFilters);
                        //console.log(algridajaxSettings[id].InternalFilters);
                        if (algridajaxSettings[id].FirstLoad) {
                            //console.log("1");
                            $("#" + id).algridajax("LoadData", Async, 1, algridajaxSettings[id].CurrentPageSize, null, true);
                            return;
                        }
                        
                        
                        if ((!$(this).algridajax("ArrayEquals", NewInternalFilters, algridajaxSettings[id].InternalFilters))) {
                            //console.log("2");
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

        
        Load: function(Async, CurrentPage, CurrentPageSize, Draw) {
            var id = $(this).attr("id");
            
            if (Aliton.isRelationsNotReady(id)) return;
            
            if ((CurrentPage === undefined) || (CurrentPage === null) || (CurrentPage === -1))
                CurrentPage = algridajaxSettings[id].CurrentPage;
            
            if ((CurrentPageSize === undefined) || (CurrentPageSize === null))
                CurrentPageSize = algridajaxSettings[id].CurrentPageSize;
            
            if ((Draw === undefined) || (Draw === null))
                Draw = true;
            
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
                    
                    $(this).algridajax("LoadData", Async, CurrentPage, CurrentPageSize, algridajaxSettings[id].CurrentFocusedIndex, Draw);
                }
            }
            
        },
        
        LoadData: function(Async, CurrentPage, CurrentPageSize, CurrentRow, Draw) {
            var id = $(this).attr("id");
            
            
            
            if ((CurrentPage === undefined) || (CurrentPage === null) || (CurrentPage === -1))
                CurrentPage = 1;
            
            if ((CurrentPageSize === undefined) || (CurrentPageSize === null))
                CurrentPageSize = 200;
            
            if ((Draw === undefined) || (Draw === null))
                Draw = true;
            
            if ((CurrentRow === undefined) || (CurrentRow === null))
                CurrentRow = -1;
            
            var ForeignFilters = Aliton.SearchForeignFilters(id);
            console.log(ForeignFilters);
            
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
                    //console.log("After Current Page: " + algridajaxSettings[id].CurrentPage);
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
})(jQuery);

