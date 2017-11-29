<h1>ログイン</h1>
<?php print(
  $this->Form->create('User') .
  $this->Form->input('username') .
  $this->Form->input('password') .
  $this->Form->end('Submit')
); ?>
<a href="/youtuber_collection/users/add" title="">会員登録をしていない方はこちら</a>