<? include("../variable.php")?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<style>
.hellobox{
color:bule;
padding:1px;
letter-spacing:3px;
line-height:24px;
font-weight:300;
font-size:16px
}  
</style>
</head>
<?php
    $cnt_array=file("cnt_e02.txt"); /* 將cnt.txt檔案內容讀入，資料型態為陣列 */
	$cnt = implode("", $cnt_array);
	if ($si_counter_e02 <> true) {
	$cnt++;//累計加1
	$cnt_id=fopen("cnt_e02.txt","w"); /* 將cnt.txt檔案開啟，函數參數為w */
	fputs($cnt_id,$cnt); /* 將新的計數寫入 */
	fclose($cnt_id); //關閉檔案
	$si_counter_e02 = true;
	}
?>
<body bgcolor="#FFFFCC">
<div align="center"><font color="#0000FF">凌和遊戲（二）</font> </div>
<table width="100%" border="0" class= "hellobox">
  <tr> 
    <th align="center"></td>
  </tr>
  <tr> 
    <td><p>當小凌將【弱不禁風】緊繫於我的左腳上後，我知道從此刻開始，我的肩膀上多了份責任。
	    <br> 我倆沿著小路往機車停放處回走，小凌才慢慢回復她的心緒。
        <br>當我站在我的摩托車上時，月兒擺脫了烏雲。柔和的月光映在小凌的臉龐。
		<br>忽然間，我第一次感受到她的美，這並非說她長的不漂亮。
        <br>那感覺像是去阿里山看日出與在家看日出，同一個太陽，卻有不同的震撼．．。
        <br>老實說，本來只是單純的送禮物，因為她一直追問，所以我故意引導暗示她，給她我要吻她的錯覺，也好歹我送了個【弱不禁風】，加上經典的連續劇台詞才讓她在感動之餘，忘記找我算帳。
        <br>算起來，那時我倆才交往三個星期，我們家族世代保守，管教甚嚴。所以交往前，爸媽怕我過於急進，要我草擬了一份『交往進度計劃』。
        <br>內有短、中、長三個目標及一個原則，目標與原則抵觸時無效。
        <br>短期目標為＜內野安打＞。
        <br>中期目標為＜外野安打＞。
        <br>長期目標為＜站上最近的得分點＞。
        <br>原則即是堅守「不抗不拒」。而這個原則，可說是我由個人史萃取出來的精要，也不知這算不算是人類進化的證據。
        <br>「不抗」源於小如，記得有一次一伙人幫小如慶生，臨別時，我對小如說：「我的禮物放在機車上」。小如隨我到機車邊，我順手從口袋拿出最後一片青箭口香糖，在我拆開要吃的同時，我倆四目交會，我就把口香糖遞到小如面前，詢問小如要不要吃，遲疑間，小如咬了半截口香糖，望著剩下的半截，我的小腦袋剎那湧入二個問題，第一她的意圖為何？看看四周，也沒發現伏兵．．．，第二我要吃嗎？一咬牙，我彷彿化身烏江旁的項羽，隨即我吃下去了，我只能說我沒有做到「不抗」的極致．．．。
        <br>「不拒」出自小妃，那天一群朋友一起出去玩，晚上到台北車站吃飯，飯局間我開玩笑的跟小妃說散會時我送她回家，在大家一一道別後，小妃問我不是要送她回家嗎？我跟她抱歉，因為我沒騎車，下次再送她好了。沒想到小妃說要在台北等我，要我回家騎車。我跟小妃說我坐車回家，再騎車到此要二小時。小妃說沒關係，我問小妃從台北坐車回到家要多久，她回答約二小時，我就分析給她聽，如果你把等我來的時間，拿去坐車，就可以回到家了。所以我送她去坐車，我知道這是一個豬頭的決定，也才孕育出「不拒」。
        <br>回神後，我望著她的雙眸，對她說：「我想吻你」。
        <br>她有點不知所措，目光朝下，然後順手指著機車把手上的按鈕，問我：「那是什麼」。
		<br>我看了一下她所指的東西，心想：「我能接受小凌拒絕，但我不能接受她逃避」。
		<br>隨即回答她：「方向燈開關」，也用這輩子最快的速度一併把機車左右把手上的發動鈕、大燈開關、喇叭．．．全部介紹一遍。
        <br>再次回望著小凌，開口對她說：「我想吻你」。
        <br>只見她的頭微微下傾，靜聲不語．．．。
        <br>那時我有想過要把她的頭搬正，吻下去。
        <br>不過這誘人的想法只在我腦中逗留了三秒鐘，忽然間有股無力感湧入我心頭，讓我覺得就算我用盡吃奶的力氣也無法抬起她的頭，或許是我覺得她還沒Ready吧．．．。
        <br>不久後我對小凌說：「上車吧，我送你回家」。
        <br>她又哭了，抓著我的手臂輕搖，也沒有上車的意思．．．。
        <br>我倆就這樣僵持在那，空氣好像凝固了．．．。
        <br>小凌打破沈默說：「這�埵酗H」。
        <br>我望向四周，也不知何時聚集這麼多人。
        <br>隨即陷入自己的沈思中，為什麼我們要在意別人？難道每次要接吻前，我都要先『清場』嗎．．．？
        <br>細雨緩緩飄下，把我拉回思緒，我深深的望向她的雙眸．．．。
        <br>雨勢加大，我隨即催促小凌趕快上車。
        <br>急駛回小凌家途中，她對我說：「不是不讓你吻，只是人太多了」。
        <br>一直到小凌家門口，雨勢驟大，小凌脫掉她的防水外套借我。
        <br>我拒絕了．．．，我想淋雨，我相信雨水可以幫助我思考。
        <br>小凌溫馴的對我說：「下次再繼續吧」．．．。
        <br>我還來不及答話，小凌已轉身往家�媔]。
        <br>望著她的身影，我也不知道我們的距離是拉近還是拉遠？
		<br>這個世界上，真的有最佳解嗎？
        <br>我相信有，而這答案．．．一直到以後，我才明白。
</p>
</td>
  </tr>
  <tr> 
	<td align="right">您可至<a href="/dobbook/index.php">留言板</a>，或<a href="mailto:usedbook@supply.com.tw">寄信</a>給我們您寶貴的意見！</td>   
  </tr>
    <tr> 
     <td align="right">以上文章由<a href="index.php">使仆來電腦類二手書</a>提供，本故事預計出三集。</td>
  </tr>
</table>
</body>
</html>
