<?php


App::uses('AppController', 'Controller');

class YoutubersController extends AppController {
	public function index(){
        $this->set('youtubers_data', $this->Youtuber->find('all',['limit' => 9]));
        $this->loadModel('Office');
        $this->set('offices_data', $this->Office->find('all'));
	}
	public function detail(){
		$this->layout = 'default';
        $this->set('youtuber_detail', $this->Youtuber->find('first',['conditions' => ['id'=>$_GET['id']]]));
	}

}
