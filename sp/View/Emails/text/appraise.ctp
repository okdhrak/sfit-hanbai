<?php echo "■ご売却・ご相談、審査のお申込みをいただきました(SP)\n\n"; ?>
<?php echo "----------------------------------------------------\n\n"; ?>
<?php echo "[ 売却物件/種別 ]\n" . h($m_kind) . "\n\n"; ?>
<?php if ($m_name) { echo "[ 建物名 ]\n" . h($m_name) . "\n\n"; } ?>
<?php echo "[ 売却物件/郵便番号 ]\n" . "〒" . h($m_pcode1) . "-" . h($m_pcode2) . "\n\n"; ?>
<?php echo "[ 売却物件/都道府県 ]\n" . h($m_pref_str) . "\n\n"; ?>
<?php echo "[ 売却物件/市区群町名・番地 ]\n" . h($m_address) . "\n\n"; ?>
<?php if ($m_extent) { echo "[ 建物(専有)面積 ]\n" . h($m_extent) . h($m_extent_unit) . "\n\n"; } ?>
<?php if ($m_site) { echo "[ 土地面積 ]\n" . h($m_site) . h($m_site_unit) . "\n\n"; } ?>
<?php if ($m_type) { echo "[ 間取り ]\n" . h($m_type) . "\n\n"; } ?>
<?php if ($m_old['year'] || $m_old['month']) { echo "[ 築年数 ]\n" . h($m_old['year']) . '年' . h($m_old['month']) . '月' . "\n\n"; } ?>
<?php if ($m_price) { echo "[ ご希望価格 ]\n" . h($m_price) . "万円位" . "\n\n"; } ?>
<?php if ($m_replacing) { echo "[ お買い換え ]\n" . h($m_replacing) . "\n\n"; } ?>
<?php if ($m_period) { echo "[ 売却希望時期 ]\n" . h($m_period) . "\n\n"; } ?>
<?php if ($m_comment) { echo "[ その他ご要望 ]\n" . h($m_comment) . "\n\n"; } ?>
<?php echo "----------------------------------------------------\n\n"; ?>
<?php echo "[ お名前 ]\n" . h($name) . "\n\n"; ?>
<?php echo "[ ふりがな ]\n" . h($kana) . "\n\n"; ?>
<?php echo "[ メールアドレス ]\n" . h($mail) . "\n\n"; ?>
<?php echo "[ 電話番号 ]\n" . h($tel) . "\n\n"; ?>
<?php echo "[ 都道府県 ]\n" . h($pref_str) . "\n\n"; ?>
<?php echo "[ 市区群町名・番地 ]\n" . h($address) . "\n\n"; ?>
