<nav>
    <ul>
        <?php 
        if(!isset($_SESSION['Auth'])): ?>
        <li><a href="index.php?page=login">Login</a></li>
        <?php else : ?>
        <li><a href="index.php?page=logout">Logout</a></li>
        <?php endif ; ?>
        <li><a href="index.php">Url shortcut</a></li>
    </ul>
</nav>