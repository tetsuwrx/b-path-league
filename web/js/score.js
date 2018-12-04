/*
function setClass1()
{
  var p1Name = document.entryForm.p1Name;
  var selInd = p1Name.selectedIndex;
  var nameVal = p1Name.options[selInd].value;
  if ( nameVal != "0" )
  {
    var classVal = nameVal.split(',');

    document.entryForm.p1Class.value = classVal[2];
    document.entryForm.p1ScoreWin.value = classVal[3];
  }else{
    document.entryForm.p1Class.value = "";
    document.entryForm.p1ScoreWin.value = "";
  }
}

function setClass2()
{
  var p2Name = document.entryForm.p2Name;
  var selInd = p2Name.selectedIndex;
  var nameVal = p2Name.options[selInd].value;
  if ( nameVal != "0" )
  {
    var classVal = nameVal.split(',');

    document.entryForm.p2Class.value = classVal[2];
    document.entryForm.p2ScoreWin.value = classVal[3];
  }else{
    document.entryForm.p2Class.value = "";
    document.entryForm.p2ScoreWin.value = "";
  }
}
*/

function setClass(nameObj, classObj, scoreObj)
{
  var selInd = nameObj.selectedIndex;
  var nameVal = nameObj.options[selInd].value;
  if ( nameVal != "0" )
  {
    var classVal = nameVal.split(',');

    classObj.value = classVal[2];
    scoreObj.value = classVal[3];
  }else{
    classObj.value = "";
    scoreObj.value = "";
  }
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
      document.entryForm.p1WinnerFlag.value = "1";

      document.getElementById("p2WinnerLabel").innerHTML = "Loser";
      document.getElementById("p2WinnerLabel").style.display = "block";
      document.getElementById("p2WinnerLabel").style.color = "blue";
      document.getElementById("p2WinnerLabel").style.background = "linear-gradient(160deg, rgb(0, 155, 0), rgb(170, 255, 170))";
      document.entryForm.p2WinnerFlag.value = "0";
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
      document.entryForm.p1WinnerFlag.value = "0";

      document.getElementById("p2WinnerLabel").innerHTML = "Winner";
      document.getElementById("p2WinnerLabel").style.display = "block";
      document.getElementById("p2WinnerLabel").style.color = "red";
      document.getElementById("p2WinnerLabel").style.background = "linear-gradient(160deg, rgb(212, 181, 0), rgb(233, 255, 106))";
      document.entryForm.p2WinnerFlag.value = "1";
    }
  }

  function refineMember(refineVal, selectObj)
  {
    var items = selectObj.children;
    var value = refineVal.value;

    const reg = new RegExp(".*" + value + ".*", "i");

    if ( value === ''){
      for ( i = 0 ; i < items.length; i++) {
        items[i].style.display = "";
      }
    	return;
    }

    for ( i = 0 ; i < items.length; i++) {
      if (items[i].textContent.match(reg)) {
        items[i].style.display = "";
      } else {
        items[i].style.display = "none";
      }
      items[i].selected = false;
    }
  }

}
