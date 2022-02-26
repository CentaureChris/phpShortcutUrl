<?php 
// var_dump($_SESSION); ?>
<nav>
    <ul class="admin">
        <a href="index.php"><li>Url shortcut</li></a>
        <?php 
        if(!isset($_SESSION['Auth'])): ?>
        <a href="index.php?page=login"><li>Login</li></a>
        <?php else : ?>
        <a href="index.php?page=logout"><li>Logout</li></a>
        <?php endif ; ?>
    </ul>
</nav>
