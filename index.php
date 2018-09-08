<?php
/**
 * @package    vnstat-very-simple-php-frontend
 * @author     Iranian Patriot <sunchi at bioid dot ir>
 * @copyright  2018 The Iranian Patriot Group
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html
 * @version    Release: 1
 */
require 'settings.php';

$data_path = dirname(__FILE__);
$command_remove_all_png = "rm ".$data_path."/data/*.png";
$output = shell_exec("$command_remove_all_png");

$vnstati_cmd = "/usr/bin/vnstati";
$iface = "eth0";
$date = date("Y_m_d_h_i_sa");

$image_sum_file_name = "data/".strval($date)."_sum.png";
$image_day_file_name = "data/".strval($date)."_day.png";
$image_month_file_name = "data/".strval($date)."_month.png";
$image_hour_file_name = "data/".strval($date)."_hour.png";
$image_top10_file_name = "data/".strval($date)."_top10.png";

echo date("Y-m-d h:i:sa")."<br/>";

$command_sum = "$vnstati_cmd -s -i $iface -o ".$data_path."/$image_sum_file_name";
$output = shell_exec("$command_sum");
# echo $output."<br>";
# echo  $command_sum."<br>";
echo "<img src='$image_sum_file_name'/>";

$command_hour = "$vnstati_cmd -h -i $iface -o ".$data_path."/$image_hour_file_name";
$output = shell_exec("$command_hour");
# echo $output."<br>";
# echo  $command_hour."<br>";
echo "<img src='$image_hour_file_name'/>";

$command_day = "$vnstati_cmd  -d -i $iface -o ".$data_path."/$image_day_file_name";
$output = shell_exec("$command_day");
# echo $output."<br>";
# echo  $command_day."<br>";
echo "<img src='$image_day_file_name'/>";

$command_month = "$vnstati_cmd  -m -i $iface -o ".$data_path."/$image_month_file_name";
$output = shell_exec("$command_month");
# echo $output."<br>";
# echo  $command_month."<br>";
echo "<img src='$image_month_file_name'/>";

$command_top10 = "$vnstati_cmd  -t -i $iface -o ".$data_path."/$image_top10_file_name";
$output = shell_exec("$command_top10");
# echo $output."<br>";
# echo  $command_top10."<br>";
echo "<img src='$image_top10_file_name'/>";

?>
