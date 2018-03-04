// Generated by CoffeeScript 1.12.4
//========================== SVG AJAX LOADER =====================================================;
(function($) {
  var init;
  init = function() {

    /*LOADER MODAL FOR TEAM MEMBERS, SHOWCASE, PORTFOLIO AND BLOG SECTIONS */
    var $loaderModal, ajaxLoadedScripts, loader, loaderLauncher, loaderModal, toggleProgressIndicator;
    toggleProgressIndicator = function() {
      return $('.progress_ball').toggleClass('show');
    };
    loader = new SVGLoader(document.getElementById('loader'), {
      speedIn: 150,
      easingIn: mina.easeinout,
      onEnd: toggleProgressIndicator
    });
    loaderModal = document.querySelector('.loader-modal');
    $loaderModal = $(loaderModal);
    $loaderModal.on('click', '.close-handle', function(e) {
      $loaderModal.scrollTop(0);
      $loaderModal.fadeOut(500, function() {
        return $loaderModal.attr('class', 'loader-modal');
      });
      loader.hide();
      $('body').removeClass('modal-open');
      return $(document.head).find("script[data-ple_owl]").each(function(idx, el) {
        return el.parentNode.removeChild(el);
      });
    });
    ajaxLoadedScripts = [];
    loaderLauncher = function(options) {
      var className, content, inject;
      content = options.content;
      className = options.className;
      inject = options.inject;
      loader.show();
      setTimeout((function() {
        if (className !== 'undefined') {
          $loaderModal.addClass(className);
        }
        $loaderModal.html('').append($('<span class=\'close-handle\' />'));
        return (function(content, inject) {
          return $.ajax({
            url: content,
            error: function(data) {
              return $loaderModal.append(themeConfig.ajaxErrorMessage.open + content + themeConfig.ajaxErrorMessage.close).fadeIn(500, function() {
                loader.hide();
                return toggleProgressIndicator();
              });
            },
            success: function(data) {
              var $data, $head_panel, $main, colorSet, injectable, window_height;
              $data = $(data);
              window_height = $(window).height();
              $head_panel = $data.find('.head_panel');
              $main = $data.find('.main');
              colorSet = $main.find('[data-colorset]').data('colorset') || '';
              injectable = $main.addClass('ajaxed ' + colorSet).css('min-height', window_height);
              $('body').addClass('modal-open');
              return $loaderModal.append($head_panel).append(injectable).fadeIn(250, function() {
                $("<div>").html(data).find("script[data-ple_owl]").each(function() {
                  var $owlSlider, $script;
                  $script = $(this);
                  $owlSlider = $($script.data('ple_owl'));
                  $owlSlider.css({
                    visibility: "hidden",
                    transition: "all 700ms ease"
                  });
                  ajaxLoadedScripts.push($script);
                  $(document.head).append($script);
                  return $owlSlider.css({
                    visibility: "visible"
                  });
                });
                toggleProgressIndicator();
                return (function(selector) {
                  if (!(document.body.style['webkitPerspective'] !== void 0 || document.body.style['MozPerspective'] !== void 0)) {
                    return;
                  }
                })();
              });
            }
          });
        })(content, inject);
      }), 250);
    };
    return $('.linkify').on('click', function(e) {
      var content;
      e.preventDefault();
      _p.debugLog('Class \'ajax-call\' detected.');
      content = e.currentTarget.href;
      return loaderLauncher({
        content: content,
        className: 'loader-modal-content'
      });
    });
  };
  return document.getElementById('loader') && document.querySelector('.loader-modal') && init();
})(jQuery);

//END------------------------------------------------------------------------------ SVG AJAX LOADER;
