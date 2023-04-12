function subtractDay() {
  let date = new Date(2015, 2, 1);
  date.setDate(date.getDate() - 1);

  return date;
}

function dateToString() {
  let date = new Date(2015, 2, 1);
  let dateString = date.toLocaleDateString("ru").split(".").reverse().join("");

  return dateString;
}

let result = "";
let result1 = "";

result = subtractDay();

$("#result5").html(result);

result = dateToString();

$("#result6").html(result);
