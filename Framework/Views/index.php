
     

<main class="d-flex align-items-center justify-content-center height-100">
     <div class="content">
          <header class="text-center">
          <br>

               <h1 style="color: white"><strong>MOVIEPASS</strong></h1>
               <br>
               <h2 style="color: white"><strong>LOGIN</strong></h2>
          </header>
          <form action="<?php echo FRONT_ROOT ?>User/Login" method="POST">

                    <div class="form-group">
                    <label for="" style="color: white">Mail</label>
                    <input type="email" name="user_mail" class="form-control form-control-lg" placeholder="Ingresar mail" require>
               </div>
               <div class="form-group">
                    <label for="" style="color: white">Password</label>
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingresar constraseña" require>
               </div>
               <div>
               
               <button class="btn btn-dark btn-block btn-lg" type="submit">Start Session</button>
               </div>
               </form>
              <div>
              <br>
               <form action="<?php echo FRONT_ROOT ?>User/ShowRegisterView" method="POST">
           <button type="submit" name="btnRegister" class="btn btn-dark btn-block btn-lg" value=""> Register </button>
             </form>
             </div>
               
     </div>
     
</main>

