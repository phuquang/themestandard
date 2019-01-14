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
- Tên hàm **required**
[Value is exist]
- Tên hàm **max**
[Value is elder condition]
- Tên hàm **min**
[Value is lesser condition]
- Tên hàm **zipcode**
[zipcode format exactly]
- Tên hàm **hiragana**
[hiragana format exactly]
- Tên hàm **katakana**
[katakana format exactly]
- Tên hàm **email**
[email format exactly]
- Tên hàm **phone**
[phone format exactly]
- Tên hàm **number**
[number format exactly]
- Tên hàm **url**
[url format exactly]
- Tên hàm **fullwidth**
[fullwidth format exactly]
- Tên hàm **numfullwidth**
[number fullwidth format exactly]
- Tên hàm **dateformat**
[date format exactly]
- Tên hàm **passwordstrength**
Use long passwords (8-20) with letters, CAPS, numbers and sybols
- Tên hàm **passwordstrengthnotsymbols**
Use long passwords (8-20) with letters, CAPS and numbers
- Tên hàm **passwordstrengthtomessage**
Use long passwords (8-20) with letters, CAPS and numbers

# Helpers
- Tên hàm **eAgreement**
- Tên hàm **eChecked**
- Tên hàm **eSelected**
- Tên hàm **eCheckedbox**
- Tên hàm **eCheckedboxText**
- Tên hàm **eTextarea**
- Tên hàm **args_msg**
- Tên hàm **args_checkbox**
- Tên hàm **hiddenInput**
- Tên hàm **hiddenTextarea**

# Errors
- Tên hàm **notErrors**
- Tên hàm **hasErrors**
- Tên hàm **addError**

# Filters
- Tên hàm **convertKatakana**
- Tên hàm **convertHankaku**
- Tên hàm **convertHiragana**
- Tên hàm **convertHiraganaToKatakana**
- Tên hàm **convertNewLine**
- Tên hàm **mb_trim**
- Tên hàm **trimSpace**
- Tên hàm **numFull2Half**
- Tên hàm **removeSlashes**
- Tên hàm **convertTel**
- Tên hàm **convertDateJa**
- Tên hàm **convertStr2Dot**

# Methods
- Tên hàm **methodIsPost**
- Tên hàm **methodIsGet**
- Tên hàm **post**
- Tên hàm **get**
- Tên hàm **issetPost**
- Tên hàm **issetGet**

# Navigation
- [Trang chủ](https://phuquang.github.io/themestandard/)
- [Sơ đồ tài liệu](https://phuquang.github.io/themestandard/sitemap)
