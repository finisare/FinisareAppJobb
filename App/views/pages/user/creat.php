<? self::components( 'title' , 'Kullanıcı Ekle' ); ?>

<div class="page-content">
      <? self::components( 'breadcrumb' , [ 'Kullanıcı' , 'Ekle' , 'style' => 'color:black;' ]  ); ?>
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
            if( !is_null($data) and isset( $_POST['userCreat'] ) ):

                 if( $data ):
                    self:: components( 'alert' , [ 'value' => 'success' , 'message' => success , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                    self:: headerLocation( 3 , 'user/read' ); // Page -> Redirection
                 else:
                    self:: components( 'alert' , [ 'value' => 'danger' , 'message' => danger , 'style' => 'color:black; font-size:18px;' ] ); // Notification -> Message
                    self:: headerLocation( 3 , 'user/creat' ); // Page -> Redirection
                 endif;

            else: ?>
                <form method="post" id="grayColor" class="card" enctype="multipart/form-data">
                      <div class="flex flexRow">
                           <div class="flexItem">
                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Kullanıcı Adı :</label>
                                 <div class="input-group padding-top-10">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text material-icons" id="inputGroupPrepend">person</span>
                                      </div>
                                      <input
                                       required
                                       type="text"
                                       name="userName"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                       minlength="3"
                                       aria-describedby="emailHelp"
                                       placeholder="* Kullanıcı Adı :" />
                                  </div>
                           </div>
                           <div class="flexItem">
                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Kullanıcı Soyadı :</label>
                                 <div class="input-group padding-top-10">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text material-icons" id="inputGroupPrepend">person</span>
                                      </div>
                                      <input
                                       required
                                       type="text"
                                       name="userSurname"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                       minlength="3"
                                       aria-describedby="emailHelp"
                                       placeholder="* Kullanıcı Soyadı :" />
                                  </div>
                           </div>
                           <div class="flexItem">
                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Kullanıcı E-Mail :</label>
                                 <div class="input-group padding-top-10">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text material-icons" id="inputGroupPrepend">@</span>
                                      </div>
                                      <input
                                      required
                                      type="email"
                                      name="userEmail"
                                      class="form-control"
                                      id="exampleInputEmail1"
                                      minlength="3"
                                      aria-describedby="emailHelp"
                                      placeholder="* Kullanıcı E-Mail :" />
                                  </div>
                           </div>
                      </div>
                      <div class="flex flexRow">
                           <div class="flexItem">
                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Kullanıcı Şifre :</label>
                                 <div class="input-group padding-top-10">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text material-icons" id="inputGroupPrepend">lock</span>
                                      </div>
                                      <input
                                       required
                                       type="text"
                                       name="userPassword"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                       minlength="3"
                                       aria-describedby="emailHelp"
                                       placeholder="* Kullanıcı Şifre :" />
                                  </div>
                           </div>
                           <div class="flexItem">
                                <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">* Yetki :</label>
                                <div class="input-group padding-top-10">
                                      <select class="form-control custom-select" required="required" name="userAuthority" id="exampleFormControlSelect1">
                                              <option value="">YETKİ SEÇİNİZ</option>
                                              <option value="1">ADMİN</option>
                                              <option value="0">EDİTÖR</option>
                                      </select>
                                </div>
                           </div>
                      </div>
                      <div class="flex flexRow">
                           <div class="flexItem">
                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Kullanıcı Avatar :</label>
                                 <div class="input-group padding-top-10">
                                      <div class="input-group-prepend">
                                           <span class="input-group-text material-icons" id="inputGroupPrepend">image</span>
                                      </div>
                                      <input
                                      type="file"
                                      name="avatar"
                                      class="form-control"
                                      id="exampleInputEmail1"
                                      aria-describedby="emailHelp" />
                                  </div>
                           </div>
                           <div class="flexItem margin-top-20">
                                 <label for="exampleInputEmail3" class="Chakra yazi_700" id="formLabel">Kullanıcı Oturum Süresi :</label>
                                 <div class="input-group padding-top-20">

                                      <input type="range" name="userTimeSession" list="tickmarks" class="boyutla sifirla">
                                      <datalist id="tickmarks">
                                                <option value="0" label="0%">0</option>
                                                <option value="10"></option>
                                                <option value="20"></option>
                                                <option value="30"></option>
                                                <option value="40"></option>
                                                <option value="50"></option>
                                                <option value="60"></option>
                                                <option value="70"></option>
                                                <option value="80"></option>
                                                <option value="90"></option>
                                                <option value="100" label="100%">100</option>
                                      </datalist>
                                </div>
                           </div>
                      </div>
                      <div class="flex flexRow">
                           <div class="flexItem text-right">
                                 <button type="submit" name="userCreat" class="margin-bottom-20 margin-top-10 submitBTN btn btn-success yazi_700 Chakra" style="color:black;">
                                         EKLE
                                 </button>
                           </div>
                      </div>
                      <?=$this->token()->generate();?>
                </form>

            <? endif; ?>

      </div>
</div>
