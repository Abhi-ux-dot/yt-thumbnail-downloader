<?php
  if(isset($_POST['button'])){
    $imgUrl = $_POST['imgurl'];
    $ch = curl_init($imgUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $download = curl_exec($ch);
    curl_close($ch);
    header('Content-type: image/jpg');
    header('Content-Disposition: attachment;filename="thumbnail.jpg"');
    echo $download;
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Download Youtube thumbnails</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <form 
    action="<?php echo $_SERVER['PHP_SELF'] ?>" 
    method="POST">
      <h2>Download Thumbnail</h2>
      <div class="url-input">
        <span class="title">Paste URL:👇</span>
        <div class="field">
          <input
            type="text"
            placeholder="https://www.youtube.com/watch?v=example"
            required
          />
          <input type="hidden" class="hidden-input" name="imgurl"/>
        </div>
      </div>
      <div class="preview-window">
        <img src="" alt="" class="thumbnail" />
        <i class="icon fas fa-file-download"></i>
        <span>Paste video URL to see preview</span>
      </div>
      <button class="download-btn" type="submit" name="button">Download</button>
    </form>

    <script src="script.js"></script>
  </body>
</html>
