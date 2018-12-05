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

      $result = $utils->registMember($rows, $registDate, $member);

      return $result;
    }

    /*
     * MemberList.xmlにメンバーを登録
     */
    function updateMember($memberno, $member)
    {
      $utils = new DBUtils();

      $result = $utils->updateMember($memberno, $member);

      return $result;
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
        $rows = 0;
      }

      $stmt = null;

      $utils->registScore($rows, $score);

    }

    /*
     * 対戦結果のリストを取得
     */
    function getScoreList($dateFrom, $dateTo)
    {
      $utils = new DBUtils();

      $stmt = $utils->getScoreList($dateFrom, $dateTo);

      $scorelist = array();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $scorelist[] = array('matchno' => $row['matchno'],
                             'matchdate' => $row['matchdate'],
                             'player1name' => $row['player1name'],
                             'player1score' => $row['player1score'],
                             'player1win' => $row['player1win'],
                             'player2name' => $row['player2name'],
                             'player2score' => $row['player2score'],
                             'player2win' => $row['player2win'],
                           );
      }

      $stmt = null;

      return $scorelist;
    }

    /*
     * ランキングのベース情報を取得
     */
    function getMatchList($dateFrom, $dateTo, $memberno)
    {
      $utils = new DBUtils();

      $stmt = $utils->getMatchList($dateFrom, $dateTo, $memberno);

      $scorelist = array();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $scorelist[] = array('matchno' => $row['matchno'],
                             'matchdate' => $row['matchdate'],
                             'player1name' => $row['player1name'],
                             'player1score' => $row['player1score'],
                             'player1win' => $row['player1win'],
                             'player2name' => $row['player2name'],
                             'player2score' => $row['player2score'],
                             'player2win' => $row['player2win'],
                           );
      }

      $stmt = null;

      return $scorelist;
    }

    function getRankingList($dateFrom, $dateTo)
    {
      // メンバーのリストを取得
      $memberlist = $this->getMemberList();

      $rankingbase = array();
      foreach ($memberlist as $member) {
        // 試合結果を取得
        $scorelist = $this->getMatchList($dateFrom, $dateTo, $member['memberno']);

        foreach ($scorelist as $score) {
          // ランキングのもととなるデータを「<memberno>,<対戦相手>,<試合日>,<結果>」の形で整形する
          if( $member['memberno'] == $score['player1no'] )
          {
            $rankingbase[] = array('memberno' => $member['memberno'],
                                 'opponentno' => $score['player2no'],
                                 'matchdate' => $score['matchdate'],
                                 'result' => $score['player1win']
                               );
          }elseif ( $member['memberno'] == $score['player2no'] ) {
            $rankingbase[] = array('memberno' => $member['memberno'],
                                 'opponentno' => $score['player1no'],
                                 'matchdate' => $score['matchdate'],
                                 'result' => $score['player2win']
                               );
          }
        }
      }

      return $rankingbase;
    }
  }

?>
