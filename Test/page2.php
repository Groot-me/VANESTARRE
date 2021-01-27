<?php


if(!isset($A_vue))
{

    echo 'que fait tu la ?';
    die();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">

    <title>Overflow Page 1</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="insta.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

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

        <div class="main_post_img " style="content: url(<?php echo $A_vue['url'] ?>)"></div>
        <div class="main_post_text" >
                        <span class="text_span">
                            <?php echo $A_vue['text'] ?>
                        </span>

            <div class="mini_div_hr"></div>

            <span class="tag_span" >
                            <b>
                                <?php echo $A_vue['tag'] ?>
                            </b>
                        </span>
        </div>

    </div>
    <!-- footer -->


    <script>

        function emoji(emoji,id)
        {
            $.ajax({
                url: 'ajax.php?emoji='+emoji+'&id='+id,
                type: 'GET',
                dataType: 'JSON',

                success: function(response) {

                        var len = Object.keys(response).length;

                        if(len == 1)
                        {
                            var erreur = response.error;
                            alert(erreur);

                        }else
                        {
                            var id = response.id;
                            var nomemoji = response.emoji;
                            var plusorminus = response.result;

                            if(plusorminus == 'plus')
                            {
                                //ajoute 1
                                var valeur = document.getElementById('increment_'+nomemoji+'_'+id).innerHTML ;
                                var valeur = parseInt(valeur) + 1 ;
                                document.getElementById('increment_'+nomemoji+'_'+id).innerHTML='';
                                document.getElementById('increment_'+nomemoji+'_'+id).innerHTML=valeur;
                            }
                            else
                            {
                                //enleve 1
                                var valeur = document.getElementById('increment_'+nomemoji+'_'+id).innerHTML ;
                                var valeur = parseInt(valeur) - 1 ;
                                if(valeur < 0)
                                {
                                    alert('Comment on en est arrivé la ?');
                                }else
                                {
                                    document.getElementById('increment_'+nomemoji+'_'+id).innerHTML='';
                                    document.getElementById('increment_'+nomemoji+'_'+id).innerHTML=valeur;

                                }


                            }
                        }

                }

            });




        }


    </script>

    <div class="footer_post">

        <div class="emoji_love" onclick="emoji('love', <?=$A_vue['id']?>)"> </div>
        <span id="increment_love_<?= $A_vue['id']?>">
            <?php echo $A_vue['nb_love'] ?>
        </span>
        <span> Love </span>

        <div class="emoji_cute" onclick="emoji('cute', <?=$A_vue['id']?>)"> </div>
        <span id="increment_cute_<?= $A_vue['id']?>">
            <?php echo $A_vue['nb_cute'] ?>
        </span>
        <span> cute </span>

        <div class="emoji_style" onclick="emoji('style', <?=$A_vue['id']?>)"> </div>
        <span id="increment_style_<?= $A_vue['id']?>">
            <?php echo $A_vue['nb_style'] ?>
        </span>
        <span> style </span>

        <div class="emoji_swag" onclick="emoji('swag',<?=$A_vue['id']?> )"> </div>
        <span id="increment_swag_<?= $A_vue['id']?>">
            <?= $A_vue['nb_swag'] ?>
        </span>
        <span> swag </span>

    </div>

</div>



</body>
</html>


