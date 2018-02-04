<h1>新規登録</h1>
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
  $this->Form->button('会員登録', array('type' => 'submit','class'=>'form-control btn btn-success'))
);
?>
<br>
<a href="/youtuber_collection/login" title="">会員登録が済んでる方はこちらからログイン</a>
