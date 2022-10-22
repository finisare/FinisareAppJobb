<? self::components( 'title' , 'Kategori Listele' ); ?>
<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Kategori' , 'Listele' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">
           <div class="row">

                   <?php if( $data != NULL ):
                              foreach( $data as $items ): ?>

                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                      <div class="card" id="Chakra">

                                            <div class="card-header">
                                                 <div class="boyutla margin-top-20">
                                                      <h3 class="card-title Chakra kisalt" id="contentTitle"><?=$items['title'];?></h3>
                                                 </div>
                                            </div>
                                            <div class="card-body boyutla">
                                                  <a style="margin:3px;" href="<?=homeRoot?>/category/update/<?=$items['random']?>" class="btn btn-warning" >
                                                     <i class="material-icons" style="color:black; font-size:24px;">create</i>
                                                  </a>
                                                  <a style="margin:3px;" href="<?=homeRoot?>/category/delete/<?=$items['random']?>" class="btn btn-danger" >
                                                     <i class="material-icons" style="color:black; font-size:24px;">delete_sweep</i>
                                                  </a>
                                                  <a style="margin:3px;" href="<?=homeRoot?>/category/read/<?=$items['random']?>" class="btn btn-info" >
                                                     <i class="material-icons" style="color:black; font-size:24px;">search</i>
                                                  </a>
                                            </div>
                                            <div class="card-footer">
                                                  <div class="boyutla ">
                                                       <i class="fa fa-user" aria-hidden="true"></i> <?=space.$items['user'];?>
                                                       <?=space.space.space;?>
                                                       <i class="fa fa-envelope" aria-hidden="true"></i> <?=space.explode( '|' , $items['datee'] )[0];?>
                                                       <?=space.space.space;?>
                                                       <i class="fa fa-link" aria-hidden="true"></i> <?=space.$items['ip_adres'];?>
                                                  </div>
                                            </div>
                                      </div>
                                </div>

                              <?php endforeach;
                    else:
                       self:: components( 'alert' , [ 'value' => 'danger' , 'message' => 'İçerik Yok' , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                    endif;  ?>
            </div>
      </div>
</div>
