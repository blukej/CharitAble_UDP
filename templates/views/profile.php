<?php
print_r($locals)
?>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-3">
          <ul class="list-group">
            <li class="list-group-item text-muted">Profile</li>
            <li class="list-group-item text-right"><p class="text-center"><img src="assets/images/mary150150.jpg"></p></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Username:</strong></span><?= $profile["user_name"];?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Following:</strong></span> 4</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Donations:</strong></span> €26.50</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Subscriptions:</strong></span> €15.00</li>
          </ul> 
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 12</li>
          </ul>               
          
        </div>
    	<div class="col-sm-9">
          
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#donations" data-toggle="tab">Donations</a></li>
            <li><a href="#subscriptions" data-toggle="tab">Subscriptions</a></li>
          </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="donations">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>To:</th>
                      <th>Amount:</th>
                      <th>Date paid:</th>
                      <th>Repeat Donation: </th>
                      <th>Subscribe:</th>
                    </tr>
                  </thead>
                  <tbody id="items">
                    <tr>
                      <td>1</td>
                      <td>SVP</td>
                      <td>€15.00</td>
                      <td>12/09/19</td>
                      <td class="text-center"><strong>✓</strong></td>
                      <td class="text-center"><strong>✓</strong></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Good Fight</td>
                      <td>€8.50</td>
                      <td>17/07/19</td>
                      <td class="text-center"><strong>✓</strong></td>
                      <td class="text-center"><strong>✓</strong></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Crumlin Hospital</td>
                      <td>€3.50</td>
                      <td>25/10/19</td>
                      <td class="text-center"><strong>✓</strong></td>
                      <td class="text-center"><strong>✓</strong></td>
                    </tr>
                  </tbody>
                </table>
                <hr>
                <div class="row">
                  <div class="col-md-4 col-md-offset-4 text-center">
                  	<ul class="pagination" id="myPager"></ul>
                  </div>
                </div>
              </div>
              <hr>            
             </div>
             <div class="tab-pane" id="subscriptions">
                <div class="table-responsive">
                    <table class="table table-hover">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>To:</th>
                        <th>Amount:</th>
                        <th>Next due date:</th>
                        <th>Change amount:</th>
                        <th>Cancel:</th>
                        </tr>
                    </thead>
                    <tbody id="items">
                        <tr>
                        <td>1</td>
                        <td>SVP</td>
                        <td>€5.00</td>
                        <td>26/11/19</td>
                        <td class="text-center"><strong>✓</strong></td>
                        <td class="text-center"><strong>✘</strong></td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>Good Fight</td>
                        <td>€8.00</td>
                        <td>19/11/19</td>
                        <td class="text-center"><strong>✓</strong></td>
                        <td class="text-center"><strong>✘</strong></td>
                        </tr>
                        <tr>
                        <td>3</td>
                        <td>Crumlin Hospital</td>
                        <td>€2.00</td>
                        <td>07/11/19</td>
                        <td class="text-center"><strong>✓</strong></td>
                        <td class="text-center"><strong>✘</strong></td>
                        </tr>
                    </tbody>
                    </table>
                    <hr>
                    <div class="row">
                  <div class="col-md-4 col-md-offset-4 text-center">
                  	<ul class="pagination" id="myPager"></ul>
                  </div>
                </div>
                </div>
                <hr>
             </div>
              </div>
          </div>
        </div>
    </div>
<hr>
<div class="container">
    <div class="row">
	    <div class="col-md-8 col-md-offset-2">	        
            <h2 class="text-center">Create Post</h2>  	
    		<form action="<?= APP_BASE_URL ?>/Posts" method="post">    		    
    		    <div class="form-group">
                <p class="text-center text-muted small">You are posting as: <?= $locals['user']['user_name'] ?></p>
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
    