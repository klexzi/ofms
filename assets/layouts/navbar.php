    <nav class="navbar navbar-dark navbar-expand-sm  fixed-top bg-brand flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Tanta Innovative</a>
      <ul class="navbar-nav px-3 ml-auto">
        <li class="nav-item ">
        <h6 class="user-welcome">Welcome, <?php  if(isset($_SESSION['name'])) echo $_SESSION['name']; ?></h6>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white" href="/ofms/signout.php">Sign out</a>
        </li>
      </ul>
    </nav>