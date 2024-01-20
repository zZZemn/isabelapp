$(document).ready(function () {
  const showAlert = (alertType, text) => {
    $(".alert").addClass(alertType).text(text);
    setTimeout(() => {
      $(".alert").removeClass(alertType).text("");
    }, 1000);
  };

  // Modal
  const closeModal = () => {
    $(".modal").modal("hide");
  };

  $(".btnCloseModal").click(function (e) {
    e.preventDefault();
    closeModal();
  });
  // End Of Modal

  const screenSize = () => {
    var currentWidth = $(window).width();

    if (currentWidth > 800) {
      $(".side-nav").addClass("side-nav-open");
      $(".side-nav").removeClass("side-nav-close");
    } else {
      $(".side-nav").addClass("side-nav-close");
      $(".side-nav").removeClass("side-nav-open");
    }
  };

  var isManageClose = true;
  $("#btnManage").click(function (e) {
    e.preventDefault();
    if (isManageClose) {
      $(".ul-manage").show();
    } else {
      $(".ul-manage").hide();
    }

    isManageClose = !isManageClose;
  });

  $("#btnOpenNav").click(function (e) {
    e.preventDefault();
    console.log("asd");
    $(".side-nav").addClass("side-nav-open");
    $(".side-nav").removeClass("side-nav-close");
  });

  $("#btnCloseNav").click(function (e) {
    e.preventDefault();
    $(".side-nav").addClass("side-nav-close");
    $(".side-nav").removeClass("side-nav-open");
  });

  $(window).resize(function () {
    screenSize();
  });

  // Contact
  $("#btnAddNewContact").click(function (e) {
    e.preventDefault();
    $("#contactAddContact").modal("show");
  });

  $("#contactFrmAddContact").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: formData,
      success: function (response) {
        closeModal();
        if (response == "200") {
          showAlert("alert-success", "Contact Added!");
          window.location.reload();
        } else {
          showAlert("alert-danger", "Failed to add a contact.");
        }
      },
    });
  });

  $(".btnDeleteContact").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: {
        SubmitType: "DeleteContact",
        id: id,
      },
      success: function (response) {
        if (response == "200") {
          showAlert("alert-success", "Contact Deleted!");
          window.location.reload();
        } else {
          showAlert("alert-danger", "Failed to delete a contact.");
        }
      },
    });
  });

  $(".btnEditContact").click(function (e) {
    e.preventDefault();
    $("#contactEditContact").modal("show");
    $("#editHotlineId").val($(this).data("id"));
    $("#EditContactName").val($(this).data("name"));
    $("#EditContactNo").val($(this).data("number"));
  });

  $("#contactFrmEditContact").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: formData,
      success: function (response) {
        closeModal();
        if (response == "200") {
          showAlert("alert-success", "Contact Edited!");
          window.location.reload();
        } else {
          showAlert("alert-danger", "Failed to edit a contact.");
        }
      },
    });
  });
  // End of Contact

  // News
  $(".btnDeleteNews").click(function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: {
        SubmitType: "DeleteNews",
        id: id,
      },
      success: function (response) {
        if (response == "200") {
          showAlert("alert-success", "News Deleted!");
          window.location.reload();
        } else {
          showAlert("alert-danger", "Failed to delete a news.");
        }
      },
    });
  });

  $("#btnAddNews").click(function (e) {
    e.preventDefault();
    $("#newsAddNewsModal").modal("show");
  });

  $("#newsFrmAddNews").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: formData,
      success: function (response) {
        closeModal();
        if (response == "200") {
          showAlert("alert-success", "News Added!");
          window.location.reload();
        } else {
          showAlert("alert-danger", "Failed to add a news.");
        }
      },
    });
  });

  $(".btnEditNews").click(function (e) {
    e.preventDefault();
    $("#newsId").val($(this).data("id"));
    $("#EditNewsName").val($(this).data("name"));
    $("#EditNewsDescription").val($(this).data("description"));
    $("#EditNewsAddress").val($(this).data("address"));
    $("#EditNewsMap").val($("#" + $(this).data("id")).val());
    $("#EditNewsDate").val($(this).data("date"));
    $("#EditNewsTime").val($(this).data("time"));

    $("#MapPrev").html($("#" + $(this).data("id")).val());

    $("#newsEditNewsModal").modal("show");
  });

  $("#newsFrmEditNews").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: formData,
      success: function (response) {
        closeModal();
        if (response == "200") {
          showAlert("alert-success", "News Edited!");
          window.location.reload();
        } else {
          showAlert("alert-danger", "Failed to edit a news.");
        }
      },
    });
  });

  // End of News

  screenSize();
});
