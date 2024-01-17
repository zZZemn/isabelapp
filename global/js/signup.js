$(document).ready(function () {
  $("#frmSMEsAccomSignUp").submit(function (e) {
    e.preventDefault();
    var name = $("#accomName").val();
    var address = $("#accomAddress").val();
    var username = $("#accomUsername").val();
    var password = $("#accomPassword").val();

    console.log(name);
    console.log(address);
    console.log(username);
    console.log(password);
    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: {
        SubmitType: "AccomSignUp",
        name: name,
        address: address,
        username: username,
        password: password,
      },
      success: function (response) {
        console.log(response);
      },
    });
  });
});
