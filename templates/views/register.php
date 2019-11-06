<?php 
    $messages = require_once('./messages.php');
    $message = NULL;

    $query = \Rapid\Request::query('message');

    if (isset($query) && isset($messages[$query])) {
        $message = $messages[$query];
    }
    else if (isset($query)) {
        $message = $messages['UNKNOWN'];
    }
?>
<?php if ($message) { ?>
    <p class='<?= $message['class'] ?> text-center'><?= $message['message'] ?></p>
<?php } ?>

<form action="<?= APP_BASE_URL ?>/Register" method="post">
  
    <label>Username</label>
    <input id="Username" type="text" name='username' placeholder="Username" autofocus>
    <br>
    <label>Email</label>
    <input id="Email" type="email" name='email' placeholder="Email">
    <br>
    <label>Password</label>
    <input id="Password" type="password" name="password" placeholder="Password">
    <div class="checkbox">
    </div>
    <button type="submit">Register</button>
</form>
<p>If you already have an account, please login <a href="Login"> here </a></p>