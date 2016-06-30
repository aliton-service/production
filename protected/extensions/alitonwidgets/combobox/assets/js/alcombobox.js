var alcombobox_list = [];

$(function(){
    
    $(".alcombobox").each(function(){
         
        cmb = $(this);
        var str = cmb.find(".json").first().html();
        var object = eval("(" + str +")");
        object.alcombobox = cmb;
        alcombobox_list.push(object);
        
        
        object.dropdownbutton = cmb.find("#alcomboboxeditbuttom_" + object.id); 
        object.image = cmb.find("#alcomboboxeditimg_" + object.id);
        object.popup = $("#popupcontrol_" + object.id);
        object.input = $("#alcomboboxedit_" + object.id);
        object.inputform = cmb.find(".form-control");
        
        
        object.addmouseover = function() {
            this.dropdownbutton.mouseover(function(){
                /*
                $(this).css({
                    "background-color": "#2F5C3B",
                    "cursor": "pointer",
                });
                */
                $(this).css("background-color", "#2F5C3B");
                $(this).css("cursor", "pointer");
                object.image.css("background-position", "-33px -172px");
            });
        };
        
        object.addmouseout = function() {
            this.dropdownbutton.mouseout(function(){
                /*
                $(this).css({
                    "background-color": "white",
                    "cursor": "default",
                });
                */
                $(this).css("background-color", "white");
                $(this).css("cursor", "pointer");
                object.image.css("background-position", "-22px -172px");
            });
        };
        
        object.addevents = function() {
            
            this.init();
            this.addmouseover();
            this.addmouseout();
            this.addclickevent();
            this.addkeyup();
            this.addfocusevents();
            
        };
        
        object.getgrid = function(id) {
            if ($array !== undefined)
                for (i = 0; i < $array.length; i++)
                    if ($array[i].name === id)
                        return $array[i];
                
        };
        
        object.getcoord = function() {
            dom = $("#" + this.id);
            this.left = dom.offset().left;
            this.top = dom.offset().top;
        };
        
        object.getsize = function() {
            dom = $("#" + this.id);
            this.height = dom.outerHeight();
            this.width = dom.outerWidth();
        };
        
        object.init = function() {
            
            this.grid = object.getgrid(object.popupid);
            this.drop = false;
            this.getcoord();
            this.getsize();
            
            if (this.keyvalue !== null)
            {
                i = this.grid.locate(this.keyfield, this.keyvalue);
                object.change(false, false);
            }
            
        };
        
        object.cascadefilter = function(fieldname, value) {
            
            //input = object.grid.algrid.find(".cascade input").first();
            //input.attr("fieldname", fieldname);
            //input.val(value);
            object.grid.setcolfilter(fieldname, value, 3);
            object.grid.runfilter();
            
        };
        
        object.setnull = function() {
            object.input.val(null);
            object.inputform.val(null);
        };
        
        object.cascad = function() {
            var control;
            
            for (j = 0; j < object.cascade.length; j++){
            
                name = object.cascade[j].control;
                controlfield = object.cascade[j].controlfield;
                field = object.cascade[j].controlfield;
                
                for (i = 0; i < alcombobox_list.length; i++)
                    if (name === alcombobox_list[i].id)
                        control = alcombobox_list[i];

                if (control !== undefined)
                {   control.setnull(); 
                    control.cascadefilter(controlfield, object.grid.filterdata[object.grid.focusedindex][field]);
                }
            }
        };
        
        
        
        object.open = function() {
            if (typeof $array != "undefined")
                for (var i = 0; i < $array.length; i++)
                    if ($array[i].name === this.popupid)
                        this.grid = $array[i];
            
            
            if (!object.drop)
            {
                this.getcoord();
                this.getsize();
                
                
                this.popup.css({
                    "display": "block",
                    "position": "absolute",
                    //"top": (object.top + object.height - 1),
                    //"left": object.left,
                    "z-index": 5000
                });
                
                this.popup.offset({top: object.top + object.height - 1, left: object.left});
                
                object.drop = true;
                
                object.grid.combobox = object;
                object.input.focus();
                object.input.select();
            }
        };
        
        object.close = function(mes) {
            if (this.drop)
            {
                this.popup.css({
                    "display": "none",
                    "position": "absolute",
                    "top": this.top + this.height - 1,
                    "left": this.left,
                    "z-index": 5000
                });
                this.drop = false;
            }
        };
        
        object.addclickevent = function() {
             
            this.dropdownbutton.click(function(){
                
                if (object.drop)
                    object.close();
                else {
                    if(!$(this).hasClass('disabled'))
                        object.open();
                }

            });
        };
        
        object.addkeyup = function() {
            this.input.keyup(function(event){
                
                
                if (event.keyCode === 38)
                {
                    fi = object.grid.focusedindex;
                    if ((fi - 1) > 0)
                        object.grid.changepos(fi-1);
                    object.change(false);
                    
                }
                
                if (event.keyCode === 40)
                {
                    fi = object.grid.focusedindex;
                    if ((fi + 1) < object.grid.filterdata.length)
                        object.grid.changepos(fi + 1);
                    object.change(false);
                    
                }
                
                if ((!object.drop) && (event.keyCode !== 40) && (event.keyCode !== 38))
                    object.open();
                
                if (event.keyCode === 13)
                {
                    if (object.input.val() !== "")
                        object.change(true);
                    else
                        object.change(true, true);
                }
                else
                {    
                    if ((event.keyCode !== 40) && (event.keyCode !== 38))
                        object.grid.findforcombobox(object.fieldname, object.input.val());
                }
                
                
            });
        };
        
        object.onafterchange2 = function(){
            eval(object.onafterchange);
        };
        
        
        object.change = function(close, clear) {
            if (clear !== true)
            {
                if (object.grid.filterdata.length > 0)
                {
                    this.keyvalue = object.grid.filterdata[object.grid.focusedindex][object.keyfield];
                    this.input.val(object.grid.filterdata[object.grid.focusedindex][object.fieldname]);
                    this.inputform.val(object.grid.filterdata[object.grid.focusedindex][object.keyfield]);
                    this.alcombobox.find('.filterajax').val(object.grid.filterdata[object.grid.focusedindex][object.keyfield]);
                }
            }
            else
            {
                this.inputform.val("");
                this.alcombobox.find('.filterajax').val("");
            }
            
            if (close)
                this.close();
            
            if (object.locate !== null)
            {
                locatecontrolfield = object.locate.locatecontrolfield;
                locatefield = object.locate.locatefield;
                value = object.grid.filterdata[object.grid.focusedindex][locatefield];
                locategrid = object.getgrid(object.locate.locatecontrol);
                locategrid.locate(locatecontrolfield, value);
            }
            
            if (object.filter !== null)
            {
                filterfield = object.filter.filterfield;
                filtercontrol = object.filter.filtercontrol;
                filtercontrolfield = object.filter.filtercontrolfield;
                if (clear !== true)
                    value = object.grid.filterdata[object.grid.focusedindex][filterfield];
                else
                    value = "";
                
                filtergrid = object.getgrid(object.filter.filtercontrol);
                filtergrid.algrid.find(".fullheader input").each(function(){
                    if ($(this).attr("fieldname") === filtercontrolfield)
                        $(this).val(value);
                });
                filtergrid.runfilter();
            }
            
            if (object.filterajax !== null)
            {
                
                for(key in object.filterajax)
                {
                    name = object.filterajax[key]["grid"];
                    control = object.getgrid(name);
                    control.runfilter();
                }
            }
            
            if (object.cascade !== null)
            {
                object.cascad();
            }
            
            object.onafterchange2();
            
            /*
            if (typeof window['clientfunction'] == 'function')
                clientfunction();
            */
        };
        
        object.addfocusevents = function() {
            object.input.focusin(function(){
                object.alcombobox.addClass("alcomboboxfocused");
            });
            object.input.focusout(function(){
                    object.alcombobox.removeClass("alcomboboxfocused");
                
            });
        };
        
        object.addevents();
    });

});


