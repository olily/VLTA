function show(tag) {
    var light = document.getElementById(tag);
    var fade = document.getElementById('fade');
    light.style.display = 'block';
    fade.style.display = 'block';
}
function hide(tag1, tag2) {
    if (arguments.length == 2) {
        var light = document.getElementById(tag1);
        var light2 = document.getElementById(tag2);
        light.style.display = 'none';
        light2.style.display = 'none';
    } else if (arguments.length == 1) {
        var light = document.getElementById(tag1);
        light.style.display = 'none';

    }
    var fade = document.getElementById('fade');
    fade.style.display = 'none';
}

