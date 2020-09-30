<?php
class SiteUtilHelper extends AppHelper {
	
	public function printRegistedPhoto($id, $cat){
		
		if ($dir = opendir($this->getRegistedPhotoPath($id))) {
			
			$imageListHtml = '<ul class="photoList">';
			
			while (($file = readdir($dir)) !== false) {
				if ($file != '.' && $file != '..') {
					if ($this->checkCategory($file, $cat)) {
					$imageListHtml .= '<li id="' . $this->getImageId($file) . '">';
					$imageListHtml .= '<p><img src="' . $this->getImagePath($id) . $file . '" height="80"></p>';
					$imageListHtml .= $this->Html->link('×削除', '#', array('class' => 'delete-photo', 'data-article-id' => $id, 'data-photo-id' => $this->getImageId($file)));
					$imageListHtml .= '</li>';
					}
				}
			}
			
			$imageListHtml .= '</ul>';
			closedir($dir);
		}
		
		return $imageListHtml;
	}
	
	public function getOldYearList(){
		$this_year = date('Y');
		/*for ($i = $this_year; ) {
			
		}*/
	}
	
	/**
	 * トピックスコメントの適正化
	 *
	 * @param string $value
	 * @return string 表示文字数を制限し改行を除く
	 */
	public function adjustComment($value) {
		return mb_strimwidth(str_replace(array("\r\n","\n","\r"), '', $value), 0, 45, '...', 'UTF-8');
	}
	
	/**
	 * トピックスURLの適正化
	 *
	 * @param string $value
	 * @return string リンクの登録があれば<a>タグで囲う
	 */
	public function adjustLink($value) {
		return sprintf("<a href=\"$value\" target=\"_blank\">%s</a>", $value);
	}
	
}
