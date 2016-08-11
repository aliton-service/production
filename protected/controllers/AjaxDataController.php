<?php

class AjaxDataController extends Controller
{
    
    public function actionDataJQXSimple($ModelName) {
        $model = new $ModelName();
        
        
        if(isset($_POST['Filters']))
            $Result = $model->Find(array(), $_POST['Filters']);
        else if (isset($_GET['Filters']))
            $Result = $model->Find(array(), $_GET['Filters']);
        else
            $Result = $model->Find(array());
        
        $CountRow = $model->getCountAllRow();
        
        $Data = array();
        
        $Data[] = array(
            'TotalRows' => $CountRow,
            'Rows' => $Result
        );
        echo json_encode($Data);
    }
    
    public function actionDataJQX($ModelName) {
        $Model = new $ModelName();
        //$CountRow = $Model->getCountAllRow();
        
        if (isset($_GET['pagenum']))
            $pagenum = $_GET['pagenum'] + 1;
        else if (isset($_POST['pagenum']))
            $pagenum = $_POST['pagenum'] + 1;
        else $pagenum = 1;
        
        
        //$pagenum = $_GET['pagenum'] + 1;
        if (isset($_GET['pagesize']))
            $pagesize = $_GET['pagesize'];
        else if (isset($_POST['pagesize']))
            $pagesize = $_POST['pagesize'];
        else $pagesize = 200;
        
        
        $InternalFilters = array();
        
        if (isset($_POST['Filters']))
            array_push($InternalFilters, $_POST['Filters'][0]);
        
        $Sort = array();
        
        $where = '';
        // filter data.
        if (isset($_GET['filterscount']))
	{
            $filterscount = $_GET['filterscount'];
            if ($filterscount > 0)
            {
		//$where = " WHERE (";
                $where = " (";
		$tmpdatafield = "";
		$tmpfilteroperator = "";
		$valuesPrep = "";
		$values = [];
		for ($i = 0; $i < $filterscount; $i++)
		{
                    // get the filter's value.
                    $filtervalue = $_GET["filtervalue" . $i];
                    // get the filter's condition.
                    $filtercondition = $_GET["filtercondition" . $i];
                    // get the filter's column.
                    $filterdatafield = $_GET["filterdatafield" . $i];
                    // get the filter's operator.
                    $filteroperator = $_GET["filteroperator" . $i];
			
                    if ($tmpdatafield == "")
                    {
			$tmpdatafield = $filterdatafield;
                    }
                    else if ($tmpdatafield <> $filterdatafield)
                    {
                        $where.= ")AND(";
                    }
                    else if ($tmpdatafield == $filterdatafield)
                    {
			if ($tmpfilteroperator == 0)
			{
                            $where.= " AND ";
                        }
			else $where.= " OR ";
                    }
			
                    // build the "WHERE" clause depending on the filter's condition, value and datafield.
                    switch ($filtercondition)
                    {
                        case "DATE_EQUAL":
                                $filterdatafield = "dbo.truncdate(" . $filterdatafield . ")";
                                $condition = " = ";
                                $value = "'{$filtervalue}'";
                                break;
                        case "DATE_NOT_EQUAL":
                                $filterdatafield = "dbo.truncdate(" . $filterdatafield . ")";
                                $condition = " <> ";
                                $value = "'{$filtervalue}'";
                                break;
                        case "DATE_LESS_THAN":
                                $filterdatafield = "dbo.truncdate(" . $filterdatafield . ")";
                                $condition = " < ";
                                $value = "'{$filtervalue}'";
                                break;
                        case "DATE_LESS_THAN_OR_EQUAL":
                                $filterdatafield = "dbo.truncdate(" . $filterdatafield . ")";
                                $condition = " <= ";
                                $value = "'{$filtervalue}'";
                                break;
                        case "DATE_GREATER_THAN":
                                $filterdatafield = "dbo.truncdate(" . $filterdatafield . ")";
                                $condition = " > ";
                                $value = "'{$filtervalue}'";
                                break;
                        case "DATE_GREATER_THAN_OR_EQUAL":
                                $filterdatafield = "dbo.truncdate(" . $filterdatafield . ")";
                                $condition = " >= ";
                                $value = "'{$filtervalue}'";
                                break;
                        case "DATE_NULL":
                                $condition = " IS NULL ";
                                $value = "";
                                break;
                        case "CONTAINS":
                                $condition = " LIKE ";
                                $value = "'%{$filtervalue}%'";
                                break;
                        case "DOES_NOT_CONTAIN":
                                $condition = " NOT LIKE ";
                                $value = "'%{$filtervalue}%'";
                                break;
                        case "STR_EQUAL":
                                $condition = " = ";
                                $value = "'{$filtervalue}'";
                                break;
                        case "EQUAL":
                                $condition = " = ";
                                $value = $filtervalue;
                                break;
                        case "STR_NOT_EQUAL":
                                $condition = " <> ";
                                $value = "'{$filtervalue}'";
                                break;
                        case "NOT_EQUAL":
                                $condition = " <> ";
                                $value = $filtervalue;
                                break;
                        case "GREATER_THAN":
                                $condition = " > ";
                                $value = $filtervalue;
                                break;
                        case "LESS_THAN":
                                $condition = " < ";
                                $value = $filtervalue;
                                break;
                        case "GREATER_THAN_OR_EQUAL":
                                $condition = " >= ";
                                $value = $filtervalue;
                                break;
                        case "LESS_THAN_OR_EQUAL":
                                $condition = " <= ";
                                $value = $filtervalue;
                                break;
                        case "STARTS_WITH":
                                $condition = " LIKE ";
                                $value = "'{$filtervalue}%'";
                                break;
                        case "ENDS_WITH":
                                $condition = " LIKE ";
                                $value = "'%{$filtervalue}'";
                                break;
                        case "NULL":
                                $condition = " IS NULL ";
                                $value = "";
                                break;
                        case "NOT_NULL":
                                $condition = " IS NOT NULL ";
                                $value = "";
                                break;
                    }
			
                    $where.= " " . $filterdatafield . $condition . $value;
                                        
		
                    if ($i == $filterscount - 1)
                    {
			$where.= ")";
                    }
		
                    $tmpfilteroperator = $filteroperator;
                    $tmpdatafield = $filterdatafield;
		}
		
                array_push($InternalFilters, $where);
            }
        }
            
        if (isset($_GET['sortdatafield'])) {
            $sortfield = $_GET['sortdatafield'];
            $sortorder = $_GET['sortorder'];
	
            if ($sortfield != NULL) {
		if ($sortorder == "desc") {
                    array_push($Sort, "{$sortfield} DESC");
		} else if ($sortorder == "asc") {
                    array_push($Sort, "{$sortfield} ASC");
		}
            }
	}
        
        
        $Result = $Model->FindAjax($pagenum, $pagesize, $Sort, $InternalFilters, array());
        
        $CountRow = $Result['Details']['Count'];
        
        $Data = array();
        
        $Data[] = array(
            'TotalRows' => $CountRow,
            'Rows' => $Result['Data'],
            'Where' => $where,
            'InternalFilters' => $InternalFilters,
        );
        echo json_encode($Data);
    }
    
    public function actionData($ModelName) {
        
        $pagenum = $_GET['pagenum'];
        $pagesize = $_GET['pagesize'];
        $start = $pagenum * $pagesize;
        $uery = "SELECT SQL_CALC_FOUND_ROWS CompanyName, ContactName, ContactTitle, Address, City, Country FROM customers LIMIT ?,?";
        $result = $mysqli->prepare($query);
        $result->bind_param('ii', $start, $pagesize);
        $result->execute();
        /* bind result variables */
        $result->bind_result($CompanyName, $ContactName, $ContactTitle, $Address, $City, $Country);
        /* fetch values */
        while ($result->fetch())
	{
            $customers[] = array(
                    'CompanyName' => $CompanyName,
                    'ContactName' => $ContactName,
                    'ContactTitle' => $ContactTitle,
                    'Address' => $Address,
                    'City' => $City,
                    'Country' => $Country
            );
	}
        $result = $mysqli->prepare("SELECT FOUND_ROWS()");
        $result->execute();
        $result->bind_result($total_rows);
        $result->fetch();
        $data[] = array(
                'TotalRows' => $total_rows,
                'Rows' => $customers
        );
        echo json_encode($data);
    }
    
    public function actionLoadFirst()
    {
        if (isset($_POST))
        {
            $ModelName = $_POST["ModelName"];
            $Id = $_POST["Id"];
            
            $Filters = array();
            if (isset($_POST["Filters"]))
                $Filters = $_POST["Filters"];
            
            $Sort = array();
            if (isset($_POST["Sort"]))
                $Sort = $_POST["Sort"];
            
            $Process_ID = 0;
            if (isset($_POST["Process_ID"]))
                $Process_ID = $_POST["Process_ID"];
            
            $Model = new $ModelName();
            $Result = $Model->FindAjaxFirst($Filters, $Sort);
            $Result["Id"] = $Id;
            $Result["Process_ID"] = $Process_ID;
                    
            print_r(json_encode($Result));
        }
    }
    
    public function actionLoadData()
    {
        if (isset($_POST))
        {
            $ModelName = $_POST["ModelName"];
            $Page = $_POST["CurrentPage"];
            $PageSize = $_POST["CurrentPageSize"];
            $Id = $_POST["Id"];
            
            $Sort = array();
            if (isset($_POST["Sort"]))
                $Sort = $_POST["Sort"];
            
            $Draw = true;
            if (isset($_POST["Draw"]))
                $Draw = $_POST["Draw"];
            
            $InternalFilters = array();
            if (isset($_POST["InternalFilters"]))
                $InternalFilters = $_POST["InternalFilters"];
            
            $ExternalFilters = array();
            if (isset($_POST["ExternalFilters"]))
                $ExternalFilters = $_POST["ExternalFilters"];
            
            $Model = new $ModelName();
            
            if ($ModelName === 'RepairDocuments') {
                foreach ($InternalFilters as $Key => $Value) {
                    if (substr($Value, 0, 1) === '#') {
                        $Value = substr($Value, 1, strlen($Value));
                        $Model->Repr_id = $Value;
                        $Model->Query->from = str_replace('#Repr_id', $Value, $Model->Query->from);
                        $InternalFilters[$Key] = '(1 = 1)';
                    }
                    
                }
            }
            
            if (isset($_POST['params']) && !empty($_POST['params'])) {
                $Model->setParams($_POST['params']);
            }
            
            $Process_ID = 0;
            if (isset($_POST["Process_ID"]))
                $Process_ID = $_POST["Process_ID"];
            
            $PageNumber = $Page;
            if (isset($_POST["PageNumber"]))
                $PageNumber = $_POST["PageNumber"];
            
            $CurrentRow = -1;
            if (isset($_POST["CurrentRow"]))
                $CurrentRow = $_POST["CurrentRow"];
            
            $Result = $Model->FindAjax($Page, $PageSize, $Sort, $InternalFilters, $ExternalFilters);
            $Result["Id"] = $Id;
            $Result["Process_ID"] = $Process_ID;
            $Result["Draw"] = $Draw;
            $Result["CurrentPage"] = $Page;
            $Result["CurrentPageSize"] = $PageSize;
            $Result["PageNumber"] = $PageNumber;
            $Result["CurrentRow"] = $CurrentRow;
            
            print_r(json_encode($Result));
        }
    }

    public function actionGetDataa()
    {
        if (isset($_POST))
        {
            $ModelName = $_POST["model"];



            $Model = new $ModelName();
            if (isset($_POST['params']) && !empty($_POST['params'])) {
                $Model->setParams($_POST['params']);
            }
            $Result = $Model->Find(array());

            die(json_encode($Result));
        }
    }
    
    public function actionGetData()
    {
        $Obj = $_POST;
        
        if (isset($Obj))
        {
            $ModelName = $Obj["ModelName"];
            if (isset($Obj["Conditions"]))
                $Conditions = $Obj["Conditions"];
            else
                $Conditions = array();
            $Top = $Obj["Top"];
            $Model = new $ModelName();
            foreach($Conditions as $key => $value) {
                $Conditions[$key] = html_entity_decode($value);
            }
            $Result = $Model->Find(array(), $Conditions, $Top);
            print_r(json_encode($Result));
        }
        
    }


    public function actionGetProps($model) {
        $pk = $model->PrimaryKey;
        die(json_encode(array('props' => $model->FindRow(array($model->KeyFiled => $model->$pk)))));
    }


    public function actionCallProc($model) {
        (isset($_POST['SP']) && $SP = $_POST['SP']) || (isset($_POST['params']['SP']) && $SP = $_POST['params']['SP']) || $SP = false;
        if(!$SP) return false;
        $model->callProc($SP);
    }


    public function actionModel() {
        (isset($_POST['table']) && $table = $_POST['table']) || (isset($_POST['params']['table']) && $table = $_POST['params']['table']);
        (isset($_POST['action']) && $action = $_POST['action']) || (isset($_POST['params']['action']) && $action = $_POST['params']['action']);
        (isset($_POST[$table]) && $data = $_POST[$table]) || (isset($_POST['formData']) && $data = $_POST['formData']);

        $model = new $table();
        $model->setProp($data);

        isset($_POST['addparams']) && $params = $_POST['addparams'];

        if(isset($params['action']) && is_array($params['action'])) {
            foreach($params['action'] as $k => $action) {
                is_string($action) && method_exists($model, $action) && $model->$action();
            }
        }
        elseif(isset($params['action']) && is_string($params['action'])) {
            is_string($params['action']) && method_exists($model, $params['action']) && $model->$params['action']();
        }

        switch(strtolower($action)) {
            case 'update_props':
                $this->actionGetProps($model);
                break;
            case 'call_sp':
                $this->actionCallProc($model);
                break;
            default:
                break;
        }
    }
}

