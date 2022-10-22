<body class="auth-page sign-in">

     <style>
        .dark-theme span{
            color:white;
        }
        span{
            color:black;
        }
     </style>

     <div class="container h-100">
             <div class="row h-100 justify-content-center align-items-center">
                  <?php
                     if( $data ):
                           self::components( 'alert' , [
                              'value' => 'warning',
                              'message' => 'Çıkış İşleminiz Yapılıyor. Lütfen Bekleyiniz.',
                              'style' => '
                              color:black;
                              font-size:22px;
                              font-weight:600;
                              '
                           ] );
                           self::headerLocation( 5 );
                     else:
                         self::components( 'alert' , [
                            'value' => 'danger',
                            'message' => 'Bir Sorun Oluştu. Yönlendiriliyorsunuz.',
                            'style' => '
                            color:white;
                            font-size:22px;
                            font-weight:600;
                            '
                         ] );
                         self::headerLocation( 5 );
                     endif;
                  ?>
             </div>
     </div>

</body>
</html>
