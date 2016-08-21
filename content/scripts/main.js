


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


function deleteAlbum(albumid) {
    if (confirm("Are you sure you want to delete this album?")) {

        var data = {};

        data['albumid'] = albumid;

        $.ajax({
            type: "POST",
            url: "/gallery/album/delete",
            data: data,
            dataType: "json",
            success: function (data) {
                $("#album" + data).remove();
            },
            error: function (data) {
                console.log(data);
            }
        });

    }
}

$(document).ready(function(){
    $(".color_box").colorbox({rel:'.color_box'});
});

function openPopup(photo_id, photo_path) {

    //$.colorbox({html:"<img src='" + photo_path + "'/>",
    //            width: 800,
    //            heigh: 800
    //});


}