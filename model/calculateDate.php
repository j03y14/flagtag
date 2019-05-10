<?php
//---- 오늘 날짜
$thisyear = date('Y'); // 4자리 연도
$thismonth = date('n'); // 0을 포함하지 않는 월
$today = date('j'); // 0을 포함하지 않는 일
$thisDate = date('w', mktime(0, 0, 0, $thismonth, $today, $thisyear));

//------ $year, $month 값이 없으면 현재 날짜
$year = isset($_GET['year']) ? $_GET['year'] : $thisyear;
$month = isset($_GET['month']) ? $_GET['month'] : $thismonth;
$day = isset($_GET['day']) ? $_GET['day'] : $today;

$prev_month = $month - 1;
$next_month = $month + 1;
$prev_year = $next_year = $year;
if ($month == 1) {
    $prev_month = 12;
    $prev_year = $year - 1;
} else if ($month == 12) {
    $next_month = 1;
    $next_year = $year + 1;
}
$preyear = $year - 1;
$nextyear = $year + 1;

$predate = date("Y-m-d", mktime(0, 0, 0, $month - 1, 1, $year));
$nextdate = date("Y-m-d", mktime(0, 0, 0, $month + 1, 1, $year));

// 1. 총일수 구하기
$max_day_of=array(0,31,28,31,30,31,30,31,31,30,31,30,31);

$max_day = date('t', mktime(0, 0, 0, $month, 1, $year)); // 해당월의 마지막 날짜
//echo '총요일수'.$max_day.'<br />';

// 2. 시작요일 구하기
$start_week = date("w", mktime(0, 0, 0, $month, 1, $year)); // 일요일 0, 토요일 6
//1월 1일의 요일 구하기
$first_day_date = date("w", mktime(0, 0, 0, 1, 1, $year));

// 몇번째 주인지 구하기
$this_week = date("W",  mktime(0, 0, 0, $month, $today, $year)); // 그 해의 첫번째 주 1 ~ 42까지 있음
// 3. 총 몇 주인지 구하기
$total_week = ceil(($max_day + $start_week) / 7);

// 4. 마지막 요일 구하기
$last_week = date('w', mktime(0, 0, 0, $month, $max_day, $year));

function whatDayIs($day,$max_day_of){
  for($i=1; $day>$max_day_of[$i];$i++){
    $day = $day - $max_day_of[$i];
  }
  return $day;
}
function whatMonthIs($day,$max_day_of){
  $thisMonth = 1;
  for($i=1; $day>$max_day_of[$i];$i++){
    $day = $day - $max_day_of[$i];
    $thisMonth++;
  }
  return $thisMonth;
}
?>
