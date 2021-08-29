<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
  <a class="navbar-brand" href="./index.php">Rezerwacje</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Rezerwacja sali</span></a>
      </li>
      <?php 
        if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {
          echo '
            <li class="nav-item">
              <a class="nav-link" href="./all_reservations.php">Wszystkie rezerwacje</span></a>
            </li>
          ';
        }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Wyloguj</a>
      </li>
    </ul>
  </div>
</nav>