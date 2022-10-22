<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Genel Ayarlar' , 'SEO Bilgileri Düzenle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
           <?php
               if( isset( $_POST['seoUpdate'] ) ):
                    if( is_null( $data ) ):
                          self:: components( 'alert' , [ 'value' => 'info' , 'message' => info, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                          self:: headerLocation( 3 , 'build/seo' ); // Page -> Redirection
                    else:
                          if( $data ):
                              self:: components( 'alert' , [ 'value' => 'success' , 'message' => success, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                              self:: headerLocation( 3 , 'build/seo' ); // Page -> Redirection
                          else:
                              self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                              self:: headerLocation( 3 , 'build/seo' ); // Page -> Redirection
                          endif;
                    endif;
               else: ?>

                   <form method="post" id="grayColor" enctype="multipart/form-data">
                         <? foreach ($data as $items): ?>
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
                                                value="<?=$items['title'];?>" />
                                              <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                          </div>
                                     </div>
                                     <div class="flex flexRow">
                                          <div class="flexItem">
                                                <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Logo :</label>
                                                <input
                                                type="file"
                                                name="image"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                aria-describedby="emailHelp" />
                                          </div>
                                     </div>
                                     <div class="flex flexRow">

                                          <div class="flexItem">
                                               <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Web Site Açıklama :</label>
                                               <textarea class="form-control" minlength="100" maxlength="225" name="description" id="exampleFormControlTextarea1" itemss="2"><?=$items['description'];?></textarea>
                                          </div>

                                     </div>
                                     <div class="flex flexRow0">
                                          <div class="flexItem text-right">
                                                <button type="submit" name="seoUpdate" class="text-black margin-bottom-30 margin-top-20 submitBTN btn btn-warning Chakra yazi_600" style="font-size:20px; color:black;">
                                                        DÜZENLE
                                                </button>
                                          </div>
                                     </div>
                               </div>
                         <? endforeach; ?>
                         <?=$this->token()->generate();?>
                         <input type="hidden" name="oldData[logo]" value="<?=$items['logo'];?>" />

                         <input type="hidden" name="oldData[random]" value="<?=$items['random'];?>" />
                         <input type="hidden" name="oldData[title]" value="<?=$items['title'];?>" />
                         <input type="hidden" name="oldData[description]" value="<?=$items['description'];?>" />
                   </form>


            <? endif; ?>

      </div>
</div>
