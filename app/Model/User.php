<?php
App::uses('AppModel', 'Model');
class User extends AppModel {
  public $validate = array(
    'email' => array(
      array(
        'rule' => 'isUnique', //重複禁止
        'message' => '既に使用されている名前です。'
      ),
      array(
        'rule' => array('between', 2, 32), //2～32文字
        'message' => '名前は2文字以上32文字以内にしてください。'
      )
    ),
    'password' => array(
      array(
        'rule' => 'alphaNumeric',
        'message' => 'パスワードは半角英数字にしてください。'
      ),
      array(
        'rule' => array('between', 8, 32),
        'message' => 'パスワードは8文字以上32文字以内にしてください。'
      )
    )
  );
    public function login($username,$password){
        return $this->find('count',array( 'conditions' => array('email' => $username,'password' => $password)));
    }
    public function getUserId($username,$password){
        return $this->find('first',array( 'conditions' => array('email' => $username,'password' => $password)));
    }
  
    public function insertUserData($id,$username,$password){
        $this->save(['id'=>$id,'email'=>$username,'password'=>$password]);
    }
    public function saveReview($userid,$data){
      //$this->User = new User();
      $sql = "INSERT INTO `evaluations` (`user_id`,`channel_id`, `hindo`, `kikaku_point`, `movie_point`, `comment`)VALUES(".$userid.",".$data['channel_id'].",'".$data['hindo']."',". $data['kikaku_num'].",".$data['movie_num'].",'".$data['comment']."')";
//      echo $sql;
      $this->query($sql);
    }
}