$(document).ready(function(){
    
    function geTableResult(html)
    {
        var $idx = 0;
        
        $str = html;
        $start = -1;
        
        $idx = $str.indexOf('<div id="'+$id+'">');
        $start = $str.indexOf('<table>', $idx);
        
        if ($start >= 0)
        {
            $end = $str.indexOf('</table>', $start) + 8;
            $str = $str.substring($start, $end);
        }
        else
            $str = '';
        
        return $str;
    }
    
    var $selector = '#' + $id + ' #input';
    var $selectot_drop = '#' + $id + ' #drop'
    
    $($selector + ' input').keyup(function(){
        
        $val = $($selector + ' input').val();
        
        
        
        $.ajax({
                        url: $url + '&f='+$val,
                        
                        success: function(data){
                            
                            $table = geTableResult(data);
                            $($selectot_drop + ' table').html($table);                            
                        }  
                    });
    });
    
    // Обработка клика по нажатию на строку в выпадающем списке
    jQuery(function(){
        $('body').on('click', $selectot_drop + ' table tr', function(){
            
            $row = $(this);
            
            $($selector + ' input').val($row.attr('name'));
            
            $('#' + $id).attr('val', $row.attr('id'));
        });
    });
    
});


