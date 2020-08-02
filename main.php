<?php
require_once dirname(__FILE__) . "/TarotReading.php";
require_once dirname(__FILE__) . "/TarotCard.php";
 
$tarot = new TarotReading();
 
// カードを用意 TarotCard(名前, 正位置での意味, 逆位置での意味)
$deck = array(
    new TarotCard('The Fool ＜愚者＞',           '自由・無邪気', '軽率・愚行'),
    new TarotCard('The Magician ＜魔術師＞',       '始まり・才能', '無気力・空回り'),
    new TarotCard('The High Priestess ＜女皇帝＞', '知性・平常心', 'わがまま・不安定'),
    new TarotCard('The Empress ＜女帝＞',        '豊穣・繁栄', '挫折・嫉妬'),
    new TarotCard('The Emperor ＜皇帝＞',        '支配・強い責任感', '傲慢・勝手'),
    new TarotCard('The Hierophant ＜教皇＞',     '慈悲・協調性', '束縛・独りよがり'),
    new TarotCard('The Lovers ＜恋人＞',         '絆・情熱', '失恋・不道徳'),
    new TarotCard('The Chariot ＜戦車＞',        '勝利・成功', '暴走・失敗'),
    new TarotCard('Strength ＜力＞',           '意思・勇気', '甘え・優柔不断'),
    new TarotCard('The Hermit ＜隠者＞',         '深慮・単独行動', '無計画・閉鎖的'),
    new TarotCard('Wheel of Fortune ＜運命の輪＞',   'チャンス・幸運', '不運・悪化'),
    new TarotCard('Justice ＜正義＞',            '公平・善行', '不正・偏向'),
    new TarotCard('The Hanged Man ＜吊るされた男＞',     '忍耐・努力', 'やせ我慢・徒労'),
    new TarotCard('Death ＜死神＞',              '破滅・死', '再生・再出発'),
    new TarotCard('Temperance ＜節制＞',         '調和・自制', '浪費・生活の乱れ'),
    new TarotCard('The Devil ＜悪魔＞',          '欲望・堕落', '意地・悪循環'),
    new TarotCard('The Tower ＜塔＞',          '崩壊・悲劇', '緊迫・不慮の災い'),
    new TarotCard('The Star ＜星＞',           '希望・ひらめき', '失望・高望み'),
    new TarotCard('The Moon ＜月＞',           '不安定・潜在的な危険', '徐々に好転・漠然とした希望'),
    new TarotCard('The Sun ＜太陽＞',            '祝福・誕生', '衰退・落胆'),
    new TarotCard('Judgement ＜審判＞',          '復活・発展', '悔恨・行き詰まり'),
    new TarotCard('The World ＜世界＞',          '完全・成就', '未完成・臨界点')
);
 
$tarot->set_deck($deck);
 
// シャッフル
$tarot->shuffle_deck(true);
 
// カードを引く
$max = 3;   // 枚数
 
$result = array();
for($i=0;$i<$max;$i++){
    $card = $tarot->draw_card(); // カードを引く
     
    // 山札が切れた時
    if($card === false){
        $tarot->reset_deck();
        $tarot->shuffle_deck(true);
        $card = $tarot->draw_card();
    }
     
    $result[$i] = $card;
}
 
$header = array('過去', '現在', '未来');  // 見出し
 
function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
 
header("Content-type: text/html;");
?>
<!DOCTYPE html>
<head>
<title>タロットカード占い</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<p><img src="images/tarot.png" width="300"></p>
<table>
<?php
for($i=0;$i<$max;$i++){
    $position = ($result[$i]->position == 'reversed') ? '逆位置' : '正位置';
    $format = <<<EOD
    <table>
    <tr>
      <th>%s</th>
      <td>%s</td>
      <td>%s</td>
      <td>%s</td>
    </tr>
    </table>
EOD;
    printf($format, h($header[$i]), h($result[$i]->name), h($position),
        h($result[$i]->get_meaning()));
}
?>
</table>
  <a href="index.html">トップページ</a>
</body>
</html>
