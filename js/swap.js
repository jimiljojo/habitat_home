function primeSwap() {
    //es = document.getElementsByClassName("show");
    es = document.getElementsByTagName("h4");
    l = es.length;
    for (i = 0; i < l; i++) {
	   if(es[i].className === "show") {
		  //elems[n] = es[i];
		  //n++;
		  es[i].className = "hide";
	   }
    }// end for
}// end function

function swap(e) {
    if (e.className === "hide") {
	   e.className = "show";
    } else {
	   e.className = "hide";
    }// end if-else
}// end function

function showAll() {
    es = document.getElementsByTagName("h4");
    l = es.length;
    for (i = 0; i < l; i++) {
	   if(es[i].className === "hide") {swap(es[i]);}
    }// end for
}

function hideAll() {
    es = document.getElementsByTagName("h4");
    l = es.length;
    for (i = 0; i < l; i++) {
	   if(es[i].className === "show") {swap(es[i]);}
    }// end for
}

function swapAll(act) {
    es = document.getElementsByTagName("h4");
    l = es.length;
    if (act == "show") {
	   for (i = 0; i < l; i++) {
		  if(es[i].className === "hide") {swap(es[i]);}
	   }// end for
    } else if (act == "hide") {
	   for (i = 0; i < l; i++) {
		  if(es[i].className === "show") {swap(es[i]);}
	   }// end for
    }
}