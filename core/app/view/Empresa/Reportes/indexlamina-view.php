<?php
$userGeneral = UserData::getById($_SESSION["user_id"]);
 $userGeneral->id;
$clienteGeneral= ClienteData::getById($userGeneral->is_dueno);
 $clienteGeneral->id;
$empresaGeneral=EmpresaData::getByNit($clienteGeneral->nit_ced);
if($empresaGeneral==null){
    $empresaGeneral=EmpresaData::getByCC($clienteGeneral->nit_ced);
}
$empresaGeneral->id;


  ?>         

<!DOCTYPE html>
<html lang="zxx">
   

                                <!--================================-->
                               <?php
                                
                                 $procesos = ProcesoData::getAll(); 
                                  $count=0;
                                  foreach($procesos as $proceso):
                                    if($proceso->id_empresa==$empresaGeneral->id){

                                   

                                    
                                         $count++;
                                     }
                                  endforeach;
                              
                                
                                   
                               
                               ?>
                <div class="row row-xs clearfix">
                                <!-- semanal -->
                                        <div class="col-lg-12 col-xl-8 col-12">
                                                <div class="card mg-b-20">
                                                        <div class="card-header">
                                                            <h4 class="card-header-title">
                                                                Reporte General
                                                            </h4>
                                                            <div class="card-header-btn">
                                                                <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#annualReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                                                <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                                                                <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                                                <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                                                            </div>
                                                        </div>
                                                                <div class="collapse show" id="Reports">
                                                                        <div class="card-body pd-t-0 pd-b-20">
                                                                                    <div class="row clearfix">
                                                                                            <div class="col-lg-4 col-md-4 col-sm-12 mg-y-20">
                                                                                                <span class="tx-uppercase tx-10 mg-b-10">Numero de Reportes Totales </span>
                                                                                                <h3 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-normal tx-rubik tx-dark"># <span class="counter"><?php echo $count?></span><small class="tx-15"></small></h3>
                                                                                            
                                                                                            
                                                                                                <div class="tx-11 d-flex tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"><i class="ion-android-arrow-up mr-1"></i>+535%</span>Estadistica por Año</div>
                                                                                                <p class="mg-t-10 mg-b-0 tx-12 tx-gray-600">Numero total de reportes al año <a href="#">Ir</a></p>
                                                                                            </div>
                                                                                                <!--           
                                                                                                <div class="col-lg-4 col-md-4 col-sm-12 mg-y-20">
                                                                                                <span class="tx-uppercase tx-10 mg-b-10">Annual Revenue</span>
                                                                                                <h3 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-normal tx-rubik tx-dark">$<span class="counter">980,830</span><small class="tx-15">.50</small></h3>
                                                                                                <div class="tx-11 d-flex tx-gray-500"><span class="text-success mr-2 d-flex align-items-center"><i class="ion-android-arrow-up mr-1"></i>+230%</span>avg. sales per year</div>
                                                                                                <p class="mg-t-10 mg-b-0 tx-12 tx-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. <a href="#">Learn More</a></p>
                                                                                                </div>

                                                                                                <div class="col-lg-4 col-md-4 col-sm-12 mg-y-20">
                                                                                                <span class="tx-uppercase tx-10 mg-b-10">Total Profit</span>
                                                                                                <h3 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-normal tx-rubik tx-dark">$<span class="counter">730,360</span><small class="tx-15">.50</small></h3>
                                                                                                <div class="tx-11 d-flex tx-gray-500"><span class="text-danger mr-2 d-flex align-items-center"><i class="ion-android-arrow-down mr-1"></i>-135%</span>avg. sales per year</div>
                                                                                                <p class="mg-t-10 mg-b-0 tx-12 tx-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. <a href="#">Learn More</a></p>
                                                                                                </div>
                                                                                                -->
                                                                                    </div>
                                                                                                <div class="d-block clearfix">
                                                                                                    <canvas id="Report1"></canvas>
                                                                                                </div>
                                                                        </div>
                                                                </div>
                                                </div>
                                        </div>
                                <!-- semanal end -->
                                
 <!-- Sales+Order+Revenue  Start -->
                                    <!--================================-->
                                    <div class="col-lg-12 col-xl-4">
                                                            <div class="row">
                                                                    <div class="col-lg-6 col-xl-12">
                                                                        <div class="card mg-b-20">
                                                                            <div class="card-body">
                                                                                    <div id="sales_slider" class="carousel slide" data-ride="carousel" data-interval="4000">
                                                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                                                            <span class="tx-10 tx-uppercase tx-gray-500">
                                                                                            Sales
                                                                                            </span>
                                                                                            <div class="btn-group border-0">
                                                                                                <div class="sw-carousel-slider-control">
                                                                                                    <a class="tx-dark carousel-control-prev" href="#sales_slider" data-slide="prev">
                                                                                                    <i class="fa fa-angle-left"></i>
                                                                                                    </a>
                                                                                                    <a class="tx-dark carousel-control-next" href="#sales_slider" data-slide="next">
                                                                                                    <i class="fa fa-angle-right"></i>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="carousel-inner">
                                                                                            <div class="carousel-item active">
                                                                                                <div class="d-flex pd-b-20">
                                                                                                    <div class="mg-t-15">
                                                                                                    <h3 class="tx-uppercase tx-11 tx-spacing-1 tx-semibold mg-b-0 tx-dark">TOTAL</h3>
                                                                                                    <p class="tx-10 tx-normal mb-0 tx-gray-500">(<span class="text-success tx-10"><i class="ion-android-arrow-up mr-1"></i>###</span>) ###</p>
                                                                                                    </div>
                                                                                                    <div class="mg-l-auto tx-right">
                                                                                                    <span class="tx-10 tx-uppercase mg-b-0">###</span>
                                                                                                    <h5 class="tx-dark tx-16 mg-b-0 tx-normal tx-rubik">######</h5>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="clearfix">
                                                                                                    <div id="salesSpark1"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                           
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            
                                                                    <?php 
                                                                        $procesos = ProcesoData::getAll();

                                                                        for($i=0;$i<52;$i++){
                                                                            $semana[$i]=0;
                                                                        }

                                                                                foreach($procesos as $procesos):
                                                                                    if($procesos->id_empresa == $empresaGeneral->id){

                                                                                   
                                                                                    
                                                                                        $procesos->id."<br>";
                                                                                        $semanaPasada2=date("W",strtotime($procesos->start_date." ".$procesos->start_hour))."<br>";//numero de semana de la fecha a buscar
                                                                                        $bj=intval($semanaPasada2);
                                                                                        $semana[$bj-1]= $semana[$bj-1]+1; 
                                                                                          
                                                                                    }
                                                                                endforeach;
                                                                            
                                                                                for($i=0;$i<52;$i++){
                                                                                        $semana[$i]." ";
                                                                                }

                                                                                
                                                                    ?>

                                                                           


                               
                       
                             


                                        <!-- Sales+Order+Revenue  Start -->
                                           
                                                                <div class="col-lg-6 col-xl-12">
                                                                        <div class="card mg-b-20">
                                                                            <div class="card-body">
                                                                            
                                                                                    <div id="sales_slider" class="carousel slide" data-ride="carousel" data-interval="4000">
                                                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                                                            <span class="tx-10 tx-uppercase tx-gray-500">
                                                                                            Entrada semanal Año 2021
                                                                                            </span>
                                                                                            <div class="btn-group border-0">
                                                                                                <div class="sw-carousel-slider-control">
                                                                                                <!--    <a class="tx-dark carousel-control-prev" href="#sales_slider" data-slide="prev">
                                                                                                    <i class="fa fa-angle-left"></i>
                                                                                                    </a>
                                                                                                    <a class="tx-dark carousel-control-next" href="#sales_slider" data-slide="next">
                                                                                                    <i class="fa fa-angle-right"></i>
                                                                                                    </a>
                                                                                                    -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="carousel-inner">
                                                                                            <div class="carousel-item active">
                                                                                                <div class="d-flex pd-b-20">
                                                                                                    <div class="mg-t-15">
                                                                                                    <h3 class="tx-uppercase tx-11 tx-spacing-1 tx-semibold mg-b-0 tx-dark">Vista de entradas por semana</h3>
                                                                                                    <p class="tx-10 tx-normal mb-0 tx-gray-500">(<span class="text-success tx-10"><i class="ion-android-arrow-up mr-1"></i>###</span>) ###</p>
                                                                                                    </div>
                                                                                                    <div class="mg-l-auto tx-right">
                                                                                                    <span class="tx-10 tx-uppercase mg-b-0">###</span>
                                                                                                    <h5 class="tx-dark tx-16 mg-b-0 tx-normal tx-rubik">######</h5>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="clearfix">
                                                                                                    <div id="salesSpark11"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                         
                                        <!-- / Sales+Order+Revenue  End -->
                            
                     
                             

                  


                                        <input type="hidden" name="contadorSemanalanual" id="contadorSemanalanual" value="<?php echo json_encode($semana); ?>">











                                                    
                                    <!-- / Sales+Order+Revenue  End -->
                   
                    
                            
                     
                             

                                            <!-- Sales/Revenue Details Start -->
                                        
                                            <div class="col-lg-6 col-xl-12">
                                                        <div class="card mg-b-20">
                                                            <div class="card-header">
                                                                <h4 class="card-header-title">
                                                                    Datos Mensuales
                                                                </h4>
                                                                <div class="card-header-btn">
                                                                    <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#salesRevenuDetails" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                                                    <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                                                                    <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                                                    <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="card-body pd-0 collapse show" id="salesRevenuDetails">
                                                                <div id="salesRevenueBarChart"></div>
                                                            </div>
                                                        </div>
                                            </div>
                                            <!-- Sales/Revenue Details End -->	

                                   

                                        


                                        

                                            
                </div>



                           
                  
            
                <?php 
                        function saber_dia($nombredia) {
                            $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
                            $fecha = $dias[date('N', strtotime($nombredia))];
                            return $fecha;
                        }

                        function saber_mes($nombredia) {
                            $dias = array('','ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic');
                            $fecha = $dias[date('n', strtotime($nombredia))];
                            return $fecha;
                        }
                        ///declaracion de vectores
                        
                        
                            for($i=0;$i<7;$i++){
                                $contadorGeneral[$i]=0;
                                $ContadorGeneralDiarioCodiesel[$i]=0;
                                $ContadorGeneralDiarioCemex[$i]=0;
                            }  
                    
                            for($i=0;$i<12;$i++){
                                $contadorMensual[$i]=0;
                            }  
                                
                        ///fin declaracion            

                    $events=ProcesoData::getAll();
                    
                    foreach($events as $event){
                        $MANUAL=$event->start_date." ".$event->start_hour;

                                    // $fecha=saber_dia($event->created_at);
                                    $fecha=saber_dia($MANUAL);
                                    if($fecha=="Domingo"){
                                        $contadorGeneral[0]= $contadorGeneral[0]+1;

                                    
                                    }
                                            
                                            if($fecha=="Lunes"){
                                                $contadorGeneral[1]= $contadorGeneral[1]+1;

                                              

                                            }
                                            
                                            if($fecha=="Martes"){
                                                $contadorGeneral[2]= $contadorGeneral[2]+1;

                                                
                                            }
                                            
                                            if($fecha=="Miercoles"){
                                                $contadorGeneral[3]= $contadorGeneral[3]+1;

                                                
                                            
                                            }

                                            if($fecha=="Jueves"){
                                                $contadorGeneral[4]= $contadorGeneral[4]+1;

                                             

                                            }
                                            
                                            if($fecha=="Viernes"){
                                                $contadorGeneral[5]= $contadorGeneral[5]+1;
                        
                                              


                                            }

                                        
                                            if($fecha=="Sabado"){
                                                $contadorGeneral[6]= $contadorGeneral[6]+1;


                                            }

                   
                    }
                        // ejecutamos la función pasándole la fecha que queremos
                      

                                    foreach($events as $event){
                                        if($event->id_empresa==$empresaGeneral->id){

                                        
                                                    $MANUAL=$event->start_date." ".$event->start_hour;
                                                    $fecha=saber_mes($MANUAL);
                                                    
                                                  

                                                if($fecha=="ene"){
                                                    $contadorMensual[0]++;
                                                }
                                            
                                                if($fecha=="feb"){
                                                    $contadorMensual[1]++;
                                                }

                                                if($fecha=="mar"){
                                                    $contadorMensual[2]++;
                                                }

                                                if($fecha=="abr"){
                                                    $contadorMensual[3]++;
                                                }

                                                if($fecha=="may"){
                                                    $contadorMensual[4]++;
                                                }

                                                if($fecha=="jun"){
                                                    $contadorMensual[5]++;
                                                }

                                                if($fecha=="jul"){
                                                    $contadorMensual[6]++;
                                                }

                                                if($fecha=="ago"){
                                                    $contadorMensual[7]++;
                                                }

                                                if($fecha=="sep"){
                                                    $contadorMensual[8]++;
                                                }

                                                if($fecha=="oct"){
                                                    $contadorMensual[9]++;
                                                }

                                                if($fecha=="nov"){
                                                    $contadorMensual[10]++;
                                                }

                                                if($fecha=="dic"){
                                                    $contadorMensual[11]++;
                                                }

                                            }
                                    }

                                      //3 contador
                                            $contador2= ProcesoData::contador();
                                            $aux=0;
                                    
                                            foreach($contador2 as $contador2){
                                                if($event->id_empresa==$empresaGeneral->id){

                                                $ContadorDiario[$aux]=intval($contador2->counted_leads);
                                               
                                                $aux++;
                                                }
                                            }

                                           
                                    //contador diario fin
                                    

                ?>


                    <input type="hidden" name="contadorGeneralEmpresa" id="contadorGeneralEmpresa" value="<?php echo json_encode($contadorGeneral); ?>">

                    <input type="hidden" name="ContadorGeneralDiarioCodieselEmpresa" id="ContadorGeneralDiarioCodieselEmpresa" value="<?php echo json_encode($ContadorGeneralDiarioCodiesel); ?>">

                    <input type="hidden" name="ContadorGeneralDiarioCemexEmpresa" id="ContadorGeneralDiarioCemexEmpresa" value="<?php echo json_encode($ContadorGeneralDiarioCemex); ?>">

                    <input type="hidden" name="contadorMensualEmpresa" id="contadorMensualEmpresa" value="<?php echo json_encode($contadorMensual); ?>">

                    <input type="hidden" name="contadorDiarioEmpresa" id="contadorDiarioEmpresa" value="<?php echo json_encode($ContadorDiario); ?>">



</html>

