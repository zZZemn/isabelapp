$(document).ready(function () {
  // News
  $(".btnChangeImage").click(function (e) {
    e.preventDefault();
    var url = $(this).data("url");
    var id = $(this).data("id");
    $("." + id).attr("src", url);
  });
  // End of News
});
