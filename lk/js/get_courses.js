document.addEventListener("DOMContentLoaded", function() {	
	showCourses();
	
	var course, organisation;
	
	document.getElementsByName("course_select")[0].addEventListener("change", function() {
		course=this.value;
		showCourses(course, organisation);
	});
	
	document.getElementsByName("organisation_select")[0].addEventListener("change", function() {
		organisation=this.value;
		showCourses(course, organisation);
	});
	
	function showCourses(course=0, organisation=0) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var tbody = document.querySelector('.table tbody');
				tbody.innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "ajax/get_courses.php?course="+course+"&organisation="+organisation, true);
		xmlhttp.send();
	}
});

