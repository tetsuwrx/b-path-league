<?php
  require_once 'Utils.php';
  require_once 'DBUtils.php';

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
    function getMemberList()
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
     * MemberList.xmlに任意のメンバーが存在するか確認
     */
    function checkMemberList($member)
    {

      $utils = new DBUtils();

      $result = FALSE;

      $stmt = $utils->getMemberList($member);

      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $count = count($rows);

      if ( $count > 0 )
      {
        $result = TRUE;
      }

      return $result;
    }

    /*
     * MemberList.xmlにメンバーを登録
     */
    function registMember($member)
    {
      $utils = new DBUtils();

      // 件数を取得
      $sql = "select count(memberno) from members;";

      $stmt = $utils->getDataSet($sql);

      $rows = (int)$stmt->fetchColumn();

      $registDate = date("Y-m-d");

      $utils->registMember($rows, $registDate, $member);

    }
  }

?>
