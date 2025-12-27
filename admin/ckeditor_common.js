/**
 * CẤU HÌNH CHUẨN CKEDITOR CHO KHASERVICE ADMIN
 * Bao gồm: Tab thụt lề, Ký tự đặc biệt, Grid ảnh, Paste sạch từ Word.
 */

// Đảm bảo không lỗi nếu chưa load CKEditor
if (typeof CKEDITOR !== 'undefined') {
    CKEDITOR.disableAutoInline = true;
    
    // CSS hiển thị trong Editor
    CKEDITOR.addCss(
        '.photo-grid{display:flex;flex-wrap:wrap;margin:0 -5px;width:100%;clear:both;}' +
        '.photo-grid .grid-item{padding:0 5px;box-sizing:border-box;}' +
        '.photo-grid img{width:100%;height:auto;display:block;}' +
        '.photo-grid-2 .grid-item{width:50%;}' +
        '.photo-grid-4 .grid-item{width:25%;}' +
        '.img-100{width:100%;}' +
        '.img-75{width:75%;}' +
        '.img-50{width:50%;}' +
        '.img-25{width:25%;}'
    );

    // --- TÍNH NĂNG MỚI: Alt + Scroll để resize ảnh ---
    CKEDITOR.on('instanceReady', function(ev) {
        var editor = ev.editor;
        
        // Lắng nghe sự kiện lăn chuột trên document của editor
        editor.document.on('wheel', function(event) {
            var nativeEvent = event.data.$; // Lấy event gốc
            
            // Kiểm tra nếu phím Alt đang được giữ
            if (nativeEvent.altKey) {
                var selection = editor.getSelection();
                var element = selection.getSelectedElement();
                
                // Kiểm tra xem đối tượng đang chọn có phải là ảnh không
                if (element && element.is('img')) {
                    nativeEvent.preventDefault(); // Ngăn cuộn trang

                    // Xác định chiều lăn (lên/xuống)
                    // deltaY < 0 là lăn lên (phóng to), deltaY > 0 là lăn xuống (thu nhỏ)
                    var delta = Math.sign(nativeEvent.deltaY) * -1; 
                    var step = 5; // Số pixel thay đổi mỗi nấc lăn (tăng giảm độ nhạy ở đây)
                    
                    // Lấy kích thước hiện tại (ưu tiên style width, nếu không có lấy attribute width hoặc clientWidth)
                    var currentWidthStr = element.getStyle('width');
                    var currentWidth = 0;

                    if (currentWidthStr && currentWidthStr.indexOf('%') !== -1) {
                        // Nếu đang là %, chuyển đổi tạm sang px dựa trên cha hoặc lấy clientWidth
                        currentWidth = element.$.clientWidth;
                    } else {
                        currentWidth = parseInt(currentWidthStr) || parseInt(element.getAttribute('width')) || element.$.clientWidth;
                    }

                    // Tính kích thước mới
                    var newWidth = currentWidth + (delta * step);
                    
                    // Giới hạn nhỏ nhất là 20px để không bị mất ảnh
                    if (newWidth > 20) {
                        element.setStyle('width', newWidth + 'px');
                        element.setStyle('height', 'auto'); // Giữ tỷ lệ
                        
                        // Xóa các class định dạng chiều rộng cứng (nếu có) để style inline có tác dụng
                        element.removeClass('img-100');
                        element.removeClass('img-75');
                        element.removeClass('img-50');
                        element.removeClass('img-25');
                    }
                }
            }
        });
    });

    // Định nghĩa Templates (Lưới ảnh)
    CKEDITOR.on('instanceCreated', function(event) {
        var editor = event.editor;
        
        // Chỉ đăng ký template một lần cho editor đầu tiên để tránh trùng lặp
        if (CKEDITOR.plugins.get('templates')) {
            CKEDITOR.addTemplates('default', {
                imagesPath: CKEDITOR.getUrl(CKEDITOR.plugins.getPath('templates') + 'templates/images/'),
                templates: [
                    {
                        title: 'Lưới 2 Ảnh (50% - 50%)',
                        image: 'template1.gif',
                        description: 'Bố cục 2 ảnh nằm ngang',
                        html:
                            '<div class="photo-grid photo-grid-2">' +
                                '<div class="grid-item"><img src="https://placehold.co/600x400?text=Ảnh+1" alt=""></div>' +
                                '<div class="grid-item"><img src="https://placehold.co/600x400?text=Ảnh+2" alt=""></div>' +
                            '</div><p>&nbsp;</p>'
                    },
                    {
                        title: 'Lưới 4 Ảnh (25% mỗi ảnh)',
                        image: 'template2.gif',
                        description: 'Bố cục 4 ảnh ngang',
                        html:
                            '<div class="photo-grid photo-grid-4">' +
                                '<div class="grid-item"><img src="https://placehold.co/400x300?text=Ảnh+1" alt=""></div>' +
                                '<div class="grid-item"><img src="https://placehold.co/400x300?text=Ảnh+2" alt=""></div>' +
                                '<div class="grid-item"><img src="https://placehold.co/400x300?text=Ảnh+3" alt=""></div>' +
                                '<div class="grid-item"><img src="https://placehold.co/400x300?text=Ảnh+4" alt=""></div>' +
                            '</div><p>&nbsp;</p>'
                    }
                ]
            });
        }
    });
}

/**
 * Hàm khởi tạo CKEditor cho một danh sách ID
 * @param {Array} ids - Mảng chứa ID của các textarea (VD: ['noidung_vi', 'mota_vi'])
 * @param {String} folder - Tên thư mục upload (VD: 'tintuc', 'gioithieu')
 * @param {Object} customConfig - Cấu hình ghi đè (tùy chọn)
 */
function initKhaServiceCKEditor(ids, folder, customConfig) {
    if (typeof CKEDITOR === 'undefined') {
        setTimeout(function() { initKhaServiceCKEditor(ids, folder, customConfig); }, 100);
        return;
    }

    var baseConfig = {
        height: 400,
        language: 'vi',
        versionCheck: false,
        tabSpaces: 4, // Tab thụt lề
        autoParagraph: false,
        resize_enabled: true,
        
        // File Browser
        filebrowserBrowseUrl: 'browser.php?dir=' + folder,
        filebrowserImageBrowseUrl: 'browser.php?dir=' + folder,
        filebrowserUploadUrl: 'ck_upload.php?dir=' + folder,
        filebrowserImageUploadUrl: 'ck_upload.php?dir=' + folder,

        // Plugins
        extraPlugins: 'image,filebrowser,justify,colorbutton,font,specialchar,templates',
        
        // Paste Clean
        pasteFromWordRemoveFontStyles: true,
        pasteFromWordRemoveStyles: true,
        forcePasteAsPlainText: false,
        
        // Security
        disallowedContent: 'script; *[on*]; iframe; object; embed',

        // Styles Set
        stylesSet: [
            { name: 'Ảnh rộng 100%', element: 'img', attributes: { 'class': 'img-100' } },
            { name: 'Ảnh rộng 75%',  element: 'img', attributes: { 'class': 'img-75' } },
            { name: 'Ảnh rộng 50%',  element: 'img', attributes: { 'class': 'img-50' } },
            { name: 'Ảnh rộng 25%',  element: 'img', attributes: { 'class': 'img-25' } }
        ]
    };

    ids.forEach(function (id) {
        var el = document.getElementById(id);
        if (!el) return;
        
        // Hủy instance cũ nếu tồn tại (tránh lỗi khi load ajax hoặc init lại)
        if (CKEDITOR.instances[id]) {
            CKEDITOR.instances[id].destroy(true);
        }

        var finalConfig = Object.assign({}, baseConfig, customConfig || {});
        
        // Tự động chỉnh chiều cao cho các ô mô tả ngắn
        if (id.includes('mota') || id.includes('short')) {
            finalConfig.height = 150;
        }

        CKEDITOR.replace(id, finalConfig);
    });
}
