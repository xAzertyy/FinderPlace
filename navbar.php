<nav id="nav"class="navbar navbar-expand-lg navbar-light bg-light-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">
      <img src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/512/map-map-marker-icon.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      FinderPlace
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav nav-underline me-auto mb-2 mb-lg-0">


        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>

        <?php
        if (isset($_SESSION['password'])) { ?>

          <li class="nav-item ">
            <a class="nav-link" href="updatedb.php">Add a marker</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="tabeldb.php">See markers</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>

        <?php } ?>

        <?php
        if (!isset($_SESSION['password'])) { ?>

          <li class="nav-item ">
            <a class="nav-link" href="login.php">Login</a>
          </li>

        <?php } ?>

      </ul>
    </div>
  </div>
</nav>