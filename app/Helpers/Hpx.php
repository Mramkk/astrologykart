<?php

namespace App\Helpers;

use App\Models\OrderSetting;
use App\Models\Order;

class Hpx
{

    public static function imagex($desktop_image = '', $mobile_image = '')
    {
        if (!empty($desktop_image) and !empty($mobile_image)) {
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
                return asset($mobile_image);
            }else{
                return asset($desktop_image);
            }
        }
    }

    public static function maxChar($string_val, $max, $last_string = "...")
    {
        $retn_string = $string_val;
        if (strlen($string_val) > $max) {
            $stringCut = substr($string_val, 0, $max);
            $endPoint = strrpos($stringCut, ' ');
            $retn_string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $retn_string .= $last_string;
        }
        return $retn_string;
    }

    public static function order_status_list()
    {
        $status = array('placed', 'dispatched', 'completed', 'cancelled', 'refunded', 'payment pending', 'payment failed');
        return $status;
    }

    public static function twodigit($value = '')
    {
        return number_format((float)$value, '2', '.', '');
    }

    public static function total_amount($cart_id = '', $amt_type = '')
    {
        $data = [];
        if (auth()->check()) {
            $data = Order::where('uid', auth()->user()->uid)
                ->where('invoice_no', null)
                ->where('status', 'added')
                ->get();
        }
        if (!empty($cart_id)) {
            $data_list = Order::where('cart_id', $cart_id)->get();
            if ($data_list->count() > 0) {
                $data = $data_list;
            } else {
                if (!empty($data)) {
                    $amt_type = $cart_id;
                }
            }
        }

        $sub_total = 0;
        $shipping_charge = 0;
        $shipping_amount = 0;
        $coupon_code = '';
        $coupon_discount = 0;
        $total_amount = 0;
        foreach ($data as $row) {
            $sub_total += ($row->selling_price * $row->quantity);
            $shipping_charge = $shipping_charge == 0 ? $row->shipping_charge : $shipping_charge;
            $shipping_amount += ($row->weight * $row->quantity) * $row->shipping_charge;
            $coupon_discount = $coupon_discount == 0 ? $row->coupon_discount_price : $coupon_discount;
            $coupon_code = $row->coupon_code;
        }

        $total_amount = round(($sub_total + $shipping_amount) - $coupon_discount);

        if ($amt_type == 'sub_total') {
            $total_amount = $sub_total;
        }
        if ($amt_type == 'shipping_charge') {
            $total_amount = $shipping_charge;
        }
        if ($amt_type == 'shipping_amount') {
            $total_amount = $shipping_amount;
        }
        if ($amt_type == 'coupon_discount') {
            $total_amount = $coupon_discount;
        }
        if ($amt_type == 'coupon_code') {
            $total_amount = $coupon_code;
        }

        return number_format((float)$total_amount, '2', '.', '');
    }

    public static function shipping_charge()
    {
        $shipping_charge = OrderSetting::where('setting', 'shipping_charge')->first();
        if (!empty($shipping_charge)) {
            return number_format((float)$shipping_charge->value, '2', '.', '');
        } else {
            return 0.00;
        }
    }

    public static function refresh_id($value = '')
    {
        $refresh_id = '';
        if (!empty($value)) {
            $myfile = fopen("refresh_id.txt", "w+");
            fwrite($myfile, $value);
            fclose($myfile);
        } else {
            if (file_exists('refresh_id.txt')) {
                return file_get_contents('refresh_id.txt');
            } else {
                $myfile = fopen("refresh_id.txt", "w+");
                fwrite($myfile, rand());
                fclose($myfile);
                return rand();
            }
        }
    }

    public static function mydate_month($date, $format = false)
    {
        if ($format == false) {
            return date('d M Y', strtotime($date));
        } elseif ($format == 'date-time') {
            return date('d M Y h:i A', strtotime($date));
        } elseif ($format == 'time') {
            return date('h:i A', strtotime($date));
        }
    }

    public static function spinner($display = '', $size = 'spinner-s1')
    {
        if (empty($display)) {
            $display = 'none';
        }
        return '<span class="spinner-border ' . $size . ' loaderx" style="display:' . $display . ';" role="status" aria-hidden="true"></span>';
    }

    public static function image_src($image_path, $dummy_path)
    {
        $src = $dummy_path;
        if (file_exists($image_path)) {
            if (is_dir($image_path) == false) {
                $src = $image_path;
            }
        }
        return asset($src);
    }

    public static function discount_x($regular_price, $discount_price)
    {
        if (!empty($regular_price) and !empty($discount_price)) {
            return 100 - round($discount_price / $regular_price * 100);
        }
    }


    // ====================== Layouts =======================

    public static function table_headings($th = [])
    {
        $i = 1;
        $html = '<thead class="cart__table--header"><tr class="cart__table--header__items">';
        foreach ($th as $heading) {
            $strx = explode(":", $heading);
            $cls = '';
            if (count($strx) > 1) {
                $heading = $strx[0];
                $cls = $strx[1];
            }
            $html .= '<th class="cart__table--header__list ' . $cls . ' th__' . $i . '">' . $heading . '</th>';
            $i++;
        }
        $html .= '</tr></thead>';
        return $html;
    }

    public static function table_data($txt = '', $classes = '')
    {
        return '<td class="cart__table--body__list ' . $classes . '">' . $txt . '</td>';
    }


    public static function status_btn($id, $status_is)
    {
        return '<label class="switchz">
              <input type="checkbox" onclick="change_status(this,' . $id . ')" ' . ($status_is == 1 ? 'checked' : null) . '>
              <span class="sliderz round"></span>
            </label>';
    }

    public static function edit_btn($href = '')
    {
        return '<a class="btn btn-sm fs-4 btn-outline-secondary edit__btn" href="' . $href . '">Edit</a>';
    }

    public static function view_btn($href = '', $target = '')
    {
        return '<a class="btn btn-sm fs-4 px-3 btn-outline-secondary view__btn" target="' . $target . '" href="' . $href . '">View</a>';
    }

    public static function delete_btn($id)
    {
        return '<a class="btn btn-sm btn-outline-danger fs-4 delete__btn" onclick="delete_id(' . $id . ')">Delete</a>';
    }

    public static function paginator($data_list, $eachside = 5)
    {
        $prev_url = $data_list->previousPageUrl();
        $next_url = $data_list->nextPageUrl();
        $current_page = $data_list->currentPage();
        $current_url = $data_list->url($current_page);
        $url_list = $data_list->links()->getData()['elements'];
        $list = '';
        $i = 1;

        foreach ($url_list[0] as $url) {
            $list .= '<li class="pagination__list">' . ($current_page == $i ? '<span class="pagination__item pagination__item--current">' . $i++ . '</span>' : '<a href="' . $url . '" class="pagination__item link">' . $i++ . '</a>') . '</li>';
        }

        $paginator = '<div class="pagination__area bg__gray--color mt-0">
                    <nav class="pagination justify-content-center">
                            <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                <li class="pagination__list">
                                    <a href="' . $prev_url . '" class="pagination__item--arrow  link ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292" />
                                        </svg>
                                        <span class="visually-hidden">page left arrow</span>
                                    </a>
                                <li>
                                ' . $list . '
                                <li class="pagination__list">
                                    <a href="' . $next_url . '" class="pagination__item--arrow  link ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100" />
                                        </svg>
                                        <span class="visually-hidden">page right arrow</span>
                                    </a>
                                <li>
                            </ul>
                        </nav>
                    </div>';

        return $i > 2 ? $paginator : null;
    }
}
