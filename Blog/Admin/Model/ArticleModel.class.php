<?php
namespace Admin\Model;
use Think\Model;
use Think\Model\RelationModel; 


class ArticleModel extends RelationModel{
    protected $_link = array(
		     'Category'=>array(
			  'mapping_type'=> self::BELONGS_TO,
			  'class_name'=>'category',
			  'mapping_name'=>'category',
              'foreign_key'=>'cid',
              'mapping_fields'=>'cname',
			  'as_fields'=>'cname',

			 ),

	);}
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
      



?>