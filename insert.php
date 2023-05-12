<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/components/head_component.php"; ?>
    <title>Insert</title>
</head>

<body>
    <?php include "includes/components/nav_component.php"; ?>
    <div class="container mt-5">
        <!-- Generate alert succes if insert = success -->
        <?php if (isset($_GET['insert']) && $_GET['insert'] == 'success') : ?>
            <div class="alert alert-success" role="alert">
                Záznam bol úspešne vložený!
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['insert']) && $_GET['insert'] != 'success') : ?>
            <div class="alert alert-danger" role="alert">
                Záznam sa nepodarilo vložiť!
            </div>
        <?php endif; ?>
        <form action="includes/modelSender.php" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Názov zlúčeniny</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" required>Model</label>
                <input type="text" class="form-control" name="model">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Info</label>
                <textarea class="form-control" name="info" rows="3" id="model-editor" required></textarea>
            </div>
            <div class="mb-3 render" id="model-render">

            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Reakcia</label>
                <textarea class="form-control" name="reaction" rows="3" id="reaction-editor" required></textarea>
            </div>
            <div class="mb-3 render" id="reaction-render">

            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Vzužitie</label>
                <textarea class="form-control" name="utilization" rows="3" id="utilization-editor" required></textarea>
            </div>
            <div class="mb-3 render" id="utilization-render">

            </div>
            <button type="submit" class="btn btn-primary w-100" id="form-submit">Submit</button>
        </form>

    </div>
    <?php include "includes/components/footer_component.php"; ?>
    <script>
        addHtmlRendered('model-editor', 'model-render');
        addHtmlRendered('reaction-editor', 'reaction-render');
        addHtmlRendered('utilization-editor', 'utilization-render');

        document.getElementById('form-submit').addEventListener('click', function() {
            document.getElementById('model-editor').value = document.getElementById('model-render').innerHTML;
            document.getElementById('reaction-editor').value = document.getElementById('reaction-render').innerHTML;
            document.getElementById('utilization-editor').value = document.getElementById('utilization-render').innerHTML;
        });

        function addHtmlRendered(textareaId, renderId) {
            var converter = new showdown.Converter();
            var textarea = document.getElementById(textareaId);
            var html = document.getElementById(renderId);
            textarea.addEventListener('input', function() {
                if (textarea === '') html.style.display = 'none';
                else html.style.display = 'block';
                html.innerHTML = converter.makeHtml(textarea.value);;
            });
        }
    </script>
</body>

</html>