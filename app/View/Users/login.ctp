<h1>ログイン</h1>
<?php
print(
  $this->Form->create('User') .
  $this->Form->input('username',array('class'=>'form-control','label' => 'ユーザー名')) .
  $this->Form->input('password',array('class'=>'form-control','label' => 'パスワード')) .
  $this->Form->end('Submit')
);
?>
<a href="/youtuber_collection/users/add" title="">会員登録をしていない方はこちら</a>
