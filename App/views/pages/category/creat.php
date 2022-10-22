<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Kategori' , 'Ekle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">

            <div class="row">
                  <div class="col-md-12">
                        <div class="page-title">
                             <p class="page-desc">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
                        </div>
                  </div>
            </div>
            <?php
              if( isset( $_POST['categoryCreate'] ) ):

                  if( $data ):
                     self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                     self:: headerLocation( 3 , 'category/read' ); // Page -> Redirection
                  else:
                     self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                     self:: headerLocation( 3 , 'category/creat' ); // Page -> Redirection
                  endif;

               else: ?>

                   <form method="post" id="grayColor" enctype="multipart/form-data">

                         <div class="card">
                               <div class="flex flexRow">
                                    <div class="flexItem margin-top-30">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Kategori Başlık :</label>
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
                                    <div class="flexItem">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Üst Kategori :</label>
                                          <select class="js-states form-control" name="upmenu" tabindex="-1" style="display: none; width: 100%;">
                                                  <option value="0">KATEGORİ</option>
                                                  <?php foreach( $data as $upmenu ): ?>
                                                  <!-- <optgroup label="wefwfwef">
                                                            <option value="AK">Alaska</option>
                                                            <option value="HI">Hawaii</option>
                                                  </optgroup> -->
                                                  <option value="<?=$upmenu['title'].'@'.$upmenu['random'].'@'.$upmenu['id'].'@'.$upmenu['link'].'@'.$upmenu['const_random']?>">
                                                          <?=$upmenu['title']?>
                                                  </option>
                                                  <?php endforeach; ?>
                                          </select>
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Kategori Resim :</label>
                                          <input
                                          type="file"
                                          name="image"
                                          class="form-control"
                                          id="exampleInputEmail1"
                                          aria-describedby="emailHelp" />
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem padding-top-40">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Kategori Description :</label>
                                          <textarea class="form-control" minlength="100" maxlength="165" name="description" placeholder="Description :" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                               </div>
                               <div class="flex flexRow0">
                                    <div class="flexItem text-right">
                                          <button type="submit" name="categoryCreate" class="text-black margin-bottom-30 margin-top-20 submitBTN btn btn-success Chakra yazi_500" style="font-size:20px; color:black;">
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
