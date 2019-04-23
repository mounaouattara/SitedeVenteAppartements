</body>

<footer>

   <?php
       if(isset($_SESSION['connecte'])){
           if($_SESSION['login'] == 'SippyCup'){
           ?>
        <center><a href="admin.php" style="color: blue;">Panneau d'administration</a></center>

<?php
   }
   else{
           echo "";
   }
       }
?>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor eos esse repudiandae sapiente vitae! Accusamus dolorum illum nam nesciunt perspiciatis reprehenderit sapiente sequi? Est incidunt magni nobis tenetur voluptate voluptates?

</footer>


</html>