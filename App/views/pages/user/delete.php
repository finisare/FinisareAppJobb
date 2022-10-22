<? self::components( 'title' , 'Kullanıcı Sil' ) ?>

<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Kullanıcı' , 'Sil' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
          <div class="row">
              <div class="col-md-12">
                  <div class="page-title">
                      <p class="page-desc">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
                  </div>
              </div>
          </div>
          <?php

             if( !$data ):
                  self:: components( 'alert' , [ 'value' => 'warning' , 'message' => secondary , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                  self:: headerLocation( 3 , 'user/read' ); // Page -> Redirection
             else:
                   if( isset( $_POST['userDelete'] ) ):
                       if( $data ):
                           self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                           self:: headerLocation( 3 , 'user/read' ); // Page -> Redirection
                       else:
                           self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                           self:: headerLocation( 3 , 'user/read' ); // Page -> Redirectio
                       endif;
                   else: ?>

                       <form method="post" id="grayColor" >

                               <? foreach ($data as $items):

                                     if( $items['avatar'] ): ?>
                                     <div class="flex flexRow row">
                                           <div class="flexItem text-center col-3">
                                                <img src="<?=$items['avatar'];?>" class="card-img-top boyutla sifirla objectFitCover" alt="<?=$items['name'];?>" title="<?=$items['name'];?>" >
                                           </div>
                                           <div class="flexItem card col-9">
                                           <input type="hidden" name="oldData[avatar]" value="<?=$items['avatar'];?>" />
                                     <? else: ?>
                                           <div class="flex flexRow">
                                                 <div class="flexItem card">
                                     <? endif; ?>

                                                 <div class="flex flexRow">
                                                       <div class="flexItem">
                                                             <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kullanıcı Ad :</label>
                                                             <input
                                                             value="<?=$items['name'];?>"
                                                             readonly
                                                             type="text"
                                                             name="name"
                                                             class="form-control"
                                                             id="exampleInputEmail1"
                                                             aria-describedby="emailHelp" />
                                                       </div>
                                                       <div class="flexItem">
                                                             <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kullanıcı Soyad :</label>
                                                             <input
                                                             value="<?=$items['surname'];?>"
                                                             readonly
                                                             type="text"
                                                             name="name"
                                                             class="form-control"
                                                             id="exampleInputEmail1"
                                                             aria-describedby="emailHelp" />
                                                       </div>
                                                 </div>
                                                 <div class="flex flexRow">
                                                       <div class="flexItem">
                                                             <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kullanıcı E-Mail :</label>
                                                             <input
                                                             value="<?=$this->valueEncrypt( 'UNLOCK' , $this->strReplace( $items['email'] ) , dataKey );?>"
                                                             readonly
                                                             type="text"
                                                             name="name"
                                                             class="form-control"
                                                             id="exampleInputEmail1"
                                                             aria-describedby="emailHelp" />
                                                       </div>
                                                       <div class="flexItem">
                                                             <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kullanıcı Şifre :</label>
                                                             <input
                                                             value="<?=$this->valueEncrypt( 'UNLOCK' , $this->strReplace( $items['password'] ) , dataKey );?>"
                                                             readonly
                                                             type="text"
                                                             name="name"
                                                             class="form-control"
                                                             id="exampleInputEmail1"
                                                             aria-describedby="emailHelp" />
                                                       </div>
                                                 </div>
                                                 <div class="flex flexRow">
                                                       <div class="flexItem">
                                                             <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Yetki :</label>
                                                             <select readonly class="js-states form-control" name="upmenu" tabindex="-1" style="display: none; width: 100%; text-transform:none;">
                                                                      <?php
                                                                          if( $items['authority'] )
                                                                             echo '<optgroup><option value="1" selected>ADMİN</option><option value="0">EDİTÖR</option></optgroup>';
                                                                          else
                                                                             echo '<optgroup><option value="0" selected>YETKİ</option><option value="0">ADMİN</option></optgroup>';

                                                                      ?>
                                                             </select>
                                                       </div>
                                                 </div>
                                                 <div class="flex flexRow">
                                                       <div class="flexItem text-right">
                                                             <button type="submit" name="userDelete" class="margin-bottom-20 margin-top-20 submitBTN btn btn-danger yazi_700 Chakra" style="color:black;" >
                                                                     SİL
                                                             </button>
                                                       </div>
                                                 </div>

                                          </div>
                                      </div>
                                      <?=$this->token()->generate();

                               endforeach; ?>

                       </form><?
                   endif;
             endif;
          ?>
      </div>

</div>
