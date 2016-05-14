$(function() {
    var elems = document.querySelectorAll('.switchery');

    for (var i = 0; i < elems.length; i++) {
      var switchery = new Switchery(elems[i]);
    }

    $('.elastic').autosize();

    $('.tags-input').tagsinput();
}
);
