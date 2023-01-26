<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Page Title</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	</head>
	<body>
		<h1>Hello, world!</h1>
		<form action="<?=site_url('upload')?>" method="post" enctype="multipart/form-data">
			<input type="file" id="input-file" onchange="compressImage(this,'#file1')">
			<input type="hidden" name="file1" id="file1">
			<input type="submit" value="Upload">
		</form>


<script>
	
	function compressImage(from_element,to_element)
	{
		// var inputFile = document.getElementById("input-file");
		var inputFile = from_element;
		var reader = new FileReader();
		reader.onload = function()
		{
			var img = new Image();
			img.src = reader.result;
			img.onload = function()
			{
				var canvas = document.createElement("canvas");
				var ctx = canvas.getContext("2d");
				ctx.drawImage(img, 0, 0);

				var MAX_WIDTH = 6000;
				var MAX_HEIGHT = 4000;
				var width = img.width;
				var height = img.height;

				if (width > height)
				{
					if (width > MAX_WIDTH)
					{
						height *= MAX_WIDTH / width;
						width = MAX_WIDTH;
					}
				}
				else
				{
					if (height > MAX_HEIGHT)
					{
						width *= MAX_HEIGHT / height;
						height = MAX_HEIGHT;
					}
				}
				canvas.width = width;
				canvas.height = height;
				ctx = canvas.getContext("2d");
				ctx.drawImage(img, 0, 0, width, height);

				var compressedImage = canvas.toDataURL("image/jpeg", 0.5);
				$(to_element).val(compressedImage);
				console.log(compressedImage);
				// kirimkan compressedImage ke server melalui form
			};
		};

		reader.readAsDataURL(inputFile.files[0]);
	}
</script>

<script>
// function compressImage() {
//	 var inputImage = document.getElementById('input-image');
//   var imageToUpload = inputImage.files[0];

//   var reader = new FileReader();
//   reader.onloadend = function() {
//     var image = new Image();
//     image.src = reader.result;
//     image.onload = function() {
//       var canvas = document.createElement('canvas');
//       var ctx = canvas.getContext('2d');
//       canvas.width = image.width;
//       canvas.height = image.height;
//       ctx.drawImage(image, 0, 0, image.width, image.height);

//       var compressedImage = canvas.toDataURL('image/jpeg', 0.5);
//       var hiddenInput = document.getElementById('compressed-image');
//       hiddenInput.value = compressedImage;
//     }
//   }
//   reader.readAsDataURL(imageToUpload);
// }

</script>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script></body>
</html>
