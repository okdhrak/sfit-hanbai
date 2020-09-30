<?php echo "■物件のリクエストをいただきました(SP)\n\n"; ?>
<?php echo "----------------------------------------------------\n\n"; ?>
<?php echo "[ 物件の種別 ]\n" . h($m_kind) . "\n\n"; ?>
<?php echo "[ ご希望の住所 ]\n" . h($m_address) . "\n\n"; ?>
<?php echo "[ ご希望の路線 ]\n" . h($m_line) . "\n\n"; ?>
<?php if ($m_extent) { echo "[ 建物(専有)面積 ]\n" . h($m_extent) . h($m_extent_unit) . "\n\n"; } ?>
<?php if ($m_site) { echo "[ 土地面積 ]\n" . h($m_site) . h($m_site_unit) . "\n\n"; } ?>
<?php if ($m_type) { echo "[ 間取り ]\n" . h($m_type) . "\n\n"; } ?>
<?php if ($m_price) { echo "[ ご希望価格 ]\n" . h($m_price) . "万円位" . "\n\n"; } ?>
<?php if ($m_replacing) { echo "[ お買い換え ]\n" . h($m_replacing) . "\n\n"; } ?>
<?php if ($m_period) { echo "[ 購入希望時期 ]\n" . h($m_period) . "\n\n"; } ?>
<?php if ($m_comment) { echo "[ その他ご要望 ]\n" . h($m_comment) . "\n\n"; } ?>
<?php echo "----------------------------------------------------\n\n"; ?>
<?php echo "[ お名前 ]\n" . h($name) . "\n\n"; ?>
<?php echo "[ ふりがな ]\n" . h($kana) . "\n\n"; ?>
<?php echo "[ メールアドレス ]\n" . h($mail) . "\n\n"; ?>
<?php echo "[ 電話番号 ]\n" . h($tel) . "\n\n"; ?>
<?php echo "[ 都道府県 ]\n" . h($pref_str) . "\n\n"; ?>
<?php echo "[ 市区群町名・番地 ]\n" . h($address) . "\n\n"; ?>
