<?php
    require_once('nav.php');

 
?>
<main style="color: white" class="d-flex align-items-center justify-content-center height-100">
     <section id="listado" class="mb-5">
          <div class="text-center">
               <h2 class = "text-center">Menu Cines</h2>
               <br>
               <form action="<?php echo FRONT_ROOT ?>Cinema/ShowAddView" method="post" class="bg-light-alpha p-3">
                   
                    <button type="submit" name="button" class="btn btn-dark ml-auto">ADD CINEMA</button>
               </form>
               <form action="<?php echo FRONT_ROOT ?>Cinema/ShowListView" method="post" class="bg-light-alpha p-3">
                   
                    <button type="submit" name="button" class="btn btn-dark ml-auto" >LIST CINEMA</button>
               </form>
               <form action="<?php echo FRONT_ROOT ?>Room/ShowAddView" method="post" class="bg-light-alpha p-3">
                   
                   <button type="submit" name="button" class="btn btn-dark ml-auto ">ADD ROOM</button>
              </form>
              <form action="<?php echo FRONT_ROOT ?>Room/ShowListView" method="post" class="bg-light-alpha p-3">
                  
                   <button type="submit" name="button" class="btn btn-dark ml-auto " >LIST ROOM</button>
              </form>
          </div>
     </section>
     
</main>

