<?php

App::uses('AppModel', 'Model');

class Youtuber extends AppModel {
	public $name = 'Youtuber';
	public function getAllYoutuber(){
		$this->Youtuber= new Youtuber();
		return $this->Youtuber->find('all',['limit' => 21]);
	}
    public function getYoutuber($youtuber_id){
        return $this->find('first',array( 'conditions' => array('id' => $youtuber_id)));
    }
	public function getAllOfficeList(){
		$data = $this->find('all',['limit' => 3]);
		return $data;
	}
	public function getOfficeYoutuber($office){
		$this->Youtuber = new Youtuber();
		$sql = "select * from youtubers where office like '%".$office."%'";
		return $this->Youtuber->query($sql);
	}
	public function getAverage($id){
		$this->Youtuber = new Youtuber();
		$sql = "select avg(kikaku_point) as kikaku_point,avg(movie_point) as movie_point from evaluations where channel_id = ".$id;
		return $this->Youtuber->query($sql);
	}
	public function getYoutuberDetail($id){
		$this->Youtuber = new Youtuber();
		$sql = "select * from youtubers where id = ".$_GET['id'];
		return $this->Youtuber->query($sql);
	}
	public function getPopularMovies($id){
		$this->Youtuber = new Youtuber();
		$sql = "select * from popular_movie where youtuber_id = ".$id;
		return $this->Youtuber->query($sql);
	}
	public function getTopYoutuber(){
		$this->Youtuber= new Youtuber();
		return $this->Youtuber->find('all',['limit' => 9]);
	}
	public function getMovies($id){
		$this->Youtuber = new Youtuber();
		$sql = "select * from movies where youtuber_id = ".$id." limit 21";
		return $this->Youtuber->query($sql);
	}
	public function getMovie($id){
		$this->Youtuber = new Youtuber();
		$sql = "select * from movies INNER JOIN youtubers ON movies.youtuber_id = youtubers.id where movies.id = ".$id;
		return $this->Youtuber->query($sql);
	}
	public function getMoviesAll($id){
		$this->Youtuber = new Youtuber();
		$sql = "select * from movies where youtuber_id = ".$id."";
		return $this->Youtuber->query($sql);
	}
	public function searchYoutubers($name){
		$this->Youtuber = new Youtuber();
		$sql = "select * from youtubers where channel_name like  '%".$name."%'";
//		return $this->Youtuber->find(array('conditions' => array('youtubers.channel_name LIKE' => '%'. $name. '%')));
		return $this->Youtuber->query($sql);
	}
}