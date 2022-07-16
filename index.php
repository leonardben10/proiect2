<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Garajul lui Varutu</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <style type="text/css">
          *{
              margin: 0;
              padding: 0;
              box-sizing: border-box;
          }
          #btn{
            width: 50px;
            height: 25px;
            border-width: 4px;
            border-radius: 15px;
            font-size: 25px;
            font-weight: bold;
            color: #f00;
            cursor: pointer;
          }
          #btn:active{
            font-size: 23px;
          }
      </style>
  </head>
  <body background="black">
    <?php if(!isset($_SESSION['id'])) {?>
    <nav class="navbar">
      <button class="mutebutton"><a href="pagini/formularregister.php">INREGISTREAZA-TE</a></button>
      <button id="stopvideo" class="mutebutton" onclick="functiestopvideo()">OPRESTE VIDEO</button>
      <a href="index.php"><img src="images/bmwtzu.gif" class="logo"></a>
      <button id="mutesound" class="mutebutton" onclick="functiemut()">OPRESTE SUNET</button>
      <button class="mutebutton"><a href="pagini/formularlogin.php">LOGHEAZA-TE</a></button>
        </nav>
    <?php }else{?>
      <nav class="navbar">
      <button class="mutebutton"><?php $uppercase = strtoupper($_SESSION['prenume']); echo $uppercase;?></button>
      <button id="stopvideo" class="mutebutton" onclick="functiestopvideo()">OPRESTE VIDEO</button>
      <a href="index.php"><img src="images/bmwtzu.gif" class="logo"></a>
      <button id="mutesound" class="mutebutton" onclick="functiemut()">OPRESTE SUNET</button>
      <button class="mutebutton"><a href="scripturi/logout.php">DELOGHEAZA-TE</a></button>
        </nav>
    <?php }?>

    <?php if(isset($_GET['success'])) {?>
        <p class="mesajdesucces"><?php echo $_GET['success']; ?></p>
    <?php }?>

    <div class="hero">
      <video id="herovideo" autoplay loop class="back-video">
        <source src="images/bmw1.mp4" type="video/mp4">
      </video>

      <div class="content">
        <h1>Văruțu Garage</h1>
        <a href="#imagini">Garage</a>
      </div>
    </div>

    <div class="wrapcategorii">
    <div class="exemplecategorii" id="imagini">
      <div class="categorie" style="background-image:url(images/bodykit.jpg)">
        <div class="textcategorie">Tuning</div>
      </div>
      <div class="categorie" style="background-image:url(images/colantare.png)">
        <div class="textcategorie">Colantare</div>
      </div>
      <div class="categorie" style="background-image:url(images/softarabesc.jpg)">
        <div class="textcategorie">Soft arăbesc</div>
      </div>
    </div>
    </div>
    <div class="footer">
    <p class="telefon">Telefon:<a class="numar" href="#telefon">+40 7543 412 98</a></br></br></p> 
    </div>
    <div class="formwrap">
    <form action="" method="post">
      <h2>Lasa ne parerea ta aici :</h2>
      <input type="text" name="recenzie">
      <button type="submit">Trimite sondajul</button>
    </form>
    </div>
    <script type="text/Javascript">
      var video = document.getElementById("herovideo");
      var btn = document.getElementById("mutesound");
      var btn2 = document.getElementById("stopvideo");
    
      function functiemut() {
         video.muted = !video.muted;
         btn.innerHTML = video.muted ? "PORNEȘTE SUNET":'OPREȘTE SUNET';
      }

      function functiestopvideo(){
        if(video.paused) {
          video.play();
          btn2.innerHTML = "OPREȘTE VIDEO";
        }else{
          video.pause();
          btn2.innerHTML = "PORNEȘTE VIDEO";
        }
      }
    </script>
    
  </body>
</html>