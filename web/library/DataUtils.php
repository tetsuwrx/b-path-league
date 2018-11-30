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
     * MemberList.xmlに任意のメンバーが存在するか確認
     */
    function checkMemberList($member)
    {

      $utils = new DBUtils();

      $stmt = $utils->getMemberNo($member);

      $memberno = (int)$stmt['memberno'];

      $result = 0;

      if ( $memberno > 0 )
      {
        $result = $memberno;
      }

      return $result;
    }

    /*
     * MemberList.xmlにメンバーを登録
     */
    function registMember($member)
    {
      $utils = new DBUtils();

      // membernoの最大値を取得
      $sql = "select max(memberno) from members;";

      $stmt = $utils->getDataSet($sql);

      $rows = (int)$stmt->fetchColumn();

      $registDate = date("Y-m-d");

      $utils->registMember($rows, $registDate, $member);

    }

    /*
     * MemberList.xmlにメンバーを登録
     */
    function updateMember($memberno, $member)
    {
      $utils = new DBUtils();

      $utils->updateMember($memberno, $member);

    }

    /*
     * メンバーのリストを取得
     */
    function getMemberList()
    {
      $utils = new DBUtils();

      // メンバーリストを取得
      $sql = "select memberno, name, class, score from members order by memberno;";

      $stmt = $utils->getDataSet($sql);

      $memberlist = array();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $memberlist[] = array('memberno' => $row['memberno'], 'name' => $row['name'], 'class' => $row['class'], 'score' => $row['score']);
      }

      $stmt = null;

      return $memberlist;

    }

    /*
     * スコアの結果を登録
     */
    function registScore($score)
    {
      $utils = new DBUtils();

      // membernoの最大値を取得
      $sql = "select max(matchno) from matchdata;";

      $stmt = $utils->getDataSet($sql);

      $rows = 0;

      try{
        $rows = (int)$stmt->fetchColumn();
      }catch ( Exception $ex ){
        $rows = 1;
      }

      $stmt = null;

      $utils->registScore($rows, $score);

    }
  }

?>
