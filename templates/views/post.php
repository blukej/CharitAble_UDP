<div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">	        
            <h2 class="text-center">Create Post</h2>  	
    		<form action="<?= APP_BASE_URL ?>/Posts" method="post">    		    
    		    <div class="form-group">
                <p class="text-center text-muted small">You are posting as: <?= $locals['user_name'] ?></p>
                <input type='hidden' name='username' value="<?php echo $locals['user_name']?>">
    		        <label for="title">Title <span class="require">*</span></label>
    		        <input type="text" class="form-control" name="subject" id="subject"/>
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Enter Post <span class="require">*</span></label>
    		        <textarea rows="5" class="form-control" name="post" id="post"></textarea>
    		    </div>
    		    
    		    <div class="form-group">
    		        <p><span class="require">*</span> - required fields</p>
    		    </div>

                <input id='email' type='hidden' name='email' value="<?php echo $locals['email']?>">
    		    
    		    <div class="form-group">
    		        <button type="submit" value='Post' class="btn btn-primary">
    		            Create
    		        </button>
    		        <button class="btn btn-default">
    		            Cancel
    		        </button>
    		    </div> 		    
    		</form>
		</div>	
	</div>
</div>

<?php foreach($locals['displayPosts'] as $display) : ?>
<?php $count++; ?>

<div class="container">
  <div class="well">
      <div class="media">
      	<a class="pull-left" href="#">
    		<img class="media-object" src="./assets/images/logo150150.png">
  		</a>
  		<div class="media-body">
    	  <h4 class="media-heading"><?= $display["subject"]; ?></h4>
          <?php
          if(empty($display["user_name"])){
            $display["user_name"] = 'Anonymous User';
          }
          ?>
          <p class="text-right">By: <?= $display["user_name"]; ?></p>
          <p><?= $display["text"]; ?></p>
          <ul class="list-inline list-unstyled">
  			<li><span><i class="glyphicon glyphicon-calendar"></i> <?= $display["post_date"]; ?> </span></li>
            <li>|</li>
            <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="text-center">
                <input type="hidden" name="cmd" value="_donations" />
        <input type="hidden" name="business" value="<?php echo $locals['email']?>" />
        <input type="hidden" name="currency_code" value="EUR" />
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_IE/i/scr/pixel.gif" width="1" height="1" />
        </form>
			</ul>
       </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php foreach($locals['userComments'] as $displayComments) : ?>
<?php $count++; ?>

<p>User ID:<?= $displayComments["user_id"]; ?></p>
<p>Username:<?= $display["user_name"]; ?></p>
<p>Text:<?= $displayComments["text"]; ?></p>
<p>Timestamp:<?= $displayComments["timestamp"]; ?></p>

<?php endforeach; ?>
<form action="<?= APP_BASE_URL ?>/Comments" method="post">   

            <select class="form-control" name='post_id' style="margin-bottom: 10px;">
            <?php foreach($locals['displayPosts'] as $displayPosts) : ?>
                <?php 
                    $displayPost = $displayPosts["post_id"];       
                    echo "<option value='$displayPost'>$displayPost</option>";   
                ?>
            <?php endforeach; ?>  
        </select>

    <input id='Username' type='hidden' name='user_name' value="<?php echo $locals['user_name']?>">

    <textarea type="text" name="text" id ="text" placeholder="Enter Comment" rows="3"></textarea>
         
    <input type='submit' value='Submit'>
</form>

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