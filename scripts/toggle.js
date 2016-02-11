function toggle($ID) {
   var ele = document.getElementById($ID);
   if(ele.style.display == "block") {
	ele.style.display = "none";
   } else {
	ele.style.display = "block";
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