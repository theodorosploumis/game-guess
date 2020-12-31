<?php

include_once 'functions.php';

$font_size = "20px";
$bg_color = "white";
$card_bg_color = "#f5f5f5";
$card_width = "22%";
$border_color = "whitesmoke";

?>

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.min.css">
        <style type = "text/css">
            :root {
                --bg-color: <?php print $bg_color; ?>;
                --card-bg-color: <?php print $card_bg_color; ?>;
                --card-width: <?php print $card_width; ?>;
                --font-size: <?php print $font_size; ?>;
            }

            * {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
            }

            body {
                background: var(--bg-color);
                font-size: var(--font-size);
                font-family: sans-serif;
            }

            .board {
                display: flex;
                flex-flow: wrap;
            }

            .card {
                flex-grow: 1;
                flex-shrink: 1;
                padding: 20px;
                margin: 10px 0.5%;
                border-radius: 10px;
                border: 1px solid var(--bg-color);
                background: var(--card-bg-color);
                width: var(--card-width);
                max-width: var(--card-width);
                page-break-inside: avoid;
            }
            
            .card-logo {
                margin-bottom: 20px;
                text-align: center;
            }
            
            .card-logo img {
                height: 40px;
                width: auto;
                opacity: 0.2;
            }

            .card-action {
                font-size: 17px;
                margin: 40px 10px;
                height: 150px;
                line-height: 1.5;
            }

            .card-action label {
                display: none;
            }

            .card-type {
                margin-bottom: 5px;
                font-size: 12px;
                text-align: right;
            }

            .card-type label {
                padding-right: 5px;
            }

            .card-copyright {
                border-top: 1px solid var(--bg-color);
                padding-top: 10px;
                margin-top: 10px;
                font-size: 10px;
                text-align: center;
            }

            @page {
                size: A4 landscape;
            }

            @media print {
                .board {
                    display: block;
                    margin: 0 auto;
                }

                .card {
                    float: left;
                    display: inline-block;
                }
            }

        </style>
    </head>
    <body>
        <div class="page A4 landscape">
            <div class="board sheet">
                <?php print GenerateCards(); ?>
            </div>
        </div>
    </body>
</html>