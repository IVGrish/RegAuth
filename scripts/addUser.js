function addUser(form)
{
    let elems = document.querySelectorAll('span');
    let iterator = false;
    elems.forEach(function(elem) {
        if (elem.classList.contains("taken")) {
            iterator = true;
        }
    });
    if (!iterator) {
        $.post('ajax-php/addUser.php', {
                login: form.login.value,
                password: form.password.value,
                pass: form.password.value,
                confirm_password: form.confirm_password.value,
                email: form.email.value,
                name: form.name.value,
                signup: form.signup.value
            },
            function () {
                window.location.href = 'hello.php';
            });
    } else {
        let auth = document.querySelector('form');
        let newElem = document.createElement('div');
        newElem.innerHTML = "Please correct the mistakes";
        auth.appendChild(newElem);
    }
}