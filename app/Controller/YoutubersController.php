<?php


App::uses('AppController', 'Controller');

class YoutubersController extends AppController {
	public function index(){
        $this->set('youtubers_data', $this->Youtuber->find('all',['limit' => 3]));
        $this->loadModel('Office');
        $this->set('offices_data', $this->Office->find('all',['limit' => 3]));
	}
}
