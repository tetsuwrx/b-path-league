function setClass1()
{
  var nameVal = document.getElementsByName("p1Name").value;
  var classVal = nameVal.split(',');

  document.getElementsByName("p1Class").text = classVal;
}
