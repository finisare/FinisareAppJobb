<? self::components( 'title' , 'Genel Ayarlar - Mail Bilgileri Ekle' ) ?>
  <div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Genel Ayarlar' , 'Mail Bilgileri Ekle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
           <?php
              if( isset( $_POST['mailCreat'] ) ):

                    if( $data ):
                        self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'build/mail' ); // Page -> Redirection
                    else:
                        self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'build/mail' ); // Page -> Redirection
                    endif;

               else: ?>

                   <form method="post" id="grayColor">

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
                                          placeholder="* Mail Host ( Host IP ) :" />
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
                                          placeholder="* Mail Kullanıcı Adı :" />
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
                                          placeholder="* Mail Şifre :" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Mail Başlık İsmi :</label>
                                          <input
                                          required
                                          type="text"
                                          readonly
                                          name="mailFromname"
                                          class="form-control"
                                          id="exampleInputEmail1"
                                          aria-describedby="emailHelp"
                                          value="Sakarya Web Tasarım Firmaları" />
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
                                          readonly
                                          aria-describedby="emailHelp"
                                          value="UTF-8" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                               </div>

                               <div class="flex flexRow0">
                                    <div class="flexItem text-right">
                                          <button type="submit" name="mailCreat" class="text-black margin-bottom-30 margin-top-20 submitBTN btn btn-success Chakra yazi_500" style="font-size:20px; color:black;">
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
