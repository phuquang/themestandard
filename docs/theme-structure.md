# Hệ thống phân cấp thư mục dành cho dự án
```bash
.
├──📁assets/                          # Chứa các tệp frontend và admin (css, js, image, font v.v..)
│  ├──📁admin-css/                    # Style (css) dành cho trang admin
│  ├──📁admin-fonts/                  # Font dành cho trang admin
│  ├──📁admin-images/                 # Hình dành cho trang admin
│  ├──📁admin-js/                     # Script (js) dành cho trang admin
│  │  └──📁codemirror/                # Thư viện codemirror (Sử dụng cho chức năng edit-template-page của page)
│  ├──📁css/                          # Style (css) dành cho frontend
│  ├──📁fonts/                        # Font dành cho frontend
│  ├──📁images/                       # Hình dành cho frontend
│  └──📁js/                           # Script (js) dành cho frontend
├──📁inc/                             # Function, controller v.v..
│  ├──📁libraries/                    # Chứa thư viện code
│  │  ├──📝disable-feature.php        # Thư viện loại bỏ các tính năng mặc định
│  │  ├──📝helper.php                 # Thư viện những hàm hỗ trợ
│  │  ├──📝QNP_Pagination.php         # Class phân trang, được gọi trong the_pagination()
│  │  └──📝theme-debug.php            # Hàm hỗ trợ cho dev và debug, deploy thì nên xóa đi
│  ├──📁metaboxes/                    # Chứa file tạo metabox
│  │  └──📝edit-template-page.php     # Chức năng edit-template-page của page
│  ├──📁options/                      # Chứa các file đăng ký admin option page
│  │  ├──📝theme-settings-child.php   # Trang option con
│  │  └──📝theme-settings.php         # Trang option chung
│  ├──📁registers/                    # Chứa các file đăng ký post type và sidebar
│  │  ├──📝posttype-sample.php        # Mẫu đăng ký post type
│  │  └──📝sidebar-sample.php         # Mẫu đăng ký sidebar
│  ├──📁widgets/                      # Chứa các file đăng ký widget
│  │  └──📝sample.php                 # Mẫu đăng ký widget
│  ├──📝disable.php                   # Thực thi các hàm loại bỏ các tính năng mặc định
│  ├──📝pagination.php                # Class phân trang, được gọi trong the_pagination()
│  ├──📝redirects.php                 # Những hàm chuyển hướng
│  ├──📝helper.php                    # Những hàm hỗ trợ
│  ├──📝seo.php                       # Tùy chỉnh lại các thẻ SEO
│  ├──📝setup.php                     # Thiết lập theme
│  └──📝init.php                      # Require các file trong thư mục inc
├──📁languages/                       # Ngôn ngữ
│  ├──📝theme.pot                     # File chứa chuỗi dịch (Portable Object Template)
│  ├──📝theme.po                      # File chứa bản dịch thực sự (Portable Object)
│  └──📝theme.mo                      # File đã được biên dịch (Machine Object)
├──📁form-controllers/                # Chứa các file sử lý của form
│  ├──📝page-contact-controller.php   # Xử lý
│  ├──📝page-contact-validator.php    # Kiểm tra đầu vào
│  └──📝page-contact-sendmail.php     # Gửi mail
├──📁template-emails/                 # Chứa các mẫu gửi mail
│  ├──📝page-contact-user.tpl         # Mẫu dành email của user
│  └──📝page-contact-admin.tpl        # Mẫu dành email của admin
├──📁template-pages/                  # Chứa các trang với định danh là slug
│  ├──📝page-top.php                  # Nội dung trang chủ
│  ├──📝page-slug.php                 # Các trang theo định danh slug
│  ├──📝page-contact.php              # Trang form
│  ├──📝page-contact-confirmation.php # Trang xác nhận
│  ├──📝page-contact-error.php        # Trang in lỗi
│  └──📝page-contact-complete.php     # Trang hoàn thành
├──📁template-parts/                  # Chứa các phần của code
│  ├──📝global-footer.php             # Phần footer chung
│  ├──📝global-header.php             # Phần header chung
│  ├──📝global-navigation.php         # Điều hướng trang
│  ├──📝content-none.php              # Code in nội dung
│  └──📝content.php                   # Code in nội dung
├──📁tmp/                             # Sử dụng cho chức năng edit-template-page của page
├──📝404.php                          # Trang không tìm thấy
├──📝archive-sample.php               # Danh sách của Post Type: sample
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
├──📝single-sample.php                # Chi tiết của Post Type: sample
├──📝single.php                       # Chi tiết chung (Post)
└──📝style.css                        # Style chính
```

# Navigation
- [Trang chủ](https://phuquang.github.io/themestandard/)
- [Sơ đồ tài liệu](https://phuquang.github.io/themestandard/sitemap)
