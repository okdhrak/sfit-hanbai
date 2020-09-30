<?php echo "■新規会員登録がありました(SP)\n\n"; ?>
<?php echo "[ お名前 ]\n" . h($name) . "\n\n"; ?>
<?php echo "[ ふりがな ]\n" . h($kana) . "\n\n"; ?>
<?php echo "[ メールアドレス ]\n" . h($mail) . "\n\n"; ?>
<?php echo "[ 電話番号 ]\n" . h($tel) . "\n\n"; ?>
<?php echo "[ 都道府県 ]\n" . h($pref) . "\n\n"; ?>
<?php echo "[ 市区群町名・番地 ]\n" . h($address) . "\n\n"; ?>
<?php if ($kind) { echo "[ 探している物件種別 ]\n" . h($kind) . "\n\n"; } ?>
<?php if ($price) { echo "[ 希望予算 ]\n" . h($price) . "\n\n"; } ?>
<?php if ($area) { echo "[ 探しているエリア ]\n" . h($area) . "\n\n"; } ?>
<?php if ($etc) { echo "[ その他 ]\n" . h($etc) . "\n\n"; } ?>
