<style>
select option optgroup{
  text-transform: none;
}
</style>
<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Kategori' , 'Düzenle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">

          <div class="items">
              <div class="col-md-12">
                  <div class="page-title">
                       <p class="page-desc">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
                  </div>
              </div>
          </div>
          <?
              if( isset( $_POST['categoryUpdate'] ) ):

                    if( is_null( $data ) ):

                        self:: components( 'alert' , [ 'value' => 'info' , 'message' => info, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 4 , 'category/update/'.$_POST['oldData']['random'] ); // Page -> Redirection

                    else:
                          if( $data ):

                              self:: components( 'alert' , [ 'value' => 'success' , 'message' => success, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                              self:: headerLocation( 3 , 'category/read' ); // Page -> Redirection

                          else:

                              self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                              self:: headerLocation( 3 , 'category/update/'.$_POST['oldData']['random'] ); // Page -> Redirection

                          endif;
                    endif;

              else:

                    if( $data == FALSE ):
                        self:: components( 'alert' , [ 'value' => "warning" , 'message' => secondary , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'category/read' ); // Page -> Redirection
                    else:

                          foreach ( $data['data'] as $items ): ?>
                                <form method="post" enctype="multipart/form-data" >

                                       <? if( $items['image'] ): ?>

                                             <input type="hidden" name="oldData[image]" value="<?=$items['image'];?>" />

                                             <div class="flex flexRow">
                                                  <div class="flexItem">
                                                       <img src="<?=$items['image'];?>" class="card-img-top boyutla sifirla objectFitCover" alt="<?=$items['title'];?>" title="<?=$items['title'];?>" >
                                                  </div>
                                                  <div class="flexItem card">
                                                        <div class="flex flexRow">
                                                              <div class="flexItem">
                                                                    <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kategori Başlık :</label>
                                                                    <input
                                                                    value="<?=$items['title'];?>"
                                                                    type="text"
                                                                    name="title"
                                                                    class="form-control"
                                                                    id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" />
                                                              </div>
                                                        </div>
                                                        <div class="flex flexRow">
                                                              <div class="flexItem">
                                                                    <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Üst Kategori :</label>
                                                                    <select class="js-states form-control" name="upmenu" tabindex="-1" style="display: none; width: 100%; text-transform:none;">
                                                                             <?php
                                                                                 if( $items['upmenu_id'] == 0 )
                                                                                    echo '<optgroup><option value="0@0@0@0" selected>ANA Kategori</option></optgroup>';
                                                                                 else
                                                                                    echo '<optgroup><option value="'.$items['upmenu'].'@'.$items['upmenu_random'].'@'.$items['upmenu_id'].'@'.$items['upmenu_link'].'" selected>'.$items['upmenu'].'</option><optgroup><option value="0@0@0@0">ANA Kategori</option>';

                                                                                 foreach( $data['category'] as $dataMenu ):

                                                                                        if( $dataMenu['random'] != $items['random'] and $dataMenu['random'] != $items['upmenu_random'] ): ?>
                                                                                               <option value="<?=$dataMenu['title'];?>@<?=$dataMenu['random'];?>@<?=$dataMenu['id'];?>@<?=$dataMenu['link'];?> ">
                                                                                                       <?=$dataMenu['title'];?>
                                                                                               </option><?php
                                                                                        endif;

                                                                                 endforeach; ?>
                                                                    </select>
                                                              </div>
                                                        </div>
                                                        <div class="flex flexRow">
                                                              <div class="flexItem">
                                                                    <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kategori Resim :</label>
                                                                    <input
                                                                    type="file"
                                                                    name="image"
                                                                    class="form-control"
                                                                    id="exampleInputEmail1"
                                                                    aria-describedby="emailHelp" />
                                                                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                              </div>
                                                        </div>
                                                        <div class="flex flexRow">
                                                              <div class="flexItem">
                                                                    <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kategori Açıklama :</label>
                                                                    <textarea class="form-control" minlength="100" maxlength="165" name="description" placeholder="Kategori Açıklama :" id="exampleFormControlTextarea1" rows="2"><?=$items['description'];?></textarea>
                                                              </div>
                                                        </div>
                                                        <div class="flex flexRow">
                                                              <div class="flexItem text-right">
                                                                    <button type="submit" name="categoryUpdate" class="margin-bottom-20 margin-top-20 submitBTN btn btn-warning yazi_700 Chakra" style="color:black;" >
                                                                            DÜZENLE
                                                                    </button>
                                                              </div>
                                                        </div>
                                                  </div>
                                             </div>

                                       <? else: ?>

                                           <div class="flex flexRow">

                                                <div class="flexItem card">
                                                      <div class="flex flexRow">
                                                            <div class="flexItem">
                                                                  <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kategori Başlık :</label>
                                                                  <input
                                                                  value="<?=$items['title'];?>"
                                                                  type="text"
                                                                  name="title"
                                                                  class="form-control"
                                                                  id="exampleInputEmail1"
                                                                  aria-describedby="emailHelp" />
                                                            </div>
                                                            <div class="flexItem">
                                                                  <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Üst Kategori :</label>
                                                                  <select class="js-states form-control" name="upmenu" tabindex="-1" style="display: none; width: 100%; text-transform:none;">
                                                                           <?php
                                                                               if( $items['upmenu_id'] == 0 )
                                                                                  echo '<optgroup><option value="0@0@0@0" selected>ANA Kategori</option></optgroup>';
                                                                               else
                                                                                  echo '<optgroup><option value="'.$items['upmenu'].'@'.$items['upmenu_random'].'@'.$items['upmenu_id'].'@'.$items['upmenu_link'].'" selected>'.$items['upmenu'].'</option><optgroup><option value="0@0@0@0">ANA Kategori</option>';

                                                                               foreach( $data['category'] as $dataMenu ):

                                                                                      if( $dataMenu['random'] != $items['random'] and $dataMenu['random'] != $items['upmenu_random'] ): ?>
                                                                                             <option value="<?=$dataMenu['title'];?>@<?=$dataMenu['random'];?>@<?=$dataMenu['id'];?>@<?=$dataMenu['link'];?> ">
                                                                                                     <?=$dataMenu['title'];?>
                                                                                             </option><?php
                                                                                      endif;

                                                                               endforeach; ?>
                                                                  </select>
                                                            </div>
                                                      </div>
                                                      <div class="flex flexRow">
                                                            <div class="flexItem">
                                                                  <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kategori Açıklama :</label>
                                                                  <textarea class="form-control" name="description" maxlength="165" placeholder="Slider Açıklama :" id="exampleFormControlTextarea1" rows="2"><?=$items['description'];?></textarea>
                                                            </div>
                                                      </div>
                                                      <div class="flex flexRow">
                                                            <div class="flexItem">
                                                                  <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Kategori Resim :</label>
                                                                  <input
                                                                  type="file"
                                                                  name="image"
                                                                  class="form-control"
                                                                  id="exampleInputEmail1"
                                                                  aria-describedby="emailHelp" />
                                                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                                            </div>
                                                      </div>
                                                      <div class="flex flexRow">
                                                            <div class="flexItem text-right">
                                                                  <button type="submit" name="categoryUpdate" class="margin-bottom-20 margin-top-10 submitBTN btn btn-warning yazi_700 Chakra" style="color:black;" >
                                                                          DÜZENLE
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </div>
                                           </div>

                                       <? endif; ?>

                                       <input type="hidden" name="oldData[random]" value="<?=$items['random'];?>" />
                                       <input type="hidden" name="oldData[title]" value="<?=$items['title'];?>" />
                                       <input type="hidden" name="oldData[link]" value="<?=$items['link'];?>" />

                                       <input type="hidden" name="oldData[upmenu]" value="<?=$items['upmenu'];?>" />
                                       <input type="hidden" name="oldData[upmenu_random]" value="<?=$items['upmenu_random'];?>" />
                                       <input type="hidden" name="oldData[upmenu_id]" value="<?=$items['upmenu_id'];?>" />
                                       <input type="hidden" name="oldData[upmenu_link]" value="<?=$items['upmenu_link'];?>" />


                                       <input type="hidden" name="oldData[description]" value="<?=$items['description'];?>" />
                                       <input type="hidden" name="oldData[keywords]" value="<?=$items['keywords'];?>" />

                                       <?=$this->token()->generate();?>

                                </form>
                      <? endforeach;

                    endif;

              endif;
          ?>

      </div>
</div>
