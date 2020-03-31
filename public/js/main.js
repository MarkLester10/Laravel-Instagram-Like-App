$("#deleteModal").on("show.bs.modal", function(event) {
    var button = $(event.relatedTarget);
    var postid = button.data("id");
    var modal = $(this);
    $(e.currentTarget)
        .find("input[name='posId']")
        .val(postid);
});
