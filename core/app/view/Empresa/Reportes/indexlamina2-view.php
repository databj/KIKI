
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
                                                                                                    <canvas id="Report2"></canvas>
                                                                                                </div>
                                                                        </div>
                                                                </div>
                                                </div>
                                        </div>
                                <!-- semanal end -->


                                    
                             

                </div>

                           
                  
            
        <?php 
                                        
                        date_default_timezone_set("America/Bogota");

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



                        function saber_Semana_Pasada($fechaBuscar) {
                            $fechaActual=date("y-m-d");
    
                            $semanaActual=date("W",strtotime($fechaActual));// numero de semana actual
    
                            $fechaPasada=date("y-m-d H:i:s", strtotime($fechaActual."- 7 days")) ;  //fecha semana actual conrespecto al dia actual
    
                            $semanaPasada=date("W",strtotime($fechaPasada));// numero en semana 
    
                            $saberSemana= date("y-m-d H:i:s", strtotime($fechaBuscar)) ;//fecha de la semana a buscar
    
                            $semanaPasada2=date("W",strtotime($saberSemana));//numero de semana de la fecha a buscar
                            
                            if($semanaPasada2==$semanaPasada){
    
                                return"semana pasada";

                            }else{
                                
                                if($semanaPasada2==$semanaActual){
                                    return "semana actual";
                                }
                            }
    
                        }

            ///declaracion de vectores
            
               
                for($i=0;$i<7;$i++){
                    $ContadorTotal[$i]=0;
                    $ContadorSemanaActual[$i]=0;
                    $ContadorSemanaPasada[$i]=0;
                }  
      
              for($i=0;$i<12;$i++){
                $contador[$i]=0;
              }  
                
            ///fin declaracion            

                    $events=ProcesoData::getAll();
                    
                     foreach($events as $event){
                        $MANUAL=$event->start_date." ".$event->start_hour;
                            if($event->id_empresa==$empresaGeneral->id){

                           

                        
                                    // $fecha=saber_dia($event->created_at);
                                    $fecha=saber_dia($MANUAL);

                                    
                                    if($fecha=="Domingo"){
                                        $ContadorTotal[0]= $ContadorTotal[0]+1;

                                        if(saber_Semana_Pasada($MANUAL)=="semana actual"){
                                            $ContadorSemanaActual[0]=$ContadorSemanaActual[0]+1;
                                        }

                                        if(saber_Semana_Pasada($MANUAL)=="semana pasada"){
                                            $ContadorSemanaPasada[0]=$ContadorSemanaPasada[0]+1;
                                        }

                                    }
                                            
                                            if($fecha=="Lunes"){
                                                $ContadorTotal[1]= $ContadorTotal[1]+1;

                                                if(saber_Semana_Pasada($MANUAL)=="semana actual"){
                                                    $ContadorSemanaActual[1]=$ContadorSemanaActual[1]+1;
                                                }
                                                if(saber_Semana_Pasada($MANUAL)=="semana pasada"){
                                                    $ContadorSemanaPasada[1]=$ContadorSemanaPasada[1]+1;
                                                }

                                            }
                                            
                                            if($fecha=="Martes"){
                                                $ContadorTotal[2]= $ContadorTotal[2]+1;

                                                if(saber_Semana_Pasada($MANUAL)=="semana actual"){
                                                    $ContadorSemanaActual[2]=$ContadorSemanaActual[2]+1;
                                                }
                                                if(saber_Semana_Pasada($MANUAL)=="semana pasada"){
                                                    $ContadorSemanaPasada[2]=$ContadorSemanaPasada[2]+1;
                                                }


                                            }
                                            
                                            if($fecha=="Miercoles"){
                                                $ContadorTotal[3]= $ContadorTotal[3]+1;

                                                
                                                if(saber_Semana_Pasada($MANUAL)=="semana actual"){
                                                    $ContadorSemanaActual[3]=$ContadorSemanaActual[3]+1;
                                                }
                                                if(saber_Semana_Pasada($MANUAL)=="semana pasada"){
                                                    $ContadorSemanaPasada[3]=$ContadorSemanaPasada[3]+1;
                                                }


                                            }
                                            if($fecha=="Jueves"){
                                                $ContadorTotal[4]= $ContadorTotal[4]+1;

                                                if(saber_Semana_Pasada($MANUAL)=="semana actual"){
                                                    $ContadorSemanaActual[4]=$ContadorSemanaActual[4]+1;
                                                }
                                                if(saber_Semana_Pasada($MANUAL)=="semana pasada"){
                                                    $ContadorSemanaPasada[4]=$ContadorSemanaPasada[4]+1;
                                                }

                                            }
                                            
                                            if($fecha=="Viernes"){
                                                $ContadorTotal[5]= $ContadorTotal[5]+1;
                        
                                                if(saber_Semana_Pasada($MANUAL)=="semana actual"){
                                                    $ContadorSemanaActual[5]=$ContadorSemanaActual[5]+1;
                                                }
                                                if(saber_Semana_Pasada($MANUAL)=="semana pasada"){
                                                    $ContadorSemanaPasada[5]=$ContadorSemanaPasada[5]+1;
                                                }


                                            }

                                        
                                            if($fecha=="Sabado"){
                                                $ContadorTotal[6]= $ContadorTotal[6]+1;

                                                if(saber_Semana_Pasada($MANUAL)=="semana actual"){
                                                    $ContadorSemanaActual[6]=$ContadorSemanaActual[6]+1;
                                                }
                                                if(saber_Semana_Pasada($MANUAL)=="semana pasada"){
                                                    $ContadorSemanaPasada[6]=$ContadorSemanaPasada[6]+1;
                                                }

                                            }
                             }

                   
                     }
                        // ejecutamos la función pasándole la fecha que queremos
                      

                                    

                                    

        ?>


                        <input type="hidden" name="ContadorTotalEmpresa" id="ContadorTotalEmpresa" value="<?php echo json_encode($ContadorTotal); ?>">

                        <input type="hidden" name="ContadorSemanaActualEmpresa" id="ContadorSemanaActualEmpresa" value="<?php echo json_encode($ContadorSemanaActual); ?>">

                        <input type="hidden" name="ContadorSemanaPasadaEmpresa" id="ContadorSemanaPasadaEmpresa" value="<?php echo json_encode($ContadorSemanaPasada); ?>">

                   


</html>