<h1>新規登録</h1>
<?php print(
  $this->Form->create('User') .
  $this->Form->input('username',array('class'=>'form-control','label' => 'ユーザー名')) .
  $this->Form->input('password',array('class'=>'form-control','label' => 'パスワード')) .
  $this->Form->end('Submit',array('class'=>'form-control btn'))
); ?>
