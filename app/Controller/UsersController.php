<?php


App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public function add(){
	   if($this->request->is('post') && $this->User->save($this->request->data)){
	      //ログイン
	      //$this->request->dataの値を使用してログインする規約になっている
	      //$this->Auth->login();
	      $this->redirect('login');
	    }//		$this->User->insertUserData($_POST['id'],$_POST['username'],$_POST['password']);
	}
	public function login(){
		if ($this->request->is ( 'post' )) {
			$username = $_POST['data']['User']['username'];
			$password = $_POST['data']['User']['password'];
			if ($this->User->login ($username,$password)) {
		    	//$this->redirect('login');
		    	$this->Session->write('logined', true);
		    	$this->redirect(array('controller' => 'youtubers', 'action' => 'index'));
			}else{
				echo "<script>alert('ログイン失敗')</script>";
		    	$this->redirect('login');
			}
		}
	}
}
