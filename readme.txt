=== Pixnet 痞客邦部落格搬家匯入工具 ===
Contributors: mxp
Donate link: https://mxp.tw/lw
Tags: Mxp.TW, Pixnet2WP, 搬家, 中文, Pixnet, 匯入工具, 部落格, 痞客邦
Requires at least: 4.7
Requires PHP: 5.4
Tested up to: 6.0
Stable tag: 2.2.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

提供 Pixnet 痞客邦的部落客夥伴一個優質搬家匯入 WordPress 的工具！


== Description ==

This plugin will use our [API services](https://api.undo.im/wp-json/mxp_pchome2wp/v1/app) helping you to move blog posts to WordPress from Pixnet. If you `DO MIND` sending the data you give or you do not know what you are doing, please `DO NOT` use this plugin. Thank you.

此外掛會透過我們的 [API](https://api.undo.im/wp-json/mxp_pchome2wp/v1/app) 搬家服務來進行匯入 WordPress 網站的操作，期間將會向使用者收集 Pixnet 痞客邦部落格的帳號資訊，若不同意這項操作或不知道自己正在做什麼，請不要使用這款外掛，謝謝！

× 感謝[Alice's Dream羊毛氈手作坊](https://woolwoolfelt.com/)贊助外掛圖像設計！

### 使用教學影片

https://youtu.be/JZ44lfzjQ4M

特色(Features):

1. 完整匯入痞客邦文章、影像照片檔案、文章標籤（[進階授權專屬](https://mxp.tw/oI)）、留言（[進階授權專屬](https://mxp.tw/oI)）、版主回覆（[進階授權專屬](https://mxp.tw/oI)）
2. 匯入 WordPress 時彈性設定對應新分類
3. 可指定匯入文章
4. SEO 友善規劃（需配合作者架構完成轉移）
5. 內文HTML標籤整理，彈性配合各種主題
6. 自己來就很行，幾乎不需要問人了ＸＤ

需求(Requirements):

1. WordPress 4.7 以上
2. Linux 伺服器環境（作者尚未在Windows環境下測試過）
3. PHP 5.4.0 以上（建議 PHP 7）


== Installation ==

* 一般

> 進入網站後台，「外掛」->「安裝外掛」搜尋此外掛名稱

* 進階

1. 上傳外掛至外掛目錄 `wp-content/plugins/` 下。 Upload the plugin files to the `/wp-content/plugins/` directory
2. 於後台外掛功能處啟動外掛。 Activate the plugin through the 'Plugins' screen in WordPress
3. 啟用後在後台選單可找到「Pixnet 文章匯入工具」進行參數調整。 Use the 「Pixnet 文章匯入工具」 screen to configure the plugin
4. 完成。 Done


== Screenshots ==

1. **Pixnet 搬家工具設定頁（一般使用）** - 在此頁面輸入以及設定相關資料，準備開始搬家。

2. **Pixnet 搬家工具設定頁（授權進階）** - 在此頁面輸入以及設定相關資料，準備開始搬家。

3. **分類匯入工具頁** - 輸入痞客邦分類資訊後開始操作匯入第一階段。

4. **文章匯入頁面** - 選擇全部批次匯入或個別匯入文章的方式。 


== Frequently Asked Questions ==

= 這個外掛如何協助你搬家的？ How this plugin work? =

(English description below)
我們將會透過你提供的 Pixnet 痞客邦帳號資料開始進行網站分析擷取，並透過我們搬家服務的 [API](https://api.undo.im/wp-json/mxp_pchome2wp/v1/app) ，回傳匯入網站的部落格文章來完成搬家。

- 如果不同意或對此項操作有所疑慮，請不要使用，謝謝。

This plugin will use our [API services](https://api.undo.im/wp-json/mxp_pchome2wp/v1/app) for receiving your Pixnet Blog information and detect who is the pay membership in using and receiving your requests to move Pixnet Blog posts to your WordPress site.

- If you `DO MIND` sending the data you give or you do not know what you are doing, please `DO NOT` use this plugin. Thank you.

= 如何找到痞客邦分類編號 =

進入痞客邦首頁後右側邊欄的「文章分類」即是目前痞客邦分類，複製分類連結後即可觀察

`http://你的痞客邦帳號.pixnet.net/category/分類數字編號`

= 正確的匯入轉移網站流程 =

1. 確定好你要的網域名稱
2. 找一個穩定的主機安裝好最新版的 WordPress
3. 後台外掛搜尋 `Pixnet2WP` 安裝此外掛
4. 更新「固定網址」為 `文章名稱`
5. 開啟外掛「文章匯入設定」頁面，輸入痞客邦名稱以及編號後，點擊更新資訊儲存
6. 至「文章匯入工具」頁按照畫面說明開始從痞客邦分類對應匯入回 WordPress 分類吧！
7. 或者，你可以考慮[聯絡作者](https://www.mxp.tw/contact/)付費協助。

= 碰到問題怎回報？ =

可以透過粉絲頁、網站或是個人臉書找到我。

臉書：[點此](https://www.facebook.com/mxp.tw)

粉絲頁： [點此](https://www.facebook.com/a.tech.guy)

網站：[聯絡我](https://www.mxp.tw/contact/)

== Changelog ==

= 2.2.2 =

* 新增不匯入標籤的選項

= 2.2.0 =

* 調整收費方案，更新外掛內文案。

= 2.1.2 =

* 修正分析HTML結構造成匯入內容丟失問題
* 支援版本上調 WordPress 5.9

= 2.1.1 =

* 修正圖片抓取時間過長問題，連結超過 5秒、下載超過 15秒的圖片就跳掉不抓了

= 2.1.0 =

* 修正圖片抓取判斷錯誤問題，圖片結構正規化處理
* 修正媒體庫重複匯入問題（檔案沒重複）

= 2.0.9 =

* 修正相對路徑圖片抓取判斷錯誤問題
* 新增重新匯入時也重新下載圖片的選項

= 2.0.8 =

* 修正重複下載圖片時會影響精選圖片的問題

= 2.0.7 =

* 修正下載圖片時能跟進轉址的問題

= 2.0.6 =

* 新增重新設定匯入狀態功能
* 修正重複新增圖片資料問題
* 修正重複發文與留言的問題

= 2.0.5 =

* 修正文章標題過濾HTML問題

= 2.0.4 =

* 更新支援 WordPress 版本至 5.2
* 修正文章列表顯示錯誤問題

= 2.0.3 =

* 更新支援 WordPress 版本至 5.1

= 2.0.2 =

* 更改更新使用方法避免錯誤
* 新增說明頁與補上導流量的JS程式碼片段於說明頁面

= 2.0.1 =

* 強化下載圖片方式，穩定處理下載圖片。

= 2.0.0 =

* 繼承 PChome2WP 外掛來處理痞客邦搬家
* 20180613 提交上架

更早版本略- -

== Upgrade Notice ==

無