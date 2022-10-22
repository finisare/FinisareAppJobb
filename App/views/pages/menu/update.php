<style>
select option optgroup{
  text-transform: none;
}
</style>
<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Menü' , 'Düzenle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">

          <div class="items">
              <div class="col-md-12">
                  <div class="page-title">
                       <p class="page-desc">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
                  </div>
              </div>
          </div>
          <?
              if( isset( $_POST['menuUpdate'] ) ):

                    if( $data ):
                        self:: components( 'alert' , [ 'value' => 'success' , 'message' => success, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'menu/read' ); // Page -> Redirection
                    else:
                        self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'menu/update/'.$_POST['oldData']['random'] ); // Page -> Redirection
                    endif;

              else:

                    if( $data == FALSE ):
                        self:: components( 'alert' , [ 'value' => "warning" , 'message' => secondary , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                        self:: headerLocation( 3 , 'menu/read' ); // Page -> Redirection
                    else:
                         foreach ($data['data'] as $items): ?>
                               <form method="post" class="card" >

                                      <div class="flex flexRow margin-top-30">
                                           <div class="flexItem">
                                                <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Menü Başlık :</label>
                                                <input
                                                 value="<?=$items['title'];?>"
                                                 required
                                                 type="text"
                                                 name="title"
                                                 class="form-control"
                                                 id="exampleInputEmail1"
                                                 aria-describedby="emailHelp" />
                                                 <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                           </div>
                                           <div class="flexItem">
                                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Üst Menü :</label>
                                                 <select class="js-states form-control" name="upmenu" tabindex="-1" style="display: none; width: 100%; text-transform:none;">
                                                          <?php
                                                              if( $items['upmenu_id'] == 0 )
                                                                 echo '<optgroup><option value="0@0@0@0" selected>ANA MENÜ</option></optgroup>';
                                                              else
                                                                 echo '<optgroup><option value="'.$items['upmenu'].'@'.$items['upmenu_random'].'@'.$items['upmenu_id'].'@'.$items['upmenu_link'].'" selected>'.$items['upmenu'].'</option><optgroup><option value="0@0@0@0">ANA MENÜ</option>';

                                                              foreach( $data['menu'] as $dataMenu ):

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
                                               <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Menü Description :</label>
                                               <textarea class="form-control" minlength="100" maxlength="165" name="description" id="exampleFormControlTextarea1" itemss="2"><?=$items['description'];?></textarea>
                                           </div>
                                      </div>
                                      <div class="flex flexRow">
                                           <div class="flexItem" id="grayColor">
                                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel"> Menü İçerik :</label>
                                                 <textarea id="editor" name="content">
                                                           <?=$items['content'];?>
                                                 </textarea>
                                           </div>
                                      </div>
                                      <div class="flex flexRow">
                                           <div class="flexItem text-right">
                                                 <button type="submit" name="menuUpdate" class="margin-bottom-20 submitBTN btn btn-warning yazi_700 Chakra" style="color:black;">
                                                         DÜZENLE
                                                 </button>
                                           </div>
                                      </div>

                                      <input type="hidden" name="oldData[random]" value="<?=$items['random'];?>" />
                                      <input type="hidden" name="oldData[title]" value="<?=$items['title'];?>" />
                                      <input type="hidden" name="oldData[link]" value="<?=$items['link'];?>" />

                                      <input type="hidden" name="oldData[upmenu]" value="<?=$items['upmenu'];?>" />
                                      <input type="hidden" name="oldData[upmenu_random]" value="<?=$items['upmenu_random'];?>" />
                                      <input type="hidden" name="oldData[upmenu_id]" value="<?=$items['upmenu_id'];?>" />
                                      <input type="hidden" name="oldData[upmenu_link]" value="<?=$items['upmenu_link'];?>" />

                                      <div class="hidden-xl hidden-lg hidden-md hidden-sm hidden-xs">
                                           <textarea name="oldData[content]">
                                                     <?=$items['content'];?>
                                           </textarea>
                                      </div>

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
