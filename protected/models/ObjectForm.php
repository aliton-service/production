<?php

class ObjectForm extends CFormModel
{
    public $Object_id;
       
    static public function getAllAddress()
    {
        /* Выводим список адресов */
        $Command = Yii::app()->db->createCommand(''
                . "Select "
                . "     o.Object_id, " 
                . "     a.Addr + case when o.Doorway is null then '' else ', п. ' + o.Doorway end Addr "
                . "From Objects o inner join ObjectsGroup og on (o.ObjectGr_id = og.ObjectGr_id) " 
                . "     inner join Addresses_v a on (o.Address_id = a.Address_id) "
                . "     left join Contracts_v c on ( "
		. "                                 og.ObjectGr_Id = C.ObjectGr_Id "
                . "                                 and dbo.truncdate(getdate()) between C.ContrSDateStart and C.ContrSDateEnd "
                . "                                 and isNull(c.DocType_id, 4) = 4 "
		. "				) "
                . "Where o.DelDate is Null "
                . "     and og.DelDate is Null "
                . "     and o.Doorway <> 'Общее' "
                . "Order by a.Addr");
        
        return $Command->queryAll();
        
    }
}

