function setClass1()
{
  var p1Name = document.entryForm.p1Name;
  var selInd = p1Name.selectedIndex;
  var nameVal = p1Name.options[selInd].value;
  var classVal = nameVal.split(',');

  document.entryForm.p1Class.value = classVal[2];
  document.entryForm.p1ScoreWin.value = classVal[3];
}

function setClass2()
{
  var p1Name = document.entryForm.p2Name;
  var selInd = p2Name.selectedIndex;
  var nameVal = p2Name.options[selInd].value;
  var classVal = nameVal.split(',');

  document.entryForm.p2Class.value = classVal[2];
  document.entryForm.p2ScoreWin.value = classVal[3];
}
