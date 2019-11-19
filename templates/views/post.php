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

<?php foreach($locals['displayPosts'] as $display){  ?>
<div class="row">
    <?php 
    $post = new Post($display);
    $post->displayPost();
    ?>
</div>
<?php }?>   
