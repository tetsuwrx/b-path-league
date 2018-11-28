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

  }

?>
