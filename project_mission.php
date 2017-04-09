<?php
  require_once 'Dbconnect.php';
  $res = mysql_query("SELECT * FROM projects WHERE projectId=".$_GET['id']);
  $projectRow = mysql_fetch_array($res);

  echo $projectRow[3];

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Project Index</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/hover-min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <!--選取日期-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/PAssign.css">
        <script type="text/javascript">
        $(function() {
            // 預設顯示第一個 Tab
            var _showTab = 0;
            var $defaultLi = $('ul.tabs li').eq(_showTab).addClass('active');
            $('.tab_content').eq($defaultLi.index()).siblings().hide();

            // 當 li 頁籤被點擊時...
            // 若要改成滑鼠移到 li 頁籤就切換時, 把 click 改成 mouseover
            $('ul.tabs li').mouseover(function() {
                // 找出 li 中的超連結 href(#id)
                var $this = $(this),
                    _index = $this.index();
                // 把目前點擊到的 li 頁籤加上 .active
                // 並把兄弟元素中有 .active 的都移除 class
                $this.addClass('active').siblings('.active').removeClass('active');
                // 淡入相對應的內容並隱藏兄弟元素
                $('.tab_content').eq(_index).stop(false, true).fadeIn().siblings().hide();

                return false;
            }).find('a').focus(function() {
                this.blur();
            });
        });
        </script>
  </head>
  <body>
    <!-- childbar -->
    <div class="container-fluid">
        <ul class="nav_area2">
            <li class="buttom2"><a href="PIndex.html">首頁</a></li>
            <li class="buttom2">任務區</li>
            <li class="buttom2"><a href="PCalen.html">專案行事曆</a></li>
            <li class="buttom2">專案設定</li>
            <li class="buttom2">留言板</li>
        </ul>
    </div>
    <!-- mainbar -->
    <div class="bar">
        <div class="circle circle1"></div>
        <div class="nav_area">
            <div class=class="panel-group" id="accordion">
                <div class="buttom">
                    <div class="panel-heading">
                        <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
									我的專案</a>
								</h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                <li>進行中</li>
                                <li>已完成</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="buttom">
                    <div class="panel-heading">
                        <h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
										行事曆</a>
									</h4>
                    </div>
                </div>
                <div class="buttom">
                    <div class="panel-heading">
                        <h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
											個人設定</a>
										</h4>
                    </div>
                </div>
            </div>
        </div>
        <hr class="line3"></hr>
    </div>
    </div>
    </div>
    <div id="stage">
        <!-- interval setting -->
        <div class="Stage">
            <div class="StageName">
                <h2>階段目標</h2>
                <br>
                <div class="StageTime">
                    <nobr>
                        <span>[期間]</span>
                        <br>
                        <input id="query2StartDate" name="query2StartDate" maxDate="query2EndDate" value="" />
                        <br> ~
                        <br>
                        <input id="query2EndDate" name="query2EndDate" minDate="query2StartDate" value="" />
                    </nobr>
                </div>
            </div>
            <div class="Assign">
                <table class="PAssign">
                    <tbody id="test">
                        <tr class="PS-3" style="font-weight: 900;font-size: 18px;">
                            <td class="PS3-1">任務名稱</td>
                            <td class="PS3-2">參與人員</td>
                            <td class="PS3-3">時間</td>
                            <td class="PS3-4">標籤</td>
                            <td class="PS3-5">提醒</td>
                        </tr>
                        <tr class="PS-3">
                            <td class="PS3-1">開會討論</td>
                            <td class="PS3-2">黃晨浩、吳紹瑜、許旆旟、鄭韶葳、鄭俊彥</td>
                            <td class="PS3-3">2016/09/20</td>
                            <td class="PS3-4"><a>#分工</a>、<a>#會議記錄</a></td>
                            <td class="PS3-5">
                                <input type="checkbox" name="" value="">
                            </td>
                        </tr>
                        <tr class="PS-3">
                            <td class="PS3-1">
                                <input id="input1" type="text" name="任務名稱">
                            </td>
                            <td class="PS3-2">
                                <input id="input1" type="text" name="參與人員">
                            </td>
                            <td class="PS3-3">
                                <input id="input2" type="date" id="bookdate" placeholder="2014-09-18">
                            </td>
                            <td class="PS3-4">#
                                <input id="input3" type="text" name="標籤" style="height:20px; width:50px;" "></td>
					       <td class="PS3-5 "><input type="checkbox" name="" value=""></td>
		          		</tr>
			        </tbody>
	               	</table>
		<input type=submit value="+ 新增任務 " class="plus ">
		<input type=submit value="儲存 " class="save ">

	</div>

</div>

<hr class="line1 "></hr>

<!-- <div class="Stage ">
	<div class="StageName ">
		<h2>階段目標</h2>
		<br>
		<div class="StageTime ">
			<nobr>
				<span>[期間]</span><br>
				<input id="query2StartDate " name="query2StartDate " maxDate="query2EndDate " value=" "/ ><br> ~<br>
				<input id="query2EndDate " name="query2EndDate " minDate="query2StartDate " value=" " />
			</nobr>
		</div>
	</div>
	<div class="Assign ">
		<table class="PAssign ">
			<tbody id="test2 ">
				<tr class="PS-3 " style="font-weight: 900;font-size: 18px; ">
					<td class="PS3-1 ">任務名稱</td>
					<td class="PS3-2 ">參與人員</td>
					<td class="PS3-3 ">時間</td>
					<td class="PS3-4 ">標籤</td>
					<td class="PS3-5 ">提醒</td>
				</tr>
				<tr class="PS-3 ">
					<td class="PS3-1 ">開會討論</td>
					<td class="PS3-2 ">許旆旟</td>
					<td class="PS3-3 ">2016/09/20</td>
					<td class="PS3-4 "><a>#????</a></td>
					<td class="PS3-5 "><input type="checkbox " name=" " value=" "></td>
				</tr>
				<tr class="PS-3 ">
					<td class="PS3-1 ">開會討論</td>
					<td class="PS3-2 ">許旆旟</td>
					<td class="PS3-3 ">2016/09/20</td>
					<td class="PS3-4 "><a>#????</a></td>
					<td class="PS3-5 "><input type="checkbox " name=" " value=" "></td>
				</tr>
				<tr class="PS-3 ">
					<td class="PS3-1 "><input id="input1 " type="text " name="任務名稱 "></td>
					<td class="PS3-2 "><input id="input1 " type="text " name="參與人員 "></td>
					<td class="PS3-3 "><input id="input2 " type="date " id="bookdate " placeholder="2014-09-18 "></td>
					<td class="PS3-4 ">#<input id="input3 " type="text " name="標籤 " style="height:20px; width:50px; "">
                            </td>
                            <td class="PS3-5">
                                <input type="checkbox" name="" value="">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type=submit value="+ 新增任務" class="plus2">
                <input type=submit value="儲存" class="save">
            </div>
        </div> -->
    </div>
    <div>
        <input type=submit value="+ 新增階段目標" class="stage_plus">
    </div>
    <!--期間-->
    <script type="text/javascript">
    $(document).ready(function() {
        $('input[name$="Date"]').datepicker({
            dateFormat: 'yy/mm/dd',
            beforeShow: function() {
                if ($(this).attr('maxDate')) {
                    var dateItem = $('#' + $(this).attr('maxDate'));
                    if (dateItem.val() !== "") {
                        $(this).datepicker('option', 'maxDate', dateItem.val());
                    }
                }

                if ($(this).attr('minDate')) {
                    var dateItem = $('#' + $(this).attr('minDate'));
                    if (dateItem.val() !== "") {
                        $(this).datepicker('option', 'minDate', dateItem.val());
                    }
                }
            }
        });
    });
    </script>
    <!--新增-->
    <script type="text/javascript">
    $(document).on("click", ".plus", function() {
        $(this).parent().find("#test").append('<tr class="PS-3"> <td class="PS3-1"> <input id="input1" type="text" name="任務名稱"> </td> <td class="PS3-2"> <input id="input1" type="text" name="參與人員"> </td> <td class="PS3-3"> <input id="input2" type="date" id="bookdate" placeholder="2014-09-18"> </td> <td class="PS3-4"># <input id="input3" type="text" name="標籤" style="height:20px; width:50px;" "></td> <td class="PS3-5 "><input type="checkbox" name="" value=""></td> </tr>');
    });

    // $(".plus").click(function() {
    //     $("#test").append('<tr class="PS-3"> <td class="PS3-1"><input id="input1" type="text" name="任務名稱"></td> <td class="PS3-2"><input id="input1" type="text" name="參與人員"></td> <td class="PS3-3"><input id="input2" type="date" id="bookdate" placeholder="2014-09-18"></td> <td class="PS3-4">#<input id="input3" type="text" name="標籤" style="height:20px; width:50px;""></td> <td class="PS3-5"><input type="checkbox" name="" value=""></td> </tr>');
    // });

    $(".stage_plus").click(function() {
        $("#stage").append('<div class="Stage"> <div class="StageName"> <h2>階段目標</h2> <br> <div class="StageTime"> <nobr> <span>[期間]</span> <br> <input id="query2StartDate" name="query2StartDate" maxDate="query2EndDate" value="" /> <br> ~ <br> <input id="query2EndDate" name="query2EndDate" minDate="query2StartDate" value="" /> </nobr> </div> </div> <div class="Assign"> <table class="PAssign"> <tbody id="test"> <tr class="PS-3" style="font-weight: 900;font-size: 18px;"> <td class="PS3-1">任務名稱</td> <td class="PS3-2">參與人員</td> <td class="PS3-3">時間</td> <td class="PS3-4">標籤</td> <td class="PS3-5">提醒</td> </tr> <tr class="PS-3"> <td class="PS3-1">開會討論</td> <td class="PS3-2">黃晨浩、吳紹瑜、許旆旟、鄭韶葳、鄭俊彥</td> <td class="PS3-3">2016/09/20</td> <td class="PS3-4"><a>#分工</a>、<a>#會議記錄</a></td> <td class="PS3-5"> <input type="checkbox" name="" value=""> </td> </tr> <tr class="PS-3"> <td class="PS3-1"> <input id="input1" type="text" name="任務名稱"> </td> <td class="PS3-2"> <input id="input1" type="text" name="參與人員"> </td> <td class="PS3-3"> <input id="input2" type="date" id="bookdate" placeholder="2014-09-18"> </td> <td class="PS3-4"># <input id="input3" type="text" name="標籤" style="height:20px; width:50px;" "></td> <td class="PS3-5 "><input type="checkbox" name="" value=""></td> </tr> </tbody> </table> <input type=submit value="+ 新增任務 " class="plus "> <input type=submit value="儲存 " class="save "> </div> </div>');
    });
    </script>
    <a href="project_home.php?id=<?php echo $_GET['id']; ?>">專案首頁</a>
  </body>
</html>
