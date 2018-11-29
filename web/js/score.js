function setClass1()
{
  var p1Name = document.entryForm.p1Name;
  var selInd = p1Name.selectedIndex;
  var nameVal = p1Name.options[selInd].value; 
  var classVal = nameVal.split(',');

  document.getElementsByName("p1Class").text = classVal;
}
