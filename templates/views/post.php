
<form action="<?= APP_BASE_URL ?>/Posts" method="post">       
    <input id='Username' type='hidden' name='username' value="<?php echo $locals['username']?>">

    <textarea type="text" name="post_content" id ="post_content" placeholder="Enter Post" rows="3"></textarea>
         
    <input type='submit' value='Post'>
</form>
