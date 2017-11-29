   <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink"id="mainNav">
  <div class="container">
  <a class="navbar-brand" href="index.php">Hamann Intern - <?php echo "$_SESSION[username]" ;?></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="resources/lib/login/logout.php">Logout</a>
            </li>
          </ul>
        </div>
  </div>
  </nav>