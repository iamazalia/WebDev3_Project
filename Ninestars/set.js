<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  $(document).ready(function() {
    $(".cancel-button").click(function(e) {
      e.preventDefault();
      var activityId = $(this).data("activity-id");
      var button = $(this);

      $.ajax({
        url: "set.php", // Replace with the actual PHP file that handles the AJAX request
        type: "POST",
        data: {
          activityId: activityId,
          action: "cancel"
        },
        success: function(response) {
          alert(response);
          button.text("Cancelled");
          button.removeClass("cancel-button"); // Remove the cancel-button class
          button.addClass("disabled-button"); // Add a disabled-button class
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });

    $(".done-button").click(function(e) {
      e.preventDefault();
      var activityId = $(this).data("activity-id");
      var button = $(this);

      $.ajax({
        url: "set.php", // Replace with the actual PHP file that handles the AJAX request
        type: "POST",
        data: {
          activityId: activityId,
          action: "done"
        },
        success: function(response) {
          alert(response);
          button.text("Done");
          button.removeClass("done-button"); // Remove the done-button class
          button.addClass("disabled-button"); // Add a disabled-button class
        },
        error: function(xhr, status, error) {
          console.log(error);
        }
      });
    });
  });