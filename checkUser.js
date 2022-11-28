function checkUser(user)
{
    if (user.value === '') {
        $('#used-login').html('&nbsp;');
        $('#used-pass').html('&nbsp;');
        $('#used-conf-pass').html('&nbsp;');
        $('#used-email').html('&nbsp;');
        $('#used-name').html('&nbsp;');
        return;
    }
    if (user.name === "login") {
        $.post('checkUser.php', {login: user.value},
            function (data)
            {
                $('#used-login').html(data);
            });
    } else if (user.name === "password") {
        $.post('checkUser.php', {password: user.value},
            function (data)
            {
                $('#used-pass').html(data);
            });
    } else if (user.name === "confirm_password") {
            $.post('checkUser.php', {confirm_password: user.value,
                                     pass: document.getElementById("pass").value},
                function (data)
                {
                    $('#used-conf-pass').html(data);
                });

    } else if (user.name === "email") {
            $.post('checkUser.php', {email: user.value},
                function (data)
                {
                    $('#used-email').html(data);
                });

    } else if (user.name === "name") {
            $.post('checkUser.php', {name: user.value},
                function (data)
                {
                    $('#used-name').html(data);
                });
    }
}