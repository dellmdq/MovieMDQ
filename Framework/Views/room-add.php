<?php
    require_once('nav.php');

?>
<main style="color: white" class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2  class="mb-4">Add Room</h2>
            <form  action="<?php echo FRONT_ROOT ?>Room/Add" method="post" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="room_name" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Capacity</label>
                            <input type="text" name="room_capacity" value="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Cinema</label>
                            <select name="idType" class="form-control">
                                   <?php foreach ($cinemaList as $cinema){ ?>
                                        <option value="<?php echo $cinema->getId();?>"><?php echo $cinema->getName();?></option>
                                   <?php
                                   }?>                                 
                                  
                                   </select>      

                        </div>
                    </div>
                </div>
                <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Add</button>
            </form>
        </div>
    </section>

</main>
