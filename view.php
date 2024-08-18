<?php include "connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="t.css">
    <title>>View Image</title>
    <style>
        body {
            background-color: blanchedalmond;
        }

        .choix {
            justify-content: space-around;
            display: flex;
        }

        .cont {

            justify-content: center;
            display: flex;
        }

        img {
            max-width: 300px;
            max-height: 400px;
        }

        .img_org {
            text-align: center;

        }

        .filtre {
            text-align: center;

        }

        .sousclasschoix {
            max-width: 100px;
            max-height: 100px;
            text-align: center;
        }

        #fontfamily {
            font-family: cursive;
        }

        .choix .sousclasschoix img:hover {
            transform: scale(1.001);
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 5);

        }

        .choix .sousclasschoix img {
            transition: transform 0.1s ease-in-out;
        }
    </style>
</head>


<body>
    <a href="index.php">&#8592;</a>
    <?php
    $sql = "SELECT * FROM `images` WHERE 1 ORDER by id DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($images = mysqli_fetch_assoc($res)) { ?>


            <!-- Full-width images with number and caption text -->
            <div class="glob">
                <div class="cont">
                    <div class="img_org" style=" width: 500px;  height: 500px;">
                        <h1>Images Origine:</h1>
                        <img src="TestWebApi/api/images/<?= $images['image_url'] ?>">
                    </div>
                    <div class="filtre" style="width: 500px;  height:500px;">
                        <h1>Images filtrès:</h1>
                        <div id="img_filtre">
                            <p id="textsupprime">choisir un filtre</p>
                        </div>
                    </div>
                </div>
                <h1>Liste des filtres:</h1>
                <div class="choix">

                    <div class="sousclasschoix"><img onclick="appen('<?= $images['hsb'] ?>')" src="<?= $images['hsb'] ?>" style="width:90%">
                        <p id="fontfamily">hsb</p>
                    </div>
                    <div class="sousclasschoix"><img onclick="appen('<?= $images['seuil'] ?>')" src="<?= $images['seuil'] ?>" alt="seuillage" style="width:90%">
                        <p id="fontfamily">seuillage</p>
                    </div>
                    <div class="sousclasschoix"><img onclick="appen('<?= $images['red'] ?>')" src="<?= $images['red'] ?>" style="width:90%">
                        <p id="fontfamily">image rouge</p>
                    </div>
                    <div class="sousclasschoix"><img onclick="appen('<?= $images['inverse'] ?>')" src="<?= $images['inverse'] ?>" style="width:90%">
                        <p id="fontfamily">image inverse</p>
                    </div>
                    <div class="sousclasschoix"><img onclick="appen('<?= $images['gris'] ?>')" src="<?= $images['gris'] ?>" style="width:90%">
                        <p id="fontfamily">image gris</p>
                    </div>
                    <div class="sousclasschoix"><img onclick="appen('<?= $images['bleu'] ?>')" src="<?= $images['bleu'] ?>" style="width:90%">
                        <p id="fontfamily">image bleu</p>
                    </div>
                    <div class="sousclasschoix"><img onclick="appen('<?= $images['modesandpadd'] ?>')" src="<?= $images['modesandpadd'] ?>" style="width:90%">
                        <p id="fontfamily"> mode S&p</p>
                    </div>
                    <div class="sousclasschoix"><img onclick="appen('<?= $images['green'] ?>')" src="<?= $images['green'] ?>" style="width:90%">
                        <p id="fontfamily">image vert</p>
                    </div>


                </div>

            </div>
    <?php     }
    } ?>
</body>

</html>

<script>
    function appen(im) {
        console.log("amine");
        var cl = document.getElementById('img_filtre');
        cl.innerHTML = "<img src=" + im + ">";

        var c2 = document.getElementById(textsupprime);
        c2.innerHTML = "";
    }
</script>