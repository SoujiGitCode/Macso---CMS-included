<!DOCTYPE html>
<html lang="es">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="theme-color" content="#a27953"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo url('/')?>/uploads/icons/favicon.png">
      <!-- Font Awesome-->
      <?php echo Html::style('backend/css/fontawesome.css')?>
      <!-- ico-font-->
      <?php echo Html::style('backend/css/icofont.css')?>
      <!-- Themify icon-->
      <?php echo Html::style('backend/css/themify.css')?>
      <!-- Flag icon-->
      <?php echo Html::style('backend/css/flag-icon.css')?>
      <!-- Feather icon-->
      <?php echo Html::style('backend/css/feather-icon.css')?>
      <!-- Bootstrap css-->
      <?php echo Html::style('backend/css/bootstrap.css')?>
      <!-- App css-->
      <?php echo Html::style('backend/css/jquery.growl.css')?>
      <?php echo Html::style('backend/css/sweetalert.css')?>
      <?php echo Html::style('backend/css/style.css')?>
      <?php echo Html::style('backend/css/color-1.css')?>
      <!-- Responsive css-->
      <?php echo Html::style('backend/css/responsive.css')?>
      <title>Zapiola Negocios Inmobiliarios</title>
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo url('/')?>/uploads/icons/favicon.png">
   </head>
   <!-- Loader starts-->
 
   <!-- Loader ends-->
   <!-- page-wrapper Start-->
   <div class="page-wrapper">
      <div class="container-fluid p-0">
         <!-- login page start-->
         <div class="authentication-main no-bg">
            <div class="row">
               <div class="col-md-12">
                  <div class="auth-innerright">
                     <div class="authentication-box">
                        <div class="mt-4">
                           <div class="card-body text-center">
                              <div class="cont">
                                 <div> 
                                    @yield('content')

                                 </div>
                                 <div class="col-md-12">
                                     <p style="text-align: center;"> <span >Zapiola Negocios Inmobiliarios </span> ?? {{date("Y")}} Todos los derechos reservados</p>

                                  </div>
                                 
                              </div>

                           </div>
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- login page end-->
      </div>
   </div>
   <input type="hidden" name="url" value="<?php echo url('/')?>" id="url">
   <!-- latest jquery-->
   <?php echo Html::script('backend/js/jquery-3.5.1.min.js')?>
   <!-- Bootstrap js-->
   <?php echo Html::script('backend/js/bootstrap/popper.min.js')?>
   <?php echo Html::script('backend/js/bootstrap/bootstrap.min.js')?>
   <!-- feather icon js-->
   <?php echo Html::script('backend/js/icons/feather-icon/feather.min.js')?>
   <?php echo Html::script('backend/js/icons/feather-icon/feather-icon.js')?>
   <!-- Sidebar jquery-->
   <?php echo Html::script('backend/js/sidebar-menu.js')?>
   <?php echo Html::script('backend/js/config.js')?>
   <!-- Theme js-->
   <?php echo Html::script('backend/js/script.js')?>
   <!-- login js-->
   <?php echo Html::script('backend/js/jquery.growl.js')?>
   <?php echo Html::script('backend/js/sweetalert-dev.js')?>
   <!-- Functions JS -->
   <?php echo Html::script('backend/js/aes.js')?>
   <?php echo Html::script('backend/js/function.js')?>
   </body>
</html>