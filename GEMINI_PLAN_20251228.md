# KẾ HOẠCH HOÀN THIỆN HỆ THỐNG ADMIN - 28/12/2025

Dựa trên bảng Checklist tại `chatAI/Screenshot_2.png`, mục tiêu là phủ kín toàn bộ dấu "x" (tính năng) cho tất cả các bảng dữ liệu.

## 📌 NGUYÊN TẮC CỐT LÕI
1. **Màu sắc:** Giữ nguyên màu xanh Primary `#108042`.
2. **Thông báo:** 100% tác vụ (Thêm/Sửa/Xóa/AJAX) phải có Toastr hoặc SweetAlert2.
3. **Tính năng:** Kéo thả STT, Chọn nhiều, Xóa nhiều, Lọc dàn hàng ngang phải đồng bộ ở mọi module.
4. **An toàn:** Không thay đổi các hàm logic xử lý cũ không liên quan.

## 🚀 DANH SÁCH CÁC MỤC CẦN NÂNG CẤP

### 1. Module Liên hệ - Đăng ký
- [ ] Bổ sung bộ lọc: Tìm kiếm theo tên/email, Lọc khoảng ngày tháng.
- [ ] Tính năng: Chọn nhiều, Xóa hàng loạt.
- [ ] Giao diện: Dàn hàng ngang bộ lọc, căn giữa.

### 2. Module Slideshow & Banner
- [ ] Kích hoạt Kéo thả (Sortable) thay đổi STT.
- [ ] Bổ sung: Chọn nhiều, Xóa nhiều.
- [ ] Đồng bộ thông báo Toastr khi bật/tắt hiển thị.

### 3. Module Đối tác & Khách hàng nói (Feedback)
- [ ] Áp dụng bộ lọc dàn ngang chuẩn.
- [ ] Kích hoạt Kéo thả STT.
- [ ] Phủ kín tính năng Xóa nhiều & Chọn tất cả.

### 4. Module Dịch vụ & Tuyển dụng
- [ ] Kiểm tra và bổ sung Lọc ngày tháng (nếu chưa có).
- [ ] Đảm bảo tính năng Kéo thả STT hoạt động mượt mà.
- [ ] Đồng bộ giao diện "Thanh Pill" cho bộ lọc.

### 5. Module Thư viện ảnh
- [ ] Rà soát lại việc chọn nhiều ảnh/xóa nhiều ảnh trong danh sách album.
- [ ] Đảm bảo đồng bộ thông báo sau khi Lưu/Cập nhật.

## 🛠 CÔNG VIỆC KỸ THUẬT
- **Backend:** Cập nhật các hàm `delete_all_item` trong `sources/photo.php`, `sources/contact.php`,... sử dụng `transfer()`.
- **Frontend Admin:** Chuẩn hóa toàn bộ các file `items_tpl.php` theo mẫu "kỹ" đã làm ở module Tin tức.
- **Support:** Đảm bảo định dạng ảnh `.jfif` được nhận diện ở tất cả các module có upload ảnh.

---
*Hẹn gặp lại vào sáng mai để bắt đầu thực hiện!*
