<?= $locals['user_name'] ?>
<form action="<?= APP_BASE_URL ?>/Posts" method="post">       
    <input id='Username' type='hidden' name='username' value="<?php echo $locals['user_name']?>">

    <textarea type="text" name="subject" id ="subject" placeholder="Enter Title" rows="1"></textarea>

    <textarea type="text" name="post" id ="post" placeholder="Enter Post" rows="3"></textarea>
         
    <input type='submit' value='Post'>
</form>

<?php foreach($locals['displayPosts'] as $display) : ?>
<?php $count++; ?>

<div class="panel-heading h2">Username:<?= $display["user_name"]; ?></div>
<div class="panel-footer h2">Title:<?= $display["subject"]; ?></div>
<div class="panel-footer h2">Content:<?= $display["text"]; ?></div>

<?php endforeach; ?>