<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Bakkal' , 'Listele' , 'style' => 'color:purple;' ]  ); ?>
      <div class="main-wrapper">

          <div class="row">

               <div class="col-4">

                     <div class="card bg-dark text-white">
                         <img
                         src="https://alinedim.com/images/tema/F-T.468929/F-T.468929.png"
                         class="card-img"
                         alt="..."
                         />
                         <div class="card-img-overlay" style="background:black; opacity:0.7;">
                             <h5 class="card-title">Card title</h5>
                             <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                             <p class="card-text">Last updated 3 mins ago</p>
                         </div>
                     </div>

               </div>

               <div class="col-4">
                     <div class="card">
                           <div class="card-body text-center">
                                <?=$this->parseUrll;?>
                                <h5 class="card-title" style="font-size:30px;">ÜRÜN EKLE</h5>
                                <a href="<?=domain.dirnameProject;?>/store/creat" class="btn btn-secondary">
                                   <span class="material-icons">add</span>
                                </a>

                           </div>
                     </div>
               <div class="col-4">

          </div>

     </div>
</div>
