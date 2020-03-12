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
				var delete_buttons = document.querySelectorAll('table .btn-danger');
				for(var i = 0; i < delete_buttons.length; i++) {
					delete_buttons[i].addEventListener("click", deleteHomework);
				}
            }
        };
        xmlhttp.open("GET", "ajax/get_homework_teacher.php", true);
        xmlhttp.send();
    }
	
	function deleteHomework() {
		var articul = this.getAttribute("data");

		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				showHomework();
			}
		};
		xmlhttp.open("GET", "ajax/delete_homework.php?id=" + articul, true);
		xmlhttp.send();
	}
});