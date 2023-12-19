$(document).ready(function() {
    $('.modalTrigger').click(function(e) {
      e.preventDefault();
      var modalId = $(this).data('modal-id');
      var modalWrapper = $('.modal-wrapper[data-modal-id="' + modalId + '"]');
  
      modalWrapper.find('.modal').show();
      $('main').addClass('modal-open');
  
      modalWrapper.find('.close').click(function() {
        modalWrapper.find('.modal, .second-modal, .third-modal').hide();
        $('main').removeClass('modal-open');
      });
  
      modalWrapper.find('.open-second-modal').click(function() {
        modalWrapper.find('.modal').hide();
        modalWrapper.find('.second-modal').show();
        $('main').addClass('modal-open');
      });
  
      modalWrapper.find('.open-third-modal').click(function() {
        modalWrapper.find('.second-modal').hide();
        modalWrapper.find('.third-modal').show();
        $('main').addClass('modal-open');
      });
  
      modalWrapper.find('.third-modal .close').click(function() {
        modalWrapper.find('.third-modal').hide();
        $('main').removeClass('modal-open');
      });
  
      $(document).mouseup(function(event) {
        if (!modalWrapper.is(event.target) && modalWrapper.has(event.target).length === 0) {
          modalWrapper.find('.modal, .second-modal, .third-modal').hide();
          $('main').removeClass('modal-open');
        }
      });
    });
  });
  