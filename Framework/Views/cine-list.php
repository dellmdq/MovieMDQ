<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 style="color: white" class="mb-4">Listado de cinemas</h2>
               <table style="color: white" class="table bg-light-alpha">
                    <thead>
                         <th>Id</th>
                         <th>Name</th>
                         <th>Address</th>
                         <th>Ticket Price</th>
                    </thead>
                    <tbody>
                   
                         <?php
                              foreach($cinemaList as $cinema)
                              {
                                   ?>
                                        <tr>
                                             <td><?php echo $cinema->getId() ?></td>
                                             <td><?php echo $cinema->getName() ?></td>
                                             <td><?php echo $cinema->getAddress() ?></td>
                                             <td><?php echo $cinema->getTicketPrice() ?></td>
                                             <td>
                                             <form action="<?php echo FRONT_ROOT ?>Cinema/Delete" method="POST">
                                             <button type="submit" name="btnRemove" class="btn btn-danger" value="<?php echo $cinema->getId(); ?>"> Eliminar </button>
                                            </form>
                                            </td>
                                            <td>
                                             <form action="<?php echo FRONT_ROOT ?>Cinema/ViewModify" method="POST">
                                             <button type="submit" name="btnModify" class="btn btn-danger" value="<?php echo $cinema->getId(); ?>"> Modificar </button>
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