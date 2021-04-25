/*
    VALIDATE FORM 
*/

$(document).ready(function() {
    // Validate form user
    $("#form-user").validate({
        rules: {
            'email': {
                required: true,
                email: true,
            },
            'password': {
                required: true,
                minlength: 6,
            },
            'confirm_password': {
                equalTo: "#password",
            },
            'avatar': {
                extension: "jpg|png|jpeg|gif",
            }
        },
        messages: {
            'email': {
                required: "Nhập email đăng ký.",
                email: "Email không đúng định dạng.",
            },
            'password': {
                required: "Nhập mật khẩu.",
                minlength: "Mật khẩu chứa tối thiểu 6 ký tự.",
            },
            'confirm_password': {
                equalTo: "Xác nhận mật khẩu không trùng khớp.",
            },
            'avatar': {
                extension: "Định dạng không hợp lệ. Vui lòng chọn hình ảnh.",
            }
        }
    });
    $("#form-edit-user").validate({
        rules: {
            'email': {
                required: true,
                email: true,
            },
            'password': {
                minlength: 6,
            },
            'confirm_password': {
                equalTo: "#password",
            },
            'avatar': {
                extension: "jpg|png|jpeg|gif",
            }
        },
        messages: {
            'email': {
                required: "Nhập email đăng ký.",
                email: "Email không đúng định dạng.",
            },
            'password': {
                required: "Nhập mật khẩu.",
                minlength: "Mật khẩu chứa tối thiểu 6 ký tự.",
            },
            'confirm_password': {
                equalTo: "Xác nhận mật khẩu không trùng khớp.",
            },
            'avatar': {
                extension: "Định dạng không hợp lệ. Vui lòng chọn hình ảnh.",
            }
        }
    });
    //Validate form cat
    $("#form-cat").validate({
        rules: {
            'cat_name': {
                required: true,
            }
        },
        messages: {
            'cat_name': {
                required: "Nhập tên danh mục truyện",
            }
        }
    });
    //Validate form story
    $("#form-story").validate({
        rules: {
            'name': {
                required: true,
            },
            'cat_id': {
                required: true,
            },
            'picture': {
                extension: "jpg|png|jpeg|gif",
            },
            'preview_text': {
                required: true,
            }
        },
        messages: {
            'name': {
                required: "Nhập tiêu đề truyện",
            },
            'cat_id': {
                required: "Chọn danh mục truyện",
            },
            'picture': {
                extension: "Định dạng file không hợp lệ. Vui lòng chọn hình ảnh",
            },
            'preview_text': {
                required: "Nhập tiêu đề cho truyện",
            }
        }
    });
});