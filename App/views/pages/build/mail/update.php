<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Genel Ayarlar' , 'Mail Düzenle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
           <?php
              if( isset( $_POST['mailEdit'] ) ):

                    if( is_null( $data ) ):
                        self:: components( 'alert' , [ 'value' => 'info' , 'message' => info, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'build/mail' ); // Page -> Redirection
                    else:
                          if( $data ):
                              self:: components( 'alert' , [ 'value' => 'success' , 'message' => success, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                              self:: headerLocation( 3 , 'build/mail' ); // Page -> Redirection
                          else:
                              self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                              self:: headerLocation( 3 , 'build/mail' ); // Page -> Redirection
                          endif;
                    endif;

               else:  ?>

                   <form method="post" id="grayColor">
                         <? foreach ($data as $items): ?>
                             <div class="card">
                                   <div class="flex flexRow padding-top-30">
                                        <div class="flexItem">
                                              <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Mail Host ( Host IP ) :</label>
                                              <input
                                              required
                                              type="text"
                                              name="mailHost"
                                              class="form-control"
                                              id="exampleInputEmail1"
                                              aria-describedby="emailHelp"
                                              value="<?=$this->valueEncrypt( 'UNLOCK' , $this->strReplace( $items['host'] ) , dataKey );?>" />
                                              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                        </div>
                                   </div>
                                   <div class="flex flexRow">
                                        <div class="flexItem">
                                              <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Mail Kullanıcı Adı :</label>
                                              <input
                                              required
                                              type="text"
                                              name="mailUsername"
                                              class="form-control"
                                              id="exampleInputEmail1"
                                              aria-describedby="emailHelp"
                                              value="<?=$this->valueEncrypt( 'UNLOCK' , $this->strReplace( $items['username'] ) , dataKey );?>" />
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                        </div>
                                        <div class="flexItem margin-top-30">
                                              <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Mail Şifre :</label>
                                              <input
                                              required
                                              type="text"
                                              name="mailPassword"
                                              class="form-control"
                                              id="exampleInputEmail1"
                                              aria-describedby="emailHelp"
                                              value="<?=$this->valueEncrypt( 'UNLOCK' , $this->strReplace( $items['password'] ) , dataKey );?>" />
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                        </div>
                                   </div>
                                   <div class="flex flexRow">
                                        <div class="flexItem">
                                              <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Mail Başlık İsmi :</label>
                                              <input
                                              required
                                              type="text"
                                              name="mailFromname"
                                              class="form-control"
                                              id="exampleInputEmail1"
                                              aria-describedby="emailHelp"
                                              value="<?=$items["fromname"];?>" />
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                        </div>
                                        <div class="flexItem margin-top-30">
                                              <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Mail CharSet :</label>
                                              <input
                                              required
                                              type="text"
                                              name="mailCharSet"
                                              class="form-control"
                                              id="exampleInputEmail1"
                                              aria-describedby="emailHelp"
                                              value="<?=$items["charset"];?>" />
                                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                        </div>
                                   </div>

                                   <div class="flex flexRow0">
                                        <div class="flexItem text-right">
                                              <button type="submit" name="mailEdit" class="text-black margin-bottom-30 margin-top-20 submitBTN btn btn-warning Chakra yazi_600" style="font-size:20px; color:black;">
                                                      DÜZENLE
                                              </button>
                                        </div>
                                   </div>

                                   <input type="hidden" name="oldData[host]" value="<?=$this->valueEncrypt( 'UNLOCK' , $items["host"] , dataKey );?>" />
                                   <input type="hidden" name="oldData[username]" value="<?=$this->valueEncrypt( 'UNLOCK' , $items["username"] , dataKey );?>" />
                                   <input type="hidden" name="oldData[password]" value="<?=$this->valueEncrypt( 'UNLOCK' , $items["password"] , dataKey );?>" />
                                   <input type="hidden" name="oldData[fromname]" value="<?=$items["fromname"];?>" />
                                   <input type="hidden" name="oldData[charset]" value="<?=$items["charset"];?>" />
                                   <input type="hidden" name="oldData[random]" value="<?=$items["random"];?>" />
                                   <?=$this->token()->generate();?>
                             </div>
                         <? endforeach; ?>
                   </form>


            <? endif; ?>

      </div>
</div>
