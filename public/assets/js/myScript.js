

function saveInputFunction(){
  document.getElementById('displayValue2').value=this.options[this.selectedIndex].text; 
  document.getElementById('idValue').value=this.options[this.selectedIndex].value;
}




// var today = new Date();
// var date= today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
// document.getElementById('myDateBtn').value = date;





/////////////////////////////////////////////////////////////////////////
// SelectBox
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
document.getElementById("displayValue2").addEventListener("click", function() {
  document.getElementById("demo").innerHTML = "Hello World";
});
function filterFunction() {
  var input, filter, i;
  input = document.getElementById("displayValue2");
  filter = input.value.toUpperCase();
  // div = document.getElementById("myDropdown");
  select = document.getElementById("mySelectSearch");
  
  option = select.getElementsByTagName("option");
  for (i = 0; i < option.length; i++) {
    txtValue = option[i].textContent || option[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      console.log('innn');
      
      option[i].style.display = "block";
    } else {
      console.log('outtt');

      option[i].style.display = "none";
    }
  }
}

/////////////////////////////////////////////////////////////////////////
// DataList
// Find all inputs on the DOM which are bound to a datalist via their list attribute.
// var inputs = document.querySelectorAll('input[list]');
var inputs = document.getElementById('country');
// for (var i = 0; i < inputs.length; i++) {
  // When the value of the input changes…
  inputs.addEventListener('change', function() {
    var optionFound = false,
      datalist = this.list;
    // Determine whether an option exists with the current value of the input.
    for (var j = 0; j < datalist.options.length; j++) {
        if (this.value == datalist.options[j].value) {
            optionFound = true;
            break;
        }
    }
    // use the setCustomValidity function of the Validation API
    // to provide an user feedback if the value does not exist in the datalist
    if (optionFound) {
      this.setCustomValidity('');
    } else {
      this.setCustomValidity('Please select a valid value.');
    }
  });
// }

//////////////////////////////////////////////////
$( function() {
  var availableTags = [
    "ActionScript",
    "AppleScript",
    "Asp",
    "BASIC",
    "C",
    "C++",
    "Clojure",
    "COBOL",
    "ColdFusion",
    "Erlang",
    "Fortran",
    "Groovy",
    "Haskell",
    "Java",
    "JavaScript",
    "Lisp",
    "Perl",
    "PHP",
    "Python",
    "Ruby",
    "Scala",
    "Scheme"
  ];
  $( "#customer" ).autocomplete({
    source: availableTags
  });
} );


//////////////////////////////////////////////////////
//select2
$(document).ready(function(){
 
  // Initialize select2
  $("#selUser").select2();

  // Read selected option
  // $('#but_read').click(function(){
  //   var username = $('#selUser option:selected').text();
  //   var userid = $('#selUser').val();
  //   $('#result').html("id : " + userid + ", name : " + username);

  // });
});