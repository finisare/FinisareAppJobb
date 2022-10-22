<? self::components( 'title' , 'Kullanıcı Düzenle' ) ?>

<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Kullanıcı' , 'Düzenle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
           <!--
             <div class="row">
                 <div class="col-md-12">
                     <div class="page-title">
                         <p class="page-desc">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
                     </div>
                 </div>
             </div>
           -->
           <?
                if( isset( $_POST['userUpdate'] ) ):

                      if( is_null( $data ) ):
                          self:: components( 'alert' , [ 'value' => 'info' , 'message' => info, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                          self:: headerLocation( 3 , 'user/update/'.$_POST['oldData']['random'] ); // Page -> Redirection
                      else:
                            if( $data ):
                                self:: components( 'alert' , [ 'value' => 'success' , 'message' => success, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                                self:: headerLocation( 3 , 'user/read' ); // Page -> Redirection
                            else:
                                self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                                self:: headerLocation( 3 , 'user/update/'.$_POST['oldData']['random'] ); // Page -> Redirection
                            endif;
                      endif;

                else:

                      if( $data == FALSE ):
                          self:: components( 'alert' , [ 'value' => "warning" , 'message' => secondary , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                          self:: headerLocation( 3 , 'user/read' ); // Page -> Redirection
                      else:
                            foreach ($data as $items): ?>

                                   <form method="post" id="grayColor" enctype="multipart/form-data">

                                          <div class="flex flexRow">

                                                      <? if( $items['avatar'] ): ?>
                                                              <input type="hidden" name="oldData[avatar]" value="<?=$items['avatar'];?>" />
                                                              <div class="flexItem text-center col-xl-3 col-12">
                                                                   <div class="hidden-sm hidden-xs boyutla sifirla">
                                                                         <img
                                                                         src="<?=$items['avatar'];?>"
                                                                         class=" card-img-top boyutla sifirla objectFitCover"
                                                                         alt="<?=$items['name'];?>"
                                                                         title="<?=$items['name'];?>"
                                                                         />
                                                                   </div>
                                                                   <div class="hidden-xl hidden-lg hidden-md padding-bottom-10">
                                                                         <img
                                                                         src="<?=$items['avatar'];?>"
                                                                         class=" card-img-top ceyrek objectFitCover"
                                                                         alt="<?=$items['name'];?>"
                                                                         title="<?=$items['name'];?>"
                                                                         />
                                                                   </div>
                                                              </div>
                                                      <? else: ?>
                                                              <div class="flexItem text-center col-xl-3 col-12">
                                                                   <div class="hidden-sm hidden-xs boyutla sifirla">
                                                                         <img
                                                                         src="<?=domain.dirnameProject;?>/assets/images/avatarEmptyUser.png"
                                                                         class="card-img-top boyutla sifirla objectFitCover"
                                                                         alt="<?=$items['name'];?>"
                                                                         title="<?=$items['name'];?>"
                                                                         />
                                                                    </div>
                                                                    <div class="hidden-xl hidden-lg hidden-md">
                                                                          <img
                                                                          src="<?=domain.dirnameProject;?>/assets/images/avatarEmptyUser.png"
                                                                          class=" card-img-top ceyrek objectFitCover"
                                                                          alt="<?=$items['name'];?>"
                                                                          title="<?=$items['name'];?>"
                                                                          />
                                                                    </div>
                                                              </div>
                                                      <? endif; ?>
                                                      <div class="flexItem col-xl-9 col-12 card">
                                                            <div class="flex flexRow">
                                                                  <div class="flexItem">
                                                                        <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kullanıcı Adı :</label>
                                                                        <input
                                                                        value="<?=$items['name'];?>"
                                                                        type="text"
                                                                        name="userName"
                                                                        class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" />
                                                                  </div>
                                                                  <div class="flexItem">
                                                                        <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kullanıcı Soyadı :</label>
                                                                        <input
                                                                        value="<?=$items['surname'];?>"
                                                                        type="text"
                                                                        name="userSurname"
                                                                        class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" />
                                                                  </div>
                                                            </div>
                                                            <div class="flex flexRow">
                                                                  <div class="flexItem">
                                                                        <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kullanıcı Şifre :</label>
                                                                        <input
                                                                        value="<?=$this->valueEncrypt( 'UNLOCK' , $this->strReplace( $items['password'] ) , dataKey );?>"
                                                                        type="text"
                                                                        name="userPassword"
                                                                        class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" />
                                                                  </div>
                                                                  <div class="flexItem">
                                                                        <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kullanıcı E-Mail :</label>
                                                                        <input
                                                                        value="<?=$this->valueEncrypt( 'UNLOCK' , $this->strReplace( $items['email'] ) , dataKey );?>"
                                                                        type="text"
                                                                        name="userEmail"
                                                                        class="form-control"
                                                                        id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp" />
                                                                  </div>
                                                            </div>
                                                            <div class="flex flexRow">
                                                                  <div class="flexItem">
                                                                        <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Kullanıcı Avatar :</label>
                                                                        <div class="input-group">
                                                                             <input
                                                                             type="file"
                                                                             name="avatar"
                                                                             class="form-control"
                                                                             id="exampleInputEmail1"
                                                                             aria-describedby="emailHelp" />
                                                                         </div>
                                                                  </div>
                                                                  <div class="flexItem">
                                                                        <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Yetki :</label>
                                                                        <select readonly class="js-states form-control" name="userAuthority" tabindex="-1" style="display: none; width: 100%; text-transform:none;">
                                                                                 <?php
                                                                                     if( $items['authority'] )
                                                                                        echo '<optgroup><option value="1" selected>ADMİN</option><option value="0">EDİTÖR</option></optgroup>';
                                                                                     else
                                                                                        echo '<optgroup><option value="0" selected>EDİTÖR</option><option value="0">ADMİN</option></optgroup>';

                                                                                 ?>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="flex flexRow">
                                                                  <div class="flexItem text-right">
                                                                        <button type="submit" name="userUpdate" class="margin-bottom-20 margin-top-20 submitBTN btn btn-warning yazi_700 Chakra" style="color:black;" >
                                                                                DÜZENLE
                                                                        </button>
                                                                  </div>
                                                            </div>
                                                      </div>

                                          </div>

                                          <input type="hidden" name="oldData[random]" value="<?=$items['random'];?>" />
                                          <input type="hidden" name="oldData[name]" value="<?=$items['name'];?>" />
                                          <input type="hidden" name="oldData[surname]" value="<?=$items['surname'];?>" />
                                          <input type="hidden" name="oldData[email]" value="<?=$items['email'];?>" />
                                          <input type="hidden" name="oldData[password]" value="<?=$items['password'];?>" />
                                          <input type="hidden" name="oldData[authority]" value="<?=$items['authority'];?>" />

                                          <?=$this->token()->generate(); ?>

                                   </form><?
                           endforeach;
                    endif;

            endif;
          ?>
      </div>
</div>
