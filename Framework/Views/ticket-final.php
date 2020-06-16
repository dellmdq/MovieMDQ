<?php
require_once('nav.php');
?>
<main style="color: white" class="py-auto">
    <br>
    <br>

    <h2 class="miEstilo">Movie Pass</h2>
    <h2 class="miEstilo">Ticket</h2>
    <section id="listado" class="mb-5">
        <div class="">
            <br>
            <br>
            <br>

            <table class="table table-dark">
                <thead>
                <th>Id ticket</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Show</th>
                <th>Day</th>
                <th>Time</th>
                <th>Cinema</th>

                </thead>
                <tbody>

                    <tr>
                        <td><?php echo $ticket->getIdTicket(); ?></td>
                        <td><?php echo $ticket->getQuantity();?></td>
                        <td><?php echo $ticket->getSubtotal();?></td>
                        <td><?php echo $ticket->getShow()->getMovie()->getName(); ?></td>
                        <td><?php echo $ticket->getShow()->getDay();?></td>
                        <td><?php echo $ticket->getShow()->getTime();?></td>
                        <td><?php echo $ticket->getShow()->getRoom()->getName()." - ".$ticket->getShow()->getRoom()->getCinema()->getName();?></td>

                    </tr>

                </tbody>
            </table>
        </div>
    </section>
    <?php include VIEWS_PATH."sendMail.php" ?>
</main>