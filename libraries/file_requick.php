<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0) $page = 1;
	
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();

	$d->reset();
	$sql_setting = "select * from #_bgweb where type='bgweb' limit 0,1";
	$d->query($sql_setting);
	$row_background= $d->fetch_array();

	$d->reset();
    $sql = "select thumb_$lang from #_photo where type='favicon'";
    $d->query($sql);
    $favicon = $d->fetch_array();
	
	switch($com){
		case 'video':
			$source = "video";
			$template = isset($_GET['id']) ? "video_detail" : "video";
			break;
			
		case 'ban-do':
			$source = "map";
			$template ="map";
			break;
		case 'download':
			$source = "download";
			$template = isset($_GET['id']) ? "download_detail" : "download";
			$type_bar = 'download';
			$title_detail = "Download";
			break;
		case 'thu-vien-anh':
			$source = "album";
			$template = isset($_GET['id']) ? "album_detail" : "album";
			$type_bar = 'album';
			$title_detail = "album";
			break;
		case 'site-map':
			$source = "sitemap";
			$template ="sitemap";
			break;
		case 'tuyen-dung':
			$source = "about";
			$template = "about";
			$title_detail = _tuyendung;
			$type_bar = 'tuyendung';
			break;

		case 'dang-nhap':
			$source = "login";
			$template ="login";
			break;
		case 'tags':
			$source = "tags";
			$template ="tags";
			break;
		
		case 'phan-hoi':
			$source = "gopy";
			$template = "gopy";
			break;	
		
		case 'hoi-dap':
			$source = "about";
			$template ="about";
			$title_detail = 'Hỏi đáp mua hàng - Cách thức mua hàng online';
			$type_bar = 'hoidap';
			break;

		case 'doi-tra-hang':
			$source = "about";
			$template ="about";
			$title_detail = 'Chính sách đổi trả hàng hóa';
			$type_bar = 'doitra';
			break;

		case 'phi-van-chuyen':
			$source = "about";
			$template ="about";
			$title_detail = 'Miễn phí vận chuyển nội thành';
			$type_bar = 'doitra';
			break;
			
		case 'gioi-thieu':
			$source = "about";
			$template = "about";
			$title_detail = _gioithieu.' '.$row_setting["ten_vi"];
			$type_bar = 'gioithieu';
			break;
		case 'bao-gia':
			$source = "about";
			$template = "about";
			$title_detail = "Bảng báo giá";
			$type_bar = 'banggia';
			break;
		case 'kiem-tra-don-hang':
			$source = "donhang";
			$template = "donhang";
			$title_detail = "Kiểm tra đơn hàng";
			$type_bar = 'chamsoc';
			break;

		case 'huong-dan-mua-hang':
			$source = "about";
			$template = "about";
			$title_detail = "Hướng dẩn mua hàng";
			$type_bar = 'muahang';
			break;

		case 'chinh-sach-hoi-vien':
			$source = "about";
			$template = "about";
			$title_detail = _chinhsachhoivien;
			$type_bar = 'hoivien';
			break;

		case 'hinh-anh':
			$source = "gallery";
			$template = "gallery_detail";			
			break;
		
		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tintuc';
			$title_detail = _tintuc;
			break;
		case 'khuyen-mai':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'khuyenmai';
			$title_detail = 'Khuyến mãi';
			break;
		case 'khach-hang':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'khachhang';
			$title_detail = "Khách hàng";
			break;
		case 'thong-tin':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'thongtin';
			$title_detail = 'Thông tin';
			break;
		case 'thong-tin-can-biet':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'canbiet';
			$title_detail = 'Thông tin cần biết';
			break;
		case 'cau-hoi-thuong-gap':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'cauhoi';
			$title_detail = 'Câu hỏi thường gặp';
			break;
		case 'tu-van':
			$source = "service";
			$template = isset($_GET['id']) ? "service_detail" : "service";
			$type_bar = 'tuvan';
			$title_detail = _tuvan;
			break;
		case 'su-kien':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'sukien';
			$title_detail = _sukien;
		break;	
		case 'dich-vu':
			$source = "service";
			$template = isset($_GET['id']) ? "service_detail" : "service";
			$type_bar = 'dichvu';
			$title_detail = _dichvu;
		break;

		case 'du-an':
			$source = "product";
			$template =isset($_GET['id']) ? "product_detail" : "product";
			$title_detail = 'Dự án';
			$type_bar = 'sanpham';	
			break;	
		break;

		case 'hoc-bong':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'hocbong';
			$title_detail = _hocbong;
			break;
		case 'cham-soc-khach-hang':
			$source = "chamsoc";
			$template = isset($_GET['id']) ? "chamsoc_detail" : "chamsoc";
			break;
		case 'cua-hang-gau-bong':
			$source = "product";
			$template =isset($_GET['id']) ? "product_detail" : "product";
			$title_detail = _sanpham;
			$type_bar = 'sanpham';	
			break;	

		case 'du-an':
			$source = "duan";
			$template = isset($_GET['id']) ? "duan_detail" : "duan";				
			break;		
								
		case 'lien-he':
			$source = "contact";
			$template = "contact";
			break;

		case 'giao-hang-toan-quoc':
			$source = "giaohang";
			$template = "giaohang";
			break;

		case 'giao-hang-nhan-tien':
			$source = "giaohangnt";
			$template = "giaohangnt";
			break;

		case 'doi-tra-hang-trong-10-ngay':
			$source = "doitra";
			$template = "doitra";
			break;

		case 'huong-dan-mua-hang':
			$source = "huongdanmuahang";
			$template = "huongdanmuahang";
			break;
		
		case 'tim-kiem':
			$source = "search";
			$template = "product";
			break;
		case 'gio-hang':
			$source = "giohang";
			$template = "giohang";
			break;	
		case 'thanh-toan':
			$source = "thanhtoan";
			$template = "thanhtoan";
			break;
		case 'xac-nhan':
			$source = "xacnhan";
			$template = "xacnhan";
			break;		

		default: 
			$source = "index";
			$template = "index";
			break;
	}
	
	if($source!="") include _source.$source.".php";
	
	if($_REQUEST['com']=='logout')
	{
	session_unregister($login_name);
	header("Location:index.php");
	}		
?>