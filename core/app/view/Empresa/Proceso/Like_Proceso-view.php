<!DOCTYPE html>
<html lang="zxx">
   
<div id="main-wrapper">
  
         <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-20">
                                    <div class="card-header">
                                        <h4 class="card-header-title">
                                            Añadir Proceso
                                        </h4>
                                        <div class="card-header-btn">
                                            <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse4" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                                            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                            <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                                        </div>
                                      </div>

                          

                           
                                 <div class="card-body collapse show" id="collapse4">
                                 <?php 
                                        $proceso = ProcesoData::getById($_POST["id2"]); 
                                         ?>


                                    <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=EditProceso" role="form">
                                   
                                    <input type="hidden" name="id" id="id" value="<?php echo $proceso->id;?>" readonly="true"  required />

                                    <div class="row">
                                  
    
                                  
                                  <!--   ---------------------------                         ----------------------     -->  
                                    <?php 
                                        $clientes = TemparioData::getAll(); 
                                        $tempario=TemparioData::getById($proceso->tipo_trabajo);
                                        ?>

                                       
                                                        <div class="col-md-6 mb-3">
                                                                        <p>Tipo de Trabajo</p>
                                                    
                                                                        <select disabled="" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="tipo" id="tipo" id="inputGroupSelect01">
                                                                        <option selected value="<?php echo $tempario->id; ?>" ><?php echo $tempario->descripcion; ?></option>
                                                                                                    
                                                                                <?php   
                                                                                        if(count($clientes)>0){  
                                                                                    ?>
                                                                                    
                                                                         

                                                                            <?php foreach($clientes as $cliente):?> 

                                                                <option value="<?php echo $cliente->id; ?>" ><?php echo $cliente->descripcion; ?></option>
                                                                    
                                                                                <?php endforeach;?>

                                                                                  <?php }?>
                                                                            
                                                                                </select>
                                                             </div>
                                                        

                                        <!--   ---------------------------                         ----------------------     -->

                                        <!--   ---------------------------                         ----------------------     -->  
                                    <?php 
                                        $clientes = EquipoData::getAll(); 
                                        $placa= EquipoData::getById($proceso->id_equipo);
                                        ?>

                                                        <div class="col-md-6 mb-3">
                                                            <p>Placa</p>
                                        
                                                            <select disabled="" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="placa" id="placa" id="inputGroupSelect01">
                                                            <option selected value="<?php echo $placa->id; ?>" ><?php echo $placa->placa; ?></option>
                                                                                        
                                                                    <?php   
                                                                            if(count($clientes)>0){  
                                                                        ?>
                                                                        
                                                              

                                                                <?php foreach($clientes as $cliente):?> 

                                                                    <option  value="<?php echo $cliente->id; ?>" ><?php echo $cliente->placa; ?></option>
                                                        
                                                                    <?php endforeach;?>
                                                        <?php }?>
                                                                
                                                                    </select>
                                                        </div>

                                        <!--   ---------------------------                         ----------------------     -->

                        <!--   ---------------------------                         ----------------------     -->  
                                 <?php 
                                        $clientes = EquipoData::getAll(); 
                                        if($proceso->id_trailer!=null ||$proceso->id_trailer!=0 ){
                                            $trailer= EquipoData::getById($proceso->id_trailer);
                                        }else{
                                            $trailer=null;
                                        }
                                        
                                     
                                        ?>

                                                        <div class="col-md-6 mb-3">
                                                            <p>TRAILER </p>
                                        
                                                            <select disabled="" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="trailer" id="trailer" id="inputGroupSelect01">
                                                            <option selected value="<?php if($trailer!=null){echo $trailer->id;} ?>" ><?php if($trailer!=null){ echo $trailer->placa;} ?></option>
                                                                                        
                                                                    <?php   
                                                                            if(count($clientes)>0){  
                                                                        ?>
                                                                        
                                                              

                                                                <?php foreach($clientes as $cliente):?> 

                                                                    <option  value="<?php echo $cliente->id; ?>" ><?php echo $cliente->placa; ?></option>
                                                        
                                                                    <?php endforeach;?>
                                                        <?php }?>
                                                                
                                                                    </select>
                                                        </div>

                                        <!--   ---------------------------                         ----------------------     -->


                                         <!--   ---------------------------                         ----------------------     -->  
                                        <div class="col-md-6 mb-3">
                                            <p>kilometraje </p>
                                            <div class="input-group mb-6">
                                                <input disabled="" type="text" class="form-control" value="<?php echo $proceso->kilometraje;?>"name="kilometraje" id="kilometraje" aria-label="Amount (to the nearest dollar)">
                                            <div class="input-group-append">
                                                <span class="input-group-text">#</span>
                                            </div>

                                            </div>
                                            
                                        </div>
                                        <!--   ---------------------------                         ----------------------     -->  

                                        <!--   ---------------------------                         ----------------------     -->  
                                    <?php 
                                        $clientes = ConductorData::getAll(); 
                                        $conductor= ConductorData::getByIdCC($proceso->id_conductor);
                                        ?>

                                                        <div class="col-md-6 mb-3">
                                                            <p>Conductor</p>
                                        
                                                            <select disabled="" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="conductor" id="conductor" id="inputGroupSelect01">
                                                            <option selected value=<?php echo $conductor->cc; ?>><?php echo $conductor->nombre; ?></option>
                                                                                        
                                                                    <?php   
                                                                            if(count($clientes)>0){  
                                                                        ?>
                                                                        
                                                           

                                                                <?php foreach($clientes as $cliente):?> 

                                                                    <option value=<?php echo $cliente->cc; ?>><?php echo $cliente->nombre; ?></option>
                                                        
                                                                    <?php endforeach;?>
                                                        <?php }?>
                                                                
                                                                    </select>
                                                        </div>

                                        <!--   ---------------------------                         ----------------------     -->

                                         <!--   ---------------------------                         ----------------------     -->  
                                    <?php 
                                        $clientes = EmpresaData::getAll(); 
                                        $empresa=EmpresaData::getById($proceso->id_empresa);
                                        ?>

                                                        <div class="col-md-6 mb-3">
                                                            <p>Empresa</p>
                                        
                                                            <select disabled="" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" name="empresa" id="empresa"  id="inputGroupSelect01">
                                                            <option selected value="<?php echo $empresa->id; ?>"><?php echo $empresa->nombre; ?></option>
                                                                                        
                                                                    <?php   
                                                                            if(count($clientes)>0){  
                                                                        ?>
                                                                        
                                                                

                                                                <?php foreach($clientes as $cliente):?> 

                                                                    <option value="<?php echo $cliente->id; ?>"><?php echo $cliente->nombre; ?></option>
                                                                    
                                                                    <?php endforeach;?>
                                                        <?php }?>
                                                                
                                                       
                                                                    </select>
                                                        </div>

                                        <!--   ---------------------------                         ----------------------     -->
                                        <!--   ---------------------------                         ----------------------     -->  
                                   

                                                        <div class="col-md-6 mb-3">
                                                            <p>Tipo de pago</p>
                                        
                                                            <select disabled="" class="custom-select"  name="tipo_pago" id="tipo_pago" id="inputGroupSelect01">
                                                            <option selected> </option>
                                                             
                                                                <option selected>Credito</option>

                                                                    <option >Contado</option>
                                                        
                                                              
                                                                
                                                                    </select>
                                                        </div>

                                        <!--   ---------------------------                         ----------------------     -->

                                         <!--   ---------------------------                         ----------------------     -->  
                                   

                                         <div class="col-md-6 mb-3">
                                                            <p>Garantia</p>
                                        
                                                            <select disabled="" class="custom-select"  name="garantia" id="garantia" id="inputGroupSelect01">
                                                            
                                                            <option selected>Si</option>
                                                                <option >No</option>

                                                                   
                                                        
                                                              
                                                                
                                                                    </select>
                                                        </div>

                                        <!--   ---------------------------                         ----------------------     -->
                                        

                                        <div class="col-md-6 mb-3">
                                            <label  class="col-lg-2 control-label">Fecha</label>
                                            <div class="col-md-6 mb-3">
                                            <input disabled="" type="date" name="date_at" value="<?php echo $proceso->start_date;?>" class="form-control" id="date_at" placeholder="Fecha">
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label  class="col-lg-2 control-label">Hora</label>
                                            <div class="col-md-6 mb-3">
                                            <input disabled="" type="time" name="time_at" value="<?php echo $proceso->start_hour;?>" class="form-control" id="time_at" placeholder="Hora">
                                            </div>
                                            
                                        </div>
                                        
                                            <?php 
                                            
                                            $img=ImageData::getImg($_POST['id2']); 
                                        
                                          for($i=0;$i<count($img);$i++){
                                       
                                            ?>
                                        
                                        <div class="col-md-6 col-xl-3">
                                           
                                                <div class="main">
                                            
                                                        <div class="panel panel-primary">
                                                                <div class="panel-body">
                                                                
                                                                <img src='index.php?action=Likeimg&id=<?php echo $_POST['id2']; ?>&id2=<?php echo$i; ?>' alt='NO IMAGE' width="400" />      
                                                                </div> 
                                                            </div>
                                                </div>

                                        </div>

                                        <?php 
                                            
                                          }
                                            ?>
                                      
                            
                          
                             </div>
                                    </form> 

                         </div>
                 </div>
                                

</div>
</html>

 <div id="main-wrapper">



               
 
                   
                            <!-- Scrollable Table Start -->
                            <!--================================-->
                           <div class="col-md-12 col-lg-12">
                                <div class="card mg-b-12">
                                <div class="card-header">
                                    <h4 class="card-header-title">
                                    Diagnosticos
                                    </h4>
                                    <div class="card-header-btn">
                                        <!--<a href="#" data-toggle="añadir" class="btn card-add"><i class="ion-android-add"></i></a>-->
                                        <form action="index.php?view=Add_DiagnosticoId" method="post">
                                                <input type="hidden" name="id" value=<?php echo $_POST["id2"];?>>
                                                    <button class="btn btn-secondary" ><i class="fa fa-plus"></i> </button>  
                                        </form>
                                       <!--  <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>-->
                                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                                    </div>
                                </div>
                                 <div class="card-body pd-0 collapse show" id="productSalesDetails">
                                    <div>
                                       <div class="table-responsive">

                                          <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0" width="100%">
                                             <thead class="tx-dark tx-uppercase tx-10 tx-bold">
                                                <tr>
                                                   <th>#</th>
                                                      <th>Id proceso</th>
                                                      <th>placa</th>
                                                      <th>Tipo Diagnostico</th>
                                                      <th>Tiempo estimado </th>
                                                      <th>estado</th>
                                                      <th>novedades</th>
                                                      <th>Fecha</th>
      
                                                      <th>Acciones</th>
                                                   
                                                </tr>
                                    
                                             </thead>
                                             <tbody>
                                             
                                                <?php 
                                                   $clientes = DiagnosticoData::getAll(); 
                                                   ?>
                                                   
                                                   <?php   
                                                   if(count($clientes)>0){  
                                                      ?>

                                                      <?php foreach($clientes as $cliente):
                                                         $tempario= TemparioData::getById($cliente->tipo_diagnostico);
                                                         $equipo=EquipoData::getById($cliente->placa);
                                                         $proceso=ProcesoData::getById($cliente->id_proceso);
                                                         $empresa=EmpresaData::getById($proceso->id_empresa);

                                                         if($cliente->id_proceso==$_POST["id2"]){


                                                         
                                                         ?> 


                                                <tr>
                                                   <td><?php echo $cliente->id; ?></td>
                                                   <td><?php echo  $cliente->id_proceso." - ". $empresa->nombre;?></td>
                                                   <td><?php echo $equipo->placa; ?></td>
                                                   <td><?php echo $tempario->descripcion ?></td>
                                                   <td><?php echo $cliente->tiempo_estimado; ?></td>
                                                   <td><?php echo $cliente->estado; ?></td>
                                                   <td><?php echo $cliente->novedades; ?></td>
                                                   <td><?php echo $cliente->start_date." / ".$cliente->start_hour; ?></td>
                                             
                                                
                                                   
                                                   <td class="text-Center table-actions">
                                                         <div class="btn-group mg-t-10">  

                                                                               

                                                          
                                                                                    
                                                      
                                                                 
                                                         </div>
                                                   </td>
                                                
                                       
                                                
                                                   
                                                   </tr> 
                                                   <?php   }
                                             
                                                   endforeach;?>
                                                   <?php }?>
                                                   
                                             </tbody>
                                          
                                             <tfoot>
                                                   <tr>
                                                      <th>#</th>
                                                      <th>Id proceso</th>
                                                      <th>placa</th>
                                                      <th>Tipo Diagnostico</th>
                                                      <th>Tiempo estimado </th>
                                                      <th>estado</th>
                                                      <th>novedades</th>
      
                                                      <th>Acciones</th>
                                                   
                                                   </tr>   
                                                   </tr>
                                             </tfoot>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                           </div>





                           
            </div>