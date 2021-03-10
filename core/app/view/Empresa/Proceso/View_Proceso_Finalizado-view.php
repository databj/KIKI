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
   

                        
             <div id="main-wrapper">



                
                            <!-- Scrollable Table Start -->
                            <!--================================-->
                            <div class="col-md-12 col-lg-12">
                                <div class="card mg-b-12">
                                <div class="card-header">
                                    <h4 class="card-header-title">
                                    Procesos Finalizados 
                                    </h4>
                                    <div class="card-header-btn">
                                        <a href="index.php?view=Add_Proceso" data-toggle="añadir" class="btn card-add"><i class="ion-android-add"></i></a>
                                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                                    </div>
                                </div>
                                <div class="card-body pd-0 collapse show" id="productSalesDetails">
                                 <div>
                                    <div class="table-responsive">

                                    
  <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                                          <thead class="tx-dark tx-uppercase tx-10 tx-bold" >
                                             <tr>
                                                <th>#</th>
                                                 
                                                   <th>Placa</th>
                                                   <th>Trailer</th>
                                                   <th>Kilometraje</th>
                                                   <th>Tipo Proceso</th>
                                                   <th>Conductor</th>
                                                   <th>Empresa</th>
                                                   <th>hora de inicio</th>
                                                   <th>fecha de inicio</th>
                                                   <th>Acciones</th>
                                               </tr>
                                   
                                          </thead>
                                          <tbody
                                          >
                                          <?php 
                                        $clientes = ProcesoData::getAll(); 
                                         ?>
                                         
                                         <?php   
                                        if(count($clientes)>0){
                                          

                                             
                                            ?>

                                          <?php $i=0;  foreach($clientes as $cliente):
                                            if($cliente->estado=="FINALIZADO"){
                                               if($cliente->id_empresa==$empresaGeneral->id){

                                              

                                            
                                            $i++;
                                             ?> 


                                             <?php
                                                $usuario= UserData::getById($cliente->id_user);
                                                $placa= EquipoData::getById($cliente->id_equipo);
                                                $conductor= ConductorData::getByIdCC($cliente->id_conductor);
                                                $empresa= EmpresaData::getById($cliente->id_empresa);
                                                $tempario= TemparioData::getById($cliente->tipo_trabajo);
                                                $placaT= EquipoData::getById($cliente->id_trailer);
                                             ?>

                                             <tr>

                                                <td><?php echo $cliente->id; ?></td>
                                               
                                                <td><?php echo $placa->placa; ?></td>
                                                <td><?php  if($placaT!=null){echo $placaT->placa;}else{echo "";}?></td>
                                                <td><?php echo $cliente->kilometraje; ?></td>
                                                
                                                <td><?php echo $tempario->descripcion; ?></td>
                                                <td><?php echo $conductor->nombre; ?></td>
                                                <td><?php echo $empresa->nombre; ?></td>
                                                <td><?php echo $cliente->start_hour; ?></td>
                                                <td><?php echo $cliente->start_date; ?></td>
                                            
                                          
                                               
                                                
                                                <td class="text-Center table-actions">
                                                      <div class="btn-group mg-t-10">  

                                                                              <form action="index.php?view=Edit_Proceso" method="post">
                                                                              <input type="hidden" name="id" value=<?php echo $cliente->id;?>>
                                                                              <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                                                 <button class="btn btn-secondary" ><i class="fa fa-pencil"></i></button>
                                                                              </form>
                                                                             

                                                                              <form action="index.php?action=DelProceso" method="post">   
                                                                              <input type="hidden" name="id" value=<?php echo $cliente->id;?>>
                                                                              <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                                                 <button class="btn btn-secondary" onclick="return pregunta()" ><i class="fa fa-trash"></i></button>
                                                                              </form>


                                                                                 <span class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"></span>
                                                   
                                                   
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                 
                                                                 
                                                                 <form action="index.php?view=Empresa/Proceso/Like_Proceso" method="post">
                                                                                                <input type="hidden" name="id2" value=<?php echo $cliente->id;?>>
                                                                                                <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                                                                <button class="dropdown-item" ><i class="fa fa-cogs"></i> Ver Proceso</button>  
                                                                   </form>

                                                                 
                                                              
                                                                </div>
                                                       </div>

                                                </td>
                                               
                                    
                                               
                                                
                                                </tr> 



                                                <?php 
                                             }
                                            
                                             }
                                                endforeach;
                                                ?>
                                                 <?php }?>

                                                 
                                          </tbody>
                                          
                                          <tfoot>
                                          <tr>
                                          <th>#</th>
                                                 
                                                   <th>Placa</th>
                                                   <th>Trailer</th>
                                                   <th>Kilometraje</th>
                                                   <th>Tipo Proceso</th>
                                                   <th>Conductor</th>
                                                   <th>Empresa</th>
                                                   <th>hora de inicio</th>
                                                   <th>fecha de inicio</th>
                                                   <th>Acciones</th>
                                               </tr>
                                   
                                         </tfoot>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                                </div>





                            </div>
                            <!--/ Scrollable Table End -->	

                            

               </div>


 
</html>