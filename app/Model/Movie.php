<?php

App::uses('AppModel', 'Model');

class Movie extends Model {
	public function getAllList(){
		$data = $this->find('all');
		return $data;
	}
}