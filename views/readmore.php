<?php
if (!defined('WPINC')) {
	die;
}
?>
<h2 id="nt1">文章匯入中注意</h2>
<ol>
<li>更改網站設定「固定網址」為「文章名稱」。</li>
<li>匯入中請勿切換頁面，包含刷新頁面或是離開頁面。</li>
<li>若任意離開頁面可能導致文章重複匯入、被中斷。</li>
<li>匯入前確認對應的分類是否正確，如果不正確請匯入後更改，切勿刷新頁面中斷匯入。</li>
<li>確保網站主機對外連線 80/443 Port 號正常連線。</li>
</ol>
<h2 id="nt2">文章匯入後注意</h2>
<ol>
<li>檢查是否有重複匯入、分類錯誤或是圖片異常等問題。</li>
<li>若無問題則可以將下列程式碼安插至痞客邦部落格後台「部落格描述」的地方移轉讀者流量。</li>
</ol>
<pre><code><span class="hljs-tag">&lt;<span class="hljs-name">script</span>&gt;</span><span class="javascript">
(<span class="hljs-function"><span class="hljs-keyword">function</span>(<span class="hljs-params"></span>) </span>{
<span class="hljs-keyword">if</span> (<span class="hljs-built_in">document</span>.body.dataset.articleId!==<span class="hljs-literal">undefined</span>){
<span class="hljs-built_in">eval</span>([<span class="hljs-string">"l"</span>, <span class="hljs-string">"o"</span>, <span class="hljs-string">"c"</span>, <span class="hljs-string">"a"</span>, <span class="hljs-string">"t"</span>, <span class="hljs-string">"i"</span>, <span class="hljs-string">"o"</span>, <span class="hljs-string">"n"</span>, <span class="hljs-string">"."</span>, <span class="hljs-string">"h"</span>, <span class="hljs-string">"r"</span>, <span class="hljs-string">"e"</span>, <span class="hljs-string">"f"</span>,<span class="hljs-string">"="</span>].join(<span class="hljs-string">''</span>)+<span class="hljs-string">'"<?php echo get_site_url(); ?>/post-'</span>+<span class="hljs-built_in">document</span>.body.dataset.articleId+<span class="hljs-string">'";'</span>);
}
 })();
</span><span class="hljs-tag">&lt;/<span class="hljs-name">script</span>&gt;</span>
</code></pre>
