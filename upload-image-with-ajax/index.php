<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Subida de imágenes con jQuery y Ajax Demo</title>
<meta name="description" content="Subida de imágenes con jQuery y Ajax.."/>
<meta name="author" content="Jose Aguilar">
<link rel="shortcut icon" href="https://www.jose-aguilar.com/blog/wp-content/themes/jaconsulting/favicon.ico" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $(".upload").on('click', function() {
        let formData = new FormData();
        let files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'upload.php?foo=bar',
            type: 'post',
            data: formData,
            idRegistro : "839",
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response);
            }
        });
		return false;
    });
});
</script>
</head>
<body>
<div class="container">
    <div class="row">
        <div id="content" class="col-lg-12">
			<form method="post" action="#" enctype="multipart/form-data">
                <input type="text" name="Hola">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="images/default-avatar.png">
					<div class="card-body">
						<h5 class="card-title">Sube una foto</h5>
						<p class="card-text">Sube una imagen para probar esta demostración. La imagen puede ser en formato .jpg, o .png.</p>
						<div class="form-group">
							<label for="image">Nueva imagen</label>
							<input type="file" class="form-control-file" name="image" id="image">
						</div>
						<input type="button" class="btn btn-primary upload" value="Subir">
					</div>
				</div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
