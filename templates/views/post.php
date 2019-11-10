<?= $locals['user_name'] ?>
<form action="<?= APP_BASE_URL ?>/Posts" method="post">       
    <input id='Username' type='hidden' name='username' value="<?php echo $locals['user_name']?>">

    <textarea type="text" name="subject" id ="subject" placeholder="Enter Title" rows="1"></textarea>

    <textarea type="text" name="post" id ="post" placeholder="Enter Post" rows="3"></textarea>
         
    <input type='submit' value='Post'>
</form>

<form action="<?= APP_BASE_URL ?>/Comments" method="post">   

            <select class="form-control" name='shoes' style="margin-bottom: 10px;">
            <?php foreach($locals['displayPosts'] as $displayPosts) : ?>
                <?php 
                    $displayPost = $displayPosts["post_id"];       
                    echo "<option value='$displayPost'>$displayPost</option>";   
                ?>
            <?php endforeach; ?>  
        </select>

    <input id='Username' type='hidden' name='username' value="<?php echo $locals['user_name']?>">
    <input id='User_id' type='hidden' name='userid' value="<?php echo $locals['user_id']?>">

    <textarea type="text" name="comment" id ="comment" placeholder="Enter Comment" rows="3"></textarea>
         
    <input type='submit' value='Submit'>
</form>

<?php foreach($locals['displayPosts'] as $display) : ?>
<?php $count++; ?>

<p>Username:<?= $display["user_name"]; ?></p>
<p>Title:<?= $display["subject"]; ?></p>
<p>Content:<?= $display["text"]; ?></p>

<?php endforeach; ?>

<?php foreach($locals['userComments'] as $displayComments) : ?>
<?php $count++; ?>

<p>User ID:<?= $displayComments["user_id"]; ?></p>
<p>Username:<?= $display["user_name"]; ?></p>
<p>Text:<?= $displayComments["text"]; ?></p>
<p>Timestamp:<?= $displayComments["timestamp"]; ?></p>

<?php endforeach; ?>