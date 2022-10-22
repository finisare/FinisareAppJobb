<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Menu' , 'Ekle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">

            <div class="row">
                  <div class="col-md-12">
                        <div class="page-title">
                             <p class="page-desc">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
                        </div>
                  </div>
            </div>
            <?

            if( isset( $_POST['menuCreate'] ) ):

                if( $data ):
                   self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                   self:: headerLocation( 3 , 'menu/read' ); // Page -> Redirection
                else:
                   self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                   self:: headerLocation( 3 , 'menu/creat' ); // Page -> Redirection
                endif;

            else: ?>

                   <form method="post" id="grayColor" class="card">

                               <div class="flex flexRow">
                                    <div class="flexItem">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Menü Başlık :</label>
                                          <input
                                          required
                                          type="text"
                                          name="title"
                                          class="form-control"
                                          id="exampleInputEmail1"
                                          minlength="3"
                                          aria-describedby="emailHelp"
                                          placeholder="Başlık :" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="flexItem">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Üst Menü :</label>
                                          <select class="js-states form-control padding-top-20" name="upmenu" tabindex="-1" style="display: none; width: 100%;">
                                                  <option value="0">ANAMENÜ</option>
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
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Menü Description :</label>
                                          <textarea class="form-control" minlength="100" maxlength="165" name="description" placeholder="Menü Description :" id="exampleFormControlTextarea1" rows="2"></textarea>
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Menü İçerik :</label>
                                          <!-- <textarea class="ckeditor" name="menu_icerik" autocomplete="on"></textarea> -->
                                          <textarea name="content" id="editor" autocomplete="on" placeholder="İçerik :"></textarea>
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem text-right ">
                                          <button type="submit" name="menuCreate" class="text-black margin-bottom-10 submitBTN btn btn-success Chakra yazi_500" style="font-size:20px; color:black;">
                                                  EKLE
                                          </button>
                                    </div>
                               </div>
                               <?=$this->token()->generate();?>
                   </form>


            <? endif; ?>

      </div>
</div>
