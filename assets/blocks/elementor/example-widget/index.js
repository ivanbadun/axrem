import $ from 'jquery';

$(() => {
  $(document).on('click', '.menu-icon', (e) => {
    e.preventDefault();

    const targetId = $(e.currentTarget).attr('data-toggle');
    const $menu = $('#' + targetId);

    if ($menu.length) {
      $menu.toggleClass('is-open');
    }
  });
});
