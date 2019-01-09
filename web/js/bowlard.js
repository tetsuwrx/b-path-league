function scoreInput( scoreVal )
{
  frameObj = getEmptyCell();

  switch( scoreVal.value ) {
    case 'S':
      //ストライク
      frameObj.innerText = "ST";
      frameObj = getEmptyTd();
      frameObj.style.backgroundImage = "linear-gradient(-45deg, transparent 49%, black 49%, black 51%, transparent 51%, transparent)";
      frameObj = getEmptyCell();
      frameObj.innerText = "-";
      frameObj.style.display = "none";
      break;
    case 'SP':
      //スペア
      frameObj.innerText = "SP";
      break;
    case 'G':
      var idval = frameObj.id;
      if ( idval.substr(-1,1) == '1' )
      {
        frameObj.innerText = "G";
      }else {
        frameObj.style.backgroundImage = "linear-gradient(-45deg, transparent 49%, black 49%, black 51%, transparent 51%, transparent)";
        frameObj = getEmptyCell();
        frameObj.innerText = "G";
        frameObj.style.display = "none";
      }

    default:
      //普通にスコア入れる
      frameObj.innerText = scoreVal.value;
      break;
  }
  // スコア計算

  // ボタンの値を変更
}

function getEmptyCell()
{
  for ( var i = 1; i <= 10; i++ ){
    var idkey1 = 'frame' + i + '-1';
    var idkey2 = 'frame' + i + '-2';

    var frameObj = document.getElementById(idkey1);
    if ( frameObj.innerText == "" )
    {
      return frameObj;
    }

    var frameObj = document.getElementById(idkey2);
    if ( frameObj.innerText == "" )
    {
      return frameObj;
    }

    if ( i == 10 )
    {
      var idkey3 = 'frame10-3';

      var frameObj = document.getElementById(idkey3);
      if ( frameObj.innerText == "" )
      {
        return frameObj;
      }
    }
  }
}

function getEmptyTd()
{
  for ( var i = 1; i <= 10; i++ ){
    var idkey1 = 'frame' + i + '-1';
    var idkey2 = 'frame' + i + '-2';

    var tdkey1 = 'td' + i + '-1';
    var tdkey2 = 'td' + i + '-2';

    var frameObj = document.getElementById(idkey1);
    if ( frameObj.innerText == "" )
    {
      var tdObj = document.getElementById(tdkey1);
      return tdObj;
    }

    var frameObj = document.getElementById(idkey2);
    if ( frameObj.innerText == "" )
    {
      var tdObj = document.getElementById(tdkey2);
      return tdObj;
    }

    if ( i == 10 )
    {
      var idkey3 = 'frame10-3';
      var tdkey3 = 'td10-3';

      var frameObj = document.getElementById(idkey3);
      if ( frameObj.innerText == "" )
      {
        var tdObj = document.getElementById(tdkey3);
        return tdObj;
      }
    }
  }
}
