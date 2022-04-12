/* Функция для открытия и закрытия блока с формой на сайте Jquery */
$('.btn').click(function(){
    $(".box-form").fadeToggle(100);
  }); 

  /* Отправка письма на почту AJAX */
$("#sendMail").on("click", function () {
    var email = $("#email").val().trim();
    var name = $("#name").val().trim();
    var message = $("#message").val().trim();

    if (email == "") {
        $("#errorMess").text("Вы не ввели Email");
        return false;
    } else if (name == "") {
        $("#errorMess").text("Вы не ввели Имя")
        return false;
    } else if (message.length < 10) {
        $("#errorMess").text("Введите сообщение не менее 10 символов")
        return false;
    }

    $("#errorMess").text("");

    $.post(
        'php/mail.php', {
            'email': email,
            'name': name,
            'phone': phone,
            'message': message
        },
        function (data) {
            if (!data)
                alert("Проверьте форму, сообщение не отправлено!");
            else
                alert(data);
            //$("#sendMail").prop("disabled", true);
            $("#mailForm").trigger("reset");
        },
    );
});
