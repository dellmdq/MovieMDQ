<?php
require_once('nav.php');
?>
<main style="color: white" class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2  class="mb-4">Show List</h2>
            <table style="color: white" class="table bg-light-alpha">
                <thead>
                <th>Day</th>
                <th>Time</th>
                <th>Movie</th>
                <th>Room</th>
                </thead>
                <tbody>

                <?php
                foreach($showList as $show)
                {
                    ?>
                    <tr>
                        <td><?php echo $show->getDay() ?></td>
                        <td><?php echo $show->getTime() ?></td>
                        <td><?php echo $show->getMovie()->getName() ?></td>
                        <td><?php echo $show->getRoom()->getName() ?></td>
                        <td>
                            <form action="<?php echo FRONT_ROOT ?>Show/Delete" method="POST">
                                <button type="submit" name="btnRemove" class="btn btn-danger" value="<?php echo $show->getId(); ?>"> DELETE </button>
                            </form>
                        </td>
                        <td>
                            <form action="<?php echo FRONT_ROOT ?>Show/ViewModify" method="POST">
                                <button type="submit" name="btnModify" class="btn btn-danger" value="<?php echo $show->getId(); ?>"> MODIFY </button>
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