$(function() {

    function imageDelete(id) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                var item = document.getElementById("photo" + id);
                item.parentNode.removeChild( item );
            }
        };
        xhttp.open("GET", "delete.php?photo_id=" + id + "&album_id=", true);
        xhttp.send();
    }

})
