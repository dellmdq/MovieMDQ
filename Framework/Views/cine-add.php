<?php
    require_once('nav.php');

  
  
?>
<main style="color: white" class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2  class="mb-4">Add cinema</h2>
               <form action="<?php echo FRONT_ROOT ?>Cinema/Add" method="post" class="bg-light-alpha p-5">
                    <div  class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="cinema_name" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Address</label>
                                   <input type="text" name="cinema_address" value="" class="form-control" required>
                              </div>
                         </div>
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Ticket Price</label>
                                   <input type="number" name="ticket_price" value="" class="form-control" required>
                              </div>
                         </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
     
</main>

