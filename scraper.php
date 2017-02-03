<?

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
// // Read in a page
 $html = scraperwiki::scrape("http://www.ebay.com/sch/i.html?_from=R40&_trksid=p2050601.m570.l1313.TR0.TRC0.H0.XAmerican+Revolutionary+War&_nkw=American+Revolutionary+War&_sacat=0");
//
// // Find something on the page using css selectors

function html2text($Document) {
    $Rules = array ('@<script[^>]*?>.*?</script>@si',
                    '@<[\/\!]*?[^<>]*?>@si',
                    '@([\r\n])[\s]+@',
                    '@&(quot|#34);@i',
                    '@&(amp|#38);@i',
                    '@&(lt|#60);@i',
                    '@&(gt|#62);@i',
                    '@&(nbsp|#160);@i',
                    '@&(iexcl|#161);@i',
                    '@&(cent|#162);@i',
                    '@&(pound|#163);@i',
                    '@&(copy|#169);@i',
                    '@&(reg|#174);@i',
                    '@&#(d+);@e'
             );
    $Replace = array ('',
                      '',
                      '',
                      '',
                      '&',
                      '<',
                      '>',
                      ' ',
                      chr(161),
                      chr(162),
                      chr(163),
                      chr(169),
                      chr(174),
                      'chr()'
                );
  return preg_replace($Rules, $Replace, $Document);
}

$max_loop = 5;
for($i=0;$i<=$max_loop;$i++){
 $dom = new simple_html_dom();
 $dom->load($html);
 //$r = $dom->find("h3.lvtitle");
 //*[contains(@class, '$classname')] 
 $r = $dom->find("a.vip");
 $m = $dom->find("li.lvprice");
 //echo strip_tags($r[0]). "<br>";
 //echo "Product Title :" . $r[$i] . "\n";
 //echo "Product Price: " . $m[0] . "<br>";
 
 $product_title = preg_replace(array('"<a (.*?)>"', '"</a>"'), array('',''),  $r[$i]);
 $product_price = preg_replace(array('"<a href(.*?)>"', '"</a>"'), array('',''), $m[$i]);
 //echo "Product Title" . $product_title . "<br>";
// echo "Product Price" . $product_price . "<br>";
 //echo preg_replace($Rules, $Replace, $r[$i]);
 echo "Product Title: " . strip_tags($r[$i]) . "\n\n\n";
 echo "Product Price:"  . strip_tags($m[$i]) . "\n\n\n";
 
 
 
}
?>
