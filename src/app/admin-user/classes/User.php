<?php
/**
 * User class
 */
class User extends BaseTable
{




  static function install(){
    $db=MySQL::open();
    $table=$db->gettable(get_class());
    $sqls=<<<CODE
    CREATE TABLE IF NOT EXISTS `$table` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `nickname` varchar(32) NOT NULL DEFAULT '',
  `status` int(2) NOT NULL DEFAULT '1',
  `group` text NOT NULL,
  `data` text NOT NULL,
  `remark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

ALTER TABLE `$table`
 ADD KEY `username` (`username`);

CODE;
    $db->q($sqls);

  }
  static function uninstall(){
    $db=MySQL::open();
    $table=$db->gettable(get_class());
    $db->q("DROP TABLE $table");

  }


  function login($username,$passwd){

  }


}

 ?>
