<!DOCTYPE HTML>
<html>
  <head>
      <title>Hello!</title>
      <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
      <link href="https://unpkg.com/nes.css/css/nes.css" rel="stylesheet" />
      <link rel='icon' href='includes/images/hearts.png' type='image/x-icon'/ >
      <link rel="stylesheet" type="text/css" href="includes/styles/style.style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="nes-container with-title is-centered">
      <p class="title">Login Error</p>
      <p class="loginText">Sorry, you need a special code to see the inivitation.</p>
      <p class="loginText">I have a code!</p>
      <div class="nes-field">
        <form action="index.php" method="get">
          <input type="text" name="pass" class="nes-input" placeholder="Special code:" onclick="placeholder=''">
        </form>
      </div>
      <?php if (isset($error)) { if ($error == 1) { echo '<p class="is-error">Wrong code. Sorry.</p>'; } }?>
      <p class="loginText">Ask for special code:</p>
      <div class="nes-field">
        <form action="index.php" method="get">
          <input type="text" name="phone" class="nes-input" placeholder="Your phone number:" onclick="placeholder=''">
        </form>
      </div>
      <?php if (isset($error)) { if ($error == 2) { echo '<p class="is-success">Message sent. I will contact you.</p>'; } } ?>
    </div>
  </body>
</html>
