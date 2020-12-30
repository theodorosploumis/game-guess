<?php

include_once 'functions.php';

$cells_number = 203;
$cell_width = "8vh";
$font_size = "18px";
$bg_color = "whitesmoke";
?>

<html>
    <head>
        <style type = "text/css">
            :root {
                --bg-color: <?php print $bg_color; ?>;
                --cell-width: <?php print $cell_width; ?>;
                --font-size: <?php print $font_size; ?>;
            }

            * {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
            }

            /*@media print {*/
            /*    html,*/
            /*    body {*/
            /*        width: 210mm;*/
            /*        height: 297mm;*/
            /*    }*/
            /*}*/

            body {
                background: var(--bg-color);
                font-size: var(--font-size);
                font-family: sans-serif;
            }

            .page {
                page-break-inside: avoid;
                margin: auto;
                text-align: center;
                display: inline-block;
            }

            .board {
                display: flex;
                flex-flow: wrap;
                align-content: flex-start;
            }

            .cell {
                flex-grow: 1;
                flex-shrink: 1;
                text-align: center;
                border: 1px solid var(--bg-color);
                width: var(--cell-width);
                height: var(--cell-width);
                line-height: var(--cell-width);
                max-width: var(--cell-width);
                max-height: var(--cell-width);
            }
        </style>
    </head>
    <body>
        <div class="page">
            <div class="board">
                <?php GenerateCells($cells_number); ?>
            </div>
        </div>
    </body>
</html>
