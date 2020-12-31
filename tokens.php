<?php

include_once 'functions.php';

$font_size = "20px";
$bg_color = "white";
$token_width = "60px";
$border_color = "whitesmoke";

$tokens_number = 9;

?>

<html>
    <head>
        <style type = "text/css">
            :root {
                --bg-color: <?php print $bg_color; ?>;
                --cell-width: <?php print $token_width; ?>;
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

            .token {
                flex-grow: 1;
                flex-shrink: 1;
                padding: 10px;
                margin: 1px;
                border-radius: 2px;
                border: 1px solid var(--bg-color);
                background: #f1ebdd;
                width: var(--cell-width);
                height: var(--cell-width);
                max-width: var(--cell-width);
            }
        </style>
    </head>
    <body>
        <div class="page">
            <div class="board">
                <?php GenerateTokens($tokens_number); ?>
            </div>
        </div>
    </body>
</html>