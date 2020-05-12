<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Weer Online</title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>







    
    <div class="container">
      <div class="contain">
        <h3>vul hier uw plaats in</h3>
        <form class="" action="" method="post">
          <input class="text" type="text" name="plaats" placeholder="Plaats">
          <input class="submit" type="submit" name="submit" value="submit">
        </form>
      </div>
    </div>

    <?php
    if (isset($_POST["submit"])) {
      if ($_POST["plaats"] !== "") {
        $JSON = file_get_contents('http://weerlive.nl/api/json-data-10min.php?key=edad7c4b3c&locatie=' .$_POST["plaats"]);
        $text = json_decode($JSON ,true);
        $array = $text['liveweer'][0];
        echo "<div class=\"dingens\">";
        echo "<h2>"."Het weer in " .$array['plaats'] ."</h2>" ."<p>";
        echo "<img class=\"radar\" src=http://windwatch.net/weer/items/knmiradar.gif alt=\"weer radar\" width=\" 250px\" height=\"250px\">" ."<br>";
        echo "<img src=\"icons/" .$array['image'] .".png\"" ."alt=\"foto weersomstadigheden\" width=\"75px\" height=\"75px\">" ."<br>";
        echo $array['samenv'] ."<br>";
        echo "Actuele Temparatuur = " .$array['temp'] ."<br>";
        echo "Gevoelstemparatuur = " .$array['gtemp'] ."<br>";
        echo "Windrichting = " .$array['windr'] ."<br>";
        echo "Windkracht = " .$array['winds'] ."<br>" ."</p>";
        echo "</div>";
      }
    }
   ?>
  </body>
</html>
