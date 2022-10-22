
<? self::components( 'title' , 'Slider Ekle' ); ?>

<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Slider' , 'Ekle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
            <div class="row">
                  <div class="col-md-12">
                       <div class="page-title">
                            <p class="page-desc">
                               Examples and usage guidelines for form control styles, layout options, and custom components for creating a wide variety of forms.
                            </p>
                       </div>
                  </div>
            </div>
            <?php
            if( isset( $_POST['sliderCreate'] ) ):

                 if( $data ):
                    self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                    self:: headerLocation( 3 , 'slider/read' ); // Page -> Redirection
                 else:
                    self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                    self:: headerLocation( 3 , 'slider/creat' ); // Page -> Redirection
                 endif;

            else: ?>
                <form method="post" id="grayColor" class="card" enctype="multipart/form-data">
                  

                      <div class="flex flexRow">
                           <div class="flexItem">
                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Slider Başlık :</label>
                                 <input
                                 required
                                 type="text"
                                 name="title"
                                 class="form-control"
                                 id="exampleInputEmail1"
                                 minlength="3"
                                 aria-describedby="emailHelp"
                                 placeholder="* Slider Başlık :" />
                           </div>
                      </div>
                      <div class="flex flexRow">
                           <div class="flexItem">
                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Slider Açıklama :</label>
                                 <textarea class="form-control" name="description" minlength="100" maxlength="165" placeholder="Slider Açıklama :" id="exampleFormControlTextarea1" rows="2"></textarea>
                           </div>
                      </div>
                      <div class="flex flexRow">
                           <div class="flexItem">
                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Slider Resim :</label>
                                 <input
                                 type="file"
                                 name="image"
                                 class="form-control"
                                 id="exampleInputEmail1"
                                 aria-describedby="emailHelp" />
                           </div>
                      </div>
                      <div class="flex flexRow">
                           <div class="flexItem text-right">
                                 <button type="submit" name="sliderCreate" class="margin-bottom-10 submitBTN btn btn-success yazi_700 Chakra" style="color:black;">
                                         EKLE
                                 </button>
                           </div>
                      </div>
                      <?=$this->token()->generate();?>
                </form>

            <? endif; ?>

      </div>
</div>
