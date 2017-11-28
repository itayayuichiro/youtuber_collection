<?php


App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public function add(){
	   if($this->request->is('post') && $this->User->save($this->request->data)){
	      //ログイン
	      //$this->request->dataの値を使用してログインする規約になっている
	      $this->Auth->login();
	      $this->redirect('index');
	    }//		$this->User->insertUserData($_POST['id'],$_POST['username'],$_POST['password']);
	}
}
