@extends('site.layouts.master')
@section('title', 'Tin bán')
@section('css')

@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="#">Thuê</a></li>
</ol>
@endsection
@section('hero')
<div class="page-title">
    <div class="container">
        <h1>Thuê</h1>
    </div>
</div>
@endsection
@section('content')

<section class="chitiet-tintuc">
    <div class="container"> 
        <div class="row">
            <div class="col-lg-9 contain">
                <h2>Nhà nhập khẩu cầu chì chính hãng số 1 tại Việt Nam.</h2>
                <time>26/07/2019 </time>
                <p>Công Ty TNHH Thương Mại Dịch Vụ Châu Vĩnh Cường (CVC Việt Nam) với phương châm đặt chất lượng sản phẩm và dịch vụ lên hàng đầu. Đảm bảo các sản phẩm CVC Việt Nam cung cấp đều được phân phối chính hãng, nên chất lượng và giá cả đảm bảo hài lòng cho bất kỳ khách hàng khó tính nào. Với kinh nghiệm lâu năm và tiên phong trong lĩnh vực cung cấp thiết bị tự động hóa, Châu Vĩnh Cường (CVC Việt Nam) đã trở thành cái tên quen thuộc đối với người tiêu dùng tại Việt Nam. Hơn nữa, các sản phẩm chất lượng được hầu hết người dùng ưa chuộng và đánh giá cao. Với đội ngũ nhân viên chuyên nghiệp, có tinh thần trách nhiệm cùng với sự tận tâm hiếm có, CVC Việt Nam luôn cố gắng nỗ lực đem lại những giá trị tốt nhất cho các khách hàng của mình.</p>
                <div class="img"> <img src="./img/ncc.png" alt=""></div>
                <p>Chúng tôi đã tin tưởng và lưạ chọn những nhãn hàng Cầu chì nổi tiếng – có chất lượng và mức giá phù hợp với nhu cầu sử dụng tại thị trường Việt Nam.</p>
                <p>Từ ngày 05/01/2011 Công Ty TNHH TM DV Châu Vĩnh Cường (CVC Việt Nam) đã trở thành đại lý cầu chì Ferraz Shawmut (bây giờ là Mersen) chính thức ở Việt Nam.</p>
                <p>Hiện nay, các đại lý cầu chì Ferraz Shawmut chính hãng tại Việt Nam không nhiều, song để chọn mua sản phẩm tại các nhà phân phối chính thức để có chất lượng tốt nhất cùng mức giá ưu đãi nhất là điều không dễ dàng, bởi các cửa hàng bán cầu chì ngày càng nhiều và phổ biến, chất lượng thì không ai có thể kiểm chứng được. Do đó, việc chọn mua các loại cầu chì tại các địa chỉ, cơ sở uy tín, chất lượng là quan tâm hàng đầu hiện nay của quý khách hàng.</p>
                <p>Cầu chì là một phần tử được sử dụng để bảo vệ ngắn mạch cho thiết bị điện hay các dây dẫn, máy biến áp, động cơ điện, các mạch điện điều khiển hay mạch điện chiếu sáng đều được. Với cấu tạo đơn giản gồm dây chảy, ruột cầu chì và đế cầu chì. Trong đó dây chảy là bộ phận cơ bản và cũng là bộ phận đặc biệt nhất, thường được thiết kế từ các loại vật liệu dễ nóng chảy.</p>
                <p>Do đó, hoạt động của cầu chì thường dựa theo nguyên lý tan chảy khỏi mạch điện khi cường độ dòng điện tăng bất thường. Trong đó, dòng sản phẩm bảo vệ mạch điện, dây dẫn và các thiết bị điện tại đại lý cầu chì Ferraz Shawmut chính hãng không những đa dạng về mẫu mã, chủng loại, kiểu dáng mà chất lượng sản phẩm ở đây còn rất đảm bảo, đạt đủ các tiêu chuẩn về cầu chì trong nước và ngoài nước, giá thành lại vô cùng cạnh tranh.</p>
                <p>Không chỉ là đại lý cầu chì Ferraz Shawmut chính hãng, CVC Việt Nam còn là nhà phân phối chính thức của các loại cầu chì công nghiệp khác như: cầu chì Bussmann, cầu chì Siba, cầu chì Hinode, cầu chì ETI, cầu chì Miro, ... nhằm phục vụ đầy đủ nhất và tốt nhất các nhu cầu khách hàng. Nếu bạn đang có ý định mua các sản phẩm về cầu chì thì CVC Việt Nam là địa chỉ uy tín, chất lượng nhất tại TP HCM, đồng thời cũng là sự lựa chọn lý tưởng và hoàn hảo cho bạn.</p>
                <p>Hỗ trợ và tư vấn vui lòng liên hệ:</p>
                <p>Hotline: 0913 341 412 - (028) 3526 0061 - (028) 3526 0049 hoặc website chauvinhcuong.com.</p>
                <div class="social-share"></div>
            </div>
            <div class="col-lg-3 other">
                <div class="head">
                    <h2>tin tức khác</h2>
                </div>
                <div class="list-item">
                    <div class="item"> <a class="img" href=""><img src="./img/news/2.jpg" alt=""></a>
                        <div class="content"> 
                            <time>27/07/2019</time><a href="#"> 
                                <h4>Triển lãm quốc tế ngành Điện, Máy móc thiết bị Công nghiệp, Tự động hóa Việt Nam 2019 – EMA VIET NAM 2019.</h4></a>
                        </div>
                    </div>
                    <div class="item"> <a class="img" href=""><img src="./img/news/3.jpg" alt=""></a>
                        <div class="content"> 
                            <time>27/07/2019</time><a href="#"> 
                                <h4>FERRAZ SHAWMUT – Sự khác biệt công nghệ chính hãng</h4></a>
                        </div>
                    </div>
                    <div class="item"> <a class="img" href=""><img src="./img/news/4.jpg" alt=""></a>
                        <div class="content"> 
                            <time>27/07/2019</time><a href="#"> 
                                <h4>Chống rỉ sét lan truyền - Mersen được tích hợp công nghệ độc quyền</h4></a>
                        </div>
                    </div>
                    <div class="item"> <a class="img" href=""><img src="./img/news/5.jpg" alt=""></a>
                        <div class="content"> 
                            <time>27/07/2019</time><a href="#"> 
                                <h4>Những thông số cần quan tâm khi chọn chống sét cho điện mặt trời áp mái (Solar Roof Top)</h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection