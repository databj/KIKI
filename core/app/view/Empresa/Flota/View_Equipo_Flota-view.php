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
                                        <a href="index.php?view=Add_Flota" data-toggle="añadir" class="btn card-add"><i class="ion-android-add"></i></a>
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
                                                   <th>ID flota</th>
                                                 
                                                   <th>ID EQUIPO</th>
                                                  
                                                   <th>Acciones</th>
                                                
                                               </tr>
                                   
                                          </thead>
                                          <tbody>

                                          <?php 
                                  
                                        $clientes = EquiposFlotaData::getByIdFlota($_POST["id"]); 
                                         ?>
                                         
                                         <?php   
                                        if($clientes!=null){  
                                            ?>

                                          <?php foreach($clientes as $cliente):
                                        $flota=FlotaData::getById($cliente->id_flota);
                                        $equipo=EquipoData::getById($cliente->id_equipo)
                                             ?> 

                                             <tr>

                                                <td><?php echo $cliente->id; ?></td>
                                                <td><?php echo $flota->nombre; ?></td>
                                               
                                                <td><?php echo $equipo->placa; ?></td>
                            
                                            
                                          
                                               
                                                
                                                <td class="text-Center table-actions">
                                                    <a class="table-action  mg-r-10" onclick="return pregunta()" href="index.php?action=DelEquiposFlota&id=<?php echo $cliente->id;?>"><i class="fa fa-trash"></i></a>
                                       
                                    
                                            
                                              
                                                </td>
                                               
                                    
                                               
                                                
                                                </tr> 
                                                <?php endforeach;?>
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
               </div>


 
</html>