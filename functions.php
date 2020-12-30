<?php

// "Select a Cell which: "
global $actions;


function GenerateCardData() {
    $actions = [
        'maths',
        'logic',
        'position',
        'draw',
    ];


// Draw
    $action_draw = [
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
    ];

    $action_position = [
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
    ];

    $action_logic = [
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
    ];

    $action_maths = [
        'is an even number',
        'is an odd number',
        'is a number of sequence 2n+1 (n integer)',
        'is a number of sequence n+3 (n integer)',
        'has a number greater than 40',
        'has a number less than 40',
        'has a number between 20 and 80',
        'has a number which contains digit 3 (eg 35, 13 etc)',
        'has a number that contains a digit which was also found on your last number cell (eg 13, 36, 65, 51 etc)'
    ];

    $action = GetRandomValue($actions);
    $array = [];

    if ($action === "logic") {
        $array = $action_logic;
    } elseif ($action === "draw") {
        $array = $action_draw;
    } elseif ($action === "maths") {
        $array = $action_maths;
    } elseif ($action === "position") {
        $array = $action_position;
    }

    return "Select a cell which " . GetRandomValue($array);
}

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
    $rand_generate = mt_rand(1,2);

    if ($rand_generate === 1) {
        return GenerateNumber();
    }

    return GenerateLetter('el');
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

function GenerateSingleCard() {
    return '<div class="card">'.GenerateCardData().'</div>';
}

function GenerateCards(int $number) {
    for ($i = 0; $i <= $number; $i++) {
        print GenerateSingleCard();
    }
}
