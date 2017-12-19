<?php

use Carbon\Carbon;

function chuyenChuoi($str, $strSymbol = '-', $case = MB_CASE_LOWER)
{
    $str = trim($str);
    if ($str == "") return "";
    $str = str_replace('"', '', $str);
    $str = str_replace("'", '', $str);
    // In thường
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    // In đậm
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);

    $str = mb_convert_case($str, $case, 'utf-8');

    $str = preg_replace('/[\W|_]+/', $strSymbol, $str);

    return $str; // Trả về chuỗi đã chuyển
}

function FormatDateCustomer($inputDate, $format = 'd/m/Y')
{
    $date = date_create($inputDate);
    return date_format($date, $format);
}
function changeLanguage($lang = 'vi', $index = false)
{
    $curl = url()->current();
    $root = url()->asset('');

    $kq = str_replace($root, '', $curl);

    $l = substr($kq, 0, 3);
    if ($index)
        return $root . $lang;
    if ($l == 'vi/' || $l == 'en/') {
        $theURL = $lang . '/' . substr($kq, 3);
    } else {
        $theURL = $lang . '/' . $kq;
    }
    return $theURL;
}

function assetLang($href)
{
    return asset(App::getLocale() . '/' . $href);
}

function urlSeo($source)
{
    return chuyenChuoi($source, '-', MB_CASE_LOWER) . '.html';
}

function get_file_extension($file_name)
{
    return substr(strrchr($file_name, '.'), 1);
}

function sliderHref($href)
{
    if (filter_var($href, FILTER_VALIDATE_URL)) {
        return $href;
    }
    return asset(App::getLocale() . '/' . $href);
}

function getHomeCate($id, $lang, $hCate, $classImage, $hPost, $nP = null)
{
    try {
        if (empty($id)) {
            $c = \App\categories::where('status', 1)->where('p_id', '!=', 0)->get()->toArray();
            $idARR = array_column($c, 'id');
            $id = array_rand($idARR);
        }

        if ($nP != null) {
            array_shift($nP);
            $arrID = $nP;

            $newPost = \App\posts::where('status', 1)->whereIn('category_id', $arrID)->orderBy('date_show', 'DESC')->first();

            $titleCate = $newPost->category->categories_langs->where('lang', $lang)->first()->title;
        } else {
            $cates = \App\categories::where('status', 1)->where('id', $id)->orWhere('p_id', $id)->get()->toArray();
            $arrID = array_column($cates, 'id');
            $nP = $arrID;

            $newPost = \App\posts::where('status', 1)->whereIn('category_id', $arrID)->orderBy('date_show', 'DESC')->first();

            $cateALL = \App\categories::where('status', 1)->get();
            $titleCate = $cateALL->find($id)->categories_langs->where('lang', $lang)->first()->title;
        }

        $srcImage = $newPost->image;

        $titlePost = $newPost->posts_lang->where('lang', $lang)->first()->title;

        $href = $newPost->slug;

        $introduce = $newPost->posts_lang->where('lang', $lang)->first()->introduce;
    } catch (Exception $ex) {
        $titleCate = '';
        $srcImage = getPath('noimage');
        $href = '';
        $titlePost = '';
        $introduce = '';
    }

    $arr = [
        'nP' => $nP,

        'hCate' => $hCate,
        'titleCate' => $titleCate,

        'srcImage' => $srcImage,
        'classImage' => $classImage,

        'href' => $href,

        'hPost' => $hPost,
        'titlePost' => $titlePost,

        'introduce' => $introduce
    ];

    return $arr;
}

function genImageName($prefix = '', $ext = 'jpg')
{
    return $prefix . '-' . md5(time()) . '.' . $ext;
}

function genNameFile($ext = 'jpg')
{
    return uniqid(time()) . '.' . $ext;
}

function getImagePost($image)
{
    return getPath('post_image') . $image;
}

function getAgoDay($day)
{
    return Carbon::now()->subDays($day);
}

function getPassEnv()
{
    return \Illuminate\Support\Facades\Crypt::decrypt(env('MAIL_PASSWORD'));
}

function getPath($v = 'products_image')
{
    return config('constants.paths')[$v];
}

function getImageProject($image)
{
    if ($image == 'noimage.jpg')
        return getPath('noimage');
    return asset(getPath('project_image') . $image);
}


function getImageService($image)
{
    if ($image == 'noimage.jpg')
        return getPath('noimage');
    return asset(getPath('service_image') . $image);
}

function getImageTeam($image)
{
    if ($image == 'noimage.jpg')
        return getPath('noimage');
    return asset(getPath('team_image') . $image);
}

function getImageNews($image)
{
    if ($image == 'noimage.jpg')
        return getPath('noimage');
    return asset(getPath('news') . $image);
}

function tomtat($str, $len = 30)
{
    if (strlen($str) < $len) return $str;
    $html = substr($str, 0, $len);
    $html = substr($html, 0, strrpos($html, ' '));
    return $html . '...';
}

function getNoiDungLienHe($tieude, $noidung, $len = 35)
{
    if (strlen($tieude) > $len)
        return $tieude;
    return tomtat($noidung, $len - strlen($tieude));
}

function uutien($ut)
{
    switch ($ut) {
        case 1:
            return '<x>Thấp nhất</x>';
        case 2:
            return '<xx>Thấp</xx>';
        case 4:
            return '<xxxx>Cao</xxxx>';
        case 5:
            return '<xxxxx>Cao nhất</xxxxx>';
        default:
            return '<xxx>Thường</xxx>';
    }
}

function getShowType($type)
{
    if ($type == 0)
        return array('<font color="#006400">Slider</font>', 'Slider');
    else
        return array('<font color="#00008b">Banner</font>', 'Banner');
}

function getDefaultLocation($par)
{
    return config('constants.location')[$par];
}

//Ago
function pluralize($count, $text)
{
    return $count . (($count == 1) ? (" $text") : (" ${text}"));
}

function ago($datetime)
{
    $datetime = date_create($datetime);
    $interval = date_create('now')->diff($datetime);

    $suffix = ($interval->invert ? ' trước' : '');
    if ($v = $interval->y >= 1) return pluralize($interval->y, 'năm') . $suffix;
    if ($v = $interval->m >= 1) return pluralize($interval->m, 'tháng') . $suffix;
    if ($v = $interval->d >= 1) return pluralize($interval->d, 'ngày') . $suffix;
    if ($v = $interval->h >= 1) return pluralize($interval->h, 'giờ') . $suffix;
    if ($v = $interval->i >= 1) return pluralize($interval->i, 'phút') . $suffix;
    return pluralize($interval->s, 'giây') . $suffix;
}

function getCurrentUrl()
{
    return (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

use App\Setting;
use Illuminate\Support\Facades\Cache;

function getDomain()
{
    $domain = Cache::get('ca_domain', function () {
        $default = Setting::where('key', 'domain')->first()->value;
        Cache::add('ca_domain', $default, Carbon::now()->addDays(10));
        return $default;
    });
    return $domain;
}

function getLogoDefault()
{
    $logo = Cache::get('logo_seo_default', function () {
        $default = Setting::where('key', 'logo_seo_default')->first()->value;
        Cache::add('logo_seo_default', $default, Carbon::now()->addDays(10));
        return $default;
    });
    return $logo;
}

function rand_string($length, $only_number=false)
{
    $str = '';
    $chars = '0123456789';
    if(!$only_number)
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ$chars";
    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }
    return $str;
}

function sendMail($emailinfo, $body)
{
    $mail = new \App\Mail();
    $mail->getDb();

    // Prepare transport
    $transport = \Swift_SmtpTransport::newInstance($mail->host, $mail->port, $mail->encryption)
        ->setUsername($mail->username)
        ->setPassword($mail->password);
    $mailer = \Swift_Mailer::newInstance($transport);

    // Prepare content
    $view = View::make($body['view'], $body['content']);
    $html = $view->render();

    // Send email
    $message = \Swift_Message::newInstance($emailinfo['subject'])
        ->setFrom([$mail->from['address'] => $mail->from['name']])
        ->setTo([$emailinfo['receiverAddress'] => $emailinfo['receiverName']])
        // If you want plain text instead, remove the second paramter of setBody
        ->setBody($html, 'text/html');

    if ($mailer->send($message)) {
        return 1;
    }
    return 0;
}



function getStatus($stt, $trueText = 'Hoạt động', $falseText = 'Bị khóa')

{
    if ($stt)
        return '<span class="label label-success">' . $trueText . '</span>';
    return '<span class="label label-warning">' . $falseText . '</span>';
}


function getGender($gender)
{
    return $gender ? "Nam" : "Nữ";
}

function getRole($gender)
{
    return $gender ? "Admin" : "User";
}

function InitLanguage($index = 2)
{
    $lang = Request::segment($index);
    Session::put('lang', $lang);
    \App::setLocale($lang);
    return $lang;
}

function GetLangNum($lang = null)
{
    if (empty($lang))
        $lang = \App::getLocale();
    return \App\Model\Language::where('language', $lang)->first()->id;
}
function GetLangName($lang = 1)
{
    return \App\Model\Language::find($lang)->language;
}



function GGPushRequest($fields)
{
    $endpoint = env('GG_ENDPOINT', 'https://fcm.googleapis.com/fcm/send');
    $gg_api_access_key = env('GG_API_ACCESS_KEY','AAAAe-8hPyE:APA91bEOoRk9daVnye2b1XqSskvLSBBGEnhxsTBjAJnltq8Me2yqOfEIEq52lx8Lav3jFJBtnQ356fgflHZWHZLjWwYyoJmDAoVmTP6UGy-uCx1vefgGCZAjFb6AVWHNOi9fSgey9iJW');

    $headers = array(
        'Content-Type' => 'application/json',
        'Authorization' => "key=$gg_api_access_key",
    );


    $client = new \GuzzleHttp\Client([
        'verify' => false,
        'headers' => $headers
    ]);

    $response = $client->post($endpoint,
        ['body' => json_encode($fields)]
    );
    return $response->getBody()->getContents();
}


function PushNotification($deviceToken = '', $title = "Tiêu đề", $body = "Nội dung", $badge = 1, $status = 88, $color = "#990000 ", $options = [])
{
    $msg =
        [
            'title' => $title,
            'body' => $body,
            'badge' => $badge,
            'sound' => 'default',
            'status' => $status,
            'color' => $color,
            'options' => $options
        ];
    $fields =
        [
            'to' => $deviceToken,
            'priority' => 'high',
            'data' => $msg
        ];

    $result = GGPushRequest($fields);
    return $result;
}

function TRANLanguage($param = [])
{
    return [
        'vi' => [
            'apply_voucher' => $param[0] . " vừa áp dụng voucher co ma la: " . $param[1],
            'voucher' => 'Voucher',
            'comment' => $param[0] . " vừa đánh giá cho: " . $param[1],
            'recharge' => $param[0] . " vừa nạp " . $param[1] . " vào tài khoản",
            'push_recharge_title' => 'Nạp tiền',
            'push_recharge_content' => "Bạn vừa nạp $param[0] đồng vào tài khoản thành công",
            'push_new_voucher'=>"Bạn vừa nhận được phiếu quà tặng mới từ $param[0]",
            'recharge_client_content'=>"Bạn vừa được nạp $param[0] đồng vào tài khoản từ $param[1]",
        ],
        'en' => [
            'apply_voucher' => $param[0] . ' apply voucher has code: ' . $param[1],
            'voucher' => 'Voucher',
            'comment' => $param[0] . " has comment: " . $param[1],
            'recharge' => $param[0] . " has recharge " . $param[1] . " in card",
            'push_recharge_title' => 'Recharge',
            'push_recharge_content' => "You have successfully deposited $param[0] VND into your account",
            'push_new_voucher'=>"You just received a new gift voucher from $param[0]",
            'recharge_client_content'=>"You have just loaded $param[0] dong into account from $param[1]",
        ]
    ];
}

use \App\ErrorCode;
function getErrorCodeValidate($errorMessage)
{
    $errors = [
        'The email field is required.'=>ErrorCode::$RequiredEmail,
        'The email has already been taken.'=>ErrorCode::$ExistEmail,
        'The password field is required.'=>ErrorCode::$RequiredPassword,
        'The name field is required.'=>ErrorCode::$RequiredName,
        'The birthday field is required.'=>ErrorCode::$RequiredBirthday,
        'The address field is required.'=>ErrorCode::$RequiredAddress,
        'The gender field is required.'=>ErrorCode::$RequiredGender,
        'The description field is required.'=>ErrorCode::$RequiredDescription,
        'The rating field is required.'=>ErrorCode::$RequiredRating,
        'The description must be at least 10 characters.'=>ErrorCode::$MinDescription,
        'The phone field is required.'=>ErrorCode::$RequirePhone,
        'The title field is required.'=>ErrorCode::$RequireTitle,
    ];
    return $errors[$errorMessage];
}

function MoveFile($img,$filePath = 'uploads/product_image',$data_type_accept = array('gif','png' ,'jpg','bmp','jpeg'))
{
    if(!is_file($img)){
        return [
            "success"=>false,
            "message"=>"File lỗi"
        ];
    }

    $ext = $img->getClientOriginalExtension();
    if(!in_array($ext,$data_type_accept))
        return [
            "success"=>false,
            "message"=>"Định dạng file không hỗ trợ, định dạng cho phép: " . implode(',',$data_type_accept)
        ];

    $filename = genNameFile($ext);
    if($img->move($filePath, $filename))
        return [
            "success"=>true,
            "file_name"=>$filename,
            "full_path"=>"$filePath/$filename"
        ];

    return [
        "success"=>false,
        "message"=>"Lỗi không upload được file"
    ];
}

function getCategoryName($arr_id=null,$lang=1,$getAll=false,$toString=false)
{
    if($getAll)
        $cate = \App\Model\CategoryLanguage::where('language_id',$lang);
    else
    {
        $arr_cate_id = explode(',',$arr_id);
        $cate = \App\Model\CategoryLanguage::whereIn('category_id',$arr_cate_id)
            ->where('language_id',$lang);
    }
    $cate = $cate->pluck('name');
    if($toString)
        $cate = implode(',',$cate);

    return $cate;
}

function genCardCode($client_id)
{
    $length = 16-strlen($client_id);
    return $client_id . rand_string($length,true);
}