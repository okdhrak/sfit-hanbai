<?php echo "■お問合せページよりお問い合わせをいただきました\n\n"; ?>
<?php if ($kind) { echo "[ お問い合わせ種別 ]\n" . h($kind) . "\n\n"; } ?>
<?php if ($comment) { echo "[ お問い合わせ内容 ]\n" . h($comment) . "\n\n"; } ?>
<?php echo "[ お名前 ]\n" . h($name) . "\n\n"; ?>
<?php echo "[ ふりがな ]\n" . h($kana) . "\n\n"; ?>
<?php echo "[ メールアドレス ]\n" . h($mail) . "\n\n"; ?>
<?php echo "[ 電話番号 ]\n" . h($tel) . "\n\n"; ?>
<?php echo "[ 都道府県 ]\n" . h($pref) . "\n\n"; ?>
<?php echo "[ 市区群町名・番地 ]\n" . h($address) . "\n\n"; ?>
