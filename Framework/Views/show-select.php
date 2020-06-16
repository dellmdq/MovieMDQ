<?php
require_once('nav.php');



?>
<main style="color: white" class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Show Select</h2>
            <form action="<?php echo FRONT_ROOT ?>Ticket/TicketToBuy" method="post" class="bg-light-alpha p-5">
              
                  
                    <div class="col-lg-10">
                        <div class="form-group">
                            <label for="">Show</label>
                            <select name="idShow" class="form-control">
                                   <?php foreach ($showList as $show){ ?>
                                        <option value="<?php echo $show->getId();?>"><?php echo $show->getMovie()->getName()." - " . $show->getTime(). " - " . $show->getDay() . " - " . $show->getRoom()->getName() . " - ". $show->getRoom()->getCinema()->getName();?></option>
                                   <?php
                                   }?>                                 
                                  
                                   </select>      

                        </div>
                    </div>

                                   

                    
                   
                <button type="submit" name="button" class="btn btn-dark ml-auto d-block">Select</button>
            </form>
        </div>
    </section>

</main>
