
    <?php //<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          session_start();
    ?>


<div id="main_bar">
    <h2> Vanestarre</h2>

    <!-- search bar -->
    <form id="searchbox" method="get " action="/search " autocomplete="off ">
        <input name="q " type= "text" size= "15" placeholder= "Enter keywords here… " />
        <input type="button" id="button-submit" type= "submit " value="" />
    </form>

    <?php if(isset($_SESSION['id'])) { ?>
      <div id="Profil_And_List">
              <select onChange="location = this.options[this.selectedIndex].value;">
                  <option style="display: none"></option>
                  <option> <?php echo 'Connecté en tant que '.$_SESSION['username'] ?> </option>
                  <option value="index.php?ctrl=user&action=modify"> Profil </option>
                  <option value="index.php?ctrl=login&action=logout" >Deconnexion</option>
                  <?php if(isset($_SESSION['admin']) && $_SESSION['adin']) { ?>
                    <optio> Poster un article </option>
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
            <div class="main_post_img " style="content: url(<?php echo $article['img_source'] ?>)"></div>
            <div class="main_post_text" >
              <span class="text_span"> <?php echo $article['message'] ?> </span>

                <div class="mini_div_hr"></div>

                <span class="tag_span" >
                  <b> <?php echo $article['tag'] ?> </b>
                </span>
            </div>

            <div class="footer_post">

              <?php
                foreach(array('style', 'swag', 'cute', 'love') as $EmojiKey => $emojiName) {
              ?>

                <div id="<? echo $EmojiName; ?>">
                  <span class="emoji"> <a href="index.php?ctrl=emoji&action=click&id=<?php echo $article['id']; ?>&emoji=<?php echo $emojiName; ?>"> E </a> </span>
                  <span class="compteur"> <?= $article['nbr'][$emojiName]; ?> </span>
                </div>

              <?php } ?>

            </div>
          </div>

        <?php } ?>


        <div class="pagination">
          <?php for($i = 1; $i < sizeof($A_vue['articles'])/3+1; ++$i) {
            echo $i;
          } ?>
        </div>

        </div>


        </div>






</main>



</body>
</html>
