window.onload = function() {
    var elements = document.getElementsByClassName('link');
    for (var i = 0; i < elements.length; i++) {
        elements[i].onclick = function() {
            document.getElementById("popupdarkbg").style.display = "block";
            document.getElementById("popup").style.display = "block";
            link = this.getAttribute("value");
            document.getElementById("popupiframe").src = link;
            document.getElementById("popupdarkbg").onclick = function() {
                document.getElementById("popup").style.display = "none";
                document.getElementById("popupdarkbg").style.display = "none";
            };
        }
    }
};

window.onkeydown = function(e) {
    if (e.keyCode == 27) {
        document.getElementById("popup").style.display = "none";
        document.getElementById("popupdarkbg").style.display = "none";
        e.preventDefault();
        return;
    }
}