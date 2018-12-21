# Theme standard
Theme này được tạo ra nhằm quy ước chung cho mọi người. Dành cho người mới bất đầu và đã biết thì tìm hiểu thêm, rất mong được sự đóng góp của mọi người. Mọi thắc mắc, yêu cầu, phát hiện bug xin vui lòng gửi về phuquanglxc@gmail.com xin cảm ơn.
Giải quyết các vấn đề:
- Đồng nhất để mọi người dễ tiếp cận.
- Chia nhỏ rõ ràng để tiện quản lý.
- Không ảnh hưởng lẫn nhau của các tệp khi sửa chữa.
- Sử dụng lại được tài nguyên code (snippets).

# Hệ thống phân cấp thư mục dành cho dự án
```bash
.
├──📁assets/                          # Chứa tệp frontend
│  ├──📁admin-css/                    # Style dành cho admin
│  ├──📁admin-fonts/                  # Font dành cho admin
│  ├──📁admin-images/                 # Hình dành cho admin
│  ├──📁admin-js/                     # Script dành cho admin
│  ├──📁css/                          # Style dành cho user
│  ├──📁fonts/                        # Font dành cho user
│  ├──📁images/                       # Hình dành cho user
│  └──📁js/                           # Script dành cho user
├──📁inc/                             # Chứa tệp chức năng
│  ├──📁libraries/                    # Chứa thư viện code khác
│  ├──📁metaboxes/                    # Chứa file tạo metabox
│  │  └──📝edit-template-page.php     # Metabox edit template file của page
│  ├──📁registers/                    # Chứa các file đăng ký post type và sidebar
│  │  ├──📝posttype-sample.php        # Mẫu đăng ký post type
│  │  └──📝sidebar-sample.php         # Mẫu đăng ký sidebar
│  ├──📁widgets/                      # Chứa các file đăng ký widget
│  │  └──📝sample.php                 # Mẫu đăng ký widget
│  ├──📁theme-options/                # Chứa các trang admin option
│  │  ├──📝theme-settings-child.php   # Trang option con
│  │  └──📝theme-settings.php         # Trang option chung
│  ├──📝disable-feature.php           # Hàm loại bỏ các tính năng mặc định
│  ├──📝theme-debug.php               # Hàm hỗ trợ cho dev và debug gọn hơn, deploy thì nên xóa đi
│  ├──📝custom-seo.php                # Tùy chỉnh lại các thẻ SEO
│  ├──📝pagination.php                # Class phân trang, được gọi trong the_pagination()
│  ├──📝redirects.php                 # Những hàm chuyển hướng
│  ├──📝helper.php                    # Những hàm hỗ trợ khác
│  ├──📝setup.php                     # Thiết lập theme
│  └──📝init.php                      # Require các file khác trong inc
├──📁languages/                       # Ngôn ngữ
│  ├──📝theme.pot                     # File chứa chuỗi dịch (Portable Object Template)
│  ├──📝theme.po                      # File chứa bản dịch thực sự (Portable Object)
│  └──📝theme.mo                      # File đã được biên dịch (Machine Object)
├──📁form-controllers/                # Chứa các file sử lý của form
│  ├──📁libraries/                    # Chứa thư viện chung cho form hoặc để trong /inc/libraries
│  ├──📝page-contact-controller.php   # Xử lý
│  ├──📝page-contact-validator.php    # Kiểm tra đầu vào
│  └──📝page-contact-sendmail.php     # Gửi mail
├──📁template-emails/                 # Chứa các trang với định danh là slug
│  ├──📝page-contact-user.tpl         # Mẫu dành email của user
│  └──📝page-contact-admin.tpl        # Mẫu dành email của admin
├──📁template-pages/                  # Chứa các trang với định danh là slug
│  ├──📝page-slug.php                 # Các trang theo định danh slug
│  ├──📝page-contact.php              # Trang form
│  ├──📝page-contact-confirmation.php # Trang xác nhận
│  ├──📝page-contact-error.php        # Trang in lỗi
│  └──📝page-contact-complete.php     # Trang hoàn thành
├──📁template-parts/                  # Chứa các phần của code
│  ├──📝global-footer.php             # Phần footer
│  ├──📝global-header.php             # Phần header
│  ├──📝global-navigation.php         # Điều hướng trang
│  ├──📝content-none.php              # Code in nội dung
│  └──📝content.php                   # Code in nội dung
├──📁tmp/                            # Sử dụng cho chức năng edit-template
├──📝404.php                          # Trang không tìm thấy
├──📝archive-post-type.php            # Danh sách của loại bài viết
├──📝archive.php                      # Danh sách chung (Post)
├──📝author.php                       # Trang dành cho user
├──📝category.php                     # Trang dành cho danh mục
├──📝tag.php                          # Trang dành cho thẻ
├──📝date.php                         # Trang dành cho ngày tháng năm
├──📝taxonomy.php                     # Trang dành cho các phân loại
├──📝comments.php                     # Bình luận
├──📝footer.php                       # Chân site
├──📝functions.php                    # Chức năng chính
├──📝header.php                       # Đầu site
├──📝index.php                        # Trang chủ
├──📝page.php                         # Trang
├──📝README.md                        # Hướng dẫn sử dụng
├──📝screenshot.png                   # Hình đại diện của theme
├──📝search.php                       # Trang tìm kiếm
├──📝searchform.php                   # Form tìm kiếm
├──📝sidebar.php                      # Sidebar
├──📝single-post-type.php             # Chi tiết của loại bài viết
├──📝single.php                       # Chi tiết chung (Post)
└──📝style.css                        # Style chính
```

Đối với WP 4.7 về sau sử dụng comment block trước file sẽ dùng được template này cho các loại bài viết
```php
<?php
/*
Template Name: Tên template
Template Post Type: post, page, product
*/
```

# Yêu cầu
- Đối với PHP
    * Học cách viết code chuẩn tại đây https://www.php-fig.org/psr/
    * Luôn sử dụng 4 khoảng trống (4-spaces) khi thục dòng (indent)
    * Cuối file chừa 1 dòng trống (end line)
- Đối với Javascript
    * Học cách viết code chuẩn tại đây https://standardjs.com/
- Yêu cầu khác
    * Viết ngay hàng thẳng lối, sạch đẹp vừa giúp bản thân dễ tìm bug vừa giúp người khác dễ tiếp cận. Xin hãy vì mọi người xin cảm ơn.

# Đối với Form
Nên phân code ra thành file như mẫu bên dưới
```bash
.
├──📁form-controllers/                # Chứa các file sử lý của form
│  ├──📁libraries/                    # Chứa thư viện chung cho form hoặc để trong /inc/libraries
│  ├──📝page-contact-controller.php   # Xử lý
│  ├──📝page-contact-validator.php    # Kiểm tra đầu vào
│  └──📝page-contact-sendmail.php     # Gửi mail
├──📁template-emails/                 # Chứa các trang với định danh là slug
│  ├──📝page-contact-user.tpl         # Mẫu dành email của user
│  └──📝page-contact-admin.tpl        # Mẫu dành email của admin
├──📁template-pages/                  # Chứa các trang với định danh là slug
│  ├──📝page-contact.php              # Trang form
│  ├──📝page-contact-confirmation.php # Trang xác nhận
│  ├──📝page-contact-error.php        # Trang in lỗi
│  └──📝page-contact-complete.php     # Trang hoàn thành
```

# Đặt tên
- Thêm tiếp đầu ngữ (prefix là cba) ở các function để tránh trùng lặp ví dụ cba_sendmail()
- Nối các từ trong tên thư mục bằng dấu gạch nối ví dụ: template-parts
- Nối các từ trong tên tập tin cũng bằng dấu gạch nối ví dụ archive-post-type.php
- Trong inc nên đặt tên file theo {Chức năng/Kiểu loại}-{Ý nghĩa}.php
- Thư mục template-pages các tên file được đặt theo cách page-slug.php với slug nên đặt theo url của trang ví dụ trang https://themestandard.com/recruit/search/shop/ thì slug nên đặt là recruit-search-shop và file sẽ là page-recruit-search-shop.php
- Tên biến PHP chữ thường, ký tự latin, không dấu, không đặc biệt. Ví dụ: $ten_bien
- Sử dụng các từ tiếng anh, ngắn gọn, dễ hiểu

# Tận dụng hook để tiết kiệm code
Các hook sau đây là custom được tạo trong phạm vi theme này
- cba_head_before : Hook này đặt phía dưới thẻ &lt;head&gt;
- cba_head_after  : Hook này đặt phía trên thẻ &lt;/head&gt;
- cba_body_before : Hook này đặt phía dưới thẻ &lt;body&gt;
- cba_body_after  : Hook này đặt phía trên thẻ &lt;/body&gt;
```php
// Sử dụng
add_action('cba_head_after', function(){
    // something here
});
```

# Thêm css hoặc js cho từng trang
Có thể chọn 1 trong 2 cách bên dưới, khuyến nghị cách 1 nhe.
Đặt ở phía trên hàm get_header().
```php
<?php
// Add style or script for current page
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'page-slug-stype', get_theme_file_uri( '/assets/css/style.css' ), null, '1.0' );
    wp_enqueue_script( 'page-slug-script', get_theme_file_uri( '/assets/js/script.js' ), null, '1.0', false );
});

// Add style or script for current page
add_action('cba_head_after', function(){
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.js" media="all">
<script type='text/javascript' src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
<?php
});
```

# Hàm Helper
```php
<?php
// Hàm này tạo ra để rút ngắn tên dùng ở frontend

// echo home url
url();

// return home url
getUrl();

// echo theme url
themeUrl();

// return theme url
getThemeUrl();

// echo url for assets folder in theme
assets();
```

# Sử dụng hàm xuất cho url và luôn escape
```html
<?php echo esc_url(home_url( '/' )); ?>
<?php echo esc_url(get_template_directory_uri()); ?>
```

### Tham khảo thêm
- https://codex.wordpress.org/Function_Reference
- https://codex.wordpress.org/Creating_an_Error_404_Page
- https://codex.wordpress.org/Template_Hierarchy
- https://codex.wordpress.org/Category:Conditional_Tags
- https://developer.wordpress.org/themes/basics
- https://developer.wordpress.org/themes/basics/template-files/#template-partials
- https://developer.wordpress.org/themes/basics/template-hierarchy/
- https://wphierarchy.com/
