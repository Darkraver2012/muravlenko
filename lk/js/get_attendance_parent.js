document.addEventListener("DOMContentLoaded", function() {
    console.log("Works");
    showAttendance();

    function showAttendance() {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var tbody = document.querySelector('.table-wrapper');
                tbody.innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajax/get_attendance_parent.php", true);
        xmlhttp.send();
    }
});