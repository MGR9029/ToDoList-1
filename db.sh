//データベースの削除
mysql -uroot -proot -e"drop database rodolist;"

//データベースの新規作成
mysql -uroot -proot -e"create database todolist character set utf8;"

//テーブルリストの作成
mysql -uroot -proot -e"create tabalelist id MEDIUMINT NOT NULL AUTO_INCEREMENT, chk(1) NOT NULL DEFAULT'0', item varcher(256), PRIMARY KEY(id);"
