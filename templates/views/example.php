<h1>Example</h1>
<p>This is just an example of a view using a $local value. Here it is: <?= $locals['someLocalKey'] ?></p>
<?php 
if (!isset($locals['user_type']) || $locals['user_type'] == ''){
echo '<a href="Login">Login</a>';
}
else if($locals['user_type'] === 'user'){
  echo '<a href="Logout">Logout</a>';
}