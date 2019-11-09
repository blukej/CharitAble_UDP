<?= $locals['user_name'] ?>

<?php foreach($locals['userProfile'] as $profile) : ?>
<?php $count++; ?>

<p>Avatar:<img src="assets/images/<?= $profile["user_avatar_url"]; ?></p>
<p>User ID:<?= $profile["user_id"]; ?></p>
<p>Charity Number:<?= $profile["charity_num"]; ?></p>
<p>Username:<?= $profile["user_name"]; ?></p>
<p>Email:<?= $profile["email"]; ?></p>
<p>Address:<?= $profile["Address"]; ?></p>
<p>Crypto Wallet:<?= $profile["crypto_wallet"]; ?></p>
<p>Approved as Charity:<?= $profile["approved"]; ?></p>


<?php endforeach; ?>