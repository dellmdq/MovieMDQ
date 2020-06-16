<?php
    require_once('nav.php');

  
    
?>
<main style="color: white" class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2  class="mb-4">Modify cinema</h2>
               

               <form action="<?php echo FRONT_ROOT ?>Cinema/Modify" method="post" class="bg-light-alpha p-5">
                    <div class="row">    
                    <div class="col-lg-1">
                        
                              <div class="form-group">
                                   <label for="">Id</label>
                                   <input type="text" name="id_cinema" value="<?php echo $cinema->getId() ?>" class="form-control" readonly = "readonly">
                              </div>
                         </div>                     
                         <div class="col-lg-4">
                        
                              <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="cinema_name" value="<?php echo $cinema->getName() ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Address</label>
                                   <input type="text" name="cinema_address" value="<?php echo $cinema->getAddress() ?>" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Ticket Price</label>
                                   <input type="number" name="ticket_price" value="<?php echo $cinema->getTicketPrice() ?>" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block" >Modificar</button>
               </form>
          </div>
     </section>
     
</main>

