<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>VANESTARRE</title>
    <link type="text/css" rel="stylesheet" href="Site.css?t=<? echo time(); ?>" media="all">
</head>
<body>

<div id="main_bar">
    <h2> Vanestarre</h2>

    <!-- search bar -->
    <form id="searchbox" method="get " action="/search " autocomplete="off ">
        <input name="q " type= "text" size= "15" placeholder= "Enter keywords here… " />
        <input type="button" id="button-submit" type= "submit " value="" />
    </form>

    <div id="Profil_And_List">
            <select onChange="location = this.options[this.selectedIndex].value;">
                <option style="display: none"></option>
                <option> <a>Profil</a> </option>
                <option value="Accueil.php" >Deconnexion</option>
            </select>
    </div>

</div>

<main>
    <div id="Parent">
        <!-- Left side -->
        <div id="Left_Side">

        </div>
        <!-- Center and main-->
        <div id="Center" about="Main">


        </div>

        <!--Right Side-->
        <div id="Right_Side">

        </div>
    </div>
</main>

</body>
</html>