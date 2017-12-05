<?php


App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public function beforeFilter() {
    }
	public function add(){
    	if ($this->Session->read('logined')) {
			$this->redirect(array('controller' => 'youtubers', 'action' => 'index'));			
		}
	   if($this->request->is('post') && $this->User->save($this->request->data)){
	      //ログイン
	      //$this->request->dataの値を使用してログインする規約になっている
	      //$this->Auth->login();
	      $this->redirect('login');
	    }//		$this->User->insertUserData($_POST['id'],$_POST['username'],$_POST['password']);
	}
	public function login(){
    	if ($this->Session->read('logined')) {
			$this->redirect(array('controller' => 'youtubers', 'action' => 'index'));			
		}
		if ($this->request->is ( 'post' )) {
			$username = $_POST['data']['User']['username'];
			$password = $_POST['data']['User']['password'];
			if ($this->User->login ($username,$password)) {
		    	$result = $this->User->getUserId ($username,$password);
		    	$this->Session->write('logined', true);
		    	$this->Session->write('username', $username);
		    	$this->Session->write('userid', $result['User']['id']);
		    	$this->redirect(array('controller' => 'youtubers', 'action' => 'index'));
			}else{
				echo "<script>alert('ログイン失敗')</script>";
//		    	$this->redirect('login');
			}
		}
	}
	public function logout(){
		$this->Session->write('logined', false);
    	$this->redirect('login');
	}
	public function review(){
		if ($this->Session->read('logined')==false) {
	    	$this->redirect('login');
		}
		if ($this->request->is ( 'post' )) {
			$userid = $this->Session->read('userid');
			$this->User->saveReview($userid,$this->request->data);
		    	$this->redirect(array('controller' => 'youtubers', 'action' => 'detail?id='.$this->request->data['channel_id']));

		}else{
	        $this->loadModel('Youtuber');
	        $this->set('result', $this->Youtuber->getYoutuber($_GET['youtuber_id']));
		}

	}
}
