<div class="row">
    <div class="col-2 title">
        <h2>Welcome</h2>
    </div>
    <div class="col-10">
        <p>Here at CharitAble we aim to connect our users with their favourite charities. The site allows you to make donations and share thoughts on charities you are supporting.</p>
        <p></p>
    </div>
</div>
<?php
foreach($locals['charities'] as $charity_array)
{
    ?>
<div class="row">
    <?php
    $charity = new Charity($charity_array);
    $charity::displayCharity();

}
?>
    
</div>