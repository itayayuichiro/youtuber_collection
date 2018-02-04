<?php


App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public function beforeFilter() {
    }
	public function add(){
    if ($this->Session->read('logined')) {
      $id = uniqid("ID");
      mb_language("japanese");
      mb_internal_encoding("UTF-8");
      //日本語メール送信
      $to = $_POST['data']['User']['email'];
      $subject = "Youtuberコレクション仮登録";
      $body = "仮登録が完了しました、URLをクリックした本登録を完了させてください\nhttp://ity-y.sakura.ne.jp/youtuber_collection/id=".$id;
      $from = "keiji@example.com";

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
			$username = $_POST['data']['User']['email'];
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
	public function mypage(){
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
