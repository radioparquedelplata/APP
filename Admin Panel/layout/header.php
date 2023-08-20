<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="menu"></i></a></li>
           
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
              <i data-feather="maximize"></i>
            </a></li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?=siteUrl.LOGO?>"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?=$_SESSION['uname']?></div>
			  <a href="<?=siteUrl;?>account" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Account Setting
              </a>
			   <a href="<?=siteUrl;?>setting" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                App Setting
              </a>
              <div class="dropdown-divider"></div>
              <a href="javascript:void(0);" onclick="logoff('<?=siteUrl?>');" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=siteUrl?>"> <img alt="image" src="<?=siteUrl.LOGO?>" class="header-logo" /> <span
                class="logo-name"><?=TITLE?></span>
            </a>
          </div>
          <div class="sidebar-user">
            <div class="sidebar-user-details">
              <div class="user-name"><?=$_SESSION['uname']?></div>
              <div class="user-role">Administrator</div>
              <div class="sidebar-userpic-btn">
                <a href="<?=siteUrl;?>account" data-toggle="tooltip" title="Account Setting">
                  <i data-feather="settings"></i>
                </a>
                <a href="javascript:void(0);" onclick="logoff('<?=siteUrl?>');" data-toggle="tooltip" title="Log Out">
                  <i data-feather="log-out"></i>
                </a>
              </div>
            </div>
          </div>
          <ul class="sidebar-menu">
              <?php
              $script_name = $_SERVER["REQUEST_URI"];
            $parts = Explode('/', $script_name);
            $script_name = $parts[count($parts) - 1];
            ?>
			<li class="<?=$script_name=="" ? "qz-active": ""; ?>"><a href="<?=siteUrl;?>"><i data-feather="monitor"></i><span>Dashboard </span></a></li>
			<li class="<?=$script_name=="applist" ? "qz-active": ""; ?>"><a href="<?=siteUrl;?>applist"><i data-feather="list"></i><span>App Detail</span> </a>
			</li>
			<li class="<?=$script_name=="account" ? "qz-active": ""; ?>"><a href="<?=siteUrl;?>account"><i data-feather="settings"></i><span>Account Setting</span> </a>
			</li>
			<li class="<?=$script_name=="setting" ? "qz-active": ""; ?>"><a href="<?=siteUrl;?>setting"><i data-feather="settings"></i><span>App Setting</span> </a>
			</li>
			<li class="<?=$script_name=="push_notification" ? "qz-active": ""; ?>"><a href="<?=siteUrl;?>push_notification"><i data-feather="bell"></i><span>Push Notification </span></a>
		  </ul>
        </aside>
      </div>