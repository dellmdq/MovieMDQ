<?php
require_once('nav.php');



?>
<main style="color: white" class="py-auto">
    
    <section id="listado" class="mb-5">
        <form id= "signup" action="<?php echo FRONT_ROOT ?>Ticket/Add" method="post" class="bg-light-alpha p-5">
            <header class="header">

                <script>
                    function multi(){
                        m1 = document.getElementById("quantity").value;
                        m2 = document.getElementById("ticket_price").value;
                        m3 = 0.75;
                        $day = "<?php  echo date("D" , strtotime($ticket->getShow()->getDay()));?>";
                        if(m1>=2 && ($day == "Tue" || $day == "Wed")){
                            r = m1*m2*m3;
                            }else{
                                r = m1*m2;
                                };
                        
                
                        document.getElementById("subtotal").value = r;
                    }
                </script>
                <br>
                <br>
                <h2 class="text-center">Ticket</h2>
                <br>
            </header>
            <div class="d-flex align-items-center justify-content-center height-100">
                <div class="inputs text-center">

                    <label for="">Ticket Price</label>
                    <input type="int" name="price" id ="ticket_price" value="<?php echo $ticket->getPrice();?>" class="form-control  text-center" readonly = "readonly" onChange="multi();">
                    
                    <label for="">Quantity</label>
                    
                    <select name="quantity" id= "quantity" class="form-control text-center" onChange="multi();" required>
                        <?php for ($i = 0; $i<11 ; $i++){ ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php
                        }?>
                    </select>
                    <label for="">Subtotal</label>
                    <input type="number" name = "subtotal" id ="subtotal" value="0" class="form-control text-center" readonly="readonly">
                    <input type="hidden" name="id_show" value="<?php echo $ticket->getShow()->getId();?>">
                    <label for="">Credit Card</label>
                    <input type="text" name="credit_card" value="" class="form-control" required>
                    <br>
                    <div class="text-center">
                        <button id="submit" type="submit" value = "" name="Button" class="btn btn-dark">Buy</button>
                    </div>

                    </div>
                </div>
        </form>
        </div>
    </section>

</main>