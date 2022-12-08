function getUser(form)
{
    $.post('getUser.php', {
            login: form.login.value,
            password: form.password.value,
            signin: form.signin.value
            },
            function (data) {
                if (data.status) {
                    window.location.href = 'hello.php';
                } else {
                    let auth = document.querySelector('form');
                    let newElem = document.createElement('div');
                    newElem.innerHTML = "Your login or password are not right!";
                    auth.appendChild(newElem);
                }
    }, 'json');
}