<?

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
// // Read in a page
 $html = scraperwiki::scrape("http://www.ebay.com/sch/i.html?_from=R40&_trksid=p2050601.m570.l1313.TR0.TRC0.H0.XAmerican+Revolutionary+War&_nkw=American+Revolutionary+War&_sacat=0");
//

$count= 0;
$max_loop = 50;
for($i=0;$i<=$max_loop;$i++){
 $dom = new simple_html_dom();
 $dom->load($html);

 $r = $dom->find("a.vip");
 $m = $dom->find("li.lvprice");

 if($r[$i]  || $m[$i] !=""){ $count++}
 echo "Product Title: " . strip_tags($r[$i]) . "\n";
 str_replace(' ', '', $old_str);
 $p_text = strip_tags($m[$i]);
 $no_ws =  preg_replace('/\s+/', '', $p_text);
 echo "Product Price:"  . $no_ws . "\n\n\n\n\n";
 
}
?>
