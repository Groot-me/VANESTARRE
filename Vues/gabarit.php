<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link type="text/css" rel="stylesheet" href="Vues/flux/style.css" media="all">

    </head>
    <body>
        <?php Vue::montrer('standard/entete'); ?>
        <?php echo $A_vue['body'] ?>
        <?php Vue::montrer('standard/pied'); ?>
    </body>
</html>
