<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Iniciar Sesion </title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
        <link href="<?php echo base_url(); ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />       
        <link href="<?php echo base_url(); ?>/assets/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>/assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/build/css/custom.min.css">
        <!-- Datatables -->
        <link href="<?php echo base_url(); ?>/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  </head>
<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>        
        <div class="login_wrapper">             
            <div class="animate form login_form">
                <section class="login_content">
                <img  src='<?php echo base_url();?>assets/resource/img/<?php echo $logo; ?>.png' style="max-width: 290px;">
                    <form  id="login-form" action="#" method="post">
                        <h1>Acceso</h1>
                        <div>
                            <input type="text" name="user" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" name="pass" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn submit" style="background: #4AAA42; color: #fff">Iniciar Sesion</button>
                            <!--<a class="reset_pass" href="#signup">¿Olvidaste tu password?</a>-->
                        </div>

                        <div class="clearfix"></div>

                    </form>
                    <div class="row">
                        <div style="padding-top: 20%;">
                            <p> <b>Powered by </b> <img  src='<?php echo base_url();?>assets/resource/img/PointVerde-ingles.png' style="max-width: 120px;"></p>
                        </div>
                    </div>
                    
                </section>
            </div>

            <div id="modal-window" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span id="modal-close" class="close">×</span>
                        <h2>Error</h2>
                    </div>
                    <div class="modal-body">
                        <p>El login o el password son incorrectos.</p>
                        <p>Intentalo de nuevo.</p>
                    </div>
                </div>

            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form id="recovery-form" action="#" method="post">
                        <h1 id="pass-recovery">Recuperar contraseña</h1>
                        <h2>
                            Escribe el E-Mail con el cual está registrada tu cuenta.
                        </h2>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Enviar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">¿Tienes un usuarío?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                        </div>
                    </form>
                </section>
            </div>
            
        </div>
    </div>

    </body>
</html>