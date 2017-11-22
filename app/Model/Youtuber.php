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
	public function getAverage($id){
		$this->Youtuber = new Youtuber();
		$sql = "select avg(kikaku_point) as kikaku_point,avg(movie_point) as movie_point from evaluations where channel_id = ".$id;
		echo $sql;
		return $this->Youtuber->query($sql);
	}
	public function getTopYoutuber(){
		$this->Youtuber= new Youtuber();
		return $this->Youtuber->find('all',['limit' => 9]);
	}
}