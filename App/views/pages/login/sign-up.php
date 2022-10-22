<body class="auth-page sign-in">

      <script src="<?=domain.dirnameProject;?>/assets/js/sign-up/sign-up.js"></script>
      <script src="<?=domain.dirnameProject;?>/assets/js/sign-up/sign-up-boot.js"></script>
      <script src="<?=domain.dirnameProject;?>/assets/js/sign-up/index.js"></script>

      <link href="<?=domain.dirnameProject;?>/assets/css/sign-up/index.css" rel="stylesheet" />
      <style>
          #signup-image {
              background-image: url('<?=domain.dirnameProject;?>/assets/images/sign_up.svg');
              background-position: center center;

              background-repeat: no-repeat;
              background-size: 87% 70%;

              margin-left: 8vh;
              height: 80vh;
              width: auto;
              text-align: center;
          }
          .dark-theme .logo-box{
               background-position: center;
               background-image: url( '<?=homeRoot?>/assets/images/FBlack.svg' );
               background-repeat: no-repeat;
               height: 140px;
               width: 100%;
          }
          .dark-theme .btn-default .btn-success{
               color:white;
               background: purple;
          }
          .btn-default .btn-success{
               color:red;
               background: black;
          }
          .logo-box{
            background-position: center;
            background-image: url( '<?=homeRoot?>/assets/images/FWhite.svg' );
            background-repeat: no-repeat;
            height: 100px;
            padding: 40px;
            width: 100%;
          }
      </style>

      <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-6 d-none d-lg-block d-xl-block">
                         <div id="signup-image" class="margin-top-30"></div> <!-- class="auth-image" -->
                    </div>
                    <div class="col-lg-6">
                        <div class="auth-form">
                            <div class="row">

                                  <div class="col padding-top-30">
                                          <div class="logo-box"></div>

                                          <? if( !is_null( $data ) ): ?>
                                                 DEĞER POST EDİLDİ -> NULL dışında bir DEĞER GELDİ....
                                          <? else: ?>
                                                <div class="stepwizard padding-top-20">
                                                     <div class="stepwizard-row setup-panel">
                                                         <div class="stepwizard-step col-xs-3">
                                                             <a href="#step-1" type="button" class="btn btn-success btn-circle" disabled="disabled">1</a>
                                                             <p><small class="Chakra yazi_700">Web Site Bilgileri</small></p>
                                                         </div>
                                                         <div class="stepwizard-step col-xs-3">
                                                             <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                             <p><small class="Chakra yazi_700">VeriTabanı Bilgileri</small></p>
                                                         </div>
                                                         <div class="stepwizard-step col-xs-3">
                                                             <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                             <p><small class="Chakra yazi_700">Firma Bilgileri</small></p>
                                                         </div>
                                                         <div class="stepwizard-step col-xs-3">
                                                             <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                                                             <p><small class="Chakra yazi_700">İletişim Seçenekleri</small></p>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <form method="post" >
                                                       <div class="row margin-top-20">

                                                             <div class="panel-primary setup-content col-12 sifirla" id="step-1">
                                                                   <div class="flex flexRow">
                                                                        <div class="flexItem form-group">
                                                                             <input type="text" required class="form-control" id="email" name="webTitle" aria-describedby="emailHelp" placeholder="Web Site Başlık :">
                                                                        </div>
                                                                   </div>
                                                                   <div class="flex flexRow">
                                                                        <div class="flexItem form-group">
                                                                             <input type="text" required readonly class="form-control" id="email" name="webUrl" aria-describedby="emailHelp" value="<?=domain;?>" />
                                                                        </div>
                                                                   </div>
                                                                   <div class="flex flexRow">
                                                                        <div class="flexItem justifyContentFlexEnd">
                                                                              <button type="button" onclick="bastim()" class="nextBtn yarila btn Chakra yazi_700 btn-primary btn-block btn-submit">
                                                                                      DEVAM ET &nbsp;
                                                                                      <i class="fas fa-angle-double-right"></i>
                                                                              </button>
                                                                        </div>
                                                                   </div>
                                                             </div>
                                                             <div class="panel-primary setup-content col-12 sifirla" id="step-2">
                                                                   <div class="flex flexRow ">
                                                                        <div class="flexItem form-group">
                                                                             <input type="text" required class="form-control" id="email" name="dataBaseUserName" aria-describedby="emailHelp" placeholder="Veritabanı Kullanıcı Adı :">
                                                                        </div>
                                                                        <div class="flexItem form-group">
                                                                             <input type="text" required class="form-control" maxlength="15" minlength="11" onkeypress="return ipAdres(this, event)" id="email" name="dataBaseIpAdres" aria-describedby="emailHelp" placeholder="Veritabanı Ip Adres :">
                                                                        </div>
                                                                   </div>
                                                                   <div class="flex flexRow ">
                                                                        <div class="flexItem form-group">
                                                                             <input type="text" required class="form-control" id="email" name="dataBaseName" aria-describedby="emailHelp" placeholder="Veritabanı Adı :">
                                                                        </div>
                                                                        <div class="flexItem form-group">
                                                                             <input type="text" required class="form-control" id="email" name="dataBasePassword" aria-describedby="emailHelp" placeholder="Veritabanı Şifre :">
                                                                        </div>
                                                                   </div>
                                                                   <div class="flex flexRow form-group">
                                                                        <div class="flexItem text-right">
                                                                              <button type="button" class="nextBtn btn Chakra yazi_700 yarila justify-item-right btn-primary btn-block btn-submit">
                                                                                      DEVAM ET &nbsp;
                                                                                      <i class="fas fa-angle-double-right"></i>
                                                                              </button>
                                                                        </div>
                                                                   </div>
                                                             </div>
                                                             <div class="panel-primary setup-content col-12 sifirla" id="step-3">
                                                                   <div class="flex flexRow ">
                                                                         <div class="flexItem form-group">
                                                                              <input type="text" required class="form-control" id="email" name="companyName" aria-describedby="emailHelp" placeholder="Şirket / Firma / Kuruluş Adı-Ünvanı :">
                                                                         </div>
                                                                   </div>
                                                                   <div class="flex flexRow ">
                                                                         <div class="flexItem ">
                                                                               <select required class="js-states form-control" name="companySector" tabindex="-1" style="display: none; width: 100%;">
                                                                                       <option value="0">HANGİ SEKTÖRDESİNİZ?</option><option value="Turizm, Konaklama, Yiyecek-İçecek Hizmetleri_turizm-konaklama-yiyecek-icecek-hizmetleri" style="font-weight:bold; text-decoration:underline;">Turizm, Konaklama, Yiyecek-İçecek Hizmetleri</option><option value="Toplumsal ve Kişisel Hizmetler_toplumsal-ve-kisisel-hizmetler" style="font-weight:bold; text-decoration:underline;">Toplumsal ve Kişisel Hizmetler</option><option value="Tarım, Avcılık ve Balıkçılık_tarim-avcilik-ve-balikcilik" style="font-weight:bold; text-decoration:underline;">Tarım, Avcılık ve Balıkçılık</option><option value="Tekstil, Hazır Giyim, Deri_tekstil-hazir-giyim-deri" style="font-weight:bold; text-decoration:underline;">Tekstil, Hazır Giyim, Deri</option><option value="Ticaret (Satış ve Pazarlama)_ticaret-satis-ve-pazarlama" style="font-weight:bold; text-decoration:underline;">Ticaret (Satış ve Pazarlama)</option><option value="Spor ve Rekreasyon_spor-ve-rekreasyon" style="font-weight:bold; text-decoration:underline;">Spor ve Rekreasyon</option><option value="Sağlık ve Sosyal Hizmetler_saglik-ve-sosyal-hizmetler" style="font-weight:bold; text-decoration:underline;">Sağlık ve Sosyal Hizmetler</option><option value="Metal_metal" style="font-weight:bold; text-decoration:underline;">Metal</option><option value="Medya, İletişim ve Yayıncılık_medya-iletisim-ve-yayincilik" style="font-weight:bold; text-decoration:underline;">Medya, İletişim ve Yayıncılık</option><option value="Maden_maden" style="font-weight:bold; text-decoration:underline;">Maden</option><option value="Kültür, Sanat ve Tasarım_kultur-sanat-ve-tasarim" style="font-weight:bold; text-decoration:underline;">Kültür, Sanat ve Tasarım</option><option value="Kimya, Petrol, Lastik ve Plastik_kimya-petrol-lastik-ve-plastik" style="font-weight:bold; text-decoration:underline;">Kimya, Petrol, Lastik ve Plastik</option><option value="İş ve Yönetim_is-ve-yonetim" style="font-weight:bold; text-decoration:underline;">İş ve Yönetim</option><option value="İnşaat, İnşaat Malzemeleri_insaat-insaat-malzemeleri" style="font-weight:bold; text-decoration:underline;">İnşaat, İnşaat Malzemeleri</option><option value="Gıda, Restoran, Cafe_gida-restoran-cafe" style="font-weight:bold; text-decoration:underline;">Gıda, Restoran, Cafe</option><option value="Finans_finans" style="font-weight:bold; text-decoration:underline;">Finans</option><option value="Enerji_enerji" style="font-weight:bold; text-decoration:underline;">Enerji</option><option value="Elektrik ve Elektronik_elektrik-ve-elektronik" style="font-weight:bold; text-decoration:underline;">Elektrik ve Elektronik</option><option value="Eğitim_egitim" style="font-weight:bold; text-decoration:underline;">Eğitim</option><option value="Peyzaj, Çevre_peyzaj-cevre" style="font-weight:bold; text-decoration:underline;">Peyzaj, Çevre</option><option value="Cam, Çimento ve Toprak_cam-cimento-ve-toprak" style="font-weight:bold; text-decoration:underline;">Cam, Çimento ve Toprak</option><option value="Bilişim Teknolojileri_bilisim-teknolojileri" style="font-weight:bold; text-decoration:underline;">Bilişim Teknolojileri</option><option value="Ağaç İşleri, Kağıt ve Kağıt Ürünleri_agac-isleri-kagit-ve-kagit-urunleri" style="font-weight:bold; text-decoration:underline;">Ağaç İşleri, Kağıt ve Kağıt Ürünleri</option><option value="Adalet ve Güvenlik_adalet-ve-guvenlik" style="font-weight:bold; text-decoration:underline;">Adalet ve Güvenlik</option><option value="Rent-a Car, Otomotiv_rent-a-car-otomotiv" style="font-weight:bold; text-decoration:underline;">Rent-a Car, Otomotiv</option><option value="Ulaştırma, Lojistik ve Haberleşme_ulastirma-lojistik-ve-haberlesme" style="font-weight:bold; text-decoration:underline;">Ulaştırma, Lojistik ve Haberleşme</option><option value="Mimarlık & Proje_mimarlik-proje" style="font-weight:bold; text-decoration:underline;">Mimarlık & Proje</option><option value="Mobilya_mobilya" style="font-weight:bold; text-decoration:underline;">Mobilya</option><option value="Fotoğraf_fotograf" style="font-weight:bold; text-decoration:underline;">Fotoğraf</option><option value="Temizlik (Koltuk & Halı Yıkama)_temizlik-koltuk-hali-yikama" style="font-weight:bold; text-decoration:underline;">Temizlik (Koltuk & Halı Yıkama)</option><option value="E-Ticaret_e-ticaret" style="font-weight:bold; text-decoration:underline;">E-Ticaret</option><option value="Gayrimenkul_gayrimenkul" style="font-weight:bold; text-decoration:underline;">Gayrimenkul</option><option value="Özel (Kişisel Web Sitesi)_ozel-kisisel-web-sitesi" style="font-weight:bold; text-decoration:underline;">Özel (Kişisel Web Sitesi)</option><option value="Blog, Haber_blog-haber" style="font-weight:bold; text-decoration:underline;">Blog, Haber</option>
                                                                               </select>
                                                                          </div>
                                                                    </div>
                                                                    <div class="flex flexRow">
                                                                          <button type="button" class="nextBtn btn Chakra yazi_700 yarila btn-primary btn-block btn-submit">
                                                                                  DEVAM ET &nbsp;
                                                                                  <i class="fas fa-angle-double-right"></i>
                                                                          </button>
                                                                    </div>
                                                             </div>
                                                             <div class="panel-primary setup-content col-12 sifirla" id="step-4">
                                                                  <div class="flex flexRow ">
                                                                       <div class="flexItem form-group">
                                                                            <input type="email" required class="form-control" name="companyEmail" aria-describedby="emailHelp" placeholder="E-Mail :" />
                                                                       </div>
                                                                       <div class="flexItem form-group">
                                                                             <input type="text" required class="form-control" maxlength="16" minlength="16" onkeypress="return GsmTel(this, event)" name="companyGsm" aria-describedby="emailHelp" placeholder="GSM - TEL :" />
                                                                       </div>
                                                                  </div>
                                                                  <div class="flex flexRow form-group">
                                                                       <div class="flexItem">
                                                                            <textarea class="form-control" required name="companyAdres" minlength="10" placeholder="Adres :" id="exampleFormControlTextarea1" rows="2"></textarea>
                                                                       </div>
                                                                  </div>
                                                                  <div class="flex flexRow ">
                                                                       <div class="flex flexRow ">
                                                                             <button type="submit" name="webPageDataCreated" class="margin-bottom-10 submitBTN btn btn-success yazi_700 Chakra" style="color:black;">
                                                                                     BİTİR &nbsp;
                                                                                     <i class="fas fa-angle-double-right"></i>
                                                                             </button>
                                                                       </div>
                                                                  </div>
                                                             </div>
                                                        </div>
                                                 </form>
                                          <? endif; ?>
                                          <div class="auth-options text-center margin-top-40" >
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
        <link href="<?=domain.dirnameProject;?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
        <script src="<?=domain.dirnameProject;?>/assets/plugins/select2/js/select2.full.min.js"></script>
        <script src="<?=domain.dirnameProject;?>/assets/js/pages/select2.js"></script>
</body><script>
      function ipAdres(myfield, e, dec) {
       var key;
       var keychar;
       if (window.event)
           key = window.event.keyCode;
       else if (e)
           key = e.which;
       else
           return true;
       keychar = String.fromCharCode(key);
       if ((key == null) || (key == 0) || (key == 8) ||
     (key == 9) || (key == 13) || (key == 27))
           return true;
       else if ((("0123456789.").indexOf(keychar) > -1))
           return true;
       else if (dec && (keychar == ".")) {
           myfield.form.elements[dec].focus();
           return false;
       }
       else
           return false;
     }



     function GsmTel(myfield, e, dec) {
      var key;
      var keychar;
      if (window.event)
          key = window.event.keyCode;
      else if (e)
          key = e.which;
      else
          return true;
      keychar = String.fromCharCode(key);
      if ((key == null) || (key == 0) || (key == 8) ||
    (key == 9) || (key == 13) || (key == 27))
          return true;
      else if ((("0123456789 ()").indexOf(keychar) > -1))
          return true;
      else if (dec && (keychar == ".")) {
          myfield.form.elements[dec].focus();
          return false;
      }
      else
          return false;
    }
</script>
