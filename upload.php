<?php

?>

<!DOCTYPE html>

<head>
    <title>Mini-InstaV3</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles2.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>

    <main>

        <div class="titre">
            <h1>INSTAGRAM</h1>
        </div>

        <div class="upload">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="txt">
                    <p>Veuillez entrez un commentaire</p>
                    <input type="text" name="info" placeholder="commentaire :">
                </div>
                <div class="send">
                    <input type="file" name="photo">
                    <input type="submit" value="envoyer">
                </div>
                <?php
                $date = date("d-m-Y");
                $nom = $_POST["info"];
                $photo = $_FILES["photo"]["name"];
                $file_name = $nom . "-" . $date . "-" . $photo;
                $chemin_tmp = $_FILES["photo"]["tmp_name"];
                $upload = move_uploaded_file($chemin_tmp, "photos/" . $file_name);
                ?>
                <?php if ($upload !== false) : ?>
                    <p style="color: white;">Upload reussi!</p>
                    <img src="photos/<?php echo $file_name ?>">
                <?php else : ?>
                    <p style="color: white;">Veuillez entrer une image</p>
                <?php endif ?>
        </div>

        <div class="acceuil">
            <a href="index.php">Retour a l'acceuil</a>
        </div>
    </main>



</body>