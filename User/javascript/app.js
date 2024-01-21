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

  $(".btnCloseModal").click(function (e) {
    e.preventDefault();
    closeModal();
  });

  // News
  $(".btnChangeImage").click(function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    var id = $(this).data("id");
    $("." + id).attr("src", url);
  });
  // End of News

  // Tourist Spot
  $(".btnSpotContainer").click(function (e) {
    e.preventDefault();
    $("#ts-modal-sm-img-container").empty();

    $("#ts-modal-spot-name").val($(this).data("name"));
    $("#ts-modal-spot-type").val($(this).data("type"));
    $("#ts-modal-spot-fee").val($(this).data("fee"));
    $("#ts-modal-spot-description").val($(this).data("description"));
    $("#ts-modal-spot-address").val($(this).data("address"));
    $("#ts-modal-map-preview-container").html($(this).data("map"));
    $("#btnTsRate").data("id", $(this).data("id"));
    $("#btnTsRate").data("name", $(this).data("name"));

    $.ajax({
      type: "GET",
      url: "../backend/Controller/get.php",
      data: {
        SubmitType: "GetSpotsImages",
        id: $(this).data("id"),
      },
      success: function (response) {
        var images = JSON.parse(response);
        console.log(images);
        $("#ts-modal-lg-img").attr(
          "src",
          "../backend/SMEsImg/" + images[0].file_name
        );
        images.forEach((img) => {
          var btn = $(
            "<button class='btn ts-modal-change-img' data-id='" +
              img.smes_id +
              "' data-img='" +
              img.file_name +
              "'>"
          );
          var imghtml = $(
            "<img src='../backend/SMEsImg/" + img.file_name + "'>"
          );

          $(btn).append(imghtml);
          $("#ts-modal-sm-img-container").append(btn);
          console.log(img.file_name);
        });
      },
    });

    $("#viewSpotModal").modal("show");
  });

  $(document).on("click", ".ts-modal-change-img", function (e) {
    e.preventDefault();
    console.log($(this).data("id"));
    console.log($(this).data("img"));
    $("#ts-modal-lg-img").attr(
      "src",
      "../backend/SMEsImg/" + $(this).data("img")
    );
  });

  $("#btnTsRate").click(function (e) {
    e.preventDefault();
    closeModal();

    $("#ts-frm-Id").val($(this).data("id"));
    $("#tsReviewName").text($(this).data("name"));
    $("#rateTsModal").modal("show");
  });

  $(".btnTsFrmStar").click(function () {
    var clickedId = $(this).data("id");
    $(".btnTsFrmStar").removeClass("active"); // Remove active class from all buttons
    $(".btnTsFrmStar:lt(" + clickedId + ")").addClass("active"); // Add active class to buttons up to the clicked one
    $("#tsfrmStar").val(clickedId);
  });

  $("#tsFrmRate").submit(function (e) {
    e.preventDefault();
    var id = $("#ts-frm-Id").val();
    var star = $("#tsfrmStar").val();
    var review = $("#tsFrmModalReview").val();

    $.ajax({
      type: "POST",
      url: "../backend/Controller/post.php",
      data: {
        SubmitType: "Rate",
        id: id,
        star: star,
        review: review,
      },
      success: function (response) {
        closeModal();
        console.log(response);
        if (response == "200") {
          showAlert("alert-success", "Thanks for rating!");
          setTimeout(() => {
            window.location.reload();
          }, 1000);
        } else {
          showAlert("alert-danger", "Failed to rate");
        }
      },
    });
  });
  // End of Spot

  // Accom

  $(".btnAccomContainer").click(function (e) {
    e.preventDefault();
    $("#accom-modal-sm-img-container").empty();

    $("#accom-modal-accom-name").val($(this).data("name"));
    $("#accom-modal-accom-description").val($(this).data("description"));
    $("#accom-modal-email").val($(this).data("email"));
    $("#accom-modal-contact-no").val($(this).data("number"));
    $("#accom-modal-fb").val($(this).data("fb"));
    $("#accom-modal-ig").val($(this).data("ig"));
    $("#accom-modal-accom-address").val($(this).data("address"));
    $("#accom-modal-map-preview-container").html($(this).data("map"));

    $("#btnTsRate").data("id", $(this).data("id"));
    $("#btnTsRate").data("name", $(this).data("name"));

    $.ajax({
      type: "GET",
      url: "../backend/Controller/get.php",
      data: {
        SubmitType: "GetSpotsImages",
        id: $(this).data("id"),
      },
      success: function (response) {
        var images = JSON.parse(response);
        console.log(images);
        $("#accom-modal-lg-img").attr(
          "src",
          "../backend/SMEsImg/" + images[0].file_name
        );
        images.forEach((img) => {
          var btn = $(
            "<button class='btn accom-modal-change-img' data-id='" +
              img.smes_id +
              "' data-img='" +
              img.file_name +
              "'>"
          );
          var imghtml = $(
            "<img src='../backend/SMEsImg/" + img.file_name + "'>"
          );

          $(btn).append(imghtml);
          $("#accom-modal-sm-img-container").append(btn);
          console.log(img.file_name);
        });
      },
    });

    $("#viewAccommodationModal").modal("show");
  });

  $(document).on("click", ".accom-modal-change-img", function (e) {
    e.preventDefault();
    $("#accom-modal-lg-img").attr(
      "src",
      "../backend/SMEsImg/" + $(this).data("img")
    );
  });
  // End of Accom
});
