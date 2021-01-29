
    <?php //<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          session_start();
    ?>


<div id="main_bar">
    <h2><b> <a href="./flux"> Vanestarre </a> </b></h2>

    <!-- search bar -->
    <form id="searchbox" method="post" action="index.php?ctrl=flux&action=search" autocomplete="on">
        <input name="tag" type= "text" placeholder="Chercher par tag" />
    </form>

    <?php if(isset($_SESSION['id'])) { ?>
      <div id="Profil_And_List">
              <select onChange="location = this.options[this.selectedIndex].value; ">
                  <option style="display: none"></option>
                  <option disabled> <?php echo 'Connecté en tant que '.$_SESSION['username'] ?> </option>
                  <option value="index.php?ctrl=user&action=modify"> Profil </option>
                  <option value="index.php?ctrl=login&action=logout" >Deconnexion</option>
                  <?php if(isset($_SESSION['admin']) && $_SESSION['admin']) { ?>
                    <option value="index.php?ctrl=article"> Poster un article </option>
                  <?php } ?>

              </select>
      </div>
    <?php
      }
      else {
        ?>
          <div id="Profil_And_List">
            <button type="button" name="button"> <a href="index.php?ctrl=login"> Connexion </a> </button>
            <button type="button" name="button"> <a href="index.php?ctrl=register"> Inscription </a> </button>
          </div>
        <?php
      }
     ?>

</div>

<main>
    <div id="Parent">
        <!-- Left side -->
        <div id="Left_Side">

        </div>
        <!-- Center and main-->
        <div id="Center" >

          <?php foreach($A_vue['articles'] as $nbr => $article) { ?>

          <div class="global_post" id="<?php echo $article['id']; ?>">
              <!-- header -->
              <?php if(isset($_SESSION['admin']) && $_SESSION['admin']) {
                ?>
                  <button class='delete' type="button" name="button"> <a href="index.php?ctrl=article&action=delete&id=<?= $article['id'] ?>"> X </a> </button>
                <?php
              } ?>

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
                <div class="main_post_img " style="content: url(<?php echo $article['img_source'] ?>)"></div>
                <div class="main_post_text" >
                  <span class="text_span"> <?php echo $article['message'] ?> </span>

                    <div class="mini_div_hr"></div>

                    <span class="tag_span" >
                      <b> <?php echo $article['tag'] ?> </b>
                    </span>
                </div>
              </div>
            <div class="footer_post">

              <?php
                foreach(array('style', 'swag', 'cute', 'love') as $EmojiKey => $emojiName) {
              ?>

               <div id="<? echo $EmojiName; ?>">
                                <span > <a class="emoji_<?php echo $emojiName;?>" href="index.php?ctrl=emoji&action=click&id=<?php echo $article['id']; ?>&emoji=<?php echo $emojiName; ?>" ></a> </span>
                            </div>
                            <span class="compteur"> <?= $article['nbr'][$emojiName]; ?> </span>

              <?php } ?>

            </div>
          </div>

        <?php } ?>

        </div>
		
    <div id="Right_Side">

    </div>

        </div>








</main>



</body>
</html>
