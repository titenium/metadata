$(document).ajaxSend(function () {
    $("#overlay").fadeIn(300);
});

$(document).on('click', '#btn1', function () {
    console.log('click');
    $.ajax({
        url: 'https://cors-anywhere.herokuapp.com/' + $('#getData').val()
    }).then(function (data) {
        var html = $(data);
        console.log(html);
        $('#kw').html(getMetaContent(html, 'keywords') || 'no keywords found');
        $('#des').html(getMetaContent(html, 'description') || 'no description found');
        $('#title').html(getMetaContent(html, 'title') || 'no title found');
        $('#viewport').html(getMetaContent(html, 'viewport') || 'no viewport found');
        $('#img').html(html.find('img').attr('src') || 'no image found');
        $('#metaTable').show();
    }).done(function () {
        setTimeout(function () {
            $("#overlay").fadeOut(300);
        }, 500);
    });
});


function getMetaContent(html, name) {
    return html.filter(
        (index, tag) => tag && tag.name && tag.name == name).attr('content');
}

$(document).on("click", "#downloadCsv", function () {
    var title = $('#title').html();
    var des = $('#des').html();
    var kw = $('#kw').html();
    var viewport = $('#viewport').html();
    var img = $('#img').html();
    var dataUrl = $('#getData').val();
    $.ajax({
        type: "POST",
        url: "include/downloadCsv.php",
        data: {
            title: title,
            des: des,
            kw: kw,
            viewport: viewport,
            img: img,
            dataUrl: dataUrl,
        },
        success: function (data) {
            var downloadLink = document.createElement("a");
            var fileData = ['\ufeff' + data];

            var blobObject = new Blob(fileData, {
                type: "text/csv;charset=utf-8;"
            });

            var url = URL.createObjectURL(blobObject);
            downloadLink.href = url;
            downloadLink.download = title + ".csv";
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'CSV Downloaded Successfully.',
                showConfirmButton: false,
                timer: 1500
            });
            setTimeout(function () {
                $("#overlay").fadeOut(300);
            }, 100);
        }
    });
});

$(document).ready(function () {

    var mousePos = {};

    function getRandomInt(min, max) {
        return Math.round(Math.random() * (max - min + 1)) + min;
    }

    $(window).mousemove(function (e) {
        mousePos.x = e.pageX;
        mousePos.y = e.pageY;
    });

    $(window).mouseleave(function (e) {
        mousePos.x = -1;
        mousePos.y = -1;
    });

    var draw = setInterval(function () {
        if (mousePos.x > 0 && mousePos.y > 0) {

            var range = 15;
            var color = "background: rgb(" + getRandomInt(0, 255) + "," + getRandomInt(0, 255) + "," + getRandomInt(0, 255) + ");";
            var sizeInt = getRandomInt(10, 30);
            size = "height: " + sizeInt + "px; width: " + sizeInt + "px;";
            var left = "left: " + getRandomInt(mousePos.x - range - sizeInt, mousePos.x + range) + "px;";
            var top = "top: " + getRandomInt(mousePos.y - range - sizeInt, mousePos.y + range) + "px;";
            var style = left + top + color + size;
            $("<div class='ball' style='" + style + "'></div>").appendTo('body').one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () { $(this).remove(); });
        }
    }, 1);
});

