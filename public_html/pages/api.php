<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>Moderna - Bootstrap 3 flat corporate template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="http://bootstraptaste.com" />

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>

<!-- Insert -->
<table class="table table-responsive">
    <caption>
        위치정보 입력
    </caption>
    <tr>
        <th>HTTP Method : POST</th>
        <th>URL : <span style="font-weight: bold">http://localhost:8888/api/geo</span></th>
        <th>Content Type : JSON</th>
    </tr>
    <tr>
        <th>Parameter</th>
        <th>Data Type</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>user_idx</td>
        <td>INT</td>
        <td>사용자 고유번호 현재 1번 고정</td>
    </tr>
    <tr>
        <td>lat</td>
        <td>DOUBLE</td>
        <td>위도</td>
    </tr>
    <tr>
        <td>long</td>
        <td>DOUBLE</td>
        <td>경도</td>
    </tr>
</table>
<div>
    <div><h3>Sample - Request</h3></div>
    <div>
        <xmp>
            {"user_idx":"1", "lat":"1","long":"2"}
        </xmp>
    </div>
    <hr />
    <div><h3>Sample - Response</h3></div>
    <div>
        <h4>정상등록</h4>
        <xmp>
            {"user_idx":"1","latitude":"1","longitude":"2","map_type":"1","wait_time":1488792026,"reg_date":{},"id":13}
        </xmp>
        <h4>실패등록</h4>
        <xmp>
            false
        </xmp>
    </div>
</div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>