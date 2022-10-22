<? self::components( 'title' , 'Slider Düzenle' ) ?>
<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Slider' , 'Düzenle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
           <!--
             <div class="row">
                 <div class="col-md-12">
                     <div class="page-title">
                         <p class="page-desc">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
                     </div>
                 </div>
             </div>
           -->
           <?
                if( isset( $_POST['sliderUpdate'] ) ):

                      if( is_null( $data ) ):
                          self:: components( 'alert' , [ 'value' => 'info' , 'message' => info, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                          self:: headerLocation( 3 , 'slider/update/'.$_POST['oldData']['random'] ); // Page -> Redirection
                      else:
                            if( $data ):
                                self:: components( 'alert' , [ 'value' => 'success' , 'message' => success, 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                                self:: headerLocation( 3 , 'slider/read' ); // Page -> Redirection
                            else:
                                self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                                self:: headerLocation( 3 , 'slider/update/'.$_POST['oldData']['random'] ); // Page -> Redirection
                            endif;
                      endif;

                else:

                      if( $data == FALSE ):
                          self:: components( 'alert' , [ 'value' => "warning" , 'message' => secondary , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                          self:: headerLocation( 3 , 'slider/read' ); // Page -> Redirection
                      else:

                           foreach ($data as $item): ?>
                                   <form method="post" id="grayColor" enctype="multipart/form-data" >

                                     <? if( $item['image'] ): ?>

                                            <input type="hidden" name="oldData[image]" value="<?=$item['image'];?>" />

                                            <div class="flex flexRow">
                                                 <div class="flexItem">
                                                      <img src="<?=$item['image'];?>" class="card-img-top boyutla sifirla objectFitCover" alt="<?=$item['title'];?>" title="<?=$item['title'];?>" >
                                                 </div>
                                                 <div class="flexItem card">
                                                       <div class="flex flexRow">
                                                             <div class="flexItem">
                                                                   <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Slider Başlık :</label>
                                                                   <input
                                                                   value="<?=$item['title'];?>"
                                                                   type="text"
                                                                   name="title"
                                                                   class="form-control"
                                                                   id="exampleInputEmail1"
                                                                   aria-describedby="emailHelp" />
                                                             </div>
                                                       </div>
                                                       <div class="flex flexRow">
                                                             <div class="flexItem">
                                                                   <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Slider Açıklama :</label>
                                                                   <textarea class="form-control" name="description" minlength="100" maxlength="165" placeholder="Slider Açıklama :" id="exampleFormControlTextarea1" rows="2"><?=$item['description'];?></textarea>
                                                             </div>
                                                       </div>
                                                       <div class="flex flexRow">
                                                             <div class="flexItem">
                                                                   <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Slider Resim :</label>
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
                                                                   <button type="submit" name="sliderUpdate" class="margin-bottom-20 margin-top-20 submitBTN btn btn-warning yazi_700 Chakra" style="color:black;" >
                                                                           DÜZENLE
                                                                   </button>
                                                             </div>
                                                       </div>
                                                 </div>
                                            </div>

                                     <? else: ?>

                                          <div class="card">
                                                 <div class="flex flexRow">
                                                       <div class="flexItem">
                                                             <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Slider Başlık :</label>
                                                             <input
                                                             value="<?=$item['title'];?>"
                                                             type="text"
                                                             name="title"
                                                             class="form-control"
                                                             id="exampleInputEmail1"
                                                             aria-describedby="emailHelp" />
                                                       </div>
                                                 </div>
                                                 <div class="flex flexRow">
                                                       <div class="flexItem">
                                                             <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Slider Açıklama :</label>
                                                             <textarea class="form-control" name="description" minlength="100" maxlength="165" placeholder="Slider Açıklama :" id="exampleFormControlTextarea1" rows="2"><?=$item['description'];?></textarea>
                                                       </div>
                                                 </div>
                                                 <div class="flex flexRow">
                                                       <div class="flexItem">
                                                             <label for="exampleInputEmail3" class="Chakra yazi_700 text-transform-none" id="formLabel">Slider Resim :</label>
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
                                                             <button type="submit" name="sliderUpdate" class="margin-bottom-20 margin-top-20 submitBTN btn btn-warning yazi_700 Chakra" style="color:black;" >
                                                                     DÜZENLE
                                                             </button>
                                                       </div>
                                                 </div>
                                          </div>

                                    <? endif; ?>

                                    <?=$this->token()->generate();?>
                                    <input type="hidden" name="oldData[random]" value="<?=$item['random'];?>" />
                                    <input type="hidden" name="oldData[title]" value="<?=$item['title'];?>" />
                                    <input type="hidden" name="oldData[link]" value="<?=$item['link'];?>" />
                                    <input type="hidden" name="oldData[description]" value="<?=$item['description'];?>" />

                            </form>

                       <? endforeach;

                    endif;

            endif;
          ?>
      </div>
</div>
