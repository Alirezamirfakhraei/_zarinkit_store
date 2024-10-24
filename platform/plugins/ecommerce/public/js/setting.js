/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************************************!*\
  !*** ./platform/plugins/ecommerce/resources/assets/js/setting.js ***!
  \*******************************************************************/
$(document).ready(function () {
  $(document).on('keyup', '#store_order_prefix', function (event) {
    if ($(event.currentTarget).val()) {
      $('.sample-order-code-prefix').text($(event.currentTarget).val() + '-');
    } else {
      $('.sample-order-code-prefix').text('');
    }
  });
  $(document).on('keyup', '#store_order_suffix', function (event) {
    if ($(event.currentTarget).val()) {
      $('.sample-order-code-suffix').text('-' + $(event.currentTarget).val());
    } else {
      $('.sample-order-code-suffix').text('');
    }
  });
  $(document).on('change', '.check-all', function (event) {
    var _self = $(event.currentTarget);
    var set = _self.attr('data-set');
    var checked = _self.prop('checked');
    $(set).each(function (index, el) {
      if (checked) {
        $(el).prop('checked', true);
      } else {
        $(el).prop('checked', false);
      }
    });
  });
  $('.trigger-input-option').on('change', function () {
    var $settingContentContainer = $($(this).data('setting-container'));
    if ($(this).val() == '1') {
      $settingContentContainer.removeClass('d-none');
    } else {
      $settingContentContainer.addClass('d-none');
    }
  });
});
/******/ })()
;