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

    <form action="<?= APP_BASE_URL ?>/Login" method="post" class="form-signin">
    <h2>Please sign in</h2>
    <label>Username</label>
    <input id="Username" type="text" name='username' class="form-control" placeholder="Username" autofocus>
    <br>
    <label>Password</label>
    <input id="Password" type="password" name="password" class="form-control" placeholder="Password">
    <div class="checkbox">
    </div>
    <button type="submit">Sign in</button>
    </form>
 
<p>If you do not have an account, please register <a href="Register"> here </a></p>