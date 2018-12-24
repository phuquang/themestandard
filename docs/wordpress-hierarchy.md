# THE WORDPRESS TEMPLATE HIERARCHY
Đây là hệ thống cấp bật của template được wordpress quy định nhớ tuân thủ hen.

```bash
index.php
├──archive.php
│  ├──author.php
│  │  └──author-$id.php
│  │     └──author-$nicename.php
│  ├──category.php
│  │  └──category-$id.php
│  │     └──category-$slug.php
│  ├──archive-$posttype.php
│  ├──taxonomy.php
│  │  └──taxonomy-$taxonomy.php
│  │     └──taxonomy-$taxonomy-$term.php
│  ├──date.php
│  └──tag.php
│     └──tag-$id.php
│        └──tag-$slug.php
├──singular.php
│  ├──single.php
│  │  ├──attachment.php
│  │  │  └──$mimetype.php
│  │  │     └──$subtype.php
│  │  │        └──$mimetype-$subtype.php
│  │  ├──single-$posttype.php
│  │  │  └──single-$posttype-$slug.php
│  │  └──single-post.php
│  └──page.php
│     └──page-$id.php
│        └──page-$slug.php
├──home.php
├──404.php
└──search.php
```

# Giải thích
Wordpress sẽ tìm các file con nếu không tồn tại nó sẽ tìm tới file cấp cao hơn để hiển thị.
Về tính quan trọng các file nằm gần gốc sẽ buộc phải có.
Ví dụ: Trang sample có id là 1, slug là sample và url là https://themestandard.com/sample thì khi truy cập nó sẽ tìm đến template theo thứ tự từ ① > ② > ③ > ④ > ⑤.
```bash
index.php                    ⑤
├──singular.php              ④
│  └──page.php               ③
│     └──page-$id.php        ②
│        └──page-$slug.php   ①
```

# Tham khảo
- https://developer.wordpress.org/themes/basics/template-hierarchy/
- https://wphierarchy.com/

# Navigation
- [Trang chủ](https://phuquang.github.io/themestandard/)
- [Yêu cầu](https://phuquang.github.io/themestandard/theme-requite)
- [Hệ thống cấp bật template](https://phuquang.github.io/themestandard/wordpress-hierarchy)
- [Cấu trúc thư mục theme](https://phuquang.github.io/themestandard/theme-structure)
- [Hàm thường dùng](https://phuquang.github.io/themestandard/wordpress-functions)
- [Tham khảo](https://phuquang.github.io/themestandard/theme-document)
