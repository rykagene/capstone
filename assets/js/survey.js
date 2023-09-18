$(document).ready(function() {
    // Function to handle clicking on a star
    $(".star").click(function() {
      // Get the index of the clicked star
      var starIndex = $(this).index();
      
      // Set the hidden input field with the selected rating
      $('input[name="rating"]').val(starIndex + 1);
      
      // Highlight the selected stars
      $(".star").removeClass("selected");
      $(".star:lt(" + (starIndex + 1) + ")").addClass("selected");
    });
  
    // Function to handle the form submission
    $("form").submit(function(event) {
      event.preventDefault();
  
      // Retrieve the selected rating and opinion
      var rating = $('input[name="rating"]').val();
      var opinion = $('textarea[name="opinion"]').val();
  
      // TODO: Handle the form submission (e.g., send the data to the server)
  
      // For now, let's log the rating and opinion
      console.log("Rating:", rating);
      console.log("Opinion:", opinion);
  
      // Redirect to survey.php
      window.location.href = "survey.php";
    });
  });
  