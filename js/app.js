requirejs(['jquery'],
	function($) {
alert('asddsadd');
		$("#main-form").submit(function( event ) {
			$("#load-image").css("visibility", "visible");
			$.get(
				'../newlink.php',
				{old_link: $("#old_link").val(), desired_link: $("#desired_link").val()},
				function(data) {
					if (data != 'error') {
						$("#new_link").html('http://shortlink.com/' + data);
						$("#new_link").css("display", "block");
						$("#error").css("display", "none");
						$("#new_link").attr("href", data);
						$("#load-image").css("visibility", "hidden");
					} else {
						$("#new_link").css("display", "none");
						$("#error").css("display", "block");
						$("#load-image").css("visibility", "hidden");
					}
				}
			);
			event.preventDefault();
		});
});