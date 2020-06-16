<?php if(isset($_SESSION["usuarioLogueado"])){
$user=$_SESSION["usuarioLogueado"];
if($user->getId()==1){

?>

<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <h2>MoviePass</h2>
     </span>
     <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/ShowMenuCine">Cinemas</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/ShowMenuMovie">Movies</a>
          </li>        
          <li class="nav-item">
             <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/ShowMenuShows">Shows</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/Logout">Logout</a>
          </li>  
     </ul>

</nav>

<?php }
else // Nav USUARIO
{
     ?>
     <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <span class="navbar-text">
          <H1><strong>MoviePass</strong></H1>
     </span>
     <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/ShowListViewCinema_user">List Cinema</a>
          </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>Movie/ShowMoviesinShow">List Movie</a>
          </li>        
          <li class="nav-item">
             <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/ShowWatchlist">My Watchlist</a>
         </li>
          <li class="nav-item">
               <a class="nav-link" href="<?php echo FRONT_ROOT ?>User/Logout">Logout</a>
          </li>  
     </ul>

</nav>
<?php
}
}else {
     header ('location:'.FRONT_ROOT);
    
}
?>

