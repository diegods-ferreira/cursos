<?php
  class Connection {
    private static $dbNome = 'gestao_academica';
    private static $dbHost = 'localhost:3306';
    private static $dbUsuario = 'root';
    private static $dbSenha = '123456';
    
    private static $conn = null;
    
    public function __construct() {
      die('A função Init nao é permitida!');
    }
    
    public static function connect() {
      if (null == self::$conn) {
        try {
          self::$conn = new PDO('mysql:host=' . self::$dbHost . ';dbname=' . self::$dbNome, self::$dbUsuario, self::$dbSenha); 
        } catch (PDOException $exception) {
          die($exception->getMessage());
        }
      }

      return self::$conn;
    }
    
    public static function disconnect() {
      self::$conn = null;
    }
  }