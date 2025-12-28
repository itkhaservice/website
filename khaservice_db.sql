-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2025 at 11:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khaservice_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_contact`
--

CREATE TABLE `table_contact` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `ngaytao` int(11) DEFAULT NULL,
  `trangthai` tinyint(1) DEFAULT 0 COMMENT '0: Moi, 1: Da xem'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_contact`
--

INSERT INTO `table_contact` (`id`, `ten`, `dienthoai`, `email`, `diachi`, `tieude`, `noidung`, `ngaytao`, `trangthai`) VALUES
(1, 'Cao Minh Thắng', '+84376701749', 'thangminhcaoss@gmail.com', NULL, NULL, 'Tuyển dụng vị trí iT', 1766733026, 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_dichvu`
--

CREATE TABLE `table_dichvu` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `noidung_vi` longtext DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `noibat` tinyint(1) DEFAULT 0,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_dichvu`
--

INSERT INTO `table_dichvu` (`id`, `ten_vi`, `ten_khong_dau`, `mota_vi`, `noidung_vi`, `photo`, `stt`, `hienthi`, `noibat`, `ngaytao`, `ngaysua`, `title`, `keywords`, `description`) VALUES
(1, 'Dịch vụ quản lý và vận hành tòa nhà chung cư', 'dich-vu-quan-ly-va-van-hanh-toa-nha-chung-cu', '', '<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-quan-ly-va-van-hanh-toa-nha-chung-cu/34.jpg\" style=\"width: 70%; height: auto;\" /></p>\r\n\r\n<p><strong>Một đơn vị quản l&yacute; chung cư sẽ vận h&agrave;nh v&agrave;&nbsp;kiểm so&aacute;t chặt chẽ tại t&ograve;a nh&agrave;, chung cư đ&oacute;.</strong></p>\r\n\r\n<p>Bao gồm c&aacute;c dịch vụ sau:</p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-quan-ly-va-van-hanh-toa-nha-chung-cu/Монтажная область 99@4x.png\" style=\"width: 65%; height: auto;\" /></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;Về cung cấp&nbsp;<em>dịch vụ quản l&yacute; vận h&agrave;nh cao ốc</em>:</p>\r\n\r\n<p>►&nbsp;N&acirc;ng cao gi&aacute; trị: kh&ocirc;ng chỉ n&acirc;ng cao gi&aacute; trị Bất động sản cho chủ đầu tư m&agrave; c&ograve;n n&acirc;ng cao vị thế của c&ocirc;ng ty, đơn vị đ&oacute;ng tại t&ograve;a nh&agrave;.</p>\r\n\r\n<p>►&nbsp;Tăng doanh thu: xem x&eacute;t hiệu suất so với nhu cầu thị trường v&agrave; li&ecirc;n tục cải thiện c&aacute;c dịch vụ cung cấp cho kh&aacute;ch thu&ecirc; văn ph&ograve;ng.</p>\r\n\r\n<p>►&nbsp;Kiểm so&aacute;t chi ph&iacute;: l&ecirc;n kế hoạch ng&acirc;n s&aacute;ch chi ti&ecirc;u một c&aacute;ch kỹ lưỡng, sắp xếp c&aacute;c quy tr&igrave;nh thanh to&aacute;n một c&aacute;ch hợp l&yacute; v&agrave; hiệu quả, v&agrave; thực hiện c&aacute;c chương tr&igrave;nh bảo tr&igrave; bảo dưỡng ngăn ngừa định kỳ, tập trung v&agrave;o c&aacute;c chương tr&igrave;nh tiết kiệm năng lượng, c&aacute;c ti&ecirc;u chuẩn xanh trong quản l&yacute;.</p>\r\n\r\n<p>►&nbsp;Bảo đảm chất lượng: cam kết duy tr&igrave;, bảo đảm chất lượng, gi&aacute; trị t&agrave;i sản cũng như tuyển dụng v&agrave; đ&agrave;o tạo đội ngũ nh&acirc;n vi&ecirc;n c&oacute; chuy&ecirc;n m&ocirc;n cao.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:1000px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><em>&nbsp; &nbsp;Ch&uacute;ng t&ocirc;i g&aacute;nh v&aacute;c v&agrave; chia sẻ với Chủ đầu tư/Ban Quản Trị những lo lắng trong việc vận h&agrave;nh v&agrave; quản l&yacute; một khối bất động sản lớn. Với thế mạnh của m&igrave;nh l&agrave; chung cấp nh&acirc;n sự cho cả bộ m&aacute;y.</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;Ban quản l&yacute; t&ograve;a nh&agrave;, ch&uacute;ng t&ocirc;i sẽ thực hiện c&aacute;c c&ocirc;ng việc như sau:</p>\r\n\r\n<p>►&nbsp;Lập kế hoạch quản l&yacute; t&ograve;a nh&agrave;; x&acirc;y dựng v&agrave; bố tr&iacute; nh&acirc;n sự quản l&yacute; v&agrave; vận h&agrave;nh.</p>\r\n\r\n<p>►&nbsp;Soạn thảo v&agrave; đề xuất ban h&agrave;nh c&aacute;c nội quy cho t&ograve;a nh&agrave; v&agrave;o từng thời điểm li&ecirc;n quan đến việc sử dụng vận h&agrave;nh t&ograve;a nh&agrave;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;Đảm bảo duy tr&igrave; c&aacute;c dịch vụ:</p>\r\n\r\n<p>►&nbsp;Ph&ograve;ng ch&aacute;y chữa ch&aacute;y v&agrave; phối hợp thực hiện theo y&ecirc;u cầu của PCCC.</p>\r\n\r\n<p>►&nbsp;Hệ thống điện c&ocirc;ng cộng bao gồm việc kiểm tra to&agrave;n bộ c&aacute;c thiết bị điện dự ph&ograve;ng.</p>\r\n\r\n<p>►&nbsp;Hệ thống cung cấp v&agrave; tho&aacute;t nước sinh hoạt.</p>\r\n\r\n<p>►&nbsp;Đảm bảo mọi dịch vụ c&oacute; hiệu quả bằng việc giảm thiểu c&aacute;c yếu tố bất tiện cho t&ograve;a nh&agrave;.</p>\r\n\r\n<p>►&nbsp;Đảm bảo một c&aacute;ch hợp l&yacute; c&aacute;c chủ căn hộ v&agrave; kh&aacute;ch thu&ecirc; tu&acirc;n thủ quy định của t&ograve;a nh&agrave;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;Kiểm so&aacute;t v&agrave; bảo đảm t&igrave;nh h&igrave;nh an ninh trật tự khu vực b&ecirc;n ngo&agrave;i v&agrave; b&ecirc;n trong t&ograve;a nh&agrave;:</p>\r\n\r\n<p>►&nbsp;Kiểm so&aacute;t người lạ v&agrave;o chung cư chặt chẽ với sự đồng &yacute; của chủ căn hộ th&ocirc;ng qua hệ thống intercom, camera (nếu c&oacute;).</p>\r\n\r\n<p>►&nbsp;Phối hợp với c&ocirc;ng an phường, ch&iacute;nh quyền sở tại để giải quyết v&agrave; xử l&yacute; việc chiếm dụng vỉa h&egrave; để kinh doanh bu&ocirc;n b&aacute;n g&acirc;y mất trật tự khu vực trước cửa chung cư.</p>\r\n\r\n<p>►&nbsp;Bộ phận bảo vệ an ninh l&agrave;m việc 24/24.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;Bảo đảm c&ocirc;ng t&aacute;c mỹ quan v&agrave; vệ sinh c&ocirc;ng cộng cho t&ograve;a nh&agrave;:</p>\r\n\r\n<p>►&nbsp;Kiểm tra đ&ocirc;n đốc, nhắc nhở c&aacute;c hộ d&acirc;n về việc chấp h&agrave;nh đ&uacute;ng c&aacute;c nội quy, m&ocirc;i trường, kh&ocirc;ng để d&acirc;n phơi đồ ngo&agrave;i h&agrave;nh lang l&agrave;m mất mỹ quan t&ograve;a nh&agrave;.</p>\r\n\r\n<p>►&nbsp;L&agrave;m vệ sinh nơi c&ocirc;ng cộng, h&agrave;nh lang trong t&ograve;a nh&agrave;, đường v&agrave; s&acirc;n vườn nội bộ, vệ sinh thang m&aacute;y, thang bộ, m&aacute;i đ&oacute;n,&hellip;</p>\r\n\r\n<p>►&nbsp;Bố tr&iacute; người trực lu&acirc;n phi&ecirc;n từ thứ 2 đến chủ nhật h&agrave;ng tuần để đảm bảo c&ocirc;ng t&aacute;c vệ sinh chung cho t&ograve;a nh&agrave;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp; Bảo đảm quyền lợi, t&agrave;i sản của kh&aacute;ch h&agrave;ng ra v&agrave;o t&ograve;a nh&agrave;:</p>\r\n\r\n<p>►&nbsp;Lắp đặt hệ thống kiểm so&aacute;t lưu lượng xe ra v&agrave;o t&ograve;a nh&agrave; bằng hệ thống thẻ th&ocirc;ng minh.</p>\r\n\r\n<p>►&nbsp;Kiểm so&aacute;t, cấp phiếu giữ xe ra v&agrave;o t&ograve;a nh&agrave;, giữ xe trong khu vực quản l&yacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;Bảo đảm c&ocirc;ng t&aacute;c bảo tr&igrave; t&ograve;a nh&agrave; cho chủ đầu tư:</p>\r\n\r\n<p>►&nbsp;Ghi nhận v&agrave; lập danh s&aacute;ch c&aacute;c hạng mục hư hỏng cần sửa chữa, th&ocirc;ng b&aacute;o cho Chủ đầu tư v&agrave; Ban quản trị chung cư.</p>\r\n\r\n<p>►&nbsp;Đề xuất c&aacute;c biện ph&aacute;p n&acirc;ng cấp thường xuy&ecirc;n về mặt vật chất đối với t&ograve;a nh&agrave;. Gi&aacute;m s&aacute;t, kiểm so&aacute;t tất cả c&aacute;c c&ocirc;ng việc bảo tr&igrave; tại t&ograve;a nh&agrave;.</p>\r\n\r\n<p>►&nbsp;Quản l&yacute; c&ocirc;ng việc v&agrave; gi&aacute;m s&aacute;t c&aacute;c nh&agrave; thầu kh&aacute;c (nếu c&oacute;): sửa chữa, bảo tr&igrave;, bảo dưỡng,&hellip;</p>\r\n\r\n<p>►&nbsp;Kịp thời giải quyết c&aacute;c khiếu nại li&ecirc;n quan đến c&ocirc;ng t&aacute;c quản l&yacute; t&ograve;a nh&agrave;: ghi nhận v&agrave; xử l&yacute;, giải quyết tất cả những khiếu nại li&ecirc;n quan đến t&ograve;a nh&agrave; của c&aacute;c cư d&acirc;n đang sinh sống trong t&ograve;a nh&agrave;.</p>\r\n\r\n<p>►&nbsp;C&aacute;c biện ph&aacute;p bảo tr&igrave; dự ph&ograve;ng v&agrave; xem x&eacute;t lại t&iacute;nh hiệu quả của c&ocirc;ng t&aacute;c điều h&agrave;nh quản l&yacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n\r\n<p><em>H&acirc;n hạnh phục vụ Qu&yacute; kh&aacute;ch!</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'upload/dichvu/dich-vu-quan-ly-va-van-hanh-toa-nha-chung-cu/29981167.png', 1, 1, 1, NULL, 1766813001, '', '', ''),
(2, 'Dịch vụ giữ xe 24/24', 'dich-vu-giu-xe-2424', '', '<p style=\"text-align: justify;\"><span style=\"font-size:14px;\">Dịch vụ giữ xe 24/24h sử dụng phần mềm giữ xe th&ocirc;ng minh, b&atilde;i xe được trang bị đầy đủ hệ thống PCCC, hệ thống camera hiện đại, thực hiện quy định v&agrave;&nbsp;&aacute;p dụng quy tr&igrave;nh ra v&agrave;o cho kh&aacute;ch v&atilde;ng lai đến t&ograve;a nh&agrave;, chung cư một c&aacute;ch chặt chẽ v&agrave; an to&agrave;n.</span></p>\r\n\r\n<p style=\"text-align: justify;\"><span style=\"font-size:14px;\">Phần mềm quản l&yacute; xe c&oacute; c&ocirc;ng nghệ hiện đại v&agrave; đạt nhiều t&iacute;nh năng tốt. Vấn đề mất thẻ giữ xe l&agrave; một vấn đề hay gặp phải. Đối với trường hợp n&agrave;y, ch&uacute;ng t&ocirc;i c&oacute; thể so s&aacute;nh h&igrave;nh ảnh, cho ph&eacute;p mọi th&ocirc;ng tin được m&atilde; h&oacute;a l&agrave;m tăng độ an to&agrave;n cho xe&nbsp;của kh&aacute;ch h&agrave;ng th&ocirc;ng qua sự kết hợp c&ocirc;ng nghệ thẻ chip với m&aacute;y t&iacute;nh. B&atilde;i xe th&ocirc;ng minh sẽ được thao t&aacute;c qu&eacute;t tự động. Thời gian trung b&igrave;nh của một lượt xe v&agrave;o/ra khoảng 2-5 gi&acirc;y, giải quyết được vấn đề &ugrave;n tắc thường xảy ra ở c&aacute;c điểm giữ xe.</span></p>\r\n\r\n<p style=\"text-align: justify;\"><img alt=\"\" src=\"../upload/dichvu/dich-vu-giu-xe-2424/bai-dau-xe-chung-cu-tang-2(1).jpg\" style=\"width: 95%; height: auto;\" /></p>\r\n\r\n<p><strong>&nbsp;&nbsp;<span style=\"font-size:14px;\">Qu&yacute; kh&aacute;ch sẽ y&ecirc;n t&acirc;m khi chọn dịch vụ của ch&uacute;ng t&ocirc;i:</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px;\">► Giữ xe &ocirc;t&ocirc;, m&ocirc; t&ocirc; 24/24h nh&acirc;n vi&ecirc;n&nbsp;bảo vệ trực&nbsp;ng&agrave;y đ&ecirc;m.</span></p>\r\n\r\n<p><span style=\"font-size:14px;\">►&nbsp;Sử dụng c&ocirc;ng nghệ giữ xe th&ocirc;ng minh đảm bảo sự an to&agrave;n tuyệt đối khi qu&yacute; kh&aacute;ch h&agrave;ng gửi xe.</span></p>\r\n\r\n<p><span style=\"font-size:14px;\">►&nbsp;Hệ thống camera được trang bị c&ocirc;ng nghệ&nbsp;mới, c&oacute; nh&acirc;n vi&ecirc;n trực camera 24/24h&nbsp;đảm bảo an ninh cho b&atilde;i giữ xe.</span></p>\r\n\r\n<p><span style=\"font-size:14px;\">►&nbsp;Dịch vụ vệ sinh xe tại b&atilde;i.</span></p>\r\n\r\n<p><span style=\"font-size:14px;\">►&nbsp;Trang bị c&aacute;c thiết bị ph&ograve;ng ch&aacute;y chữa ch&aacute;y đề ph&ograve;ng t&igrave;nh huống xấu nhất xảy ra.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px;\"><strong>KhaService</strong>&nbsp;với ti&ecirc;u ch&iacute; lu&ocirc;n lu&ocirc;n mang đến sự h&agrave;i l&ograve;ng tuyệt đối về chất lượng dịch vụ cũng như chất lượng sản phẩm sẽ l&agrave;m Qu&yacute; kh&aacute;ch h&agrave;i l&ograve;ng.</span></p>\r\n\r\n<p><span style=\"font-size:14px;\">Cần tư vấn&nbsp;<strong><em>Dịch vụ giữ xe</em></strong>, h&atilde;y li&ecirc;n hệ ngay với ch&uacute;ng t&ocirc;i.</span></p>\r\n\r\n<p><span style=\"font-size:14px;\">Hotline&nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;<a href=\"tel:0906 896 269\">0906 896 269</a>&nbsp;-&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></span></p>\r\n\r\n<p><span style=\"font-size:14px;\">Li&ecirc;n hệ&nbsp;Zalo&nbsp; &nbsp; :&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></span></p>\r\n\r\n<hr />\r\n<p><span style=\"font-size:14px;\"><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></span></p>\r\n\r\n<p><span style=\"font-size:14px;\"><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></span></p>\r\n\r\n<p><span style=\"font-size:14px;\"><em>Điện thoại: (028) 38253041</em></span></p>\r\n\r\n<p><span style=\"font-size:14px;\"><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></span></p>\r\n\r\n<p><span style=\"font-size:14px;\"><em>Chat Zalo:&nbsp;</em></span></p>\r\n', 'upload/dichvu/dich-vu-giu-xe-2424/86055556.png', 2, 1, 1, NULL, 1766805458, '', '', ''),
(3, 'Dịch vụ an ninh', 'dich-vu-an-ninh', '', '<p style=\"text-align: justify;\">Dịch vụ an ninh&nbsp;<strong>KhaService</strong>&nbsp;với đội ngũ nh&acirc;n vi&ecirc;n bảo vệ chuy&ecirc;n nghiệp, gi&agrave;u kinh nghiệm trong c&ocirc;ng t&aacute;c giữ g&igrave;n an ninh an to&agrave;n cho t&ograve;a nh&agrave; v&agrave; những nơi cần đến sự an to&agrave;n, an ninh trong khu vực.</p>\r\n\r\n<p style=\"text-align: justify;\">Lựa chọn Dịch vụ bảo vệ tại&nbsp;<strong>KhaService</strong>, Qu&yacute; kh&aacute;ch sẽ y&ecirc;n t&acirc;m v&agrave; h&agrave;i l&ograve;ng. Ch&uacute;ng t&ocirc;i ch&uacute; &yacute; hạn chế hết mức rủi ro, giảm tối đa việc xảy ra những t&igrave;nh huống kh&ocirc;ng hay mọi l&uacute;c mọi nơi.</p>\r\n\r\n<p style=\"text-align: justify;\"><strong>►&nbsp;Với đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp, kinh nghiệm nhiều năm trong nghề, tận t&acirc;m, xử l&yacute; t&igrave;nh huống tốt;</strong></p>\r\n\r\n<p style=\"text-align: justify;\"><strong>►&nbsp;Đội ngũ được huấn luyện chuy&ecirc;n m&ocirc;n đầy đủ, k&egrave;m theo trang thiết bị hỗ trợ l&agrave;m việc.</strong></p>\r\n\r\n<p>&nbsp; &nbsp;Nh&acirc;n vi&ecirc;n&nbsp;<strong>KhaService&nbsp;</strong>giữ vững &yacute; thức đặt đạo đức l&ecirc;n h&agrave;ng đầu n&ecirc;n h&igrave;nh th&agrave;nh một dịch vụ c&oacute; gi&aacute; trị v&agrave; chất lượng tốt.</p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-an-ninh/Img8865.JPG.jpg\" style=\"width: 80%; height: auto;\" /></p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-an-ninh/300892369_103552555829786_5519373393077588786_n.jpg\" style=\"width: 80%; height: auto;\" /></p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'upload/dichvu/dich-vu-an-ninh/83327003.png', 3, 1, 1, NULL, 1766808752, '', '', ''),
(4, 'Dịch vụ vận chuyển', 'dich-vu-van-chuyen', '', '<p>Với nhiều năm phục vụ kh&aacute;ch h&agrave;ng tr&ecirc;n c&aacute;c quận/huyện tại TP. HCM,&nbsp;<strong>KhaServices</strong>&nbsp;c&oacute; nhiều phương ph&aacute;p cũng như kinh nghiệm trong việc đ&oacute;ng g&oacute;i,&nbsp;vận chuyển h&agrave;ng h&oacute;a, đồ đạc to, cồng kềnh, dễ vỡ; ch&uacute;ng t&ocirc;i sẵn s&agrave;ng đồng h&agrave;nh, hỗ trợ vận chuyển nh&agrave; trong khu vực TP. HCM v&agrave; c&aacute;c tỉnh l&acirc;n cận.</p>\r\n\r\n<p><em><strong>► Nhanh ch&oacute;ng, tiện lợi</strong></em></p>\r\n\r\n<p><em><strong>► Th&acirc;n thiện, vui vẻ</strong></em></p>\r\n\r\n<p><em><strong>► Đ&oacute;ng g&oacute;i, th&aacute;o dỡ chuy&ecirc;n nghiệp</strong></em></p>\r\n\r\n<p><em><strong>► Gọn g&agrave;ng, cẩn thận</strong></em></p>\r\n\r\n<p><em><strong>► Chi ph&iacute; hợp l&yacute;</strong></em></p>\r\n\r\n<p><em><strong>► Thanh to&aacute;n chi ph&iacute; đ&uacute;ng với b&aacute;o gi&aacute;</strong></em></p>\r\n\r\n<p><em><strong><img alt=\"\" src=\"../upload/dichvu/dich-vu-van-chuyen/99df2df6b60b6855311a.jpg\" style=\"width: 75%; height: auto;\" /></strong></em></p>\r\n\r\n<p style=\"text-align: center;\"><em>Dịch vụ chuyển nh&agrave; chuy&ecirc;n nghiệp tại KhaServices</em></p>\r\n\r\n<p>&nbsp; &nbsp;Ch&uacute;ng t&ocirc;i sẽ giải quyết c&aacute;c kh&oacute; khăn m&agrave; Qu&yacute; kh&aacute;ch h&agrave;ng đang gặp phải khi chuyển nh&agrave;.&nbsp;<strong>KhaServices&nbsp;</strong>sẵn s&agrave;ng đồng h&agrave;nh c&ugrave;ng Qu&yacute; kh&aacute;ch!</p>\r\n\r\n<p>&nbsp; &nbsp;Li&ecirc;n hệ để nhận b&aacute;o gi&aacute; ngay&nbsp;<strong>Dịch vụ chuyển nh&agrave;</strong>&nbsp;trọn g&oacute;i qua hotline:&nbsp;<a href=\"tel:+84918754277\">0918 754 277</a></p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n', 'upload/dichvu/dich-vu-van-chuyen/58102615.png', 4, 1, 1, NULL, 1766803714, '', '', ''),
(5, 'Dịch vụ giặt ủi', 'dich-vu-giat-ui', '', '<p><strong><span style=\"color:#27ae60;\"><em>Hệ Thống Cửa H&agrave;ng Giặt Ủi KhaService tại Quận 4 v&agrave; TP. Thủ Đức</em></span></strong></p>\r\n\r\n<p style=\"text-align: justify;\">Đời&nbsp;sống ng&agrave;y c&agrave;ng bận rộn, ch&uacute;ng ta lu&ocirc;n quay cuồng trong c&ocirc;ng việc n&ecirc;n&nbsp;kh&ocirc;ng c&oacute; thời gian, sức khỏe&nbsp;để giặt ủi quần &aacute;o. Thời tiết c&ugrave;ng l&agrave; một trong những nguy&ecirc;n nh&acirc;n, nhất l&agrave;&nbsp;v&agrave;o&nbsp;những m&ugrave;a mưa ở S&agrave;i G&ograve;n, ch&uacute;ng ta ng&aacute;n ngẩm việc phơi đồ l&acirc;u kh&ocirc; v&igrave; trời kh&ocirc;ng&nbsp;nắng, m&aacute;y giặt kh&ocirc;ng c&oacute; chức năng sấy hoặc thậm ch&iacute; c&oacute; một số nh&agrave; hiện nay&nbsp;chưa&nbsp;c&oacute; m&aacute;y giặt. Vậy th&igrave; mời bạn đến ngay với&nbsp;<strong>dịch vụ giặt ủi tại KhaService</strong>, bạn sẽ thấy m&igrave;nh c&oacute; thể&nbsp;giải quyết được nhiều thứ c&ugrave;ng một l&uacute;c gi&uacute;p bạn tiết kiệm thời gian, c&ocirc;ng sức v&agrave;&nbsp;cuộc sống c&oacute; &yacute; nghĩa hơn.&nbsp;Ch&uacute;ng t&ocirc;i tự tin&nbsp;cung cấp cho bạn giải ph&aacute;p ph&ugrave; hợp gi&uacute;p bạn c&oacute;&nbsp;những bộ quần &aacute;o sạch sẽ, phẳng phiu!</p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-giat-ui/portrait-asian-female-wear-virus-protecting-mask-spread-covid19-washing-blue-color-interior-laundry-shop-condoiminuim-city-new-normal-lifestyle.jpg\" style=\"width: 85%; height: auto;\" /></p>\r\n\r\n<p>&nbsp; &nbsp;Sử dụng dịch vụ giặt ủi&nbsp;<strong>KhaService&nbsp;</strong>sẽ&nbsp;gi&uacute;p bạn:</p>\r\n\r\n<p>►&nbsp;<strong>Tiết kiệm thời gian:</strong>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&bull;&nbsp;Sau khi đi l&agrave;m mệt mỏi 8 tiếng&nbsp;ở văn ph&ograve;ng, cơ thể cần được nghỉ ngơi, thư gi&atilde;n để phục hồi năng lượng. Ch&iacute;nh v&igrave; thế, h&atilde;y để&nbsp;<strong>KhaService</strong>&nbsp;giặt ủi gi&uacute;p bạn.</p>\r\n\r\n<p>►&nbsp;<strong>Sức khỏe:</strong></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&bull;&nbsp;Nếu như nh&agrave; bạn kh&ocirc;ng c&oacute; m&aacute;y giặt, th&igrave; việc giặt quần &aacute;o bằng tay cũng ảnh hưởng kh&ocirc;ng &iacute;t đến sức khỏe, đặc biệt l&agrave; c&aacute;c bệnh về da tay.&nbsp;</p>\r\n\r\n<p>►&nbsp;<strong>Tiết kiệm chi ph&iacute; mua&nbsp;v&agrave; chi ph&iacute; trong qu&aacute; tr&igrave;nh sử dụng như vệ sinh,&nbsp;bảo dưỡng định kỳ,...</strong><strong>&nbsp;</strong></p>\r\n\r\n<p>►&nbsp;<strong>Giải quyết được vấn đề ủi quần &aacute;o phẳng:</strong></p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;&bull;&nbsp;Kh&ocirc;ng phải tất cả loại quần &aacute;o đều ủi/l&agrave; chung một nhiệt độ nhất định. T&ugrave;y loại vải linen, cotton hay c&aacute;c loại vải kh&aacute;c m&agrave; ch&uacute;ng ta ủi/l&agrave; theo c&aacute;c&nbsp;c&aacute;ch kh&aacute;c nhau. Kh&ocirc;ng những thế, c&aacute;ch ủi/l&agrave; cũng rất quan trọng.&nbsp;<strong>KhaService</strong>&nbsp;c&oacute; nhiều năm kinh nghiệm về dịch vụ giặt ủi, sẽ gi&uacute;p bạn kho&aacute;c l&ecirc;n m&igrave;nh những trang phục lịch sự, trang trọng tại sự kiện hoặc nơi c&ocirc;ng sở.</p>\r\n\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp;Ch&uacute;ng t&ocirc;i chuy&ecirc;n&nbsp;giặt;&nbsp;ủi/l&agrave;;&nbsp;hấp;&nbsp;tẩy quần &aacute;o, chăn mền, drap giường, m&agrave;n cửa, th&uacute; nhồi b&ocirc;ng,&hellip;&nbsp;Với hệ thống m&aacute;y giặt&nbsp;chuy&ecirc;n dụng kết hợp c&ugrave;ng&nbsp;bột giặt, nước&nbsp;xả từ c&aacute;c thương hiệu&nbsp;cao cấp v&agrave; chất lượng,<strong>&nbsp;KhaService</strong>&nbsp;sẽ mang đến chất lượng dịch vụ ho&agrave;n hảo&nbsp;l&agrave;m h&agrave;i l&ograve;ng Qu&yacute; kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&nbsp; &nbsp;Ch&uacute;ng t&ocirc;i cung cấp dịch vụ giao nhận đồ,&nbsp;quần &aacute;o tận nơi&nbsp;từ 8 giờ s&aacute;ng&nbsp;- 16 giờ 30 chiều h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p><u><a href=\"https://khaservice.com.vn/linh-vuc-hoat-dong/bang-gia-dich-vu-giat-ui.html\" target=\"_blank\"><em><strong>THAM KHẢO BẢNG GI&Aacute; GIẶT ỦI KHASERVICE</strong></em></a></u></p>\r\n\r\n<p><em><strong>*Lưu &yacute;:</strong></em></p>\r\n\r\n<p><em>&rarr; Gi&aacute; tr&ecirc;n chưa bao gồm thuế GTGT - VAT 10%.</em></p>\r\n\r\n<p><em>&rarr; Gi&aacute; giặt nhanh (Express) trong v&ograve;ng 12 tiếng cộng th&ecirc;m 50%.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n', 'upload/dichvu/dich-vu-giat-ui/11949364.png', 5, 1, 0, NULL, 1766803955, '', '', ''),
(6, 'Dịch vụ vệ sinh chuyên nghiệp', 'dich-vu-ve-sinh-chuyen-nghiep', '', '<p>&nbsp;&nbsp;Hiện nay, đời sống ng&agrave;y c&agrave;ng bận rộn, c&ocirc;ng việc nhiều để hướng ch&uacute;ng ta đến với th&agrave;nh c&ocirc;ng. Tuy nhi&ecirc;n, ch&uacute;ng ta lại&nbsp;c&oacute; &iacute;t thời gian để qu&acirc;y quần b&ecirc;n gia đ&igrave;nh, người th&acirc;n. Hay ch&uacute;ng ta mất đi thời gian d&agrave;nh cho thể thao, &acirc;m nhạc, những th&uacute; vui vốn c&oacute; trong cuộc sống.</p>\r\n\r\n<p>&nbsp; &nbsp;<strong>KhaServices</strong>&nbsp;sẽ lo gi&uacute;p bạn việc&nbsp;dọn dẹp kh&ocirc;ng gian sống để bạn c&oacute; nhiều thời gian hơn. Với nhiều năm kinh nghiệm trong việc dọn dẹp,&nbsp;<strong>KhaServices</strong>&nbsp;biết c&aacute;ch sắp xếp, vệ sinh kh&ocirc;ng gian sống một c&aacute;ch chuy&ecirc;n nghiệp, nhanh ch&oacute;ng, đ&uacute;ng hẹn.</p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-ve-sinh-chuyen-nghiep/side-view-woman-cleaning-window.jpg\" style=\"width: 70%; height: auto;\" /></p>\r\n\r\n<p><strong>KhaServices</strong>&nbsp;cung cấp dịch vụ vệ sinh, l&agrave;m sạch h&agrave;ng ng&agrave;y:</p>\r\n\r\n<p>1.&nbsp;Vệ sinh&nbsp;c&aacute;c&nbsp;<em><strong>Văn ph&ograve;ng, Căn hộ, Bệnh viện, Trường học, Si&ecirc;u thị.</strong></em><br />\r\n2. Tổng vệ sinh c&aacute;c c&ocirc;ng tr&igrave;nh sau x&acirc;y dựng.&nbsp;<br />\r\n3. Tổng vệ sinh&nbsp;<strong><em>Nh&agrave; cửa, Văn ph&ograve;ng</em></strong>,...một lần hoặc theo định kỳ h&agrave;ng th&aacute;ng, qu&yacute;, năm.<br />\r\n4. Vệ sinh k&iacute;nh văn ph&ograve;ng v&agrave; k&iacute;nh nh&agrave; cao tầng.<br />\r\n5. Giặt c&aacute;c loại&nbsp;<strong><em>thảm s&agrave;n, ghế VP, ghế sofa</em></strong>.<br />\r\n6. Đ&aacute;nh b&oacute;ng v&agrave; l&agrave;m sạch c&aacute;c loại s&agrave;n (gạch T&agrave;u, gạch men, đ&aacute;,...).<br />\r\n7. Cung cấp nh&acirc;n c&ocirc;ng l&agrave;m sạch cho c&aacute;c&nbsp;<em><strong>Hội nghị, Hội chợ, triển l&atilde;m</strong></em>,.....Với đội ngũ nh&acirc;n vi&ecirc;n được đ&agrave;o tạo l&agrave;nh nghề cung trang thiết bị m&aacute;y m&oacute;c v&agrave; h&oacute;a chất chuy&ecirc;n dụng.</p>\r\n\r\n<p><strong>&nbsp;Gi&aacute; tham khảo:</strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"../upload/dichvu/dich-vu-ve-sinh-chuyen-nghiep/Black And White Modern Professional Business Services Price List (1).png\" style=\"width: 70%; height: auto;\" /></strong></p>\r\n\r\n<p>Để nhận b&aacute;o gi&aacute; chi tiết về dịch vụ m&agrave;&nbsp;Qu&yacute; kh&aacute;ch đang cần, li&ecirc;n hệ&nbsp;<strong>KhaService</strong>&nbsp;qua hotline:&nbsp;<em><a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p>Hoặc Zalo:&nbsp;<em><a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/follow on fb.png\" style=\"width: 15%; height: auto;\" /></p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n', 'upload/dichvu/dich-vu-ve-sinh-chuyen-nghiep/17740532.png', 6, 1, 0, NULL, 1766805007, '', '', ''),
(7, 'Dịch vụ sữa chửa căn hộ, trang trí nội thất', 'dich-vu-sua-chua-can-ho-trang-tri-noi-that', '', '<p style=\"text-align: justify;\">&nbsp;&nbsp;&nbsp; Căn hộ, chung cư bạn đang sống hiện tại cần được sửa chữa, cải tạo trở n&ecirc;n mới mẻ, sạch sẽ v&agrave; an to&agrave;n hơn. Với nhiều năm kinh nghiệm,&nbsp;<strong>KhaServices</strong>&nbsp;hiểu ng&ocirc;i nh&agrave; của bạn rằng n&oacute; đang cần được sửa chữa như thế n&agrave;o. Ch&uacute;ng t&ocirc;i sẽ tư vấn, xem x&eacute;t&nbsp;thật kỹ lưỡng v&agrave; đưa ra cho bạn những phương &aacute;n, giải ph&aacute;p tốt nhất để tiết kiệm chi ph&iacute; cũng như hiểu nhau hơn trong qu&aacute; tr&igrave;nh l&agrave;m việc,&nbsp;thi c&ocirc;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-sua-chua-can-ho-trang-tri-noi-that/z4420355518589_29502c9cfa7060e10b8a8bab16a79986.jpg\" style=\"width: 75%; height: auto;\" /></p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;Dịch vụ sửa chữa, cải tạo căn hộ, nh&agrave; ở, chung cư theo y&ecirc;u cầu của Qu&yacute; kh&aacute;ch h&agrave;ng. Ch&uacute;ng t&ocirc;i sẽ trang tr&iacute; lại nội thất trong kh&ocirc;ng gian nh&agrave; ở&nbsp;gi&uacute;p mang đến sự mới mẻ v&agrave; đảm bảo an to&agrave;n khi cư d&acirc;n sinh sống.</p>\r\n\r\n<p>&nbsp; &nbsp;Đội ngũ kỹ sư ở&nbsp;<strong>KhaServices</strong>&nbsp;c&oacute; kỹ năng v&agrave; gi&agrave;u&nbsp;kinh nghiệm sẽ&nbsp;cam kết mang đến cho Qu&yacute; kh&aacute;ch dịch vụ sửa chữa căn hộ, chung cư&nbsp;với&nbsp;nguy&ecirc;n vật liệu đảm bảo chất lượng, thiết kế lại&nbsp;kh&ocirc;ng gian theo y&ecirc;u cầu với những kiểu kh&ocirc;ng gian&nbsp;tho&aacute;ng m&aacute;t, sang trọng,&nbsp;nghệ thuật hoặc&nbsp;tạo điểm nhấn theo phong c&aacute;ch ri&ecirc;ng&nbsp;m&agrave; Qu&yacute; kh&aacute;ch h&agrave;ng mong muốn. H&atilde;y li&ecirc;n hệ<strong>&nbsp;KhaServices&nbsp;</strong>để sử dụng dịch vụ qua hotline:&nbsp;<em>&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em>&nbsp;hoặc Zalo:&nbsp;<em>&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em>&nbsp;</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n', 'upload/dichvu/dich-vu-sua-chua-can-ho-trang-tri-noi-that/26224025.png', 7, 1, 0, NULL, 1766804681, '', '', ''),
(8, 'Dịch vụ  điện lạnh', 'dich-vu-dien-lanh', '', '<p><strong>&nbsp; &nbsp;Dịch vụ</strong>&nbsp;<strong>vệ sinh bảo tr&igrave; m&aacute;y lạnh d&acirc;n dụng v&agrave; c&ocirc;ng nghiệp&nbsp;</strong>tại&nbsp;<strong>KhaService</strong>&nbsp;x&acirc;y dựng một đội ngũ kỹ thuật vi&ecirc;n chu đ&aacute;o, tận t&acirc;m v&agrave; n&acirc;ng cao tay nghề để dịch vụ ng&agrave;y một ph&aacute;t triển.&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;<strong>KhaService</strong>&nbsp;sẵn l&ograve;ng hỗ trợ khi kh&aacute;ch h&agrave;ng cần:</p>\r\n\r\n<p>► Tư vấn sử dụng m&aacute;y lạnh tr&aacute;nh hư hao, sửa chữa;</p>\r\n\r\n<p>► Thay thế linh kiện ch&iacute;nh h&atilde;ng 100%;</p>\r\n\r\n<p>► Bảo h&agrave;nh d&agrave;i hạn t&ugrave;y theo linh kiện thay thế;</p>\r\n\r\n<p>► Điều động kỹ thuật vi&ecirc;n di chuyển đến nơi cần vệ sinh, bảo dưỡng một c&aacute;ch nhanh ch&oacute;ng;</p>\r\n\r\n<p>► Đưa ra phương &aacute;n sửa chữa tối ưu nhất để tiết kiệm chi ph&iacute; Qu&yacute;&nbsp;kh&aacute;ch h&agrave;ng;</p>\r\n\r\n<p>► Xử l&yacute; triệt để c&aacute;c nguy&ecirc;n nh&acirc;n hư hỏng của m&aacute;y lạnh.</p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-dien-lanh/sua may lạnh.png\" style=\"width: 70%; height: auto;\" /></p>\r\n\r\n<p><strong>&nbsp; &nbsp;Dịch vụ&nbsp;vệ sinh bảo tr&igrave; m&aacute;y lạnh</strong>&nbsp;<strong>KhaService</strong>&nbsp;c&oacute; một lưu &yacute; nhỏ d&agrave;nh cho&nbsp;Qu&yacute; kh&aacute;ch&nbsp;khi sử dụng m&aacute;y lạnh tại nh&agrave;:</p>\r\n\r\n<p>&nbsp; &nbsp;Qu&yacute; kh&aacute;ch n&ecirc;n &aacute;p dụng chế độ&nbsp;vệ sinh&nbsp;bảo tr&igrave; m&aacute;y lạnh<strong>&nbsp;định kỳ 3 th&aacute;ng/lần</strong>. Việc&nbsp;n&agrave;y sẽ gi&uacute;p m&aacute;y lạnh tại&nbsp;nh&agrave;&nbsp;hoạt động trơn tru hơn, m&aacute;y sẽ bền, tiết kiệm điện năng hơn v&agrave; c&oacute;&nbsp;khả năng l&agrave;m lạnh nhanh&nbsp;sau được khi được vệ sinh, bảo tr&igrave;.</p>\r\n\r\n<p><br />\r\n<img alt=\"\" src=\"../upload/dichvu/dich-vu-dien-lanh/6-ly-do-ban-nen-mua-may-lanh-thuong-thay-vi-may-lanh-inverter-1.jpg\" style=\"width: 70%; height: auto;\" /></p>\r\n\r\n<p>Tại sao phải chọn&nbsp;<strong>dịch vụ</strong>&nbsp;<strong>vệ sinh&nbsp;bảo tr&igrave; m&aacute;y lạnh&nbsp;</strong>định kỳ tại&nbsp;<strong>KhaService</strong>?</p>\r\n\r\n<p>►&nbsp;Nh&acirc;n vi&ecirc;n c&oacute; tay nghề giỏi, được đ&agrave;o tạo từ c&aacute;c trường Đại Học, Cao Đẳng chuy&ecirc;n ng&agrave;nh điện - điện lạnh, c&oacute; kinh nghiệm&nbsp;vệ sinh&nbsp;bảo tr&igrave; m&aacute;y lạnh<strong>&nbsp;</strong>thực tế.</p>\r\n\r\n<p>► Đội ngũ nh&acirc;n vi&ecirc;n th&acirc;n thiện, l&agrave;m việc nhanh gọn, an to&agrave;n.</p>\r\n\r\n<p>►&nbsp;Vệ sinh bảo tr&igrave; m&aacute;y lạnh&nbsp;đ&uacute;ng c&aacute;ch, đ&uacute;ng quy tr&igrave;nh.</p>\r\n\r\n<p>► Gi&aacute; cả, chi ph&iacute; hợp l&yacute;.&nbsp;​</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp;Ch&uacute;ng t&ocirc;i hiện đang phục vụ tất cả c&aacute;c khu vực tại c&aacute;c Quận/Huyện tr&ecirc;n địa b&agrave;n TP. HCM.</p>\r\n\r\n<p><strong>&nbsp; &nbsp;KhaService</strong>&nbsp;với ti&ecirc;u ch&iacute; lu&ocirc;n lu&ocirc;n mang đến sự h&agrave;i l&ograve;ng tuyệt đối về chất lượng dịch vụ cũng như chất lượng sản phẩm. Bạn cần tư vấn&nbsp;<strong>dịch vụ&nbsp;vệ sinh bảo tr&igrave; m&aacute;y lạnh</strong>,&nbsp;<strong>thi c&ocirc;ng lắp đặt điện</strong>, h&atilde;y li&ecirc;n hệ ngay với&nbsp;ch&uacute;ng t&ocirc;i qua hotline:&nbsp;<a href=\"tel:0918 754 277\">0918 754 277</a>&nbsp;hoặc Zalo:&nbsp;<a href=\"http://zaloapp.com/qr/p/p8bds4dak1ib\" target=\"_blank\">0918 754 277</a>&nbsp;để được hỗ trợ nhanh ch&oacute;ng nhất.</p>\r\n\r\n<p><em><strong>Theo d&otilde;i Fanpage Facebook Dịch vụ vệ sinh, bảo tr&igrave; m&aacute;y lạnh để cập nhật những chương tr&igrave;nh khuyến m&atilde;i hấp dẫn</strong></em></p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/follow on fb.png\" style=\"width: 10%; height: auto;\" /></p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;</p>\r\n</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em><strong>H&acirc;n hạnh phục vụ Qu&yacute; kh&aacute;ch!</strong></em></p>\r\n', 'upload/dichvu/dich-vu-dien-lanh/46080317.png', 8, 1, 0, NULL, 1766804955, '', '', ''),
(9, 'Dịch vụ cung cấp thực phẩm thiết yếu hàng hóa', 'dich-vu-cung-cap-thuc-pham-thiet-yeu-hang-hoa', '', '<p>&nbsp; &nbsp;Dịch vụ cung cấp thực phẩm thiết yếu l&agrave; cửa h&agrave;ng cung cấp thực phẩm sạch, gia vị v&agrave; c&aacute;c loại thực phẩm, sản phẩm thiết yếu, cần thiết hằng ng&agrave;y.&nbsp;<strong>KhaServices</strong>&nbsp;ch&uacute; trọng đến sức khỏe của người ti&ecirc;u d&ugrave;ng n&ecirc;n lu&ocirc;n đảm bảo thực phẩm phải tươi sống như thịt c&aacute;, rau củ quả được kiểm định chặt chẽ. Đối với c&aacute;c loại thực phẩm c&oacute; hạn sử dụng, nh&acirc;n vi&ecirc;n lu&ocirc;n cẩn thận kiểm tra v&agrave; cập nhật hệ thống để sản phẩm đến tay người ti&ecirc;u d&ugrave;ng lu&ocirc;n l&agrave; sản phẩm mới v&agrave; tươi ngon nhất.</p>\r\n\r\n<p>&nbsp; &nbsp;Bạn c&oacute; thể mua h&agrave;ng trực tiếp tại cửa h&agrave;ng hoặc trực tuyến ở website Thực phẩm thiết yếu HH.&nbsp;<strong>KhaServices</strong>&nbsp;lu&ocirc;n đảm bảo sự tiện lợi nhất v&agrave; an to&agrave;n nhất cho Qu&yacute; kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&nbsp; &nbsp;Truy cập website:&nbsp;<a href=\"https://thucphamthietyeuhh.com/\" target=\"_blank\">thucphamthietyeuhh.com</a></p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-cung-cap-thuc-pham-thiet-yeu-hang-hoa/z4420691493387_ffd5db8c9ef9aa81dd3ed4fe77cc84e1.jpg\" style=\"width: 75%; height: auto;\" /></p>\r\n\r\n<p>&nbsp; &nbsp;Cửa h&agrave;ng thực phẩm thiết yếu HH&nbsp;hiện đang c&oacute; mặt ở TP. HCM, địa chỉ 03 chi nh&aacute;nh&nbsp;tại:</p>\r\n\r\n<p>► Chung cư Kh&aacute;nh Hội 1: 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</p>\r\n\r\n<p>► Chung cư Vạn Đ&ocirc;: 348 Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</p>\r\n\r\n<p>► Chung cư R7 Đức Khải: Đường Lưu Đ&igrave;nh Lễ, Phường An Kh&aacute;nh, TP. Thủ Đức, TP. HCM</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n', 'upload/dichvu/dich-vu-cung-cap-thuc-pham-thiet-yeu-hang-hoa/56818964.png', 9, 1, 0, NULL, 1766805096, '', '', ''),
(10, 'Dịch vụ cây xanh', 'dich-vu-cay-xanh', '', '<p>&nbsp; &nbsp;Dịch vụ cảnh quan s&acirc;n vườn tại&nbsp;<strong>KhaServices</strong>&nbsp;đ&atilde; c&oacute; nhiều năm kinh nghiệm, ch&uacute;ng t&ocirc;i lu&ocirc;n lắng nghe &yacute; kiến từ&nbsp;Qu&yacute; kh&aacute;ch h&agrave;ng để Qu&yacute; kh&aacute;ch&nbsp;c&oacute; những trải nghiệm sử dụng dịch vụ tốt nhất.&nbsp;Ch&uacute;ng t&ocirc;i hiểu biết về phong thủy, gi&uacute;p Qu&yacute; kh&aacute;ch an t&acirc;m khi lựa chọn bất kỳ loại c&acirc;y n&agrave;o, mang đến cảm gi&aacute;c thoải m&aacute;i, an l&agrave;nh cho Qu&yacute; kh&aacute;ch v&agrave; cho cả Qu&yacute; cư d&acirc;n.</p>\r\n\r\n<p><img alt=\"\" src=\"../upload/dichvu/dich-vu-cay-xanh/cay xanh.jpg\" style=\"width: 70%; height: auto;\" /></p>\r\n\r\n<p>&nbsp; &nbsp;Tại sao n&ecirc;n&nbsp;chọn&nbsp;<strong>KhaServices</strong>?</p>\r\n\r\n<p>►&nbsp;<strong>KhaServices</strong>&nbsp;với đội ngũ nh&acirc;n vi&ecirc;n gi&agrave;u kinh nghiệm, chất lượng được đảm bảo, đ&aacute;p ứng mọi nhu cầu của kh&aacute;ch h&agrave;ng mang đến gi&aacute; trị cao về thẩm mỹ quan.</p>\r\n\r\n<p>► C&oacute; đầy đủ dụng cụ chuy&ecirc;n dụng để thi c&ocirc;ng.</p>\r\n\r\n<p>► Lắng nghe &yacute; kiến kh&aacute;ch h&agrave;ng để kh&ocirc;ng ngừng đổi mới v&agrave; tốt hơn.</p>\r\n\r\n<p>► Chi ph&iacute;&nbsp;hợp l&yacute;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>KhaServices</strong>&nbsp;với ti&ecirc;u ch&iacute; lu&ocirc;n lu&ocirc;n mang đến sự h&agrave;i l&ograve;ng tuyệt đối về chất lượng dịch vụ cũng như chất lượng sản phẩm sẽ l&agrave;m Qu&yacute; kh&aacute;ch h&agrave;i l&ograve;ng.</p>\r\n\r\n<p>Cần tư vấn&nbsp;<strong><em>Dịch vụ c&acirc;y xanh</em></strong>, h&atilde;y li&ecirc;n hệ ngay với ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Hotline&nbsp; &nbsp; &nbsp; &nbsp; :&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></p>\r\n\r\n<p>Chat Zalo&nbsp; &nbsp; :&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong>H&acirc;n hạnh phục vụ Qu&yacute; kh&aacute;ch!</strong></em></p>\r\n', 'upload/dichvu/dich-vu-cay-xanh/01951314.png', 10, 1, 1, NULL, 1766805477, '', '', ''),
(11, 'Bảng giá dịch vụ giặt ủi', 'bang-gia-dich-vu-giat-ui', '', '<p><img alt=\"\" src=\"../upload/dichvu/bang-gia-dich-vu-giat-ui/BẢNG GIÁ GIẶT ỦI_page-0001 (2).jpg\" style=\"width: 80%; height: auto;\" /></p>\r\n\r\n<p><em>Bảng b&aacute;o gi&aacute; được cập nhật ng&agrave;y 12/06/2024</em></p>\r\n\r\n<p><em><strong>*Lưu &yacute;:</strong></em></p>\r\n\r\n<p><em>&rarr; Gi&aacute; tr&ecirc;n chưa bao gồm thuế GTGT - VAT 10%.</em></p>\r\n\r\n<p><em>&rarr; Gi&aacute; giặt nhanh (Express) trong v&ograve;ng 12 tiếng cộng th&ecirc;m 50%.</em></p>\r\n\r\n<p><em>&rarr; Qu&yacute; kh&aacute;ch c&oacute; nhu cầu giặt c&aacute;c sản phẩm kh&aacute;c, vui l&ograve;ng li&ecirc;n hệ hotline&nbsp;<a href=\"tel: 0918754277\">091 87 54 277&nbsp;</a>để nhận b&aacute;o gi&aacute; sớm nhất.</em></p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n\r\n<p><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em><strong>H&acirc;n hạnh phục vụ Qu&yacute; kh&aacute;ch!</strong></em></p>\r\n', 'upload/dichvu/bang-gia-dich-vu-giat-ui/94682395.png', 11, 1, 0, NULL, 1766805386, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_duan`
--

CREATE TABLE `table_duan` (
  `id` int(11) NOT NULL,
  `id_khuvuc` int(11) DEFAULT 0,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `noidung_vi` longtext DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT 5,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `noibat` tinyint(1) DEFAULT 0,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `luotxem` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_duan`
--

INSERT INTO `table_duan` (`id`, `id_khuvuc`, `ten_vi`, `ten_khong_dau`, `photo`, `mota_vi`, `noidung_vi`, `type`, `rating`, `stt`, `hienthi`, `noibat`, `ngaytao`, `ngaysua`, `title`, `keywords`, `description`, `luotxem`) VALUES
(9, 1, 'Horizon Tower', 'horizon-tower', 'upload/caidat/1766653942_596.png', '<p>Chung cư Horizon</p>\r\n', '<h4><img alt=\"\" src=\"../upload/duan/1766726649_1704.png\" style=\"width: 20%; height: auto;\" /></h4>\r\n\r\n<h4><b><span style=\"font-size: 18px;\">1. Th&ocirc;ng tin chung</span></b></h4>\r\n\r\n<h5><img alt=\"\" src=\"../upload/nhanvien/image (2).jpg\" style=\"width: 10%; height: auto;\" /></h5>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">A</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">B</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">C</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">D</span></li>\r\n</ul>\r\n\r\n<h4><span style=\"font-size: 18px;\"><b>2. Tiện &iacute;ch nội khu</b></span></h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">E</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">F</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">G</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">H</span></li>\r\n</ul>\r\n\r\n<h4><span style=\"font-size: 18px;\"><b>3. Tiện &iacute;ch ngoại khu</b></span></h4>\r\n\r\n<h5>&nbsp;</h5>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">I</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">K</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">L</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">M</span></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><span style=\"font-size: 18px;\">N</span></li>\r\n</ul>\r\n', 'du-an', 1, 1, 1, 1, 1726039399, 1766726867, '', '', '', 4),
(10, 9, 'TDH - Phước Long', 'tdh---phuoc-long', 'img/portfolio/1.jpg', 'Chung cư TDH - Phước Long', '<p><b>Chung cư TDH - Phước Long</b><br></p>', 'du-an', 0, 1, 1, 0, 1726040750, 1726130884, NULL, NULL, NULL, 0),
(11, 9, 'Catavil Premier', 'catavil-premier', 'img/portfolio/2.jpg', 'Chung cư Catavil Premier', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Catavil Premier</span><br></p>', 'du-an', 1, 1, 1, 1, 1726041384, 1726130887, NULL, NULL, NULL, 0),
(12, 4, 'Topaz Elite - Phoenix 1', 'topaz-elite---phoenix-1', 'img/portfolio/3.jpg', 'Topaz Elite - Phoenix 1', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\"><b>Topaz Elite - Phoenix\r\n1</b></span><br></p>', 'du-an', 0, 1, 1, 0, 1726041405, 1726130888, NULL, NULL, NULL, 0),
(13, 11, 'Hưng Phát Silver Star', 'hung-phat-silver-star', 'img/portfolio/4.jpg', 'Hưng Phát Silver Star', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Hưng Phát Silver Star</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041421, 1726130889, NULL, NULL, NULL, 0),
(14, 9, 'R7 Đức Khải', 'r7-duc-khai', 'img/portfolio/5.jpg', 'Chung cư R7 Đức Khải', '<p>Chung cư R7 Đức Khải<br></p>', 'du-an', 0, 1, 1, 0, 1726041448, 1726130894, NULL, NULL, NULL, 0),
(15, 4, 'Copac Square', 'copac-square', 'img/portfolio/6.jpg', 'Chung cư Copac Square', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Chung cư Copac Square</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041482, 1726130895, NULL, NULL, NULL, 0),
(16, 12, 'Lotus Apartment', 'lotus-apartment', 'img/portfolio/1.jpg', 'Chung cư Sen Hồng', '<p>Chung cư Sen Hồng<br></p>', 'du-an', 0, 1, 1, 0, 1726041521, 1726130896, NULL, NULL, NULL, 0),
(17, 7, 'Hoàng Anh Gia Lai 2', 'hoang-anh-gia-lai-2', 'img/portfolio/2.jpg', 'Chung cư Hoàng Anh Gia Lai 2', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Hoàng Anh Gia Lai 2</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041595, 1726130900, NULL, NULL, NULL, 0),
(18, 4, 'Topaz City 2 - Khối B', 'topaz-city-2---khoi-b', 'img/portfolio/3.jpg', 'Chung cư Topaz City 2 - Khối B', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Topaz City 2 - Khối B</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041611, 1726130898, NULL, NULL, NULL, 0),
(19, 10, 'The Star', 'the-star', 'img/portfolio/4.jpg', 'Chung cư The Star', '<p>Chung cư The Star<br></p>', 'du-an', 0, 1, 1, 0, 1726041628, 1726130930, NULL, NULL, NULL, 0),
(20, 12, 'Samsora Riverside', 'samsora-riverside', 'upload/duan/894812586018.JFIF', '<strong>Địa chỉ:</strong>&nbsp;207A Quốc Lộ 1A, Khu Phố Quyết Thắng, Phường B&igrave;nh Thắng, Th&agrave;nh Phố Dĩ An, Tỉnh B&igrave;nh Dương.', '<p><strong>Chủ đầu tư:</strong>&nbsp;Địa &ocirc;́c Sacom<br />\r\n<strong>Loại h&igrave;nh:</strong>&nbsp;Căn hộ chung cư<br />\r\n<strong>KhaService&nbsp;bắt đầu quản l&yacute; từ:​</strong><strong>&nbsp;</strong>2023<br />\r\n<strong>Quy m&ocirc;:</strong></p>\r\n\r\n<p>✦&nbsp;03 Block với số tầng: 21 tầng</p>\r\n\r\n<p>✦&nbsp;Khu vực để xe tầng hầm, b&aacute;n hầm, tầng 1 v&agrave; c&aacute;c khu v&agrave;nh đai được bố tr&iacute; để xe</p>\r\n\r\n<p>✦&nbsp;Số căn hộ: 1137&nbsp;</p>\r\n\r\n<p>✦&nbsp;Tổng diện t&iacute;ch dự &aacute;n: 14405.8m2</p>\r\n\r\n<p>✦&nbsp;Diện t&iacute;ch khu căn hộ: 50936 m2</p>\r\n\r\n<p>✦&nbsp;Diện t&iacute;ch khu thương mại: 2028 m2&nbsp;</p>\r\n\r\n<p>✦&nbsp;Diện t&iacute;ch ph&ograve;ng sinh hoạt cộng đồng: 900m2</p>\r\n\r\n<p>✦&nbsp;Thang m&aacute;y: 11 thang Hitachi</p>\r\n\r\n<p>✦&nbsp;Hệ thống c&ocirc;ng tr&igrave;nh hạ tầng kỹ thuật, tiện &iacute;ch chung v&agrave; c&aacute;c trang thiết bị kh&aacute;c trong to&agrave; nh&agrave;...</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'du-an', 1, 1, 1, 1, 1726041650, 1766847326, '', '', '', 0),
(21, 11, 'Goldora Plaza', 'goldora-plaza', 'img/portfolio/6.jpg', 'Chung cư Goldora Plaza', '<p>Chung cư Goldora Plaza<br></p>', 'du-an', 0, 1, 1, 0, 1726041668, 1726130932, NULL, NULL, NULL, 0),
(22, 9, 'Homyland 2', 'homyland-2', 'img/portfolio/1.jpg', 'Chung cư Homyland 2', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Chung cư Homyland 2</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041686, 1726130934, NULL, NULL, NULL, 0),
(23, 11, 'Cao ốc Hưng Phát', 'cao-oc-hung-phat', 'img/portfolio/2.jpg', 'Cao ốc Hưng Phát', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Cao ốc Hưng Phát</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041700, 1726130935, NULL, NULL, NULL, 0),
(24, 4, 'Orient Apartment', 'orient-apartment', 'upload/duan/orient-apartment/17871102.png', '<strong>Địa chỉ:&nbsp;</strong>331 Bến V&acirc;n Đồn, Phường 1, Quận 4, Tp. Hồ Ch&iacute; Minh', '<p><strong>Chủ đầu tư:&nbsp;</strong>C&ocirc;ng ty Cổ phần Thủy Sản Số 4</p>\r\n\r\n<p><strong>Diện t&iacute;ch:</strong>&nbsp;3.275 m&sup2;</p>\r\n\r\n<p><strong>Diện t&iacute;ch x&acirc;y dựng:&nbsp;</strong>1.350 m&sup2;</p>\r\n\r\n<p><strong>KhaService&nbsp;bắt đầu quản l&yacute; từ:</strong>&nbsp;2011</p>\r\n\r\n<p><strong>Quy m&ocirc; dự &aacute;n:</strong>&nbsp;1 khối 17 tầng gồm: 180 căn hộ v&agrave; khu dịch vụ văn ph&ograve;ng, 1 trệt, 1 hầm</p>\r\n\r\n<p><strong>Tiện &iacute;ch:</strong></p>\r\n\r\n<p>✦&nbsp;Tọa lạc tại vị tr&iacute; v&agrave;ng trong nội th&agrave;nh Tp.HCM khi chỉ c&aacute;ch cầu Nguyễn Văn Cừ 400m</p>\r\n\r\n<p>✦&nbsp;Nối liền với c&aacute;c quận trọng điểm như quận 1, Quận 3, Quận 5, Quận 7, Quận 8, Quận 10 v&agrave; chỉ mất khoảng 5 ph&uacute;t để di chuyển đến Chợ Bến Th&agrave;nh</p>\r\n\r\n<p><img alt=\"\" src=\"../upload/duan/orient-apartment/orient-partment-2-1024x680.jpg\" style=\"height:auto; width:596px\" /></p>\r\n\r\n<div>&nbsp;</div>\r\n', 'du-an', 1, 1, 1, 0, 1726041718, 1766846033, '', '', '', 3),
(25, 9, 'Lan Phương MHBR', 'lan-phuong-mhbr', 'img/portfolio/4.jpg', 'Lan Phương MHBR', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Lan Phương MHBR</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041737, 1726130946, NULL, NULL, NULL, 0),
(26, 11, 'Orchid Park', 'orchid-park', 'img/portfolio/5.jpg', 'Chung cư Phú Gia', '<p>Chung cư Phú Gia<br></p>', 'du-an', 0, 1, 1, 0, 1726041756, 1726130948, NULL, NULL, NULL, 0),
(27, 9, 'Citrine Apartment', 'citrine-apartment', 'img/portfolio/6.jpg', 'Citrine Apartment', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Citrine Apartment</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041777, 1726130944, NULL, NULL, NULL, 0),
(28, 9, 'TDH River View', 'tdh-river-view', 'img/portfolio/1.jpg', 'TDH River View', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">TDH River View</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041796, 1726130943, NULL, NULL, NULL, 0),
(29, 9, 'Screc II Tower', 'screc-ii-tower', 'img/portfolio/2.jpg', 'Chung cư Screc 2', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Screc 2</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041818, 1726130952, NULL, NULL, NULL, 0),
(30, 9, 'Topaz Home 2 - Block B', 'topaz-home-2---block-b', 'img/portfolio/3.jpg', 'Topaz Home 2 - Block B', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Topaz Home 2 - Block\r\nB</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041828, 1726130954, NULL, NULL, NULL, 0),
(31, 4, 'Van Do Apartment', 'van-do-apartment', 'img/portfolio/4.jpg', 'Van Do Apartment', 'Van Do Apartment', 'du-an', 0, 1, 1, 0, 1726041852, 1726130957, NULL, NULL, NULL, 0),
(32, 9, 'Flora Anh Đào', 'flora-anh-dao', 'img/portfolio/5.jpg', 'Flora Anh Đào', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Flora Anh Đào</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041863, 1726130955, NULL, NULL, NULL, 0),
(33, 9, 'Sunview Apartment', 'sunview-apartment', 'img/portfolio/6.jpg', 'Sunview Apartment', '<p>Sunview Apartment<br></p>', 'du-an', 0, 1, 1, 0, 1726041886, 1726130959, NULL, NULL, NULL, 0),
(34, 9, '4S Riverside Garden', '4s-riverside-garden', 'img/portfolio/1.jpg', '4S Riverside Garden', '<p>4S Riverside Garden<br></p>', 'du-an', 0, 1, 1, 0, 1726041909, 1726130971, NULL, NULL, NULL, 0),
(35, 11, 'Citizen Apartments', 'citizen-apartments', 'img/portfolio/2.jpg', 'Citizen Apartments', '<p><span style=\"font-family: Arial, sans-serif; font-size: 20px;\">Citizen Apartments</span><br><a jsname=\"UWckNb\" href=\"https://www.apartments.com/citizen-apartments-newport-news-va/73c831y/\" data-ved=\"2ahUKEwjszpCht7qIAxVkwjgGHWSFGWkQFnoECCUQAQ\" ping=\"/url?sa=t&amp;source=web&amp;rct=j&amp;opi=89978449&amp;url=https://www.apartments.com/citizen-apartments-newport-news-va/73c831y/&amp;ved=2ahUKEwjszpCht7qIAxVkwjgGHWSFGWkQFnoECCUQAQ\" style=\"color: var(--JKqx2); text-decoration: none; -webkit-tap-highlight-color: rgba(255, 255, 255, 0.1); outline: 0px; font-family: Arial, sans-serif; font-size: small; font-weight: 400; background-color: rgb(31, 31, 31);\"></a></p>', 'du-an', 0, 1, 1, 0, 1726041952, 1726130970, NULL, NULL, NULL, 0),
(36, 9, 'Sài Gòn Metro Park', 'sai-gon-metro-park', 'img/portfolio/3.jpg', 'Sài Gòn Metro Park', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Sài Gòn Metro Park</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041969, 1726130969, NULL, NULL, NULL, 0),
(37, 9, 'Fideco Riverview', 'fideco-riverview', 'img/portfolio/4.jpg', 'Fideco Riverview', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Fideco Riverview</span><br></p>', 'du-an', 0, 1, 1, 0, 1726041991, 1726130968, NULL, NULL, NULL, 0),
(38, 1, 'Song Da Tower', 'song-da-tower', 'img/portfolio/5.jpg', 'Song Da Tower', '<p>Song Da Tower<br></p>', 'du-an', 0, 1, 1, 0, 1726042021, 1726130966, NULL, NULL, NULL, 0),
(39, 10, 'Nhất Lan 2', 'nhat-lan-2', 'img/portfolio/6.jpg', 'Chung cư Nhất Lan 2', '<p>Chung cư Nhất Lan 2<br></p>', 'du-an', 0, 1, 1, 0, 1726042056, 1726130976, NULL, NULL, NULL, 0),
(40, 9, 'Flora Kikyo', 'flora-kikyo', 'img/portfolio/1.jpg', 'Flora Kikyo', '<p><span lang=\"EN-US\" style=\"font-size:12.0pt;font-family:\r\n&quot;Times New Roman&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-ansi-language:\r\nEN-US;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Flora Kikyo</span><br></p>', 'du-an', 0, 1, 1, 0, 1726042074, 1726130977, NULL, NULL, NULL, 0),
(41, 4, 'Chung cư Khánh Hội 1', 'chung-cu-khanh-hoi-1', 'img/portfolio/2.jpg', 'Chung cư Khánh Hội 1', '<p>Chung cư Khánh Hội 1<br></p>', 'du-an', 0, 1, 1, 0, 1726042107, 1726130979, NULL, NULL, NULL, 0),
(42, 4, 'Chung cư Khánh Hội 2', 'chung-cu-khanh-hoi-2', 'img/portfolio/3.jpg', 'Chung cư Khánh Hội 2', '<p>Chung cư Khánh Hội 2<br></p>', 'du-an', 0, 1, 1, 0, 1726042116, 1726130981, NULL, NULL, NULL, 0),
(43, 4, 'Chung cư Khánh Hội 3', 'chung-cu-khanh-hoi-3', 'img/portfolio/4.jpg', 'Chung cư Khánh Hội 2', '<p>Chung cư Khánh Hội 2<br></p>', 'du-an', 0, 1, 1, 0, 1726042124, 1726130982, NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_dulieu`
--

CREATE TABLE `table_dulieu` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) DEFAULT 0,
  `ten_vi` varchar(255) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_feedback`
--

CREATE TABLE `table_feedback` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `chucvu` varchar(255) DEFAULT NULL,
  `mota_vi` varchar(255) DEFAULT NULL COMMENT 'Tiêu đề feedback',
  `noidung_vi` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT 5,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_feedback`
--

INSERT INTO `table_feedback` (`id`, `ten_vi`, `chucvu`, `mota_vi`, `noidung_vi`, `photo`, `rating`, `stt`, `hienthi`, `ngaytao`, `ngaysua`, `title`, `keywords`, `description`) VALUES
(1, 'Nguyễn Thanh Tùng', '', 'Dịch Vụ Quản Lý Tòa Nhà Tuyệt Vời', 'Tôi đã sống tại nhiều tòa nhà chung cư khác nhau nhưng chưa bao giờ gặp một dịch vụ quản lý và vận hành tốt như ở đây. Nhân viên rất tận tâm, luôn sẵn sàng hỗ trợ và giải quyết mọi vấn đề một cách nhanh chóng và hiệu quả.', 'storage/images/testimonial/1725873842.jpg', 4, 1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 'Lê Minh Anh', '', 'Dịch Vụ Giữ Xe 24/24 An Toàn và Tiện Lợi', 'Hệ thống giữ xe 24/24 thật sự làm tôi cảm thấy yên tâm. An ninh luôn được đảm bảo, xe của tôi luôn an toàn và dễ dàng ra vào bất cứ lúc nào. Đội ngũ nhân viên rất thân thiện và chu đáo.', 'storage/images/testimonial/1725873887.jpg', 5, 2, 1, NULL, NULL, NULL, NULL, NULL),
(3, 'Trần Hoàng Nam', '', 'An Ninh Tuyệt Đối', 'Dịch vụ an ninh ở đây thật sự xuất sắc. Hệ thống camera giám sát và nhân viên bảo vệ làm việc 24/7 giúp tôi cảm thấy rất an toàn. Họ luôn kiểm tra và bảo vệ rất nghiêm ngặt.', 'storage/images/testimonial/1725873895.jpg', 4, 4, 1, NULL, NULL, NULL, NULL, NULL),
(4, 'Phạm Thị Hương', '', 'Dịch Vụ Vận Chuyển Nhanh và An Toàn', 'Tôi đã sử dụng dịch vụ vận chuyển nhiều lần và luôn hài lòng với sự nhanh chóng và chuyên nghiệp của đội ngũ nhân viên. Hàng hóa của tôi luôn được vận chuyển cẩn thận và an toàn.', 'storage/images/testimonial/1725873904.jpg', 5, 3, 1, NULL, NULL, NULL, NULL, NULL),
(5, 'Nguyễn Văn Hải', '', 'Chất Lượng Dịch Vụ Điện Lạnh Xuất Sắc', 'Dịch vụ điện lạnh rất chuyên nghiệp và hiệu quả. Nhân viên sửa chữa nhanh chóng, kiểm tra và bảo dưỡng thiết bị một cách kỹ lưỡng. Tôi rất hài lòng với dịch vụ này.', 'storage/images/testimonial/1725873912.jpg', 5, 5, 1, NULL, NULL, NULL, NULL, NULL),
(6, 'Trần Thị Lan', '', 'Dịch Vụ Vệ Sinh Chuyên Nghiệp', 'Tôi rất hài lòng với dịch vụ vệ sinh chuyên nghiệp tại đây. Khu vực công cộng và căn hộ của tôi luôn được giữ sạch sẽ và thoáng mát. Nhân viên vệ sinh làm việc rất cẩn thận và chu đáo.', 'storage/images/testimonial/1725873920.jpg', 5, 6, 1, NULL, NULL, NULL, NULL, NULL),
(7, 'Hoàng Anh Tú', '', 'Dịch Vụ Giặt Ủi Tuyệt Vời', 'Dịch vụ giặt ủi ở đây thật sự tiện lợi và chất lượng. Quần áo của tôi luôn được giặt sạch và ủi phẳng phiu, giao nhận nhanh chóng và đúng hẹn. Tôi rất hài lòng và sẽ tiếp tục sử dụng dịch vụ.', 'storage/images/testimonial/1725873930.jpg', 5, 7, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_giatri`
--

CREATE TABLE `table_giatri` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_giatri`
--

INSERT INTO `table_giatri` (`id`, `ten_vi`, `mota_vi`, `photo`, `stt`, `hienthi`, `ngaytao`, `ngaysua`) VALUES
(1, '11+ Năm kinh nghiệm', 'Với hơn 10.000+ căn hộ và căn biệt thự do KhaService quản lý', '', 1, 1, NULL, NULL),
(2, 'Đội ngũ chuyên nghiệp - tận tâm', 'Đội ngũ được đào tạo chuyên nghiệp. Luôn tận tâm, hết mình vì quyền lợi của khách hàng', '', 2, 1, NULL, NULL),
(3, 'Quản lý toàn diện', 'Hỗ trợ các dự án từ phía Ban Lãnh Đạo để giải quyết khó khăn và xử lý tình huống', '', 3, 1, NULL, NULL),
(4, 'Đối tác liên kết uy tín', 'Nêu cao tinh thần hợp tác cùng phát triển', '', 4, 1, NULL, NULL),
(5, 'Ứng dụng công nghệ', 'Là một trong những doanh nghiệp đi đầu trong việc đưa ứng dụng công nghệ 4.0 vào quản lý vận hành các dự án...', '', 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_gioithieu`
--

CREATE TABLE `table_gioithieu` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `noidung_vi` text DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` int(1) DEFAULT 1,
  `noibat` tinyint(1) DEFAULT 0,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_gioithieu`
--

INSERT INTO `table_gioithieu` (`id`, `ten_vi`, `ten_khong_dau`, `photo`, `mota_vi`, `noidung_vi`, `stt`, `hienthi`, `noibat`, `ngaytao`, `ngaysua`, `title`, `keywords`, `description`) VALUES
(2, 'Phần mềm quản lý', 'phan-mem-quan-ly', '', '', '<p>PHẦN MỀM QUẢN L&Yacute;</p>\r\n', 1, 0, 0, 0, 1766720668, '', '', ''),
(3, 'Ứng dụng Cư dân Khaservice', 'ung-dung-danh-cho-cu-dan', '', '', '<p>Hiện nay, trong thời đại c&ocirc;ng nghệ 4.0, sự ra đời của giải ph&aacute;p quản l&yacute; đ&ocirc; thị th&ocirc;ng minh được xem l&agrave; một bước tiến vượt bậc. H&ograve;a m&igrave;nh với sự tiến bộ đ&oacute;, C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội đ&atilde; v&agrave; đang x&acirc;y dựng th&agrave;nh c&ocirc;ng ứng dụng cư d&acirc;n Khaservice. Mang lại nhiều lợi &iacute;ch cho cư d&acirc;n t&ograve;a nh&agrave; v&agrave; cả đơn vị quản l&yacute; tại dự &aacute;n chung cư, cao ốc đ&oacute;.</p>\r\n\r\n<p><img src=\"/storage/images/intro/Logo1024x.png\" style=\"width:15%\" /></p>\r\n\r\n<p>Khaservice - Ứng dụng cư d&acirc;n được c&agrave;i đặt tr&ecirc;n điện thoại, m&aacute;y t&iacute;nh bảng (Bao gồm hệ điều h&agrave;nh Android v&agrave; IOS). Ứng dụng n&agrave;y sẽ kết nối với phần mềm quản l&yacute; chung cư của ban quản l&yacute;, thuận tiện trong việc cư d&acirc;n li&ecirc;n hệ trực tiếp với ban quản l&yacute; t&ograve;a nh&agrave;.</p>\r\n\r\n<p>Để n&acirc;ng cao chất lượng quản l&yacute; vận h&agrave;nh, tạo điều kiện kết nối cộng đồng với nhiều t&iacute;nh năng hiện đại, th&ocirc;ng minh tr&ecirc;n điện thoại, C&ocirc;ng ty Khaservices &ndash; Ban quản l&yacute; Chung cư Ho&agrave;ng Anh 2 xin th&ocirc;ng b&aacute;o về việc triển khai ứng dụng phần mềm (App) tr&ecirc;n điện thoại th&ocirc;ng minh (smartphone) c&oacute; t&ecirc;n gọi &ldquo;<strong>Khaservices</strong>&rdquo; đến Qu&yacute; cư d&acirc;n, cụ thể như sau:</p>\r\n\r\n<p>Ứng dụng n&agrave;y sẽ bao gồm nhiều t&iacute;nh năng như:</p>\r\n\r\n<h2><strong>1. Mục đ&iacute;ch:</strong></h2>\r\n\r\n<p>L&agrave; cổng th&ocirc;ng tin kết nối cư d&acirc;n. Ứng dụng n&agrave;y sẽ bao gồm nhiều t&iacute;nh năng như:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h1><strong>Theo d&otilde;i, cập nhật th&ocirc;ng tin căn hộ;</strong></h1>\r\n	</li>\r\n</ul>\r\n\r\n<p>Cư d&acirc;n c&oacute; thể đăng k&yacute; nh&acirc;n khẩu, kh&aacute;ch thu&ecirc; v&agrave;o trong căn hộ của m&igrave;nh đang sở hữu (kh&ocirc;ng thay thế việc đăng k&yacute; tạm tr&uacute; trực tiếp với Cảnh s&aacute;t khu vực). V&agrave; tất cả cư d&acirc;n c&oacute; trong căn hộ đ&oacute;, c&oacute; thể thanh to&aacute;n, theo d&otilde;i c&aacute;c th&ocirc;ng b&aacute;o th&ocirc;ng tin, đăng k&yacute; c&aacute;c tiện &iacute;ch tại chung cư.</p>\r\n\r\n<p>Ngo&agrave;i ra, cư d&acirc;n c&oacute; thể dễ d&agrave;ng nắm được th&ocirc;ng tin c&aacute;c phương tiện của căn hộ m&igrave;nh đang được đăng k&yacute; tại hệ thống b&atilde;i giữ xe chung cư, thay đổi th&ocirc;ng tin, đăng k&yacute;, hủy đăng k&yacute; nhanh ch&oacute;ng qua ứng dụng</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Nhận nhanh, sớm c&aacute;c th&ocirc;ng b&aacute;o từ Ban quản l&yacute; chung cư;</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Trước đ&acirc;y, cư d&acirc;n muốn tiếp nhận th&ocirc;ng tin từ ban quản l&yacute; th&igrave; phải đến bảng th&ocirc;ng b&aacute;o. B&acirc;y giờ, với app quản l&yacute; chung cư th&igrave; cư d&acirc;n c&oacute; thể nhận th&ocirc;ng b&aacute;o mọi l&uacute;c mọi nơi. Ban quản l&yacute; sẽ gửi th&ocirc;ng b&aacute;o l&ecirc;n hệ thống. Mọi cư d&acirc;n trong t&ograve;a nh&agrave; sẽ nhận được th&ocirc;ng b&aacute;o qua điện thoại.</p>\r\n\r\n<p>BQL c&oacute; thể gửi một th&ocirc;ng b&aacute;o nhiều lần, ứng dụng sẽ gi&uacute;p cư d&acirc;n nhận được th&ocirc;ng b&aacute;o ngay cả khi kh&ocirc;ng c&oacute; mặt trong t&ograve;a nh&agrave;. Kh&ocirc;ng cần phải xem th&ocirc;ng b&aacute;o ở bảng th&ocirc;ng tin. Kh&ocirc;ng sợ bị bỏ lỡ c&aacute;c th&ocirc;ng b&aacute;o quan trọng.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Trao đổi th&ocirc;ng tin giữa cư d&acirc;n v&agrave; Ban quản l&yacute; chung cư;</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>G&oacute;p &yacute;, phản &aacute;nh c&aacute;c vấn đề của t&ograve;a nh&agrave;: Theo c&aacute;ch quản l&yacute; cũ, cư d&acirc;n phải đến gặp trực tiếp ban quản l&yacute; để trao đổi. Đặc biệt, khi c&oacute; c&aacute;c trường hợp khẩn cấp th&igrave; việc gặp trực tiếp rất mất thời gian.</p>\r\n\r\n<p>Đối với app quản l&yacute; chung cư, cư d&acirc;n kh&ocirc;ng cần phải lo lắng về điều n&agrave;y. Bởi, th&ocirc;ng qua ứng dụng, bạn c&oacute; thể nhanh ch&oacute;ng li&ecirc;n hệ với ban quản l&yacute; khi c&oacute; vấn đề. Ban quản l&yacute; sẽ nhận được th&ocirc;ng tin v&agrave; nhanh ch&oacute;ng giải quyết cho cư d&acirc;n.</p>\r\n\r\n<p>Cư d&acirc;n c&oacute; phản &aacute;nh về gi&aacute; điện, trục trặc thiết bị,&hellip;. chỉ cần gửi th&ocirc;ng tin qua ứng dụng. Trong giờ h&agrave;nh ch&iacute;nh Ban quản l&yacute; sẽ trả lời sớm nhất c&oacute; thể, vừa tiết kiệm thời gian vừa tiết kiệm chi ph&iacute;.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Đăng k&yacute; c&aacute;c dịch vụ - tiện &iacute;ch hiện c&oacute; tại chung cư;</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Th&ocirc;ng thường khi cư d&acirc;n muốn đăng k&yacute; phiếu vận chuyển/thi c&ocirc;ng sửa chữa/kh&aacute;ch thăm th&igrave; bắt buộc phải gh&eacute; văn ph&ograve;ng BQL để điền phiếu th&ocirc;ng tin. Thay v&igrave; thế, cư d&acirc;n c&oacute; thể đăng k&yacute; trực tiếp qua ứng dụng. BQL sẽ xem x&eacute;t c&aacute;c y&ecirc;u cầu v&agrave; duyệt nhanh ch&oacute;ng.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Nhận th&ocirc;ng b&aacute;o ph&iacute; h&agrave;ng th&aacute;ng;</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>​</strong>Thay v&igrave; nhận h&oacute;a đơn b&aacute;o ph&iacute; giấy h&agrave;ng th&aacute;ng để biết được c&aacute;c chỉ số ti&ecirc;u thụ của m&igrave;nh trong th&aacute;ng cũ. Cư d&acirc;n c&oacute; xem được chi tiết đơn gi&aacute;, số lượng c&aacute;c khoản ph&iacute; một c&aacute;ch chi tiết v&agrave; biết được tổng số tiền phải thanh to&aacute;n một c&aacute;ch nhanh nhất từ BQL</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Thanh to&aacute;n ph&iacute; trực tuyến;</strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>​</strong>H&agrave;ng th&aacute;ng, cư d&acirc;n trong t&ograve;a nh&agrave; sẽ phải đ&oacute;ng c&aacute;c khoản ph&iacute;: điện, nước, ph&iacute; quản l&yacute;, vệ sinh,&hellip;. V&agrave; phải gặp trực tiếp ban quản l&yacute; để thanh to&aacute;n từng khoản ph&iacute; g&acirc;y mất thời gian. Đồng thời, thanh to&aacute;n bằng phương thức n&agrave;y c&ograve;n g&acirc;y mất thời gian của cư d&acirc;n khi cần gặp ban quản l&yacute; để nhận th&ocirc;ng b&aacute;o ph&iacute; nếu lỡ bị mất.</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=bj1bR2JJULo\" target=\"_self\"><img alt=\"Ứng dụng cư dân Khaservice\" src=\"/upload/youtube.png\" style=\"border-width:initial; margin:1px; width:15%\" /></a></p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=bj1bR2JJULo\" target=\"_blank\">https://www.youtube.com/watch?v=bj1bR2JJULo</a></p>\r\n\r\n<p>KHASERVICE APP | GIẢI PH&Aacute;P C&Ocirc;NG NGHỆ 4.0 TRONG C&Ocirc;NG T&Aacute;C QUẢN L&Yacute;, VẬN H&Agrave;NH CHUNG CƯ</p>\r\n\r\n<h2><strong>2. Tải phần mềm ứng dụng miễn ph&iacute; tại.</strong></h2>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Qu&eacute;t m&atilde;&nbsp;<strong>QRCode</strong>&nbsp;b&ecirc;n cạnh để tải ứng dụng</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Google Play&nbsp;</strong>(Hệ điều h&agrave;nh Android)&nbsp;<a href=\"https://play.google.com/store/apps/details?id=vn.com.khaservice.app\">https://play.google.com/store/apps/details?id=vn.com.khaservice.app</a></p>\r\n	</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"/upload/1.png\" style=\"height:100px; width:100px\" /></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Appstore&nbsp;</strong>(Hệ điều h&agrave;nh iOS)&nbsp;<a href=\"https://apps.apple.com/vn/app/khaservice/id6450207190\">https://apps.apple.com/vn/app/khaservice/id6450207190</a></p>\r\n	</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"/upload/2.png\" style=\"height:100px; width:100px\" />​</p>\r\n\r\n<p>Với c&aacute;c t&iacute;nh năng tr&ecirc;n sẽ tạo cho Qu&yacute; cư d&acirc;n sự thuận tiện trong việc sử dụng c&aacute;c tiện &iacute;ch của t&ograve;a nh&agrave;.</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n\r\n<p><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img alt=\"\" src=\"/upload/thuvien/qr-zalo-me-zaloapp-com-qr-p-p8bds4dak1ib.png\" style=\"height:100px; width:100px\" /></em></p>\r\n', 2, 1, 0, 0, 1766720679, '', '', ''),
(4, 'Giới thiệu về Khaservice', 'gioi-thieu-ve-khaservice', '', '', '<p style=\"text-align:justify\"><strong>&nbsp;&nbsp;&nbsp;&nbsp;<em>K&iacute;nh gửi Qu&yacute; kh&aacute;ch h&agrave;ng,</em></strong></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;Lời đầu ti&ecirc;n, C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash;&nbsp;<strong>KhaService</strong>&nbsp;xin gửi lời ch&agrave;o tr&acirc;n trọng v&agrave; k&iacute;nh ch&uacute;c Qu&yacute; kh&aacute;ch h&agrave;ng th&agrave;nh c&ocirc;ng!</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;Trong thời đại kinh tế hội nhập to&agrave;n cầu, sự cạnh tranh để chia sẻ thị phần kinh doanh l&agrave; kh&ocirc;ng tr&aacute;nh khỏi. Do vậy, việc chuy&ecirc;n m&ocirc;n h&oacute;a lĩnh vực kinh doanh để tạo sự kh&aacute;c biệt v&agrave; t&iacute;nh chuy&ecirc;n nghiệp l&agrave; cần thiết, gi&uacute;p n&acirc;ng cao hiệu quả cạnh tranh v&agrave; mang đến những hiệu quả nhất định trong chiến lược kinh doanh của từng doanh nghiệp.&nbsp;<strong>KhaService</strong>&nbsp;cũng kh&ocirc;ng l&agrave; ngoại lệ.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội tiền th&acirc;n l&agrave; C&ocirc;ng ty TNHH Một th&agrave;nh vi&ecirc;n Dịch vụ Quản l&yacute; Cao ốc Kh&aacute;nh Hội (th&agrave;nh lập 06/09/2010) &ndash; hoạt động ch&iacute;nh trong lĩnh vực Quản l&yacute; vận h&agrave;nh cao ốc c&ugrave;ng những dịch vụ kh&aacute;c như dịch vụ giữ xe với c&ocirc;ng nghệ thẻ th&ocirc;ng minh hiện đại, dịch vụ bảo tr&igrave; sửa chữa điện, nước, điện lạnh, vệ sinh, giặt ủi,&hellip;&nbsp;<strong>KhaService</strong>&nbsp;hướng đến lợi &iacute;ch của kh&aacute;ch h&agrave;ng, nh&agrave; đầu tư v&agrave; cộng đồng cư d&acirc;n với ti&ecirc;u ch&iacute;:&nbsp;<em><strong>&ldquo;Dịch vụ tốt nhất, tiện lợi nhất v&agrave; mang đến sự h&agrave;i l&ograve;ng nhất cho kh&aacute;ch h&agrave;ng&rdquo;.</strong></em></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;Trải qua hơn 14&nbsp;năm hoạt động&nbsp;<strong>KhaService</strong>&nbsp;đ&atilde; đạt được những th&agrave;nh quả đ&aacute;ng tr&acirc;n trọng v&agrave; được Qu&yacute; kh&aacute;ch h&agrave;ng, đối t&aacute;c t&iacute;n nhiệm v&agrave; tạo được thương hiệu tr&ecirc;n thị trường l&agrave; một trong những doanh nghiệp c&oacute; năng lực v&agrave; đ&aacute;ng t&iacute;n cậy trong lĩnh vực quản l&yacute; vận h&agrave;nh bất động sản.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;Với đội ngũ c&aacute;n bộ, chuy&ecirc;n vi&ecirc;n c&oacute; nhiều kinh nghiệm trong lĩnh vực quản l&yacute; vận h&agrave;nh cao ốc c&ugrave;ng chế độ đ&agrave;o tạo chuy&ecirc;n nghiệp, b&agrave;i bản về c&aacute;c kiến thức chuy&ecirc;n m&ocirc;n th&ocirc;ng qua hoạt động quản l&yacute; thực tiễn v&agrave; c&aacute;c kh&oacute;a huấn luyện chuy&ecirc;n s&acirc;u,&nbsp;<strong>KhaService</strong>&nbsp;rất tự tin với đội ngũ c&aacute;n bộ quản l&yacute; v&agrave; chuy&ecirc;n vi&ecirc;n hiện c&oacute; của m&igrave;nh. C&ugrave;ng với sức trẻ, t&acirc;m huyết, sự năng động v&agrave; s&aacute;ng tạo&nbsp;<strong>KhaService</strong>&nbsp;sẽ gi&uacute;p c&aacute;c kh&aacute;ch h&agrave;ng lựa chọn được những dịch vụ ph&ugrave; hợp với nhu cầu v&agrave; triển khai quản l&yacute; điều h&agrave;nh với phương thức chuy&ecirc;n nghiệp nhất, mang đến hiệu quả v&agrave; chất lượng cao nhất!</p>\r\n\r\n<p dir=\"rtl\"><strong>&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tổng Gi&aacute;m Đốc</strong></p>\r\n\r\n<p dir=\"rtl\"><strong>&nbsp;&nbsp;&nbsp; B&ugrave;i Thị Ho&agrave;i Phụng&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Giấy chứng nhận đăng k&yacute; Kinh doanh số 0310341786, cấp ng&agrave;y 24/09/2010 của Sở Kế Hoạch &amp; &ETH;ầu Tư TP. Hồ Ch&iacute; Minh.&nbsp;</em><br />\r\n<br />\r\n&diams;&nbsp;T&ecirc;n c&ocirc;ng ty:&nbsp;C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI<br />\r\n&diams;&nbsp;T&ecirc;n giao dịch:&nbsp;KHANH HOI BUILDING AND MANANGEMENT JOINT STOCK COMPANY<br />\r\n&diams;&nbsp;T&ecirc;n viết tắt: KHASERVICE</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n', 3, 1, 1, 0, 1766829633, '', '', ''),
(5, 'Sơ đồ tổ chức công ty', 'so-do-to-chuc-cong-ty', '', '', '<p>GGG</p>\n\n<p><img alt=\"\" src=\"../upload/gioithieu/Artboard 9.jpg\" style=\"height:auto; width:665px\" /></p>\n\n<hr />\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\n\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\n\n<p><em>Điện thoại: (028) 38253041</em></p>\n\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\n\n<p><em>Chat Zalo:&nbsp;</em></p>\n', 4, 1, 1, 0, 1766830097, '', '', ''),
(6, 'Lịch sử hình thành', 'lich-su-hinh-thanh', '', '', '<p style=\"text-align:justify\"><img alt=\"\" src=\"../upload/gioithieu/Lịch sử hình thành-KhaService.png\" style=\"height:auto; width:970px\" /></p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;Được th&agrave;nh lập ng&agrave;y 06 th&aacute;ng 09 năm 2010, C&ocirc;ng ty TNHH MTV Dịch Vụ Quản L&yacute; Cao Ốc Kh&aacute;nh Hội -&nbsp;<strong>KhaService</strong>&nbsp;được th&agrave;nh lập với 100% vốn chủ sở hữu của c&ocirc;ng ty Cổ Phần Đầu Tư v&agrave; Dịch Vụ Kh&aacute;nh Hội - KHAHOMEX hoạt động trong lĩnh vực: Quản l&yacute; vận h&agrave;nh cao ốc c&ugrave;ng với những dịch vụ kh&aacute;c như giữ xe thẻ th&ocirc;ng minh, dịch vụ bảo tr&igrave; sửa chữa điện, nước, điện lạnh, vệ sinh, giặt ủi,...</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;Với sự lớn mạnh v&agrave; ph&aacute;t triển kh&ocirc;ng ngừng, đầu th&aacute;ng 01/2018, C&ocirc;ng ty TNHH MTV Dịch Vụ Quản L&yacute; Cao Ốc Kh&aacute;nh Hội đ&atilde; đổi t&ecirc;n th&agrave;nh&nbsp;C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;Với đội ngũ c&aacute;n bộ, chuy&ecirc;n vi&ecirc;n c&oacute; nhiều năm kinh nghiệm trong lĩnh vực quản l&yacute; vận h&agrave;nh cao ốc c&ugrave;ng chế độ đ&agrave;o tạo chuy&ecirc;n nghiệp, b&agrave;i bản về c&aacute;c kiến thức chuy&ecirc;n m&ocirc;n th&ocirc;ng qua hoạt động quản l&yacute; thực tiễn v&agrave; c&aacute;c kh&oacute;a huấn luyện chuy&ecirc;n s&acirc;u.&nbsp;<strong>KhaService</strong>&nbsp;tự tin với đội ngũ quản l&yacute; v&agrave; chuy&ecirc;n vi&ecirc;n hiện c&oacute; của m&igrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\">&nbsp;&nbsp;&nbsp;&nbsp;C&ugrave;ng với sức trẻ, t&acirc;m huyết, sự năng động v&agrave; s&aacute;ng tạo&nbsp;<strong>KhaService</strong>&nbsp;sẽ gi&uacute;p c&aacute;c kh&aacute;ch h&agrave;ng lựa chọn được những dịch vụ ph&ugrave; hợp với nhu cầu v&agrave; triển khai quản l&yacute; điều h&agrave;nh với phương thức chuy&ecirc;n nghiệp nhất, mang đến hiệu quả v&agrave; chất lượng cao nhất.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n', 5, 1, 1, 0, 1766830617, '', '', ''),
(7, 'Điều khiển & Điều kiện', 'dieu-khoan-dieu-kien', '', '', '<p style=\"text-align:justify\">Bằng c&aacute;ch tải xuống hoặc sử dụng ứng dụng, c&aacute;c điều khoản n&agrave;y sẽ tự động &aacute;p dụng cho bạn &ndash; do đ&oacute; bạn n&ecirc;n đảm bảo rằng m&igrave;nh đ&atilde; đọc kỹ c&aacute;c điều khoản n&agrave;y trước khi sử dụng ứng dụng. Bạn kh&ocirc;ng được ph&eacute;p sao ch&eacute;p hoặc sửa đổi ứng dụng, bất kỳ phần n&agrave;o của ứng dụng hoặc nh&atilde;n hiệu của ch&uacute;ng t&ocirc;i dưới bất kỳ h&igrave;nh thức n&agrave;o. Bạn kh&ocirc;ng được ph&eacute;p t&igrave;m c&aacute;ch tr&iacute;ch xuất m&atilde; nguồn của ứng dụng v&agrave; bạn cũng kh&ocirc;ng n&ecirc;n cố dịch ứng dụng sang c&aacute;c ng&ocirc;n ngữ kh&aacute;c hoặc tạo c&aacute;c phi&ecirc;n bản ph&aacute;i sinh. Bản th&acirc;n ứng dụng v&agrave; tất cả c&aacute;c nh&atilde;n hiệu, bản quyền, quyền cơ sở dữ liệu v&agrave; c&aacute;c quyền sở hữu tr&iacute; tuệ kh&aacute;c li&ecirc;n quan đến n&oacute; vẫn thuộc về&nbsp;<strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices.</strong></p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices</strong>&nbsp;cam kết đảm bảo rằng ứng dụng hữu &iacute;ch v&agrave; hiệu quả nhất c&oacute; thể. V&igrave; l&yacute; do đ&oacute;, ch&uacute;ng t&ocirc;i c&oacute; quyền thực hiện c&aacute;c thay đổi đối với ứng dụng hoặc t&iacute;nh ph&iacute; cho c&aacute;c dịch vụ của ứng dụng bất kỳ l&uacute;c n&agrave;o v&agrave; v&igrave; bất kỳ l&yacute; do g&igrave;. Ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng bao giờ t&iacute;nh ph&iacute; bạn đối với ứng dụng hoặc dịch vụ của ứng dụng m&agrave; kh&ocirc;ng n&oacute;i r&otilde; với bạn ch&iacute;nh x&aacute;c những g&igrave; bạn đang trả tiền.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nỨng dụng KhaService lưu trữ v&agrave; xử l&yacute; dữ liệu c&aacute; nh&acirc;n m&agrave; bạn đ&atilde; cung cấp cho ch&uacute;ng t&ocirc;i để cung cấp Dịch vụ của ch&uacute;ng t&ocirc;i. Bạn c&oacute; tr&aacute;ch nhiệm giữ an to&agrave;n cho điện thoại v&agrave; quyền truy cập v&agrave;o ứng dụng của m&igrave;nh. Do đ&oacute;, ch&uacute;ng t&ocirc;i khuy&ecirc;n bạn kh&ocirc;ng n&ecirc;n bẻ kh&oacute;a hoặc root điện thoại của m&igrave;nh, đ&acirc;y l&agrave; qu&aacute; tr&igrave;nh loại bỏ c&aacute;c giới hạn v&agrave; hạn chế phần mềm do hệ điều h&agrave;nh ch&iacute;nh thức của thiết bị &aacute;p đặt. N&oacute; c&oacute; thể khiến điện thoại của bạn dễ bị phần mềm độc hại/vi-r&uacute;t/chương tr&igrave;nh độc hại x&acirc;m nhập, ảnh hưởng đến c&aacute;c t&iacute;nh năng bảo mật của điện thoại v&agrave; điều đ&oacute; c&oacute; thể c&oacute; nghĩa l&agrave; ứng dụng KhaService sẽ kh&ocirc;ng hoạt động b&igrave;nh thường hoặc ho&agrave;n to&agrave;n kh&ocirc;ng hoạt động.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nỨng dụng sử dụng c&aacute;c dịch vụ của b&ecirc;n thứ ba tuy&ecirc;n bố Điều khoản v&agrave; Điều kiện của họ.<br />\r\nLi&ecirc;n kết với Điều khoản v&agrave; Điều kiện của nh&agrave; cung cấp dịch vụ b&ecirc;n thứ ba m&agrave; ứng dụng sử dụng.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>* Dịch vụ Google Play</strong><br />\r\nBạn n&ecirc;n lưu &yacute; rằng c&oacute; một số điều m&agrave;&nbsp;<strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices&nbsp;</strong>sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm. Một số chức năng của ứng dụng sẽ y&ecirc;u cầu ứng dụng phải c&oacute; kết nối internet đang hoạt động. Kết nối c&oacute; thể l&agrave; Wi-Fi hoặc được cung cấp bởi nh&agrave; cung cấp mạng di động của bạn, nhưng kh&ocirc;ng thể chịu tr&aacute;ch nhiệm về việc ứng dụng kh&ocirc;ng hoạt động với đầy đủ chức năng nếu bạn kh&ocirc;ng c&oacute; quyền truy cập Wi-Fi v&agrave; bạn kh&ocirc;ng c&oacute; bất kỳ kết nối n&agrave;o của m&igrave;nh. dung lượng dữ liệu c&ograve;n lại.</p>\r\n\r\n<p style=\"text-align:justify\">Nếu bạn đang sử dụng ứng dụng b&ecirc;n ngo&agrave;i khu vực c&oacute; Wi-Fi, bạn n&ecirc;n nhớ rằng c&aacute;c điều khoản của thỏa thuận với nh&agrave; cung cấp mạng di động của bạn sẽ vẫn được &aacute;p dụng. Do đ&oacute;, nh&agrave; cung cấp dịch vụ di động của bạn c&oacute; thể t&iacute;nh ph&iacute; dữ liệu trong suốt thời gian kết nối khi truy cập ứng dụng hoặc c&aacute;c khoản ph&iacute; kh&aacute;c của b&ecirc;n thứ ba. Khi sử dụng ứng dụng, bạn chấp nhận chịu tr&aacute;ch nhiệm về bất kỳ khoản ph&iacute; n&agrave;o như vậy, kể cả ph&iacute; chuyển v&ugrave;ng dữ liệu nếu bạn sử dụng ứng dụng b&ecirc;n ngo&agrave;i l&atilde;nh thổ qu&ecirc; hương m&igrave;nh (tức l&agrave; khu vực hoặc quốc gia) m&agrave; kh&ocirc;ng tắt chuyển v&ugrave;ng dữ liệu. Nếu bạn kh&ocirc;ng phải l&agrave; người thanh to&aacute;n h&oacute;a đơn cho thiết bị m&agrave; bạn đang sử dụng ứng dụng, xin lưu &yacute; rằng ch&uacute;ng t&ocirc;i cho rằng bạn đ&atilde; nhận được sự cho ph&eacute;p từ người thanh to&aacute;n h&oacute;a đơn để sử dụng ứng dụng.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nĐồng thời,&nbsp;<strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices</strong>&nbsp;kh&ocirc;ng phải l&uacute;c n&agrave;o cũng chịu tr&aacute;ch nhiệm về c&aacute;ch bạn sử dụng ứng dụng, tức l&agrave;. Bạn cần đảm bảo rằng thiết bị của m&igrave;nh lu&ocirc;n được sạc &ndash; nếu thiết bị hết pin v&agrave; bạn kh&ocirc;ng thể bật thiết bị để sử dụng Dịch vụ,&nbsp;<strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices</strong>&nbsp;kh&ocirc;ng thể nhận tr&aacute;ch nhiệm.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nĐối với tr&aacute;ch nhiệm của&nbsp;<strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices</strong>&nbsp;đối với việc bạn sử dụng ứng dụng, khi bạn đang sử dụng ứng dụng, điều quan trọng cần lưu &yacute; l&agrave; mặc d&ugrave; ch&uacute;ng t&ocirc;i cố gắng đảm bảo rằng ứng dụng lu&ocirc;n được cập nhật v&agrave; ch&iacute;nh x&aacute;c, nhưng ch&uacute;ng t&ocirc;i dựa v&agrave;o c&aacute;c b&ecirc;n thứ ba để cung cấp th&ocirc;ng tin cho ch&uacute;ng t&ocirc;i để ch&uacute;ng t&ocirc;i c&oacute; thể cung cấp th&ocirc;ng tin đ&oacute; cho bạn.&nbsp;<strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices</strong>&nbsp;kh&ocirc;ng chịu tr&aacute;ch nhiệm ph&aacute;p l&yacute; đối với bất kỳ tổn thất n&agrave;o, trực tiếp hay gi&aacute;n tiếp, m&agrave; bạn gặp phải do ho&agrave;n to&agrave;n dựa v&agrave;o chức năng n&agrave;y của ứng dụng.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nTại một số điểm, ch&uacute;ng t&ocirc;i c&oacute; thể muốn cập nhật ứng dụng. Ứng dụng hiện khả dụng tr&ecirc;n Android v&agrave; iOS &ndash; c&aacute;c y&ecirc;u cầu đối với cả hai hệ thống (v&agrave; đối với bất kỳ hệ thống bổ sung n&agrave;o m&agrave; ch&uacute;ng t&ocirc;i quyết định mở rộng t&iacute;nh khả dụng của ứng dụng) c&oacute; thể thay đổi v&agrave; bạn sẽ cần tải xuống c&aacute;c bản cập nhật nếu muốn tiếp tục sử dụng ứng dụng.&nbsp;<strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices&nbsp;</strong>kh&ocirc;ng hứa rằng họ sẽ lu&ocirc;n cập nhật ứng dụng để n&oacute; ph&ugrave; hợp với bạn v&agrave;/hoặc hoạt động với phi&ecirc;n bản Android &amp; iOS m&agrave; bạn đ&atilde; c&agrave;i đặt tr&ecirc;n thiết bị của m&igrave;nh. Tuy nhi&ecirc;n, bạn hứa sẽ lu&ocirc;n chấp nhận c&aacute;c bản cập nhật cho ứng dụng khi được cung cấp cho bạn, Ch&uacute;ng t&ocirc;i cũng c&oacute; thể muốn ngừng cung cấp ứng dụng v&agrave; c&oacute; thể chấm dứt việc sử dụng ứng dụng bất kỳ l&uacute;c n&agrave;o m&agrave; kh&ocirc;ng cần th&ocirc;ng b&aacute;o cho bạn về việc chấm dứt. Trừ khi ch&uacute;ng t&ocirc;i c&oacute; th&ocirc;ng b&aacute;o kh&aacute;c cho bạn, khi c&oacute; bất kỳ sự chấm dứt n&agrave;o, (a) c&aacute;c quyền v&agrave; giấy ph&eacute;p được cấp cho bạn theo c&aacute;c điều khoản n&agrave;y sẽ kết th&uacute;c; (b) bạn phải ngừng sử dụng ứng dụng v&agrave; (nếu cần) x&oacute;a ứng dụng đ&oacute; khỏi thiết bị của m&igrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>Thay đổi đối với Điều khoản v&agrave; Điều kiện n&agrave;y</strong><br />\r\nCh&uacute;ng t&ocirc;i c&oacute; thể cập nhật Điều khoản v&agrave; Điều kiện của m&igrave;nh theo thời gian. V&igrave; vậy, bạn n&ecirc;n xem lại trang n&agrave;y định kỳ để biết bất kỳ thay đổi n&agrave;o. Ch&uacute;ng t&ocirc;i sẽ th&ocirc;ng b&aacute;o cho bạn về bất kỳ thay đổi n&agrave;o bằng c&aacute;ch đăng Điều khoản v&agrave; Điều kiện mới tr&ecirc;n trang n&agrave;y.</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\nC&aacute;c điều khoản v&agrave; điều kiện n&agrave;y c&oacute; hiệu lực kể từ ng&agrave;y 22/05/2023</p>\r\n\r\n<p style=\"text-align:justify\"><br />\r\n<strong>Li&ecirc;n hệ ch&uacute;ng t&ocirc;i</strong><br />\r\nNếu bạn c&oacute; bất kỳ c&acirc;u hỏi hoặc đề xuất n&agrave;o về Điều khoản v&agrave; Điều kiện của ch&uacute;ng t&ocirc;i, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i tại&nbsp;<strong>cskh@khaservice.com.vn.</strong></p>\r\n', 6, 1, 1, 0, 1766830769, '', '', ''),
(8, 'Chính sách thanh toán', 'chinh-sach-thanh-toan', '', '', '<h4>1.CH&Iacute;NH S&Aacute;CH HO&Agrave;N TRẢ</h4>\r\n\r\n<p><em>Ch&iacute;nh s&aacute;ch ho&agrave;n trả v&agrave; bồi thường thiệt hại cho kh&aacute;ch h&agrave;ng sử dụng ứng dụng thanh to&aacute;n v&agrave; tương t&aacute;c Ứng dụng cư d&acirc;n Khaservice</em></p>\r\n\r\n<p><strong>I. MỤC Đ&Iacute;CH, ĐỐI TƯỢNG V&Agrave; PHẠM VI &Aacute;P DỤNG</strong></p>\r\n\r\n<p>&bull;&nbsp;Ch&iacute;nh s&aacute;ch n&agrave;y được ban h&agrave;nh với mục đ&iacute;ch tạo sự an t&acirc;m v&agrave; tin tưởng của kh&aacute;ch h&agrave;ng&nbsp;c&oacute; nhu cầu thanh to&aacute;n h&oacute;a đơn b&aacute;o ph&iacute; cho c&ocirc;ng ty&nbsp;(sau đ&acirc;y gọi l&agrave; &ldquo;kh&aacute;ch h&agrave;ng&rdquo; hoặc &ldquo;người d&ugrave;ng&rdquo;) th&ocirc;ng qua Ứng dụng thanh to&aacute;n v&agrave; tương t&aacute;c&nbsp;cư d&acirc;n Khaservice (&ldquo;KHASERVICE&rdquo;)</p>\r\n\r\n<p>&bull;&nbsp;Ch&iacute;nh s&aacute;ch được &aacute;p dụng cho kh&aacute;ch h&agrave;ng l&agrave; c&aacute; nh&acirc;n, tổ chức c&oacute; nhu cầu sử dụng c&aacute;c dịch vụ do C&ocirc;ng Ty Cổ Phần Quản l&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội (&ldquo;KHASERVICES&rdquo;) cung cấp th&ocirc;ng qua ứng dụng KHASERVICE.</p>\r\n\r\n<p><strong>II. NỘI DUNG CH&Iacute;NH S&Aacute;CH</strong></p>\r\n\r\n<p><strong>1. C&aacute;c trường hợp chấp nhận phối hợp với b&ecirc;n thứ ba ho&agrave;n tiền</strong></p>\r\n\r\n<p>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI chấp nhận sẽ phối hợp với b&ecirc;n thứ ba l&agrave; Ng&acirc;n h&agrave;ng v&agrave;/hoặc tổ chức cung ứng phần mềm thanh to&aacute;n h&oacute;a đơn b&aacute;o ph&iacute; v&agrave;/hoặc c&ocirc;ng ty ho&agrave;n trả/bồi thường thiệt hại cho người d&ugrave;ng trong c&aacute;c trường hợp sau:</p>\r\n\r\n<p>&bull; Thanh to&aacute;n tr&ugrave;ng b&aacute;o ph&iacute; (1 h&oacute;a đơn b&aacute;o ph&iacute; bị thanh to&aacute;n từ 2 lần trở l&ecirc;n)</p>\r\n\r\n<p>&bull; Thanh to&aacute;n nhầm b&aacute;o ph&iacute;</p>\r\n\r\n<p>&bull; Thanh to&aacute;n giao dịch th&agrave;nh c&ocirc;ng nhưng ho&aacute; đơn chưa được gạch nợ</p>\r\n\r\n<p>&bull; Thanh to&aacute;n sai số tiền cần thanh to&aacute;n dẫn đến phần tiền người d&ugrave;ng đ&atilde; thanh to&aacute;n lớn hơn số tiền cần thanh to&aacute;n</p>\r\n\r\n<p>&bull; C&aacute;c trường hợp sai s&oacute;t hợp l&iacute; kh&aacute;c được c&ocirc;ng nhận</p>\r\n\r\n<p><strong>2. Quy định ho&agrave;n tiền</strong></p>\r\n\r\n<p><strong>2.1. Nguy&ecirc;n tắc ho&agrave;n tiền</strong></p>\r\n\r\n<p>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI chỉ thực hiện ho&agrave;n tiền đối với c&aacute;c trường hợp ph&iacute; quản l&yacute;&nbsp;người d&ugrave;ng đ&atilde; thanh to&aacute;n m&agrave; C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI đ&atilde; nhận được nhưng vẫn chưa được đối so&aacute;t v&agrave; chuyển về t&agrave;i khoản của c&ocirc;ng ty. Trường hợp tiền thanh to&aacute;n đ&atilde; được chuyển về t&agrave;i khoản c&ocirc;ng ty th&igrave; người d&ugrave;ng c&oacute; tr&aacute;ch nhiệm li&ecirc;n hệ l&agrave;m việc với bộ phận Kế to&aacute;n hoặc Chăm s&oacute;c kh&aacute;ch h&agrave;ng để được giải quyết v&agrave; ho&agrave;n tiền theo quy định của c&ocirc;ng ty.</p>\r\n\r\n<p>&bull; Trường hợp Người d&ugrave;ng li&ecirc;n hệ y&ecirc;u cầu ho&agrave;n tiền đến C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI th&igrave; C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI sẽ li&ecirc;n hệ với c&aacute;c b&ecirc;n c&oacute; li&ecirc;n quan để đối so&aacute;t y&ecirc;u cầu ho&agrave;n trả/bồi thường của kh&aacute;ch h&agrave;ng. Trường hợp c&aacute;c b&ecirc;n thống nhất y&ecirc;u cầu của kh&aacute;ch h&agrave;ng l&agrave; c&oacute; cơ sở chấp nhận th&igrave; C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI sẽ đề nghị ng&acirc;n h&agrave;ng thực hiện tr&iacute;ch tiền từ t&agrave;i khoản quản l&iacute; d&ograve;ng tiền thu hộ cho C&ocirc;ng ty để ho&agrave;n tiền cho kh&aacute;ch h&agrave;ng qua k&ecirc;nh m&agrave; kh&aacute;ch h&agrave;ng đ&atilde; thực hiện thanh to&aacute;n h&oacute;a đơn&nbsp;theo đ&uacute;ng số tiền đ&atilde; thanh to&aacute;n nhầm, thanh to&aacute;n sai hoặc thanh to&aacute;n thừa trước đ&oacute;.</p>\r\n\r\n<p>&bull; Trường hợp C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI hoặc B&ecirc;n thứ ba c&oacute; li&ecirc;n kết với C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI ph&aacute;t hiện v&agrave; gửi y&ecirc;u cầu ho&agrave;n tiền cho kh&aacute;ch h&agrave;ng th&igrave; C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI sau khi đối so&aacute;t v&agrave; x&aacute;c nhận chấp nhận y&ecirc;u cầu ho&agrave;n tiền, C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI sẽ đề nghị ng&acirc;n h&agrave;ng thực hiện tr&iacute;ch tiền từ t&agrave;i khoản quản l&iacute; d&ograve;ng tiền thu hộ cho C&ocirc;ng ty để ho&agrave;n tiền cho kh&aacute;ch h&agrave;ng qua k&ecirc;nh m&agrave; kh&aacute;ch h&agrave;ng đ&atilde; thực hiện thanh to&aacute;n h&oacute;a đơn&nbsp;theo đ&uacute;ng số tiền đ&atilde; thanh to&aacute;n nhầm, thanh to&aacute;n sai hoặc thanh to&aacute;n thừa trước đ&oacute;.</p>\r\n\r\n<p>&bull; C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI sẽ kh&ocirc;i phục dữ liệu như th&ocirc;ng tin h&oacute;a đơn b&aacute;o ph&iacute;, t&igrave;nh trạng thanh to&aacute;n đ&atilde; bị sai lệch tr&ecirc;n ứng dụng KHASERVICE trong trường hợp cần phải kh&ocirc;i phục lại dữ liệu.</p>\r\n\r\n<p><strong>2.2. Phương thức ho&agrave;n tiền</strong></p>\r\n\r\n<p>Phương thức ho&agrave;n tiền l&agrave; ho&agrave;n tiền theo k&ecirc;nh m&agrave; người d&ugrave;ng đ&atilde; thanh to&aacute;n.</p>\r\n\r\n<p><strong>3. Thời gian xử l&yacute;</strong></p>\r\n\r\n<p>&bull; C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI sẽ gửi kết quả phản hồi y&ecirc;u cầu ho&agrave;n trả/bồi thường tới kh&aacute;ch h&agrave;ng th&ocirc;ng qua Dịch vụ Chăm s&oacute;c kh&aacute;ch h&agrave;ng của KHASERVICE trong v&ograve;ng tối đa 02 ng&agrave;y l&agrave;m việc kể từ khi C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI xử l&yacute; xong y&ecirc;u cầu ho&agrave;n trả của người d&ugrave;ng hoặc của b&ecirc;n thứ ba.</p>\r\n\r\n<p>&bull; Nếu y&ecirc;u cầu ho&agrave;n trả/bồi thường của kh&aacute;ch h&agrave;ng được C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI x&aacute;c định đ&aacute;p ứng c&aacute;c điều kiện quy định tại khoản 1, mục II của ch&iacute;nh s&aacute;ch n&agrave;y, C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI sẽ thực hiện thủ tục li&ecirc;n hệ với b&ecirc;n thứ ba c&oacute; li&ecirc;n kết theo quy định tại khoản 2 v&agrave; khoản 3, mục II của ch&iacute;nh s&aacute;ch n&agrave;y.</p>\r\n\r\n<p>&bull; Đối với phương thức ho&agrave;n tiền th&ocirc;ng qua chuyển khoản ng&acirc;n h&agrave;ng, thời gian kh&aacute;ch h&agrave;ng nhận được tiền t&ugrave;y theo quy định của ng&acirc;n h&agrave;ng.</p>\r\n\r\n<h4>&nbsp;</h4>\r\n\r\n<h4>2.CH&Iacute;NH S&Aacute;CH KHIẾU NẠI</h4>\r\n\r\n<p><em>Quy tr&igrave;nh giải quyết tra so&aacute;t, khiếu nại, tranh chấp d&agrave;nh cho người d&ugrave;ng ứng dụng thanh to&aacute;n v&agrave; tương t&aacute;c Ứng dụng cư d&acirc;n Khaservice</em></p>\r\n\r\n<p><strong>I. QUY ĐỊNH CHUNG</strong></p>\r\n\r\n<p><strong>1. Mục đ&iacute;ch</strong></p>\r\n\r\n<p>Quy định thống nhất tr&igrave;nh tự thủ tục tiếp nhận v&agrave; giải quyết tra so&aacute;t, khiếu nại, tranh chấp d&agrave;nh cho kh&aacute;ch h&agrave;ng (hoặc người d&ugrave;ng) sử dụng ứng dụng KHASERVICE th&ocirc;ng qua bộ phận chăm s&oacute;c kh&aacute;ch h&agrave;ng của C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI (viết tắt: BP.CSKH).</p>\r\n\r\n<p><strong>2. Phạm vi, đối tượng &aacute;p dụng</strong></p>\r\n\r\n<p>&bull; C&aacute; nh&acirc;n, tổ chức sử dụng ứng dụng KHASERVICE (sau đ&acirc;y gọi l&agrave; &quot;người d&ugrave;ng&quot; hoặc &quot;kh&aacute;ch h&agrave;ng&quot;)</p>\r\n\r\n<p>&bull; C&aacute;c đối t&aacute;c cung cấp sản phẩm/dịch vụ hoặc li&ecirc;n kết để cung ứng dịch vụ li&ecirc;n quan đến ứng dụng KHASERVICE</p>\r\n\r\n<p><strong>3. Giải th&iacute;ch từ ngữ, từ viết tắt</strong></p>\r\n\r\n<p>&bull; KHASERVICES: C&ocirc;ng Ty Cổ Phần Quản l&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội</p>\r\n\r\n<p>&bull; Khiếu nại: c&aacute;c y&ecirc;u cầu, khiếu nại, tranh chấp, kiện tụng của kh&aacute;ch h&agrave;ng khi sử dụng ứng dụng KHASERVICE</p>\r\n\r\n<p>&bull; Ng&agrave;y l&agrave;m việc: l&agrave; c&aacute;c ng&agrave;y l&agrave;m việc từ thứ hai đến thứ bảy h&agrave;ng tuần của KHASERVICES, v&agrave; kh&ocirc;ng rơi v&agrave;o c&aacute;c ng&agrave;y nghỉ lễ, Tết theo quy định của nước Cộng h&ograve;a x&atilde; hội chủ nghĩa Việt Nam.</p>\r\n\r\n<p><strong>4. Phương thức tiếp nhận khiếu nại</strong></p>\r\n\r\n<p>&bull; Thư điện tử (Email) hotro@khaservice.com.vn, Zalo Chăm s&oacute;c kh&aacute;ch h&agrave;ng 24/7:&nbsp;.</p>\r\n\r\n<p>&bull; Văn ph&ograve;ng Ban Quản L&yacute; tại mỗi dự &aacute;n m&agrave; kh&aacute;ch h&agrave;ng thực hiện giao dịch</p>\r\n\r\n<p>&bull; C&aacute;c phương thức tiếp nhận th&ocirc;ng tin kh&aacute;c được giới thiệu tại Mục hỗ trợ 24/7 của ứng dụng KHASERVICE v&agrave; website của Khaservice.com.vn</p>\r\n\r\n<p>&bull; Trường hợp kh&aacute;ch h&agrave;ng uỷ quyền cho người kh&aacute;c thực hiện đề nghị tra so&aacute;t, khiếu nại, chủ t&agrave;i khoản phải thực hiện theo đ&uacute;ng quy định của ph&aacute;p luật về thủ tục uỷ quyền.</p>\r\n\r\n<p><strong>5. Thời hạn xử l&yacute; đề nghị tra so&aacute;t khiếu nại, tranh chấp</strong></p>\r\n\r\n<p>&bull; Kh&aacute;ch h&agrave;ng được quyền đề nghị tra so&aacute;t, khiếu nại trong v&ograve;ng 60 ng&agrave;y kể từ ng&agrave;y ph&aacute;t sinh giao dịch đề nghị tra so&aacute;t, khiếu nại.</p>\r\n\r\n<p>&bull; C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI thực hiện ngay c&aacute;c biện ph&aacute;p để tạm dừng cung ứng dịch vụ ngay khi nhận được đề nghị từ kh&aacute;ch h&agrave;ng do nghi ngờ c&oacute; gian lận hoặc tổn thất, v&agrave; chịu tr&aacute;ch nhiệm với to&agrave;n bộ tổn thất t&agrave;i ch&iacute;nh ph&aacute;t sinh đối với kh&aacute;ch h&agrave;ng do việc sử dụng dịch vụ sau thời điểm tạm dừng cung ứng dịch vụ.</p>\r\n\r\n<p>&bull; Thời hạn xử l&yacute; đề nghị tra so&aacute;t, khiếu nại kh&ocirc;ng qu&aacute; 45 ng&agrave;y l&agrave;m việc kể từ ng&agrave;y BP.CSKH tiếp nhận đề nghị tra so&aacute;t, khiếu nại lần đầu của chủ t&agrave;i khoản theo một trong c&aacute;c h&igrave;nh thức tiếp nhận quy định tại Mục 3.</p>\r\n\r\n<p><strong>6. Nguy&ecirc;n tắc giải quyết khiếu nại</strong></p>\r\n\r\n<p>&bull; Nh&acirc;n vi&ecirc;n chăm s&oacute;c kh&aacute;ch h&agrave;ng tiếp nhận tra so&aacute;t, khiếu nại, tranh chấp của kh&aacute;ch h&agrave;ng qua c&aacute;c k&ecirc;nh trực tuyến phải x&aacute;c thực những th&ocirc;ng tin cơ bản m&agrave; chủ t&agrave;i khoản đ&atilde; cung cấp tr&ecirc;n hệ thống KHASERVICES. Th&ocirc;ng tin khiếu nại phải ch&iacute;nh x&aacute;c v&agrave; tr&ugrave;ng khớp với th&ocirc;ng tin giao dịch.</p>\r\n\r\n<p>&bull; BP.CSKH của KHASERVICE sẽ xử l&yacute; ngay c&aacute;c khiếu nại theo ch&iacute;nh s&aacute;ch đ&atilde; quy định ngay sau khi tiếp nhận.</p>\r\n\r\n<p>&bull; Việc xử l&yacute; khiếu nại dựa tr&ecirc;n cơ sở thu thập c&aacute;c th&ocirc;ng tin, chứng cứ li&ecirc;n quan. Do đ&oacute;, KHASERVICE, trong một số trường hợp, c&oacute; thể sẽ y&ecirc;u cầu kh&aacute;ch h&agrave;ng cung cấp th&ecirc;m th&ocirc;ng tin để phục vụ điều tra, giải quyết khiếu nại.</p>\r\n\r\n<p>&bull; Trong một số trường hợp nếu x&eacute;t thấy cần thiết, BP.CSKH đề nghị bộ phận phụ tr&aacute;ch KHASERVICE sẽ tiến h&agrave;nh phong tỏa t&agrave;i khoản, giao dịch li&ecirc;n quan trong thời gian giải quyết khiếu nại</p>\r\n\r\n<p><strong>7. Kết quả v&agrave; xử l&yacute; kết quả tra so&aacute;t, khiếu nại, tranh chấp</strong></p>\r\n\r\n<p>&bull; Trong v&ograve;ng 07&nbsp;(bảy) ng&agrave;y l&agrave;m việc kể từ ng&agrave;y th&ocirc;ng b&aacute;o kết quả tra so&aacute;t, khiếu nại cho chủ t&agrave;i khoản, C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI thực hiện bồi ho&agrave;n cho chủ t&agrave;i khoản theo thoả thuận v&agrave; quy định của ph&aacute;p luật hiện h&agrave;nh đối với tổn thất ph&aacute;t sinh kh&ocirc;ng do lỗi của chủ t&agrave;i khoản v&agrave;/hoặc kh&ocirc;ng thuộc c&aacute;c trường hợp bất khả kh&aacute;ng, theo thoả thuận tại &ldquo;Thoả thuận người d&ugrave;ng&rdquo;.</p>\r\n\r\n<p>&bull; Trong trường hợp hết thời hạn xử l&yacute; đề nghị tra so&aacute;t, khiếu nại, tranh chấp m&agrave; vẫn chưa x&aacute;c định được nguy&ecirc;n nh&acirc;n hay lỗi thuộc b&ecirc;n n&agrave;o th&igrave; trong v&ograve;ng 15 ng&agrave;y l&agrave;m việc tiếp theo, KHASERVICES thoả thuận với chủ t&agrave;i khoản về phương &aacute;n xử l&yacute; hoặc tạm thời bồi ho&agrave;n tổn thất cho chủ t&agrave;i khoản cho đến khi c&oacute; kết luận cuối c&ugrave;ng của cơ quan c&oacute; thẩm quyền ph&acirc;n định r&otilde; lỗi v&agrave; tr&aacute;ch nhiệm của c&aacute;c b&ecirc;n.</p>\r\n\r\n<p>&bull; Trong trường hợp vụ việc c&oacute; dấu hiệu phạm tội, C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI thực hiện th&ocirc;ng b&aacute;o cho cơ quan nh&agrave; nước c&oacute; thẩm quyền theo quy định của ph&aacute;p luật về tố tụng h&igrave;nh sự v&agrave; b&aacute;o c&aacute;o Ng&acirc;n h&agrave;ng Nh&agrave; nước (Vụ Thanh To&aacute;n, Ng&acirc;n h&agrave;ng Nh&agrave; nước chi nh&aacute;nh tỉnh, th&agrave;nh phố tr&ecirc;n địa b&agrave;n). Đồng thời, C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI th&ocirc;ng b&aacute;o bằng văn bản cho chủ t&agrave;i khoản về t&igrave;nh trạng xử l&yacute; đề nghị tra so&aacute;t, khiếu nại, việc giải quyết tra so&aacute;t, khiếu nại thuộc tr&aacute;ch nhiệm giải quyết của cơ quan nh&agrave; nước c&oacute; thẩm quyền. Trong trường hợp cơ quan nh&agrave; nước c&oacute; thẩm quyền th&ocirc;ng b&aacute;o kết quả giải quyết kh&ocirc;ng c&oacute; yếu tố tội phạm, trong v&ograve;ng 15 ng&agrave;y l&agrave;m việc kể từ ng&agrave;y c&oacute; kết luận của cơ quan nh&agrave; nước c&oacute; thẩm quyền, C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI thoả thuận với kh&aacute;ch h&agrave;ng về phương &aacute;n xử l&yacute; tra so&aacute;t, khiếu nại.</p>\r\n\r\n<p>&bull; Trường hợp KHASERVICES, chủ t&agrave;i khoản v&agrave; c&aacute;c b&ecirc;n li&ecirc;n quan kh&ocirc;ng thoả thuận được v&agrave;/hoặc kh&ocirc;ng đồng &yacute; với qu&aacute; tr&igrave;nh xử l&yacute; đề nghị tra so&aacute;t, khiếu nại th&igrave; việc giải quyết tranh chấp được thực hiện theo quy định của ph&aacute;p luật.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>Chat Zalo:&nbsp;</em></p>\r\n', 7, 1, 0, 0, 1766830957, '', '', '');
INSERT INTO `table_gioithieu` (`id`, `ten_vi`, `ten_khong_dau`, `photo`, `mota_vi`, `noidung_vi`, `stt`, `hienthi`, `noibat`, `ngaytao`, `ngaysua`, `title`, `keywords`, `description`) VALUES
(9, 'Chính sách bảo mật', 'chinh-sach-bao-mat', '', '', '<p><strong>Ch&iacute;nh s&aacute;ch bảo mật</strong></p>\r\n\r\n<p><strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices&nbsp;</strong>đ&atilde; x&acirc;y dựng ứng dụng KhaService dưới dạng ứng dụng Miễn ph&iacute;. DỊCH VỤ n&agrave;y được cung cấp miễn ph&iacute; bởi&nbsp;<strong>C&ocirc;ng Ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội &ndash; KhaServices</strong>&nbsp;v&agrave; được thiết kế để sử dụng.<br />\r\nTrang n&agrave;y được sử dụng để th&ocirc;ng b&aacute;o cho kh&aacute;ch truy cập về c&aacute;c ch&iacute;nh s&aacute;ch của ch&uacute;ng t&ocirc;i với việc thu thập, sử dụng v&agrave; tiết lộ Th&ocirc;ng tin c&aacute; nh&acirc;n nếu bất kỳ ai quyết định sử dụng Dịch vụ của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p><br />\r\nNếu bạn chọn sử dụng Dịch vụ của ch&uacute;ng t&ocirc;i, th&igrave; bạn đồng &yacute; với việc thu thập v&agrave; sử dụng th&ocirc;ng tin li&ecirc;n quan đến ch&iacute;nh s&aacute;ch n&agrave;y. Th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; ch&uacute;ng t&ocirc;i thu thập được sử dụng để cung cấp v&agrave; cải thiện Dịch vụ. Ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng sử dụng hoặc chia sẻ th&ocirc;ng tin của bạn với bất kỳ ai trừ khi được m&ocirc; tả trong Ch&iacute;nh s&aacute;ch quyền ri&ecirc;ng tư n&agrave;y.</p>\r\n\r\n<p><br />\r\nC&aacute;c thuật ngữ được sử dụng trong Ch&iacute;nh s&aacute;ch quyền ri&ecirc;ng tư n&agrave;y c&oacute; c&ugrave;ng &yacute; nghĩa như trong Điều khoản v&agrave; Điều kiện của ch&uacute;ng t&ocirc;i, c&oacute; thể truy cập được tại KhaService trừ khi được quy định kh&aacute;c trong Ch&iacute;nh s&aacute;ch quyền ri&ecirc;ng tư n&agrave;y.</p>\r\n\r\n<p><br />\r\n<strong>Thu thập v&agrave; sử dụng th&ocirc;ng tin</strong><br />\r\nĐể c&oacute; trải nghiệm tốt hơn, trong khi sử dụng Dịch vụ của ch&uacute;ng t&ocirc;i, ch&uacute;ng t&ocirc;i c&oacute; thể y&ecirc;u cầu bạn cung cấp cho ch&uacute;ng t&ocirc;i một số th&ocirc;ng tin nhận dạng c&aacute; nh&acirc;n. Th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i y&ecirc;u cầu sẽ được ch&uacute;ng t&ocirc;i lưu giữ v&agrave; sử dụng như được m&ocirc; tả trong ch&iacute;nh s&aacute;ch bảo mật n&agrave;y.<br />\r\nỨng dụng sử dụng c&aacute;c dịch vụ của b&ecirc;n thứ ba c&oacute; thể thu thập th&ocirc;ng tin được sử dụng để nhận dạng bạn.<br />\r\nLi&ecirc;n kết với ch&iacute;nh s&aacute;ch quyền ri&ecirc;ng tư của nh&agrave; cung cấp dịch vụ b&ecirc;n thứ ba m&agrave; ứng dụng sử dụng</p>\r\n\r\n<p><br />\r\n<strong>* Dịch vụ Google Play</strong><br />\r\n<strong>Dữ liệu nhật k&yacute;</strong><br />\r\nCh&uacute;ng t&ocirc;i muốn th&ocirc;ng b&aacute;o cho bạn rằng bất cứ khi n&agrave;o bạn sử dụng Dịch vụ của ch&uacute;ng t&ocirc;i, trong trường hợp xảy ra lỗi trong ứng dụng, ch&uacute;ng t&ocirc;i sẽ thu thập dữ liệu v&agrave; th&ocirc;ng tin (th&ocirc;ng qua c&aacute;c sản phẩm của b&ecirc;n thứ ba) tr&ecirc;n điện thoại của bạn c&oacute; t&ecirc;n l&agrave; Dữ liệu nhật k&yacute;. Dữ liệu Nhật k&yacute; n&agrave;y c&oacute; thể bao gồm c&aacute;c th&ocirc;ng tin như địa chỉ Giao thức Internet (&ldquo;IP&rdquo;) tr&ecirc;n thiết bị của bạn, t&ecirc;n thiết bị, phi&ecirc;n bản hệ điều h&agrave;nh, cấu h&igrave;nh của ứng dụng khi sử dụng Dịch vụ của ch&uacute;ng t&ocirc;i, ng&agrave;y giờ bạn sử dụng Dịch vụ v&agrave; c&aacute;c số liệu thống k&ecirc; kh&aacute;c .</p>\r\n\r\n<p><br />\r\n<strong>Cookies</strong><br />\r\nCookie l&agrave; c&aacute;c tệp c&oacute; lượng dữ liệu nhỏ thường được sử dụng l&agrave;m số nhận dạng duy nhất ẩn danh. Ch&uacute;ng được gửi đến tr&igrave;nh duyệt của bạn từ c&aacute;c trang web m&agrave; bạn truy cập v&agrave; được lưu trữ tr&ecirc;n bộ nhớ trong của thiết bị.</p>\r\n\r\n<p><br />\r\nDịch vụ n&agrave;y kh&ocirc;ng sử dụng c&aacute;c &ldquo;cookie&rdquo; n&agrave;y một c&aacute;ch r&otilde; r&agrave;ng. Tuy nhi&ecirc;n, ứng dụng c&oacute; thể sử dụng m&atilde; của b&ecirc;n thứ ba v&agrave; c&aacute;c thư viện sử dụng &ldquo;cookie&rdquo; để thu thập th&ocirc;ng tin v&agrave; cải thiện dịch vụ của họ. Bạn c&oacute; t&ugrave;y chọn chấp nhận hoặc từ chối c&aacute;c cookie n&agrave;y v&agrave; biết khi n&agrave;o cookie được gửi đến thiết bị của bạn. Nếu bạn chọn từ chối cookie của ch&uacute;ng t&ocirc;i, bạn kh&ocirc;ng thể sử dụng một số phần của Dịch vụ n&agrave;y.</p>\r\n\r\n<p><br />\r\n<strong>C&aacute;c nh&agrave; cung cấp dịch vụ</strong><br />\r\nCh&uacute;ng t&ocirc;i c&oacute; thể thu&ecirc; c&aacute;c c&ocirc;ng ty v&agrave; c&aacute; nh&acirc;n b&ecirc;n thứ ba v&igrave; những l&yacute; do sau:<br />\r\n* Để tạo điều kiện thuận lợi cho Dịch vụ của ch&uacute;ng t&ocirc;i;<br />\r\n* Để cung cấp Dịch vụ thay mặt ch&uacute;ng t&ocirc;i;<br />\r\n* Để thực hiện c&aacute;c dịch vụ li&ecirc;n quan đến Dịch vụ;&nbsp;<br />\r\n* Để hỗ trợ ch&uacute;ng t&ocirc;i ph&acirc;n t&iacute;ch c&aacute;ch Dịch vụ của ch&uacute;ng t&ocirc;i được sử dụng.<br />\r\nCh&uacute;ng t&ocirc;i muốn th&ocirc;ng b&aacute;o cho người d&ugrave;ng Dịch vụ n&agrave;y rằng c&aacute;c b&ecirc;n thứ ba n&agrave;y c&oacute; quyền truy cập v&agrave;o Th&ocirc;ng tin c&aacute; nh&acirc;n của họ. L&yacute; do l&agrave; để thay mặt ch&uacute;ng t&ocirc;i thực hiện c&aacute;c nhiệm vụ được giao cho họ. Tuy nhi&ecirc;n, họ c&oacute; nghĩa vụ kh&ocirc;ng tiết lộ hoặc sử dụng th&ocirc;ng tin cho bất kỳ mục đ&iacute;ch n&agrave;o kh&aacute;c.</p>\r\n\r\n<p><br />\r\n<strong>Bảo vệ</strong><br />\r\nCh&uacute;ng t&ocirc;i đ&aacute;nh gi&aacute; cao sự tin tưởng của bạn trong việc cung cấp cho ch&uacute;ng t&ocirc;i Th&ocirc;ng tin c&aacute; nh&acirc;n của bạn, do đ&oacute; ch&uacute;ng t&ocirc;i đang cố gắng sử dụng c&aacute;c phương tiện được chấp nhận về mặt thương mại để bảo vệ th&ocirc;ng tin đ&oacute;. Nhưng h&atilde;y nhớ rằng kh&ocirc;ng c&oacute; phương thức truyền qua internet hoặc phương thức lưu trữ điện tử n&agrave;o an to&agrave;n v&agrave; đ&aacute;ng tin cậy 100% v&agrave; ch&uacute;ng t&ocirc;i kh&ocirc;ng thể đảm bảo t&iacute;nh bảo mật tuyệt đối của n&oacute;.</p>\r\n\r\n<p><br />\r\n<strong>Li&ecirc;n kết đến c&aacute;c trang web kh&aacute;c</strong><br />\r\nDịch vụ n&agrave;y c&oacute; thể chứa c&aacute;c li&ecirc;n kết đến c&aacute;c trang web kh&aacute;c. Nếu bạn nhấp v&agrave;o li&ecirc;n kết của b&ecirc;n thứ ba, bạn sẽ được chuyển hướng đến trang web đ&oacute;. Lưu &yacute; rằng c&aacute;c trang web b&ecirc;n ngo&agrave;i n&agrave;y kh&ocirc;ng được điều h&agrave;nh bởi ch&uacute;ng t&ocirc;i. Do đ&oacute;, ch&uacute;ng t&ocirc;i thực sự khuy&ecirc;n bạn n&ecirc;n xem lại Ch&iacute;nh s&aacute;ch quyền ri&ecirc;ng tư của c&aacute;c trang web n&agrave;y. Ch&uacute;ng t&ocirc;i kh&ocirc;ng kiểm so&aacute;t v&agrave; kh&ocirc;ng chịu tr&aacute;ch nhiệm về nội dung, ch&iacute;nh s&aacute;ch bảo mật hoặc th&ocirc;ng lệ của bất kỳ trang web hoặc dịch vụ của b&ecirc;n thứ ba n&agrave;o.</p>\r\n\r\n<p><br />\r\n<strong>Quyền ri&ecirc;ng tư của trẻ em</strong><br />\r\nC&aacute;c Dịch vụ n&agrave;y kh&ocirc;ng giải quyết bất kỳ ai dưới 13 tuổi. Ch&uacute;ng t&ocirc;i kh&ocirc;ng cố &yacute; thu thập th&ocirc;ng tin nhận dạng c&aacute; nh&acirc;n từ trẻ em dưới 13 tuổi. Trong trường hợp ch&uacute;ng t&ocirc;i ph&aacute;t hiện ra rằng một đứa trẻ dưới 13 tuổi đ&atilde; cung cấp cho ch&uacute;ng t&ocirc;i th&ocirc;ng tin c&aacute; nh&acirc;n, ch&uacute;ng t&ocirc;i sẽ ngay lập tức x&oacute;a th&ocirc;ng tin n&agrave;y khỏi m&aacute;y chủ của ch&uacute;ng t&ocirc;i. Nếu bạn l&agrave; cha mẹ hoặc người gi&aacute;m hộ v&agrave; bạn biết rằng con bạn đ&atilde; cung cấp cho ch&uacute;ng t&ocirc;i th&ocirc;ng tin c&aacute; nh&acirc;n, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i để ch&uacute;ng t&ocirc;i c&oacute; thể thực hiện c&aacute;c h&agrave;nh động cần thiết.</p>\r\n\r\n<p><br />\r\n<strong>Những thay đổi đối với Ch&iacute;nh s&aacute;ch quyền ri&ecirc;ng tư n&agrave;y</strong><br />\r\nThỉnh thoảng ch&uacute;ng t&ocirc;i c&oacute; thể cập nhật Ch&iacute;nh s&aacute;ch quyền ri&ecirc;ng tư của m&igrave;nh. V&igrave; vậy, bạn n&ecirc;n xem lại trang n&agrave;y định kỳ để biết bất kỳ thay đổi n&agrave;o. Ch&uacute;ng t&ocirc;i sẽ th&ocirc;ng b&aacute;o cho bạn về bất kỳ thay đổi n&agrave;o bằng c&aacute;ch đăng Ch&iacute;nh s&aacute;ch quyền ri&ecirc;ng tư mới tr&ecirc;n trang n&agrave;y.</p>\r\n\r\n<p><br />\r\nCh&iacute;nh s&aacute;ch n&agrave;y c&oacute; hiệu lực kể từ ng&agrave;y 22-05-2023</p>\r\n\r\n<p><br />\r\n<strong>Li&ecirc;n hệ ch&uacute;ng t&ocirc;i</strong><br />\r\nNếu bạn c&oacute; bất kỳ c&acirc;u hỏi hoặc đề xuất n&agrave;o về Ch&iacute;nh s&aacute;ch quyền ri&ecirc;ng tư của ch&uacute;ng t&ocirc;i, vui l&ograve;ng li&ecirc;n hệ với ch&uacute;ng t&ocirc;i tại&nbsp;<strong>cskh@khaservice.com.vn.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 8, 1, 0, 0, 1766831032, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_khuvuc`
--

CREATE TABLE `table_khuvuc` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `noidung_vi` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_khuvuc`
--

INSERT INTO `table_khuvuc` (`id`, `ten_vi`, `noidung_vi`, `type`, `stt`, `hienthi`, `ngaytao`, `ngaysua`) VALUES
(1, 'Quận 1 - Quận 3', 'Khu vực Quận 1', 'du-an', 1, 1, 1724037523, 1725851129),
(4, 'Quận 4 - Quận 8', 'Khu vực Quận 4', 'du-an', 2, 1, 1724041939, 1725851145),
(7, 'Quận 7', 'Khu vực Quận 7', 'du-an', 3, 1, 1724056951, 1724056951),
(9, 'Thành Phố Thủ Đức', 'Khu vực Thành Phố Thủ Đức', 'du-an', 4, 1, 1724056983, 1724056983),
(10, 'Bình Tân - Bình Chánh', 'Quận Bình Tân - Bình Chánh', 'du-an', 5, 1, 1724057008, 1725854010),
(11, 'Nhà Bè', 'Huyện Nhà Bè', 'du-an', 6, 1, 1724057017, 1725854018),
(12, 'Bình Dương', 'Khu vực Bình Dương', 'du-an', 7, 1, 1724057059, 1724057059);

-- --------------------------------------------------------

--
-- Table structure for table `table_news`
--

CREATE TABLE `table_news` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) DEFAULT 0,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `noidung_vi` longtext DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `noibat` tinyint(1) DEFAULT 0,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL,
  `luotxem` int(11) DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_news`
--

INSERT INTO `table_news` (`id`, `id_cat`, `ten_vi`, `ten_khong_dau`, `photo`, `thumb`, `mota_vi`, `noidung_vi`, `stt`, `hienthi`, `noibat`, `ngaytao`, `ngaysua`, `luotxem`, `title`, `keywords`, `description`) VALUES
(82, 4, 'ĐỜI SỐNG | BẢO VỆ SỨC KHỎE, HẠN CHẾ SỐC NHIỆT MÙA NẮNG NÓNG', 'doi-song-bao-ve-suc-khoe-han-che-soc-nhiet-mua-nang-nong', NULL, NULL, '<em>Trong những ng&agrave;y nắng n&oacute;ng gay gắt, người d&acirc;n cần hạn chế ra đường trong những khung giờ cao điểm, bổ sung đủ nước, kh&ocirc;ng chuyển m&ocirc;i trường đột ngột từ n&oacute;ng sang lạnh v&agrave; ngược lại...</em>', '<p><strong>Tr&aacute;nh để cơ thể hạ nhiệt đột ngột</strong></p>\r\n\r\n<p>B&aacute;c sĩ chuy&ecirc;n khoa 2 Huỳnh Tấn Vũ (Đơn vị Điều trị Ban ng&agrave;y, Bệnh viện Đại học Y Dược TP.HCM - Cơ sở 3) chia sẻ, nhiều người c&oacute; th&oacute;i quen khi đang ở ngo&agrave;i trời nắng n&oacute;ng th&igrave; bước v&agrave;o ph&ograve;ng c&oacute; m&aacute;y lạnh ngay hoặc ngược lại. Điều n&agrave;y l&agrave;m tăng nguy cơ sốc nhiệt bởi m&ocirc;i trường ở nhiệt độ cao cơ thể đổ nhiều mồ h&ocirc;i, c&aacute;c lỗ ch&acirc;n l&ocirc;ng tr&ecirc;n da mở ra rồi tiếp x&uacute;c m&ocirc;i trường ở nhiệt độ thấp nhanh sẽ dễ bị cảm lạnh.</p>\r\n\r\n<p>Ngo&agrave;i ra, n&ecirc;n hạn chế tắm ngay sau khi cơ thể đang đổ mồ h&ocirc;i nhiều, v&igrave; sẽ g&acirc;y ra triệu chứng cảm lạnh. Hạn chế điều chỉnh nhiệt độ m&aacute;y lạnh qu&aacute; thấp v&igrave; dễ g&acirc;y ra triệu chứng nghẹt mũi, vi&ecirc;m mũi họng, vi&ecirc;m mũi xoang.</p>\r\n\r\n<p><em>&quot;Đặc biệt, người lớn tuổi, người c&oacute; sức khỏe yếu dễ bị sốc nhiệt dẫn đến ngất xỉu, cho&aacute;ng v&aacute;ng... Do đ&oacute;, để bảo vệ sức khỏe trong m&ugrave;a nắng n&oacute;ng,&nbsp;</em><em>kh&ocirc;ng bị sốc nhiệt, khi ở ngo&agrave;i v&agrave;o ph&ograve;ng th&igrave; phải bật m&aacute;y điều h&ograve;a nhiệt độ lạnh từ từ hoặc ngồi nghỉ ngơi một khoảng thời gian ở chỗ m&aacute;t rồi v&agrave;o ph&ograve;ng lạnh&quot;, b&aacute;c sĩ Vũ khuyến c&aacute;o.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Uống nhiều nước, bổ sung tr&aacute;i c&acirc;y, rau quả</strong></p>\r\n\r\n<p>Ph&oacute; gi&aacute;o sư - tiến sĩ - b&aacute;c sĩ L&acirc;m Vĩnh Ni&ecirc;n, Trưởng Khoa Dinh dưỡng - Tiết chế, Bệnh viện Đại học Y Dược TP.HCM, cho biết trong thời tiết nắng n&oacute;ng như hiện nay, cần bổ sung nước lọc thường xuy&ecirc;n, ngay cả khi kh&ocirc;ng cảm thấy kh&aacute;t. Khi cơ thể kh&aacute;t tức đ&atilde; c&oacute; dấu hiệu mất nước g&acirc;y mệt mỏi, dễ g&acirc;y kiệt sức, sốc nhiệt khi ra ngo&agrave;i trời nắng n&oacute;ng, nếu cơ thể thiếu nước.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>C&aacute;c loại tr&aacute;i c&acirc;y bổ sung nước cho cơ thể trong những&nbsp;ng&agrave;y h&egrave;</em></p>\r\n\r\n<p><em>&quot;Ăn nhiều tr&aacute;i c&acirc;y, rau quả tươi m&aacute;t để bổ sung vitamin v&agrave; kho&aacute;ng chất cho cơ thể. Tr&aacute;nh uống nước ngọt c&oacute; ga, bia rượu v&igrave; c&oacute; thể khiến cơ thể mất nước nhiều hơn. Hạn chế uống nước đ&aacute;, v&igrave; khi uống nước lạnh sẽ tạo cảm gi&aacute;c đ&atilde; kh&aacute;t l&agrave;m hạn chế lượng nước ti&ecirc;u thụ cho cơ thể&quot;, b&aacute;c sĩ Ni&ecirc;n chia sẻ.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Hạn chế ra ngo&agrave;i trời nắng n&oacute;ng</strong></p>\r\n\r\n<p>Thạc sĩ - b&aacute;c sĩ chuy&ecirc;n khoa 2 L&ecirc; Nhật Vinh, Phụ tr&aacute;ch Khoa li&ecirc;n chuy&ecirc;n khoa Mắt - Tai Mũi Họng - Răng H&agrave;m Mặt - Da Liễu, Bệnh viện đa khoa quốc tế Nam S&agrave;i G&ograve;n, cho biết cần tr&aacute;nh ra ngo&agrave;i trời nắng gắt trong khoảng thời gian từ 10 giờ s&aacute;ng đến 4 giờ chiều. Nếu cần thiết phải ra ngo&agrave;i, h&atilde;y mặc quần &aacute;o s&aacute;ng m&agrave;u, rộng r&atilde;i, đội mũ rộng v&agrave;nh, đeo k&iacute;nh r&acirc;m, sử dụng kem chống nắng c&oacute; chỉ số SPF từ 30 trở l&ecirc;n. N&ecirc;n d&ugrave;ng kem chống nắng cho người lớn v&agrave; cho trẻ em khi ra đường, nhất l&agrave; c&aacute;c thời điểm nắng n&oacute;ng gay gắt.</p>\r\n\r\n<p>B&aacute;c sĩ Vinh cho biết cần nhận biết những dấu hiệu say nắng để c&oacute; thể hỗ trợ người th&acirc;n như: sốt cao, da kh&ocirc; n&oacute;ng, nhức đầu dữ dội, buồn n&ocirc;n, n&ocirc;n mửa, mất phương hướng, h&ocirc;n m&ecirc;&hellip; Nặng hơn c&oacute; thể ngất xỉu, mất &yacute; thức, co giật.</p>\r\n\r\n<p><em>&quot;Khi gặp những dấu hiệu tr&ecirc;n, h&atilde;y đưa người th&acirc;n của m&igrave;nh v&agrave;o khu vực m&aacute;t mẻ hoặc đưa tới c&aacute;c cơ sở y tế nếu t&igrave;nh trạng nặng hơn để được hỗ trợ kịp thời&quot;, b&aacute;c sĩ Vinh cho hay.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Giữ nh&agrave; cửa tho&aacute;ng m&aacute;t</strong></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, b&aacute;c sĩ Nhật Vinh chia sẻ khi ở nh&agrave; trong thời tiết nắng n&oacute;ng, cần giữ nh&agrave; cửa tho&aacute;ng m&aacute;t, mở cửa sổ, cửa ra v&agrave;o để tạo sự th&ocirc;ng tho&aacute;ng cho nh&agrave; cửa. Sử dụng quạt, m&aacute;y lạnh đ&uacute;ng c&aacute;ch để điều h&ograve;a nhiệt độ trong nh&agrave;. Tr&aacute;nh sử dụng c&aacute;c thiết bị điện tử sinh nhiệt qu&aacute; nhiều.</p>\r\n\r\n<p>Đối với trẻ em, cần ch&uacute; &yacute; kh&ocirc;ng cho trẻ em ra ngo&agrave;i trời nắng n&oacute;ng qu&aacute; l&acirc;u. Cho trẻ em mặc quần &aacute;o tho&aacute;ng m&aacute;t, đội mũ rộng v&agrave;nh, đeo k&iacute;nh r&acirc;m khi ra ngo&agrave;i. Bổ sung đầy đủ nước cho trẻ em. Quan s&aacute;t trẻ em thường xuy&ecirc;n để ph&aacute;t hiện c&aacute;c dấu hiệu bất thường như sốt, n&ocirc;n mửa, ti&ecirc;u chảy.</p>\r\n\r\n<p>Nguồn: thanhnien.vn</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;&nbsp;&nbsp;KhaService&nbsp;với ti&ecirc;u ch&iacute; lu&ocirc;n lu&ocirc;n mang đến sự h&agrave;i l&ograve;ng tuyệt đối về chất lượng dịch vụ cũng như chất lượng sản phẩm. Bạn cần tư vấn&nbsp;dịch vụ&nbsp;vệ sinh bảo tr&igrave; m&aacute;y lạnh,&nbsp;thi c&ocirc;ng lắp đặt điện, h&atilde;y li&ecirc;n hệ ngay với&nbsp;ch&uacute;ng t&ocirc;i qua hotline:&nbsp;<a href=\"tel:0918 754 277\">0918 754 277</a>&nbsp;hoặc Zalo:&nbsp;<a href=\"http://zaloapp.com/qr/p/p8bds4dak1ib\" target=\"_blank\">0918 754 277</a>&nbsp;để được hỗ trợ nhanh ch&oacute;ng nhất.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><em>Theo d&otilde;i Fanpage Facebook Dịch vụ vệ sinh, bảo tr&igrave; m&aacute;y lạnh để kh&ocirc;ng bỏ lỡ&nbsp;bất kỳ&nbsp;chương tr&igrave;nh khuyến m&atilde;i hấp dẫn n&agrave;o bạn nh&eacute;!</em></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>H&acirc;n hạnh phục vụ Qu&yacute; kh&aacute;ch!</em></p>\r\n', 1, 1, 0, 1746356400, 1766834105, 0, '', '', ''),
(80, 1, 'SẮC MÀU KHASERVICE – 15 NĂM VỮNG RỄ, VƯƠN XA', 'sac-mau-khaservice-15-nam-vung-re-vuon-xa', 'upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/image.jfif', NULL, 'Ng&agrave;y 10/08/2025, to&agrave;n thể đại gia đ&igrave;nh KhaService đ&atilde; c&ugrave;ng nhau đặt ch&acirc;n đến biển Hương Phong &ndash; Hồ Cốc để trải qua một ng&agrave;y thật đặc biệt &ndash; Ng&agrave;y hội Team Building hoạt động ch&agrave;o mừng 15 năm th&agrave;nh lập c&ocirc;ng ty.', '<p style=\"text-align:justify\">Giữa bầu trời xanh, nắng v&agrave;ng v&agrave; gi&oacute; biển m&aacute;t rượi, sắc &aacute;o rực rỡ của ch&uacute;ng ta h&ograve;a quyện th&agrave;nh một bức tranh sống động, đ&uacute;ng với tinh thần chủ đề &ldquo;Sắc m&agrave;u KhaService&rdquo; &ndash; nơi mỗi c&aacute; nh&acirc;n l&agrave; một gam m&agrave;u ri&ecirc;ng, khi kết hợp lại tạo n&ecirc;n một bức tranh th&agrave;nh c&ocirc;ng trọn vẹn.</p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Bước nhảy đồng nhất &ndash; khi mọi người c&ugrave;ng h&ograve;a chung nhịp tim v&agrave; chuyển động.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"../upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/530937113_734340522752566_5772727302511567956_n.jpg\" style=\"height:auto; width:860px\" /></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Chung sức đồng l&ograve;ng &ndash; thử th&aacute;ch để sức mạnh tập thể được ph&aacute;t huy tối đa.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"../upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/532413061_734342092752409_2298753872593968579_n.jpg\" style=\"height:auto; width:860px\" /></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\">Đập heo đất &ndash; tiếng cười vang gi&ograve;n tan, x&oacute;a tan mọi khoảng c&aacute;ch</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"../upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/533178840_734342499419035_651739945623877670_n.jpg\" style=\"height:auto; width:860px\" /></p>\r\n\r\n<p style=\"text-align:justify\">Kh&ocirc;ng chỉ l&agrave; tr&ograve; chơi, đ&oacute; c&ograve;n l&agrave; nụ cười, tiếng cổ vũ, &aacute;nh mắt sẻ chia &ndash; những khoảnh khắc sẽ c&ograve;n đọng m&atilde;i trong k&yacute; ức của mỗi người.<br />\r\nH&atilde;y c&ugrave;ng xem lại những h&igrave;nh ảnh n&agrave;y để cảm nhận sự gắn kết, tinh thần đồng đội v&agrave; t&igrave;nh cảm ch&acirc;n th&agrave;nh của từng th&agrave;nh vi&ecirc;n đại gia đ&igrave;nh KhaService.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"../upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/531615495_734342616085690_5567097227774552960_n.jpg\" style=\"width:420px\" />&nbsp;<img alt=\"\" src=\"../upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/531808287_734341752752443_1449549222581900193_n.jpg\" style=\"width:420px\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"../upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/530212306_734342909418994_7070757674531827397_n.jpg\" style=\"height:236px; width:420px\" />&nbsp;<img alt=\"\" src=\"../upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/531079122_734342816085670_6350618910692836860_n.jpg\" style=\"height:236px; width:420px\" /></p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"../upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/530838595_734342766085675_1467953207434610767_n.jpg\" style=\"height:236px; width:420px\" />&nbsp;<img alt=\"\" src=\"../upload/news/sac-mau-khaservice-15-nam-vung-re-vuon-xa/530567743_734342762752342_4776777832716957615_n.jpg\" style=\"height:236px; width:420px\" /></p>\r\n\r\n<hr />\r\n<p style=\"text-align:justify\"><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p style=\"text-align:justify\"><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p style=\"text-align:justify\"><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p style=\"text-align:justify\"><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p style=\"text-align:justify\"><em>H&acirc;n hạnh phục vụ Qu&yacute; kh&aacute;ch!</em></p>\r\n', 1, 1, 0, 1755104400, 1766848652, 28, '', '', ''),
(81, 4, 'ĐỜI SỐNG | HỆ THỐNG CỬA HÀNG GIẶT ỦI KHASERVICE QUẬN 4 VÀ TP. THỦ ĐỨC', 'doi-song-he-thong-cua-hang-giat-ui-khaservice-quan-4-va-tp-thu-duc', NULL, NULL, '<em><strong>Hệ Thống Cửa H&agrave;ng Giặt Ủi KhaService</strong>&nbsp;đem đến cho bạn sự h&agrave;i l&ograve;ng với kinh nghiệm l&agrave;m sạch, vệ sinh hiệu quả tr&ecirc;n hầu hết tất cả m&oacute;n đồ, vật dụng bằng vải trong cuộc sống hằng ng&agrave;y. Gi&uacute;p bạn c&oacute; một cuộc sống l&agrave;nh mạnh v&agrave; hạnh ph&uacute;c hơn.</em>', '<p>Giặt Ủi KhaService với hơn 10 năm kinh nghiệm lu&ocirc;n l&agrave;m kh&aacute;ch h&agrave;ng h&agrave;i l&ograve;ng khi sử dụng dịch vụ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Hệ thống Cửa H&agrave;ng Giặt Ủi KhaService c&oacute; 2 cửa h&agrave;ng tại Quận 4 v&agrave; Tp. Thủ Đức.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>▶️<strong>&nbsp;Ch&uacute;ng t&ocirc;i thấu hiểu bạn đang cần t&igrave;m một dịch vụ giặt ủi uy t&iacute;n, tin cậy v&agrave; chuy&ecirc;n nghiệp.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Đội ngũ nh&acirc;n vi&ecirc;n chuy&ecirc;n nghiệp, gi&agrave;u kinh nghiệm trong ng&agrave;nh giặt ủi.</em></p>\r\n\r\n<p><strong>Hệ Thống Cửa H&agrave;ng Giặt Ủi KhaService&nbsp;</strong>c&oacute;&nbsp;thể giặt những đồ&nbsp;<strong>th&ocirc;ng thường nhất</strong>&nbsp;(như quần &aacute;o h&agrave;ng ng&agrave;y) đến&nbsp;<strong>phức tạp nhất</strong>&nbsp;(như thảm lớn, r&egrave;m, sofa,...) hay đồ c&oacute;&nbsp;<strong>số lượng &iacute;t</strong>&nbsp;đến&nbsp;<strong>số lượng nhiều</strong>&nbsp;(như khăn b&agrave;n, drap,... tại Nh&agrave; h&agrave;ng, Kh&aacute;ch sạn, Spa,...)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>▶️<strong>&nbsp;Ch&uacute;ng t&ocirc;i cam kết chất lượng dịch vụ lu&ocirc;n được đảm bảo với gi&aacute; cả hợp l&yacute; v&agrave; tương xứng.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Chi ph&iacute; hợp l&yacute; c&ugrave;ng với sự chất lượng lu&ocirc;n được đảm bảo.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><u><a href=\"https://khaservice.com.vn/linh-vuc-hoat-dong/bang-gia-dich-vu-giat-ui.html\" target=\"_blank\"><em><strong>THAM KHẢO BẢNG GI&Aacute; GIẶT ỦI KHASERVICE</strong></em></a></u></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>▶️<strong>&nbsp;Giặt Ủi&nbsp;KhaService cung cấp dịch vụ giao nhận h&agrave;ng tận nơi</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Giao h&agrave;ng nhanh ch&oacute;ng - Tiết kiệm thời gian.</em></p>\r\n\r\n<p><strong>Giặt Ủi&nbsp;KhaService</strong>&nbsp;cung cấp dịch vụ giao nhận h&agrave;ng tận nơi, sẵn s&agrave;ng cố gắng đ&uacute;ng hẹn v&agrave; nhanh nhất c&oacute; thể&nbsp;để gi&uacute;p bạn tiết kiệm thời gian cũng như thuận tiện hơn&nbsp;cho bạn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>HIỆN HỆ THỐNG C&Oacute; 2 CỬA H&Agrave;NG:</strong></p>\r\n\r\n<p><strong>Cửa h&agrave;ng 1:&nbsp;B&atilde;i xe 360 Bến V&acirc;n Đồn, Phường 1, Quận&nbsp;4 (Sau lưng Chung cư The Gold View Quận 4)</strong></p>\r\n\r\n<p><strong>Cửa h&agrave;ng 2:&nbsp;Chung cư R7, Phường An Kh&aacute;nh, TP. Thủ Đức (Đối diện Trường THPT Chuy&ecirc;n Trần Đại Nghĩa - Cơ sở 2)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Hệ Thống Giặt Ủi KhaService - Nơi Tin Cậy Cho Mọi Gia Đ&igrave;nh.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;&nbsp;&nbsp;KhaService&nbsp;với ti&ecirc;u ch&iacute; lu&ocirc;n lu&ocirc;n mang đến sự h&agrave;i l&ograve;ng tuyệt đối về chất lượng dịch vụ cũng như chất lượng sản phẩm. Bạn cần tư vấn&nbsp;dịch vụ&nbsp;vệ sinh, giặt ủi, h&atilde;y li&ecirc;n hệ ngay với&nbsp;ch&uacute;ng t&ocirc;i qua hotline:&nbsp;<a href=\"tel:0918 754 277\">0918 754 277</a>&nbsp;hoặc Zalo:&nbsp;<a href=\"http://zaloapp.com/qr/p/p8bds4dak1ib\" target=\"_blank\">0918 754 277</a>&nbsp;để được hỗ trợ nhanh ch&oacute;ng nhất.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><em>Theo d&otilde;i Fanpage Facebook Dịch vụ KhaService - Fast 24h&nbsp;để kh&ocirc;ng bỏ lỡ&nbsp;bất kỳ&nbsp;chương tr&igrave;nh khuyến m&atilde;i hấp dẫn n&agrave;o bạn nh&eacute;!</em></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><em>H&acirc;n hạnh phục vụ Qu&yacute; kh&aacute;ch!</em></p>\r\n', 1, 1, 0, 1748170800, 1766834124, 4, '', '', ''),
(83, 4, 'ĐỜI SỐNG | MÁY LẠNH SỬ DỤNG ĐẾN KHI NÀO THÌ CẦN BƠM GAS?', 'doi-song-may-lanh-su-dung-den-khi-nao-thi-can-bom-gas', NULL, NULL, '<em>Đ&acirc;y l&agrave; một trong nhiều c&acirc;u hỏi được đặt ra bởi người sử dụng m&aacute;y lạnh.&nbsp;<strong>KhaService</strong>&nbsp;sẽ giải đ&aacute;p thắc mắc của bạn qua b&agrave;i viết n&agrave;y</em>', '<p>▶️&nbsp;<strong>THỜI GIAN HẾT GAS M&Aacute;Y LẠNH KH&Aacute; L&Acirc;U</strong><br />\r\nTh&ocirc;ng thường, khi được lắp đ&uacute;ng kỹ thuật v&agrave; kh&ocirc;ng gặp sự cố trong qu&aacute; tr&igrave;nh sử dụng th&igrave; gas m&aacute;y lạnh kh&ocirc;ng thể thất tho&aacute;t được m&agrave; sẽ tuần ho&agrave;n l&agrave;m lạnh. N&ecirc;n thời gian m&aacute;y lạnh hết gas l&agrave; kh&aacute; l&acirc;u,&nbsp;<strong>khoảng 10 &ndash; 20 năm</strong>.<br />\r\n&nbsp;</p>\r\n\r\n<p>▶️&nbsp;<strong>NGUY&Ecirc;N NH&Acirc;N PHỔ BIẾN</strong><br />\r\nGas chỉ thất tho&aacute;t hoặc bị thiếu trong những trường hợp như lắp đặt sai c&aacute;ch, lắp đặt ban đầu m&aacute;y thiếu gas m&agrave; kh&ocirc;ng kiểm tra xem &aacute;p suất vận h&agrave;nh, c&aacute;c đầu nối kh&ocirc;ng đảm bảo k&iacute;n ho&agrave;n to&agrave;n n&ecirc;n bị r&ograve; rỉ ra b&ecirc;n ngo&agrave;i.<br />\r\n&nbsp;</p>\r\n\r\n<p>▶️&nbsp;<strong>LƯU &Yacute; C&Aacute;C NGUY&Ecirc;N NH&Acirc;N KH&Aacute;C</strong><br />\r\nMột nguy&ecirc;n nh&acirc;n kh&aacute;c dẫn đến m&aacute;y lạnh nhanh hết gas đ&oacute; l&agrave; chất lượng ống dẫn gas qu&aacute; k&eacute;m, ống bị x&igrave;. So với ống nh&ocirc;m, ống đồng bền hơn, giảm r&ograve; rỉ kh&iacute; gas trong qu&aacute; tr&igrave;nh lưu chuyển.</p>\r\n\r\n<p><br />\r\nViệc kiểm tra m&aacute;y lạnh định cũng gi&uacute;p ph&aacute;t hiện kịp thời t&igrave;nh trạng m&aacute;y gặp phải.<br />\r\nV&igrave; vậy nếu bạn gặp bất kỳ trường hợp m&aacute;y lạnh hết gas hay kh&ocirc;ng hiểu v&igrave; sao m&aacute;y lạnh bật nhưng kh&ocirc;ng m&aacute;t th&igrave; h&atilde;y li&ecirc;n hệ ngay hotline KhaServices.&nbsp;<br />\r\n<br />\r\nĐể đặt lịch dịch vụ vui l&ograve;ng li&ecirc;n hệ hotline hoặc&nbsp;<a href=\"https://m.me/khaservicesf24?fbclid=IwAR0UJTxt9ZVSMU_Fpo3l_qGoHxgbV8-SDeVAXAzuFfXPiLT86smizuajE3s\" rel=\"nofollow noreferrer\" tabindex=\"0\" target=\"_blank\">m.me/khaservicesf24</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellpadding=\"5\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;&nbsp;<strong>&nbsp;KhaServices</strong>&nbsp;với ti&ecirc;u ch&iacute; lu&ocirc;n lu&ocirc;n mang đến sự h&agrave;i l&ograve;ng tuyệt đối về chất lượng dịch vụ cũng như chất lượng sản phẩm. Bạn cần tư vấn&nbsp;dịch vụ&nbsp;vệ sinh bảo tr&igrave; m&aacute;y lạnh,&nbsp;thi c&ocirc;ng lắp đặt điện, h&atilde;y li&ecirc;n hệ ngay với&nbsp;ch&uacute;ng t&ocirc;i qua hotline:&nbsp;<a href=\"tel:0918 754 277\">0918 754 277</a>&nbsp;hoặc Zalo:&nbsp;<a href=\"http://zaloapp.com/qr/p/p8bds4dak1ib\" target=\"_blank\">0918 754 277</a>&nbsp;để được hỗ trợ nhanh ch&oacute;ng nhất.</p>\r\n\r\n			<p>&nbsp;</p>\r\n\r\n			<p><em>Theo d&otilde;i Fanpage Facebook Dịch vụ vệ sinh, bảo tr&igrave; m&aacute;y lạnh để kh&ocirc;ng bỏ lỡ&nbsp;bất kỳ&nbsp;chương tr&igrave;nh khuyến m&atilde;i hấp dẫn n&agrave;o bạn nh&eacute;!</em></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p><em>C&Ocirc;NG TY CỔ PHẦN QUẢN L&Yacute; V&Agrave; VẬN H&Agrave;NH CAO ỐC KH&Aacute;NH HỘI</em></p>\r\n\r\n<p><em>Trụ sở: Tầng 1, Khu Thương Mại, 360C Bến V&acirc;n Đồn, Phường 1, Quận 4, TP. HCM</em></p>\r\n\r\n<p><em>Điện thoại: (028) 38253041</em></p>\r\n\r\n<p><em>Hotline:&nbsp;<a href=\"tel:0918754277\">0918 754 277</a></em></p>\r\n\r\n<p><strong><em>H&acirc;n hạnh phục vụ Qu&yacute; kh&aacute;ch!</em></strong></p>\r\n', 1, 1, 0, 1740589200, 1766834114, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_newsletter`
--

CREATE TABLE `table_newsletter` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ngaytao` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_news_cat`
--

CREATE TABLE `table_news_cat` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_news_cat`
--

INSERT INTO `table_news_cat` (`id`, `ten_vi`, `ten_khong_dau`, `type`, `stt`, `hienthi`) VALUES
(1, 'Tin công ty', 'tin-cong-ty', 'tin-tuc', 1, 1),
(2, 'Tin trong ngành', 'tin-trong-nganh', 'tin-tuc', 2, 1),
(3, 'Kiến thức phong thủy', 'kien-thuc-phong-thuy', 'tin-tuc', 3, 1),
(4, 'Kiến thức đời sống', 'kien-thuc-doi-song', 'tin-tuc', 4, 1),
(7, 'TẾT TRUNG THU, VUI ĐOÀN TỤ 2023', NULL, 'thuvien-anh', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_news_temp`
--

CREATE TABLE `table_news_temp` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) DEFAULT 0,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `noidung_vi` longtext DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `chucvu` varchar(100) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `noibat` tinyint(1) DEFAULT 0,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL,
  `luotxem` int(11) DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_photo`
--

CREATE TABLE `table_photo` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `ngaytao` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_photo`
--

INSERT INTO `table_photo` (`id`, `ten_vi`, `link`, `photo`, `thumb`, `mota_vi`, `type`, `stt`, `hienthi`, `ngaytao`) VALUES
(1, 'Hưng Lộc Phát', '', 'upload/doi-tac/844282.jpg', '', '', 'doi-tac', 3, 1, 0),
(2, 'Thủ Đức House', '', 'upload/doi-tac/003724.jpg', '', '', 'doi-tac', 1, 1, 0),
(3, 'Bến Thành Group', '', 'upload/doi-tac/884295382631.PNG', '', '', 'doi-tac', 2, 1, 0),
(4, '', '', 'upload/banner/851790.jpg', NULL, '', 'banner-gioithieu', 0, 0, 1766735380),
(5, '', '', 'upload/banner/009909 (1).jpg', NULL, '', 'banner-gioithieu', 1, 0, 1766735651),
(6, '', '', 'upload/banner/415722.jpg', NULL, '', 'banner-gioithieu', 1, 0, 1766735666),
(7, '', '', 'upload/banner/753563.jpg', NULL, '', 'banner-gioithieu', 1, 1, 1766735672),
(8, '', '', 'upload/banner/993244.jpg', NULL, '', 'banner-gioithieu', 1, 0, 1766735681),
(9, '', '', 'upload/banner/009909 (1).jpg', NULL, '', 'banner-linhvuc', 1, 1, 1766735758),
(10, '', '', 'upload/banner/212006.png', NULL, '', 'banner-linhvuc', 1, 0, 1766735763),
(11, '', '', 'upload/banner/368144.jpg', NULL, '', 'banner-linhvuc', 1, 0, 1766735766),
(12, '', '', 'upload/banner/009909 (1).jpg', NULL, '', 'banner-duan', 1, 1, 1766735785),
(13, '', '', 'upload/banner/993244.jpg', NULL, '', 'banner-tintuc', 1, 1, 1766735792),
(14, '', '', 'upload/banner/851790.jpg', NULL, '', 'banner-tuyendung', 1, 1, 1766735803),
(15, '', '', 'upload/banner/368144.jpg', NULL, '', 'banner-lienhe', 1, 1, 1766735811),
(16, '', '', 'upload/banner/851790.jpg', NULL, '', 'inner-banner', 1, 1, 1766735817),
(17, '', '', 'upload/slideshow/103196539800947.png', NULL, '', 'slideshow', 0, 1, 1766736633),
(18, '', '', 'upload/slideshow/610464135305783.png', NULL, '', 'slideshow', 0, 1, 1766736639),
(19, '', '', 'upload/slideshow/738536712693882.png', NULL, '', 'slideshow', 0, 1, 1766736646);

-- --------------------------------------------------------

--
-- Table structure for table `table_setting`
--

CREATE TABLE `table_setting` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `diachi_vi` varchar(255) DEFAULT NULL,
  `dienthoai` varchar(50) DEFAULT NULL,
  `hotline` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `fanpage` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `google_map` text DEFAULT NULL,
  `video_intro` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logoRectangle` varchar(255) DEFAULT NULL,
  `longName` varchar(255) DEFAULT NULL,
  `nationalName` varchar(255) DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `taxCode` varchar(50) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `youtubeInfo` varchar(255) DEFAULT NULL,
  `updated_at` varchar(200) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `hotline2` varchar(255) DEFAULT NULL,
  `link_phanmem` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `link_gioithieu_app` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_setting`
--

INSERT INTO `table_setting` (`id`, `ten_vi`, `diachi_vi`, `dienthoai`, `hotline`, `email`, `website`, `fanpage`, `youtube`, `google_map`, `video_intro`, `title`, `keywords`, `description`, `logo`, `logoRectangle`, `longName`, `nationalName`, `shortName`, `taxCode`, `tiktok`, `youtubeInfo`, `updated_at`, `email2`, `hotline2`, `link_phanmem`, `link_gioithieu_app`) VALUES
(1, 'CÔNG TY CỔ PHẦN QUẢN LÝ VÀ VẬN HÀNH CAO ỐC KHÁNH HỘI', 'Tầng 1, Khu Thương Mại, 360C Bến Vân Đồn, Phường 01, Quận 4, Thành phố Hồ Chí Minh, Việt Nam', '0918 754 277', '(028) 38 253 041', 'info@khaservice.com.vn', 'https://www.facebook.com/khaservice.official', 'https://www.facebook.com/khaservice.official', 'https://www.youtube.com/@khaservice', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.74182774098!2d106.68799657480454!3d10.75436968939307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f0fc935b50d%3A0x9d94fe957e188526!2zQ8OUTkcgVFkgQ-G7lCBQSOG6pk4gUVXhuqJOIEzDnSBWw4AgVuG6rE4gSMOATkggQ0FPIOG7kEMgS0jDgU5IIEjhu5hJ!5e0!3m2!1svi!2s!4v1723194614330!5m2!1svi!2s\" width=\"100%\" height=\"auto\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://www.youtube.com/watch?v=BwUaGq-nQ9Q', '', '', '', 'upload/caidat/1766653942_596.png', 'upload/caidat/1766653960_595.png', 'CÔNG TY CỔ PHẦN QUẢN LÝ VÀ VẬN HÀNH CAO ỐC KHÁNH HỘI', 'KHANH HOI BUILDING AND MANANGEMENT JOINT STOCK COMPANY', 'KHASERVICE', '0310341786', 'https://www.tiktok.com/@khaservice.official', 'https://www.youtube.com/watch?v=BwUaGq-nQ9Q', '', 'thanhhuyen@khaservice.com.vn', '0987 374 237', 'https://qlvh.khaservice.com.vn/login', 'http://localhost/khaservi_khaserv/gioi-thieu/ung-dung-danh-cho-cu-dan.html');

-- --------------------------------------------------------

--
-- Table structure for table `table_staff`
--

CREATE TABLE `table_staff` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `chucvu` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `noidung_vi` longtext DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_staff`
--

INSERT INTO `table_staff` (`id`, `ten_vi`, `ten_khong_dau`, `chucvu`, `mota_vi`, `noidung_vi`, `photo`, `stt`, `hienthi`, `ngaytao`, `ngaysua`, `title`, `keywords`, `description`) VALUES
(1, 'Lê Vũ Kiệt', NULL, 'Trưởng Phòng Kinh Doanh', NULL, NULL, 'storage/images/team/levukiet.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL),
(2, 'Bùi Thanh Phúc', 'bui-thanh-phuc', 'Trưởng Ban', NULL, NULL, 'upload/nhanvien/image (3).jpg', 2, 1, NULL, 1766720730, NULL, NULL, NULL),
(3, 'Nguyễn Thị Lê Truyền', NULL, 'Trưởng Ban', NULL, NULL, 'storage/images/team/nguyenthiletruyen.jpg', 3, 0, NULL, NULL, NULL, NULL, NULL),
(4, 'Nguyễn Tiến Quang', NULL, 'Trưởng Phòng Kế Toán', NULL, NULL, 'storage/images/team/nguyentienquang.jpg', 4, 0, NULL, NULL, NULL, NULL, NULL),
(5, 'Vương Đình Hoàng', 'vuong-dinh-hoang', 'Phó Tổng Giám Đốc', NULL, NULL, 'upload/nhanvien/image (2).jpg', 5, 1, NULL, 1766721219, NULL, NULL, NULL),
(6, 'Vũ Xuân Diệu', 'vu-xuan-dieu', 'Phó Tổng Giám Đốc', NULL, NULL, 'upload/nhanvien/image.jpg', 6, 1, NULL, 1766721209, NULL, NULL, NULL),
(7, 'Dương Ngọc Thanh', 'duong-ngoc-thanh', 'Trưởng Ban', NULL, NULL, 'upload/nhanvien/image (4).jpg', 1, 1, 1766721253, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_static`
--

CREATE TABLE `table_static` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `noidung_vi` longtext DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `sl_nhanvien` int(11) DEFAULT 0,
  `sl_duan` int(11) DEFAULT 0,
  `sl_canho` int(11) DEFAULT 0,
  `tamnhin` text DEFAULT NULL,
  `sumenh` text DEFAULT NULL,
  `sl_khachhang` int(11) DEFAULT 0,
  `sl_giaithuong` int(11) DEFAULT 0,
  `sl_doitac` int(11) DEFAULT 0,
  `mota_solieu` text DEFAULT NULL,
  `mota_doitac` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_static`
--

INSERT INTO `table_static` (`id`, `ten_vi`, `photo`, `video`, `mota_vi`, `noidung_vi`, `type`, `sl_nhanvien`, `sl_duan`, `sl_canho`, `tamnhin`, `sumenh`, `sl_khachhang`, `sl_giaithuong`, `sl_doitac`, `mota_solieu`, `mota_doitac`) VALUES
(1, 'Câu chuyện thành công', 'upload/vechungtoi/87088154.png', 'https://www.youtube.com/watch?v=BwUaGq-nQ9Q&themeRefresh=1', '', '<p>Được th&agrave;nh lập ng&agrave;y 06 th&aacute;ng 09 năm 2010, C&ocirc;ng ty TNHH MTV Dịch Vụ Quản L&yacute; Cao Ốc Kh&aacute;nh Hội - KHASERVICE được th&agrave;nh lập với 100% vốn chủ sở hữu của c&ocirc;ng ty Cổ Phần Đầu Tư v&agrave; Dịch Vụ Kh&aacute;nh Hội - KHAHOMEX hoạt động trong lĩnh vực: Quản l&yacute; vận h&agrave;nh cao ốc c&ugrave;ng với những dịch vụ kh&aacute;c như giữ xe thẻ th&ocirc;ng minh, dịch vụ bảo tr&igrave; sửa chữa điện, nước, điện lạnh, vệ sinh, giặt ủi...</p>\r\n\r\n<p>V&agrave;o đầu th&aacute;ng 01/2018, C&ocirc;ng ty đ&atilde; đổi t&ecirc;n th&agrave;nh&nbsp;C&ocirc;ng ty Cổ Phần Quản L&yacute; V&agrave; Vận H&agrave;nh Cao Ốc Kh&aacute;nh Hội - KhaServices.&nbsp;KhaServices đ&atilde; v&agrave; đang&nbsp;lớn mạnh,&nbsp;ph&aacute;t triển kh&ocirc;ng ngừng, sẽ lu&ocirc;n đồng h&agrave;nh c&ugrave;ng Qu&yacute; kh&aacute;ch h&agrave;ng v&agrave; tạo n&ecirc;n những dịch vụ tốt nhất, chất lượng nhất.</p>\r\n', 've-chung-toi', 800, 37, 10000, '<p>Trở th&agrave;nh một doanh nghiệp dịch vụ Bất động sản vững mạnh,&nbsp;kh&ocirc;ng ngừng ph&aacute;t triển về chất lượng&nbsp;v&agrave; chuy&ecirc;n nghiệp.</p>\r\n', '<p>C&ugrave;ng với sức trẻ, t&acirc;m huyết, sự năng động v&agrave; s&aacute;ng tạo KhaServices&nbsp;sẽ gi&uacute;p c&aacute;c kh&aacute;ch h&agrave;ng lựa chọn được những dịch vụ ph&ugrave; hợp với nhu cầu v&agrave; triển khai quản l&yacute; điều h&agrave;nh với phương thức chuy&ecirc;n nghiệp nhất, mang đến hiệu quả v&agrave; chất lượng cao nhất.</p>\r\n\r\n<p><strong><em>&quot;Dịch vụ tốt nhất, tiện lợi nhất v&agrave; mang đến sự h&agrave;i l&ograve;ng nhất cho Kh&aacute;ch h&agrave;ng&quot;.</em></strong></p>\r\n', 1000, 20, 50, '<h1><span style=\"color:#1abc9c\"><strong>Hơn 10 Năm</strong>&nbsp;</span><span style=\"color:#dddddd\">kinh nghiệm</span></h1>\r\n\r\n<h1><span style=\"color:#dddddd\">trong lĩnh vực&nbsp;</span></h1>\r\n\r\n<h1><span style=\"color:#1abc9c\"><strong>Quản l&yacute; vận h&agrave;nh chung cư</strong></span></h1>\r\n', '<h1>Hơn 50+ đối t&aacute;c tin tưởng ch&uacute;ng t&ocirc;i</h1>\r\n\r\n<p style=\"text-align:justify\">Trong thời gian ngắn, hơn h&agrave;ng trăm đối t&aacute;c kh&aacute;ch h&agrave;ng đ&atilde; tin tưởng ch&uacute;ng t&ocirc;i nỗ lực hết m&igrave;nh đồng h&agrave;nh c&ugrave;ng c&aacute;c đối t&aacute;c quản l&yacute; vận h&agrave;nh chung cư, cung cấp một nền tảng chuyển đổi số tiện lợi, hiện đại mang lại cho d&acirc;n cư những trải nghiệm tuyệt vời.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `table_themanh`
--

CREATE TABLE `table_themanh` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_themanh`
--

INSERT INTO `table_themanh` (`id`, `ten_vi`, `mota_vi`, `photo`, `stt`, `hienthi`, `ngaytao`, `ngaysua`) VALUES
(1, 'Quản lý thông minh', 'Ứng dụng c&ocirc;ng nghệ 4.0 v&agrave;o hoạt động quản l&yacute; vận h&agrave;nh c&aacute;c chung cư, g&oacute;p phần đơn giản h&oacute;a quy tr&igrave;nh quản l&yacute; vận h&agrave;nh một c&aacute;ch hiệu quả.', 'upload/themanh/391057.png', 3, 1, NULL, 1766890881),
(2, 'Tiện nghi sử dụng', 'Với các tiện ích dịch vụ kèm theo, góp phần phục vụ đến Quý cư dân những giá trị cuộc sống tốt đẹp. Điển hình là dịch vụ bảo vệ an ninh, chuyển nhà văn phòng, bảo trì máy lạnh, hồ bơi, khu vui chơi và còn những dịch vụ khác.', 'upload/themanh/250366.png', 2, 1, NULL, NULL),
(3, 'Tư vấn hỗ trợ', 'Chúng tôi không chỉ tư vấn hỗ trợ sử dụng phần mềm mà còn tư vấn cho doanh nghiệp về các nghiệp vụ quản trị, cung cấp đầy đủ thông tin để thuận lợi hơn trong công việc.', 'upload/themanh/782259.png', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_thuvien`
--

CREATE TABLE `table_thuvien` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) DEFAULT 0,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `noidung_vi` longtext DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1,
  `noibat` tinyint(1) DEFAULT 0,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL,
  `luotxem` int(11) DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_thuvien`
--

INSERT INTO `table_thuvien` (`id`, `id_cat`, `ten_vi`, `ten_khong_dau`, `photo`, `thumb`, `mota_vi`, `noidung_vi`, `stt`, `hienthi`, `noibat`, `ngaytao`, `ngaysua`, `luotxem`, `title`, `keywords`, `description`) VALUES
(4, 0, 'TẾT TRUNG THU, VUI ĐOÀN TỤ 2023', 'tet-trung-thu-vui-doan-tu-2023', 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132140.jpg', NULL, '', '', 1, 1, 0, 1696388400, 1766894544, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_thuvien_photo`
--

CREATE TABLE `table_thuvien_photo` (
  `id` int(11) NOT NULL,
  `id_main` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_thuvien_photo`
--

INSERT INTO `table_thuvien_photo` (`id`, `id_main`, `photo`, `stt`, `hienthi`) VALUES
(1, 1, 'upload/thuvien/297268745446_0.JPG', 1, 1),
(2, 1, 'upload/thuvien/533212086547_1.JPG', 1, 1),
(3, 1, 'upload/thuvien/786624694234_2.JPG', 1, 1),
(4, 1, 'upload/thuvien/878834282712_3.JPG', 1, 1),
(5, 1, 'upload/thuvien/250932025431_4.JPG', 1, 1),
(6, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132140.jpg', 1, 1),
(7, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132141.jpg', 1, 1),
(8, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/169641321410.jpg', 1, 1),
(9, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132142.jpg', 1, 1),
(10, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132143.jpg', 1, 1),
(11, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132144.jpg', 1, 1),
(12, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132146.jpg', 1, 1),
(13, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132147.jpg', 1, 1),
(14, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132148.jpg', 1, 1),
(15, 2, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132149.jpg', 1, 1),
(16, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132140.jpg', 1, 1),
(17, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132141.jpg', 1, 1),
(18, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/169641321410.jpg', 1, 1),
(19, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132142.jpg', 1, 1),
(20, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132143.jpg', 1, 1),
(21, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132144.jpg', 1, 1),
(22, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132146.jpg', 1, 1),
(23, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132147.jpg', 1, 1),
(24, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132148.jpg', 1, 1),
(25, 3, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132149.jpg', 1, 1),
(26, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132140.jpg', 1, 1),
(27, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132141.jpg', 1, 1),
(28, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/169641321410.jpg', 1, 1),
(29, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132142.jpg', 1, 1),
(30, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132143.jpg', 1, 1),
(31, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132144.jpg', 1, 1),
(32, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132146.jpg', 1, 1),
(33, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132147.jpg', 1, 1),
(34, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132148.jpg', 1, 1),
(35, 4, 'upload/thuvien/tet-trung-thu-vui-doan-tu-2023/16964132149.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_tinhtrang`
--

CREATE TABLE `table_tinhtrang` (
  `id` int(11) NOT NULL,
  `trangthai` varchar(255) DEFAULT NULL,
  `trangthai1` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_tuyendung`
--

CREATE TABLE `table_tuyendung` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) DEFAULT NULL,
  `ten_khong_dau` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `mota_vi` text DEFAULT NULL,
  `noidung_vi` text DEFAULT NULL,
  `stt` int(11) DEFAULT 1,
  `hienthi` int(1) DEFAULT 1,
  `ngaytao` int(11) DEFAULT NULL,
  `ngaysua` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `table_tuyendung`
--

INSERT INTO `table_tuyendung` (`id`, `ten_vi`, `ten_khong_dau`, `photo`, `mota_vi`, `noidung_vi`, `stt`, `hienthi`, `ngaytao`, `ngaysua`, `title`, `keywords`, `description`) VALUES
(1, 'Nhân viên IT', 'nhan-vien-it', '', 'Địa điểm: Th&agrave;nh Phố Hồ Ch&iacute; Minh Mức lương: Lương thỏa thuận Hạn nộp: C&ograve;n 30 ng&agrave;y', '<p><span style=\"color:#008000\"><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">M&ocirc; tả chi tiết c&ocirc;ng việc:</span></span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Quản trị hệ thống m&aacute;y t&iacute;nh C&ocirc;ng ty hoạt động hiệu quả.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Quản trị website th&ocirc;ng tin c&ocirc;ng ty.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Thiết lập hệ thống mạng nội bộ cho c&ocirc;ng ty.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Quản l&yacute; Server, hệ thống mạng, Server, Data center,</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Quản l&yacute;, cập nhật v&agrave; chăm s&oacute;c Fanpage Facebook, Instagram, K&ecirc;nh YouTube video;</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Xử l&yacute; c&aacute;c sự cố về mạng.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Quản l&yacute; c&aacute;c thiết bị c&ocirc;ng nghệ th&ocirc;ng tin v&agrave; c&ocirc;ng nghệ của c&ocirc;ng ty. L&ecirc;n kế hoạch bảo tr&igrave;, n&acirc;ng cấp hệ thống, thiết bị định kỳ.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Ph&aacute;t triển phần mềm, ứng dụng như sau:</span></span></p>\r\n\r\n<p><em><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">- Tham gia v&agrave;o việc nghi&ecirc;n cứu v&agrave; thiết kế, lập tr&igrave;nh c&aacute;c phần mềm, ứng dụng;</span></span></em></p>\r\n\r\n<p><em><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">- Đ&aacute;nh gi&aacute; chất lượng của phần mềm, ứng dụng v&agrave; training cho người d&ugrave;ng sử dụng c&aacute;c phần mềm, ứng dụng đ&oacute;;</span></span></em></p>\r\n\r\n<p><em><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">- Bảo tr&igrave; v&agrave; tham gia giải quyết khi c&oacute; c&aacute;c sự cố li&ecirc;n quan đến kỹ thuật;</span></span></em></p>\r\n\r\n<p><em><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">- Cải tiến hệ thống ứng dụng của c&aacute;c phần mềm ứng dụng;</span></span></em></p>\r\n\r\n<p><em><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">- Nghi&ecirc;n cứu c&aacute;c ứng dụng phần mềm mới.</span></span></em></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Đề xuất c&aacute;c phương &aacute;n bảo tr&igrave;, n&acirc;ng cấp hệ thống, thay đổi dịch vụ theo y&ecirc;u cầu ph&aacute;t triển của c&ocirc;ng ty.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">L&agrave;m bảng kế hoạch c&ocirc;ng việc kiểm so&aacute;t hệ thống giữ xe th&ocirc;ng minh h&agrave;ng th&aacute;ng.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Hỗ trợ H&agrave;nh ch&iacute;nh quản l&yacute;, bảo tr&igrave;, thay thế t&agrave;i sản thiết bị văn ph&ograve;ng.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Thực hiện một số c&ocirc;ng việc theo y&ecirc;u cầu Trưởng ph&ograve;ng v&agrave; Ban Gi&aacute;m đốc.</span></span></p>\r\n', 1, 0, 1766654516, 1766832461, '', '', ''),
(2, 'Nhân viên Marketing', 'nhan-vien-marketing', '', 'Địa điểm: Quận 4\nMức lương: Lương thỏa thuận\nHạn nộp: Còn 30 ngày', '<p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">﻿</span><span style=\"font-size: 14px;\">&nbsp; Mô tả chi tiết công việc:</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">- Quản lý, cập nhật thông tin và các bài viết trên website của công ty.</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">- Quản lý, lập kế hoạch duy trì nội dung các bài đăng trên trang Facebook của công ty.</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">- Lên ý tưởng nội dung, lập kế hoạch duy trì và thực hiện chỉnh sửa trực tiếp các video đăng tải tại các tài khoản trên mạng xã hội như Tiktok, Youtube, Facebook, Instagram.</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">- Khảo sát, lên ý tưởng và theo dõi thực hiện các hoạt động in ấn, hình ảnh, phục vụ cho công tác truyền thông, quảng cáo theo kế hoạch được phê duyệt triển khai.</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">- Phối hợp với các bộ phận khác thực hiện các công việc liên quan đến phát triển kinh doanh hình ảnh công ty.</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">- Thực hiện các công việc khác theo yêu cầu của Ban Tổng giám đốc.</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">&nbsp; Kinh nghiệm/Kỹ năng chi tiết</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">&nbsp;- Ứng viên tốt nghiệp đại học chuyên ngành Marketing</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">- Ưu tiên ứng viên có kinh nghiệm&nbsp;quay và dựng video&nbsp;</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">- Phẩm chất đạo đức tốt, có kỹ năng phối hợp và làm việc theo nhóm.</span></p><p style=\"margin-bottom: 15px; font-size: 14px; line-height: 26px; color: rgb(40, 47, 65); font-family: Poppins, Montserrat, sans-serif; letter-spacing: 0.4px;\"><span style=\"font-size: 14px;\">- Có khả năng chịu được áp lực công việc;</span></p>', 2, 0, 1766654516, 0, '', '', ''),
(3, 'Kỹ thuật tòa nhà', 'ky-thuat-toa-nha', '', 'Địa điểm: Th&agrave;nh Phố Hồ Ch&iacute; Minh Mức lương: Lương thỏa thuận Hạn nộp: C&ograve;n 30 ng&agrave;y', '<p><span style=\"color:#008000\"><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">M&ocirc; tả chi tiết c&ocirc;ng việc:</span></span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Thực hiện c&ocirc;ng t&aacute;c bảo tr&igrave;, bảo dưỡng thiết bị điện&nbsp;trong c&aacute;c căn hộ chung cư, khu văn ph&ograve;ng.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Thi c&ocirc;ng lắp đặt mới hoặc di dời, cải tạo hệ thống, thiết bị điện, điện lạnh trong c&aacute;c căn hộ, khu văn ph&ograve;ng.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Thực hiện c&aacute;c c&ocirc;ng việc kh&aacute;c do cấp tr&ecirc;n giao ph&oacute;.</span></span></p>\r\n\r\n<p><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">&nbsp; Kinh nghiệm/Kỹ năng chi tiết:</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Tr&igrave;nh độ Trung cấp trở l&ecirc;n ưu ti&ecirc;n&nbsp;c&aacute;c chuy&ecirc;n ng&agrave;nh điện, x&acirc;y dựng, tự động h&oacute;a, cơ kh&iacute;.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Phẩm chất đạo đức tốt, c&oacute; kỹ năng phối hợp v&agrave; l&agrave;m việc theo nh&oacute;m.</span></span></p>\r\n\r\n<p><span style=\"color:#212529; font-family:-apple-system,blinkmacsystemfont,\">►&nbsp;</span><span style=\"font-size:18px\"><span style=\"font-family:arial,helvetica,sans-serif\">Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; kinh nghiệm về điện, x&acirc;y dựng.</span></span></p>\r\n', 3, 1, 1766654516, 1766834763, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ten` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT 1,
  `stt` int(11) DEFAULT 1,
  `hienthi` tinyint(1) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id`, `username`, `password`, `ten`, `email`, `role`, `stt`, `hienthi`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', 'admin@khaservice.com', 3, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_contact`
--
ALTER TABLE `table_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_dichvu`
--
ALTER TABLE `table_dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_duan`
--
ALTER TABLE `table_duan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_dulieu`
--
ALTER TABLE `table_dulieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_feedback`
--
ALTER TABLE `table_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_giatri`
--
ALTER TABLE `table_giatri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_gioithieu`
--
ALTER TABLE `table_gioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_khuvuc`
--
ALTER TABLE `table_khuvuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_news`
--
ALTER TABLE `table_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_newsletter`
--
ALTER TABLE `table_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_news_cat`
--
ALTER TABLE `table_news_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_news_temp`
--
ALTER TABLE `table_news_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_photo`
--
ALTER TABLE `table_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_setting`
--
ALTER TABLE `table_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_staff`
--
ALTER TABLE `table_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_static`
--
ALTER TABLE `table_static`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_themanh`
--
ALTER TABLE `table_themanh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_thuvien`
--
ALTER TABLE `table_thuvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_thuvien_photo`
--
ALTER TABLE `table_thuvien_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_tinhtrang`
--
ALTER TABLE `table_tinhtrang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_tuyendung`
--
ALTER TABLE `table_tuyendung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_contact`
--
ALTER TABLE `table_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_dichvu`
--
ALTER TABLE `table_dichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_duan`
--
ALTER TABLE `table_duan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `table_dulieu`
--
ALTER TABLE `table_dulieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_feedback`
--
ALTER TABLE `table_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_giatri`
--
ALTER TABLE `table_giatri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_gioithieu`
--
ALTER TABLE `table_gioithieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_khuvuc`
--
ALTER TABLE `table_khuvuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_news`
--
ALTER TABLE `table_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `table_newsletter`
--
ALTER TABLE `table_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_news_cat`
--
ALTER TABLE `table_news_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_news_temp`
--
ALTER TABLE `table_news_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_photo`
--
ALTER TABLE `table_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `table_setting`
--
ALTER TABLE `table_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_staff`
--
ALTER TABLE `table_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_static`
--
ALTER TABLE `table_static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_themanh`
--
ALTER TABLE `table_themanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `table_thuvien`
--
ALTER TABLE `table_thuvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_thuvien_photo`
--
ALTER TABLE `table_thuvien_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `table_tinhtrang`
--
ALTER TABLE `table_tinhtrang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_tuyendung`
--
ALTER TABLE `table_tuyendung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
