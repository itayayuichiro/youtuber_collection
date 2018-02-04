<h1>ログイン</h1>
<?php
print(
  $this->Form->create('User') .
  $this->Form->input('email',array('class'=>'form-control','label' => 'メールアドレス')) .
  $this->Form->input('password',array('class'=>'form-control','label' => 'パスワード'))
);
?>

<br>
<?php
print(
  $this->Form->button('ログイン', array('type' => 'submit','class'=>'form-control btn btn-success'))
);
?>
<br>
<a href="/youtuber_collection/users/add" title="">会員登録をしていない方はこちら</a>
