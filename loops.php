<?php


function newMembers() {
  include('./conn.php');
  $sql = ("SELECT username FROM users LIMIT 5");
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($username);
  while($stmt->fetch()) { ?>
    <li><?= $username ?></li>
<?php  }
}


function sidebarWines() {
  include('./conn.php');
  $sql = ("SELECT wineid, wine_name, wine_date FROM wines LIMIT 5");
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($wineid, $wine_name, $wine_date);
  while($stmt->fetch()) { ?>
    <li><?= $wine_name ?><br/><?= $wine_date ?></li>
<?php  }
};


function allWines() {
  include('conn.php');
  $sql = ("SELECT wines.*, users.userid, users.username FROM wines JOIN users WHERE users_userid = users.userid");
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($wineid, $wine_name, $wine_region_country, $wine_grapes, $wine_year, $wine_volume, $wine_size, $wine_price, $wine_real_price, $wine_date, $wine_img, $user_userid, $userid, $username);
  while($stmt->fetch()) { ?>
  <div class="feed-wines">
    <div class="feed-wines-box uk-flex uk-flex-wrap wine-<?= $wineid ?>">
          <div class="uk-width-1-2">
            <div class="wine-left">
            <span class="wineinfo">Title: </span>
            <h3><?= $wine_name ?></h3>
            <i class="fas fa-globe-africa"></i> <span class="wineinfo">Region & Country: </span>
            <p><a href="https://www.google.com/maps/search/<?= $wine_region_country ?>/"><?= $wine_region_country ?></a></p>
            <i class="fas fa-wine-glass-alt"></i> <span class="wineinfo">Wine Grape(s) </span>
            <p><?= $wine_grapes ?></p>

            <span class="wineinfo">Wine year</span>
            <p><?= $wine_year ?></p>

            <div class="uk-width-1-1 uk-flex uk-flex-wrap">

            <div class="uk-width-1-2">
              <span class="wineinfo">Volume % </span>
              <p><?= $wine_volume ?> %</p>
            </div>

            <div class="uk-width-1-2">
              <span class="wineinfo">Size cl </span>
              <p><?= $wine_size ?> cl</p>
            </div>

            </div>

            <div class="uk-width-1-1 uk-flex uk-flex-wrap">

            <div class="uk-width-1-2">
              <i class="fas fa-money-bill"></i> <span class="wineinfo">Price </span>
              <p><?= $wine_price ?> Kr</p>
            </div>

            <div class="uk-width-1-2">
              <i class="fas fa-money-bill"></i> <span class="wineinfo">Real Price </span>
              <p><?= $wine_real_price ?> Kr</p>
            </div>

            </div>


            </div>
            </div>
          <div class="uk-width-1-2">
            <div class="wine-right">

              <div class="uk-width-1-1 uk-flex uk-flex-wrap">

              <div class="uk-width-1-2 winedate">
                <span class="wineinfo"><i class="fas fa-shopping-cart"></i> Bought By: <?= $username ?></span>
              </div>

              <div class="uk-width-1-2 winedate">
                <span class="wineinfo"><i class="far fa-calendar"></i> <?= $wine_date ?> </span>
              </div>

              </div>

              <img src="img/vin.png" alt="Vin">
            </div>
          </div>
      </div>
    </div>

    <div class="givestars">
      <p>I give: ..
          <input type="hidden" id="userid" value="<?= $user_userid ?>">
          <input type="hidden" id="wineid" value="<?= $wineid ?>">
          <input type="text" id="userstars">
          <button class="submitstars">Submit my rating</button>
      </p>
    </div>
    <div id="allratinga">Hallo</div>
<?php  }
}


?>