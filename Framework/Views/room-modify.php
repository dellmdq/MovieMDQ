<?php
require_once('nav.php');



?>
<main style="color: white" class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Modify Room</h2>


            <form action="<?php echo FRONT_ROOT ?>Room/Modify" method="post" class="bg-light-alpha p-5">
                <div class="row">
                    <div class="col-lg-1">

                        <div class="form-group">
                            <label for="">Id</label>
                            <input type="text" name="id_room" value="<?php echo $room->getId() ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="room_name" value="<?php echo $room->getName() ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">Capacity</label>
                            <input type="text" name="room_capacity" value="<?php echo $room->getCapacity() ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">ID_Cinema</label>
                            <input type="number" name="id_cine" value="<?php echo $room->getCinema()->getId() ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <button type="submit" name="button" class="btn btn-dark ml-auto d-block" >Modify</button>
            </form>
        </div>
    </section>

</main>

