<body>
        <!--
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div> -->
        <div class="connect-container align-content-stretch d-flex flex-wrap" style="padding:0px; margin:0px;">
            <div class="page-sidebar" >
                <div class="logo-box">
                     <img src="<?=domain;?>/images/logo.png" id="Logo">
                     <a href="#" id="sidebar-close">
                        <i class="material-icons">close</i>
                     </a>
                     <a href="#" id="sidebar-state">
                        <i class="material-icons">adjust</i>
                        <i class="material-icons compact-sidebar-icon">panorama_fish_eye</i>
                     </a>
                </div>
                <div class="page-sidebar-inner slimscroll">
                    <ul class="accordion-menu yazi_500"  style="text-transform:uppercase;">
                        <li class="sidebar-title text-center" id="header-title-home">
                            ANA MENÜ
                        </li>
                        <!-- class="active-page"  - class="active" -->
                        <li>
                              <a href="<?=domain.dirnameProject?>/store">
                                  <i class="material-icons">card_giftcard</i>
                                  BAKKAL
                              </a>
                        </li>
                        <li>
                              <a href="<?=domain.dirnameProject?>/dashboard">
                                  <i class="material-icons">home</i>
                                  ANASAYFA
                              </a>
                        </li>
                        <li>
                              <a href=" javascript:void(0); ">
                                  <i class="material-icons">desktop_mac</i>
                                  Slider
                                  <i class="material-icons has-sub-menu">add</i>
                              </a>
                              <ul class="sub-menu ">
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/slider/creat">
                                         <i style="font-size:15px;" class="material-icons">add</i>
                                         <?=space.space;?>Ekle
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/slider/read">
                                         <i style="font-size:15px;" class="material-icons">view_list</i>
                                         <?=space.space;?>Listele
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/slider/config">
                                         <i style="font-size:15px;" class="material-icons">build</i>
                                         <?=space.space;?>Ayar
                                      </a>
                                  </li>
                              </ul>
                        </li>
                        <li>
                              <a href=" javascript:void(0); ">
                                <i class="material-icons">list</i>
                                Menü
                                <i class="material-icons has-sub-menu">add</i>
                              </a>
                              <ul class="sub-menu ">
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/menu/creat">
                                         <i style="font-size:15px;" class="material-icons">add</i>
                                         <?=space.space;?>Ekle
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/menu/read">
                                         <i style="font-size:15px;" class="material-icons">view_list</i>
                                         <?=space.space;?>Listele
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/menu/config">
                                         <i style="font-size:15px;" class="material-icons">build</i>
                                         <?=space.space;?>Ayar
                                      </a>
                                  </li>
                              </ul>
                        </li>
                        <li>
                              <a href=" javascript:void(0); ">
                                <i class="material-icons">push_pin</i>
                                Kategori
                                <i class="material-icons has-sub-menu">add</i>
                              </a>
                              <ul class="sub-menu ">
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/category/creat">
                                         <i style="font-size:15px;" class="material-icons">add</i>
                                         <?=space.space;?>Ekle
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/category/read">
                                         <i style="font-size:15px;" class="material-icons">view_list</i>
                                         <?=space.space;?>Listele
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/category/config">
                                         <i style="font-size:15px;" class="material-icons">build</i>
                                         <?=space.space;?>Ayar
                                      </a>
                                  </li>
                              </ul>
                        </li>
                        <li>
                              <a href=" javascript:void(0); ">
                                <i class="material-icons">description</i>
                                Blog
                                <i class="material-icons has-sub-menu">add</i>
                              </a>
                              <ul class="sub-menu ">
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/blog/creat">
                                         <i style="font-size:15px;" class="material-icons">add</i>
                                         <?=space.space;?>Ekle
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/blog/read">
                                         <i style="font-size:15px;" class="material-icons">view_list</i>
                                         <?=space.space;?>Listele
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/blog/config">
                                         <i style="font-size:15px;" class="material-icons">build</i>
                                         <?=space.space;?>Ayar
                                      </a>
                                  </li>
                              </ul>
                        </li>
                        <li>
                              <a href=" javascript:void(0); ">
                                <i class="material-icons">settings</i>
                                GENEL AYARLAR
                                <i class="material-icons has-sub-menu">add</i>
                              </a>
                              <ul class="sub-menu ">
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/build/seo">
                                          <i style="font-size:15px;" class="material-icons">touch_app</i>
                                          <?=space.space;?>SEO
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/build/contact">
                                          <i style="font-size:15px;" class="material-icons">phone</i>
                                          <?=space.space;?>İletişim
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/build/mail">
                                          <i style="font-size:15px;" class="material-icons">mail</i>
                                          <?=space.space;?>Mail
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/build/language">
                                          <i style="font-size:15px;" class="material-icons">flag</i>
                                          <?=space.space;?>Dil
                                      </a>
                                  </li>
                              </ul>
                        </li>
                        <li>
                              <a href=" javascript:void(0); ">
                                <i class="material-icons">assignment_ind</i>
                                KULLANICI
                                <i class="material-icons has-sub-menu">add</i>
                              </a>
                              <ul class="sub-menu ">
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/user/creat">
                                         <i style="font-size:15px;" class="material-icons">add</i>
                                         <?=space.space;?>Ekle
                                      </a>
                                  </li>
                                  <li>
                                      <a href="<?=domain.dirnameProject?>/user/read">
                                         <i style="font-size:15px;" class="material-icons">view_list</i>
                                         <?=space.space;?>Listele
                                      </a>
                                  </li>
                              </ul>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="page-container">
                <div class="page-header">
                    <nav class="navbar navbar-expand">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item small-screens-sidebar-link">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                                      <img
                                      <? if( isset( $_SESSION['user']['avatar'] ) ): ?>
                                          src="<?=domain.$_SESSION['user']['avatar'];?>"
                                      <? else: ?>
                                          src="<?=homeRoot;?>/assets/images/avatarEmptyUser.png"
                                      <? endif; ?>
                                      alt="<?=$_SESSION['user']['name'];?>"
                                      title="<?=$_SESSION['user']['name'];?>"
                                      />

                                      <span><?=$_SESSION['user']['name'];?> <?=$_SESSION['user']['surname'];?></span>
                                      <i class="material-icons dropdown-icon">keyboard_arrow_down</i>

                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                      <a class="dropdown-item" href="#">
                                         Calendar
                                         <span class="badge badge-pill badge-info float-right">2</span>
                                      </a>
                                      <a class="dropdown-item Chakra yazi_500" href="<?=homeRoot?>/build/seo">
                                         <i class="fa fa-cogs" aria-hidden="true"></i>
                                         <?=space.space;?>Sistem Ayarları
                                      </a>
                                      <a class="dropdown-item Chakra yazi_500" href="<?=homeRoot?>/user/update/<?=$_SESSION['user']['random'];?>">
                                         <i class="fa fa-user" aria-hidden="true"></i>
                                         <?=space.space;?>Kullanıcı Ayarları
                                      </a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item Chakra yazi_500" href="<?=homeRoot?>/logout">
                                         <i class="fa fa-power-off" aria-hidden="true"></i>
                                         <?=space.space;?>Çıkış
                                      </a>
                                  </div>
                            </li>

                            <li class="nav-item">
                                <a href="<?=homeRoot?>/mailbox" class="nav-link">
                                  MailBox <?=space.space;?><i class="material-icons-outlined">mail</i>
                                </a>
                            </li>
                            <li class="nav-item hidden-xs">
                                <a href="#" class="nav-link">Projects</a>
                            </li>
                            <li class="nav-item hidden-xs">
                                <a href="#" class="nav-link">Tasks</a>
                            </li>
                            <li class="nav-item hidden-xs">
                                <a href="#" class="nav-link">Reports</a>
                            </li>
                            <!--
                              <li class="nav-item hidden-xs hidden-sm">
                                  <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
                              </li>
                            -->
                        </ul>
                        <div class="navbar-collapse" id="navbarNav">

                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Reports</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=homeRoot?>/mailbox" class="nav-link"><i class="material-icons-outlined">mail</i></a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="navbar-search">
                            <form>
                                <div class="form-group">
                                    <input type="text" name="search" id="nav-search" placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
