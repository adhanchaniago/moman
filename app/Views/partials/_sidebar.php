<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);
  if($currect_page == $url){
      echo 'active'; //class name in css
  }
}

function check($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);
  if($currect_page == $url){
      return true;
  }else{
    return false;
  }
}
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item nav-profile" style="margin-top: 5%">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="images/faces/face1.jpg" alt="profile">
          <span class="login-status online"></span> <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">Please Login</span>
          <span class="text-secondary text-small">You're not logged in</span>
        </div>
        <!-- <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i> -->
      </a>
    </li>

    <?php if(check('maps') == true){ ?>

    <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <div class="border-bottom">
          <h6 class="font-weight-normal mb-2"><b>Maps</b></h6>
        </div>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#filter" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Filter</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="filter">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item" style="margin: 3%;">
                <input type="text" class="form-control" placeholder="Name">
              </li>
              <li class="nav-item" style="margin: 3%;">
                <select class="form-control">
                  <option value="semua">All Worship Place</option>
                  <option value="masjid">Masjid</option>
                  <option value="mushalla">Mushalla</option>
                </select>
              </li>
              <li class="nav-item" style="margin: 3%">
                <select class="form-control">
                  <option value="semua">All Facility</option>
                  <option value="mukenah">Mukenah</option>
                  <option value="tempat whudu">Whudu Place</option>
                </select>
              </li>
              <li class="nav-item" style="margin: 3%">
                <select class="form-control">
                  <option value="semua">All District</option>
                  <option value="">Air Manis</option>
                  <option value="">Mata Air</option>
                  <option value="">Alang Laweh</option>
                  <option value="">Batang Arau</option>
                  <option value="">Belakang Pondok</option>
                  <option value="">Bukit Gado-gado</option>
                  <option value="">Pasar Gadang</option>
                  <option value="">Ranah Parak Rumbio</option>
                  <option value="">Rawang</option>
                  <option value="">Seberang Padang</option>
                  <option value="">Seberang Palinggam</option>
                  <option value="">Teluk Bayur</option>
                </select>
              </li>
              <li class="nav-item" style="margin: 3%">
                <select class="form-control">
                  <option value="semua">All Parking Area</option>
                  <option value="1">0 - 50</option>
                  <option value="2">50 - 100</option>
                </select>
              </li>
              <li class="nav-item" style="margin: 3%">
                <input type="submit" class="form-control btn btn-gradient-success btn-sm" value="Filter">
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#kegiatan" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-title">Event</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="kegiatan">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item" style="margin: 3%;">
                <input type="date" class="form-control" placeholder="Waktu">
              </li>
              <li class="nav-item" style="margin: 3%">
                <input type="submit" class="form-control btn btn-gradient-success btn-sm" value="Search">
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="pages/icons/mdi.html">
            <span class="menu-title">List Mosque</span>
            <i class="mdi mdi-home-modern menu-icon"></i>
          </a>
        </li>

      </span>
    </li>

    <?php } ?>

    <li class="nav-item sidebar-actions">
      <span class="nav-link">
        <div class="border-bottom">
          <h6 class="font-weight-normal mb-2"><b>Main Menu</b></h6>
        </div>
        <li class="nav-item">
          <a class="nav-link" href="./">
            <span class="menu-title">Home</span>
            <i class="mdi mdi-home menu-icon"></i>
          </a>
        </li>
        <li class="nav-item <?php active('maps');?>">
          <a class="nav-link" href="maps">
            <span class="menu-title">Maps</span>
            <i class="mdi mdi-map-marker-radius menu-icon"></i>
          </a>
        </li>
        <li class="nav-item <?php active('donation');?>">
          <a class="nav-link" href="donation">
            <span class="menu-title">Donation</span>
            <i class="mdi mdi-home-modern menu-icon"></i>
          </a>
        </li>
        <li class="nav-item <?php active('qurban');?>">
          <a class="nav-link" href="qurban">
            <span class="menu-title">Qurban</span>
            <i class="mdi mdi-home-modern menu-icon"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="jamaah-dashboard">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-view-dashboard menu-icon"></i>
          </a>
        </li>
      </span>
    </li>

  </ul>
</nav>