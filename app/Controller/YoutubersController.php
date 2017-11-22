<?php


//App::uses('AppController', 'Controller');

class YoutubersController extends AppController {
	public function index(){
        $this->set('youtubers_data', $this->Youtuber->getAllYoutuber());
	}
	public function top(){
        $this->set('youtubers_data', $this->Youtuber->getTopYoutuber());
        $this->loadModel('Office');
        $this->set('offices_data', $this->Office->find('all'));
	}
	public function detail(){
		$this->layout = 'default';
		$avgs = $this->Youtuber->getAverage($_GET['id']);
		print_r($avg);
        $this->set('youtuber_avg',$avgs);
        $result_array = mysql_fetch_assoc($avgs);
        $kikaku_point = $result_array['kikaku_point'];
		$movie_point = $result_array['movie_point'];
        $this->set('kikaku_point', $kikaku_point);
        $this->set('movie_point', $movie_point);

//        $this->set('youtuber_detail', $this->Youtuber->find('first',['conditions' => ['id'=>$_GET['id']]]));
	}

}
