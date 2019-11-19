<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>

  <link href="./assets/css/reset.css" rel='stylesheet'>
  <link href="./assets/css/site.css" rel='stylesheet'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/724ab74602.js" crossorigin="anonymous"></script>
  
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title><?=$locals['title']?></title>
  <title>Rapid Starter Project</title>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <ul class="list-unstyled components">
          <li>
            <a href="<?=APP_BASE_URL?>/">
              <i class="fas fa-home"></i>
              Home
            </a>
          </li>
          <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-donate"></i>
                    Communities
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="<?=APP_BASE_URL?>/Posts">Charities</a>
                    </li>
                    <li>
                        <a href="<?=APP_BASE_URL?>/Posts">Events</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?=APP_BASE_URL?>/About">
                    <i class="fas fa-briefcase"></i>
                    About
                </a>
            </li>
            <li>
              <a href="<?=APP_BASE_URL?>/Profile">
                <i class="fas fa-user"></i>
                Profile
              </a>
            </li>
        </ul>

    </nav>
  <div class="container-fluid">
    <div class="row CA-headerrow">
      <nav class="navbar navbar-expand-lg navbar bg">
          <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-bars"></i>
          </button> 
      </nav>
      <h1>Charitable</h1>
    </div>
    <div class="row">
      <div class="col-6">
        <p></p>
      </div>
      
    </div>
    <div class="row CA-MainRow">
    <div class="col-1">

    </div>
      <div class="col-10 CA-MainContent">
        <?= \Rapid\Renderer::VIEW_PLACEHOLDER ?>
      </div>
      <div class="col-1">
      </div>
    </div>
  </div>
</div>
  








<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script>
  $(document).ready(function () {

  $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

  });
</script>
</body>
</html>
