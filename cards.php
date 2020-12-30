<?php

include_once 'functions.php';

$font_size = "20px";
$bg_color = "white";
$card_width = "280px";
$border_color = "whitesmoke";

$cards_number = 84;
$difficulty = 4;

?>

<html>
    <head>
        <style type = "text/css">
            :root {
                --bg-color: <?php print $bg_color; ?>;
                --cell-width: <?php print $card_width; ?>;
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
                /*text-align: center;*/
                padding: 20px 10px;
                margin: 10px;
                border-radius: 10px;
                border: 1px solid var(--bg-color);
                background: #f1ebdd;
                width: var(--cell-width);
                height: 160px;
                max-width: var(--cell-width);
                /*page-break-inside: avoid;*/
            }
        </style>
    </head>
    <body>
        <div class="page">
            <div class="board">
                <?php GenerateCards($cards_number); ?>
            </div>
        </div>
    </body>
</html>