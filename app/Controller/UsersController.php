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
        $id = uniqid("ID");
        mb_language("japanese");
        mb_internal_encoding("UTF-8");
        //日本語メール送信
        $to = $_POST['data']['User']['email'];
        $subject = "Youtuberコレクション登録";
        $body = "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n■　登録メールアドレスのお知らせ\n━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n登録メールアドレス：".$to."\n登録パスワード：".$_POST['data']['User']['password']."\n\n下記アドレスからログインが可能です。\n\n\nhttp://ity-y.sakura.ne.jp/youtuber_collection/login\n\n\n【重要】\nメールアドレスはYoutuberコレクションを利用するにあたり、大切な情報となります。\n紛失されないようメモにお控えいただき、常に送受信が行えるようにしてください。\n";
        $from = "info@mail.youtuber_collection.com";
        mb_send_mail($to,$subject,$body,"From:".$from);
        $username = $_POST['data']['User']['email'];
        $password = $_POST['data']['User']['password'];
        $result = $this->User->getUserId ($username,$password);
        $this->Session->write('logined', true);
        $this->Session->write('username', $username);
        $this->Session->write('userid', $result['User']['id']);
        $this->redirect(array('controller' => 'youtubers', 'action' => 'index'));
	    }
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
			$userid = $this->Session->read('email');
			$this->User->saveReview($userid,$this->request->data);
		    	$this->redirect(array('controller' => 'youtubers', 'action' => 'detail?id='.$this->request->data['channel_id']));

		}else{
	        $this->loadModel('Youtuber');
	        $this->set('result', $this->Youtuber->getYoutuber($_GET['youtuber_id']));
		}
	}


}
