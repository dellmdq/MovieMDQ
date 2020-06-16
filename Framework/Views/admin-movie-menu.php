<?php
    require_once('nav.php');

 
?>
<main style="color: white" class="d-flex align-items-center justify-content-center height-100">
     <section id="listado" class="">
          <div class="text-center">
               <h2 class = "text-center">Menu Movies</h2>
               <br>
               <form action="<?php echo FRONT_ROOT ?>Movie/ShowListGenres" method="post" class="bg-light-alpha p-3">
                   
                    <button type="submit" name="button" class="btn btn-dark ml-auto ">LIST MOVIE</button>
               </form>
               <form action="<?php echo FRONT_ROOT ?>Movie/RetrieveData" method="post" class="bg-light-alpha p-3">
                   
                    <button type="submit" name="button" class="btn btn-dark ml-auto " >ADD MOVIE</button>
               </form>
               <form action="<?php echo FRONT_ROOT ?>Movie/RetrieveDataGenres" method="post" class="bg-light-alpha p-3">
                   
                   <button type="submit" name="button" class="btn btn-dark ml-auto ">ADD GENRES</button>
              </form>
              
          </div>
     </section>
     
</main>

