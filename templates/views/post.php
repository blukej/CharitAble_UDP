<form action="<?= APP_BASE_URL ?>/Posts" method="post">       
    <input id='Username' type='hidden' name='username' value="<?php echo $locals['user_name']?>">

    <textarea type="text" name="subject" id ="subject" placeholder="Enter Title" rows="1"></textarea>

    <textarea type="text" name="post" id ="post" placeholder="Enter Post" rows="3"></textarea>
         
    <input type='submit' value='Post'>
</form>

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

<?php 
    $users1 = array();
    $users2 = array();
    $following1 = array();
    $following2 = array();

    $users1 = $locals['displayUsers'];
    $following1 = $locals['displayFollows'];


    foreach ($users1 as $value) {
       array_push($users2,$value['user_name']);
    }

    foreach ($following1 as $key) {
        array_push($following2,$key['follow_user_name']);
    }

    foreach($users2 as $key => $value) {
        
        if(in_array($value,$following2)) { ?>

            <tr valign='top'>
                    <td><?= $value ?> 
                    <form action="<?= APP_BASE_URL ?>/Unfollow" method="post">       
                    <input id='UserID' type='hidden' name='user_name' value="<?php echo $locals['user_name']?>">
                    <input id='FollowID' type='hidden' name='follow_user_name' value="<?= $value; ?>">   
                    <input type='submit' value='Unfollow'>
            </form></td>

        <?php } else { ?>

            <tr valign='top'>
                    <td><?= $value; ?> 
                    <form action="<?= APP_BASE_URL ?>/Follow" method="post">       
                    <input id='UserID' type='hidden' name='user_name' value="<?php echo $locals['user_name']?>">
                    <input id='FollowID' type='hidden' name='follow_user_name' value="<?= $value; ?>">   
                    <input type='submit' value='Follow'>
                </form></td>
                </tr>

        <?php } 
    }
?>