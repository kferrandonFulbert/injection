<?php
$token=rand(0, 10000);
setcookie('token',$token);
?>
<form method="post" action="verif.php">
    <input type="text" name="nom" placeholder="nom"/>
    <input type="number" name="prix" placeholder="prix" />
    <input type="text" name="image" placeholder="image"/>
    <input type="hidden" name="token" value="<?=$token?>">
    <input type="submit">
</form>