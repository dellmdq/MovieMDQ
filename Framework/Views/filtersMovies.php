<?php
    require_once('nav.php');
?>

<main >
    <section id="listado" class="">
        <div class="d-flex align-items-center justify-content-center height-100">
        
            <div class="form-group text-center">
               <form action="<?php echo FRONT_ROOT ?>Movie/ShowAllMovies" method="POST">
               <button  type="submit" name="btnRegister" class="btn btn-dark text-center" value=""> Show All Movies </button>
               </form>
          </div>
            <div><form style="color: white" action="<?php echo FRONT_ROOT ?>Movie/ShowListViewMovies" method="post" class="bg-light-alpha p-5">

               <div style="color: white" class="form-group">
                        <div class="form-group">
                            <label for="">Genres</label>
                            <select name="idGenre" class="form-control">
                                   <?php foreach ($genresList as $genre){ ?>
                                        <option value="<?php echo $genre->getId_api();?>"><?php echo $genre->getName();?></option>
                                   <?php
                                   }?>                                 
                                  
                              </select>      

                        </div>
                        <button type="submit" name="button" class="btn btn-dark">Select</button>
               </div>
                    
            </form></div>
            
             
             <form style="color: white" action="<?php echo FRONT_ROOT ?>Movie/ShowMoviexName" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="form-group">
                              <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="movie_name" value="" class="form-control">
                              </div>
                              <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Select</button>
                         </div>
                    </div> 
                    
               </form>
     </section>

</main>

