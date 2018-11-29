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
  var p2Name = document.entryForm.p2Name;
  var selInd = p2Name.selectedIndex;
  var nameVal = p2Name.options[selInd].value;
  var classVal = nameVal.split(',');

  document.entryForm.p2Class.value = classVal[2];
  document.entryForm.p2ScoreWin.value = classVal[3];
}

function scoreInput(player)
{
  if ( player == 'p1' )
  {
    var scoreVal = document.entryForm.p1Score.value;
    var scoreWin = document.entryForm.p1ScoreWin.value;

    if ( scoreVal == scoreWin )
    {
      document.entryForm.p1WinnerLabel.value = "Winner";
      document.entryForm.p2WinnerLabel.value = "Loser";
      document.entryForm.p1Winner.style.display = "block";
      document.entryForm.p2Winner.style.display = "block";
    }
  }else {
    var scoreVal = document.entryForm.p2Score.value;
    var scoreWin = document.entryForm.p2ScoreWin.value;

    if ( scoreVal == scoreWin )
    {
      document.entryForm.p1WinnerLabel.value = "Loser";
      document.entryForm.p2WinnerLabel.value = "Winner";
      document.entryForm.p1Winner.style.display = "block";
      document.entryForm.p2Winner.style.display = "block";
    }
  }

}
