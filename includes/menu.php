<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-right">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="index.php">Home</a></li>
            <li><a href="#">Feed</a></li>
            <li><a href="wines.php">Wines</a></li>
            <?php if( $_SESSION['username'] ) { ?>
              <li><a href="logout.php">Logout</a></li>
          <?php  } ?>
        </ul>

    </div>
</nav>
