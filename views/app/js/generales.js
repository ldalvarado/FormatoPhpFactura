function __(id) {
  return document.getElementById(id);
};
var base_url = window.location.origin;
function validate(datastring){
	if(!/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(datastring))
		return false;

	var parts = datastring.split("-");
	var day = parseInt(parts[2], 10);
	var month = parseInt(parts[1], 10);
	var year = parseInt(parts[0], 10);

	
	//revisar los rangos de año y mes
	if( (year < 1500) || (year > 3000) || (month==0) || (month > 12))
		return false;

	var monthLegth = [31,28,31,30,31,30,31,31,30,31,30,31];
	if( year % 400 == 0 || (year %100 !=0 && year % 4 == 0))
		monthLegth[1] = 29;

	return day > 0 && day <= monthLegth[month - 1];
};