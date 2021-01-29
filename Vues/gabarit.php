<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<!-- Css Modifier profil -->
		<link type="text/css" rel="stylesheet" href="Vues/user/modify.css" media="all">
		
		<!-- Css flux  -->
		<link type="text/css" rel="stylesheet" href="Vues/flux/style.css" media="all">
		
		<!-- Css login/register -->
		<link type="text/css" rel="stylesheet" href="Vues/login/style.css" media="all">

		<!-- Css creation article -->
		<link type="text/css" rel="stylesheet" href="Vues/article/style.css" media="all">
		

    </head>
    <body>
        <?php Vue::montrer('standard/entete'); ?>
        <?php echo $A_vue['body'] ?>
        <?php Vue::montrer('standard/pied'); ?>
    </body>
</html>
