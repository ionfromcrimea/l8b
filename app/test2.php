<?php
  $datetime = getdate();
  foreach ($datetime as $k=>$v)
    echo "$k - $v\n";

  echo gmdate("Сейчас на Гринвиче D M j H:i:s T Y")
?>