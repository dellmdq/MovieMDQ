<?php
require_once('nav.php');
?>
<main style="color: white" class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2  class="mb-4">Room List</h2>
            <table  style="color: white" class="table bg-light-alpha">
                <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>ID_Cinema</th>
                </thead>
                <tbody>

                <?php
                foreach($roomList as $room)
                {
                    ?>
                    <tr>
                        <td><?php echo $room->getId() ?></td>
                        <td><?php echo $room->getName() ?></td>
                        <td><?php echo $room->getCapacity() ?></td>
                        <td><?php echo $room->getCinema()->getId() ?></td>
                        <td>
                            <form action="<?php echo FRONT_ROOT ?>Room/Delete" method="POST">
                                <button type="submit" name="btnRemove" class="btn btn-danger" value="<?php echo $room->getId(); ?>"> DELETE </button>
                            </form>
                        </td>
                        <td>
                            <form action="<?php echo FRONT_ROOT ?>Room/ViewModify" method="POST">
                                <button type="submit" name="btnModify" class="btn btn-danger" value="<?php echo $room->getId(); ?>"> MODIFY </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
</main>