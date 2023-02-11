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

        h3, h4 {
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
            cursor: pointer;
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
        <h4><a href="https://github.com/theodorosploumis/game-guess">theodorosploumis/game-guess</a></h4>
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
                <form class="form-option" action="tokens.php" target="_blank">
                    <select name="players" id="players" class="select-clear">
                        <option value="2">2 Players</option>
                        <option value="3">3 Players</option>
                        <option value="4">4 Players</option>
                        <option value="5">5 Players</option>
                        <option value="6">6 Players</option>
                        <option value="7">7 Players</option>
                        <option value="8">8 Players</option>
                    </select>
                    <input type="submit" class="option-board option-token" value="Generate Tokens">
                </form>
            </div>
        </div>
        <hr>
        <div class="copyright">Copyright 2021 - <?php echo date("Y") ?> Theodoros Ploumis - All rights reserved</div>
    </div>
</body>
</html>