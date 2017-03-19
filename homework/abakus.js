window.onload = function(){

	var kuulid = document.getElementsByClassName("bead");

	for (var i = 0; i < kuulid.length; i++){
		kuulid[i].onclick = function () {
			liiguta(this);
		}
	}

	function liiguta(kuul) {
		if (window.getComputedStyle(kuul).getPropertyValue("float") == "right") {
			kuul.style.cssFloat = "left";
		} else {
			kuul.style.cssFloat = "right";
		}

	}

}