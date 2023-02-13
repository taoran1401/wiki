<?php
class Parents
{
  static public function up() 
  {
    echo "parent" . PHP_EOL;
  }
}

class Goods
{
  public function up()
  {
    echo "goods" . PHP_EOL;
  }

  public function down()
  {
    echo self::up();
  }
}


$goods = new Goods();
$goods->down();