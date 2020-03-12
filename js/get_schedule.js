document.addEventListener("DOMContentLoaded", function() {
	getSchedule();
	
	document.querySelector(".form-control").addEventListener("change", function() {
		getSchedule(this.value);
	});
	
	function getSchedule(value=1) {
		var url = new URL(window.location.href);
		var get_id = url.searchParams.get("id");

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.querySelector(".card-deck").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "ajax/get_schedule.php?id=" + get_id + "&value=" + value, true);
		xmlhttp.send();	
	}
});