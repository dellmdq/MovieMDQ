<?php
require_once('nav.php');

?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Modify Movie Status</h2>


            <form style="color: white" action="<?php echo FRONT_ROOT ?>Movie/ModifyStatus" method="post" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-3">

                        <div class="form-group">
                            <label for="">Id</label>
                            <input type="text" name="id_movie" value="<?php echo $movie->getId(); ?>" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="movie_name" value="<?php echo $movie->getName(); ?>" class="form-control" readonly="readonly">
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Playing Now</label>
                            <select name="idMovie" class="form-control">
                                <option value="0">Deactivate</option>
                                <option value="1">Activate</option>
                               
                            </select>
                          
                        </div>
                    </div>
                   
                <button type="submit" name="button" class="btn btn-dark ml-auto d-block" >Modify</button>
            </form>
        </div>
    </section>

</main>

