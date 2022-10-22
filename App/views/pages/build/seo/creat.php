<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Genel Ayarlar' , 'SEO Bilgileri Ekle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
           <?php
              if( isset( $_POST['seoCreat'] ) ):

                    if( $data ):
                        self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'build/seo' ); // Page -> Redirection
                    else:
                        self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'build/seo' ); // Page -> Redirection
                    endif;

               else: ?>

                   <form method="post" id="grayColor" enctype="multipart/form-data">

                         <div class="card">
                               <div class="flex flexRow">
                                    <div class="flexItem margin-top-30">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Web Site Başlık :</label>
                                          <input
                                          required
                                          type="text"
                                          name="title"
                                          class="form-control"
                                          id="exampleInputEmail1"
                                          minlength="3"
                                          aria-describedby="emailHelp"
                                          placeholder="* Kategori Başlık :" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Logo :</label>
                                          <input
                                          type="file"
                                          name="logo"
                                          class="form-control"
                                          id="exampleInputEmail1"
                                          aria-describedby="emailHelp" />
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem padding-top-40">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Web Site Açıklama :</label>
                                          <textarea class="form-control" minlength="100" maxlength="225" name="description" placeholder="Description :" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                               </div>
                               <div class="flex flexRow0">
                                    <div class="flexItem text-right">
                                          <button type="submit" name="seoCreat" class="text-black margin-bottom-30 margin-top-20 submitBTN btn btn-success Chakra yazi_500" style="font-size:20px; color:black;">
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
