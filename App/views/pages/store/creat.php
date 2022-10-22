<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Store Ürün' , 'Ekle' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">

            <div class="row">
                  <div class="col-md-12">
                        <div class="page-title">
                             <p class="page-desc">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
                        </div>
                  </div>
            </div>
            <?

            if( isset( $_POST['storeCreate'] ) ):

                if( $data ):
                   // self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                   // self:: headerLocation( 3 , 'menu/read' ); // Page -> Redirection
                else:
                   // self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                   // self:: headerLocation( 3 , 'menu/creat' ); // Page -> Redirection
                endif;

            else: ?>

                   <form method="post" id="grayColor" class="card" enctype="multipart/form-data">

                               <div class="flex flexRow">
                                    <div class="flexItem ">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Ürün Başlık :</label>
                                          <div class="input-group">
                                                <input
                                                required
                                                type="text"
                                                name="title"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                minlength="3"
                                                aria-describedby="emailHelp"
                                                placeholder="Ürün Başlık :" />
                                           </div>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="flexItem">
                                         <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Store Ürün Tipi :</label>
                                         <div class="input-group">
                                               <select class="form-control custom-select" required="required" name="category" id="exampleFormControlSelect1">
                                                       <option value="">ÜRÜN TİPİ SEÇİNİZ</option>
                                                       <option value="plugin">PLUGİN</option>
                                                       <option value="theme">TEMA</option>
                                               </select>
                                         </div>
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Ürün Description :</label>
                                          <textarea class="form-control" minlength="100" maxlength="165" name="description" placeholder="Menü Description :" id="exampleFormControlTextarea1" rows="2"></textarea>
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem">
                                          <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Ürün Resim :</label>
                                          <input
                                          type="file"
                                          name="image"
                                          class="form-control"
                                          id="exampleInputEmail1"
                                          aria-describedby="emailHelp" />
                                    </div>
                               </div>
                               <div class="flex flexRow">
                                    <div class="flexItem text-right ">
                                          <button type="submit" name="storeCreate" class="text-black margin-bottom-20 margin-top-10 submitBTN btn btn-success Chakra yazi_500" style="font-size:20px; color:black;">
                                                  EKLE
                                          </button>
                                    </div>
                               </div>
                               <?=$this->token()->generate();?>
                   </form>


            <? endif; ?>

      </div>
</div>
