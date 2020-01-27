(function($) {
  "use strict"; // Start of use strict


  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  $('.table').on('click', 'tbody .edit', function() {
    var id = $(this).closest('tr').data("id");
    $.ajax({
      url: "php/getChildById.php",
      method: "POST",
      data: {
        id: id
      },
      success: function(result) {
        console.log(result);
        var data = JSON.parse(result);

        $('#editStudentModal').find($("#edit-surname").val(data.surname));
        $('#editStudentModal').find($("#edit-lastname").val(data.lastname));
        $('#editStudentModal').find($("#edit-username").val(data.username));
        $('#editStudentModal').find($("#edit-password").val(data.password));
        $('#editStudentModal').find($("#edit-level").val(data.level));
        $('#editStudentModal').find($("#edit-id").val(data.id));
      }
    });

  });

  $('.table').on('click', 'tbody .remove', function() {
    var id = $(this).closest('tr').data("id");
    $('#removeStudentComfirm').data("id", id);
  });

  $('#removeStudentComfirm').click(function() {
    var id = $(this).data("id");
    console.log(id);
    $.ajax({
      url: "php/removeStudentById.php",
      method: "POST",
      data: {
        id: id
      },
      success: function(result) {
        console.log(result);
        location.reload();
      }
    });
  });

})(jQuery); // End of use strict