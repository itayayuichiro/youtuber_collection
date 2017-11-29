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
			if ($this->User->login ($_POST['data']['User']['username'],$_POST['data']['User']['password'])) {

			}else{

			}
		}
	

	}
}
