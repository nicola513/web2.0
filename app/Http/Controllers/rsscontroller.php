<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class rsscontroller extends Controller
{
  public function loaddata(){

    //  $xml = "public/xml/rss.xml";
  //  $xml = simplexml_load_file('xml/rss.xml');

    $xmlDoc = new \DOMDocument();
    $xmlDoc->load('rss.xml');
    //$xmlDoc->load("xml/rss.xml");

    $channel=$xmlDoc->getElementsByTagName('channel')->item(0);
    $channel_title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
    $channel_link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
    $channel_desc = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

    echo("<p><a href='" . $channel_link . "'>" . $channel_title . "</a>");
    echo("<br>");
    echo($channel_desc . "</p>");

    $x=$xmlDoc->getElementsByTagName('item');

    for ($i=0; $i<3; $i++) {
      $item_title=$x->item($i)->getElementsByTagName('title')
      ->item(0)->childNodes->item(0)->nodeValue;
      $item_link=$x->item($i)->getElementsByTagName('link')
      ->item(0)->childNodes->item(0)->nodeValue;
      $item_desc=$x->item($i)->getElementsByTagName('description')
      ->item(0)->childNodes->item(0)->nodeValue;
      echo ("<p><a href='" . $item_link
      . "'>" . $item_title . "</a>");
      echo ("<br>");
      echo ($item_desc . "</p>");
  }

$rssData=[
  'channel_link'=>$channel_link,
  'channel_title'=>$channel_title,
  'channel_desc'=>$channel_desc,
  'item_link'=>$item_link,
  'item_title'=>$item_title,
  'item_desc'=>$item_desc,];

return view('rss', array('rssData'=>$rssData));

 }
}
