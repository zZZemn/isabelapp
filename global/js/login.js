$(document).ready(function () {
  var isPasswordShow = false;
  $("#btnShowPassword").click(function (e) {
    e.preventDefault();
    if (isPasswordShow) {
      $(".input-password").attr("type", "password");
      $(".show-password-icon").removeClass("bi-eye-fill");
      $(".show-password-icon").addClass("bi-eye-slash-fill");
    } else {
      $(".input-password").attr("type", "text");
      $(".show-password-icon").removeClass("bi-eye-slash-fill");
      $(".show-password-icon").addClass("bi-eye-fill");
    }

    isPasswordShow = !isPasswordShow;
  });

  $("#frmAdminLogin").submit(function (e) {
    e.preventDefault();
    var username = $("#adminUsername").val();
    var password = $("#adminPassword").val();

    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: {
        SubmitType: "Login",
        UserType: "Admin",
        username: username,
        password: password,
      },
      success: function (response) {
        console.log(response);
      },
    });
  });
});
