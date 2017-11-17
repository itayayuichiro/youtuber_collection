<?php

App::uses('AppModel', 'Model');

class Youtuber extends AppModel {
	public $name = 'Youtuber';
	public function getAllYoutuber(){
		$data = $this->find('all');
		return $data;
	}
	public function getAllOfficeList(){
		$data = $this->find('all',['limit' => 3]);
		return $data;
	}
	public function getTopYoutuber(){
		$this->Youtuber= new Youtuber();
		return $this->Youtuber->find('all',['limit' => 9]);
	}
}