var $array = [];
var algrid_list = [];

$(function(){
    // Массив объектов (гридов)
    
        
    $(".algrid").each(function(){
        /*  
            Цикл по все гридам на странице.
            Каждый грид записываем в массив объектов,
            с которым в последующем работаем
        */
        
        
        var $grid = $(this);
        // Ищем JSON строку в html
        var $str = $grid.find(".json").first().html();  
        // Создаем объект на ее основе
        var $object = eval("(" + $str +")");
        
        $object.algrid = $grid;
        // Записываем объект в массив
        $array.push($object);
        
        
        
        $object.getfilterajax = function(){
            
            obj = {};
            obj.ModelName = $object.ajax.modelname;
            obj.Conditions = [];
            obj.Top = -1;
            
            $(".filterajax").each(function(){
                
                if ($(this).attr("control") === $object.name)
                {
                    
                    if ($(this).attr("typefilter") === "condt")
                    {
                        $condt = $(this).attr("condition");
                        $val = $(this).val();
                        if ($val !== "")
                        {
                            $condt = $condt.replace(":value", $val);
                            obj.Conditions.push($condt);
                        }
                    }
                    
                    if ($(this).attr("typefilter") === "check")
                    {
                        
                        $condt = $(this).attr("condition");
                        if ($condt !== "")
                        {
                            obj.Conditions.push($condt);
                        }
                    }
                    
                    if ($(this).attr("typefilter") === "top")
                    {
                        obj.Top = $(this).val(); 
                    }
                    
                }
            });
            
            return obj;
        };
        
        $object.loadata = function(){
        
            if (($object.ajax !== undefined) && ($object.ajax.length !== 0))
            {
                
                obj = this.getfilterajax();
                
                
                
                $.ajax({
                    url: $object.ajax.url,
                    type: "POST",
                    data: obj,
                    async: false,
                    success: function(res){
                        n = eval("(" + res + ")");
                        $object.data = n;
                        $object.initfilter();
                    }
                });
            }
            
        };
        
        if (($object.ajax !== undefined) && ($object.ajax.length !== 0))
        {
            
                    //$object.loadata();
        }
        
        $object.draw = function(){
            
            $object.loadata();
            $object.filterdata = $object.data;
            
            // Отрисовка грида
            this.drawheader(); // Рисуем шапку
            
            this.drawbody();
            this.drawpager();
            
            // Тут ie отваливается
            this.addevents();
            
            this.filterajax = [];
            
            
            
            elemparent = $object.algrid.parent("div");
            this.resizegrid(elemparent.outerWidth());
            this.link_data = this.algrid.find(".data").first();
            this.link_header = this.algrid.find(".header").first();
            this.column_resize = false;
            
        };
        
        $object.initfilter = function() {
            
            this.colfilter = [];
            if (this.data[0] !== null)
            {    
                
                //this.colfilter = [];
                i = 0;
                for (var key in this.data[0])
                {
                    
                    f = {};
                    f.field = key;
                    f.type = 1;
                    f.value = "";
                    this.colfilter[i] = f;
                    i++;
                }
            }
            
        };
        
        $object.filtertr = function() {
            $str = "<tr>";
            
            for (i = 0; i < this.columns.length; i++)
            {
                filtervalue = "";
                $str+="<td><table class='filter' style='width: 100%'><tbody><tr>";
                
                if ((this.colfilter !== undefined) && (this.colfilter !== null))
                for (j =0; j < this.colfilter.length; j++)
                    if (this.colfilter[j].field === this.columns[i].fieldname)
                        filtervalue = this.colfilter[j].value;
                
                $str+="<td style='width: 100%; padding-right: 6px'><input index='" + i + "' class='edit' fieldname='" + this.columns[i].fieldname + "' style='width: 100%;' value='" + filtervalue + "'></td>";
                $str+="</tr></tbody></table></td>";
            }
            $str+="</tr>";
            return $str;
        };
        
        $object.drawheader = function(){
            // Отрисовка шапки грида
            // Вычисляем ширину объекта
            
            if (!this.options.showcolumns) return;
            
            
            this.algrid.find("dxGridView_gvHeaderSortUp_Metropolis").remove();
            this.algrid.find("dxGridView_gvHeaderSortDown_Metropolis").remove();
            
            $fullheader = this.algrid.find(".fullheader").first();
            this.calcwidthtable();
            
            
            var $str = "<div class='fullheader' style='padding-right: 17px'>" +
                       "   <div class='header' style='width: " + (this.options.width - 17) + "px;' align='left'>" +
                       "       <table class='columns' style='width: " + this.tablewidth + "px;'><tbody><tr>";
            
            for (var $i in this.columns)
            {
                $str+= "<td index='" + $i + "' drag='drag' style='width: " + this.columns[$i].width + "px; height: " + this.columns[$i].height + "px; padding-left: 6px;'>";
                //    + this.columns[$i].name
                $str += "<table class='column' style='width:100%;'>" +
			"<tbody><tr><td>" + this.columns[$i].name +
			"</td><td style='width:1px;text-align:right;'>"; //<span class='dx-vam'>&nbsp;</span>";
                
                if (this.columns[$i].s === "down")
                {
                    $str += "<div class='dxGridView_gvHeaderSortUp_Metropolis dx-vam' style='margin-left:5px;'></div>";
                }
                if (this.columns[$i].s === "up")
                {
                    $str += "<div class='dxGridView_gvHeaderSortDown_Metropolis dx-vam' style='margin-left:5px;'></div>";
                }
                $str += "<div class='cascade' style='display: none'><input cascade='cascade' type='text'></div>";
                $str +=	"</td></tr>";
                $str += "</tbody></table>";
                $str += "</td>";
            }
            
            $str+="</tr>";
            
            if (this.options.showfilters)            
                $str+=this.filtertr();
            
            $str+="</tbody></table></div></div>";
            
            if ($fullheader.length > 0)
            {
                $fullheader.replaceWith($str);
                this.addevents();
            }
            else
                this.algrid.append($str);
            
            if (this.options.stretch)
            {
                elemparent = $object.algrid.parents("div");
                this.resizegrid(elemparent.outerWidth());
            }
            
            $object.scrollbody();
            
        };

        $object.calcwidthtable = function(){
            // Расчитываем ширину таблицы  данными
            var $width = 0;
            for (var $i in this.columns)
            {
                
                $width+= this.columns[$i].width;
            }
            this.tablewidth = $width;
            
            return $width;
        };
        
        $object.drawpage = function($data, idx){
            
            if (idx === undefined) idx = -1;
            
            $object.algrid.find(".table").remove();
            $data = $object.algrid.find(".data").first();
            //$data.find(".table").remove();
            var $str = "<table class='table' style='width: " + this.tablewidth + "px;'><tbody>";
            if (this.data.length === 0)
                $str = $str + "<tr><td>Данные отсутствуют</td></tr>";
            else
                $str = $str + this.gettable(idx);
            
            $str = $str + "</tbody></table>";
            
            
            $data.append($str);
            
            if ($object.scrolly !== -1)
                $data.scrollTop($object.scrolly);
        };
        
        $object.drawbody = function(){
            if (this.algrid.find(".data").first().length === 0)
            {
                var $str = "<div class='data' style='overflow: scroll; width: " + this.options.width + "px; height: " + this.options.height + "px; border-spacing: 0; margin: 0; padding: 0;' align='left'></div>";
                this.algrid.append($str);
                
            }
            $data = this.algrid.find(".data").first();
            this.drawpage($data);
        };
        
        $object.getpagecount = function(){
            var pagecount = this.filterdata.length / this.options.pagesize | 0;
            if (this.data.length % this.options.pagesize > 0)
                pagecount++; 
            this.countpage = pagecount;
            return pagecount;
        };
        
        $object.f = function(fieldname, value)
        {
            
            for (i = 0; i < this.filterdata.length; i++)
                if (this.filterdata[i][fieldname] === value)
                    return i;
            return -1;    
        };
        
        $object.pageofindex = function(index) {
            //index++;
            
            c = index / this.options.pagesize | 0;
            
            if (c === 0)
                p = c + 1;
            else
                if ((index % this.options.pagesize) >= 0)
                    p = c + 1;
                else
                    p = c;
            return p;
        };
        
        $object.gettable = function(i){
            var $str = "";
            
            if ((i !== -1) && (i !== undefined))
            {
                this.currentpage = this.pageofindex(i);
                
                ai = this.options.pagesize - ((this.currentpage * this.options.pagesize) - (i+1));
                
                $object.scrolly = ai*27;
            }
            else
                $object.scrolly = -1;
            
            this.getpagecount();
            
            var $i = (this.currentpage - 1) * this.options.pagesize;
            var $max = $i + (this.options.pagesize - 1);
            if ($max > this.filterdata.length) $max = this.filterdata.length - 1;
            
                        
            for ($i; $i <= ($max); $i++)
            {
                if ($i === $object.focusedindex)
                    $str+= "<tr index='" + $i + "' class='algridRowFocused'>";
                else
                    $str+= "<tr index='" + $i + "'>";
                
                for (var $j = 0; $j < this.columns.length; $j++)
                {
                    
                    if ((this.filterdata[$i][this.columns[$j].fieldname] !== undefined) && (this.filterdata[$i][this.columns[$j].fieldname] !== null))
                        $str += "<td role='"+this.columns[$j].role+"' index='" + $j + "' style='width: " + this.columns[$j].width + "px;'>" + this.filterdata[$i][this.columns[$j].fieldname] + "</td>";
                    else
                        $str += "<td index='" + $j + "' style='width: " + this.columns[$j].width + "px;'></td>"; 
                }
                $str+= "</tr>";
            }
            $str += "<tr><td colspan='" + this.columns.length + "' style='border:0px;height:50px'></td></tr>";
            return $str; 
        };
        
        $object.getpagelist = function(){
            var str = "";
            if ((this.currentpage - 3) > 0)
                minpage = (this.currentpage - 3);
            else minpage = 1;
            
            if ((this.currentpage + 3) > this.countpage)
                maxpage = this.countpage;
            else {
                maxpage = (this.currentpage + 3);
                if (maxpage < 7) maxpage = 7;
                if (maxpage > this.countpage ) maxpage = this.countpage; 
            }
            
            //border: 1px Solid #2F5C3B
            for (minpage; minpage <= maxpage; minpage++)
                if (this.currentpage === minpage)
                {   str += "<div style='float: left; border: 1px Solid #2F5C3B'><span style='margin: 6px;'>"+minpage+"</span></div>";}
                else
                {str += "<div style='float: left;'><span style='margin: 6px;'>"+minpage+"</span></div>";}
            
                
            str += "</td>";
            return str;
        };

        $object.drawpager = function(){
            if (this.options.showpager)
            {
                this.algrid.find(".pager").remove();
                var $str = "<div class='pager' style='width:"+this.options.width+"px; height:30px'>";
                $str += "<table style='width:"+this.options.width+"px;'><tbody><tr>";
                $str += "<td style='width:150px;'>Запись "+ this.focusedindex+" из "+this.filterdata.length+"</td>";
                $str += "<td style='width:" + (this.options.width - 300) + "px;'>";

                $str += this.getpagelist();
                $str += "<td style='width:150px;'>Размер стр.: <select>";

                for (var i = 0; i < this.options.pagesizevariants.length; i++)
                {
                    if (this.options.pagesizevariants[i] === this.options.pagesize)
                        $str += "<option selected='selected'>" + this.options.pagesizevariants[i] + "</option>";
                    else
                        $str += "<option>" + this.options.pagesizevariants[i] + "</option>";
                } 
                if (this.options.pagesize === this.filterdata.length)
                    $str += "<option selected='selected'>Все</option>";
                else
                    $str += "<option>Все</option>";
                $str += "</select></td></tr></tbody></table></div>";
                this.algrid.append($str);
            }
        };
        
        $object.addblclick = function(){
            tr = this.algrid.find(".table tr");
            tr.dblclick(function(event){
                eval($object.dblclick);
            });
        };
        
        $object.addevents = function(){
            // Добавление эвентов к гриду
            
            this.addscrollevent();
            this.addpageclickevent();
            this.addselectchangeevent();
            this.addresizeevent();
            //this.addmoveevent();
            this.adddragevent();
            this.addsortevent();
            this.addfilterevent();
            this.addclickevent();
            this.addblclick();
            //ie
            this.addwindowresize();
            this.drawimg();
            this.addnavigationevent();
            
            
        };
        
        $object.scrollbody = function() {
            $data = this.algrid.find(".data").first();
            $header = this.algrid.find(".header").first();
            $table = $data.find("table").first();
            
            var scroll_x = $data.scrollLeft();
            var scroll_y = $data.scrollTop();
            $header.scrollLeft(scroll_x);
                
            
            
            if ((scroll_y + $data.outerHeight() - 17) >= ($table.outerHeight()))
            {
                
                $object.changepage($object.currentpage + 1, 1);
            }
            if (scroll_y === 0)
                if ($object.currentpage > 1)
                    $object.changepage($object.currentpage - 1, ($table.outerHeight() - $data.outerHeight() - 17));
        };
        
        $object.addscrollevent = function(){
            $data.scroll(function(){
                $object.scrollbody();
            });
            
           
        };
        
        $object.addpageclickevent = function(){
            $span = this.algrid.find(".pager span");
            $data = this.algrid.find(".data").first();
            $pager = this.algrid.find(".pager"); 
            $span.click(function(){
               $object.changepage(parseInt($(this).html(), 10));
            });
        };
        
        $object.changepage = function($index, $scrolltop){
            if ($index <= this.countpage)
            {
                $data = this.algrid.find(".data").first();
                $object.currentpage = $index;
                $object.drawpage($data);
                $object.drawpager();
                $object.addevents();
                $data.scrollTop($scrolltop);
            }
        };
        
        $object.addselectchangeevent = function(){
            $select = this.algrid.find(".pager select").first();
            $select.change(function(){
                $option =  $(this).find("option:selected").first();
                if ($option.text() === "Все")
                    $object.options.pagesize = $object.filterdata.length;
                else
                    $object.options.pagesize = parseInt($option.text(), 10);
                    $object.changepage(1, 0);
                });
        };
        
        
        $object.get_resize_column = function($e, $td){
            var offset = $td.offset();
            var relativeX = ($e.pageX - offset.left);
            var relativeY = ($e.pageY - offset.top);

            if (($td.innerWidth() - relativeX) <= 2)
                return true;
            else         
                return false;
        };
        
        $object.addresizeevent = function(){
            $td = this.algrid.find(".fullheader td");
            
            $td.mousemove(function(e){
                if ($object.get_resize_column(e, $(this)))
                    $(this).parent("tr").find("td").css("cursor", "col-resize");
                else if (!$object.column_resize) 
                    $(this).parent("tr").find("td").css("cursor", ""); 
                
            });
            
            $td.mousedown(function(e){
                if ($object.get_resize_column(e, $(this)))
                {
                    $(this).attr("changeresize", "true");
                    $object.column_resize = true;
                    $object.column_resize_index = $(this).attr("index");
                    $object.column_resize_dom = $(this);
                    $(this).css("cursor", "col-resize");
                }
            });
            
            $object.savetoinifile = function() {
                $url = window.location.origin + window.location.pathname + "?r=Personalization/SaveIniFile";
                    
                var config = {};

                config.href = window.location.href;
                config.grid = $object.name;
                config.columns = $object.columns;

                $.ajax({
                    url: $url,
                    type: "POST",
                    data: config,
                    success: function(res){
                        
                    }
                });
            };
            
            $(document).mouseup(function(e){
                $("[changeresize=true]").attr("changeresize", "false");
                if ($object.column_resize)
                {
                    $object.savetoinifile();
                    $object.column_resize = false;
                    $object.docmouseup = true;
                };
                
                e.pageX = 0;
            });
            
            $(document).mousemove(function(e){
                if ($object.column_resize)
                {
                    left = $object.column_resize_dom.offset().left;
                    width = $object.column_resize_dom.outerWidth();
                    cursorX = e.pageX;
                    col_width = (cursorX - (left + width)) + width;

                    if (col_width < 25) col_width = 25;
                    $object.columns[$object.column_resize_index].width = col_width;
                    tw = $object.calcwidthtable();
                    
                    tcol = $object.algrid.find(".columns").first();
                    tdata = $object.algrid.find(".table").first();
                    tfilter = $object.algrid.find(".filter").first();
                    tcol.css("width", tw);
                    tdata.css("width", tw);
                    //tdata.outerWidth(tw);
                    
                    
                    for (var $i = 0; $i < $object.columns.length; $i++)
                    {
                        tcol.find("[index=" + $i + "]").css("width", $object.columns[$i].width);
                        tdata.find("[index=" + $i + "]").css("width", $object.columns[$i].width);
                        tcol.find("input").css("width", "100%");
                    }
                    
                }
            });
        };
        
        $object.getelementdrop = function(x, y){
            col = $object.algrid.find(".columns");
            for ($i = 0; $i < $object.columns.length; $i++)
            {
                td = col.find("[index=" + $i + "]").first();
                left = td.offset().left;
                top2 = td.offset().top;
                width = td.outerWidth();
                height = td.outerHeight();
                
                if ((x >= left) && (x <= (left + width)))
                    if ((y >= top2) && (y <= (top2 + height)))
                        if ((x - left) > (width/2))
                            return $i + 1;
                        else
                            return $i;
            }
            return -1;
        };
        
        $object.addown = function(td, pos) {
            $top = td.offset().top;
            $height = td.outerHeight();
            $width = td.outerWidth();
            $left = td.offset().left;
            $down = $("#ContentHolder_grid_IADD");
            if (pos === "left")
                $down.css("left", $left -6);
            else
                $down.css("left", $left - 6 + $width);
            $down.css("top", $top - 11);
            $down.css("visibility", "visible");
            
        };
        
        $object.addup = function(td, pos) {
            
            $top = td.offset().top;
            $height = td.outerHeight();
            $width = td.outerWidth();
            $left = td.offset().left;
            $up = $object.algrid.find("#ContentHolder_grid_IADU");
            
            if (pos === "left")
                $up.css("left", $left - 6);
            else
                $up.css("left", $left - 6 + $width);
            
            $up.css("top", $top + $height);
            $up.css("visibility", "visible"); 
        };
        
        $object.adddragevent = function() {
            $td = this.algrid.find(".fullheader td[drag='drag']");
            $header = this.algrid.find(".header").first();
            $tr = this.algrid.find(".fullheader tr").first();
            
            
            $td.draggable({
                connectToSortable: ".fullheader tr",
                helper: "clone",
                drag: function(e, ui){
                    if (!$object.column_resize)
                    {
                        idx = $object.getelementdrop(e.pageX, e.pageY);
                        if (idx !== -1)
                        {
                            out = parseInt(ui.helper.attr("index"), 10);
                            if ((out !== idx) && ((out + 1) !== idx))
                            {
                                $object.drag = {};
                                $object.drag.flag = true;
                                $object.drag.o = out;
                                $object.drag.i = idx;
                                
                                if (idx === $object.columns.length)
                                {
                                    $td = $object.algrid.find(".columns td[index=" + (idx - 1) + "]");
                                    $object.addup($td, "right");
                                    $object.addown($td, "right");
                                }
                                else
                                {
                                    $td = $object.algrid.find(".columns td[index=" + idx + "]");
                                    $object.addup($td, "left");
                                    $object.addown($td, "left");
                                }
                            }
                            else
                            {
                                $object.drag = {};
                                
                                $object.drag.flag = false;
                                $object.drag.o = out;
                                $object.drag.i = idx;
                            }
                        }
                        
                    }
                    else
                        return false;
                },
                stop: function(){
                    if (!$object.column_resize)
                    {
                        $("#ContentHolder_grid_IADD").css("visibility", "hidden");
                        $("#ContentHolder_grid_IADU").css("visibility", "hidden");
                        
                        if ($object.drag.flag)
                            $object.changecolumnindex($object.drag.o, $object.drag.i);
                    }
                }
                //revert: "invalid"
            });
            
            $object.changecolumnindex = function($out, $in){
                
                ar = [];
                if ($out < $in)
                {
                    for (i = 0; i < this.columns.length; i++)
                    {
                        if ((i < $out) || (i >= $in))
                            ar[i] = this.columns[i];
                        
                        if (i === $in)
                            ar[i - 1] = this.columns[out];
                        
                        if ((i > $out) && (i < $in))
                            ar[i - 1] = this.columns[i];
                    }
                    
                    if ($in === this.columns.length)
                        ar[$in - 1] = this.columns[$out];
                };
                
                if ($out > $in)
                {
                    for (i = 0; i < this.columns.length; i++)
                    {
                        if ((i < $in) || (i  > $out))
                            ar[i] = this.columns[i];
                        
                        if ((i > $in) && (i < $out))
                            ar[i + 1] = this.columns[i];
                        
                        if (i === $in)
                        {
                            ar[i] = this.columns[out];
                            ar[i+1] = this.columns[i];
                        }
                    }
                }
                
                this.columns = ar;
                $data = this.algrid.find(".data").first();
                this.drawheader();
                this.drawpage($data);
                this.savetoinifile();
            };
        };
            
        $object.draganddropcolumns = function (drag, drop){
            ar = [];
            t = this.columns[drop];
            
            for (i = drag; i < this.columns.length; i++)
            {
                t = this.columns[i];
            }
        };
        
        $object.drawimg = function() {
            $object.algrid.find("#ContentHolder_grid_IADD").remove();
            $object.algrid.find("#ContentHolder_grid_IADU").remove();
            $str = "<div id='ContentHolder_grid_IADD' class='dxGridView_gvDragAndDropArrowDown_Metropolis' alt='|' style='position:absolute;visibility:hidden;top:-100px;'></div>";
            $str += "<div id='ContentHolder_grid_IADU' class='dxGridView_gvDragAndDropArrowUp_Metropolis' alt='|' style='position:absolute;visibility:hidden;top:-100px;'></div>";
            
            this.algrid.append($str);
        };
        
        $object.sortcolumn = function(column) {
            
            $s = column.s;
            if (($s === "up") || ($s === "none"))
            {    
                newdata = $object.filterdata.sort($object.sortFn(column.fieldname, false));
                column.s = "down";
            }
            else
            {
                newdata = $object.filterdata.sort($object.sortFn(column.fieldname, true));
                column.s = "up";
            }
            this.filterdata = newdata;
        };
        
        $object.sortFn = function(prop, desc){
            if (desc === undefined)
                desc = false;

            if (!desc)
                return function(a, b) {
                    if (String(a[prop]) > String(b[prop]))
                        return 1;
                    if (String(a[prop]) < String(b[prop]))
                        return -1;
                    return 0;
                };
            else
                return function(a, b) {
                    if (String(a[prop]) > String(b[prop]))
                        return -1;
                    if (String(a[prop]) < String(b[prop]))
                        return 1;
                    return 0;
                };
        };
        
        $object.addsortevent = function() {
            this.algrid.find(".fullheader td").click(function(){
                if ((!$object.column_resize) && (!$object.docmouseup))
                {
                    index = $(this).attr("index");
                    $object.sortcolumn($object.columns[index]);
                    $data = $object.algrid.find(".data").first();
                    for (i = 0; i < $object.columns.length; i++)
                        if (i !== index)
                            $object.columns[i].s = "none";
                    
                    $object.drawheader();
                    $object.drawpage($data);
                    $object.addclickevent();
                    
                }
                else
                {
                    $object.docmouseup = false;
                }
            });
        };
        
        $object.filterfn = function(fieldname, v, type) {
            return function (el, n) {
                if (type === 1)
                    $regex = new RegExp("^" + v.toLowerCase());
                
                if (type === 2)
                    $regex = new RegExp(v.toLowerCase());
                
                if (type === 3)
                    $regex = new RegExp("^" + v.toLowerCase() + "$");
                    
                if (el[fieldname] === null)
                    $text = "";
                else
                    $text = el[fieldname].toLowerCase();
                
                if ($regex.test($text) === false)
                    return false;
                else
                    return true;
            };
        };
        
        $object.setcolfilter = function(fieldname, value, type) {
            if (this.colfilter === undefined)
                this.initfilter();
            
            
                for (i = 0; i < this.colfilter.length; i++)
                    if (this.colfilter[i].field === fieldname)
                    {    
                        this.colfilter[i].value = value;
                        this.colfilter[i].type = type;
                    }
            
        };
        
        $object.setfilter = function() {
            $object.algrid.find(".fullheader input").each(function() {
                value = $(this).val();
                fieldname = $(this).attr("fieldname");
                $object.setcolfilter(fieldname, value, 1);
            });
        };
        
        $object.filter = function() {
            this.setfilter();
            
            for (i = 0; i < this.colfilter.length; i++)
            {
                if ((this.colfilter[i].value !== null) && (this.colfilter[i].value !== ""))
                {
                    $object.filterdata = $.grep($object.filterdata, $object.filterfn(this.colfilter[i].field, this.colfilter[i].value, this.colfilter[i].type));
                }
            }
        };
        
        $object.runfilter = function() {
            
            $object.loadata();
            
            
            $object.filterdata = $object.data;
            for (i = 0; i < $object.columns.length; i++)
                $object.columns[i].fltr = "";
            $object.filter();
            $object.currentpage = 1;
            $object.drawpage($data);
            $object.drawpager();
            $object.addclickevent();
            $object.addpageclickevent();
        };
        
        $object.addfilterevent = function() {
            $data = this.algrid.find(".data").first();
            $object.algrid.find(".fullheader input").change(function(){
                $object.runfilter();
            });
                                
        };
        
        $object.changeurlbuttons = function() {
            
            for (var key in $object.buttons)
            {

                
                
                button = $object.buttons[key];
                url = button.url;
                
                for (var paramname in button.params)
                {
                    if ($object.filterdata.length > 0) 
                        url += "&" + paramname + "=" + $object.filterdata[$object.focusedindex][button.params[paramname]];
                }
                
                for (var i = 0; i < albutton_list.length; i++)
                {
                    if (albutton_list[i].id === key)
                        albutton_list[i].href = url;
                }
                
            }
        };
        
        $object.chnagevaluelookup = function() {
            if ($object.filterdata.length > 0)
                if ($object.lookup !== null)
                {
                    for (var key in $object.lookup)
                    {
                        lookup = $object.lookup[key];
                        if(!lookup.selector)
                            elem = $("#" + lookup.id);
                        else
                            elem = $(lookup.selector);

                        if (lookup.type === 'textarea')
                            elem.val($object.filterdata[$object.focusedindex][lookup.field]);
                        if (lookup.type === 'input')
                            elem.val($object.filterdata[$object.focusedindex][lookup.field]);
                        if (lookup.type !== 0 || lookup.type !== undefined)
                            elem.html($object.filterdata[$object.focusedindex][lookup.field]);
                    }
                }
                
        };
        
        $object.cascadechnage = function() {
            
            if ((this.cascade !== null) && (this.cascade !== undefined))
            {
                for (key in this.cascade)
                {
                    
                    for (i = 0; i < $array.length; i++)
                        
                        
                        if ($array[i].name === this.cascade[key].control)
                        {
                            
                            control = $array[i];
                            //control.setcolfilter(this.cascade[key].controlfield, this.filterdata[this.focusedindex][this.cascade[key].field], 3);
                            //control.runfilter();
                        }
                }
            }
        };
        
        $object.addclickevent = function() {
            $object.algrid.find(".table tr").click(function(){
                $object.algrid.find(".table tr").removeClass("algridRowFocused");
                $(this).addClass("algridRowFocused");
                $object.focusedindex = parseInt($(this).attr("index"), 10);
                                
                $object.changeurlbuttons();
                $object.chnagevaluelookup();
                $object.cascadechnage();
                
                if ($object.combobox !== undefined)
                {
                    $object.combobox.change(true);
                }
                eval($object.onafterclick)
            });
        };
        
        $object.changepos = function(idx){
            p = this.pageofindex(idx);
            ai = (this.options.pagesize - ((p*this.options.pagesize) - idx));
            y = ai*27;
            max = ($object.options.pagesize*27) + 50;

            if (y > (max - $object.options.height))
                scroll = max - $object.options.height;
            else
                scroll = y;

            if (scroll === 0) scroll = 1;
            this.focusedindex = idx;
            this.changepage(p, scroll);
            
        };
        
        $object.locate = function($fieldname, $value) {
            idx = this.f($fieldname, $value);
            if (idx !== -1)
                this.changepos(idx);
            return idx;
            
        };
        
        $object.resizegrid = function(width){
            
            if (this.options.stretch)
            {
                
                if (width > (this.options.width - 50))
                {
                    
                    
                    eheader = this.algrid.find(".header").first();
                    
                    data = this.algrid.find(".data").first();
                    pager = this.algrid.find(".pager").first();
                    
                    eheader.css("width", width - 19);
                    data.css("width", width - 2);
                    pager.css("width", width - 2);
                }
                
            }
        };
        
        $object.addwindowresize = function(){
            elemparent = $object.algrid.parent("div");
            
            $(window).resize(function(){
                width = (elemparent.outerWidth());
                $object.resizegrid(width);
            });
            
        };
        
        $object.hide = function(){
            this.options.visible = false;
            this.algrid.css("display", "none");
        };
        
        $object.show = function(){
            this.options.visible = true;
            this.algrid.css("display", "table");
        };
        
        $object.search = function(fieldname, values) {
            
            $regex = new RegExp("^" + values.toLowerCase());
            
            for (i = 0; i < $object.filterdata.length; i++)
            {
                
                if ($object.filterdata[i][fieldname] === null)
                    $text = "";
                else
                    $text = $object.filterdata[i][fieldname].toLowerCase();
                
                if ($regex.test($text) !== false)
                    return i;
            }
            
            return -1;
        };
        
        $object.findforcombobox = function(fieldname, values) {
            idx = this.search(fieldname, values);
            if (idx !== -1)
            {    
                this.changepos(idx);
                
            }
            else
            {
                
            }
                
            return idx;
        };
        
        $object.addnavigationevent = function() {
            
        };
        
        
        
        $object.draw();
    });
    
    

});


