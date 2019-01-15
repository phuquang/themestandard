# Form validation

# Cấu trúc thư mục
```bash
.
├──📁inc/                                # Function, controller v.v..
│  └──📁libraries/                       # Chứa thư viện code
│     └──📁Form/                         # Thư viện Form
│        ├──📝index.php                  # File index để tránh truy cập trực tiếp
│        ├──📝init.php                   # Include các file quang trọng
│        ├──📝QNP_Form.php               # Chương trình chính
│        ├──📝QNP_Field.php              # Khởi tạo field
│        ├──📝QNP_Mailer.php             # Gửi mail
│        ├──📝trait.qnp_errors.php       # Hàm xử lý thông tin lỗi
│        ├──📝trait.qnp_filters.php      # Hàm xử lý và chuyển đổi dữ liệu
│        ├──📝trait.qnp_methods.php      # Hàm xử lý dữ liệu đầu vào
│        ├──📝trait.qnp_rules.php        # Xử lý dữ liệu qua các quy tắc định trước
│        └──📝trait.qnp_helpers.php      # Hàm phụ trợ
├──📁form-controllers/                   # Chứa các file sử lý của form
│  ├──📝page-contact-controller.php      # Xử lý
│  ├──📝page-contact-validator.php       # Kiểm tra đầu vào
│  └──📝page-contact-sendmail.php        # Gửi mail
├──📁template-emails/                    # Chứa các mẫu gửi mail
│  ├──📝page-contact-user.tpl            # Mẫu dành email của user
│  └──📝page-contact-admin.tpl           # Mẫu dành email của admin
├──📁template-pages/                     # Chứa các trang với định danh là slug
│  ├──📝page-contact.php                 # Trang form
│  └──📝page-contact-complete.php        # Trang hoàn thành của form
├──📁template-parts/                     # Chứa các phần của code
│  ├──📝content-contact-confirmation.php # Phần nội dung của trang xác nhận
│  └──📝content-contact.php              # Phần nội dung của trang form
```

# Rules

| Hàm | Param | Return | Giải thích |
| --- | --- | --- |
| **required** | `String` | `true`/`false` | [Value is exist] |
| **max** | `String`, `integer` | `true`/`false` | [Value is elder condition] |
| **min** | `String`, `integer` | `true`/`false` | [Value is lesser condition] |
| **zipcode** | `String` | `true`/`false` | [zipcode format exactly] |
| **hiragana** | `String` | `true`/`false` | [hiragana format exactly] |
| **katakana** | `String` | `true`/`false` | [katakana format exactly] |
| **email** | `String` | `true`/`false` | [email format exactly] |
| **phone** | `String` | `true`/`false` | [phone format exactly] |
| **number** | `String` | `true`/`false` | [number format exactly] |
| **url** | `String` | `true`/`false` | [url format exactly] |
| **fullwidth** | `String` | `true`/`false` | [fullwidth format exactly] |
| **numfullwidth** | `String` | `true`/`false` | [number fullwidth format exactly] |
| **dateformat** | `String` | `true`/`false` | [date format exactly] |
| **passwordstrength** | `String` | `true`/`false` | Use long passwords (8-20) with letters, CAPS, numbers and sybols |
| **passwordstrengthnotsymbols** | `String` | `true`/`false` | Use long passwords (8-20) with letters, CAPS and numbers |
| **passwordstrengthtomessage** | `String` | `true`/`false` | Use long passwords (8-20) with letters, CAPS and numbers |

# Helpers

| Hàm | Cú pháp | Giải thích |
| --- | --- | --- |
| **eAgreement** | | |
| **eChecked** | | |
| **eSelected** | | |
| **eCheckedbox** | | |
| **eCheckedboxText** | | |
| **eTextarea** | | |
| **args_msg** | | |
| **args_checkbox** | | |
| **hiddenInput** | | |
| **hiddenTextarea** | | |

# Errors

| Hàm | Cú pháp | Giải thích |
| --- | --- | --- |
| **notErrors** | | |
| **hasErrors** | | |
| **addError** | | |

# Filters

| Hàm | Cú pháp | Giải thích |
| --- | --- | --- |
| **convertKatakana** | | |
| **convertHankaku** | | |
| **convertHiragana** | | |
| **convertHiraganaToKatakana** | | |
| **convertNewLine** | | |
| **mb_trim** | | |
| **trimSpace** | | |
| **numFull2Half** | | |
| **removeSlashes** | | |
| **convertTel** | | |
| **convertDateJa** | | |
| **convertStr2Dot** | | |

# Methods

| Hàm | Cú pháp | Giải thích |
| --- | --- | --- |
| **methodIsPost** | | |
| **methodIsGet** | | |
| **post** | | |
| **get** | | |
| **issetPost** | | |
| **issetGet** | | |

# Navigation

- [Trang chủ](https://phuquang.github.io/themestandard/)
- [Sơ đồ tài liệu](https://phuquang.github.io/themestandard/sitemap)
