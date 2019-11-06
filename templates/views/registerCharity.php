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

<form action="<?= APP_BASE_URL ?>/RegisterCharity" method="post">
  
    <label>Charity Name</label>
    <input id="Username" type="text" name='username' placeholder="Charity Name">
    <br>
    <label>Charity Number</label>
    <input id="CharityNumber" type="number" name='charitynumber' placeholder="Charity Number">
    <br>
    <label>Email</label>
    <input id="Email" type="email" name='email' placeholder="Email">
    <br>
    <label>Address</label>
    <input id="Address" type="text" name='address' placeholder="Address">
    <br>
    <label>Password</label>
    <input id="Password" type="password" name="password" placeholder="Password">
    <div class="checkbox">
    </div>
    <button type="submit">Register</button>

</form>