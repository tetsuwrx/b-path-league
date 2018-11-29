function setClass1()
{
  var p1Name = document.entryForm.p1Name;
  var selInd = p1Name.selectedIndex;
  var nameVal = p1Name.options[selInd].value;
  var classVal = nameVal.split(',');

  document.entryForm.getElementsByName("p1Class").value = classVal[2];
  document.entryForm.getElementsByName("p1ScoreWin").value = classVal[3];
}
