<button type="button" id="btn-click">Click Me</button>



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	$(function() {

		$(document).on('click', '#btn-click', function() {

			$.ajax({
				url: "<?= site_url('sitecontroller/handleAjaxRequest') ?>",
				type: "POST",
				data: {
					name: "Sanjay Kumar",
					email: "sanjay@gmail.com"
				},
				dataType: "JSON",
				success: function(response) {

					console.log(response);
				}
			});
		}); 

	});
</script>