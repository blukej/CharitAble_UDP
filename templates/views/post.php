<div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Create post</h1>
    		
    		<form action="<?= APP_BASE_URL ?>/Posts" method="post">    		    
    		    <div class="form-group">
                <p><?= $locals['user_name'] ?></p>
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
  			<li><span><i class="glyphicon glyphicon-calendar"></i> <?= $displayComments["timestamp"]; ?> </span></li>
            <li>|</li>
            <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
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

