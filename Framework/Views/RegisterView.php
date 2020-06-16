<main style="color: white" class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2  class="mb-4">Register Form</h2>
               <form action="<?php echo FRONT_ROOT ?> User/Add" method="post" class="bg-light-alpha p-3">
                    <div class="row">                         
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label  for="">Name</label>
                                   <input type="text" name="user_name" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label  for="">Last Name</label>
                                   <input type="text" name="user_lastName" value="" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label  for="">Mail</label>
                                   <input type="email" name="user_mail" value="" class="form-control">
                              </div>
                         </div>
                    
                    <div class="col-lg-3">
                              <div class="form-group">
                                   <label  for="">Password</label>
                                   <input type="password" name="user_pass" value="" class="form-control">
                              </div>
                         </div>
                    </div>
                    
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Registrarse</button>
               </form>
               
               <form action="<?php echo FRONT_ROOT ?>User/ShowLoginView" method="post" class="bg-light-alpha p-3">
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Cancel</button>
               </form>
          </div>

     </section>
     
</main>

