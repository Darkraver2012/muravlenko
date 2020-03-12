document.addEventListener("DOMContentLoaded", function() {
	var selectSchool = document.getElementsByName("organisation_select")[0];
	var startDate = document.getElementsByName("start_date")[0];
	var finishDate = document.getElementsByName("finish_date")[0];
	
	var today = new Date();
	var todayStr = today.toISOString().substr(0, 10);
	startDate.value = todayStr;
	finishDate.value = todayStr;
	
	var organisation, start, finish;
	showEvents();
	
	selectSchool.addEventListener("change", function() {
		organisation=this.value;
		showEvents(organisation, start, finish);		
	});	

	startDate.addEventListener("change", function() {
		start=this.value;
		showEvents(organisation, start, finish);		
	});	

	finishDate.addEventListener("change", function() {
		finish=this.value;
		showEvents(organisation, start, finish);		
	});	

	function showEvents(organisation=0, start=todayStr, finish=todayStr) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				console.log(this.responseText);
				var tbody = document.querySelector('.table tbody');
				tbody.innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "ajax/get_events.php?organisation=" + organisation + "&start=" + start + "&finish=" + finish, true);
		xmlhttp.send();
	}		
});