document.addEventListener("DOMContentLoaded", function() {
	var selectSchool = document.getElementsByName("organisation_select")[0];
	var selectClass = document.getElementsByName("class_select")[0];
	var selectStudent = document.getElementsByName("student_select")[0];
	
	showSchoolSelect();

	selectSchool.addEventListener("change", function() {
		showClassSelect(this.value);
		
		selectStudent.options.length = 0;
		var option = document.createElement("option");
		option.disabled = "disabled";
		option.selected = "selected";
		option.text = "Обучающийся";
		selectStudent.appendChild(option);
	});	
	
	selectClass.addEventListener("change", function() {
		showStudentSelect(this.value);
	});	
	
	selectStudent.addEventListener("change", function() {
		showReport(this.value);
	});	
	
	function showSchoolSelect() {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var schools = JSON.parse(this.responseText);
				console.log(schools);
				for (var i = 0; i < schools[0].length; i++) {
					var option = document.createElement("option");
					option.value = schools[1][i];
					option.text = schools[0][i];
					selectSchool.appendChild(option);
				}
			}
		};
		xmlhttp.open("GET", "ajax/get_school_array.php", true);
		xmlhttp.send();
	}
	
	function showClassSelect(organisation) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var classNames = JSON.parse(this.responseText);
				classNames.sort();
				selectClass.options.length = 0;
				var option = document.createElement("option");
				option.disabled = "disabled";
				option.selected = "selected";
				option.text = "Класс";
				selectClass.appendChild(option);
				for (var i = 0; i < classNames.length; i++) {
					var option = document.createElement("option");
					option.value = classNames[i];
					option.text = classNames[i];
					selectClass.appendChild(option);
				}
			}
		};
		xmlhttp.open("GET", "ajax/get_class_array.php?organisation="+organisation, true);
		xmlhttp.send();
	}
	
	
	function showStudentSelect(className) {
		console.log(className);
		var numeral = className.substr(0, className.length-1);
		var letter = className.substr(className.length - 1);
		console.log(numeral, letter);
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				console.log(this.responseText);
				var students = JSON.parse(this.responseText);
				selectStudent.options.length = 0;
				var option = document.createElement("option");
				option.disabled = "disabled";
				option.selected = "selected";
				option.text = "Обучающийся";
				selectStudent.appendChild(option);
				for (var i = 0; i < students[0].length; i++) {
					var option = document.createElement("option");
					option.value = students[1][i];
					option.text = students[0][i];
					selectStudent.appendChild(option);
				}				
			}
		};
		xmlhttp.open("GET", "ajax/get_student_array.php?organisation="+selectSchool.value+"&numeral="+numeral+"&letter="+letter, true);
		xmlhttp.send();
	}
	
	function showReport(student) {
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var tbody = document.querySelector('.table-wrapper');
				tbody.innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "ajax/get_by_student.php?student="+student, true);
		xmlhttp.send();
	}	
	
});