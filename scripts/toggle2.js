function toggle2($ID, $ToggleID) {
   var ele = document.getElementById($ID);
   var text = document.getElementById($ToggleID);
   if(ele.style.display == "block") {
	ele.style.display = "none";
	text.innerHTML = "[+]";
   } else {
	ele.style.display = "block";
	text.innerHTML = "[-]";
   }
} 

function toggle_on($ID) {
   var ele = document.getElementById($ID);
   ele.style.display = "block";
}

function toggle_off($ID) {
   var ele = document.getElementById($ID);
   ele.style.display = "none";
}

function toggleDonationAmount($SelectID,$DisplayID) {
   var ele = document.getElementById($SelectID);
   if (ele.value == "other") {
	toggle_on($DisplayID);
   } else {
	toggle_off($DisplayID);
	ele = document.getElementById('T_amt_other');
	ele.value = '';
   }
}