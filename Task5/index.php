<?php
/**
 * 5)
 */
$dblocation = "127.0.0.1";
$dbname = "amasty";
$dbuser = "root";
$dbpass = "";

$mysqli = new mysqli($dblocation, $dbuser, $dbpass, $dbname);
/* проверка соединения */
if ($mysqli->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8");
/* изменение набора символов на utf8 */
if (!$mysqli->set_charset("utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
    exit();
}


$sql1 = "Select t.id, t.s - t2.s  from (SELECT id, sum(amount) as a FROM transactions join persons on to_person_id = id group by fullname) t join (SELECT id, sum(amount) FROM transactions join persons on from_person_id = id group by fullname) t2 on t. id = t2.id)";
$rs = $mysqli->query($sql1);

while ($row = mysqli_fetch_row($rs))
{
    foreach($row as $key => $val){
        echo $val . '<br>';
    }

}
echo '<br><br><br>';

$sql2 = "select t.city_name from(select cities.name as city_name, count(cities.name) as city_count from cities join persons on cities.id = persons.city_id join transactions on persons.id = transactions.from_person_id group by cities.name) t  
where t.city_count in (select max(t2.city_count) from (select cities.name as city_name, count(cities.name) as city_count from cities join persons on cities.id = persons.city_id join transactions on persons.id = transactions.from_person_id group by cities.name) t2)";
$rs2 = $mysqli->query($sql2);
while ($row = mysqli_fetch_row($rs2))
{
    foreach($row as $key => $val){
        echo $val . '<br>';
    }
}
echo '<br><br><br>';

$sql3 = "select * from transactions where transaction_id in (
select t1.transaction_id from
(select cities.id as from_city_id, transactions.transaction_id as transaction_id from cities join persons on cities.id = persons.city_id join transactions on persons.id = transactions.from_person_id) t1 join
(select cities.id as to_city_id, transactions.transaction_id as transaction_id from cities join persons on cities.id = persons.city_id join transactions on persons.id = transactions.to_person_id) t2 on
t1.transaction_id = t2.transaction_id where t1.from_city_id = t2.to_city_id)";
$rs3 = $mysqli->query($sql3);
while ($row = mysqli_fetch_row($rs3))
{
    foreach($row as $key => $val){
        echo $val . '<br>';
    }
}