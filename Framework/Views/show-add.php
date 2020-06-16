<?php
require_once('nav.php');



?>
<main style="color: white" class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Add Show</h2>
            <form  action="<?php echo FRONT_ROOT ?>Show/Add" method="post" class="bg-light-alpha p-5">
                <div class="row">
                      <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Day</label>
                            <input type="date" id="start" name="show-day"
                                   value="<?php echo date("D, Y-m-d")?>" prefix="<?php date("Y-m-d")?>"
                                   min="<?php echo date("Y-m-d")?>" max="2020-12-31" class="form-control" required>
                        </div>
                       </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="">Time</label>
                            <select type="time" name="show_time" class="form-control" required>
                                        <option value="12:00:00">"12:00"</option>
                                        <option value="15:30:00">"15:30"</option>
                                        <option value="19:40:00">"19:40"</option>
                                        <option value="22:10:00">"22:10"</option>                      
                                  
                            </select> 
                            
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Movie</label>
                            <select name="idMovie" class="form-control">
                                   <?php foreach ($movieList as $movie){ ?>
                                        <option value="<?php echo $movie->getId();?>"><?php echo $movie->getName();?></option>
                                   <?php
                                   }?>                                 
                                  
                            </select>      

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Room</label>
                            <select name="idRoom" class="form-control">
                                   <?php foreach ($roomList as $room){ ?>
                                        <option value="<?php echo $room->getId();?>"><?php echo $room->getName()." - ".$room->getCinema()->getName();?></option>
                                   <?php
                                   }?>                                 
                                  
                                   </select> 
                        </div>
                    </div>
                 
                    <button type="submit" name="button" class="btn btn-dark ml-auto">Add</button>
                    
                </div>
            </form>
        </div>
    </section>

</main>

