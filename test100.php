<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style the Image Used to Trigger the Modal */
        body {
            background-color: #FBF2DF;
        }

        h1 {
            color: black;
            font-size: 80px;
        }

        p {
            font-family: cursive;
            font-size: 20px;
        }

        .myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .a1 {
            display: inline-block;
            width: 30%;
        }

        .myImg:hover {
            opacity: 0.9;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (Image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image (Image Text) - Same Width as the Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation - Zoom in the Modal */
        .modal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        img {
            max-width: 300px;

        }
    </style>
</head>

<body>
    <h1>Gallerie</h1>
    <?php
    //session_start();

    include 'connection.php';
    $sql = "SELECT * FROM `images` WHERE id=" . $_SESSION["favcolor"];
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($images = mysqli_fetch_assoc($res)) { ?>
            <div style="text-align: center;">
                <div class="a1">
                    <img class="myImg" alt="bonjourajax" src="<?= $images['hsb'] ?>">
                    <p>hsb</p>
                </div>



                <div class="a1">
                    <img class="myImg" alt="bonjourajax" src="<?= $images['seuil'] ?>">
                    <p>seuil</p>
                </div>



                <div class="a1">
                    <img class="myImg" alt="bonjourajax" src="<?= $images['red'] ?>">
                    <p>image rouge</p>
                </div>


                <div class="a1">
                    <img class="myImg" alt="bonjourajax" src="<?= $images['inverse'] ?>">
                    <p>image inverse</p>
                </div>

                <div class="a1">
                    <img class="myImg" alt="bonjourajax" src="<?= $images['gris'] ?>">
                    <p>image gris</p>
                </div class="a1">

                <div class="a1">
                    <img class="myImg" alt="bonjourajax" src="<?= $images['bleu'] ?>">
                    <p>image bleu</p>
                </div>

                <div class="a1">
                    <img class="myImg" alt="bonjourajax" src="<?= $images['modesandpadd'] ?>">
                    <p>mode s&p</p>
                </div>

                <div class="a1">
                    <img class="myImg" alt="bonjourajax" src="<?= $images['green'] ?>">
                    <p>image vert</p>
                </div>



                <!-- Next and previous buttons -->

            </div>
            <br>

            <!-- The dots/circles -->


            </div>







    <?php     }
    } ?>



    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>


</body>

</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var modal = $('#myModal')
        var span = $(".close")
        var modalImg = $("#img01")
        var captionText = $("#caption")

        var img = $('.myImg')

        img.click(function() {
            modal.css('display', 'block')
            modalImg.attr('src', this.src)
            captionText.html(this.alt)
        });

        span.click(function() {
            modal.css('display', 'none')
        });
    });
</script>