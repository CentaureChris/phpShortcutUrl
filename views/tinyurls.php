<?php
require_once('./views/header.php');
require_once('./views/navbar.php');
// print_r($files);
// var_dump($_POST);

?>

<div class="container">
    <h1>Shortcut urls app</h1>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <label class="form_label" for="longurl">Entrer l'Url à raccourcir</label>
        <input class="form_control" type="text" id="longurl" name="longurl" />

        <input type="hidden" name="shorturl" value="http://shortURL.com/<?= bin2hex(random_bytes(5)) ?>" />
        <button type="submit" name="submit">Raccourcir</button>
    </form>
    </br>

    <table>
        <thead>
            <tr>
                <th>Url complete</th>
                <th>Url raccourcis</th>
                <th>Visites</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($urls as $url) : ?>
                <?php if ($url['active'] == 1) : ?>
                    <tr>
                        <td>
                            <a href="<?= $url['long_url'] ?>" target="blank"> <?= $url['long_url'] ?></a>
                        </td>
                        <td>
                            <a href="index.php?page=count&id=<?= $url['id'] ?>"><?= $url['short_url'] ?></a>
                        </td>
                        <td><?= $url['count'] ?></td>
                        <td>
                            <a href="index.php?page=disabled&id=<?= $url['id'] ?>"><button class="btn btn-secondary"> disable</button> </a> <a href="index.php?page=delete&id=<?= $url['id'] ?>"><button class="btn btn-danger" >delete</button></a>
                        </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td><span><?= $url['long_url'] ?></span> </td>
                        <td> <span><?= $url['short_url']; ?></span></td>
                        <td><?= $url['count'] ?></td>
                        <td> <a href="index.php?page=enabled&id=<?=$url['id'];?>"><button class="btn btn-success">enable</button></a> <a href="index.php?page=delete&id=<?= $url['id'] ?>"><button class="btn btn-danger" >delete</button></a></td>
                    </tr>

                
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form method="POST" enctype="multipart/form-data">
        <label class="form_label" for="file">Entrer le fichier à uploader</label>
        <input class="form_control" type="file" id="file" name="file" />
        <button type="submit" name="submitFile">Envoyer</button>
    </form>
    </br>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Fichiers stocké</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($files as $file) : ?>
            <tr>
                <td><a href="index.php?page=download&id=<?= $file['id']; ?>"><?= $file['files'] ?></a></td>
                <td> <a href="index.php?page=deleteFile&id=<?= $file['id'] ?>"><button class="btn btn-danger" >delete</button></a>  </td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
    </table>
</div>

