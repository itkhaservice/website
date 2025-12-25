# GEMINI PROJECT CONTEXT

## Thông tin dự án
- **Ngày cập nhật:** 25/12/2025
- **Dự án:** Khaservice Website
- **Tech Stack:** PHP (Custom Framework), MySQL, XAMPP.

## Trạng thái hiện tại
- **Database:** `khaservice_db` (đã restore, UTF-8).
- **Entry Point:** `index.php` (đã vô hiệu hóa `index.html` tĩnh bằng cách đổi tên).
- **Routing:** Rewrite URL `.html` qua `.htaccess`.

## Lịch sử thay đổi bởi Gemini
1. **Khôi phục Database:** Import `backup/khaservice_db_backup_20251225_110425.sql`.
2. **Sửa lỗi hiển thị:** Fix font tiếng Việt, ưu tiên `index.php`.
3. **SEO URLs:**
   - Tạo `.htaccess`.
   - Update `templates/layout/header.php`: Menu link -> `.html`.
   - Update `templates/layout/footer.php`: Footer link -> `.html`.
4. **Logic trang Giới thiệu (`sources/gioi-thieu.php`):**
   - Mặc định load `table_static` (type='ve-chung-toi').
   - Có ID load `table_gioithieu`.

## Lời dặn của User (Instructions)
- **Primary Color:** `#09bc8a` (Xanh lá).
- **Responsive:** Ưu tiên tối ưu hiển thị Mobile cho Trang chủ (index.php).
- **Cấu trúc URL:** Giữ nguyên dạng `.html` thân thiện, không quay lại dạng `index.php?com=...`.
- **Đồng bộ:** File này (`GEMINI_CONTEXT.md`) đóng vai trò là bộ nhớ dài hạn. Cần commit lên GitHub để Gemini ở máy khác có thể đọc và hiểu ngữ cảnh.
