<?php

global $actions;

// ToDo: UUse a CSV to keep cards data
$actions = [
    'maths' => [
        'is an even number',
        'is an odd number',
        'is a number of sequence 2n+1 (n integer)',
        'is a number of sequence n+3 (n integer)',
        'has a number greater than 40',
        'has a number less than 40',
        'has a number between 20 and 80',
        'has a number which contains digit 3 (eg 35, 13 etc)',
        'has a number that contains a digit which was also found on your last number cell (eg 13, 36, 65, 51 etc)'
    ],
    'logic' => [
        'has background color yellow, orange or red',
        'has background blue, purple or brown',
        'has a number or a letter but with a sequence (number, letter, number etc)',
        'has a letter which is after the letter P (english alphabet)',
        'has a letter which comes before the letter J (english alphabet)',
        'has a letter which can be found on your last or first name',
        'has a letter or number you have never played before',
        'has a letter without curves (eg V, T, Y etc)',
        'has a letter which comes after the last player cell or a number greater than the last player cell',
        'has a letter which comes before the last player cell or a number less than the last player cell',
    ],
    'position' => [
        //    'is between a letter and a number',
        //    'is 3 cells away (vertical or horizontal) from the last player\'s cell',
        'is on the same vertical line from the last player\'s cell',
        'is on the same horizontal line from the last player\'s cell',
        'is on the same diagonal line from the last player\'s cell',
        'is between the last player\'s cell and your last cell',
        'is on any position above the last player\'s cell (not on the same horizontal line)',
        'is on any position below the last player\'s cell (not on the same horizontal line)',
        'has at least 2 letters as neighbours (vertical or horizontal)',
        'has at least 2 numbers as neighbours (vertical or horizontal)',
        'is next to an odd number (vertical or horizontal)',
        'is next to an even number (vertical or horizontal)',
    ],
    'draw' => [
        'a vertical line every 3 turns',
        'a horizontal line every 3 turns',
        'a diagonal line every 3 turns',
        'squares shapes (Cells are edges)',
        'equilateral triangles shapes (Cells are edges)',
        'rhombus shapes with equal sides (Cells are edges)',
        'orthogonal shapes (not square, Cells are edges)',
        'squares shapes (filled, must be completed by 4 turns)',
        'equilateral triangle shapes (filled, must be completed by 4 turns)',
        //ToDo,
    ]
];

function GetUrlArgument($arg) {
    return $_GET[$arg] ?? "";
}

// Generate Board
function GenerateNumber() {
    return mt_rand(0,99);
}

function GenerateLetter($lang = "el", $capital = TRUE) {
    $letters_el_capital = [
        "Α",
        "Β",
        "Γ",
        "Δ",
        "Ε",
        "Ζ",
        "Η",
        "Θ",
        "Ι",
        "Κ",
        "Λ",
        "Μ",
        "Ν",
        "Ξ",
        "Ο",
        "Π",
        "Ρ",
        "Σ",
        "Τ",
        "Υ",
        "Φ",
        "Χ",
        "Ψ",
        "Ω",
    ];

    $letters_el_small = [
        "α",
        "β",
        "γ",
        "δ",
        "ε",
        "ζ",
        "η",
        "θ",
        "ι",
        "κ",
        "λ",
        "μ",
        "ν",
        "ξ",
        "ο",
        "π",
        "ρ",
        "σ",
        "τ",
        "υ",
        "φ",
        "χ",
        "ψ",
        "ω",
    ];

    $letters_en_small = [
        "a",
        "b",
        "c",
        "d",
        "e",
        "f",
        "g",
        "h",
        "i",
        "j",
        "k",
        "l",
        "m",
        "n",
        "o",
        "p",
        "q",
        "r",
        "s",
        "t",
        "u",
        "v",
        "w",
        "x",
        "y",
        "z",
    ];

    $letters_en_capital = [];
    foreach ($letters_en_small as $k => $letter) {
        $letters_en_capital[] = strtoupper($letter);
    }

    // Get Array
    if ($capital) {
        if ($lang === "en") {
            $array = $letters_en_capital;
        } else {
            $array = $letters_el_capital;
        }
    } else if ($lang === "en") {
        $array = $letters_en_small;
    } else {
        $array = $letters_el_small;
    }

    // Return random key
    return GetRandomValue($array);
}

function GenerateColor() {
    $colors = [
        'white',
        'orange',
        'yellow',
        'pink',
        'green',
        'brown',
        'purple',
        'red',
        'blue',
        'black',
    ];

    return GetRandomValue($colors);
}

function GetRandomValue($array) {
    $key = array_rand(array_keys($array));
    return $array[$key];
}

function GenerateCellData() {
    $lang = GetUrlArgument('lang');
    $rand_generate = mt_rand(1,2);

    if ($rand_generate === 1) {
        return GenerateNumber();
    }

    return GenerateLetter($lang);
}

function GenerateCellStyle() {
    $bg_color = GenerateColor();
    $dark_colors = [
        "blue",
        "purple",
        "brown",
        "black",
    ];

    if (in_array($bg_color, $dark_colors)) {
        $font_color = 'white';
    } else {
        $font_color = 'black';
    }
    $style = "";
    $style .= "background-color:" . $bg_color . ";";
    $style .= "color:" . $font_color . ";";
    return $style;
}

function GenerateSingleCell() {
    return '<div class="cell" style="'.GenerateCellStyle().'">'.GenerateCellData().'</div>';
}

function GenerateCells(int $number) {
    for ($i = 0; $i <= $number; $i++) {
        print GenerateSingleCell();
    }
}

// Generate Tokens
function GenerateTokenStyle($color = "none") {
    return "background-color:" . $color . ";";
}

function GenerateSingleToken($color = "none") {
    return '<div class="token" style="'.GenerateTokenStyle($color).'"></div>';
}

function GenerateTokens(int $number) {
    $bg_colors = [
        "blue",
        "red",
        "green",
        "yellow",
        "black",
        "purple",
        "orange",
        "brown",
    ];

    $players_arg = GetUrlArgument("players");
    if (!$players_arg) {
        $players_arg = "2";
    }

    foreach ($bg_colors as $k => $color) {
        if ($k < $players_arg) {
            print "<div style='width:100%;'></div>";

            for ($i = 1; $i <= $number; $i++) {
                print GenerateSingleToken($color);
            }
        }
    }
}

// Generate Cards
function GenerateSingleCard($data) {
    $static = "";
    $static .= "<div class='card-logo'><img src='./assets/logo.svg'></div>";

    return '<div class="card">'. $static . $data .'</div>';
}

/**
 * @return string
 */
function GenerateCards() {
    global $actions;
    $actions_array = $actions;

    $cards = "";
    foreach ($actions_array as $label => $action_group) {
        foreach ($action_group as $k => $action) {
            $prefix = "Select a cell which ";
            if ($label === "draw") {
                $prefix = "Draw ";
            }

            $html_action = "<div class='card-action'><label>Action:</label>" . $prefix . $action ."</div>";
            $html_type = "<div class='card-type type-".$label."' ><label>Type:</label>". $label ."</div>";
            $html_copyright = "<div class='card-copyright'>&copy; Theodoros Ploumis 2021 - All rights reserved.</div>";

            $data = $html_action . $html_type . $html_copyright;
            $cards .= GenerateSingleCard($data);
        }
    }
    return $cards;
}

function ListFilesOnFolder() {
    $list = "<ul>";

    $fileList = glob('*\.pdf');
    foreach($fileList as $filename){
        if (is_file($filename)){
            $list .= "<li><a href='".$filename."' target='_blank'>".$filename."</a></li>";
        }
    }
    $list .= "</ul>";

    print $list;
}