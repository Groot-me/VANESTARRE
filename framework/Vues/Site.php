<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>VANESTARRE</title>
    <link type="text/css" rel="stylesheet" href="Site.css?t=<? echo time(); ?>" media="all">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                <option> Profil </option>
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
        <div id="Center" >


            <?php

            $db = new PDO('mysql:host=localhost;dbname=article;charset=utf8','root','');
            $articleparpages = 1;

            $req = 'SELECT id FROM articles';
            $ArticlesTotalsReq = $db->prepare($req);
            $ArticlesTotalsReq->execute();

            $ArticlesTotals = $ArticlesTotalsReq->rowCount();

            $pagesTotales = ceil($ArticlesTotals/$articleparpages);

            if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pagesTotales) {
                $_GET['page'] = intval($_GET['page']);
                $pageCourante = $_GET['page'];
            } else {
                $pageCourante = 1;
            }


            $depart = ($pageCourante-1)*$articleparpages;


            $req = 'SELECT img_source,tag,message FROM articles ORDER BY id DESC LIMIT '.$depart.','.$articleparpages;

            $result = $db->prepare($req);
            $result->execute();


            while($article = $result->fetch(PDO::FETCH_ASSOC))
            {
                ?>

            <div class="global_post">
                <!-- header -->
                <div class="header_post">
                    <img src="https://i.imgur.com/aq39RMA.jpg">
                    <span>
                        <b>
                            Vanestarre
                        </b>
                    </span>
                </div>
                <!-- main -->
                <div class="main_post" >

                <div class="main_post_img " style="content: url(<?php echo $article['img_source'] ?> )"></div>
                    <div class="main_post_text" >
                        <span class="text_span">
                            <?php echo $article['message']; ?>
                        </span>

                        <div class="mini_div_hr"></div>

                        <span class="tag_span" >
                            <b>
                                 <?php echo $article['tag']; ?>
                            </b>
                        </span>
                    </div>

                </div>
                <!-- footer -->
                <div class="footer_post">

                    <div class="emoji_love"> </div>
                    <span> 0 Love </span>
                    <div class="emoji_cute"> </div>
                    <span> 0 cute </span>
                    <div class="emoji_style"> </div>
                    <span> 0 style </span>
                    <div class="emoji_swag"> </div>
                    <span> swag </span>

                </div>

            </div>


            <?php } ?>

        </div> <!-- id='Center' -->

        <div id="pagination">
            <?php
            for($i=0;$i<=$pagesTotales;$i++) {
                if($i == $pageCourante) {
                    echo $i.' ';

                } elseif ($i == $pageCourante+1) {
                    echo '<a href="Site.php?page='.$i.' " class="suivant" >'.$i.'</a> ';

                } else {
                    echo '<a href="Site.php?page='.$i.'"  >'.$i.'</a> ';
                }
            }
            ?>

        </div>

        <!--Right Side-->
        <div id="Right_Side"> </div>


    </div> <!-- div Parent --->


</main>


<script src="https://unpkg.com/@webcreate/infinite-ajax-scroll/dist/infinite-ajax-scroll.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

<script>   let ias = new InfiniteAjaxScroll('#Center', {

        scrollContainer: '#Center',
        item: '.global_post',
        next: '.suivant',
        pagination: '#pagination'

    });



</script>



</body>
</html>