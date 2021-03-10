<!DOCTYPE html>
<html lang="zxx">
   
<!-- Mirrored from colorlib.net/metrical/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jan 2020 21:18:43 GMT -->
    <head>
          <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
          <meta charset="utf-8">
          
      
          <meta http-equiv="x-ua-compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">
          <meta name="keyword" content="">
          <meta name="author"  content=""/>
          <!-- Page Title -->
          <title>MCI - SERVICE</title>

          <!-- Main CSS 
              <link type="text/css" rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
          -->			
          
      
      
          

          <link type="text/css" rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
          <link type="text/css" rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css"/>
          <link type="text/css" rel="stylesheet" href="assets/plugins/flag-icon/flag-icon.min.css"/>
          <link type="text/css" rel="stylesheet" href="assets/plugins/simple-line-icons/css/simple-line-icons.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/ionicons/css/ionicons.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/chartist/chartist.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/apex-chart/apexcharts.css">
          <link type="text/css" rel="stylesheet" href="assets/css/app.min.css"/>
          <link type="text/css" rel="stylesheet" href="assets/css/style.min.css"/>
          <link type="text/css" rel="stylesheet" href="assets/plugins/datatables/jquery.dataTables.min.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/datatables/extensions/dataTables.jqueryui.min.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/sweetalert/bootstrap-sweetalert.css">   
          <link type="text/css" rel="stylesheet" href="assets/plugins/dropify/css/dropify.min.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/dropzone/dropzone.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/baguetteBox/baguetteBox.min.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/viewer/css/viewer.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/viewer/css/main.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/photoswipe/photoswipe.css">
          <link type="text/css" rel="stylesheet" href="assets/plugins/photoswipe/default-skin/default-skin.css">
          <script src="assets/js/noti.js"></script>   
          <script src="assets/plugins/jquery/jquery.min.js"></script>

          
          <!-- Favicon -->
          <link rel="icon" href="assets/images/minovate-logo-color.png" type="image/x-icon">
          <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
          <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
          <!--[if lt IE 9]>
          <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



          

           <![endif]-->

           <!-- <script src="assets/plugins/jquery/jquery.min.js"></script>-->

            <style type="text/css">
              

              .dtHorizontalVerticalExampleWrapper {
                    max-width: 600px;
                    margin: 0 auto;
                    }
                    #dtHorizontalVerticalExample th, td {
                    white-space: nowrap;
                    }
                    table.dataTable thead .sorting:after,
                    table.dataTable thead .sorting:before,
                    table.dataTable thead .sorting_asc:after,
                    table.dataTable thead .sorting_asc:before,
                    table.dataTable thead .sorting_asc_disabled:after,
                    table.dataTable thead .sorting_asc_disabled:before,
                    table.dataTable thead .sorting_desc:after,
                    table.dataTable thead .sorting_desc:before,
                    table.dataTable thead .sorting_desc_disabled:after,
                    table.dataTable thead .sorting_desc_disabled:before {
                    bottom: .5em;
                    }
            </style>


    </head>







   
<body>

  



                  <?php 
                    if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])){

                    //SI SE LOGRA EL INICIO DE SESION SE MUESTRA LA PAGINA //  EN SU DEFECTO SE MUESTRA EL INICIO DE SESION 



                  ?>
<?php
                          $user = UserData::getById($_SESSION["user_id"]);

                         
                             
                           ?>
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container">
         <!--================================-->
         <!-- Page Sidebar Start -->
         <!--================================-->
         <div class="page-sidebar">
                <div class="logo">
                  <a class="logo-img" href="index.php?view=<?php if($user->rol=="EMPRESA"){echo "Empresa/Reportes/indexlamina";}else{echo "Card";}?>">		
                  <img class="desktop-logo" src="assets/images/logo.png" alt="">
                  <img class="small-logo" src="assets/images/minovate-logo-color.png" alt="">
                  </a>			
                  <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
                </div>
            <!--================================-->
            <!-- Sidebar Menu Start -->
            <!--================================-->
            <div class="page-sidebar-inner">
               <div class="page-sidebar-menu">
                  <ul class="accordion-menu">
                 
                     <li>
                      <!---condicional para cualquier usuario diferente a empresa--->
                       
                    </li>

                   
                  </ul>
               </div>
            </div>
            <!--/ Sidebar Menu End -->
            <!--================================-->
            <!-- Sidebar Footer Start -->
            <!--================================-->
            <div class="sidebar-footer">									
               <a class="pull-left" href="" data-toggle="tooltip" data-placement="top" data-original-title="Profile">
               <i data-feather="user" class="ht-15"></i></a>									
               <a class="pull-left " href="" data-toggle="tooltip" data-placement="top" data-original-title="Mailbox">
               <i data-feather="mail" class="ht-15"></i></a>
               <a class="pull-left" href="" data-toggle="tooltip" data-placement="top" data-original-title="Lockscreen">
               <i data-feather="lock" class="ht-15"></i></a>
               <a class="pull-left" href="./logout.php" data-toggle="tooltip" data-placement="top" data-original-title="Sing Out">
               <i data-feather="log-out" class="ht-15"></i></a>
            </div>
            <!--/ Sidebar Footer End -->
         </div>
         <!--/ Page Sidebar End -->
         <!--================================-->
         <!-- Page Content Start -->
         <!--================================-->
         <div class="page-content">
            <!--================================-->
            <!-- Page Header Start -->
            <!--================================-->
            <div class="page-header">
               
               <!--================================-->
               <!-- Page Header  Start -->
               <!--================================-->
               <nav class="navbar navbar-expand-lg">
                        <ul class="list-inline list-unstyled mg-r-20">
                           <!-- Mobile Toggle and Logo -->
                           <li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                           <!-- PC Toggle and Logo -->
                           <li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                        </ul>
                  <!--================================-->
                  <!-- Mega Menu Start -->
                  <!--================================-->
                     <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            
                              <li class="dropdown mega-dropdown mg-t-9 " style="margin-left: 350px;"> 
                              
                              </li>
                        
                        </ul>

                        
                     </div>
                  <!--/ Mega Menu End-->
                  <!--/ Brand and Logo End -->
                  <!--================================-->
                  <!-- Header Right Start -->
                  <!--================================-->
                  <div class="header-right pull-right">
                     <ul class="list-inline justify-content-end">
                     <li class="list-inline-item align-middle"><a  href="index.php?view=Card" ><i class="icon ion-ios-home-outline tx-20"></i></a></li>
         
                        <!--/ Languages Dropdown End -->
                        <!--================================-->
                        <!-- Notifications Dropdown Start -->
                        <!--================================-->

                        <!--/ Notifications Dropdown End -->
                        <!--================================-->
                       
                        <!--================================-->
                        <!-- Profile Dropdown Start -->
                        <!--================================-->
                          <?php   $clientes = UserData::getById($_SESSION["user_id"]); ?>
                          <li class="list-inline-item dropdown">
                            <a  href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="select-profile">Hola, <?php  echo $clientes->nombre?></span>
                            <img src="assets/images/avatar/avatar1.png" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-profile shadow-2">
                                <div class="user-profile-area">
                                  <div class="user-profile-heading">
                                      <div class="profile-thumbnail">
                                        <img src="assets/images/avatar/avatar1.png" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                                      </div>
                                      <div class="profile-text">
                                        <h6><?php  echo $clientes->nombre?></h6>
                                        <span><?php  echo $clientes->email?></span>
                                      </div>
                                  </div>

                                                        <form action="index.php?view=View_Profile" method="post">   
                                                                      <input type="hidden" name="id" value=<?php echo $clientes->id;?>>
                                                                    
                                                                      <button  class="dropdown-item"><i class="icon-user" aria-hidden="true"></i> My profile</button>
                                                        </form>


                                  
                                <!--  
                                  <a href="index.php?view=View_Profile" class="dropdown-item"><i class="icon-user" aria-hidden="true"></i> My profile</a>
                                  <a href="#" class="dropdown-item"><i class="icon-user" aria-hidden="true"></i> My profile</a>
                                  <a href="#" class="dropdown-item"><i class="icon-envelope" aria-hidden="true"></i> Messages <span class="badge badge-success ft-right mg-t-3">10+</span></a>
                                  <a href="#" class="dropdown-item"><i class="icon-settings" aria-hidden="true"></i> settings</a>
                                  <a href="#" class="dropdown-item"><i class="icon-share" aria-hidden="true"></i> My Activity <span class="badge badge-warning ft-right mg-t-3">5+</span></a>
                                  <a href="#" class="dropdown-item"><i class="icon-cloud-download" aria-hidden="true"></i> My Download <span class="badge badge-success ft-right mg-t-3">10+</span></a>
                                  <a href="#" class="dropdown-item"><i class="icon-heart" aria-hidden="true"></i> Support</a>-->
                                  <a href="./logout.php" class="dropdown-item"><i class="icon-power" aria-hidden="true"></i> Sign-out</a>
                                </div>
                            </div>
                          </li>
                        <!-- Profile Dropdown End -->
                        <!--================================-->
                     
                     </ul>
                  </div>
                  <!--/ Header Right End -->
               </nav>
            </div>
            <!--/ Page Header End -->
            <!--================================-->
            <!-- Page Inner Start -->
            <!--================================-->
         
           
                                
                                <!-- <div class="card-header">
                                       <h4 class="card-header-title">
                                       MCI SERVICE
                                       </h4>
                                          <div class="card-header-btn">
                                             <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#bj" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                             <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                                             <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                             <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                                          </div>
                                   </div>
                                 -->
                                                           
                                                                  <?php
                                                                  if($clientes->rol!="EMPRESA"){

                                                                  
                                                                  View::load("Card");
                                                                }else{
                                                                  
                                                                  session_start();
                                                                  // ---
                                                                  // la tarea de este archivo es eliminar todo rastro de cookie
                                                                  
                                                                  // -- eliminamos el usuario
                                                                  if(isset($_SESSION['user_id'])){
                                                                    unset($_SESSION['user_id']);
                                                                  }
                                                                  
                                                                  session_destroy();
                                                                  // v0 29 jul 2013
                                                                  //estemos donde estemos nos redirije al index
                                                                  print "<script>window.location='./';</script>";
                                                                }
                                                                
                                                                  ?>

                                                             
                                                       

            <!--/ Page Inner End -->		
         </div>
         <!--/ Page Content End -->
      </div>
      <!--/ Page Container End -->











      
      <!--================================-->
      <!-- Scroll To Top Start-->
      <!--================================-->	
     <!-- <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>-->
      <!--/ Scroll To Top End -->
      <!--================================-->
       
      <!--================================-->
    
      <!--================================-->


      <?php }else{
                        ?>
                  <div style="background-image: url('img/categoria/fondo.jpg');">
                        <div class="ht-100v d-flex">
                           <div class="card shadow-none pd-20 mx-auto wd-300 text-center bd-1 align-self-center">
                               <center> <img src="img/categoria/0.jpg" width="40%"></center>
                           
                               <h4 class="card-title mt-3 text-center">Login</h4>
                            
                      
                          
                              <form role="form" action="index.php?action=processlogin" method="post"> 
                               
                              <input type="hidden" class="form-control"  id="direccion"  value="<?php echo $_SERVER["REQUEST_URI"];?>" name="direccion">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Usuario</label>
                                          <input type="text" class="form-control" required="" id="exampleInputEmail1" placeholder="Ingrese su usuario" name="username">
                                       </div>

                                       <div class="form-group">
                                          <label for="exampleInputPassword1">Password</label>
                                          <input type="password" name="password" required="" class="form-control" id="exampleInputPassword1" placeholder="Ingrese su Password">
                                       </div>


                                    <!--       <p class="text-center"><a href="">Forget Password?</a></p>-->
                                 <div class="form-group">
                                    <button type="submit" class="btn btn-custom-primary btn-block tx-13 hover-white"> Login </button>
                                 </div>
                                     <!--   <p class="text-center">Don't have an account?<br/> <a href="">Create Account</a> </p>-->
                              </form>
                           </div>
                        </div>
                  </div>




               <?php }
                        ?>




 <!--================================-->

    

      
   

    <!-- Footer Script -->
      <!--================================-->
     
      <script src="assets/plugins/jquery/jquery.min.js"></script>
      <script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
      <script src="assets/plugins/popper/popper.js"></script>
      <script src="assets/plugins/feather-icon/feather.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/pace/pace.min.js"></script>  
      <script src="assets/plugins/countup/counterup.min.js"></script>		
      <script src="assets/plugins/waypoints/waypoints.min.js"></script>
      <script src="assets/plugins/chartjs/chartjs.js"></script>
      <script src="assets/plugins/apex-chart/apexcharts.min.js"></script>
      <script src="assets/plugins/apex-chart/irregular-data-series.js"></script>
      <script src="assets/plugins/simpler-sidebar/jquery.simpler-sidebar.min.js"></script>	   

      <script src="assets/js/dashboard/Reporte.js"></script>
      <script src="assets/js/dashboard/reporte2.js"></script>
      <script src="assets/js/dashboard/Reporte3.js"></script>
      <script src="assets/js/dashboard/Reporte4.js"></script>
      <script src="assets/js/dashboard/Reporte5.js"></script>  
      <script src="assets/js/dashboard/Reporte6.js"></script>    
      <script src="assets/js/dashboard/ReporteEmpresa.js"></script>    
      <script src="assets/js/dashboard/ReporteEmpresa2.js"></script>  

      <script src="assets/js/dashboard/ReporteEmpresa3.js"></script>
      <script src="assets/js/dashboard/ReporteEmpresa4.js"></script>
     <!-- <script src="assets/js/dashboard/geoloc.js"></script>-->
      
      <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
      <script src="assets/js/jquery.slimscroll.min.js"></script>
      <script src="assets/js/highlight.min.js"></script>
      <script src="assets/js/app.js"></script>
      <script src="assets/js/custom.js"></script>   
      <script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>    
      <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="assets/plugins/datatables/responsive/dataTables.responsive.js"></script>
      <script src="assets/plugins/datatables/extensions/dataTables.jqueryui.min.js"></script>
      <script src="assets/plugins/moment/moment.min.js"></script>
      <script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script> 
      <script src="assets/plugins/modal/bootbox.js"></script>
      <script src="assets/plugins/modal/ui-modals.js"></script>
      <script src="assets/plugins/sweetalert/bootstrap-sweetalert.js"></script>
      <script src="assets/plugins/dropify/js/dropify.min.js"></script>
      <script src="assets/plugins/dropzone/dropzone.js"></script>
      <script src="assets/plugins/baguetteBox/baguetteBox.min.js"></script>		
      <script src="assets/plugins/viewer/js/viewer.js"></script>
      <script src="assets/plugins/viewer/js/common.js"></script>
      <script src="assets/plugins/viewer/js/main.js"></script>
      <script src="assets/plugins/photoswipe/photoswipe.min.js"></script>
      <script src="assets/plugins/photoswipe/photoswipe-ui-default.min.js"></script>
     

      <script src="assets/plugins/flot/jquery.flot.js"></script>
      <script src="assets/plugins/flot/jquery.flot.pie.js"></script>
      
     <!--- --------------------------  
     <script src="assets/plugins/toastr/toastr.min.js"></script>-------------------------------------
    
     <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>-
     <script src="assets/plugins/01.js"></script>-->
     <script src="assets/plugins/toastr/toastr.min.js"></script>

     
    <!--==============FOOTER SCRIPT=================-->
     

       <!--- ------------------------------------------------------------------>
 

      <script>
         $('.dropify').dropify({
         	messages: {
         		'default': 'Haz Clic O Arrastra Un Archivo',
         		'replace': 'Haz Clic O Arrastra Un Archivo Para Reemplazar',
         		'remove':  'Quitar',
         		'error':   'Ooops, Hay Un Error.'
         	}
         });
         
      </script>

 
      
    
      <script>
         // Basic DataTable	
          $('#basicDataTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // No Style DataTable	
          $('#noStyleedTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Cell Border DataTable	
          $('#cellBorder').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Compact DataTable	
          $('#compactTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Hoverable DataTable	
          $('#hoverTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	}
           });
           
         // Hoverable DataTable	
          $('#orderActiveTable').DataTable({
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
         	  sSearch: ''
         	},
         	"order": [[ 1, "desc" ]]
           });
         
         // Scrollable Table DataTable	
          $('#scrollableTable').DataTable({
               
         	responsive: true,
         	language: {
         	  searchPlaceholder: 'Search...',
              sSearch: ''
              
         	},
         	"order": [[ 1, "asc" ]],
            "scrollY":        "250px",
        
         	"scrollCollapse": true,
         	"paging":         true
           });


         
      </script>

      
      <script type="text/javascript">
        

            $(document).ready(function () {
          $('#dtHorizontalVerticalExample').DataTable({
            
            
          "scrollX": true,
          "scrollY": 450,
          "order": [[ 0, "desc" ]]
          });
          $('.dataTables_length').addClass('bs-select');
          });
      </script>
 

   
        <script language="javascript" name="respuesta">  



          function pregunta(){
                        
                          if(confirm('¿Está Seguro? ')){
                    
                              return true;

                          }else{
                            return false;
                          }

                    


          }

              function pregunta3(){
                        if(confirm('¿Está Seguro? ')){
                    
                    
                    if(document.getElementById("empresa").value!="" && document.getElementById("conductor").value!="" && document.getElementById("tipo").value!="" && document.getElementById("placa").value!=""){
                            document.getElementById("btn").disabled=true;
                            document.getElementById("MiForm").submit();
                       return true;

                    }else{ 
                      alert("faltan campos por llenar");
                      return false;
                    }

                    return true;

                }else{
                  return false;
                }

           


              }


              function pregunta2(){
                      var pass1=document.getElementById("password1").value;
                      var pass2=document.getElementById("password2").value;
                    if(pass1==pass2){

                                  if(confirm('¿Está Seguro? ')){
                                                   return true; 
                                          }else{
                                                    return false;
                                              }

                    }else{
                             alert("contraseñas no coinciden");
                          return false;

                    }


        

              }





        </script>
        <script>
                  /*
                $(document).ready(
                        
                        function(){
                        setTimeout(function(){
                            toastr.options={
                                positionClass:"toast-top-right",
                                closeButton:true,progressBar:true,showMethod:"slideDown",
                                timeOut:5000};
                                toastr.info("Multipurpose Admin Template","Hi, welcome to Metrical")},300)});
                                
                *///script para lo que sea 
                

        </script>

       

            <script>
                    //baguetteBox Gallery 
                      baguetteBox.run('.tz-gallery', {
                      noScrollbars: true
                    });
                    
                    // PhotoSwipe Gallery
                    var initPhotoSwipeFromDOM = function(gallerySelector) {
                    
                    
                      var parseThumbnailElements = function(el) {
                          var thumbElements = el.childNodes,
                              numNodes = thumbElements.length,
                              items = [],
                              figureEl,
                              linkEl,
                              size,
                              item;
                    
                          for(var i = 0; i < numNodes; i++) {
                    
                              figureEl = thumbElements[i];
                    
                              if(figureEl.nodeType !== 1) {
                                  continue;
                              }
                    
                              linkEl = figureEl.children[0]; 
                    
                              size = linkEl.getAttribute('data-size').split('x');
                    
                              item = {
                                  src: linkEl.getAttribute('href'),
                                  w: parseInt(size[0], 10),
                                  h: parseInt(size[1], 10)
                              };
                    
                    
                    
                              if(figureEl.children.length > 1) {
                                  item.title = figureEl.children[1].innerHTML; 
                              }
                    
                              if(linkEl.children.length > 0) {
                                  item.msrc = linkEl.children[0].getAttribute('src');
                              } 
                    
                              item.el = figureEl;
                              items.push(item);
                          }
                    
                          return items;
                      };
                    
                      var closest = function closest(el, fn) {
                          return el && ( fn(el) ? el : closest(el.parentNode, fn) );
                      };
                    
                      var onThumbnailsClick = function(e) {
                          e = e || window.event;
                          e.preventDefault ? e.preventDefault() : e.returnValue = false;
                    
                          var eTarget = e.target || e.srcElement;
                    
                          var clickedListItem = closest(eTarget, function(el) {
                              return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
                          });
                    
                          if(!clickedListItem) {
                              return;
                          }
                    
                          var clickedGallery = clickedListItem.parentNode,
                              childNodes = clickedListItem.parentNode.childNodes,
                              numChildNodes = childNodes.length,
                              nodeIndex = 0,
                              index;
                    
                          for (var i = 0; i < numChildNodes; i++) {
                              if(childNodes[i].nodeType !== 1) { 
                                  continue; 
                              }
                    
                              if(childNodes[i] === clickedListItem) {
                                  index = nodeIndex;
                                  break;
                              }
                              nodeIndex++;
                          }
                    
                    
                    
                          if(index >= 0) {
                              openPhotoSwipe( index, clickedGallery );
                          }
                          return false;
                      };
                    // photoswipeParseHash
                      var photoswipeParseHash = function() {
                          var hash = window.location.hash.substring(1),
                          params = {};
                    
                          if(hash.length < 5) {
                              return params;
                          }
                    
                          var vars = hash.split('&');
                          for (var i = 0; i < vars.length; i++) {
                              if(!vars[i]) {
                                  continue;
                              }
                              var pair = vars[i].split('=');  
                              if(pair.length < 2) {
                                  continue;
                              }           
                              params[pair[0]] = pair[1];
                          }
                    
                          if(params.gid) {
                              params.gid = parseInt(params.gid, 10);
                          }
                    
                          return params;
                      };
                    // openPhotoSwipe
                      var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
                          var pswpElement = document.querySelectorAll('.pswp')[0],
                              gallery,
                              options,
                              items;
                    
                          items = parseThumbnailElements(galleryElement);
                    
                          options = {
                    
                              galleryUID: galleryElement.getAttribute('data-pswp-uid'),
                    
                              getThumbBoundsFn: function(index) {
                                  var thumbnail = items[index].el.getElementsByTagName('img')[0],
                                      pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                                      rect = thumbnail.getBoundingClientRect(); 
                    
                                  return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
                              }
                    
                          };
                    
                          if(fromURL) {
                              if(options.galleryPIDs) {
                                  for(var j = 0; j < items.length; j++) {
                                      if(items[j].pid == index) {
                                          options.index = j;
                                          break;
                                      }
                                  }
                              } else {
                                  options.index = parseInt(index, 10) - 1;
                              }
                          } else {
                              options.index = parseInt(index, 10);
                          }
                    
                          if( isNaN(options.index) ) {
                              return;
                          }
                    
                          if(disableAnimation) {
                              options.showAnimationDuration = 0;
                          }
                    
                          gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
                          gallery.init();
                      };
                    
                      var galleryElements = document.querySelectorAll( gallerySelector );
                    
                      for(var i = 0, l = galleryElements.length; i < l; i++) {
                          galleryElements[i].setAttribute('data-pswp-uid', i+1);
                          galleryElements[i].onclick = onThumbnailsClick;
                      }
                    
                      var hashData = photoswipeParseHash();
                      if(hashData.pid && hashData.gid) {
                          openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
                      }
                    };
                    
                    initPhotoSwipeFromDOM('.pswipe-gallery');
            </script>





      


   </body>



</html>