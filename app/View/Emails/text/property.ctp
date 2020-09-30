<?php echo "■物件お問合せページよりお問い合わせをいただきました\n\n"; ?>
<?php echo "----------------------------------------------------\n"; ?>
<?php if ($d_name) { echo "物件名：" . h($d_name) . "\n"; } ?>
<?php if ($d_mid) { echo "管理番号：" . h($d_mid) . "\n"; } ?>
<?php echo "----------------------------------------------------\n\n"; ?>
<?php echo "[ お問合せ種別 ]\n" . h($kind) . "\n\n"; ?>
<?php if ($comment) { echo "[ お問合せ内容 ]\n" . h($comment) . "\n\n"; } ?>
<?php echo "[ お名前 ]\n" . h($name) . "\n\n"; ?>
<?php echo "[ ふりがな ]\n" . h($kana) . "\n\n"; ?>
<?php echo "[ メールアドレス ]\n" . h($mail) . "\n\n"; ?>
<?php echo "[ 電話番号 ]\n" . h($tel) . "\n\n"; ?>
<?php echo "[ 都道府県 ]\n" . h($pref_str) . "\n\n"; ?>
<?php echo "[ 市区群町名・番地 ]\n" . h($address) . "\n\n"; ?>
