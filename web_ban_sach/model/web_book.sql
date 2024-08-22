-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2023 lúc 01:14 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(1, 'Gosho Aoyama'),
(2, 'Eiichiro Oda');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `parent_id`) VALUES
(1, 'Sách - Truyện', 0),
(6, 'Conan - Thám tử lừng danh', 1),
(7, 'Onepiece - Đảo hải tặc', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_giohang`
--

CREATE TABLE `chitiet_giohang` (
  `ct_id` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `price` float(10,3) NOT NULL,
  `soluong` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `commentText` text DEFAULT NULL,
  `thoigian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `product_id`, `commentText`, `thoigian`) VALUES
(1, 2, 1, 'Hay vãi ol', '2023-11-08 15:11:57'),
(2, 2, 2, 'Hay', '2023-11-07 05:10:31'),
(15, 3, 4, 'Hello', '2023-11-06 17:00:00'),
(16, 3, 4, 'Xin chào', '2023-11-06 17:00:00'),
(17, 3, 4, 'Xin chào', '2023-11-06 17:00:00'),
(18, 3, 4, 'Xin chào', '2023-11-06 17:00:00'),
(19, 3, 4, 'Xin chào', '2023-11-06 17:00:00'),
(20, 3, 4, 'Nguyễn Viết Dương', '2023-11-06 17:00:00'),
(21, 3, 4, 'Nguyễn Viết Dương', '2023-11-06 17:00:00'),
(22, 3, 4, 'Nguyễn Viết Dương', '2023-11-06 17:00:00'),
(23, 3, 6, 'hello', '2023-11-06 17:00:00'),
(24, 3, 6, 'hello', '2023-11-06 17:00:00'),
(25, 3, 6, 'hello', '2023-11-06 17:00:00'),
(26, 3, 14, 'Hello', '2023-11-06 17:00:00'),
(27, 3, 14, 'Hello', '2023-11-06 17:00:00'),
(28, 3, 14, 'Giang nguu', '2023-11-06 17:00:00'),
(29, 3, 14, 'Giang nguu', '2023-11-06 17:00:00'),
(30, 3, 14, 'Tân nguu', '2023-11-06 17:00:00'),
(31, 3, 14, 'Tân nguu', '2023-11-06 17:00:00'),
(33, 3, 2, 'Helllo', '2023-11-06 17:00:00'),
(34, 3, 2, 'Helllo', '2023-11-06 17:00:00'),
(35, 3, 13, 'Hi', '2023-11-06 17:00:00'),
(36, 3, 13, 'Hi', '2023-11-06 17:00:00'),
(37, 3, 11, 'Hi', '2023-11-06 17:00:00'),
(38, 3, 11, 'Hi', '2023-11-06 17:00:00'),
(39, 3, 11, 'Hi', '2023-11-06 17:00:00'),
(40, 3, 11, 'Hi', '2023-11-06 17:00:00'),
(41, 3, 11, 'Hi', '2023-11-06 17:00:00'),
(42, 3, 11, 'hello', '2023-11-06 17:00:00'),
(43, 3, 11, 'hello', '2023-11-06 17:00:00'),
(44, 3, 11, 'Hì', '2023-11-06 17:00:00'),
(45, 3, 15, 'Hehe', '2023-11-06 17:00:00'),
(46, 3, 15, 'VIẾT DƯƠNG', '2023-11-06 17:00:00'),
(47, 3, 3, 'sgsfds', '2023-11-10 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi`
--

CREATE TABLE `diachi` (
  `diachi_id` int(11) NOT NULL,
  `sdt_nhandonhang` varchar(255) NOT NULL,
  `quocgia` varchar(255) NOT NULL,
  `thanhpho` varchar(255) NOT NULL,
  `quanhuyen` varchar(255) NOT NULL,
  `nhacuthe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `diachi`
--

INSERT INTO `diachi` (`diachi_id`, `sdt_nhandonhang`, `quocgia`, `thanhpho`, `quanhuyen`, `nhacuthe`) VALUES
(1, '0385906406', 'Việt Nam', 'Thái Bình', 'Quỳnh Phụ', 'An quý'),
(29, '03859064043', 'Việt Nam', 'Thái Bình', 'Quỳnh Phụ', 'An quý'),
(34, '0839739717', 'Việt Nam', 'Thái Bình', 'Quỳnh Phụ', 'An quý');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `donhang_id` int(11) NOT NULL,
  `diachi` int(11) NOT NULL,
  `price_tra` float(10,3) NOT NULL,
  `ghichu_dh` text NOT NULL,
  `kieu_thanhtoan` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_giohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `giohang_id` int(11) NOT NULL,
  `user_name_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kieu_thanhtoan`
--

CREATE TABLE `kieu_thanhtoan` (
  `kieutt_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `kieu_thanhtoan`
--

INSERT INTO `kieu_thanhtoan` (`kieutt_id`, `name`) VALUES
(1, 'Thanh toán khi nhận được hàng'),
(2, 'Chuyển khoản ngân hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_tap` varchar(255) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mieuta` text NOT NULL,
  `author` int(11) NOT NULL,
  `page` int(255) NOT NULL,
  `format` varchar(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `price` double(10,3) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `luotthich` int(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `name_tap`, `soluong`, `image`, `mieuta`, `author`, `page`, `format`, `weight`, `price`, `discount`, `luotthich`, `parent`, `trangthai`, `category_id`) VALUES
(1, 'Thám tử lừng danh Conan', 'Tập 1', 20, 'conantap1.jpg', 'Kudo Shinichi là một cậu thám tử học sinh năng nổ với biệt tài suy luận có thể sánh ngang với Sherlock Holmes! Một ngày nọ, khi mải đuổi theo những kẻ khả nghi, cậu đã bị chúng cho uống một loại thuốc kì lạ khiến cho cơ thể bị teo nhỏ. Vậy là một thám tử ', 1, 184, 'bìa mềm', 120, 20.000, '', 80, 6, 0, 1),
(2, 'Thám tử lừng danh Conan', 'Tập 2', 50, 'conantap2.jpg', 'Conan đã quyết định ở nhờ tại văn phòng thám tử Kogoro, bố của Mori Ran - bạn gái cậu, để lần theo tung tích tổ chức bí ẩn kia. Nhằm tránh con mắt người đời, hàng ngày cậu đến trường như một học sinh cấp 1 bình thường. Và với tài suy luận lừng danh của mình, cậu vẫn đứng đằng sau ông bác thám tử \"gà mờ\" Mori Kogoro phá giải những vụ án hóc búa một cách tài tình!!', 1, 176, 'bìa mềm', 140, 20.000, '', 30, 6, 0, 1),
(3, 'Thám tử lừng danh Conan', 'Tập 3', 50, 'conantap3.jpg', 'Một học sinh cấp 3 bỗng chốc biến thành cậu bé cấp 1!\r\nMọi việc trở nên khó khăn hơn, nhưng dòng máu thám tử trong tôi vẫn sục sôi, giúp tôi chinh phục những vụ án mới!! Nhưng bạn biết không, để giữ kín thân phận của mình tôi đã phải khổ sở lắm đó!!\r\nTôi là Edogawa Conan - Thám tử nhí lừng danh!', 1, 185, 'bìa mềm', 250, 20.000, '', 40, 6, 0, 1),
(4, 'Thám tử lừng danh Conan', 'Tập 4', 50, 'conantap4.jpg', 'Người nhỏ nhưng trí tuệ thì không nhỏ tẹo nào đâu nhé!! Bằng chứng là một loạt những bí ẩn đều lần lượt được tôi khám phá ra hết! Nhưng ước gì tôi sớm quay trở lại hình dạng ban đầu để lật tẩy danh tính bọn người mặc áo đen. Cũng là để được gặp lại Ran nữa!! Tôi là EDOGAWA CONAN - Thám tử lừng danh!', 1, 176, 'bìa mềm', 140, 20.000, '17.000', 50, 6, 0, 1),
(5, 'Thám tử lừng danh Conan', 'Tập 5', 50, 'conantap5.jpg', 'Shinichi thật tâm không muốn Ran vì mình mà bị liên lụy. Cậu phải lảng tránh mỗi lần Ran hỏi về bố mẹ mình. Đúng lúc, một người đàn bà mặc đồ đen xuất hiện trước cửa nhà ông Mori tự xưng là mẹ của Conan và xin dẫn cháu về! Vẫn chưa hết bàng hoàng thì mụ ta còn nói cả về cha mẹ ruột của cậu và khẳng định cậu chính là Kudo Shinichi đang bị mất tích?? Sau đó, Conan bị dẫn đến một ngôi nhà hoang và tại đây cậu còn gặp một người đàn ông đeo mặt nạ... Qua đó, Conan biết được có một vụ án mạng sắp xảy ra... Cậu nhóc đã trốn thoát, tiếp tục truy tìm hai tên mặc đồ đen ấy!', 1, 192, 'bìa mềm', 120, 20.000, '', 10, 6, 0, 1),
(6, 'Thám tử lừng danh Conan', 'Tập 6', 50, 'conantap6.jpg', 'Conan đã quyết định ở nhờ tại văn phòng thám tử Kogoro, bố của Mori Ran - bạn gái cậu, để lần theo tung tích tổ chức bí ẩn kia. Nhằm tránh con mắt người đời, hàng ngày cậu đến trường như một học sinh cấp 1 bình thường. Và với tài suy luận lừng danh của mình, cậu vẫn đứng đằng sau ông bác thám tử \"gà mờ\" Mori Kogoro phá giải những vụ án hóc búa một cách tài tình!!', 1, 176, 'bìa mềm', 140, 20.000, '18.000', 60, 6, 0, 1),
(7, 'Thám tử lừng danh Conan', 'Tập 7', 50, 'conantap7.jpg', 'Nhận được lá thư mời kì lạ, chúng tớ khởi hành đến một hòn đảo sóng nước mênh mông... Đi thì cũng được, nhưng tôi không ngờ rằng lần này lại bị cuốn vào vụ án giết người hàng loạt xảy ra xung quanh cây đàn piano... Phá xong án thì rắc rối mới lại đến. Không biết từ đâu, một cô bạn gái mới toanh của tớ bỗng xuất hiện? Xem ra tâm lí con gái còn khó hơn cả những vụ án rắc rối nhất! Có ai giải đáp giúp tớ sự tức giận của Ran là gì được không?!', 1, 180, 'bìa mềm', 120, 20.000, '', 2, 6, 0, 1),
(8, 'Thám tử lừng danh Conan', 'Tập 8', 50, 'conantap8.jpg', 'Xem chút nữa là Ran đã phát hiện ra thân phận của tớ rồi! Cũng may ứng biến kịp nên nguy hiểm tạm qua đi, nhưng giá mà tớ có thể làm cho cô ấy yên tâm hơn thì tốt biết mấy... Tớ đâu phải không muốn trở lại là Kudo Shinichi, nhưng cứ hết vụ án này đến vụ khác xảy ra khiến tớ chẳng còn tâm trí nghĩ đến chuyện đó nữa!! Rồi bỗng nhiên \"Nam tước bóng đêm\", kẻ chỉ có trong trí tưởng tượng lại từ đâu bay tới!', 1, 188, 'bìa mềm', 120, 25.000, '', 0, 6, 0, 1),
(9, 'Thám tử lừng danh Conan', 'Tập 9', 50, 'conantap9.jpg', 'Vốn là thám tử cấp 3 tiếng tăm lẫy lừng, vậy mà giờ tớ lại phải học lại tiểu học thế này... Ayumi bị mất tích trong khi cả lũ đang chơi trốn tìm! Sau đó tưởng rằng mình sẽ được nghỉ ngơi thảnh thơi ở suối nước nóng, ai ngờ tớ lại phải đối mặt với một vụ án mạng! Ít ra cũng phải cho tớ tĩnh dưỡng một chút chứ, tớ vẫn chỉ là một thằng nhóc tiểu học thôi mà!!', 1, 180, 'bìa mềm', 120, 20.000, '', 1, 6, 0, 1),
(10, 'Thám tử lừng danh Conan', 'Tập 10', 50, 'conantap10.jpg', 'Những vụ án nối tiếp nhau, không mời mà đến. Cứ như vậy thì sao tớ có thể một lúc gánh hết đây? Ơ, sao tự dưng người tớ cứ nóng dần, nóng dần... sắp không chịu nổi nữa rồi! Đúng lúc ấy, một anh chàng thám tử mới xuất hiện!', 1, 184, 'bìa mềm', 140, 20.000, '15.000', 15, 6, 0, 1),
(11, 'Magic Kaito', 'Tập 1', 20, 'magic_kaito_tap1.jpg', 'Hắn chính là Kid, siêu đạo chích hào hoa phong nhã, xuất quỷ nhập thần luôn phô trương bằng những màn ảo thuật hoành tráng! Trang bị gương mặt thản nhiên học được từ cha làm vũ khí, tối nay tên trộm bảnh bao này lại nhắm đến những món bảo vật thế kỉ. Sau 8 năm đằng đẵng, hắn đã trở lại khuấy động cả đêm thâu...!!', 1, 204, 'bìa mềm', 160, 25.000, '22.000', 40, 6, 0, 1),
(12, 'Magic Kaito', 'Tập 5', 20, 'magic_kaito_tap5.jpg', 'Siêu đạo chích Kid – Quý ông xuất quỷ nhập thần sẽ tái xuất cùng những màn ảo thuật rực rỡ!\r\nĐêm nay, hắn định sẽ lấy đi viên đá quý bằng phong thái hoa mĩ của mình... Nhưng một kẻ lạ mặt bất ngờ xuất hiện để trợ giúp cảnh sát!?\r\nLí do Kuroba Kaito quyết định trở thành “Siêu đạo chích Kid” là...\r\nVà những bí mật luôn bị cặp ba mẹ đạo chích của cậu che giấu sẽ đều được bật mí!', 1, 188, 'bìa mềm', 160, 25.000, '20.000', 45, 6, 0, 1),
(13, 'Hồ Sơ Tuyệt Mật Ai Haibara', 'Tập dài', 20, 'ho_so_tuyet_mat_ai_haibara.jpg', 'Thiên tài khoa học vừa “ngầu” vừa dễ thương!! Tất tần tật về bé Ai ♥ \r\nTUYỂN TẬP CHÍNH THỨC CỦA RIÊNG AI HAIBARA!\r\nTừ ánh mắt lạnh lùng đến nụ cười ấm áp... Tập san về sức hấp dẫn từ nhiều góc độ của Ai Haibara!! Từ TV series, Movie, Tập đặc biệt ONE... và những chỉ dẫn toàn diện để khám phá con người Haibara! Câu chuyện trưởng thành của Ai Haibara/ Báo cáo nghiên cứu APTX 4869 của Shiho Miyano/ Tóm tắt quá trình truy lùng “Sherry” của Tổ chức Áo đen/ Catalogue thời trang... và hơn thế nữa! Bộ sưu tập hình minh họa có sự xuất hiện của Ai Haibara do tác giả Gosho Aoyama chắp bút, thêm vào đó là cả những hình minh họa phiên bản giới hạn!!', 1, 108, 'bìa mềm', 420, 109.000, '97.000', 35, 6, 0, 1),
(14, 'Onepiece - Đảo Hải tặc', 'Tập 1', 20, 'onepiecetap1.jpg', 'One Piece (Vua hải tặc) bộ thuộc thể loại truyện tranh Hành động kể về một cậu bé tên Monkey D. Luffy, giong buồm ra khơi trên chuyến hành trình tìm kho báu huyền thoại One Piece và trở thành Vua hải tặc.\nĐể làm được điều này, cậu phải đến được tận cùng của vùng biển nguy hiểm và chết chóc nhất thế giới: Grand Line (Đại Hải Trình). Luffy đội trên đầu chiếc mũ rơm như một nhân chứng lịch sử vì chiếc mũ rơm đó đã từng thuộc về hải tặc hùng mạnh: Hải tặc vương Gol. D. Roger và tứ hoàng Shank \"tóc đỏ\".\nLuffy lãnh đạo nhóm hải tặc Mũ Rơm qua East Blue (Biển Đông) và rồi tiến đến Grand Line. Cậu theo dấu chân của vị vua hải tặc quá cố, Gol. D. Roger, chu du từ đảo này sang đảo khác để đến với kho báu vĩ đại.', 2, 208, 'bìa mềm', 150, 22.000, '20.000', 50, 7, 0, 1),
(15, 'Onepiece - Đảo Hải tặc', 'Tập 2', 20, 'onepiecetap2.jpg', 'EIICHIRO ODA : “Hỡi người chủ nhà hào hiệp, các vị khách đã đến rồi đây. Hướng về phương nào, những người ngồi gần cửa ra vào là người khó mà ở yên một chỗ” - Bài hát của hải tặc Bắc Âu, nghe cũng hay đấy chứ?', 2, 200, 'bìa mềm', 150, 22.000, '', 40, 7, 0, 1),
(16, 'Onepiece - Đảo Hải tặc', 'Tập 3', 5, 'onepiecetap3.jpg', 'EIICHIRO ODA : Nếu được nghỉ nguyên một năm thì tôi có chuyện rất muốn làm. Đó là mài giũa kĩ năng sử dụng các loại họa phẩm cùng các phương pháp vẽ cho thật thành thạo. Được vậy thì tranh của tôi sẽ đa dạng hơn nhiều. Có ai đó từng nói “thế giới này thật nhỏ bé”, phải không?', 2, 200, 'bìa mềm', 150, 22.000, '', 20, 7, 0, 1),
(17, 'Onepiece - Đảo Hải tặc', 'Tập 4', 10, 'onepiecetap4.jpg', 'Ngôi làng bình yên của Usopp bị hải tặc nhắm đến! Biết trước sự việc, nhóm Luffy đã quyết định ngăn chặn ý định tấn công của bọn chúng. Thế nhưng chờ mãi chẳng thấy tên nào, trong khi ở bờ biển kế bên lại có tiếng la hét...!?', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 7, 0, 1),
(18, 'Onepiece - Đảo Hải tặc', 'Tập 5', 6, 'onepiecetap5.jpg', 'Cuối cùng Luffy cũng đối đầu với tên cựu hải tặc Kiahadore!! Trận chiến nảy lửa trên con dốc dẫn vào làng liệu sẽ có hồi kết thúc!? Một bên, nhóm viện trợ cho đám nhóc đang bị rượt đuổi trong rừng, Zoro và Usopp đang...?', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 7, 0, 1),
(19, 'Onepiece - Đảo Hải tặc', 'Tập 6', 2, 'onepiecetap6.jpg', 'Lên đường tìm kiếm đầu bếp, cả nhóm đã ghé thăm nhà hàng trên biển... Trong lúc Don Krieg đang thực hiện âm mưu đánh chiếm nhà hàng thì trước mặt Luffy bỗng xuất hiện một bóng người...? Những chuyến phiêu lưu trên đại dương xoay quanh \"ONE PIECE\" lại bắt đầu!!', 2, 192, 'bìa mềm', 150, 22.000, '20.000', 20, 7, 0, 1),
(20, 'Onepiece - Đảo Hải tặc', 'Tập 7', 16, 'onepiecetap7.jpg', 'Bắt Zeff làm con tin, băng Krieg đã đưa ra vô số yêu cầu quá đáng!! Đối mặt với một gã hèn hạ, Luffy hoàn toàn không hiểu lí do tại sao Sanji không hề phản ứng lại. Qua những hành động của anh ấy, duyên nợ với Zeff dần dần sáng tỏ... ', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 7, 0, 1),
(21, 'Onepiece - Đảo Hải tặc', 'Tập 8', 0, 'onepiecetap8.jpg', 'Không màng đến sống chết, Luffy mang trong mình niềm tin mạnh mẽ, quyết phân thắng bại với Krieg. Trận chiến cao cả của nhà hàng trên biển đã đến hồi kết thúc!? Cuối cùng, giờ phút phiêu lưu của Sanji đã đến... ', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 7, 0, 1),
(22, 'Onepiece - Đảo Hải tặc', 'Tập 9', 7, 'onepiecetap9.jpg', 'Bọn Luffy sau khi đuổi kịp Nami đến Arlong Park - Nơi bị đám người cá chiếm đóng đã đối mặt với một sự thật kinh hoàng. Liệu tấm lòng của những người đồng đội có thể chạm đến một Nami luôn đơn độc chiến đấu hay không? Những chuyến phiêu lưu trên đại dương xoay quanh \"ONE PIECE\" lại bắt đầu!!', 2, 208, 'bìa mềm', 150, 22.000, '', 20, 7, 0, 1),
(23, 'Onepiece - Đảo Hải tặc', 'Tập 10', 8, 'onepiecetap10.jpg', 'Đáp lại tiếng thét xé lòng của Nami, hội Luffy đã quyết giúp cô đánh bại Ariong! Không may Luffy lại bị rơi xuống biển và lâm vào tình trạng nguy kịch!! Những người đồng đội còn lại đành phải vừa đánh, vừa nghĩ cách cứu Luffy. Những chuyến phiêu lưu trên đại dương xoay quanh \"ONE PIECE\" lại bắt đầu!!', 2, 192, 'bìa mềm', 150, 22.000, '', 20, 7, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin1'),
(3, 'admin2'),
(4, 'Giám Đốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `tinhtrang_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`tinhtrang_id`, `name`) VALUES
(1, 'Đang chuyển'),
(2, 'Đã hủy'),
(3, 'Đã giao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `phone`, `adress`, `role_id`) VALUES
(1, 'Nguyễn viết Dương', 'Anhnhat1', 'admin', '0385906406', 'Thái Bình', 4),
(2, 'User1', '2004', 'user1', '123456789', 'Hà Nội', 1),
(3, 'Nguyễn Viết Dương', '2004', 'duongnvph33352@fpt.edu.vn', '0385906406', 'An quý - Quỳnh Phụ - Thái Bình', 1),
(14, 'vietduong204', 'Anhnhat1', 'VIETDUONG@GMAIL.COM', '0889739717', 'Thái Bình', 1),
(22, 'Nguyễn Huy Tân', '241024', 'tannhph41034@fpt.edu.vn', '0886635676', 'Thanh Hóa', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `chitiet_giohang`
--
ALTER TABLE `chitiet_giohang`
  ADD PRIMARY KEY (`ct_id`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `diachi`
--
ALTER TABLE `diachi`
  ADD PRIMARY KEY (`diachi_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`donhang_id`),
  ADD KEY `diachi` (`diachi`),
  ADD KEY `kieu_thanhtoan` (`kieu_thanhtoan`),
  ADD KEY `tinhtrang` (`tinhtrang`),
  ADD KEY `id_giohang` (`id_giohang`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`giohang_id`),
  ADD KEY `user_name_id` (`user_name_id`);

--
-- Chỉ mục cho bảng `kieu_thanhtoan`
--
ALTER TABLE `kieu_thanhtoan`
  ADD PRIMARY KEY (`kieutt_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`tinhtrang_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitiet_giohang`
--
ALTER TABLE `chitiet_giohang`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `diachi`
--
ALTER TABLE `diachi`
  MODIFY `diachi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `kieu_thanhtoan`
--
ALTER TABLE `kieu_thanhtoan`
  MODIFY `kieutt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `tinhtrang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `product` (`author`);

--
-- Các ràng buộc cho bảng `chitiet_giohang`
--
ALTER TABLE `chitiet_giohang`
  ADD CONSTRAINT `chitiet_giohang_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `giohang` (`giohang_id`),
  ADD CONSTRAINT `chitiet_giohang_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_10` FOREIGN KEY (`tinhtrang`) REFERENCES `tinhtrang` (`tinhtrang_id`),
  ADD CONSTRAINT `donhang_ibfk_11` FOREIGN KEY (`id_giohang`) REFERENCES `giohang` (`giohang_id`),
  ADD CONSTRAINT `donhang_ibfk_8` FOREIGN KEY (`diachi`) REFERENCES `diachi` (`diachi_id`),
  ADD CONSTRAINT `donhang_ibfk_9` FOREIGN KEY (`kieu_thanhtoan`) REFERENCES `kieu_thanhtoan` (`kieutt_id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_3` FOREIGN KEY (`user_name_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
