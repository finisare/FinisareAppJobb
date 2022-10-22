<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Menü' , 'Sil' , 'style' => 'color:purple;' ]  ); ?>
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
                 self:: headerLocation( 4 , 'menu/read' ); // Page -> Redirection

             else:

                  if( isset( $_POST['menuDelete'] ) ):
                       if( $data ):
                           self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                           self:: headerLocation( 4 , 'menu/read' ); // Page -> Redirection
                       else:
                           self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                           self:: headerLocation( 4 , 'menu/read/'.$_POST['oldData']['random'] ); // Page -> Redirection
                       endif;
                  else:
                       foreach ($data['data'] as $items):  ?>
                            <form method="post" class="card" id="grayColor" >

                                    <div class="flex flexRow">
                                         <div class="flexItem">
                                              <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Menü Başlık :</label>
                                              <input
                                               value="<?=$items['title'];?>"
                                               readonly
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
                                             <textarea readonly class="form-control" name="description" maxlength="165" minlength="165" id="exampleFormControlTextarea1" itemss="2"><?=$items['description'];?></textarea>
                                         </div>
                                    </div>
                                    <div class="flex flexRow">
                                         <div class="flexItem" id="grayColor">
                                               <textarea id="editor">
                                                         <?=$items['content'];?>
                                               </textarea>
                                         </div>
                                    </div>
                                    <div class="flex flexRow">
                                         <div class="flexItem text-right">
                                               <button type="submit" name="menuDelete" class="margin-bottom-20 submitBTN btn btn-danger yazi_700 Chakra" style="color:black;">
                                                       SİL
                                               </button>
                                         </div>
                                    </div>

                                    <input type="hidden" name="oldData[random]" value="<?=$items['random'];?>" />
                                    <?=$this->token()->generate();?>

                            </form>
                       <? endforeach;
                    endif;

             endif;

          ?>
      </div>

</div>
