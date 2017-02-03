<?

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
// // Read in a page
 $html = scraperwiki::scrape("http://www.ebay.com/sch/i.html?_from=R40&_trksid=p2050601.m570.l1313.TR0.TRC0.H0.XAmerican+Revolutionary+War&_nkw=American+Revolutionary+War&_sacat=0");
//
// // Find something on the page using css selectors

$max_loop = 5;

for($i=0;$i<=$max_loop;$i++){
 $dom = new simple_html_dom();
 $dom->load($html);
 //$r = $dom->find("h3.lvtitle");
 //*[contains(@class, '$classname')] 
 $r = $dom->find("a.vip");
 $m = $dom->find("li.lvprice");
 //echo strip_tags($r[0]). "<br>";
 echo "Product Title :" . $r[$i] . "\n";
 echo "Product Price: " . $m[0] . "<br>"
}
?>
