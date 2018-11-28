<?php
  /**
   * データ操作関連共通ライブラリ
   */
  class DBUtils
  {

    public $url = parse_utl(getenv('DATABASE_URL'));

    public $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'],1));

    function __construct()
    {
      // code...
    }

    function getDataSet($sql)
    {
      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $result = $pdo->query( $sql );

      $pdo = null;

      return $result;
    }

    function getMemberList($member)
    {
      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $sql = "select * from members where name = ? and sex = ? and class = ?";

      $stmt = $pdo->prepare($sql);

      $result = $stmt->execute($member['name'], $member['sex'], $member['class']);

      $pdo = null;
      $stmt = null;

      return $result;
    }

    function registMember($rows, $registDate, $member)
    {
      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $sql = "insert into members values ( ?, ?, ?, ?, ? )";

      $stmt = $pdo->prepare($sql);

      $result = $stmt->execute($rows + 1, $registDate, $member['name'], $member['sex'], $member['class']);

      $pdo = null;
      $stmt = null;

      return $result;
    }

    function execDML($sql)
    {
      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $result = $pdo->exec( $sql );

      $pdo = null;
    }

  }

?>
