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

<div class="register-form">
    <form action="<?= APP_BASE_URL ?>/Register" method="post">
    <?php if ($message) { ?>
    <p class="error"><?= $message['message'] ?></p>
    <?php } ?>
        <h2 class="text-center">Register</h2>   
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input id="Username" type="text" class="form-control" name="username" placeholder="Username">				
            </div>
        </div>
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
                <input id="First name" type="text" class="form-control" name="first_name" placeholder="First name">				
            </div>
        </div>
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
                <input id="Last name" type="text" class="form-control" name="last_name" placeholder="Last name">				
            </div>
        </div>
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input id="Email" type="email" class="form-control" name="email" placeholder="Email">				
            </div>
        </div>
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                <input id="Address" type="text" class="form-control" name="address" placeholder="Address">				
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="Password" type="password" class="form-control" name="password" placeholder="Password">				
            </div>
        </div>        
        <div class="form-group">
            <button type="submit" class="btn btn-primary login-btn btn-block">Register</button>
        </div>
    </form>
    <p class="text-center text-muted small">Already have an account? <a href="Login">Login here!</a></p>
</div>