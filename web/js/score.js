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
      document.getElementById("p1WinnerLabel").innerHTML = "Winner";
      document.getElementById("p1WinnerLabel").style.display = "block";
      document.getElementById("p1WinnerLabel").style.color = "red";
      document.getElementById("p1WinnerLabel").style.background = "linear-gradient(160deg, rgb(212, 181, 0), rgb(233, 255, 106))";
      document.entryForm.p1Winner.value = "1";

      document.getElementById("p2WinnerLabel").innerHTML = "Loser";
      document.getElementById("p2WinnerLabel").style.display = "block";
      document.getElementById("p2WinnerLabel").style.color = "blue";
      document.getElementById("p2WinnerLabel").style.background = "linear-gradient(160deg, rgb(0, 155, 0), rgb(170, 255, 170))";
      document.entryForm.p2Winner.value = "0";
    }
  }else {
    var scoreVal = document.entryForm.p2Score.value;
    var scoreWin = document.entryForm.p2ScoreWin.value;

    if ( scoreVal == scoreWin )
    {
      document.getElementById("p1WinnerLabel").innerHTML = "Loser";
      document.getElementById("p1WinnerLabel").style.display = "block";
      document.getElementById("p1WinnerLabel").style.color = "blue";
      document.getElementById("p1WinnerLabel").style.background = "linear-gradient(160deg, rgb(0, 155, 0), rgb(170, 255, 170))";
      document.entryForm.p1Winner.value = "0";

      document.getElementById("p2WinnerLabel").innerHTML = "Winner";
      document.getElementById("p2WinnerLabel").style.display = "block";
      document.getElementById("p2WinnerLabel").style.color = "red";
      document.getElementById("p2WinnerLabel").style.background = "linear-gradient(160deg, rgb(212, 181, 0), rgb(233, 255, 106))";
      document.entryForm.p2Winner.value = "1";
    }
  }

}
