<form action="<?= APP_BASE_URL ?>/Posts" method="post">       
    <input id='Username' type='hidden' name='username' value="<?php echo $locals['user_name']?>">

    <textarea type="text" name="subject" id ="subject" placeholder="Enter Title" rows="1"></textarea>

    <textarea type="text" name="post" id ="post" placeholder="Enter Post" rows="3"></textarea>
         
    <input type='submit' value='Post'>
</form>

<!--IF statement which takes in the list of all followers and then checks to see if the current user has already followed any of the users 
shown, also prevent find all users from showing the user who is logged in-->
<h3>Users</h3>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
    <?php foreach($locals['displayUsers'] as $display) : ?>

                <?php if($display["user_name"] == $locals['user_name'])
                { 
                    
                } elseif ($display["user_name"] == $follows['displayFollows']) { ?>
                    <tr valign='top'>
                    <td><?= $display["user_name"]; ?> <small>
                        <form action="<?= APP_BASE_URL ?>/Follow" method="post">       
                        <input id='UserID' type='hidden' name='user_name' value="<?php echo $locals['user_name']?>">
                        <input id='FollowID' type='hidden' name='follow_user_name' value="<?= $display["user_name"]; ?>">   
                        <input type='submit' value='Unfollow'>
                    </form></td>
                <?php } else {?>
                        <tr valign='top'>
                        <td><?= $display["user_name"]; ?> <small>
                            <form action="<?= APP_BASE_URL ?>/Follow" method="post">       
                            <input id='UserID' type='hidden' name='user_name' value="<?php echo $locals['user_name']?>">
                            <input id='FollowID' type='hidden' name='follow_user_name' value="<?= $display["user_name"]; ?>">   
                            <input type='submit' value='Follow'>
                        </form></td>
                        </tr>
                <?php }?>

    <?php endforeach; ?>
</table>


<h3>Posts</h3>
<?php foreach($locals['displayPosts'] as $display) : ?>
<?php $count++; ?>

<p>Username:<?= $display["user_name"]; ?></p>
<p>Title:<?= $display["subject"]; ?></p>
<p>Content:<?= $display["text"]; ?></p>

<?php endforeach; ?>

<h3>Follows</h3>
<?php foreach($locals['displayFollows'] as $display) : ?>  

<p>Following: <?= $display["follow_user_name"]; ?></p>

<?php endforeach; ?>


<h3>Users</h3>
<table border='1' cellspacing='0' cellpadding='5' width='500'>
    <?php foreach($locals['displayUsers'] as $display) : ?>
        <?php foreach($locals['displayFollows'] as $value) : ?>            
                <?php if($display["user_name"] == $locals['user_name'])
                { 
                    
                } elseif ($display["user_name"] == $value["follow_user_name"]) { ?>

                    <p>unfollow</p>
                    
                <?php } ?>
        <?php endforeach; ?>

        <?php if(!($display["user_name"] == $value["follow_user_name"])) {?>
        
            <P>follow</p>
        
    <?php } endforeach; ?>
</table>