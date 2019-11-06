<?= $locals['user_name'] ?>
<form action="<?= APP_BASE_URL ?>/Posts" method="post">       
    <input id='Username' type='hidden' name='username' value="<?php echo $locals['user_name']?>">

    <textarea type="text" name="post_title" id ="post_title" placeholder="Enter Title" rows="1"></textarea>

    <textarea type="text" name="post_content" id ="post_content" placeholder="Enter Post" rows="3"></textarea>
         
    <input type='submit' value='Post'>
</form>
