function scoreInput( scoreVal )
{
  frameObj = searchEmpty();

  switch( scoreVal ) {
    case 'ST':
      //ストライク
      frameObj.innerText = "ST";
      frameObj = searchEmpty();
      frameObj.style.background-image = "linear-gradient(-45deg, transparent 49%, black 49%, black 51%, transparent 51%, transparent)";
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

function searchEmpty()
{
  for ( var i = 1; i <= 10; i++ ){
    var idkey1 = 'frame' + i + '_1';
    var idkey2 = 'frame' + i + '_1';

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
