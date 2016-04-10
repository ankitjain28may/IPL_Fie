var Demo = (function() {
	function demoUpload() {
		var $uploadCrop;

		function readFile(input) {
 			if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
	            	$uploadCrop.croppie('bind', {
	            		url: e.target.result
	            	});
	            	$('.upload-demo').addClass('ready');
	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	        else {
		        swal("Sorry - you're browser doesn't support the FileReader API");
		    }
		}

		$uploadCrop = $('#upload-demo').croppie({
			viewport: {
				width: 275,
				height: 300,
				
			},
			boundary: {
				width: 300,
				height: 350
			},
			exif: false
		});

		$('#upload').on('change', function () { readFile(this); });
		$('.upload-result').on('click', function (ev) {
			$uploadCrop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function (resp) {
				document.getElementById("hidden1").value = resp;
				console.log('111');
				$("#bmw").click();
				console.log('clicked');
				//console.log(resp);
			});
		});
	}

	function init() {
		demoUpload();
	}


	return {
		init: init
	};
})();
