<!DOCTYPE html>
<html lang="zxx">
   
<div id="main-wrapper">
  
         <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-20">
                                    <div class="card-header">
                                        <h4 class="card-header-title">
                                            Añadir Flota
                                        </h4>
                                        <div class="card-header-btn">
                                            <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse4" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                                            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                            <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                                        </div>
                                      </div>

                          

                           
                                    <div class="card-body collapse show" id="collapse4">


                                    <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=AddEquipoFlota" role="form">
                                    <?php $flota=FlotaData::getById($_POST["id"]);?>

                                    <input type="hidden" name="id" id="id" value="<?php echo $_POST["id"];?>" readonly="true"  required />


                                         <div class="row">
                                                    
                                         
                                    
                                                      

                                                        <div class="col-md-6 mb-3">
                                                            <p>Nombre De la Flota</p>
                                                            <div class="input-group mb-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
                                                            </div>
                                                            <input  disabled="" type="text" class="form-control" value="" name="nombre" id="nombre" placeholder="<?php echo $flota->nombre;  ?>" aria-label="Username" aria-describedby="basic-addon3">
                                                            </div>
                                                            
                                                        </div>
                                                      

                                                       
                              

                                                        <!--================================-->

                                                        <?php 
                                                                    $clientes = EquipoData::getAll(); 
                                                                    ?>


                                                                        <div class="col-md-6 col-lg-12">
                                                                        <p>Equipo</p>
                                                                            <div class="card mg-b-20">
                                                                            
                                                                                <div class="card-body collapse show" id="collapse13">
                                                                                

                                                                                    <select id="id_equipo" name="id_equipo" class="selectpicker form-control" data-hide-disabled="true" data-live-search="true">
                                                                            
                                                                                        <optgroup label="   ">
                                                                                        
                                                                                        <?php   
                                                                                            if(count($clientes)>0){  
                                                                                        ?>
                                                                                        

                                                                                            <?php foreach($clientes as $cliente):?> 

                                                                                        
                                                                                                     <option value="<?php echo $cliente->id; ?>"><?php echo $cliente->placa; ?></option>
                                                                                           
                                                                                            <?php endforeach;?>
                                                                                         
                                                                                         <?php }?>
                                                                                            
                                                                                
                                                                                      
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                             <!-- ---------------------------------   -->
                                                    
                                                     

                                                  
                         
                                                    

                                                        <div class="col-md-6 mb-3">
                                                          <button class="btn btn-custom-primary" onclick="return pregunta()" type="submit">Confirmar</button>
                                                        </div>



                                            
                                          
                                         </div>

                                    </form> 

                         </div>
                 </div>
                                

</div>


</html>