


function deleteMultiple(photoid) {
    if (confirm("Are you sure you want to delete all selected photos?")) {

        var data = {};
        data["albumid"] = $("#album-photos").attr("data-albumid");

        var ids = [];

        if (photoid == undefined) {
            $(".delete_checkbox").each(function () {
                if ($(this).is(":checked")) {
                    ids.push($(this).attr("data-photoid"));
                }

            });
        } else {
            ids.push(photoid);
        }
        data["photoid"] = ids;

        $.ajax({
            type: "POST",
            url: "/gallery/album/deletePhotoMultiple",
            data: data,
            dataType: "json",
            success: function (data) {

                for (var key in data){
                    $("#photo" + data[key]).remove();
                }

            },
            error: function (data) {
                console.log(data);
            }
        });
    }
}
