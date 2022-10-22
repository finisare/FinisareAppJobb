<? self::components( 'title' , 'Genel Ayarlar - İletişim Bilgileri Ekle' ) ?>
  <div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Genel Ayarlar' , 'İletişim Bilgileri Ekle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
           <?php

              if( isset( $_POST['contactCreat'] ) ):


                    if( $data ):
                        self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'build/contact' ); // Page -> Redirection
                    else:
                        self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'build/contact' ); // Page -> Redirection
                    endif;


               else: ?>

                   <form method="post" id="grayColor">

                         <div class="card padding-top-20">

                               <div class="flex flexRow margin-top-50">
                                     <div class="flexItem">
                                           <div class="input-group">
                                               <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">
                                                          <img src="<?=homeRoot;?>/assets/images/icons/googlemaps.webp"
                                                          style="width:5vh; height:auto;" />
                                                    </span>
                                               </div>
                                               <textarea
                                               class="form-control"
                                               name="contactMap"
                                               id="exampleFormControlTextarea1"
                                               rows="2"></textarea>
                                          </div>
                                     </div>
                               </div>
                               <div class="flex flexRow margin-top-50">
                                     <div class="flexItem">
                                           <div class="input-group">
                                               <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend">
                                                          <img src="<?=homeRoot;?>/assets/images/icons/adres.webp"
                                                          style="width:5vh; height:auto;" />
                                                    </span>
                                               </div>
                                               <textarea
                                               required
                                               class="form-control"
                                               name="contactAdres"
                                               placeholder="Adapazarı / SAKARYA :"
                                               id="exampleFormControlTextarea1"
                                               rows="2"></textarea>
                                          </div>
                                     </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem">
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroupPrepend">
                                                         <img src="<?=homeRoot;?>/assets/images/icons/mobile.webp"
                                                         style="width:4.5vh; height:auto;" />
                                                   </span>
                                              </div>
                                              <input
                                              required
                                              type="text"
                                              name="contactGsm"
                                              class="form-control"
                                              id="validationCustomUsername"
                                              aria-describedby="inputGroupPrepend"
                                              placeholder="0(531) 513 06 21"
                                              />
                                          </div>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="flexItem">
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroupPrepend">
                                                         <img src="<?=homeRoot;?>/assets/images/icons/phone.webp"
                                                         style="width:4.5vh; height:auto;" />
                                                   </span>
                                              </div>
                                              <input
                                              required
                                              type="text"
                                              name="contactTel"
                                              class="form-control"
                                              id="validationCustomUsername"
                                              aria-describedby="inputGroupPrepend"
                                              placeholder="0(850) 441 7151"
                                              />
                                          </div>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="flexItem">
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroupPrepend">
                                                         <img src="<?=homeRoot;?>/assets/images/icons/envelope.webp"
                                                         style="width:4.5vh; height:auto;" />
                                                   </span>
                                              </div>
                                              <input
                                              required
                                              type="email"
                                              name="contactEmail"
                                              class="form-control"
                                              id="validationCustomUsername"
                                              aria-describedby="inputGroupPrepend"
                                              placeholder="info@alinedim.com"
                                              />
                                          </div>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem">
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroupPrepend">
                                                         <img src="<?=homeRoot;?>/assets/images/icons/facebook.webp"
                                                         style="width:4vh; height:auto;" />
                                                   </span>
                                              </div>
                                              <input
                                              required
                                              type="text"
                                              name="contactFacebook"
                                              class="form-control"
                                              id="validationCustomUsername"
                                              aria-describedby="inputGroupPrepend"
                                              placeholder="facebook.com/finisare"
                                              />
                                          </div>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="flexItem">
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroupPrepend">
                                                         <img src="<?=homeRoot;?>/assets/images/icons/twitter.webp"
                                                         style="width:4vh; height:auto;" />
                                                   </span>
                                              </div>
                                              <input
                                              required
                                              type="text"
                                              name="contactTwitter"
                                              class="form-control"
                                              id="validationCustomUsername"
                                              aria-describedby="inputGroupPrepend"
                                              placeholder="twitter.com/finisare"
                                              />
                                          </div>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="flexItem">
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroupPrepend">
                                                         <img src="<?=homeRoot;?>/assets/images/icons/instagram.webp"
                                                         style="width:4vh; height:auto;" />
                                                   </span>
                                              </div>
                                              <input
                                              required
                                              type="text"
                                              name="contactInstagram"
                                              class="form-control"
                                              id="validationCustomUsername"
                                              aria-describedby="inputGroupPrepend"
                                              placeholder="instagram.com/finisare"
                                              />
                                          </div>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="flexItem">
                                          <div class="input-group">
                                              <div class="input-group-prepend">
                                                   <span class="input-group-text" id="inputGroupPrepend">
                                                         <img src="<?=homeRoot;?>/assets/images/icons/linkedin.webp"
                                                         style="width:4vh; height:auto;" />
                                                   </span>
                                              </div>
                                              <input
                                              required
                                              type="text"
                                              name="contactLinkedin"
                                              class="form-control"
                                              id="validationCustomUsername"
                                              aria-describedby="inputGroupPrepend"
                                              placeholder="linkedin.com/company/finisare"
                                              />
                                          </div>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem text-right">
                                          <button type="submit" name="contactCreat" class="text-black margin-bottom-30 margin-top-20 submitBTN btn btn-success Chakra yazi_500" style="font-size:20px; color:black;">
                                                  EKLE
                                          </button>
                                    </div>
                               </div>

                         </div>


                         <?=$this->token()->generate();?>
                   </form>


            <? endif; ?>

      </div>
</div>
