<body class="auth-page sign-in">
      <style>
      .dark-theme input::placeholder {
        color:white;
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
      <script type="text/javascript">
              var deger;
              var saniye=40;
              var url = '<?=homeRoot;?>';
              function saniyeDurdur()
                {
                window.clearInterval(deger);
                }
              function saniyeBaslat()
              {
                saniye --;
                if(saniye >=0){
                  document.getElementById('saniye').innerHTML= saniye + "<span> süre sonra <strong>Geçersiz Giriş</strong> olacaktır.</span>";
                }else{
                  window.clearInterval(deger);
                  document.location = url;
                }
              }
              var deger=window.setInterval('saniyeBaslat()',1000);
       </script>
      <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-7 d-none d-lg-block d-xl-block">
                         <div class="auth-image"></div>
                    </div>
                    <div class="col-lg-5">
                        <div class="auth-form">
                            <div class="row">

                                <div class="col">
                                        <div class="logo-box"></div>
                                        <?
                                            if( is_null( $data ) ):
                                                  self:: components( 'alert' , [ 'value' => 'danger' , 'message' => 'Yetkisiz Giriş Tespit Edildi - Yönlendiriyorsunuz.' , 'style' => 'font-size:20px;color:black;' ] );
                                                  self:: headerLocation( 4 );
                                            else:
                                                  if( $data ):?>
                                                        <form method="post" >
                                                              <div class="form-group">
                                                                  <input type="text" class="form-control" id="text" name="securityCode" aria-describedby="emailHelp" placeholder="Güvenlik Kodu :">
                                                              </div>
                                                              <div class="form-group text-center" style="font-size:19px;">
                                                                   <span id="saniye"></span>
                                                              </div>
                                                              <button type="submit" name="loginMail" class="btn Chakra yazi_700 btn-danger btn-block btn-submit text-white">
                                                                      <i class="fas fa-security"></i> &nbsp;
                                                                      GİRİŞ YAP
                                                              </button>
                                                              <div class="auth-options" >
                                                                    <!--
                                                                      <div class="custom-control custom-checkbox form-group">
                                                                          <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                                                          <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                                                                      </div>
                                                                      <a href="<?=domain;?>/password" class="forgot-link Chakra yazi_500">
                                                                         <i class="fas fa-fish"></i> &nbsp;
                                                                         Şifremi Unuttum
                                                                      </a>
                                                                    -->
                                                              </div>
                                                              <input type="hidden" name="loginMailCode" value="<?=$data;?>" />
                                                              <?=$this->token()->generate(); ?>
                                                        </form><?
                                                  else:
                                                       self:: components( 'alert' , [ 'value' => 'warning' , 'message' => 'Mail İşlemlerinde Bir sorun oluştu - Yönlendiriliyorsunuz.' , 'style' => 'font-size:20px;color:black;' ] );
                                                       self:: headerLocation( 4 );
                                                  endif;
                                            endif;
                                        ?>
                                        <div class="auth-options text-center margin-top-20">
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
