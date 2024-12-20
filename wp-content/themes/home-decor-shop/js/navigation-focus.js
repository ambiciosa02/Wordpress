var home_decor_shop_keyboard_navigation_loop = function (elem) {
  var home_decor_shop_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var home_decor_shop_firstTabbable = home_decor_shop_tabbable.first();
  var home_decor_shop_lastTabbable = home_decor_shop_tabbable.last();
  home_decor_shop_firstTabbable.focus();

  home_decor_shop_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      home_decor_shop_firstTabbable.focus();
    }
  });

  home_decor_shop_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      home_decor_shop_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};