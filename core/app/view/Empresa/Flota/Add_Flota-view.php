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


                                    <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=AddFlota" role="form">
                                    

                                    <input type="hidden" id="id_empresa" name="id_empresa" value="<?php echo $_POST["id"];?>" >
                                    <input type="hidden" id="View" name="View" value="<?php echo $_GET["view"];?>" >

                                         <div class="row">
                                                    
                                         
                                                      

                                                        <div class="col-md-6 mb-3">
                                                            <p>Nombre De la Flota</p>
                                                            <div class="input-group mb-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" aria-label="Username" aria-describedby="basic-addon3" required>
                                                            </div>
                                                            
                                                        </div>

                                                      

                                                       
                                                                <!--================================-->

                                                                                    <?php 
                                                                    $clientes = EmpresaData::getAll(); 
                                                                    ?>


                                                                        <div class="col-md-6 col-lg-12">
                                                                        <p>Empresa</p>
                                                                            <div class="card mg-b-20">
                                                                            
                                                                                <div class="card-body collapse show" id="collapse13">
                                                                                
                                                                               
                                                                                    <select disabled class="selectpicker form-control" data-hide-disabled="true" data-live-search="true" required>
                                                                            
                                                                                        <optgroup label="   ">
                                                                                        <option ></option>
                                                                                        <?php   
                                                                                            if(count($clientes)>0){  
                                                                                        ?>
                                                                                         

                                                                                            <?php foreach($clientes as $cliente):?> 
                                                                                            
                                                                                              
                                                                                        
                                                                                                     <option <?php if ($cliente->id==$_POST["id"]){echo "selected";}?> value="<?php echo $cliente->id; ?>"><?php echo $cliente->nombre; ?></option>
                                                                                           
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