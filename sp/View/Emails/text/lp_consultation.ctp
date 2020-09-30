<?php echo "■相談会 来場予約・お問合せをいただきました(SP)\n\n"; ?>
<?php echo "----------------------------------------------------\n\n"; ?>
<?php echo "□来場時間・お問合せについて\n\n"; ?>
<?php echo "[ 来場予約/お問合せ ]\n" . h($book) . "\n\n"; ?>
<?php if ($book_m || $book_d || $book_t) { echo "[ 予約時間 ]\n"; } ?>
<?php if ($book_m) { echo h($book_m) . "月"; } ?>
<?php if ($book_d) { echo h($book_d) . "日"; } ?>
<?php if ($book_t) { echo h($book_t) . "頃"; } ?>
<?php if ($book_m || $book_d || $book_t) { echo "\n\n"; } ?>
<?php echo "----------------------------------------------------\n\n"; ?>
<?php echo "□お客様について\n\n"; ?>
<?php echo "[ お名前 ]\n" . h($name) . "\n\n"; ?>
<?php echo "[ ふりがな ]\n" . h($kana) . "\n\n"; ?>
<?php echo "[ 連絡先 ]\n" . h($contact) . "\n\n"; ?>
<?php echo "----------------------------------------------------\n\n"; ?>
<?php echo "□アンケート\n\n"; ?>
<?php echo "[ 希望物件種別 ]\n" . h($kind) . "\n\n"; ?>
<?php if ($area) { echo "[ 希望エリア ]\n" . h($area) . "\n\n"; } ?>
<?php if ($comment) { echo "[ その他要望等 ]\n" . h($comment) . "\n\n"; } ?>
