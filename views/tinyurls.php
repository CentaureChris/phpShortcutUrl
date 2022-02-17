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
                <th>Url complete</th> <th>Url raccourcis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($urls as $url): ?>
              <tr><td><a href="<?= $url['long_url'] ?>" target="blank"><?= $url['long_url'] ?></a> </td> <td> <a href="<?= $url['long_url'] ?>" target="blank">http://shortURL.com/<?= $url['id'],bin2hex(random_bytes(5))?></a></td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
