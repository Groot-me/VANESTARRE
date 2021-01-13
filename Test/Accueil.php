<?php
require 'function.php';
start_page('VANESTARRE _ Connexion ou Inscription');
?>
    <h1>VANESTARRE</h1>
    <div class="form">
        <form id="form" action="" method="post">
            <input type="text" placeholder="Identifiant" name="uname" required> <br>
            <input type="password" placeholder="Mot de passe" name="psw" required>

            <div class="submit">
                <input type="submit" value="Connexion">
            </div>
            <a id="forgot" href="">Mot de passe oublié ?</a>
        </form>
    </div>

    <style>
        body {
            width: 100%;
            height: 100%;
            font-family: "Avenir", Helvetica, Arial, sans-serif;
        }

        html, body, div {
            margin: 0;
            padding: 0;
            border: 0;
            font: inherit;
            font-size: 100%;
            vertical-align: baseline;
        }

        #form {
            position: absolute;
            font-family: "Avenir";
            color: rgb(0, 114, 163);
            top: 35%;
            left: 41.5%;
            background-color: transparent;
            padding: 30px 60px;
            border: 1px solid #335D95;
            border-radius: 10px;
            box-shadow: 0 5px 15px -5px black;
        }

        input[type="submit"] {
            width: 200px;
            height: 40px;
            border: 1px solid #335D95;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            box-shadow: 0 5px 15px -5px #335D95;
            margin-bottom: 20px;
            font-style: italic;
            color: white;
            background-color: #335D95;
        }

        .form input[type="text"] {
            margin-bottom: 10px;
            padding-left: 20px;
            width: 180px;
            height: 40px;
            border: 1px solid #335D95;
            border-radius: 10px;
            font-size: 14px;
            color: #335D95;
        }

        #forgot {
            text-decoration: none;
            font-size: 14px;
            color: #335D95;
            font-weight: bold;
            position: absolute;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            font-family: 'Avenir';
            color: #335D95;
            font-size: 50px;
            width: 333px;
            margin-left: auto;
            margin-right: auto;
        }

    </style>

<?php
end_page();
?>