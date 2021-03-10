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


                        
             <div id="main-wrapper">



               
<!-- Scrollable Table Start -->
<!--================================-->
<div class="col-md-12 col-lg-12">
    <div class="card mg-b-12">
        <div class="card-header">
                    <h4 class="card-header-title">
                    Procesos  
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
     
        <div class="table-responsive">

        
           <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                                <thead class="tx-dark tx-uppercase tx-10 tx-bold">
                                   <tr>
                                      <th>#</th>
                                      <th>Estado</th>
                                         <th>Placa</th>
                                        <th>Trailer </th> 
                                         <th>Kilometraje</th>
                                         <th>Tipo Proceso</th>
                                      
                                         <th>Empresa</th>
                                         <th>hora de inicio</th>
                                         <th>fecha de inicio</th>
                                         <th>Acciones</th>
                                   </tr>
                       
                                </thead>
              <tbody>
                                            <?php 
                                         $Procesos = ProcesoData::getAll(); 
                                         ?>
                                         
                                         <?php   
                                         if(count($Procesos)>0){
                                            

                                               
                                            ?>

                                            <?php  $i=0; foreach($Procesos as $Procesos):

                                             if($Procesos->id_empresa==$empresaGeneral->id){
                                             

                                         
                                               if($Procesos->estado != "FINALIZADO"){
                                                  $i++;
                                               ?> 


                                               <?php
                                                  $usuario= UserData::getById($Procesos->id_user);
                                                  $placa= EquipoData::getById($Procesos->id_equipo);
                                                  $conductor= ConductorData::getByIdCC($Procesos->id_conductor);
                                                  $empresa= EmpresaData::getById($Procesos->id_empresa);
                                                  $tempario= TemparioData::getById($Procesos->tipo_trabajo);
                                                  
                                                  $placaT= EquipoData::getById($Procesos->id_trailer);
                                                 
                                               ?>

                                            <tr >

                                                  <td ><?php echo $Procesos->id;?></td>
                                                  <td><?php if($Procesos->estado=="CONFIRMADO"){?> <span class="badge badge-outlined badge-warning"><?php echo $Procesos->estado;?> </span> <?php }?>
                                                      <?php if($Procesos->estado=="Activo"){?> <span class="badge badge-outlined badge-danger"><?php echo $Procesos->estado;?> </span> <?php }?>
                                                  </td>
                                                  <td><?php echo $placa->placa; ?></td>
                                                  <td><?php  if($placaT!=null){echo $placaT->placa;}else{echo "";}?></td>
                                                  <td><?php echo $Procesos->kilometraje; ?></td>
                                                  
                                                  <td><?php echo $tempario->descripcion; ?></td>
                                                  
                                                  <td><?php echo $empresa->nombre; ?></td>
                                                  <td><?php echo $Procesos->start_hour; ?></td>
                                                  <td><?php echo $Procesos->start_date; ?></td>
                                            
                                            
                                               
                                                  <?php    if($Procesos->estado=="Activo"){ ?>
                                                        <td class="text-Center table-actions">
                                                            <div class="btn-group mg-t-10">  

                                                                  
                                                                    

                                                   

                                                                <span class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"></span>
                                                                
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                        
                                                  
                                      

                                                                                    <form action="index.php?view=Empresa/Proceso/Like_Proceso" method="post">
                                                                                    <input type="hidden" name="id2" value=<?php echo $Procesos->id;?>>
                                                                                    <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                                                    <button class="dropdown-item" type="submit"><i class="fa fa-eye"></i> Ver Proceso</button>  
                                                                                    </form>
                                                                                    
                                                                                    <form action="index.php?action=ConfirmarProceso" method="post">
                                                                                    <input type="hidden" name="id" value=<?php echo $Procesos->id;?>>
                                                                                    <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                                                    <button class="dropdown-item" type="submit"><i class="fa fa-check"></i> Autorizar Proceso</button>  
                                                                                    </form> 
                                                                                
                                                                        </div>
                                                                        
                    
                                                                </div>
                                                            
                                                        </td>
                                                    <?php }?>   
                                                    
                                                    <?php if($Procesos->estado=="CONFIRMADO"){ ?>
                                                          
                                                            <td class="text-Center table-actions">
                                                                        <div class="btn-group mg-t-10">  

                                                                         


                                                                                                <span class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"></span>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                            
                                                                                

                                                                                   
                                                                                    <form action="index.php?view=Empresa/Proceso/Like_Proceso" method="post">
                                                                                                                <input type="hidden" name="id2" value=<?php echo $Procesos->id;?>>   
                                                                                                                <button class="dropdown-item" ><i class="fa fa-eye"></i> Ver Proceso</button>  
                                                                                    </form>
                                                                                    
                                                                                 
                                                                                   
                                                                                    
                                                                                    <!--   <a class="dropdown-item" href="index.php?view=Add_Cotizacion&id="><i class="fa fa-dollar"></i> Añadir Cotizacion</a>  -->
                                                                            
                                                                            </div>
                                                                        </div>
                                                            </td>
                                                    <?php }?> 
                                                
                                                    
                                                        
                                            </tr> 



                                                  <?php }
                                                                                               
                                             }
                                                  endforeach;
                                                  ?>
                                                  <?php }?>

                     
                    </tbody>
              
                          <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Estado</th>
                                    <th>Placa</th>
                                    <th>Trailer </th> 
                                    <th>Kilometraje</th>
                                    <th>Tipo Proceso</th>
                                
                                    <th>Empresa</th>
                                    <th>hora de inicio</th>
                                    <th>fecha de inicio</th>
                                    <th>Acciones</th>
                                </tr>
                 
                       </tfoot>
             </table>

             <?php 
//  echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";
?>

        </div>
     </div>
  </div>
    </div>
 


</div>


