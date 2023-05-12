<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/components/head_component.php"; ?>
    <title>Insert</title>
</head>

<body>
    <?php include "includes/components/nav_component.php"; ?>
    <div class="container mt-5">
        <form action="includes/modelSender.php" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Názov zlúčeniny</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Model</label>
                <input type="text" class="form-control" name="model">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Info</label>
                <textarea class="form-control" name="info" rows="3    "></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Reakcia</label>
                <textarea class="form-control" name="reaction" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Vzužitie</label>
                <textarea class="form-control" name="utilization" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php include "includes/components/footer_component.php"; ?>
</body>

</html>