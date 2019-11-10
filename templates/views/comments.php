<?= $locals['user_name'] ?>
<form action="<?= APP_BASE_URL ?>/Comments" method="post">       
    <input id='Username' type='hidden' name='username' value="<?php echo $locals['user_name']?>">
    <input id='User_id' type='hidden' name='userid' value="<?php echo $locals['user_id']?>">

    <textarea type="text" name="comment" id ="comment" placeholder="Enter Comment" rows="3"></textarea>
         
    <input type='submit' value='Submit'>
</form>