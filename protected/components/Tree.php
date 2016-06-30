<?php

class Tree {

	
	
	static function getTree($table, $lvl, $params = array(), &$_tree=array()) {
//		$model= new $table;
		$not_del = "";
		if(isset($params['notDel'])) {
			$not_del = ' and '.$params['notDel'];
		}
		
		$data = Yii::app()->db->createCommand()
				->select("{$params['id']}, {$params['name']}")
				->from($table)
				->where("{$params['parent']}=:{$params['parent']}".$not_del,
					array(":{$params['parent']}"=>$lvl))
				->queryAll();

	
		

		
		for ($i=0; $i < count($data); $i++) { 
			$_tree[$i] = array(
				'text'=>$data[$i][$params['name']],
				'htmlOptions'=>array(
					'data-id'=>$data[$i][$params['id']],
					),
				);
			//array_push($_tree, array('text'=>'dfg'));

			$count = Yii::app()->db->createCommand()
				->select('COUNT(*)')
				->from($table)
				->where("{$params['parent']}=:{$params['parent']}".$not_del,
					array(":{$params['parent']}"=>$data[$i][$params['id']]))
				->queryScalar();

			if($count>0) {

				$_tree[$i]['children']=array();
				self::getTree($table, $data[$i][$params['id']], array(
				    	'id'=>$params['id'],
				    	'parent'=>$params['parent'],
				    	'name'=>$params['name'],
						'notDel'=>(isset($params['notDel']) && $params['notDel'] != null) ? $params['notDel'] : "",
				    	), 
					$_tree[$i]['children']
				);

			} 
		}
		
		
return $_tree;

	}

}

