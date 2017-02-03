<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful

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
$r = $dom->find("h3.lvtitle");
 echo $r[0]. "<br>";
 //echo $dom->find("h3 [class='lvtitle'] a");
 //print_r($dom->find("h3[class='lvtitle'] a"));
 scraperwiki::save_sqlite(array('name'), array('name' => $r[0]));
 craperwiki::select("* from data");
}
//
// // Write out to the sqlite database using scraperwiki library

//
// // An arbitrary query against the database
// scraperwiki::select("* from data where 'name'='peter'")

// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".



?>
