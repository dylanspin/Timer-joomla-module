<?php
    error_reporting(0);
    $moduleColor = $params->get('module_kleur');
    $moduleTextColor = $params->get('text_kleur');
    $moduleBorderColor = $params->get('border_kleur');
    $moduleHeight = $params->get('module_hoogte');
    $releaseFont = $params->get('font');
    $ImgHeight = $params->get('imgheight');
    $releaseImg = $params->get('myimage');
    $ImgFolder = $params->get('folder');
    $releaseText = $params->get('text');
    $releaseText2 = $params->get('text2');
    $releaseDate = $params->get('release');
    $releaseTijd = $params->get('releasetijd');


    $helper = new ModRelease();
    $doc = JFactory::getDocument();
    $modulePath = JURI::base() . 'modules/mod_release/';
    $doc->addStyleSheet($modulePath.'css/style.css');
    $doc->addScript($modulePath.'js/javascript.js');

    $css = "
      .release_div{
        background-color:".$moduleColor.";
        color:".$moduleTextColor.";
        border:5px solid ".$moduleBorderColor.";
      }
      .release_img{
        height:".$ImgHeight."%;
      }
      .release_text{
        font-size:".$releaseFont."px;
      }
      .release_Timer{
        border:2px solid ".$moduleBorderColor.";
      }

    ";

    $doc->addStyleDeclaration($css);

    $datum = $releaseDate." ".$releaseTijd;
    $maand = date("M ",strtotime($datum));
    $dag = date('d', strtotime($releaseDate));
    $jaar = date('Y', strtotime($releaseDate));

    $jsdatum  = $maand." ".$dag.", ".$jaar." ".$releaseTijd;

  ?>

  <script>
     var datum = new Date("<?php echo $jsdatum; ?>").getTime();

     var tijd = setInterval(function() {

     var now = new Date().getTime();

     var distance = datum - now;

     var dagen = Math.floor(distance / (1000 * 60 * 60 * 24));
     var uren = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
     var min = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
     var sec = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("timer").innerHTML = dagen + ":" + uren + ":"
    + min + ":" + sec;

    if (distance < 0) {
      clearInterval(tijd);
      document.getElementById("timer").innerHTML = "00:00:00";
      document.getElementById("release_text").innerHTML = "<?php echo $releaseText2; ?>";
    }
    }, 1000);

  </script>

  <div class="release_div">
    <?php
        echo "<img src='/~$ImgFolder/$releaseImg' class='release_img'>
              <div class='release_text' id='release_text'>
                $releaseText
              </div>";

        echo "<div class='release_Timer' id='timer'>".$dagen.":".$uren.":".$minuten."</div>"
     ?>
  </div>
