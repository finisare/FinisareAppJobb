
<? self::components( 'title' , 'Kullanıcı Listele' ) ?>

<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Kullanıcı' , 'Listele' , 'style' => 'color:purple;' ]  ); ?>
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
          <style>
          tfoot input {
              width: 100%;
              padding: 3px;
              box-sizing: border-box;
          }
          </style>

          <div class="row">
               <div class="card boyutla" style="padding:20px;">
              <table id="example" class="display boyutla">
                      <thead>
                          <tr>
                              <th>İSİM</th>
                              <th>SOYİSİM</th>
                              <th>E-MAİL</th>
                              <th>YETKİ</th>
                              <th>İŞLEM</th>
                          </tr>
                      </thead>
                      <tbody class="justifyContentFlexEnd alignItemsFlexEnd">
                            <? foreach ($data as $items): ?>
                                <tr>
                                    <th><?=$items['name'];?></th>
                                    <th><?=$items['surname'];?></th>
                                    <th><?=$this->valueEncrypt( 'unlock' , $items["email"]);?></th>
                                    <th><?=$items['authority'] ? 'ADMİN':'EDİTÖR';?></th>
                                    <? if( $_SESSION['user']['authority'] ): ?>
                                          <th>
                                              <a href="<?=homeRoot;?>/user/update/<?=$items['random'];?>" class="btn btn-warning" >
                                                 <i class="fa-1x material-icons text-black" >create</i>
                                              </a>
                                              <? if( $_SESSION['user']['random'] != $items['random'] ): ?>
                                                  <a href="<?=homeRoot;?>/user/delete/<?=$items['random'];?>" class="btn btn-danger" >
                                                     <i class="fa-1x material-icons text-black" >delete_sweep</i>
                                                  </a>
                                              <? endif; ?>
                                          </th>
                                    <? else: ?>
                                          <th>
                                              <a class="btn btn-danger" >
                                                 YETKİ YOK
                                              </a>
                                          </th>
                                    <? endif; ?>

                                </tr>
                            <? endforeach; ?>
                      </tbody>
                      <!--
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                            </tr>
                        </tfoot>
                      -->
              </table>
          </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" /></script>
<script>
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Arama '+title+'" />' );
    } );

    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });

} );
</script>
