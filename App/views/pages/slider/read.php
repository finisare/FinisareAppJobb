
<? self::components( 'title' , 'Slider Listele' ) ?>
<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Slider' , 'Listele' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
          <!--
          <div class="item">
              <div class="col-md-12">
                  <div class="page-title">
                      <p class="page-desc">Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.</p>
                  </div>
              </div>
          </div>
          --->
          <div class="row">

                <? if( $data != NULL ):

                    foreach( $data as $item ): ?>


                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="card" id="Chakra">

                                <div class="card-header" id="listele">
                                      <? if( $item['image'] ): ?>
                                          <div class="col-12 sifirla">
                                               <a class="img example-image-link" href="<?=$item['image'];?>" title="<?=$item['title'];?>" data-lightbox="example-1">
                                                  <img src="<?=$item['image'];?>" title="<?=$item['title'];?>" alt="<?=$item['description'];?>" class="card-img-top objectFitCover" style="width:100%; height:45vh;" >
                                               </a>
                                          </div>
                                      <?endif;?>
                                     <div class="col-12 sifirla">
                                          <h4 class="card-title kisalt padding-top-20" id="Chakra" style="font-size:20px; text-transform:none;"><?=$item['title'];?></h4>
                                     </div>
                                     <? if( $item['description'] ): ?>
                                     <div class="col-12 sifirla">
                                           <p class="card-text margin-bottom-30 Chakra">
                                              <?=$item['description'];?>
                                           </p>
                                     </div>
                                     <? endif;?>
                                </div>
                                <div class="card-body">
                                    <a href="<?=homeRoot;?>/slider/update/<?=$item['random'];?>" class="btn btn-warning" >
                                       <i class="material-icons text-black" >create</i>
                                    </a>
                                    <?=space.space?>
                                    <a href="<?=homeRoot;?>/slider/delete/<?=$item['random'];?>" class="btn btn-danger" >
                                       <i class="material-icons text-black" >delete_sweep</i>
                                    </a>
                                </div>
                                <div class="card-footer ">
                                      <div class="col-12 sifirla kisalt">
                                           <i class="fa fa-user" aria-hidden="true"></i> <?=space.$item['user'];?>
                                           <?=space.space.space;?>
                                           <i class="fa fa-envelope" aria-hidden="true"></i> <?=space.explode( '-' , $item['datee'] )[0];?>
                                           <?=space.space.space;?>
                                           <i class="fa fa-link" aria-hidden="true"></i> <?=space.$item['ip_adres'];?>
                                      </div>
                                </div>
                          </div>
                     </div>


                 <? endforeach;
               else:
                    self:: components( 'alert' , [ 'value' => 'danger' , 'message' => 'İçerik Yok' , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
               endif; ?>
          </div>



      </div>
</div>
