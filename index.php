<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>掲示板</title>
</head>
<body>
  <h3>掲示板</h3>
  <div class="container">
    <label for="memo">何か入力してください:</label><br />
    <input type="text" id="memo" name="memo" size="70" maxlength="255" />
  </div>
  <input type="submit" value="add" />

  <?php while ($row = $stt->fetch()) { ?>
    <tr>
      <td><?php print(e($row['memo'])); ?></td>

      <td<a href="index.php?sid=<?php print(e($row['sid']))">編集<a/></td>
    </tr>
  <?php } ?>
</p>
</form>
</body>
</html>

<?php
if(isset($_GET['add'])){
  //追加
  $item = $_GET['item'];
  $item = htmlspecialchars($item, ENT_QUOTES);
  $error =""
  if($item === ""){
    $error = "メモが入力されていません"
  } else {
    $sql = 'INSERT INTO list (item) VALUES (:item)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':item', $item);
    $stmt->execute();
  }
}else if(isset($_GET['delete'])){
  //削除
  $no = $_GET['delete'];
  $sql = 'DELETE FROM list WHERE id=:id';
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(":id",$no);
  $stmt->execute();
  unset($no);
}
//エラーメッセージ
  catch(PDOException $e){
    die('エラーメッセージ:'.$e->getMessage());
  }

$stt->bindValue(':memo', $_POST['memo']);
$stt->exesute();

//DB切断
$db = NULL

/*$ichiran = file_get_contents('index.php');
if (@$_POST['toukou']) {
 $ichiran = htmlspecialchars($_POST['toukou']) . "<hr>$ichiran";
 file_put_contents('index.php', $ichiran);
}
echo $ichiran;
*/

?>
