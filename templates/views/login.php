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

<div class="login-form">
    <form action="<?= APP_BASE_URL ?>/Login" method="post">
    <?php if ($message) { ?>
    <p class="error"><?= $message['message'] ?></p>
    <?php } ?>
        <h2 class="text-center">Sign in</h2>
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input id="Username" type="text" class="form-control" name="username" placeholder="Username">				
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="Password" type="password" class="form-control" name="password" placeholder="Password">				
            </div>
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary login-btn btn-block">Sign in</button>
        </div>
    </form>
    <p class="text-center text-muted small">Don't have an account? <a href="Register">Sign up here!</a></p>
</div>
