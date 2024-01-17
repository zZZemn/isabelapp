$(document).ready(function () {
  const showAlert = (alertType, text) => {
    $(".alert").addClass(alertType).text(text);
    setTimeout(() => {
      $(".alert").removeClass(alertType).text("");
    }, 1000);
  };

  const closeModal = () => {
    $(".modal").modal("hide");
  };

  $("#btnEditDetails").click(function (e) {
    e.preventDefault();
    $("#EditDetailsModal").modal("show");
  });

  $(".btnCloseModal").click(function (e) {
    e.preventDefault();
    closeModal();
  });

  $("#frmEditDetails").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../../../backend/Controller/post.php",
      data: formData,
      success: function (response) {
        closeModal();
        if (response == "200") {
          showAlert("alert-success", "Editing Success!");
          setTimeout(() => {
            window.location.reload();
          }, 1000);
        } else {
          showAlert("alert-danger", "Editing Failed!");
        }
      },
    });
  });
});
