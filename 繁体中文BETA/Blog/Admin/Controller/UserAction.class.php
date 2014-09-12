<?php

class UserAction extends CommonAction {   

		public function index(){
			$user=M('Admin');
			p($user);
		   $data=$user->find($id);
            $this->user=$data;	
		    $this->display('Index/password');
		   }

	

	






	
		public function update(){
			$User=M('Admin');
			$data['id']=$_POST['id'];
			$data['nickname']=$_POST['nickname'];
			$data['password']=md5($_POST['password']);
			$count=$User->save($data);
			if($count>0){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}
	
	
  
  
  
  
      
  
  
  
  
  
  
  
  
  
  
  
  
  
}











