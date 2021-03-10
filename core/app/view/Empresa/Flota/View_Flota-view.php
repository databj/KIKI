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
                                       Flotas
                                    </h4>
                                    <div class="card-header-btn">
                                    <form action="index.php?view=Empresa/Flota/Add_Flota" method="post">
                                                <input type="hidden" name="id" value=<?php echo $empresaGeneral->id;?>>
                                                    <button class="btn btn-secondary" ><i class="fa fa-plus"></i> </button>  
                                        </form>



                                    <!--    <a href="index.php?view=Empresa/Flota/Add_Flota" data-toggle="añadir" class="btn card-add"><i class="ion-android-add"></i></a>-->
                                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse7" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                                    </div>
                                </div>
                                <div class="card-body pd-0 collapse show" id="productSalesDetails">
                                 <div>
                                    <div class="table-responsive">

                                   

                                        <table id="dtHorizontalVerticalExample" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">
                                          <thead class="tx-dark tx-uppercase tx-10 tx-bold">
                                             <tr>
                                                <th>#</th>
                                                   <th>EMPRESA</th>
                                                 
                                                   <th>NOMBRE FLOTA</th>
                                                  
                                                   <th>Acciones</th>
                                                
                                               </tr>
                                   
                                          </thead>
                                          <tbody>

                                          <?php 
                                        $clientes = FlotaData::getAll(); 
                                         ?>
                                         
                                         <?php   
                                        if(count($clientes)>0){  
                                            ?>

                                          <?php foreach($clientes as $cliente):
                                            $empresa=EmpresaData::getById($cliente->id_empresa); 
                                            if($empresa->id==$empresaGeneral->id){

                                            
                                             ?> 

                                             <tr>

                                                <td><?php echo $cliente->id; ?></td>
                                                <td><?php echo $empresa->nombre; ?></td>
                                               
                                                <td><?php echo $cliente->nombre; ?></td>
                            
                                            
                                          
                                               
                                                
                                                <td class="text-Center table-actions">
                                                    <div class="btn-group mg-t-10">  

                                                                              <form action="index.php?view=Empresa/Flota/Edit_Flota" method="post">
                                                                              <input type="hidden" name="id" value=<?php echo $cliente->id;?>>
                                                                              <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                                                 <button class="btn btn-secondary" style="color: yellow"><i class="fa fa-pencil"></i></button>
                                                                              </form>
                                                                             

                                                                              <form action="index.php?action=DelFlota" method="post">   
                                                                              <input type="hidden" name="id" value=<?php echo $cliente->id;?>>
                                                                              <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                                                 <button class="btn btn-secondary" onclick="return pregunta()" style="color: red"><i class="fa fa-trash"></i></button>
                                                                              </form>
                                                                    

                                    
                                                                              <span class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" style="color: blue"></span>
                                                                     <div class="dropdown-menu dropdown-menu-right">
                                    
                                                       
                                                       <form action="index.php?view=Empresa/Flota/Add_Equipos_Flota" method="post">
                                                                    <input type="hidden" name="id" value=<?php echo $cliente->id;?>> 
                                                                    <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                                      <button class="dropdown-item" ><i class="fa fa-plus"></i> Añadir Equipos</button>  
                                                             </form>

                                                          <form action="index.php?view=Empresa/Flota/View_Equipo_Flota" method="post">
                                                                    <input type="hidden" name="id" value=<?php echo $cliente->id;?>> 
                                                                    <input type="hidden" name="view" value=<?php echo $_GET["view"];?>>
                                                                      <button class="dropdown-item" ><i class="fa fa-eye"></i> Ver Equipos</button>  
                                                             </form>
                                                  
                                                    </div>
                                              
                                                </td>
                                               
                                    
                                               
                                                
                                                </tr> 
                                                
                                                <?php 
                                                }
                                              endforeach;?>
                                                 <?php }?>
                                                 
                                          </tbody>
                                     
                                          <tfoot>
                                          <tr>
                                          
                                          <th>#</th>
                                                   <th>ID EMPRESA</th>
                                                 
                                                   <th>NOMBRE</th>
                                                  
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
                            <!--/ Scrollable Table End -->	

                            

                        
               </div>


 
</html>