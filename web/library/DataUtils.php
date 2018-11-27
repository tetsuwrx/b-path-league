<?php
  require_once 'Utils.php';

  /**
   * データ操作関連共通ライブラリ
   */
  class DataUtils extends Utils
  {

    function __construct()
    {
      // code...
    }

    /*
     * battledata.txtから全レコードを取得してメンバー名を整理
     */
    function getMemberListFromText()
    {
      $utils = new Utils();

      // メンバーリスト空配列
      $memberList = array();

      // 対戦データヘッダ読み込み
      $xml_obj = simplexml_load_file($utils->$memberListXML);

      if ($xml_obj === FALSE)
      {
        return;
      } else{
        foreach ($xml_obj->members as $members) {
          array_push($memberList, $members->name);
        }
      }

      return $memberList;
    }
  }

?>
