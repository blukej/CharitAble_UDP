<h1>Example</h1>
<p>This is just an example of a view using a $local value. Here it is: <?= $locals['user_name'] ?></p>
<?php 
if (!isset($locals['user_type']) || $locals['user_type'] == ''){
echo '<a href="Login">Login</a>';
}
else if($locals['user_type'] === 'user'){
  echo '<a href="Logout">Logout</a>';
}?>

<form action="<?= APP_BASE_URL ?>/Posts" method="post">       
    <input id='Username' type='hidden' name='username' value="<?php echo $locals['user_name']?>">

    <textarea type="text" name="subject" id ="subject" placeholder="Enter Title" rows="1"></textarea>

    <textarea type="text" name="post" id ="post" placeholder="Enter Post" rows="3"></textarea>
         
    <input type='submit' value='Post'>
</form>