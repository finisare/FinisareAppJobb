<title>Finisare - Login Screen</title>
<body class="auth-page sign-in">
      <style>
      .dark-theme input::placeholder {
        color:white;
      }

      .loginLogoBox{
           background: black;
      }

      .dark-theme .loginLogoBox{
           background: white;
      }

      .logo-box{
            background:url('<?=homeRoot?>/assets/images/FWhite.svg');
            background-size: 20vh;
            background-position: center center;
            background-repeat: no-repeat;
            height: 20vh;
            width: auto;
      }

      .dark-theme .logo-box {
            background:url('<?=homeRoot?>/assets/images/FBlack.svg');
            background-size: 20vh;
            background-position: center center;
            background-repeat: no-repeat;
            height: 20vh;
            width: auto;
      }
      </style>
      <div class="connect-container">

            <div class="container-fluid">
                  <div class="row">

                      <div class="col-lg-7 d-none d-lg-block d-xl-block objectFitCover bg-overlay-black-30" style="
                      background:url('<?= homeRoot ;?>/assets/images/login/login<?=rand( 1,16 );?>.jpg');
                      background-repeat:no-repeat;
                      object-fit:cover;
                      background-origin: border-box;
                      background-position: center center;
                      background-size:100%;">
                           <div class="auth-imagewefwef"></div>
                      </div>
                      <div class="col-lg-5">
                            <div class="auth-form">
                                <div class="row" >

                                      <div class="col ">
                                              <div class="boyutla text-center padding-bottom-40" >
                                                   <span class="loginScreenMessage"><?=$this -> todayMessage;?></span>
                                              </div>
                                              <div class="logo-box"></div>
                                              <?

                                              if( is_null( $data ) ): ?>
                                                     <form method="post" name="[]">
                                                           <div class="form-group">
                                                               <input type="text" class="form-control" id="email" name="userName" aria-describedby="emailHelp" placeholder="Kullanıcı Adı & E-Mail :">
                                                           </div>
                                                           <div class="form-group">
                                                               <input type="password" class="form-control" id="password" name="userPassword" placeholder="Kullanıcı Şifre :">
                                                           </div>
                                                           <button type="submit" name="login" class="btn Chakra yazi_700 btn-primary btn-block btn-submit">
                                                                   <i class="fas fa-lock"></i> &nbsp;
                                                                   GİRİŞ
                                                           </button>
                                                           <div class="auth-options" >
                                                                 <!--
                                                                   <div class="custom-control custom-checkbox form-group">
                                                                       <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                                                       <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                                                                   </div>
                                                                 -->
                                                                 <a href="<?=domain;?>/password" class="forgot-link Chakra yazi_500">
                                                                    <i class="fas fa-fish"></i> &nbsp;
                                                                    Şifremi Unuttum
                                                                 </a>
                                                           </div>
                                                           <?=$this->token()->generate(); ?>
                                                      </form><?
                                              else:
                                                    if( $data ):
                                                        self:: components( 'alert' , [ 'value' => 'success' , 'message' => 'Giriş Başarılı - Yönlendiriliyorsunuz.' , 'style' => 'color:black;' ] );
                                                        self:: headerLocation( 4 , 'dashboard' );
                                                    else:
                                                        self:: components( 'alert' , [ 'value' => 'danger' , 'message' => 'Giriş Başarısız <br> Bilgilerinizi kontrol ediniz.' , 'style' => 'color:black; font-size:18px;' ] );
                                                        self:: headerLocation( 4 );
                                                    endif;
                                              endif; ?>
                                              <div class="auth-options text-center margin-top-50">
                                                    <div class="boyutla">
                                                        <a href="<?=link?>" target="_blank">
                                                           <img src="<?=favicon?>" id="favicon" title="Ali NEDİM" alt="Sakarya Web Tasarım, Mobil Uygulama yazılımcısı, Web Projeleri, Firma Tanıtım Web Sitesi, Özel Web Arayüz, Dijital Medya Reklamları" />
                                                        </a>
                                                    </div>
                                                    <div class="boyutla">
                                                         <span class="Chakra yazi_300">
                                                               © Tüm Hakları Saklıdır. <br/>
                                                               <strong class="yazi_700">
                                                                       2016 - <?=date('Y')?>
                                                               </strong> <br/>
                                                               Sürüm v.1
                                                         </span>

                                                    </div>
                                              </div>

                                      </div>


                                </div>
                            </div>
                      </div>

                  </div>
            </div>
        </div>
</body>
</html>
