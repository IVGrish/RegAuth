function getUser(form)
{
    $.post('getUser.php', {login: form.login.value,
                           password: form.password.value,
                           confirm_password: form.confirm_password.value,
                           email: form.email.value,
                           name: form.name.value,
                           signup: form.signup.value},
        function ()
        {
            window.location.href = 'hello.php';
        }
}