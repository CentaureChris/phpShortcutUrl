<?php 
require_once('./views/header.php') ;
require_once('./views/navbar.php') ;

?>

<div class="container">
    <h1>Shortcut urls app</h1>
    <form method="POST" >
        <label for="longurl">Entrer l'Url à raccourcir</label>
        <input type="text" id="longurl" name="longurl" />
        <button type="submit" name="submit">Raccourcir</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Url complete</th> <th>Url raccourcis</th> <th>Visites</th> <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($urls as $url): ?>
                <?php if($url['active'] == 1) :?>
              <tr><td><a href="<?= $url['long_url'] ?>" target="blank"><?= $url['long_url'] ?></a> </td> <td> <a href="<?= $url['long_url'] ?>" target="blank">http://shortURL.com/<?= $url['id'],bin2hex(random_bytes(5))?></a></td><td><?=  $url['count'] ?></td> <td><button> <a href="index.php?page=disabled&id=<?=$url['id'] ?>" >enable</a></button></td> </tr>
                <?php else : ?>
                    <tr><td><span><?= $url['long_url'] ?></span> </td> <td> <span>http://shortURL.com/<?= $url['id'],bin2hex(random_bytes(5))?></span></td><td><?=  $url['count'] ?></td>  <td><button> <a href="index.php?page=enabled&id=<?=$url['id'] ?>" >able</a></button></td> </tr>
                <?php endif ;?>
              <?php endforeach; ?>
        </tbody>
    </table>
</div>
