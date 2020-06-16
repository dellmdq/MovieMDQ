<?php
    require_once('nav.php');
?>


<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
        <!--  <h2 class="mb-4">Filter</h2>
            <form action="<?php echo FRONT_ROOT ?>Movie/ShowMoviesxDate" method="post" class="bg-light-alpha p-5">

<div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Genres</label>
                            <select name="idGenre" class="form-control">
                                   <?php foreach ($genresList as $genre){ ?>
                                        <option value="<?php echo $genre->getId_api();?>"><?php echo $genre->getName();?></option>
                                   <?php
                                   }?>                                 
                                  
                                   </select>      

                        </div>
                    </div>
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Select</button>
            </form>

            <form action="<?php echo FRONT_ROOT ?>Movie/ShowAllMovies" method="POST">
           <button type="submit" name="btnRegister" class="btn btn-dark btn-block btn-lg" value=""> Show All Movies </button>
             </form>
             
             <form action="<?php echo FRONT_ROOT ?>Movie/ShowMoviexName" method="post" class="bg-light-alpha p-5">
                    <div class="row">                         
                         <div class="col-lg-4">
                              <div class="form-group">
                                   <label for="">Name</label>
                                   <input type="text" name="movie_name" value="" class="form-control">
                              </div>
                         </div>
                       
                    <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Select</button>
               </form>
     </section>-->

               <h2 style="color: white" class="mb-4">Movie List</h2>
               <table style="color: white" class="table bg-light-alpha">
                    <thead>
                         <th>Name</th>
                         <th>Language</th>
                         <th>Summary</th>
                         <th>Release Date</th>
                         <th>Genres</th>
                         <th>Poster</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($movieList as $movie)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $movie->getName() ?></td>
                                             <td><?php echo $movie->getLanguage() ?></td>
                                             <td><?php echo $movie->getSummary() ?></td>
                                             <td><?php echo $movie->getReleaseDate() ?></td>
                                             <td><?php 
                                                       $gen = $movie->getGenres();
                                                       for ($i = 0; $i < count($gen);$i++){
                                                           echo $gen[$i][0]."<br>"; 
                                                       }
                                            
                                             ?></td>
                                             <td><img src= <?php echo "https://image.tmdb.org/t/p/w154" .$movie->getImage()?>> </td>
                                             <td>
                                             <form action="<?php echo FRONT_ROOT ?>User/MoviesxCinema" method="POST">
                                             <button type="submit" name="Select" class="btn btn-danger" value="<?php echo $movie->getId(); ?>"> Seleccionar </button>
                                            </form>
                                            </td>
                                        </tr>
                                   <?php
                              }
                         ?>
                         </tr>
                    </tbody>
               </table>
          </div>
     </section>
</main>