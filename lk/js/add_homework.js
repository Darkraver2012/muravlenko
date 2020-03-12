document.addEventListener("DOMContentLoaded", function() {
    document.forms.add_homework_form.elements.add_homework_submit.addEventListener("click", add_homework.bind(add_homework_form));
});

function add_homework() {
    var formData = new FormData(this);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var alert_danger = document.querySelector(".alert-danger");
            var alert_success = document.querySelector(".alert-success");
            alert_danger.classList.remove("alert-show");
            alert_success.classList.remove("alert-show");
            console.log(this.responseText);
            switch (this.responseText) {
                case "Заполните все поля!":
                    alert_danger.classList.add("alert-show");
                    alert_danger.innerHTML = "Заполните все поля!";
                    break;
                case "1":
                    alert_success.classList.add("alert-show");
                    break;
                default:
                    alert_danger.classList.add("alert-show");
                    alert_danger.innerHTML = "При добавлении задания произошла ошибка!";
            }
        }
    };
    xmlhttp.open("POST", "ajax/add_homework.php", true);
    xmlhttp.send(formData);
}