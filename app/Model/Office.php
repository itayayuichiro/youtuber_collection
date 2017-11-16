<?php

App::uses('AppModel', 'Model');
class Office extends Model {
	public function officeListAll(){
		$data = $this->find('all');
		return $data;
	}
}