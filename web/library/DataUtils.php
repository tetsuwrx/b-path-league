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
     * BattleDataHeader.xmlから全レコードを取得してメンバー名を整理
     */
    function getMemberListFrom()
    {
      $utils = new Utils();

      // メンバーリスト空配列
      $memberList = array();

      // 対戦データヘッダ読み込み
      $xml_obj = simplexml_load_file($utils->$memberListXML);

      if ($xml_obj === FALSE)
      {
        return FALSE;
      } else{
        foreach ($xml_obj->members as $members) {
          array_push($memberList, $members->name);
        }
      }

      return $memberList;
    }

    /*
     * BattleDataHeader.xmlに任意のメンバーが存在するか確認
     */
    function checkMemberList($member)
    {
      $utils = new Utils();

      // メンバーリスト空配列
      $memberList = array();

      // 対戦データヘッダ読み込み
      $xml_obj = simplexml_load_file($utils->$memberListXML);

      $result = FALSE;

      if ($xml_obj === FALSE)
      {
        return $result;
      } else{
        foreach ($xml_obj->members as $members) {
          array_push($memberList, $members->name);
          if( $member['name'] == $members->name && $member['sex'] == $members->sex && $member['class'] == $members->class )
          {
            $result = TRUE;
            break;
          }
        }
      }

      return $result;
    }
  }

?>
