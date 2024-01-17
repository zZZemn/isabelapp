$(document).ready(function () {
  $("#frmSMEsSignUp").submit(function (e) {
    e.preventDefault();
    var name = $("#smesName").val();
    var address = $("#smesAddress").val();
    var username = $("#smesUsername").val();
    var password = $("#smesPassword").val();
    var smesType = $("#smesType").val();

    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: {
        SubmitType: "SMEsSignUp",
        smesType: smesType,
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
