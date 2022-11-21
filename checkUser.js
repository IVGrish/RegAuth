function checkUser(user)
{
    if (user.value == '') {
        $('#used-login').html('&nbsp;');
        $('#used-pass').html('&nbsp;');
        $('#used-conf-pass').html('&nbsp;');
        $('#used-email').html('&nbsp;');
        $('#used-name').html('&nbsp;');
        return;
    }
    $.post('checkUser.php', {login: user.value},
           function (data)
           {
               if (user.name == "login") {
                   $('#used-login').html(data);
               } else if (user.name == "password") {
                   $('#used-pass').html(data);
               } else if (user.name == "confirm_password") {
                   $('#used-conf-pass').html(data);
               } else if (user.name == "email") {
                   $('#used-email').html(data);
               } else if (user.name == "name") {
                   $('#used-name').html(data);
               }
           });
}