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

    function getMemberNo($member)
    {
      $url = parse_url(getenv('DATABASE_URL'));

      $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'],1));

      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $sql = "select memberno from members where name = :name and sex = :sex";

      $stmt = $pdo->prepare($sql);

      $stmt->bindValue(":name", $member['name']);
      $stmt->bindValue(":sex", $member['sex']);

      $stmt->execute();

      $result = $stmt->fetch();

      $pdo = null;

      return $result;
    }

    function registMember($rows, $registDate, $member)
    {
      $url = parse_url(getenv('DATABASE_URL'));

      $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'],1));

      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $sql = "insert into members values ( ?, ?, ?, ?, ?, ? )";

      $stmt = $pdo->prepare($sql);

      swith ( $member['class'] )
      {
        case 'UC':
          $score = 2;
          break;
        case 'C':
          $score = 3;
          break;
        case 'B':
          $score = 4;
          break;
        case 'A':
          $score = 5;
          break;
        case 'SA':
          $score = 6;
          break;
      }

      $result = $stmt->execute(array($rows + 1, $registDate, $member['name'], $member['class'], $score, $member['sex']));

      $pdo = null;
      $stmt = null;

      return $result;
    }

    function updateMember($memberno, $member)
    {
      $url = parse_url(getenv('DATABASE_URL'));

      $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'],1));

      $pdo = new PDO($dsn, $url['user'], $url['pass']);

      $sql = "update members set class = :class, sex = :sex where memberno = :memberno";

      $stmt = $pdo->prepare($sql);

      $stmt->bindValue(":class", $member['class']);
      $stmt->bindValue(":sex", $member['sex']);
      $stmt->bindValue(":memberno", $memberno);

      try{
        $pdo->beginTransaction();
        $stmt->execute();
        $pdo->commit();
      }catch(Exception $e)
      {
        $pdo->rollBack();
        echo 'エラーメッセージ：', $e->getMessage(), "\n";
      }


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
