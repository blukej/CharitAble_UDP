<?= $locals['user_name'] ?>
<?= $locals['user_id'] ?>
<form action="<?= APP_BASE_URL ?>/Posts" method="post">       
    <input id='Username' type='hidden' name='username' value="<?php echo $locals['user_name']?>">

    <textarea type="text" name="subject" id ="subject" placeholder="Enter Title" rows="1"></textarea>

    <textarea type="text" name="post" id ="post" placeholder="Enter Post" rows="3"></textarea>
         
    <input type='submit' value='Post'>
</form>
<h3>Users</h3>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
<?php foreach($locals['displayUsers'] as $display) : ?>
<?php $count++; ?>

<tr valign='top'>
<td><?= $display["user_name"]; ?> <small>
    <form action="<?= APP_BASE_URL ?>/Follow" method="post">       
    <input id='UserID' type='hidden' name='user_id' value="<?php echo $locals['user_id']?>">
    <input id='FollowID' type='hidden' name='follow_id' value="<?= $display["user_id"]; ?>">   
    <input type='submit' value='Follow'>
</form></small> <?= $display["user_id"]; ?></td>
</tr>

<?php endforeach; ?>
</table>

<h3>Posts</h3>
<?php foreach($locals['displayPosts'] as $display) : ?>
<?php $count++; ?>

<p>Username:<?= $display["user_name"]; ?></p>
<p>Title:<?= $display["subject"]; ?></p>
<p>Content:<?= $display["text"]; ?></p>

<?php endforeach; ?>

<form action="<?= APP_BASE_URL ?>/Follow" method="post">       
    <input id='UserID' type='hidden' name='user_id' value="<?php echo $locals['user_id']?>">
    <input id='FollowID' type='hidden' name='follow_id' value="<?= $display["user_id"]; ?>">
         
    <input type='submit' value='Follow'>
</form>