<div class="card-body">

      <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
                  <div class="form-group">
                        <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Menü Başlık :</label>
                        <input
                        required
                        type="text"
                        name="title"
                        class="form-control"
                        id="exampleInputEmail1"
                        minlength="5"
                        aria-describedby="emailHelp"
                        value="<?=$row['title']?>" />
                      <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                  </div>
             </div>
             <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                  <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Üst Menü :</label>
                  <select class="js-states form-control" id="selectOptionMenu" name="upmenu"  tabindex="-1" style="display: none; width: 100%;">
                          <?php
                                 if( $row['upmenu'] )
                                     echo '<option value=" '.$row['upmenu'].'@'.$row['upmenu_random'].'@'.$row['upmenu_id'].'@'.$row['upmenu_link'].' ">'.$row['upmenu'].'</option>';
                                 else
                                     echo '<option value="0">ANA MENÜ</option>';


                                 foreach( $data['menu'] as $dataMenu ):

                                       if( $dataMenu['random'] != $row['random'] and $dataMenu['random'] != $row['upmenu_random'] ): ?>
                                              <option value="  <?=$dataMenu['title']?>@<?=$dataMenu['random']?>@<?=$dataMenu['id']?>@<?=$dataMenu['link']?> ">
                                                      <?=$dataMenu['title']?>
                                              </option><?php
                                       endif;

                                 endforeach; ?>
                  </select>
             </div>
      </div>
      <div class="row margin-top-20"></div>
      <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                        <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Menü Description :</label>
                        <textarea class="form-control" name="description" maxlength="165" minlength="165" id="exampleFormControlTextarea1" rows="2"><?=$row['description']?></textarea>
                  </div>
            </div>
       </div>
       <div class="row margin-top-20"></div>
       <div class="row">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="form-group">
                         <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Menü İçerik :</label>
                         <!-- <textarea class="ckeditor" name="menu_icerik" autocomplete="on"></textarea> -->
                         <textarea name="content" id="editor" autocomplete="on" ><?=$row['content']?></textarea>
                   </div>
             </div>
       </div>

</div>

<?php

    if( isset( $_POST['menuEdit'] ) ){


          if( $data == FALSE ) {
                $this -> components( 'alert' , [ 'value' => 'danger' , 'message' => 'Değişen Birşey yok gibi görünüyor. - Yönlendiriliyorsunuz.' , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                self::headerLocation( 3 , 'menu/duzenle/'.$_POST['oldData']['random'] ); // Page -> Redirection
          } else {

               if( $data != NULL ) {
                   // $this -> components( 'alert' , [ 'value' => 'success' , 'message' => 'İşlem Başarılı. - Yönlendiriliyorsunuz.' , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                   // self:: headerLocation( 3 , 'slider/listele' ); // Page -> Redirection

                   echo 'POST -> TRUE -> GELDİ';
               } else {
                   // $this -> components( 'alert' , [ 'value' => 'warning' , 'message' => 'Bir Sorun Oluştu. - Yönlendiriliyorsunuz.' , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                   // self:: headerLocation( 3 , 'slider/duzenle/'.$_POST['oldData']['random'] ); // Page -> Redirection

                   echo 'POST -> NULL -> GELDİ';
               }
          }

    } else {
       if( $data == FALSE ) {
           // $this -> components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
           // self:: headerLocation( 3 , 'slider/listele' ); // Page -> Redirection

           echo 'FALSE -> DEĞER GELMEDİ';
       } else {
           foreach ($data['data'] as $row) { ?>

                   <form method="post" id="grayColor">
                         <div class="card">

                              wefwefwefwfwef

                         </div>
                         <div class="card">

                               <div class="col-12 text-right">
                                     <button type="submit" name="sliderEdit" class="yarila btn btn-warning Chakra yazi_700" style="font-size:20px; color:black;">
                                             DÜZENLE
                                     </button>
                               </div>
                         </div>

                         <input type="hidden" name="oldData[random]" value="<?=$row['random']?>" />
                         <input type="hidden" name="oldData[title]" value="<?=$row['title']?>" />
                         <input type="hidden" name="oldData[upmenu]" value=" <?=$row['upmenu']?>@<?=$row['upmenu_random']?>@<?=$row['upmenu_id']?>@<?=$row['upmenu_link']?> " />
                         <input type="hidden" name="oldData[description]" value="<?=$row['description']?>" />
                         <input type="hidden" name="oldData[content]" value="<?=$row['content']?>" />
                   </form>

           <? }
       }

    }
?>
