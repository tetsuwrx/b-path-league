function setClass(nameObj, classID, masuID)
{
  var selInd = nameObj.selectedIndex;
  var nameVal = nameObj.options[selInd].value;
  var classObj = document.getElementById(classID);
  var masuObj = document.getElementById(masuID);

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
  if ( checkEntry() == false )
  {
    return false;
  }

  var formObj = document.createElement('form');

  formObj.action = 'scoreregist.php';
  formObj.method = 'post';

  for ( i = 1; i < scorelist.rows.length; i++ )
  {
    var entryDate = document.getElementById('entryDate_' + i);

    var obj = document.createElement('input');
    obj.value = entryDate.value;
    obj.name = entryDate.id;
    formObj.appendChild(obj);

    var player1Obj = document.getElementById('player1name_' + i);

    var obj = document.createElement('input');
    obj.value = player1Obj.value;
    obj.name = player1Obj.id;
    formObj.appendChild(obj);

    var class1Obj = document.getElementById('class1_' + i);
    var obj = document.createElement('input');
    obj.value = class1Obj.value;
    obj.name = class1Obj.id;
    formObj.appendChild(obj);

    var score1Obj = document.getElementById('score1_' + i);
    var obj = document.createElement('input');
    obj.value = score1Obj.value;
    obj.name = score1Obj.id;
    formObj.appendChild(obj);

    var masu1Obj = document.getElementById('p1Masu_' + i);
    var obj = document.createElement('input');
    obj.value = masu1Obj.value;
    obj.name = masu1Obj.id;
    formObj.appendChild(obj);

    var class2Obj = document.getElementById('class2_' + i);
    var obj = document.createElement('input');
    obj.value = class2Obj.value;
    obj.name = class2Obj.id;
    formObj.appendChild(obj);

    var player2Obj = document.getElementById('player2name_' + i);
    var obj = document.createElement('input');
    obj.value = player2Obj.value;
    obj.name = player2Obj.id;
    formObj.appendChild(obj);

    var score2Obj = document.getElementById('score2_' + i);
    var obj = document.createElement('input');
    obj.value = score2Obj.value;
    obj.name = score2Obj.id;
    formObj.appendChild(obj);

    var masu2Obj = document.getElementById('p2Masu_' + i);
    var obj = document.createElement('input');
    obj.value = masu2Obj.value;
    obj.name = masu2Obj.id;
    formObj.appendChild(obj);
  }

  document.body.appendChild(formObj);

  formObj.submit();
}

function checkEntry()
{
  var errMsg = "";

  for ( i = 1; i < scorelist.rows.length; i++ )
  {
    var class1val = document.getElementById('class1_' + i).value;
    var score1val = document.getElementById('score1_' + i).value;

    var class2val = document.getElementById('class2_' + i).value;
    var score2val = document.getElementById('score2_' + i).value;

    var check = false;

    if ( !(class1val != "" && score1val != "" && class2val != "" && score2val != "" ) )
    {
      if ( score1val == "" && score2val != "" )
      {
        errMsg += i + "行目:スコア1が未入力です\r\n";
        check = true;
      }else if ( score1val != "" && score2val == "" )
      {
        errMsg += i + "行目:スコア2が未入力です\r\n";
        check = true;
      }

      if ( check == true )
      {
        for ( j = 0; j < scorelist.rows[i].cells.length; j++)
        {
          scorelist.rows[i].cells[j].style.backgroundColor = 'red';
        }
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
