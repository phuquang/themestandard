# Theme standard
Theme này được tạo ra nhằm quy ước chung cho mọi người. Dành cho người mới bất đầu và đã biết thì tìm hiểu thêm, rất mong được sự đóng góp của mọi người. Mọi thắc mắc, yêu cầu, phát hiện bug xin vui lòng gửi về phuquanglxc@gmail.com xin cảm ơn.
- Giải quyết các vấn đề:
    * Đồng nhất để dễ tiếp cận
    * Chia nhỏ rõ ràng để tiện quản lý
    * Không ảnh hưởng lẫn nhau của các tệp khi sửa chữa
    * Sử dụng lại được tài nguyên code (snippets)

# Giải thích cấu trúc thư mục
```bash
.
├──📁assets/                  # Chứa tệp frontend
│  ├──📁admin-css/            # Style dành cho admin
│  ├──📁admin-fonts/          # Font dành cho admin
│  ├──📁admin-images/         # Hình dành cho admin
│  ├──📁admin-js/             # Script dành cho admin
│  ├──📁css/                  # Style dành cho user
│  ├──📁fonts/                # Font dành cho user
│  ├──📁images/               # Hình dành cho user
│  └──📁js/                   # Script dành cho user
├──📁inc/                     # Chứa tệp chức năng
│  ├──📁libraries/            # Chứa thư viện code khác
│  ├──📝disable-feature.php   # Hàm loại bỏ các tính năng mặc định
│  ├──📝helper.php            # Những hàm hỗ trợ khác
│  ├──📝redirects.php         # Những hàm chuyển hướng
│  └──📝init.php              # Require các file khác trong inc
├──📁languages/               # Ngôn ngữ
│  ├──📝theme.pot             # File chứa chuỗi dịch (Portable Object Template)
│  ├──📝theme.po              # File chứa bản dịch thực sự (Portable Object)
│  └──📝theme.mo              # File đã được biên dịch (Machine Object)
├──📁template-pages/          # Chứa các trang với định danh là slug
│  └──📝page-slug.php         # Các trang theo định danh slug
├──📁template-parts/          # Chứa các phần của code
├──📝404.php                  # Trang không tìm thấy
├──📝archive-post-type.php    # Danh sách của loại bài viết
├──📝archive.php              # Danh sách chung (Post)
├──📝comments.php             # Bình luận
├──📝footer.php               # Chân site
├──📝functions.php            # Chức năng chính
├──📝header.php               # Đầu site
├──📝index.php                # Trang chủ
├──📝page.php                 # Trang
├──📝README.md                # Hướng dẫn sử dụng
├──📝screenshot.png           # Hình đại diện của theme
├──📝search.php               # Trang tìm kiếm
├──📝searchform.php           # Form tìm kiếm
├──📝sidebar.php              # sidebar
├──📝single-post-type.php     # Chi tiết của loại bài viết
├──📝single.php               # Chi tiết chung (Post)
└──📝style.css                # Style chính
```
# Đặt tên
- Prefix: cba

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

# Sử dụng hàm xuất cho url và luôn escape
```html
<?php echo esc_url( home_url( '/' ) ); ?>
<?php echo esc_url(get_template_directory_uri()); ?>
```

# Các hàm thường dùng
- Các hàm có tiếp đầu ngữ the_ thì sẽ print dữ liệu luôn
- Các hàm có tiếp đầu ngữ get_ thì sẽ trã về dữ liệu
```php
// lấy id của post hiện tại
the_ID();
$id = get_the_ID();

// lấy tiêu đề (Title) của post hiện tại
the_title();
$title = get_the_title();

// lấy nội dung của post hiện tại
the_content();
$content = get_the_content();

// Lấy ngày publish
$time = the_time('d M Y');

// Lấy option có tên là admin_email
$admin_email = get_option('admin_email');

// Lấy đường link của bài
the_permalink();
$link = get_the_permalink();

// Lấy author id của bài
$author_id = get_post_field('post_author', get_the_id());

// Lấy field của bài
get_post_meta(get_the_ID(), 'showroom_information', true);

// Lấy url của hình
$url = wp_get_attachment_image_url($id_attachment, 'full');
$img = wp_get_attachment_metadata($id_attachment);

// Lấy thông tin user
$users = get_users(array('fields' => 'all_with_meta','exclude' => array(1)));
$user_info = get_userdata(get_post_field('post_author', get_the_id()));

// Lấy taxonomy
$terms = wp_get_post_terms(get_the_ID(),'taxonomy_slug');
$terms = get_the_terms(get_the_id(),'taxonomy_slug');
$terms = get_terms( array(
    'taxonomy'   => 'taxonomy_slug',
    'hide_empty' => false,
));

// Lấy link edit của bài
edit_post_link("クイック編集",'<span class="edit-link" title="Edit" style="position: fixed;top: 0;left: 0;z-index: 9999;">','</span>');

// Lấy link từ home
echo esc_url( site_url('/') );
echo esc_url( home_url( '/' ) );

// Lấy link từ theme
echo esc_url(get_template_directory_uri());

// Lấy next và prev link
the_post_navigation( array(
    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
        '<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
        '<span class="post-title">%title</span>',
    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
        '<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
        '<span class="post-title">%title</span>',
) );

// Check Điều kiện file single-attachment.php
is_singular( 'attachment' );

// Chèn code của file content-single.php trong folder template-parts
get_template_part( 'template-parts/content', 'single' );

// Chèn sidebar.php hoặc sidebar-contact.php
get_sidebar();
get_sidebar('contact');

// Chèn header.php
get_header();

// Chèn footer.php
get_footer();

// Truy vấn post
$query = new WP_Query( $args );
if ( $query->have_posts() ):
    while ( $query->have_posts() ):
            $query->the_post(); /* Thiết lập post hiện tại sau mõi vòng lặp */
    endwhile;
    // <!-- pagination here -->
    wp_reset_postdata(); /* Restore original Post Data */
    wp_reset_query(); /* Restore original query */
else:
    // no posts found
endif;

if (have_posts()):
    while ( have_posts() ) : the_post();
        // found posts
    endwhile;
else;
    // no posts found
endif;
```
### Tham khảo thêm
- https://developer.wordpress.org/themes/basics
- https://codex.wordpress.org/Creating_an_Error_404_Page
- https://codex.wordpress.org/Template_Hierarchy
- https://codex.wordpress.org/Category:Conditional_Tags
- https://developer.wordpress.org/themes/basics/template-files/#template-partials
- https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
- https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post