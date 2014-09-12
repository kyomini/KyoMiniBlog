<?php
namespace Home\Model;
use Think\Model;
use Think\Model\RelationModel; 


class CommentModel extends RelationModel{
    protected $_link = array(
		     'Article'=>array(
			  'mapping_type'=> self::BELONGS_TO,
			  'class_name'=>'Comment',
			  'mapping_name'=>'Comment',
              'foreign_key'=>'aid',
              'mapping_fields'=>'couname,email,content,time',
			  'as_fields'=>'couname,email,content,time',

			 ),

	);
	
	
	
	
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
	
      



?>