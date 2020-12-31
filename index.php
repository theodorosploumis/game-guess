<html>
<head>
    <title>
        Guess my Play - A board game for maths, logic and imagination.
    </title>

    <style>
        body {
            font-family: sans-serif;
            background: #dddddd;
        }

        .page {
            max-width: 800px;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin: 40px 0;
        }

        h3 {
            text-align: center;
        }

        .logo {
            width: 300px;
            height: auto;
        }

        .logo-wrapper {
            text-align: center;
            margin: 20px 0;
        }

        li {
            margin-bottom: 10px;
        }

        .select-clear {
            display: block;
            margin: auto;
        }

        .options {
            text-align: center;
            margin: 50px auto;
            font-size: 20px;
        }

        .option {
            margin: 2px;
            display: inline-block;
        }

        .option-board {
            font-size: 20px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            margin: 10px;
            padding: 10px 20px;
            background: #f74000;
            border: 3px solid #fff;
            box-shadow: 0 0 5px 0 #8a8a8a;
            border-radius: 5px;
        }

        .option-card {
            background: #0d56ff;
        }

        .option-token {
            color: #3d3d3d;
            background: #fef40a;
        }

        .copyright {
            text-align: center;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="logo-wrapper"><a href="./"><img class="logo" src="./assets/logo.svg" alt="Logo"></a></div>
        <h3>A printable board game for maths, logic and imagination.</h3>
        <hr>
        <ul>
            <li><a target="_blank" href="https://github.com/theodorosploumis/game-guess/blob/master/README.md">Rules/Gameplay</a></li>
            <li><a target="_blank" href="./boards/">Asset examples: Boards</a></li>
            <li><a target="_blank" href="./cards/">Asset examples: Cards</a></li>
            <li><a target="_blank" href="./tokens/">Asset examples: Tokens</a></li>
        </ul>
        <hr>
        <div class="options">
            <div class="option">
                <form class="form-option" action="board.php" target="_blank">
                    <select name="lang" id="lang" class="select-clear">
                        <option value="en">English</option>
                        <option value="el">Greek</option>
                    </select>
                    <input type="submit" class="option-board" value="Generate Board">
                </form>
            </div>
            <div class="option">
                <a href="cards.php" class="option-board option-card" target="_blank">Generate Cards</a>
            </div>
            <div class="option">
                <a href="tokens.php" class="option-board option-token" target="_blank">Generate Tokens</a>
            </div>
        </div>
        <hr>
        <div class="copyright">Copyright 2021 Theodoros Ploumis - All rights reserved</div>
    </div>
</body>
</html>