<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Genel Ayarlar' , 'İletişim Bilgileri Düzenle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
           <?php
              if( isset( $_POST['contactEdit'] ) ):

                    if( is_null( $data ) ):
                        self:: components( 'alert' , [ 'value' => 'info' , 'message' => info, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'build/contact' ); // Page -> Redirection
                    else:
                          if( $data ):
                              self:: components( 'alert' , [ 'value' => 'success' , 'message' => success, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                              self:: headerLocation( 3 , 'build/contact' ); // Page -> Redirection
                          else:
                              self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                              self:: headerLocation( 3 , 'build/contact' ); // Page -> Redirection
                          endif;
                    endif;

               else:  ?>

                   <form method="post" id="grayColor">
                         <? foreach ($data as $items): ?>

                             <div class="card">

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
                                                     rows="4"><?=$items['map'];?></textarea>
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
                                                     rows="2"><?=$items['adres'];?></textarea>
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
                                                    value="<?=$items['tel'];?>"
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
                                                    value="<?=$items['gsm'];?>"
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
                                                    value="<?=$items['email'];?>"
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
                                                    value="<?=$items['facebook'];?>"
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
                                                    value="<?=$items['twitter'];?>"
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
                                                    value="<?=$items['instagram'];?>"
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
                                                    value="<?=$items['instagram'];?>"
                                                    />
                                                </div>
                                              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                          </div>
                                     </div>

                                     <div class="flex flexRow0">
                                          <div class="flexItem text-right">
                                                <button type="submit" name="contactEdit" class="text-black margin-bottom-30 margin-top-20 submitBTN btn btn-warning Chakra yazi_600" style="font-size:20px; color:black;">
                                                        DÜZENLE
                                                </button>
                                          </div>
                                     </div>

                                   <input type="hidden" name="oldData[random]" value="<?=$items["random"];?>" />
                                   <input type="hidden" name="oldData[map]" value="<?=$items["map"];?>" />
                                   <input type="hidden" name="oldData[adres]" value="<?=$items["adres"];?>" />
                                   <input type="hidden" name="oldData[gsm]" value="<?=$items["gsm"];?>" />
                                   <input type="hidden" name="oldData[tel]" value="<?=$items["tel"];?>" />
                                   <input type="hidden" name="oldData[email]" value="<?=$items["email"];?>" />

                                   <input type="hidden" name="oldData[facebook]" value="<?=$items["facebook"];?>" />
                                   <input type="hidden" name="oldData[twitter]" value="<?=$items["twitter"];?>" />
                                   <input type="hidden" name="oldData[instagram]" value="<?=$items["instagram"];?>" />
                                   <input type="hidden" name="oldData[linkedin]" value="<?=$items["linkedin"];?>" />
                                   <?=$this->token()->generate();?>
                             </div>
                         <? endforeach; ?>
                   </form>


            <? endif; ?>

      </div>
</div>
