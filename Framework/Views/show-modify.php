<?php
require_once('nav.php');



?>
<main style="color: white" class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Modify Show</h2>


            <form action="<?php echo FRONT_ROOT ?>Show/Modify" method="post" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-1">

                        <div class="form-group">
                            <label for="">Id</label>
                            <input type="text" name="id_room" value="<?php echo $show->getId();?>" class="form-control" readonly = "readonly">
                        </div>
                    </div>
                    <div class="col-lg-2">

                        <div class="form-group">
                            <label for="">Day</label>
                            <input type="date" name="show_day" value="<?php echo $show->getDay(); ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2">

                        <div class="form-group">
                            <label for="">Time</label>
                            
                            <select type="time"  name="show_time" class="form-control" required>
                            
                                        <option value="<?php echo $show->getTime(); ?>">"<?php echo $show->getTime(); ?>"</option>
                                        <option value="12:00:00">"12:00"</option>
                                        <option value="15:30:00">"15:30"</option>
                                        <option value="19:40:00">"19:40"</option>
                                        <option value="22:10:00">"22:10"</option>                      
                                  
                            </select> 
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Movie</label>
                            <select name="idMovie" class="form-control">
                                <option value="<?php echo $show->getMovie()->getId();?>"><?php echo $show->getMovie()->getName();?></option>

                                <?php foreach ($movieList as $movie){
                                if ($movie->getName()!= $show->getMovie()->getName()) {

                                    ?>
                                    <option value="<?php echo $movie->getId(); ?>"><?php echo $movie->getName(); ?></option>
                                    <?php
                                }
                                }?>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Room</label>
                            <select name="idRoom" class="form-control">

                                <option value="<?php echo $show->getRoom()->getId();?>"><?php echo $show->getRoom()->getName(). " - ".$show->getRoom()->getCinema()->getName();?></option>

                                <?php foreach ($roomList as $room){
                                    if ($room->getName()!= $show->getRoom()->getName()){
                                        ?>
                                        <option value="<?php echo $room->getId();?>"><?php echo $room->getName()." - ".$room->getCinema()->getName();?></option>
                                        <?php
                                    }

                                }?>

                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="button" class="btn btn-dark ml-auto d-block" >Modify</button>
            </form>
        </div>
    </section>

</main>
