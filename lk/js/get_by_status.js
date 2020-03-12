document.addEventListener("DOMContentLoaded", function() {	
	showByStatus();
	
	var organisation;

	document.getElementsByName("organisation_select")[0].addEventListener("change", function() {
		organisation=this.value;
		showByStatus(organisation);
	});
	
	function showByStatus(organisation=0) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var tbody = document.querySelector('.table tbody');
				tbody.innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "ajax/get_by_status.php?organisation="+organisation, true);
		xmlhttp.send();
	}
});