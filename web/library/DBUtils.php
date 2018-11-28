<?php
  /**
   * データ操作関連共通ライブラリ
   */
  class DBUtils
  {

    function __construct()
    {
      // code...
    }

    function getDataSet($sql)
    {
      $url = parse_url(getenv('DATABASE_URL'));

      $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'],1));

      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $result = $pdo->query( $sql );

      $pdo = null;

      return $result;
    }

    function getMemberList($member)
    {
      $url = parse_url(getenv('DATABASE_URL'));

      $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'],1));

      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $sql = "select * from members where name = ? and sex = ? and class = ?";

      $stmt = $pdo->prepare($sql);

      $result = $stmt->execute(array($member['name'], $member['sex'], $member['class']));

      $pdo = null;

      return $result;
    }

    function registMember($rows, $registDate, $member)
    {
      $url = parse_url(getenv('DATABASE_URL'));

      $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'],1));

      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $sql = "insert into members values ( ?, ?, ?, ?, ? )";

      $stmt = $pdo->prepare($sql);

      $result = $stmt->execute(array($rows + 1, $registDate, $member['name'], $member['sex'], $member['class']));

      $pdo = null;
      $stmt = null;

      return $result;
    }

    function execDML($sql)
    {
      $url = parse_url(getenv('DATABASE_URL'));

      $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'],1));

      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $result = $pdo->exec( $sql );

      $pdo = null;
    }

  }

?>
