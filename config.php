<!doctype html>
<html>
  <head>
    <title>Demo</title>
  </head>
  <body>
    <ol>
<?php
require __DIR__ . '/vendor/autoload.php';
$tfa = new RobThree\Auth\TwoFactorAuth('mdl_two_factor_auth');
?>
      <li>First create a secret and associate it with a user</li>
<?php
    $secret = $tfa->createSecret();
?>
      <li>
        Next create a QR code and let the user scan it:<br>
        <img src="<?php echo $tfa->getQRCodeImageAsDataUri('Demo', $secret); ?>"><br>
          ...or display the secret to the user for manual entry:
<?php echo chunk_split($secret, 4, ' '); ?>
      </li>
<?php
  $code = $tfa->getCode($secret);
?>
      <li>Next, have the user verify the code; at this time the code displayed by a 2FA-app would be: <span style="color:#00c"><?php echo $code; ?></span> (but that changes periodically)</li>
      <li>When the code checks out, 2FA can be / is enabled; store (encrypted?) secret with user and have the user verify a code each time a new session is started.</li>
      <li>
        When aforementioned code (<?php echo $code; ?>) was entered, the result would be:
<?php if ($tfa->verifyCode($secret, $code) === true) { ?>
        <span style="color:#0c0">OK</span>
<?php } else { ?>
        <span style="color:#c00">FAIL</span>
<?php } ?>
      </li>
    </ol>
</body>
</html>
