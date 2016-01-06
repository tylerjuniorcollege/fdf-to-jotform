<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?= $data['title']?>">
    <meta name="author" content="Tyler Junior College">
    <link rel="Shortcut Icon" type="image/x-icon" href="/favicon.ico" />

    <title><?= $data['title']; ?> - Tyler Junior College</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
    background-color: #333333;
    }
  
  #header {
    height: 54px;
    background: url("http://www.tjc.edu/site/styles/css_img/mastBg.gif") center top #393939;
    border-top: 7px solid #000000;
    padding: 10px;
    margin: 0 -15px 10px;
    height: 81px;
    text-align: left;
    }

  #logo {
    background: url('http://www.tjc.edu/images/tjc_logo.png') no-repeat ;
    height: 74px;
    }

  .container {
    background-color: #ffffff;
    border-bottom: 7px solid #000000;
    -webkit-box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75);
    box-shadow: 0px 0px 16px 0px rgba(0,0,0,0.75);
    }

  .page-header {
    padding: 0 15px;
    margin-top: 20px;
    }
  
  .form-group {
    padding-right: 15px;
    }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div id="header">
        <a href="http://www.tjc.edu" title="Tyler Junior College Homepage">
          <div id="logo"></div>
        </a>
      </div>
<?= $data['content']; ?>
    </div>
  </body>
</html>