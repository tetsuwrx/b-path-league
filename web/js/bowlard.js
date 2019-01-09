function scoreInput( scoreVal )
{
  frameObj = getEmptyCell();

  switch( scoreVal.value ) {
    case 'S':
      //ストライク
      frameObj.innerText = "ST";
      frameObj = getEmptyTd();
      frameObj.style.backgroundImage = "linear-gradient(-45deg, transparent 49%, black 49%, black 51%, transparent 51%, transparent)";
      break;
    case 'SP':
      //スペア
      break;
    case 'G':
      frameObj.innerText = "G";
    default:
      //普通にスコア入れる
      break;
  }
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
      var idkey2 = 'frame10-3';
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
