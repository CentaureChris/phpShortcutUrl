<?php
require_once('./views/header.php');
require_once('./views/navbar.php');
// print_r($files);
// print_r($urls);
// var_dump($_FILES);

?>

<div class="container">
    <h1>Shortcut urls app</h1>
    <form method="POST">
        <label class="form_label" for="longurl">Entrer l'Url à raccourcir</label>
        <input class="form_control" type="text" id="longurl" name="longurl" />
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
                            <a href="index.php?page=count&id=<?= $url['id'] ?>">http://shortURL.com/<?= $url['id'], bin2hex(random_bytes(5)) ?></a>
                        </td>
                        <td><?= $url['count'] ?></td>
                        <td>
                            <a href="index.php?page=disabled&id=<?= $url['id'] ?>"><button class="btn btn-secondary"> disable</button> </a> <a href="index.php?page=delete&id=<?= $url['id'] ?>"><button class="btn btn-danger" >delete</button></a>
                        </td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td><span><?= $url['long_url'] ?></span> </td>
                        <td> <span>http://shortURL.com/<?= $url['id'], bin2hex(random_bytes(5)) ?></span></td>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach($files as $file) : ?>
            <tr>
                <td><a href="index.php?page=download&id=<?= $file['id']; ?>"><?= $file['files'] ?></a></td>
            </tr>
            <?php endforeach ; ?>
        </tbody>
    </table>
</div>

