<style>
.breadcrumb-item{
   font-size: 15px;
   font-weight: normal;
}
</style>
<div class="page-info">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-separator-1" >
              <li class="breadcrumb-item" ><a href="<?=domain.dirnameProject.'/'.dirnameProjectHome?> ">Anasayfa</a></li>
              <?php for($sayi = 0; $sayi < count( explode( '/' , @App::parseUrl() ) ); $sayi++)
                     echo '<li class="breadcrumb-item active" aria-current="page"><span>'.@$data["{$sayi}"].'</li></span>';  ?>
          </ol>
      </nav>
</div>
