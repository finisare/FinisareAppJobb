<?php

class Mail {

      public function mailSend( array $data = NULL ){

             if( $data != NULL ):
                   require_once __DIR__ . '/mail/class.phpmailer.php';

                   $mail = new PHPMailer();

                   $mail->IsSMTP();                                   // send via SMTP
                   $mail->Host     = systemMailHost; // SMTP servers
                   $mail->SMTPAuth = TRUE;     // turn on SMTP authentication
                   $mail->Username = systemMailAccount;  // SMTP username
                   $mail->Password = systemMailPassword; // SMTP password

                   $mail->From     = systemMailAccount; // smtp kullan�c� ad�n�z ile ayn� olmal�
                   $mail->Fromname = systemMailFormName;
                   $mail->AddAddress( $data['sendEmail'] );
                   $mail->CharSet = 'UTF-8';

                   $mail->IsHTML(TRUE); //Mailin HTML formatında hazırlanacağını bildiriyoruz.
                   $mail->Subject = 'Mail Konu alanı';
                   //Mailimizin gövdesi: (HTML ile)
                   $body = self::mailTemplateEngine( $data['sendData'] );
                   // HTML okuyamayan mail okuyucularda görünecek düz metin:
                   $textBody = 'text-body-alanı';
                   $mail->Body = $body;
                   $mail->AltBody = $textBody;

                   if( $mail->Send() )
                      return TRUE;
                   else
                      return FALSE;
              else:
                 return NULL;
              endif;


      }

      private static function mailTemplateEngine( $data ){

             return '
                <!doctype html>
                <html>
                <head>
                  <meta charset="UTF-8">
                    <title mc:edit="mail_title"></title>

                    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>

                    <meta name="color-scheme" content="light dark">
                    <meta name="supported-color-schemes" content="light dark">

                    <link rel="preconnect" href="https://fonts.gstatic.com">
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

                  <style>
                        :root {
                            color-scheme: light dark;
                            supported-color-schemes: light dark;
                        }

                        @media screen and (max-width: 600px){
                      body{ font-size:14px !important; }

                      .content_wrapper{ padding:20px 0 20px !important; width:calc(100% - 40px); }
                            .template_container .logo_container{ height:80px !important; width:80px !important; }
                        }

                        @media (prefers-color-scheme: dark){
                            html{ background-color:#fff !important; }
                            body{ color:#fff !important; }
                      }
                    </style>
                </head>
                <!--background:rgb(36,129,255); background:linear-gradient(180deg, rgba(36,129,255,1) 0%, rgba(0,55,129,1) 100%); background-repeat:no-repeat; box-shadow:0 0 10px rgba(0,0,0,.5);-->
                <body style="font-family:\'Rajdhani\', sans-serif; font-size:18px; line-height:26px; margin:0 auto; color:#000;">
                    <div class="content_wrapper" style="max-width:720px; margin:0 auto;">
                    <div class="template_container" style="background-color:#FCFCFC; border-radius:4px; box-sizing:border-box; padding:40px 20px;">
                      <div class="logo_container" style="display:block; height:120px; width:120px; margin:0 auto; text-align:center; border-radius:20px; overflow:hidden; background:red; color:white;">
                          ŞİRKET LOGOSU
                      </div>
                      <div class="content_container" mc:edit="mail_content" style="margin-top:50px; width:100%;">
                        <h1 style="color:#000000; font-size:30px; line-height:38px; margin:0 auto 20px; text-align:center;">Finisare\'e giriş mi yapmak istiyorsunuz?</h1>
                        <div class="description_container" style="color:#000000; margin-top:30px; text-align:center;">Aşağıda bulunan 8 haneli kodu <strong>"Güvenlik Kodu"</strong> alanına yazarak giriş yapabilirsiniz.</div>
                                <div class="code_container">
                                    <span style="border:1px solid #858688; border-radius:5px; color:#000000; display:block; font-size:32px; font-weight:700; line-height:40px; margin:25px auto; padding:15px; text-align:center; width:180px;">'.$data.'</span>
                                </div>
                        <!--
                        <div class="separator_container" style="color:#858688; margin-bottom:20px; text-align:center;">veya</div>
                        <div class="description_container" style="color:#000000; text-align:center;">Oturum açmak için aşağıdaki bağlantıya tıklayabilirsiniz.</div>
                                <a href="javascript:;" target="_blank" style="background-color:#2651a4; color:#fff; display:block; max-width:230px; padding:10px 0; margin:20px auto 0; text-align:center; text-decoration:none; border-radius:3px; box-shadow:0 0 3px rgba(0,0,0,.2);">Tıklayınız</a>
                      </div> -->
                    </div>
                    <div class="footer_container" style="margin-top:80px;">
                      <div class="grey_logo_container" style="margin:0 auto 20px; width:50px;">
                           <img alt="logo" src="'.homeRoot.'/assets/images/FWhite.svg" style="display:block; height:auto; width:45px;">
                      </div>
                      <div style="text-align:center; width:100%;">
                           <span style="color:black; font-size:14px;">
                                 <strong style="font-size:20px; font-weight:bold; font-style:normal;">'.companyName.'</strong><br>
                                 <span style="font:weight:500; font-style:normal;">
                                         © Tüm hakları saklıdır. <br>
                                         2013 - '.date('Y').'
                                 </span>
                           </span>
                      </div>
                    </div>
                    </div>
                </body>
                </html>';

      }
}
