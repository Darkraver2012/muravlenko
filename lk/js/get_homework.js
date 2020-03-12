document.addEventListener("DOMContentLoaded", function() {	
	showHomework();
	
	function showHomework() {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var tbody = document.querySelector('.table-wrapper');
				tbody.innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "ajax/get_homework.php", true);
		xmlhttp.send();
	}
});