document.addEventListener("DOMContentLoaded", function() {	
	var dataset;
	document.getElementById("print_report").addEventListener("click", function() {
		var arg = document.getElementsByName("organisation_select")[0];
		dataset = this.dataset;
		dataset.arg = arg.value;
		console.log(dataset);
		var url = buildURL("../E-Zanyatost-Back/CSV/export_py_csv.php", dataset);
		printReport(url);
	});
	
	function printReport(url) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var response = this.responseText;
				console.log(response);
				window.location.replace("../E-Zanyatost-Back/CSV/"+dataset.report);
			}
		};
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}

	function buildURL(page, params) {
		url = page + "?";
		for (let key in params) {
			url = url + key + "=" + params[key] + "&";
		}
		url = url.substring(0, url.length - 1);
		return url;		
	}
});

