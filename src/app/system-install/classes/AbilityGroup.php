<?php
/**
 * AbilityGroup class
 */
class AbilityGroup extends BaseTable
{


  static function install(){
    $db=MySQL::open();
    $table=$db->gettable(get_class());
    $sqls=<<<CODE
    CREATE TABLE IF NOT EXISTS `$table` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(32) NOT NULL,
    `ability` text NOT NULL DEFAULT '',
    `status` int(2) NOT NULL DEFAULT '1',
    `data` text NOT NULL,
    `remark` text NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
CODE;
    $db->q($sqls);

  }
  static function uninstall(){
    $db=MySQL::open();
    $table=$db->gettable(get_class());
    $db->q("DROP TABLE $table");

  }


}

 ?>
