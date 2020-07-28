<!DOCTYPE HTML>
<html>
  <head>
      <title>Labas <?php echo $data['kreipinys'];?>!</title>
      <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
      <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />
      <link rel='icon' href='includes/images/hearts.png' type='image/x-icon'/ >
      <link rel="stylesheet" type="text/css" href="includes/styles/style.style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php echo '<script>
                    var session = "' . $session . '",
                    pass = "' . $data['pass'] . '",
                    emailAddress = "' . $data['email'] . '",
                    visitorName = "' . $data['name'] . '"
                  </script>'; ?>
  </head>
  <body>
    <div class="nes-container with-title is-centered">
      <div class="title">Labas <?php echo $data['kreipinys'];?>!</div>
      <?php
        $result = $this -> connect() -> query("SELECT * FROM " . $this->textsTable . " WHERE pass='" . $data['pass'] . "'" );
        $q = mysqli_num_rows($result);
        $n = 1;
        for ( $i=0 ; $i < $q ; $i++ ) {
          echo '
          <div class="message nes-balloon from-left"></div>
          <div class="answer nes-balloon from-right">
            <div class="options">
              <button type="button" onclick="communicate('. $n .')" class="nes-btn is-success answerY"></button>
              <button type="button" onclick="no('. $i .')" class="nes-btn is-error answerN"></button>
            </div>
          </div>
          ';
          $n++;
        }
      ?>
      <div id="footer"></div>
    </div>
      <?php
        $result = $this -> connect() -> query("SELECT * FROM " . $this->textsTable . " WHERE pass='" . $data['pass'] . "'" );
        $q = mysqli_num_rows($result);
        echo '<script> var messages = { text : {';
              for ($i = 0 ; $i < $q ; $i++ ){
                $texts= mysqli_fetch_assoc($result);
                echo $i.' : "'.$texts['text'].'"';
                if ( $i+1 != $q ){ echo ','; }
              }
              mysqli_data_seek($result,0);
        echo '}, answerY : { ';
              for ($i = 0 ; $i < $q ; $i++ ){
                $texts= mysqli_fetch_assoc($result);
                echo $i.' : "'.$texts['yes'].'"';
                if ( $i+1 != $q ){ echo ','; }
              }
              mysqli_data_seek($result,0);
        echo '}, answerN : { ';
              for ($i = 0 ; $i < $q ; $i++ ){
                $texts= mysqli_fetch_assoc($result);
                echo $i.' : "'.$texts['no'].'"';
                if ( $i+1 != $q ){ echo ','; }
              }
        echo '} }; </script>';
      ?>
    <script src="includes/scripts/script.script.js"></script>
  </body>
</html>
