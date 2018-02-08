jQuery(function ($){
	document.getElementById('mp' + actmp).style.backgroundColor = "#424242";
	document.getElementById('mp' + actmp).style.borderRight = "10px #B40404 solid";
	document.getElementById('link' + actmp).style.color = "#FAFAFA";
});

function menupromptclicked(bID){
	if (bID == 1) {window.location.href = "index.php";};
	if (bID == 2) {window.location.href = "light.php";};
	if (bID == 3) {window.location.href = "window.php";};
	if (bID == 4) {window.location.href = "security.php";};
	if (bID == 5) {window.location.href = "door.php";};
	if (bID == 6) {window.location.href = "settings.php";};
}
function deacmp(ID){
	if (ID != actmp) {
		document.getElementById('mp' + actmp).style.backgroundColor = "#7A7A7A";
		document.getElementById('mp' + actmp).style.border = "0px";
		document.getElementById('link' + actmp).style.color = "#2E2E2E";
	}
}
function acmp(ID){
	if (ID != actmp) {
		document.getElementById('mp' + actmp).style.backgroundColor = "#424242";
		document.getElementById('mp' + actmp).style.borderRight = "10px #B40404 solid";
		document.getElementById('link' + actmp).style.color = "#FAFAFA";
	}
}
function deacmpc(ID){
	document.getElementById('mp' + ID).style.backgroundColor = "#7A7A7A";
	document.getElementById('mp' + ID).style.border = "0px";
	document.getElementById('link' + ID).style.color = "#2E2E2E";

	jQuery("#mpc" + ID).hide(500);
}
function acmpc(ID){
	jQuery("#mpc" + ID).show(500);
	
	document.getElementById('mp' + ID).style.backgroundColor = "#424242";
	document.getElementById('mp' + ID).style.borderRight = "10px #B40404 solid";
	document.getElementById('link' + ID).style.color = "#FAFAFA";
}
acmp();