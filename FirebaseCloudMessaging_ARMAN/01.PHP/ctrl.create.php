<?php
  include("ctrl.include.php");
 $veri[1] = "
CREATE TABLE devices (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'S�ra No'
 ,deviceID varchar(255) NOT NULL COMMENT 'CihazID'
 ,deviceToken varchar(255) NOT NULL COMMENT 'CihazToken'
 ,devicePlatform varchar(255) NOT NULL COMMENT 'CihazPlatform'
 ,deviceSignDate TIMESTAMP NOT NULL DEFAULT now() COMMENT 'Kullan�c� hesab� ilk kay�t tarihi'
 ,deviceLastDate TIMESTAMP NOT NULL DEFAULT 0     COMMENT 'Kullan�c� hesab� son giri� tarihi'
 ,PRIMARY KEY (id)
 ,UNIQUE (deviceToken) COMMENT 'UPDATE a�amas�nda ayn� tokena LastDate yaz�lacak.'
)
ENGINE = MYISAM
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Mesaj PUSH edilecek cihazlar�n tablosudur.';
";

 $veri[2] = "CREATE TABLE messages (
  ID int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'S�ra No'
  ,DateTime TIMESTAMP NOT NULL DEFAULT Now() COMMENT 'Mesaj Tarihi'
  ,MessageText text DEFAULT NULL COMMENT 'Mesaj ��eri�i'
  ,MessResult  text DEFAULT NULL COMMENT 'GCM Icerik Result'
  ,PRIMARY KEY (ID)
)
ENGINE = MYISAM
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
COMMENT = 'Push edilmi� mesajlar tablosudur.';
";

 if ( @mysql_query( $veri[1] ) )
 { echo "Tablomuz 'devices' Ba�ar�l� bir �ekilde create edildi <br>"; }
 else
 { echo "HATA: Tablo create edilemedi...<br>"; }

 if ( @mysql_query( $veri[2] ) )
 { echo "Tablomuz 'messages' Ba�ar�l� bir �ekilde create edildi <br>"; }
 else
 { echo "HATA: Tablo create edilemedi...<br>"; }
?>