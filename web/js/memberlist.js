function setClass( classObj, rowno )
{
  var scoreVal = "";

  switch(classObj.value)
  {
    case 'UC':
      scoreVal = 2;
      break;
    case 'C':
      scoreVal = 3;
      break;
    case 'B':
      scoreVal = 4;
      break;
    case 'A':
      scoreVal = 5;
      break;
    case 'SA':
      scoreVal = 6;
      break;
  }

  var scoreLabel = document.getElementById('score_' + rowno);

  scoreLabel.innerText = scoreVal;

}
