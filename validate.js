function generate() {
  var a = Math.ceil(Math.random() * 9) + '';
  var b = Math.ceil(Math.random() * 9) + '';
  var c = Math.ceil(Math.random() * 9) + '';
  var d = Math.ceil(Math.random() * 9) + '';
  var e = Math.ceil(Math.random() * 9) + '';
  var code = a + b + c + d + e;
  document.getElementById("txtCaptcha").value = code;
  document.getElementById("CaptchaDiv").innerHTML = code;
  return true;
}

function validate() {
  var name = document.forms["input"]["cnt_name"].value;
  var uname = document.forms["input"]["cnt_uname"].value;
  var phone = document.forms["input"]["cnt_phone"].value;
  var email = document.forms["input"]["cnt_email"].value;
  var add = document.forms["input"]["cnt_address"].value;
  var gen = document.forms["input"]["cnt_gender"].value;
  if (name == "") {
    alert("Name must be filled out");
    return false;
  }
  if (uname == "") {
    alert("Username must be filled out");
    return false;
  }
  if (phone == "") {
    alert("Phone must be filled out");
    return false;
  }
  if (email == "") {
    alert("Email  must be filled out");
    return false;
  }
  if (add == "") {
    alert("Address must be filled out");
    return false;
  }
  if (gen == "") {
    alert("gender must be filled out");
    return false;
  }


  //Captcha Script 
  var theform = document.forms["input"]["CaptchaInput"].value;

  var why = "";
  if (theform == "") {
    why += "- Please Enter CAPTCHA Code.\n";
  }
  if (theform != "") {
    if (ValidCaptcha() == false) {
      why += "- The CAPTCHA Code Does Not Match.\n";
    }
  }
  if (why != "") {
    alert(why);
    return false;
  }//alert(why);
  generate();
  // Validate input against the generated number
  function ValidCaptcha() {
    var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('CaptchaInput').value);
    if (str1 == str2) {
      return true;
    } else {
      return false;
    }
  }
  // Remove the spaces from the entered and generated code
  function removeSpaces(string) {
    return string.split(' ').join('');
  }

  return true;
}

function exportTableToExcel(tableID, filename = '') {
  var download_link;
  var dataType = 'application/vnd.ms-excel';
  var tableselect = document.getElementById(tableID);
  var tableHTML = tableselect.outerHTML.replace(/ /g, '%20');
  //above is a basic url encoding replaces spaces with their equivalent %20
  //
  filename = filename ? filename + '.xls' : 'excel_data.xls';

  //creating download link element 
  download_link = document.createElement("a");

  document.body.appendChild(download_link);

  if (navigator.msSaveOrOpenBlob) {
    var blob = new Blob(['\ufeff', tableHTML], {
      //creates the Blob instance that starts with the unicode character corresponding 
      //to the hex feff, and then follows with the contents of the tableHTML variable.
      type: dataType
    });
    navigator.msSaveOrOpenBlob(blob, filename);
  } else {
    // Create a link to the file
    download_link.href = 'data:' + dataType + ', ' + tableHTML;

    // Setting the file name
    download_link.download = filename;

    //triggering the function
    download_link.click();
  }
}
