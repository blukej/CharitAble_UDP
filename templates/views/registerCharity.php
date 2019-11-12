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

<div class="registercharity-form">
    <form action="<?= APP_BASE_URL ?>/RegisterCharity" method="post">
        <h2 class="text-center">Register Charity</h2>   
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input id="Username" type="text" class="form-control" name="username" placeholder="Charity Name">				
            </div>
        </div>
        <div class="form-group">
        	<div class="input-group">
                <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                <input id="CharityNumber" type="number" class="form-control" name="charitynumber" placeholder="Charity Number">				
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