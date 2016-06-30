<script>
    Aliton.Links.push({
        Out: "DemandsGrid",
        In: "edContact",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "Contacts",
        Name: "edContact_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    Aliton.Links.push({
        Out: "DemandsGrid",
        In: "edDemandText",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "DemandText",
        Name: "edDemandText_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
</script>
<table>
    <tbody>
        <tr>
            <td>Контакт</td>
        </tr>
        <tr>
            <td>
                <?php
                    
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edContact',
                        'Width' => 350,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                     
                     
                ?>
            </td>
        </tr>
        <tr>
            <td>Неисправность</td>
        </tr>
        <tr>
            <td>
                <?php
                    
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                        'id' => 'edDemandText',
                        'Width' => 550,
                        'Height' => 100,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                
                ?>
                 
                 
            </td>
        </tr>
    </tbody>
</table>

