function setClass(nameObj, classObj, masuObj)
{
  var selInd = nameObj.selectedIndex;
  var nameVal = nameObj.options[selInd].value;
  if ( nameVal != "0" )
  {
    var classVal = nameVal.split(',');

    classObj.value = classVal[2];

    var items = masuObj.options;

    // 全てのアイテムを削除
    for ( i = items.length; i > 0; i-- ) {
      items[i-1] = null;
    }

    var itemindex = 0;
    for ( i = 0 ; i <= classVal[3]; i++) {
      items[i] = new Option("◎-" + i, i);
    }

  }else{
    classObj.value = "";
  }
}

function registScore()
{
  if ( checkEntry() == true )
  {
    window.alert('登録はっじめーるよー！');
  }
}

function checkEntry()
{
  for ( i = 1; i < scorelist.rows.length; i++; )
  {
    var class1val = document.getElementById('class1_' + i).value;
    var score1val = document.getElementById('score1_' + i).value;

    var class2val = document.getElementById('class2_' + i).value;
    var score2val = document.getElementById('score2_' + i).value;

    var errMsg = "";

    if ( !(class1val != null && score1val != null && class2val != null && score2val != null ) )
    {
      if ( score1val != null )
      {
        errMsg += i + "行目:スコア1が未入力です\r\n";
      }else if ( score2val != null)
      {
        errMsg += i + "行目:スコア2が未入力です\r\n";
      }
    }
  }
  if ( errMsg != "" )
  {
    window.alert(errMsg);
    return false;
  }else {
    return true;
  }

}
