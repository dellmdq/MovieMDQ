<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 style="color: white" class="mb-4">Movie List</h2>
               <table style="color: white" class="table bg-light-alpha">
                    <thead>
                         <th>Name</th>
                         <th>Language</th>
                         <th>Summary</th>
                         <th>Release Date</th>
                         <th>Genres</th>
                         <th>Playing Now</th>
                         <th>Poster</th>
                    </thead>
                    <tbody>
                         <?php
                              foreach($movieList as $movie)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $movie->getName(); ?></td>
                                             <td><?php echo $movie->getLanguage(); ?></td>
                                             <td><?php echo $movie->getSummary(); ?></td>
                                             <td><?php echo $movie->getReleaseDate(); ?></td>
                                             <td><?php 
                                                       $gen = $movie->getGenres();
                                                       for ($i = 0; $i < count($gen);$i++){
                                                           echo $gen[$i][0]."<br>"; 
                                                       }
                                            
                                             ?></td>
                                             <td><?php echo $movie->getPlayingNow();?> </td>
                                             <td><img src= <?php echo "https://image.tmdb.org/t/p/w154" .$movie->getImage();?>> </td>
                                             <td>
                                             <form action="<?php echo FRONT_ROOT ?>Movie/ViewModify" method="POST">
                                             <button type="submit" name="btnModify" class="btn btn-danger" value="<?php echo $movie->getId(); ?>"> Modificar </button>
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