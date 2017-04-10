<?php
$navbar = new \Alvo16\Navbar\Navbar();
$navbar->setApp($app);
$navbar->configure("navbar.php");
?>


<?=$navbar->getHTML();?>


<main>
