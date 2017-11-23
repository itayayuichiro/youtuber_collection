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
		$result_array = $this->Youtuber->getAverage($_GET['id']);
        $this->set('row',$this->Youtuber->getYoutuberDetail($_GET['id'])[0]['youtubers']);
        $this->set('result',$this->Youtuber->getPopularMovies($_GET['id']));
        $kikaku_point = $result_array[0][0]['kikaku_point'];
		$movie_point = $result_array[0][0]['movie_point'];
        $this->set('kikaku_point', $kikaku_point);
        $this->set('movie_point', $movie_point);
//        $this->set('youtuber_detail', $this->Youtuber->find('first',['conditions' => ['id'=>$_GET['id']]]));
	}
	public function movies(){
		if ($_GET['all']==true) {
	        $this->set('result', $this->Youtuber->getMoviesAll($_GET['youtuber_id']));
		}else{
	        $this->set('result', $this->Youtuber->getMovies($_GET['youtuber_id']));
		}
	}
	public function movie(){
		if ($_GET['all']==true) {
	        $this->set('result', $this->Youtuber->getMoviesAll($_GET['youtuber_id']));
		}else{
	        $this->set('result', $this->Youtuber->getMovies($_GET['youtuber_id']));
		}
	}

}
