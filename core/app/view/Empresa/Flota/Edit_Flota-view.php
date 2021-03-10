<!DOCTYPE html>
<html lang="zxx">
   
<div id="main-wrapper">
  
         <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-20">
                                    <div class="card-header">
                                        <h4 class="card-header-title">
                                            Editar Flota
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
                                        $clientes = FlotaData::getById($_POST["id"]); 
                                         ?>


                                    <form class="form-horizontal" method="post" id="addproduct" action="index.php?action=EditFlota" role="form">
                                    
                                    <input type="hidden" name="id" id="id" value="<?php echo $clientes->id;?>" readonly="true"  required />

                                    <input type="hidden" name="View" id="View" value="<?php echo $_GET["view"];?>" readonly="true"  required />
                                    <input   type="hidden" type="text" class="form-control" name="id_empresa" id="id_empresa" value="<?php echo $clientes->id_empresa; ?>" aria-label="Amount (to the nearest dollar)">
                                            

                                         <div class="row">
                                                    
                                         
                                                      

                                                        <div class="col-md-12 mb-3">
                                                            <p>Nombre De la Flota</p>
                                                            <div class="input-group mb-6">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-addon3"><i class="fa fa-user"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Username"value="<?php echo $clientes->nombre; ?>"  aria-label="Username" aria-describedby="basic-addon3">
                                                            </div>
                                                            
                                                        </div>

                                                      

                                                      
                                                             
                                                        


                                                       


                                                        <div class="col-md-6 mb-3">
                                                          <button class="btn btn-custom-primary"onclick="return pregunta()"  type="submit">Confirmar</button>
                                                        </div>



                                            
                                          
                                         </div>

                                    </form> 

                         </div>
                 </div>
                                

</div>
</html>