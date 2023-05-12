<!DOCTYPE html>
<html lang="sk">

<head>
    <?php include "includes/components/head_component.php"; ?>
    <title>Chémia jednoduchšie</title>
</head>

<script src="/htdocs/wwwroot/js/threejs/build/three.js"></script>
<script src="/htdocs/wwwroot/js/threejs/js/controls/OrbitControls.js"></script>
<script src="/htdocs/wwwroot/js/threejs/js/loaders/GLTFLoader.js"></script>
<script src="../wwwroot/js/modelViewport.js"></script>

<body>
    <?php include "includes/components/nav_component.php"; ?>
    <?php 
        // get data from database
        include "includes/dbh.inc.php";
        $sql = "SELECT * FROM zluceniny WHERE id = 1";
        $result = mysqli_query($conn, $sql);
        $array = mysqli_fetch_array($result);   
    ?>
    <div class="container main-grid mt-5">
        <div class="info">
            <h3>Základne informácie</h3>
            <p>
                <?php echo $array[2]; ?>
            </p>
        </div>
    
        <div class="reakcie">
            <h3>Reakcie</h3>
            <?php echo $array[3]; ?>
        </div>
    
        <div class="vyuzitie">
            <h3>Využitie</h3>
            <?php echo $array[4]; ?>
        </div>
    
        <div class="model">
            <div id="canvas-container" class="w-100">
              <a href="/htdocs/models_viewport/H2SO4.html"><img src="/htdocs/images/fullscreen.png"></a>
            </div>
          </div>
        </div>
    
    <?php include "includes/components/footer_component.php"; ?>
    <script>addModel("canvas-container", "/htdocs/models/anorganicke/H2SO4.glb");</script>  
</body>
</html>