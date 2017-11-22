<?php

App::uses('AppModel', 'Model');

class Youtuber extends AppModel {
	public $name = 'Youtuber';
	public function getTopYoutuber(){
		$this->Youtuber= new Youtuber();
		$data = $this->Youtuber->find('all',['limit' => 9]);
		print_r($data);
		return $this->Youtuber->find('all',['limit' => 9]);
	}
}