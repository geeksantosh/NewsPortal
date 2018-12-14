<?php
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<br>

<?php
echo '<iframe src="https://www.facebook.com/plugins/share_button.php?href='.$actual_link.'&layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId" width="83" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';
?>

       
  <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="<?php echo htmlentities($row['posttitle']);?>" data-via="npnewsb" data-hashtags="elighttechnical" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>'
  <script src="http://platform.linkedin.com/in.js" type="text/javascript">
    lang: en_US
</script> 
