<?php
namespace App\Helpers;

class Template{
    public static function showStatus($status){
        $xhtml = '';
                switch ($status) {
                    case 1:
                        $xhtml = '<h3 class="text-center">ĐÃ LÊN ĐƠN</h3>
                                    <ul class="bs4-order-tracking">
                                <li class="step active">
                                    <div><i class="fa fa-user"></i></div> Lên đơn
                                </li>
                                <li class="step ">
                                    <div><i class="fa fa-gift"></i></div> Đóng gói
                                </li>
                                <li class="step ">
                                    <div><i class="fa fa-warehouse"></i></div> Nhập kho 
                                </li>
                                <li class="step ">
                                    <div><i class="fa fa-warehouse"></i></div> Xuất kho 
                                </li>
                                <li class="step ">
                                    <div><i class="fa fa-truck"></i></div> Đang giao hàng
                                </li>
                                <li class="step ">
                                    <div><i class="fa fa-birthday-cake"></i></div> Giao hàng thành công
                                </li>
                                    </ul>';
                        break;
                    case 2:
                        $xhtml = '<h3 class="text-center">ĐÃ ĐÓNG GÓI</h3>
                                        <ul class="bs4-order-tracking">
                                    <li class="step active">
                                        <div><i class="fa fa-user"></i></div> Lên đơn
                                    </li>
                                    <li class="step active">
                                        <div><i class="fa fa-gift"></i></div> Đóng gói
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-warehouse"></i></div> Nhập kho 
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-warehouse"></i></div> Xuất kho 
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-truck"></i></div> Đang giao hàng
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-birthday-cake"></i></div> Giao hàng thành công
                                    </li>
                                        </ul>';
                        break;
                    case 3:
                        $xhtml = '<h3 class="text-center">ĐÃ NHẬP KHO</h3>
                                        <ul class="bs4-order-tracking">
                                    <li class="step active">
                                        <div><i class="fa fa-user"></i></div> Lên đơn
                                    </li>
                                    <li class="step active">
                                        <div><i class="fa fa-gift"></i></div> Đóng gói
                                    </li>
                                    <li class="step active">
                                        <div><i class="fa fa-warehouse"></i></div> Nhập kho 
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-warehouse"></i></div> Xuất kho 
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-truck"></i></div> Đang giao hàng
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-birthday-cake"></i></div> Giao hàng thành công
                                    </li>
                                        </ul>';
                        break;
                    case 4:
                        $xhtml = '<h3 class="text-center">ĐÃ XUẤT KHO</h3>
                                        <ul class="bs4-order-tracking">
                                    <li class="step active">
                                        <div><i class="fa fa-user"></i></div> Lên đơn
                                    </li>
                                    <li class="step active">
                                        <div><i class="fa fa-gift"></i></div> Đóng gói
                                    </li>
                                    <li class="step active">
                                        <div><i class="fa fa-warehouse"></i></div> Nhập kho 
                                    </li>
                                    <li class="step active">
                                        <div><i class="fa fa-warehouse"></i></div> Xuất kho 
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-truck"></i></div> Đang giao hàng
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-birthday-cake"></i></div> Giao hàng thành công
                                    </li>
                                        </ul>';
                        break;
                    case 5:
                        $xhtml = '<h3 class="text-center">ĐANG GIAO HÀNG</h3>
                                        <ul class="bs4-order-tracking">
                                    <li class="step active ">
                                        <div><i class="fa fa-user"></i></div> Lên đơn
                                    </li>
                                    <li class="step active ">
                                        <div><i class="fa fa-gift"></i></div> Đóng gói
                                    </li>
                                    <li class="step active ">
                                        <div><i class="fa fa-warehouse"></i></div> Nhập kho 
                                    </li>
                                    <li class="step active ">
                                        <div><i class="fa fa-warehouse"></i></div> Xuất kho 
                                    </li>
                                    <li class="step active">
                                        <div><i class="fa fa-truck"></i></div> Đang giao hàng
                                    </li>
                                    <li class="step ">
                                        <div><i class="fa fa-birthday-cake"></i></div> Giao hàng thành công
                                    </li>
                                        </ul>';
                        break;
                    case 6:
                        $xhtml = '<h3 class="text-center">GIAO HÀNG THÀNH CÔNG</h3>
                                        <ul class="bs4-order-tracking">
                                    <li class="step active">
                                        <div><i class="fa fa-user"></i></div> Lên đơn
                                    </li>
                                    <li class="step active ">
                                        <div><i class="fa fa-gift"></i></div> Đóng gói
                                    </li>
                                    <li class="step active ">
                                        <div><i class="fa fa-warehouse"></i></div> Nhập kho 
                                    </li>
                                    <li class="step active ">
                                        <div><i class="fa fa-warehouse"></i></div> Xuất kho 
                                    </li>
                                    <li class="step active ">
                                        <div><i class="fa fa-truck"></i></div> Đang giao hàng
                                    </li>
                                    <li class="step active">
                                        <div><i class="fa fa-birthday-cake"></i></div> Giao hàng thành công
                                    </li>
                                        </ul>';
                        break;
                }
        return $xhtml;
    }

    public static function checkStatus($status){
        $arr = ['1' => 'Đã kích hoạt', '2' => 'Chưa kích hoạt'];
        $xhtml = '';
        foreach ($arr as $key => $value)
            if ($key == $status) {
                $xhtml .= '<option value="' . $status . '" selected>' . $arr[$status] . '</option>';
            } else {
                $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
            }
        echo $xhtml;
    }
    public static function hotTag($id){
        $arr = ['1' => 'Nhãn bình thường', '2' => 'Nhãn nổi bật'];
        $xhtml = '';
        foreach ($arr as $key => $value)
            if ($key == $id) {
                $xhtml .= '<option value="' . $id . '" selected>' . $arr[$id] . '</option>';
            } else {
                $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
            }
        echo $xhtml;
    }
    public static function checkParentCat($id, $arr){
        $id = $id == null ? 0 : $id;
        $xhtml = '';
        foreach ($arr as $key => $value)
            if ($key == $id) {
                $xhtml .= '<option value="' . $id . '" selected>' . $arr[$id] . '</option>';
            } else {
                $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
            }
        echo $xhtml;
    }
    public static function showListStatus(){
        $arr = ['0' => 'Bị hủy', '1' => 'Lên đơn', '2' => 'Đóng gói', '3' => 'Nhập kho ', '4' => 'Xuất kho ', '5' => 'Đang giao', '6' => 'Đã giao'];
        $xhtml = '';
        foreach ($arr as $key => $value)
        {
            $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
        }
        echo $xhtml;
    }

    public static function checkStatusShip($status){
        $arr = ['0' => 'Bị hủy', '1' => 'Lên đơn', '2' => 'Đóng gói', '3' => 'Nhập kho ', '4' => 'Xuất kho ', '5' => 'Đang giao', '6' => 'Đã giao'];
        $xhtml = '';
        foreach ($arr as $key => $value)
            if ($key == $status) {
                $xhtml = $value;
            }
        return $xhtml;
    }

    public static function role($idRole){
        $role ='';
        switch ($idRole) {
            case '1':
                $role = 'Master';
                break;
            default:
                $role = 'Người dùng';
                break;
        }
        return $role;
    }
    public static function tag($id){
        $id = $id ? $id : '1';
        $tag ='';
        switch ($id) {
            case '1':
                $tag = 'Nhãn bình thường';
                break;
            case '2':
                $tag = 'Nhãn nổi bật';
                break;
        }
        return $tag;
    }
    public static function status($id){
        $status ='';
        switch ($id) {
            case '1':
                $status = 'Đã kích hoạt';
                break;
            case '2':
                $status = 'Chưa kích hoạt';
                break;
        }
        return $status;
    }

    public static function checkRole($role){
        $arr = ['1' => 'Master', '2' => 'Người dùng'];
        $xhtml = '';
        foreach ($arr as $key => $value)
            if ($key == $role) {
                $xhtml .= '<option value="' . $role . '" selected>' . $arr[$role] . '</option>';
            } else {
                $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
            }
        echo $xhtml;
    }

    public static function getFirstPicture($product_images){
        $imgs = explode(",", $product_images);
        $images = array_slice($imgs,1,5);
        return $images[0];
    }
    public static function uploadFile($data){
        $file                       = $data['file'] ?? null;
        $tempfile                   = '';
        if ($file) {
            $fileName               = $file->getClientOriginalName();
            $path                   = public_path() . '/uploads';
            if (isset($data['folder'])) {
                $path               = public_path() . $data['folder'];
            }
            if (isset($data['filename'])) {
                $fileName           = $data['filename'];
            }
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $tempfile               = $path . '/' . $fileName;
            if (file_exists($tempfile)) {
                unlink($tempfile);
            }
            if(isset($data['old'])) {
                $oldFile = public_path() . $data['old'];
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            $file->move($path, $fileName);
        }
        return str_replace(public_path(), '', $tempfile);
    }

    public static function renderCategories($categories){
        $parent = [];
        $child = [];
        $res = [];
        foreach($categories as $item) {
            if($item['parent_id'] == null) {
                $parent[$item['id']] = $item['name'];
            } else {
                if(isset($child[$item['parent_id']])) {
                    $child[$item['parent_id']][$item['id']] =  '|---' . $item['name'];
                } else {
                    $child[$item['parent_id']] = [$item['id'] => '|---' . $item['name']];
                }
            }
        }
        ksort($parent);

        foreach($parent as $id => $item) {
            $childs = [];
            $res[$id] = $item;
            if(isset($child[$id])) {
                $childs = $child[$id];
                ksort($childs);
                foreach($childs as $idChild => $val) {
                    $res[$idChild] = $val;
                }
            }
        }
        return $res;
    }
    public static function renderSideBar($categories){
        $parent = [];
        $child = [];
        foreach($categories as $item) {
            if($item['parent_id'] == null) {
                $parent[$item['id']] = $item['name'];
            } else {
                if(isset($child[$item['parent_id']])) {
                    $child[$item['parent_id']][$item['id']] =  $item['name'];
                } else {
                    $child[$item['parent_id']] = [$item['id'] => $item['name']];
                }
            }
        }
        ksort($parent);

        $res = [
            'parent' => $parent,
            'child' => $child,
        ];

        return $res;
    }
}