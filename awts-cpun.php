<?php
/**
 * Plugin Name: Awts Click to Get Coupon code box
 * Plugin URI: https://www.mskian.com
 * Description: Awts Click to Get Coupon box helps promote your affiliate links and coupons.Shortcode [ccpn link="Your Affiliate link" ddl="Your Coupon Code" /]
 * Version: 1.0
 * Author: Santhosh veer
 * Author URI: https://santhoshveer.com
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */


// Plugin CSS File
add_action('wp_head','awtscp_css');
function awtscp_css() {

$output="<style>
.mmv {
background-color: #c82127;
color: white;
padding: 3px;
text-shadow: -1px -1px 0px #000000;
box-shadow: -2px 2px 3px #000;
padding-left: 10px;
margin-bottom: 7px;
text-align: center;
}
.mmv a {color: #ffffff; border-bottom: 1px dotted;}
.coupon_deal .label {padding: 4px 15px 10px; background-color: #fff; color: #c82127; margin: 0 8px 0 0;border-bottom: 2px solid #DEDDDD; font-size: 25px;}
.coupon_deal .fa {  vertical-align: middle;}
.coupon_deal {padding: 24px 23px 28px; margin-bottom: 19px; background-color: #eeeeee;  color: #3498db;  border-radius: 3px;}
.activatedeal {padding: 13px 20px 13px 0; margin: 0 3% 0 0; color: #fff !important; background-color: #c82127; border-bottom: 2px solid #9A1015;}
.deal_box1 {width: 31.3333%;margin: 0 3% 3% 0;}
.coupon_deal  cite {  padding: 12px 20px; border: 1px dashed;  border-radius: 3px; }
.coupon_deal .label {
  margin: 0 8px -1px 0;
  display: inline-block;
}
.coupon_deal cite {
  display: inline-block;
  margin: 24px 0 0 0;
  width:100%;
}
.activatedeal {
  display: inline-block;
  width: 100%;
  margin: 0 0% 0 0;
  padding: 0 0;
}
.coupon_deal {
  padding: 19px 14px 18px;
}
.coupon_deal .couponcode {
  display: inline-block;
  width: 50%;
  font-size: 14px;
  vertical-align:middle;
}
.coupon_deal cite {
  margin: 16px 0 0 0;
}
.coupon_deal .label {
  width: 17%;
  padding: 9px 20px 13px;
}
.coupon_deal .fa {
  font-size: 20px;
}
.archive-title {
  font-size: 15px;
  display: block;
}
.coupon_deal .label {
  width: 16%;
  padding: 7px 15px 11px;
}
</style>";

echo $output;

}

// Plugin Js File
add_action( 'wp_footer', 'cppun_post_javascript' );
function cppun_post_javascript() { ?>

<script type="text/javascript">
var $j=jQuery.noConflict();
$j(".vvdeal").click(function(){
        var dtyp = $j(this).attr("dealcoupon");
        var durl = $j(this).attr("dealhref");
        if(dtyp == "Deal"){
            window.open(durl);
        } else {
            $j(".coupon_deal cite").html(dtyp);
            window.open(durl);
        }
    });
</script>

<?php
}


//Awts Click to Get Coupon 
function awts_cpdeals( $atts, $content = null) {

// Attributes
$atts = shortcode_atts(
array(
'link' => '#',
'ddl' => '',
),
$atts,
'myinlink'
);

// Return custom embed code
return '<div class="coupon_deal">
<div class="mmv"><strong>Click to see Code & visit site</strong> ➜ <strong><a dealcoupon="' . $atts['ddl'] . '" dealhref="' . $atts['link'] . '" class="vvdeal">[SIGN UP NOW]</a></strong></div>
<cite>Coupon code will be shown here</cite>
</div>';
}

add_shortcode( 'ccpn', 'awts_cpdeals' );


function awtscppn_activate() {

    $url = get_site_url();
  $message = "Your Plugin has activated on $url ";
  $message = wordwrap($message, 70, "\r\n");

  wp_mail('hello@mskian.com', 'click to get coupon System Plugin Activated', $message);
}
register_activation_hook( __FILE__, 'awtscppn_activate' );

?>
